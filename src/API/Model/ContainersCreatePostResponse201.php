<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class ContainersCreatePostResponse201 extends ArrayObject
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
     * The ID of the created container
     *
     * @var string|null
     */
    protected $id;
    /**
     * Warnings encountered when creating the container
     *
     * @var string[]|null
     */
    protected $warnings;

    /**
     * The ID of the created container
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of the created container
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Warnings encountered when creating the container
     *
     * @return string[]|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * Warnings encountered when creating the container
     *
     * @param string[]|null $warnings
     */
    public function setWarnings(?array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }
}
