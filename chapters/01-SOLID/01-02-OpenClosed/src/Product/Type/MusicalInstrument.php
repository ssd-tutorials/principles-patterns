<?php

namespace App\Product\Type;

use App\Product\Product;

class MusicalInstrument extends Product
{
    /**
     * Get shipping cost.
     *
     * @param int $qty
     * @return float
     */
    public function shipping(int $qty = 1) : float
    {
        $total = ($this->price * $qty);
        $weight = ($this->weight * $qty);

        if ($total > 500 && $weight < 100) {
            return 0.00;
        }

        return 13.00;
    }
}