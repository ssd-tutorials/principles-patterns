<?php

namespace App\User;

use App\Device\Device;
use App\Formatter\FromArray\ToString\Contract as ArrayToStringFormatter;

class User
{
    /**
     * @var Device
     */
    private $device;

    /**
     * Associate device with user.
     *
     * @param Device $device
     */
    public function usesDevice(Device $device)
    {
        $this->device = $device;
    }

    /**
     * Get device resolution.
     *
     * @param ArrayToStringFormatter $formatter
     * @return string
     */
    public function deviceScreenResolution(ArrayToStringFormatter $formatter) : string
    {
        return $formatter->format($this->device->resolution());
    }
}