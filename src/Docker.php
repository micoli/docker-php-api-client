<?php

declare(strict_types=1);

namespace Docker;

use Docker\API\Client;
use Docker\API\Model\AuthConfig;
use Docker\API\Model\ExecIdStartPostBody;
use Docker\API\Model\Plugin;
use Docker\Endpoint\ContainerAttach;
use Docker\Endpoint\ContainerAttachWebsocket;
use Docker\Endpoint\ContainerLogs;
use Docker\Endpoint\ExecStart;
use Docker\Endpoint\ImageBuild;
use Docker\Endpoint\ImageCreate;
use Docker\Endpoint\ImagePush;
use Docker\Endpoint\SystemEvents;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class Docker extends Client
{
    /**
     * @param array{} $queryParameters
     * @param array{} $accept
     */
    public function containerAttach(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new ContainerAttach($id, $queryParameters), $fetch);
    }

    /**
     * @param array{} $queryParameters
     * @param array{} $accept
     */
    public function containerAttachWebsocket(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new ContainerAttachWebsocket($id, $queryParameters), $fetch);
    }

    /**
     * @param array{} $queryParameters
     * @param array{} $accept
     */
    public function containerLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new ContainerLogs($id, $queryParameters), $fetch);
    }

    public function execStart(string $id, ?ExecIdStartPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ExecStart($id, $requestBody), $fetch);
    }

    /**
     * @param array{} $queryParameters
     * @param array{} $headerParameters
     */
    public function imageBuild($requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageBuild($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array{}|array{fromImage: string} $queryParameters
     * @param array{} $headerParameters
     */
    public function imageCreate(?string $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageCreate($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array{} $queryParameters
     * @param array{} $headerParameters
     * @param array{} $accept
     */
    public function imagePush(string $name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        if (isset($headerParameters['X-Registry-Auth']) && $headerParameters['X-Registry-Auth'] instanceof AuthConfig) {
            $headerParameters['X-Registry-Auth'] = \base64_encode($this->serializer->serialize($headerParameters['X-Registry-Auth'], 'json'));
        }

        return $this->executeEndpoint(new ImagePush($name, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array{} $queryParameters
     */
    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemEvents($queryParameters), $fetch);
    }

    /**
     * @phpstan-import-type config from DockerClientFactory
     *
     * @param DenormalizerInterface[] $additionalNormalizers
     * @param Plugin[] $additionalPlugins
     */
    public static function create(mixed $httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = []): Client
    {
        if ($httpClient === null) {
            $httpClient = DockerClientFactory::createFromEnv();
        }

        return parent::create($httpClient, $additionalPlugins, $additionalNormalizers);
    }
}
