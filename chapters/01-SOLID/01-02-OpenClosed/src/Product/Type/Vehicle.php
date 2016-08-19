<?php

namespace App\Product\Type;

use App\Product\Product;

class Vehicle extends Product
{
    /**
     * Get shipping cost.
     *
     * @return float
     */
    public function shipping() : float
    {
        return 0.00;
    }
}