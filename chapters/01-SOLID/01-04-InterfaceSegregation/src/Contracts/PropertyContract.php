<?php

namespace App\Contracts;

interface PropertyContract
{
    /**
     * Get address.
     *
     * @return string
     */
    public function address() : string;

    /**
     * Get floor area.
     *
     * @return float
     */
    public function floorArea() : float;
}