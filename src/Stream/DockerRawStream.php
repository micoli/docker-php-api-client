<?php

declare(strict_types=1);

namespace Docker\Stream;

use Psr\Http\Message\StreamInterface;

use function Safe\unpack;

class DockerRawStream
{
    public const HEADER = 'application/vnd.docker.raw-stream';

    /** @var StreamInterface Stream for the response */
    protected StreamInterface $stream;

    /** @var callable[] A list of callable to call when there is a stdin output */
    protected array $onStdinCallables = [];

    /** @var callable[] A list of callable to call when there is a stdout output */
    protected array $onStdoutCallables = [];

    /** @var callable[] A list of callable to call when there is a stderr output */
    protected array $onStderrCallables = [];

    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Add a callable to read stdin.
     */
    public function onStdin(callable $callback): void
    {
        $this->onStdinCallables[] = $callback;
    }

    /**
     * Add a callable to read stdout.
     */
    public function onStdout(callable $callback): void
    {
        $this->onStdoutCallables[] = $callback;
    }

    /**
     * Add a callable to read stderr.
     */
    public function onStderr(callable $callback): void
    {
        $this->onStderrCallables[] = $callback;
    }

    /**
     * Read a frame in the stream.
     */
    protected function readFrame(): void
    {
        $header = $this->forceRead(8);

        if (\strlen($header) < 8) {
            return;
        }

        $decoded = unpack('C1type/C3/N1size', $header);
        $output = $this->forceRead($decoded['size']);
        $callbackList = [];

        if ($decoded['type'] === 0) {
            $callbackList = $this->onStdinCallables;
        }

        if ($decoded['type'] === 1) {
            $callbackList = $this->onStdoutCallables;
        }

        if ($decoded['type'] === 2) {
            $callbackList = $this->onStderrCallables;
        }

        foreach ($callbackList as $callback) {
            $callback($output);
        }
    }

    /**
     * Force to have something of the expected size (block).
     */
    private function forceRead(int $length): string
    {
        $read = '';

        do {
            $read .= $this->stream->read($length - \strlen($read));
        } while (\strlen($read) < $length && !$this->stream->eof());

        return $read;
    }

    /**
     * Wait for stream to finish and call callables if defined.
     */
    public function wait(): void
    {
        while (!$this->stream->eof()) {
            $this->readFrame();
        }
    }
}
