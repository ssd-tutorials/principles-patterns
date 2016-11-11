<?php

namespace App\Traits;

trait MultiStorey
{
    /**
     * Get number of floors.
     *
     * @return int
     */
    public function floors() : int
    {
        return $this->get('floors');
    }
}