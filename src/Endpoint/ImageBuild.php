<?php

declare(strict_types=1);

namespace Docker\Endpoint;

use Docker\API\Endpoint\ImageBuild as BaseEndpoint;
use Docker\API\Model\EventsGetResponse200;
use Docker\Stream\BuildStream;
use Docker\Stream\TarStream;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ImageBuild extends BaseEndpoint
{
    /** @return array{array{'Content-Type': array{'application/octet-stream'}}} */
    public function getBody(SerializerInterface $serializer, mixed $streamFactory = null): array
    {
        $body = $this->body;

        if (\is_resource($body)) {
            $body = new TarStream(Stream::create($body));
        }

        return [['Content-Type' => ['application/octet-stream']], $body];
    }

    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, string $contentType = null): BuildStream|EventsGetResponse200|null
    {
        if ($response->getStatusCode() === 200) {
            return new BuildStream(Stream::create($response->getBody()), $serializer);
        }

        return parent::transformResponseBody($response, $serializer, $contentType);
    }
}
