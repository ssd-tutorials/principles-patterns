<?php

namespace App\Traits;

trait LargeResidential
{
    use Residential;

    /**
     * Get number of study rooms.
     *
     * @return int
     */
    public function studies() : int
    {
        return $this->get('studies');
    }
}