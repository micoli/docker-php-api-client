<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class NetworkingConfig extends ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @var EndpointSettings[]|null
     */
    protected $endpointsConfig;

    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @return EndpointSettings[]|null
     */
    public function getEndpointsConfig(): ?iterable
    {
        return $this->endpointsConfig;
    }

    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @param EndpointSettings[]|null $endpointsConfig
     */
    public function setEndpointsConfig(?iterable $endpointsConfig): self
    {
        $this->initialized['endpointsConfig'] = true;
        $this->endpointsConfig = $endpointsConfig;

        return $this;
    }
}
