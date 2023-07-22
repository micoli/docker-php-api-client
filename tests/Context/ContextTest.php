<?php

declare(strict_types=1);

namespace Docker\Tests\Context;

use Docker\Context\Context;
use Docker\Context\ContextBuilder;
use Docker\Tests\TestCase;
use Symfony\Component\Process\Process;

/**
 * @internal
 */
class ContextTest extends TestCase
{
    public function testReturnsValidTarContent(): void
    {
        $directory = __DIR__ . \DIRECTORY_SEPARATOR . 'context-test';

        $context = new Context($directory);
        $process = new Process(['/usr/bin/env', 'tar', 'c', '.'], $directory);
        $process->run();

        self::assertSame(\strlen($process->getOutput()), \strlen($context->toTar()));
    }

    public function testReturnsValidTarStream(): void
    {
        $directory = __DIR__ . \DIRECTORY_SEPARATOR . 'context-test';

        $context = new Context($directory);
        self::assertIsResource($context->toStream());
    }

    public function testDirectorySetter(): void
    {
        $context = new Context('abc');
        self::assertSame('abc', $context->getDirectory());
        $context->setDirectory('def');
        self::assertSame('def', $context->getDirectory());
    }

    public function testTarFailed(): void
    {
        $this->expectException(\Symfony\Component\Process\Exception\ProcessFailedException::class);

        $directory = __DIR__ . \DIRECTORY_SEPARATOR . 'context-test';
        $path = \getenv('PATH');
        \putenv('PATH=/');
        $context = new Context($directory);
        try {
            $context->toTar();
        } finally {
            \putenv("PATH=$path");
        }
    }

    public function testRemovesFilesOnDestruct(): void
    {
        $context = (new ContextBuilder())->getContext();
        $file = $context->getDirectory() . '/Dockerfile';
        self::assertFileExists($file);

        unset($context);

        self::assertFileDoesNotExist($file);
    }
}
