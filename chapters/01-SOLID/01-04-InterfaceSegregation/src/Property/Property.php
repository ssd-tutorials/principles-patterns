<?php

namespace App\Property;

use App\Contracts\PropertyContract;

use Exception;

abstract class Property implements PropertyContract
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * Garage constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Get value associated with the property.
     *
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function get($name)
    {
        if ( ! array_key_exists($name, $this->attributes)) {
            throw new Exception("Property {$name} not found");
        }

        return $this->attributes[$name];
    }

    /**
     * Magically obtain the value associated with the property.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function address() : string
    {
        return $this->get('address');
    }

    /**
     * Get floor area.
     *
     * @return float
     */
    public function floorArea() : float
    {
        return $this->get('floorArea');
    }
}