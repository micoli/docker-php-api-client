<?php

declare(strict_types=1);

namespace Docker\Tests;

use Docker\DockerClientFactory;
use Http\Client\Common\EmulatedHttpAsyncClient;
use Http\Client\Socket\Client as SocketClient;
use LogicException;
use Psr\Http\Client\ClientInterface;
use RuntimeException;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\Psr18Client;

/**
 * @internal
 */
class DockerClientFactoryTest extends TestCase
{
    public function getDefaultOptions(ClientInterface $client): mixed
    {
        /** @var EmulatedHttpAsyncClient $emulatedHttpClient */
        $emulatedHttpClient = $this->getPrivateProperty($client, 'client');

        /** @var Psr18Client $psr18Client */
        $psr18Client = $this->getPrivateProperty($emulatedHttpClient, 'httpClient');

        switch ($psr18Client::class) {
            case CurlHttpClient::class:
                $curlHttpClient = $this->getPrivateProperty($psr18Client, 'client');
                $defaultOptions = $this->getPrivateProperty($curlHttpClient, 'defaultOptions');
                break;
            case SocketClient::class:
                $defaultOptions = $this->getPrivateProperty($psr18Client, 'config')['stream_context_options']['ssl'];
                break;
            default:
                throw new LogicException(sprintf('Unsupported client "%s"', $psr18Client::class));
        }

        return $defaultOptions;
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        \putenv('DOCKER_TLS_VERIFY');
    }

    public function testStaticConstructor(): void
    {
        self::assertInstanceOf(ClientInterface::class, DockerClientFactory::create());
    }

    public function testCreateFromEnvWithoutCertPath(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Connection to docker has been set to use TLS, but no PATH is defined for certificate in DOCKER_CERT_PATH docker environment variable');

        \putenv('DOCKER_TLS_VERIFY=1');
        DockerClientFactory::createFromEnv();
    }

    public function testCreateCustomCa(): void
    {
        \putenv('DOCKER_TLS_VERIFY=1');
        \putenv('DOCKER_CERT_PATH=/tmp');

        $client = DockerClientFactory::createFromEnv();
        self::assertInstanceOf(ClientInterface::class, $client);
        $defaultOptions = $this->getDefaultOptions($client);

        self::assertSame('/tmp/ca.pem', $defaultOptions['cafile']);
        self::assertSame('/tmp/cert.pem', $defaultOptions['local_cert']);
        self::assertSame('/tmp/key.pem', $defaultOptions['local_pk']);
    }

    public function testCreateCustomPeerName(): void
    {
        \putenv('DOCKER_TLS_VERIFY=1');
        \putenv('DOCKER_CERT_PATH=/abc');
        \putenv('DOCKER_PEER_NAME=test');

        $client = DockerClientFactory::createFromEnv();
        self::assertInstanceOf(ClientInterface::class, $client);

        $defaultOptions = $this->getDefaultOptions($client);
        self::assertSame('/abc/ca.pem', $defaultOptions['cafile']);
        self::assertSame('/abc/cert.pem', $defaultOptions['local_cert']);
        self::assertSame('/abc/key.pem', $defaultOptions['local_pk']);
        if ($defaultOptions['extra']['peer_name']) {
            self::assertSame('test', $defaultOptions['extra']['peer_name']);
        }
    }
}
