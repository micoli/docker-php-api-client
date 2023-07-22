<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ImageList extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.
     *
     * @param array $queryParameters {
     *
     *     @var bool $all Show all images. Only images from a final layer (no children) are shown by default.
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the images list.
     *
     * Available filters:
     *
     * - `before`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     * - `dangling=true`
     * - `label=key` or `label="key=value"` of an image label
     * - `reference`=(`<image-name>[:<tag>]`)
     * - `since`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     *     @var bool $digests Show digest information as a `RepoDigests` field on each image.
     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/images/json';
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
        $optionsResolver->setDefined(['all', 'filters', 'digests']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['all' => false, 'digests' => false]);
        $optionsResolver->addAllowedTypes('all', ['bool']);
        $optionsResolver->addAllowedTypes('filters', ['string']);
        $optionsResolver->addAllowedTypes('digests', ['bool']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ImageListInternalServerErrorException
     *
     * @return \Docker\API\Model\ImageSummary[]|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Docker\\API\\Model\\ImageSummary[]', 'json');
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\ImageListInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
