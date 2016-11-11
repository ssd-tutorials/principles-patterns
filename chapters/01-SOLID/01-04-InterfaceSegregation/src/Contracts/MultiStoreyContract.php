<?php

namespace App\Contracts;

interface MultiStoreyContract
{
    /**
     * Get number of floors.
     *
     * @return int
     */
    public function floors() : int;
}