<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class IPAM extends ArrayObject
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
     * Name of the IPAM driver to use.
     *
     * @var string|null
     */
    protected $driver = 'default';
    /**
     * List of IPAM configuration options, specified as a map:
     *
     * ```
     * {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
     * ```
     *
     * @var string[][]|null
     */
    protected $config;
    /**
     * Driver-specific options, specified as a map.
     *
     * @var string[]|null
     */
    protected $options;

    /**
     * Name of the IPAM driver to use.
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * Name of the IPAM driver to use.
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * List of IPAM configuration options, specified as a map:
     *
     * ```
     * {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
     * ```
     *
     * @return string[][]|null
     */
    public function getConfig(): ?array
    {
        return $this->config;
    }

    /**
     * List of IPAM configuration options, specified as a map:
     *
     * ```
     * {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
     * ```
     *
     * @param string[][]|null $config
     */
    public function setConfig(?array $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @return string[]|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @param string[]|null $options
     */
    public function setOptions(?iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }
}
