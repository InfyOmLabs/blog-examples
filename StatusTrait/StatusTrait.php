<?php

namespace App\Traits;

trait StatusTrait
{
    static $STATUS_PENDING = 0;
    static $STATUS_RUNNING = 1;
    static $STATUS_COMPLETED = 2;
    static $STATUS_FAILED = 3;

    public function makePending($saveRecord = true)
    {
        $this->{$this->getStatusColumn()} = static::$STATUS_PENDING;

        if ($saveRecord) {
            $this->save();
        }
    }

    /**
     * Get the name of the "status" column.
     *
     * @return string
     */
    public function getStatusColumn()
    {
        return defined('static::STATUS') ? static::STATUS : 'status';
    }

    public function isPending()
    {
        return $this->{$this->getStatusColumn()} == static::$STATUS_PENDING;
    }

    public function markRunning($saveRecord = true)
    {
        $this->{$this->getStatusColumn()} = static::$STATUS_RUNNING;

        if ($saveRecord) {
            $this->save();
        }
    }

    public function isRunning()
    {
        return $this->{$this->getStatusColumn()} == static::$STATUS_RUNNING;
    }

    public function markCompleted($saveRecord = true)
    {
        $this->{$this->getStatusColumn()} = static::$STATUS_COMPLETED;

        if ($saveRecord) {
            $this->save();
        }
    }

    public function isCompleted()
    {
        return $this->{$this->getStatusColumn()} == static::$STATUS_COMPLETED;
    }

    public function markFailed($saveRecord = true)
    {
        $this->{$this->getStatusColumn()} = static::$STATUS_FAILED;

        if ($saveRecord) {
            $this->save();
        }
    }

    public function isFailed()
    {
        return $this->{$this->getStatusColumn()} == static::$STATUS_FAILED;
    }
}