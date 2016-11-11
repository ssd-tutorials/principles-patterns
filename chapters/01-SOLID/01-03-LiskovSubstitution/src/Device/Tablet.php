<?php

namespace App\Device;

class Tablet extends Device
{
    /**
     * Get width.
     *
     * @return int
     */
    public function width() : int
    {
        return $this->width * 3;
    }

    /**
     * Get height.
     *
     * @return int
     */
    public function height() : int
    {
        return $this->height * 3;
    }
}