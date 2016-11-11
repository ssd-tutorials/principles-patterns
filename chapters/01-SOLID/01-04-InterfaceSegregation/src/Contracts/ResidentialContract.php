<?php

namespace App\Contracts;

interface ResidentialContract
{
    /**
     * Get number of bedrooms.
     *
     * @return int
     */
    public function bedrooms() : int;

    /**
     * Get number of bathrooms.
     *
     * @return int
     */
    public function bathrooms() : int;

    /**
     * Get number of livingRooms
     *
     * @return int
     */
    public function livingRooms() : int;
}