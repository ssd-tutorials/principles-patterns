<?php

namespace App\Formatter\FromArray\ToString;

interface Contract
{
    /**
     * Format array as string.
     *
     * @param array $array
     * @return string
     */
    public function format(array $array) : string;
}