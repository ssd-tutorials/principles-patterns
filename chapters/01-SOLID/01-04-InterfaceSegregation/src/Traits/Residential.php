<?php

namespace App\Traits;

trait Residential
{
    /**
     * Get number of bedrooms.
     *
     * @return int
     */
    public function bedrooms() : int
    {
        return $this->get('bedrooms');
    }

    /**
     * Get number of bathrooms.
     *
     * @return int
     */
    public function bathrooms() : int
    {
        return $this->get('bathrooms');
    }

    /**
     * Get number of livingRooms
     *
     * @return int
     */
    public function livingRooms() : int
    {
        return $this->get('livingRooms');
    }
}