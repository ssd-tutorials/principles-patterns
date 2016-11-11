<?php

namespace App\Device;

class Device
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * Device constructor.
     *
     * @param string $name
     * @param int $width
     * @param int $height
     */
    public function __construct(string $name, int $width, int $height)
    {
        $this->name = $name;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function name() : string
    {
        return $this->name;
    }

    /**
     * Get width.
     *
     * @return int
     */
    public function width() : int
    {
        return $this->width;
    }

    /**
     * Get height.
     *
     * @return int
     */
    public function height() : int
    {
        return $this->height;
    }

    /**
     * Get screen resolution.
     *
     * @return array
     */
    public function resolution() : array
    {
        return [
            $this->width(),
            $this->height()
        ];
    }
}