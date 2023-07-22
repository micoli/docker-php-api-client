<?php

declare(strict_types=1);

namespace Docker\Context;

use RuntimeException;
use Symfony\Component\Filesystem\Filesystem;

use function Safe\tempnam;
use function Safe\fopen;
use function Safe\realpath;

/**
 * @phpstan-type commandType=array{'type': 'FROM','image': string
 * }|array{ 'type': 'ADD','path': string,'content': string
 * }|array{ 'type': 'ADDSTREAM','path': string,'stream': resource
 * }|array{ 'type': 'ADDFILE','path': string,'file': string
 * }|array{ 'type': 'RUN','command': string
 * }|array{'type': 'RUN','command': string
 * }|array{'type': 'ENV','name': string,'value': string
 * }|array{'type': 'COPY','from': string,'to': string
 * }|array{'type': 'WORKDIR','workdir': string
 * }|array{'type': 'EXPOSE','port': int
 * }|array{'type': 'USER','user': string
 * }|array{'type': 'VOLUME','volume': string
 * }
 */
class ContextBuilder
{
    /** @var string[] */
    private array $files = [];
    /** @var array<commandType> */
    private array $commands = [];
    private string $format = Context::FORMAT_STREAM;
    private string $command;
    private string $entrypoint;

    public function __construct(private Filesystem $fs = new Filesystem())
    {
    }

    /**
     * Sets the format of the Context output.
     */
    public function setFormat(string $format): ContextBuilder
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Add a FROM instruction of Dockerfile.
     *
     * @param string $from From which image we start
     */
    public function from(string $from): ContextBuilder
    {
        $this->commands[] = ['type' => 'FROM', 'image' => $from];

        return $this;
    }

    /**
     * Set the CMD instruction in the Dockerfile.
     *
     * @param string $command Command to execute
     */
    public function command(string $command): ContextBuilder
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Set the ENTRYPOINT instruction in the Dockerfile.
     *
     * @param string $entrypoint The entrypoint
     */
    public function entrypoint(string $entrypoint): ContextBuilder
    {
        $this->entrypoint = $entrypoint;

        return $this;
    }

    /**
     * Add an ADD instruction to Dockerfile.
     *
     * @param string $path    Path wanted on the image
     * @param string $content Content of file
     */
    public function add(string $path, string $content): ContextBuilder
    {
        $this->commands[] = ['type' => 'ADD', 'path' => $path, 'content' => $content];

        return $this;
    }

    /**
     * Add an ADD instruction to Dockerfile.
     *
     * @param string   $path   Path wanted on the image
     * @param resource $stream stream that contains file content
     */
    public function addStream(string $path, $stream): ContextBuilder
    {
        $this->commands[] = ['type' => 'ADDSTREAM', 'path' => $path, 'stream' => $stream];

        return $this;
    }

    /**
     * Add an ADD instruction to Dockerfile.
     *
     * @param string $path Path wanted on the image
     * @param string $file Source file (or directory) name
     */
    public function addFile(string $path, string $file): ContextBuilder
    {
        $this->commands[] = ['type' => 'ADDFILE', 'path' => $path, 'file' => $file];

        return $this;
    }

    /**
     * Add a RUN instruction to Dockerfile.
     *
     * @param string $command Command to run
     */
    public function run(string $command): ContextBuilder
    {
        $this->commands[] = ['type' => 'RUN', 'command' => $command];

        return $this;
    }

    /**
     * Add a ENV instruction to Dockerfile.
     *
     * @param string $name  Name of the environment variable
     * @param string $value Value of the environment variable
     */
    public function env(string $name, string $value): ContextBuilder
    {
        $this->commands[] = ['type' => 'ENV', 'name' => $name, 'value' => $value];

        return $this;
    }

    /**
     * Add a COPY instruction to Dockerfile.
     *
     * @param string $from Path of folder or file to copy
     * @param string $to   Path of destination
     */
    public function copy(string $from, string $to): ContextBuilder
    {
        $this->commands[] = ['type' => 'COPY', 'from' => $from, 'to' => $to];

        return $this;
    }

    /**
     * Add a WORKDIR instruction to Dockerfile.
     *
     * @param string $workdir Working directory
     */
    public function workdir(string $workdir): ContextBuilder
    {
        $this->commands[] = ['type' => 'WORKDIR', 'workdir' => $workdir];

        return $this;
    }

    /**
     * Add a EXPOSE instruction to Dockerfile.
     *
     * @param int $port Port to expose
     */
    public function expose(int $port): ContextBuilder
    {
        $this->commands[] = ['type' => 'EXPOSE', 'port' => $port];

        return $this;
    }

    /**
     * Adds an USER instruction to the Dockerfile.
     *
     * @param string $user User to switch to
     */
    public function user(string $user): ContextBuilder
    {
        $this->commands[] = ['type' => 'USER', 'user' => $user];

        return $this;
    }

    /**
     * Adds a VOLUME instruction to the Dockerfile.
     *
     * @param string $volume Volume path to add
     */
    public function volume(string $volume): ContextBuilder
    {
        $this->commands[] = ['type' => 'VOLUME', 'volume' => $volume];

        return $this;
    }

    /**
     * Create context given the state of builder.
     */
    public function getContext(): Context
    {
        $directory = \sys_get_temp_dir() . '/ctb-' . \microtime();
        $this->fs->mkdir($directory);
        $this->write($directory);

        $result = new Context($directory, $this->format, $this->fs);
        $result->setCleanup(true);

        return $result;
    }

    /**
     * Write docker file and associated files in a directory.
     *
     * @param string $directory Target directory
     *
     * @void
     */
    private function write(string $directory): void
    {
        $dockerfile = [];
        // Insert a FROM instruction if the file does not start with one.
        if (empty($this->commands) || (isset($this->commands[0]['type']) && $this->commands[0]['type'] !== 'FROM')) {
            $dockerfile[] = 'FROM base';
        }
        foreach ($this->commands as $command) {
            switch ($command['type'] ?? '') {
                case 'FROM':
                    $dockerfile[] = 'FROM ' . $command['image'];
                    break;
                case 'RUN':
                    $dockerfile[] = 'RUN ' . $command['command'];
                    break;
                case 'ADD':
                    $dockerfile[] = 'ADD ' . $this->getFile($directory, $command['content']) . ' ' . $command['path'];
                    break;
                case 'ADDFILE':
                    $dockerfile[] = 'ADD ' . $this->getFileFromDisk($directory, $command['file']) . ' ' . $command['path'];
                    break;
                case 'ADDSTREAM':
                    $dockerfile[] = 'ADD ' . $this->getFileFromStream($directory, $command['stream']) . ' ' . $command['path'];
                    break;
                case 'COPY':
                    $dockerfile[] = 'COPY ' . $command['from'] . ' ' . $command['to'];
                    break;
                case 'ENV':
                    $dockerfile[] = 'ENV ' . $command['name'] . ' ' . $command['value'];
                    break;
                case 'WORKDIR':
                    $dockerfile[] = 'WORKDIR ' . $command['workdir'];
                    break;
                case 'EXPOSE':
                    $dockerfile[] = 'EXPOSE ' . $command['port'];
                    break;
                case 'VOLUME':
                    $dockerfile[] = 'VOLUME ' . $command['volume'];
                    break;
                case 'USER':
                    $dockerfile[] = 'USER ' . $command['user'];
                    break;
            }
        }

        if (!empty($this->entrypoint)) {
            $dockerfile[] = 'ENTRYPOINT ' . $this->entrypoint;
        }

        if (!empty($this->command)) {
            $dockerfile[] = 'CMD ' . $this->command;
        }

        $this->fs->dumpFile($directory . \DIRECTORY_SEPARATOR . 'Dockerfile', \implode(PHP_EOL, $dockerfile));
    }

    /**
     * Generate a file in a directory.
     *
     * @param string $directory Targeted directory
     * @param string $content   Content of file
     */
    private function getFile(string $directory, string $content): string
    {
        $hash = \md5($content);

        if (!\array_key_exists($hash, $this->files)) {
            $file = tempnam($directory, '');
            $this->fs->dumpFile($file, $content);
            $this->files[$hash] = \basename($file);
        }

        return $this->files[$hash];
    }

    /**
     * Generated a file in a directory from a stream.
     *
     * @param string   $directory Targeted directory
     * @param resource $stream    Stream containing file contents
     *
     * @return string Name of file generated
     */
    private function getFileFromStream(string $directory, mixed $stream): string
    {
        $file = tempnam($directory, '');
        $target = fopen($file, 'w');
        if (\stream_copy_to_stream($stream, $target) === 0) {
            throw new RuntimeException('Failed to write stream to file');
        }
        \fclose($target);

        return \basename($file);
    }

    /**
     * Generated a file in a directory from an existing file.
     *
     * @param string $directory Targeted directory
     * @param string $source    Path to the source file
     *
     * @return string Name of file generated
     */
    private function getFileFromDisk(string $directory, string $source): string
    {
        $hash = 'DISK-' . \md5(realpath($source));
        if (!\array_key_exists($hash, $this->files)) {
            // Check if source is a directory or a file.
            if (\is_dir($source)) {
                $this->fs->mirror($source, $directory . '/' . $hash, null, ['copy_on_windows' => true]);
            } else {
                $this->fs->copy($source, $directory . '/' . $hash);
            }

            $this->files[$hash] = $hash;
        }

        return $this->files[$hash];
    }
}
