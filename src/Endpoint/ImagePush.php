<?php

declare(strict_types=1);

namespace Docker\Endpoint;

use Docker\API\Endpoint\ImagePush as BaseEndpoint;
use Docker\API\Model\EventsGetResponse200;
use Docker\Stream\PushStream;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ImagePush extends BaseEndpoint
{
    public function getUri(): string
    {
        return \str_replace(['{name}'], [\urlencode($this->name)], '/images/{name}/push');
    }

    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): PushStream|EventsGetResponse200|null
    {
        if ($response->getStatusCode() === 200) {
            return new PushStream(Stream::create($response->getBody()), $serializer);
        }

        return parent::transformResponseBody($response, $serializer, $contentType);
    }
}
