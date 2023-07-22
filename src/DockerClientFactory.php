<?php

declare(strict_types=1);

namespace Docker;

use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\Plugin\ContentLengthPlugin;
use Http\Client\Common\Plugin\DecoderPlugin;
use Http\Client\Common\PluginClientFactory;
use Http\Client\Socket\Client as SocketClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use RuntimeException;
use Symfony\Component\HttpClient\Psr18Client;

/**
 * @phpstan-type config array{
 *     remote_socket?: string|null,
 *     timeout?: int,
 *     stream_context?: resource,
 *     stream_context_options?: array<string, mixed>,
 *     stream_context_param?: array<string, mixed>,
 *     ssl?: ?boolean,
 *     write_buffer_size?: int,
 *     ssl_method?: int
 * }|array{
 *   remote_socket: string|null
 * }
 */
final class DockerClientFactory
{
    /**
     * @param config $config
     * @param array<Plugin> $additionalPlugins
     */
    public static function create(array $config = [], PluginClientFactory $pluginClientFactory = null, array $additionalPlugins = []): ClientInterface
    {
        $uriFactory = Psr17FactoryDiscovery::findUriFactory();
        $pluginClientFactory ??= new PluginClientFactory();

        [$host, $client] = self::getHostAndClient($config);

        return $pluginClientFactory->createClient(
            $client,
            [
                ...$additionalPlugins,
                ...[
                    new ContentLengthPlugin(),
                    new DecoderPlugin(),
                    new AddPathPlugin($uriFactory->createUri('/v1.41')),
                    new AddHostPlugin($uriFactory->createUri($host)),
                ],
            ],
            [
                'client_name' => 'docker-client',
            ],
        );
    }

    /**
     * @param config $config
     * @param array<Plugin> $additionalPlugins
     */
    public static function createFromEnv(PluginClientFactory $pluginClientFactory = null, array $config = [], array $additionalPlugins = []): ClientInterface
    {
        $config = [
            'remote_socket' => self::getRemoteSocket($config),
        ];
        if (getenv('DOCKER_TLS_VERIFY') && getenv('DOCKER_TLS_VERIFY') === '1') {
            if (!getenv('DOCKER_CERT_PATH')) {
                throw new RuntimeException('Connection to docker has been set to use TLS, but no PATH is defined for certificate in DOCKER_CERT_PATH docker environment variable');
            }

            $streamSslContext = [
                'cafile' => getenv('DOCKER_CERT_PATH') . \DIRECTORY_SEPARATOR . 'ca.pem',
                'local_cert' => getenv('DOCKER_CERT_PATH') . \DIRECTORY_SEPARATOR . 'cert.pem',
                'local_pk' => getenv('DOCKER_CERT_PATH') . \DIRECTORY_SEPARATOR . 'key.pem',
            ];

            if (getenv('DOCKER_PEER_NAME')) {
                $streamSslContext['peer_name'] = getenv('DOCKER_PEER_NAME');
            }

            $config['ssl'] = true;
            $config['stream_context_options'] = [
                'ssl' => $streamSslContext,
            ];
        }

        return self::create($config, $pluginClientFactory, $additionalPlugins);
    }

    /**
     * @param config $config
     */
    private static function getRemoteSocket(array $config): string
    {
        if (isset($config['remote_socket']) && is_string($config['remote_socket'])) {
            return str_replace('tcp://', 'http://', $config['remote_socket']);
        }

        $dockerHost = getenv('DOCKER_HOST');
        if ($dockerHost) {
            return str_replace('tcp://', 'http://', $dockerHost);
        }

        return 'unix:///var/run/docker.sock';
    }

    /**
     * @param config $config
     * @return array{string,SocketClient|Psr18Client}
     */
    private static function getHostAndClient(array $config): array
    {
        if (!isset($config['remote_socket'])) {
            return ['http://localhost', new SocketClient($config)];
        }

        if (\preg_match('/^unix:\/\//', $config['remote_socket'])) {
            return ['http://localhost', new SocketClient($config)];
        }
        $options = [
            'base_uri' => $config['remote_socket'],
        ];
        if (isset($config['stream_context_options'])) {
            /**
             * @var array{
             *     cafile: string,
             *     local_cert: string,
             *     local_pk: string,
             *     peer_name: string,
             *     peer_name: string
             * } $ssl
             */
            $ssl = $config['stream_context_options']['ssl'];
            $options['cafile'] = $ssl['cafile'];
            $options['local_cert'] = $ssl['local_cert'];
            $options['local_pk'] = $ssl['local_pk'];
            if (isset($ssl['peer_name'])) {
                $options['extra']['peer_name'] = $ssl['peer_name'];
            }
        }

        return [$config['remote_socket'], (new Psr18Client())->withOptions($options)];
    }
}
