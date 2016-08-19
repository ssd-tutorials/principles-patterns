<?php

namespace App\Product;

interface ProductContract
{
    /**
     * Get product id.
     *
     * @return int
     */
    public function id() : int;

    /**
     * Get product price.
     *
     * @return float
     */
    public function price() : float;

    /**
     * Get product weight.
     *
     * @return float
     */
    public function weight() : float;

    /**
     * Get shipping cost.
     *
     * @return float
     */
    public function shipping() : float;

    /**
     * Check if product has a given class name.
     *
     * @param string $className
     * @return bool
     */
    public function is(string $className) : bool;
}