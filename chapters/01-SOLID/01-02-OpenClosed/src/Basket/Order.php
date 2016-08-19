<?php

namespace App\Basket;

use App\Product\ProductContract;

class Order
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * Add product to the order.
     *
     * @param ProductContract $product
     * @param int $qty
     * @return Order
     */
    public function add(ProductContract $product, int $qty = 1) : Order
    {
        $this->items[$product->id()] = [
            'product' => $product,
            'qty' => $qty
        ];

        return $this;
    }

    /**
     * Check if order contains the product.
     *
     * @param ProductContract $product
     * @return bool
     */
    public function has(ProductContract $product) : bool
    {
        return array_key_exists($product->id(), $this->items);
    }

    /**
     * Remove product from the order.
     *
     * @param ProductContract $product
     * @return void
     */
    public function remove(ProductContract $product) : void
    {
        if ( ! $this->has($product)) {
            return;
        }

        unset($this->items[$product->id()]);
    }

    /**
     * Calculate shipping.
     *
     * @return float
     */
    public function shipping() : float
    {
        if (empty($this->items)) {
            return 0.00;
        }

        $total = array_sum(
            array_map([$this, 'productShipping'], $this->items)
        );

        return number_format($total, 2);
    }

    /**
     * Calculate product shipping.
     *
     * @param array $product
     * @return float
     */
    private function productShipping(array $product) : float
    {
        return $product['product']->shipping($product['qty']);
    }
}