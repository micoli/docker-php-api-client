<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class ServiceSpecUpdateConfig extends ArrayObject
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
     * Maximum number of tasks to be updated in one iteration (0 means
     * unlimited parallelism).
     *
     * @var int|null
     */
    protected $parallelism;
    /**
     * Amount of time between updates, in nanoseconds.
     *
     * @var int|null
     */
    protected $delay;
    /**
     * Action to take if an updated task fails to run, or stops running
     * during the update.
     *
     * @var string|null
     */
    protected $failureAction;
    /**
     * Amount of time to monitor each updated task for failures, in
     * nanoseconds.
     *
     * @var int|null
     */
    protected $monitor;
    /**
     * The fraction of tasks that may fail during an update before the
     * failure action is invoked, specified as a floating point number
     * between 0 and 1.
     *
     * @var float|null
     */
    protected $maxFailureRatio;
    /**
     * The order of operations when rolling out an updated task. Either
     * the old task is shut down before the new task is started, or the
     * new task is started before the old task is shut down.
     *
     * @var string|null
     */
    protected $order;

    /**
     * Maximum number of tasks to be updated in one iteration (0 means
     * unlimited parallelism).
     */
    public function getParallelism(): ?int
    {
        return $this->parallelism;
    }

    /**
     * Maximum number of tasks to be updated in one iteration (0 means
     * unlimited parallelism).
     */
    public function setParallelism(?int $parallelism): self
    {
        $this->initialized['parallelism'] = true;
        $this->parallelism = $parallelism;

        return $this;
    }

    /**
     * Amount of time between updates, in nanoseconds.
     */
    public function getDelay(): ?int
    {
        return $this->delay;
    }

    /**
     * Amount of time between updates, in nanoseconds.
     */
    public function setDelay(?int $delay): self
    {
        $this->initialized['delay'] = true;
        $this->delay = $delay;

        return $this;
    }

    /**
     * Action to take if an updated task fails to run, or stops running
     * during the update.
     */
    public function getFailureAction(): ?string
    {
        return $this->failureAction;
    }

    /**
     * Action to take if an updated task fails to run, or stops running
     * during the update.
     */
    public function setFailureAction(?string $failureAction): self
    {
        $this->initialized['failureAction'] = true;
        $this->failureAction = $failureAction;

        return $this;
    }

    /**
     * Amount of time to monitor each updated task for failures, in
     * nanoseconds.
     */
    public function getMonitor(): ?int
    {
        return $this->monitor;
    }

    /**
     * Amount of time to monitor each updated task for failures, in
     * nanoseconds.
     */
    public function setMonitor(?int $monitor): self
    {
        $this->initialized['monitor'] = true;
        $this->monitor = $monitor;

        return $this;
    }

    /**
     * The fraction of tasks that may fail during an update before the
     * failure action is invoked, specified as a floating point number
     * between 0 and 1.
     */
    public function getMaxFailureRatio(): ?float
    {
        return $this->maxFailureRatio;
    }

    /**
     * The fraction of tasks that may fail during an update before the
     * failure action is invoked, specified as a floating point number
     * between 0 and 1.
     */
    public function setMaxFailureRatio(?float $maxFailureRatio): self
    {
        $this->initialized['maxFailureRatio'] = true;
        $this->maxFailureRatio = $maxFailureRatio;

        return $this;
    }

    /**
     * The order of operations when rolling out an updated task. Either
     * the old task is shut down before the new task is started, or the
     * new task is started before the old task is shut down.
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * The order of operations when rolling out an updated task. Either
     * the old task is shut down before the new task is started, or the
     * new task is started before the old task is shut down.
     */
    public function setOrder(?string $order): self
    {
        $this->initialized['order'] = true;
        $this->order = $order;

        return $this;
    }
}
