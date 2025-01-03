<?php

declare(strict_types=1);

namespace Docker\Endpoint;

use Docker\API\Endpoint\ContainerLogs as BaseEndpoint;
use Docker\API\Model\EventsGetResponse200;
use Docker\Stream\DockerRawStreamUntil;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class ContainerLogsUntil extends BaseEndpoint
{
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): DockerRawStreamUntil|EventsGetResponse200|null
    {
        if ($response->getStatusCode() === 200) {
            return new DockerRawStreamUntil(Stream::create($response->getBody()));
        }

        return parent::transformResponseBody($response, $serializer, $contentType);
    }
}
