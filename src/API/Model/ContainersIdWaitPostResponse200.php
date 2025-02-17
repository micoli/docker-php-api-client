<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class ContainersIdWaitPostResponse200 extends ArrayObject
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
     * Exit code of the container
     *
     * @var int|null
     */
    protected $statusCode;
    /**
     * container waiting error, if any
     *
     * @var ContainersIdWaitPostResponse200Error|null
     */
    protected $error;

    /**
     * Exit code of the container
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * Exit code of the container
     */
    public function setStatusCode(?int $statusCode): self
    {
        $this->initialized['statusCode'] = true;
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * container waiting error, if any
     */
    public function getError(): ?ContainersIdWaitPostResponse200Error
    {
        return $this->error;
    }

    /**
     * container waiting error, if any
     */
    public function setError(?ContainersIdWaitPostResponse200Error $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }
}
