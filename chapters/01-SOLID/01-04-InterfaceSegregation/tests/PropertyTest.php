<?php


use App\Property\House;
use App\Property\Garage;
use App\Property\Apartment;

class PropertyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function garage_has_a_set_of_required_methods()
    {
        $garage = new Garage([
            'address' => '14 London Road, Brighton',
            'floorArea' => 32.5
        ]);

        $this->assertEquals(
            '14 London Road, Brighton',
            $garage->address()
        );

        $this->assertEquals(
            32.5,
            $garage->floorArea()
        );
    }

    /**
     * @test
     */
    public function apartment_has_a_set_of_required_methods()
    {
        $garage = new Apartment([
            'address' => '14 London Road, Brighton',
            'floorArea' => 32.5,
            'bedrooms' => 3,
            'bathrooms' => 1,
            'livingRooms' => 1
        ]);

        $this->assertEquals(
            '14 London Road, Brighton',
            $garage->address()
        );

        $this->assertEquals(
            32.5,
            $garage->floorArea()
        );

        $this->assertEquals(
            3,
            $garage->bedrooms()
        );

        $this->assertEquals(
            1,
            $garage->bathrooms()
        );

        $this->assertEquals(
            1,
            $garage->livingRooms()
        );
    }

    /**
     * @test
     */
    public function house_has_a_set_of_required_methods()
    {
        $garage = new House([
            'address' => '14 London Road, Brighton',
            'floorArea' => 32.5,
            'bedrooms' => 3,
            'bathrooms' => 1,
            'livingRooms' => 1,
            'studies' => 1
        ]);

        $this->assertEquals(
            '14 London Road, Brighton',
            $garage->address()
        );

        $this->assertEquals(
            32.5,
            $garage->floorArea()
        );

        $this->assertEquals(
            3,
            $garage->bedrooms()
        );

        $this->assertEquals(
            1,
            $garage->bathrooms()
        );

        $this->assertEquals(
            1,
            $garage->livingRooms()
        );

        $this->assertEquals(
            1,
            $garage->studies()
        );
    }
}