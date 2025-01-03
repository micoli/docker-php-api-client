<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class TaskLogs extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;
    protected $accept;

    /**
     * Get `stdout` and `stderr` logs from a task.
     * See also [`/containers/{id}/logs`](#operation/ContainerLogs).
     *
     **Note**: This endpoint works only for services with the `local`,
     * `json-file` or `journald` logging drivers.
     *
     * @param string $id ID of the task
     * @param array $queryParameters {
     *
     *     @var bool $details show task context and extra details provided to logs
     *     @var bool $follow keep connection after returning logs
     *     @var bool $stdout Return logs from `stdout`
     *     @var bool $stderr Return logs from `stderr`
     *     @var int $since Only return logs since this time, as a UNIX timestamp
     *     @var bool $timestamps Add timestamps to every log line
     *     @var string $tail Only return this number of log lines from the end of the logs.
     * Specify as an integer or `all` to output all log lines.
     *
     * }
     *
     * @param array $accept Accept content header application/json|text/plain
     */
    public function __construct(string $id, array $queryParameters = [], array $accept = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/tasks/{id}/logs');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/json', 'text/plain']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['details', 'follow', 'stdout', 'stderr', 'since', 'timestamps', 'tail']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['details' => false, 'follow' => false, 'stdout' => false, 'stderr' => false, 'since' => 0, 'timestamps' => false, 'tail' => 'all']);
        $optionsResolver->addAllowedTypes('details', ['bool']);
        $optionsResolver->addAllowedTypes('follow', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);
        $optionsResolver->addAllowedTypes('since', ['int']);
        $optionsResolver->addAllowedTypes('timestamps', ['bool']);
        $optionsResolver->addAllowedTypes('tail', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\TaskLogsNotFoundException
     * @throws \Docker\API\Exception\TaskLogsInternalServerErrorException
     * @throws \Docker\API\Exception\TaskLogsServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\TaskLogsNotFoundException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\TaskLogsInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 503 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\TaskLogsServiceUnavailableException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
