<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class BuildPrune extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var int $keep-storage Amount of disk space in bytes to keep for cache
     *     @var bool $all Remove all types of build cache
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the list of build cache objects.
     *
     * Available filters:
     *
     * - `until=<duration>`: duration relative to daemon's time, during which build cache was not used, in Go's duration format (e.g., '24h')
     * - `id=<id>`
     * - `parent=<id>`
     * - `type=<string>`
     * - `description=<string>`
     * - `inuse`
     * - `shared`
     * - `private`
     *
     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/build/prune';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['keep-storage', 'all', 'filters']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('keep-storage', ['int']);
        $optionsResolver->addAllowedTypes('all', ['bool']);
        $optionsResolver->addAllowedTypes('filters', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\BuildPruneInternalServerErrorException
     *
     * @return \Docker\API\Model\BuildPrunePostResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Docker\\API\\Model\\BuildPrunePostResponse200', 'json');
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\BuildPruneInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
