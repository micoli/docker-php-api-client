<?php

declare(strict_types=1);

namespace Docker\Endpoint;

use Docker\API\Endpoint\ImageCreate as BaseEndpoint;
use Docker\API\Model\EventsGetResponse200;
use Docker\Stream\CreateImageStream;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ImageCreate extends BaseEndpoint
{
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): CreateImageStream|EventsGetResponse200|null
    {
        if ($response->getStatusCode() === 200) {
            return new CreateImageStream(Stream::create($response->getBody()), $serializer);
        }

        return parent::transformResponseBody($response, $serializer, $contentType);
    }
}
