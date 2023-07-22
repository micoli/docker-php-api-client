<?php

declare(strict_types=1);

namespace Docker\Tests\Resource;

use Docker\API\Client;
use Docker\API\Model\AuthConfig;
use Docker\Context\ContextBuilder;
use Docker\Stream\BuildStream;
use Docker\Stream\CreateImageStream;
use Docker\Stream\PushStream;
use Docker\Tests\TestCase;

/**
 * @internal
 */
class ImageResourceTest extends TestCase
{
    /**
     * Return a container manager.
     */
    private function getManager()
    {
        return self::getDocker();
    }

    public function testBuild(): void
    {
        $contextBuilder = new ContextBuilder();
        $contextBuilder->from('ubuntu:precise');
        $contextBuilder->add('/test', 'test file content');

        $context = $contextBuilder->getContext();
        $buildStream = $this->getManager()->imageBuild($context->read(), ['t' => 'test-image']);

        self::assertInstanceOf(BuildStream::class, $buildStream);

        $lastMessage = '';

        $buildStream->onFrame(function ($frame) use (&$lastMessage): void {
            $lastMessage = $frame->getStream();
        });
        $buildStream->wait();

        self::assertStringContainsString('Successfully', $lastMessage);
    }

    public function testCreate(): void
    {
        $createImageStream = $this->getManager()->imageCreate('', [
            'fromImage' => 'registry:latest',
        ]);

        self::assertInstanceOf(CreateImageStream::class, $createImageStream);

        $firstMessage = null;

        $createImageStream->onFrame(function ($createImageInfo) use (&$firstMessage): void {
            if ($firstMessage === null) {
                $firstMessage = $createImageInfo->getStatus();
            }
        });
        $createImageStream->wait();

        self::assertStringContainsString('Pulling from library/registry', $firstMessage);
    }

    public function testPushStream(): void
    {
        $contextBuilder = new ContextBuilder();
        $contextBuilder->from('ubuntu:precise');
        $contextBuilder->add('/test', 'test file content');

        $context = $contextBuilder->getContext();
        $this->getManager()->imageBuild($context->read(), ['t' => 'localhost:5000/test-image'], [], Client::FETCH_OBJECT);

        $registryConfig = new AuthConfig();
        $registryConfig->setServeraddress('localhost:5000');
        $pushImageStream = $this->getManager()->imagePush('localhost:5000/test-image', [], [
            'X-Registry-Auth' => $registryConfig,
        ]);

        self::assertInstanceOf(PushStream::class, $pushImageStream);

        $firstMessage = null;

        $pushImageStream->onFrame(function ($pushImageInfo) use (&$firstMessage): void {
            if ($firstMessage === null) {
                $firstMessage = $pushImageInfo->getStatus();
            }
        });
        $pushImageStream->wait();

        self::assertStringContainsString('repository [localhost:5000/test-image]', $firstMessage);
    }
}
