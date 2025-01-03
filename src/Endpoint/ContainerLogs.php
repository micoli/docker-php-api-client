<?php

declare(strict_types=1);

namespace Docker\Endpoint;

use Docker\API\Endpoint\ContainerLogs as BaseEndpoint;
use Docker\API\Model\EventsGetResponse200;
use Docker\Stream\DockerRawStream;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ContainerLogs extends BaseEndpoint
{
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): DockerRawStream|EventsGetResponse200|null
    {
        if ($response->getStatusCode() === 200) {
            return new DockerRawStream(Stream::create($response->getBody()));
        }

        return parent::transformResponseBody($response, $serializer, $contentType);
    }
}
