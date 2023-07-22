<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class VolumeStatusItem extends ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
}
