<?php

namespace App\Product;

use Error;
use ReflectionClass;

abstract class Product implements ProductContract
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $weight;

    /**
     * Product constructor.
     *
     * @param int $id
     * @param string $name
     * @param float $price
     * @param float $weight
     */
    public function __construct(
        int $id,
        string $name,
        float $price,
        float $weight
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    /**
     * Get product id.
     *
     * @return int
     */
    public function id() : int
    {
        return $this->id;
    }

    /**
     * Get product price.
     *
     * @return float
     */
    public function price() : float
    {
        return $this->price;
    }

    /**
     * Get product weight.
     *
     * @return float
     */
    public function weight() : float
    {
        return $this->weight;
    }

    /**
     * Check if product has a given class name.
     *
     * @param string $className
     * @return bool
     */
    public function is(string $className) : bool
    {
        return $className === (new ReflectionClass($this))->getShortName();
    }

    /**
     * Check if product is of a given type.
     *
     * @param string $name
     * @param array $arguments
     * @return bool
     * @throws Error
     */
    public function __call(string $name, array $arguments = []) : bool
    {
        $className = substr($name, 2);

        if ( ! $this->classExists($className)) {
            throw new Error("Invalid method call {$className}::{$name}");
        }

        return $this->is($className);
    }

    /**
     * Check if type class exists.
     *
     * @param string $className
     * @return bool
     */
    private function classExists(string $className) : bool
    {
        return class_exists(__NAMESPACE__ . "\\Type\\{$className}");
    }
}