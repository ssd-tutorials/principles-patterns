<?php

namespace App\Contracts;

interface LargeResidentialContract extends ResidentialContract
{
    /**
     * Get number of study rooms.
     *
     * @return int
     */
    public function studies() : int;
}