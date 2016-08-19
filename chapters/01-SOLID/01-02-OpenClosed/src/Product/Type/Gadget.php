<?php

namespace App\Product\Type;

use App\Product\Product;

class Gadget extends Product
{
    /**
     * Get shipping cost.
     *
     * @param int $qty
     * @return float
     */
    public function shipping(int $qty = 1) : float
    {
        return ($this->price * $qty) < 50 ? 5.25 : 0.00;
    }
}