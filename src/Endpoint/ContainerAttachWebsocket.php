<?php

declare(strict_types=1);

namespace Docker\Endpoint;

use Docker\API\Endpoint\ContainerAttachWebsocket as BaseEndpoint;
use Docker\API\Model\EventsGetResponse200;
use Docker\Stream\AttachWebsocketStream;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ContainerAttachWebsocket extends BaseEndpoint
{
    /**
     * @phpstan-return array{}
     */
    public function getExtraHeaders(): array
    {
        return \array_merge(
            parent::getExtraHeaders(),
            [
                'Host' => 'localhost',
                'Origin' => 'php://docker-php',
                'Upgrade' => 'websocket',
                'Connection' => 'Upgrade',
                'Sec-WebSocket-Version' => '13',
                'Sec-WebSocket-Key' => \base64_encode(\uniqid()),
            ],
        );
    }

    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): AttachWebsocketStream|EventsGetResponse200|null
    {
        if ($response->getStatusCode() === 101) {
            return new AttachWebsocketStream(Stream::create($response->getBody()));
        }

        return parent::transformResponseBody($response, $serializer, $contentType);
    }
}
