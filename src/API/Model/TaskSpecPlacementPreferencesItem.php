<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class TaskSpecPlacementPreferencesItem extends ArrayObject
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
     * @var TaskSpecPlacementPreferencesItemSpread|null
     */
    protected $spread;

    public function getSpread(): ?TaskSpecPlacementPreferencesItemSpread
    {
        return $this->spread;
    }

    public function setSpread(?TaskSpecPlacementPreferencesItemSpread $spread): self
    {
        $this->initialized['spread'] = true;
        $this->spread = $spread;

        return $this;
    }
}
