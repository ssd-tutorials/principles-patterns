<?php

namespace App\Formatter\FromArray\ToString;

class XFormatter implements Contract
{
    /**
     * Format array as string.
     *
     * @param array $array
     * @return string
     */
    public function format(array $array) : string
    {
        return implode("x", $array);
    }
}