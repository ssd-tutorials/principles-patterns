<?php


use App\User\User;
use App\Device\Device;
use App\Device\Tablet;
use App\Formatter\FromArray\ToString\XFormatter;

class UserDeviceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function gets_correct_device_screen_resolution_with_device_instance()
    {
        $device = new Device(
            'ssdTablet',
            1024,
            768
        );

        $user = new User();
        $user->usesDevice($device);

        $this->assertEquals(
            "1024x768",
            $user->deviceScreenResolution(new XFormatter),
            "User::deviceScreenResolution returned incorrect value with Device"
        );
    }

    /**
     * @test
     */
    public function gets_correct_device_screen_resolution_with_tablet_instance()
    {
        $device = new Tablet(
            'ssdTablet',
            1024,
            768
        );

        $user = new User();
        $user->usesDevice($device);

        $this->assertEquals(
            "3072x2304",
            $user->deviceScreenResolution(new XFormatter),
            "User::deviceScreenResolution returned incorrect value with Tablet"
        );
    }
}