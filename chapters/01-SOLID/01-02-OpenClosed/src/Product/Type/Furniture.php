<?php

namespace App\Product\Type;

use App\Product\Product;

class Furniture extends Product
{
    /**
     * Get shipping cost.
     *
     * @param int $qty
     * @return float
     */
    public function shipping(int $qty = 1) : float
    {
        return ($qty * $this->weight) < 100 ? 15.30 : 0.00;
    }
}