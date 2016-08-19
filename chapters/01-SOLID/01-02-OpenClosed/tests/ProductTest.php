<?php


use App\Basket\Order;
use App\Product\Type\Gadget;
use App\Product\Type\Furniture;
use App\Product\Type\MusicalInstrument;
use App\Product\Type\Vehicle;

class ProductTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function correctly_calculates_shipping()
    {
        $order = new Order();

        $gadget = new Gadget(
            1,
            'Watch',
            30.45,
            0.50
        );

        $furniture = new Furniture(
            2,
            'Wardrobe',
            80.99,
            10.00
        );

        $vehicle = new Vehicle(
            3,
            'Car',
            15000.00,
            6000.00
        );

        $instrument = new MusicalInstrument(
            4,
            'Bass guitar',
            1200.50,
            99
        );

        $order
            ->add($gadget, 3)
            ->add($furniture)
            ->add($vehicle)
            ->add($instrument);

        $this->assertEquals(
            15.30,
            $order->shipping(),
            "Order does not return the correct shipping cost"
        );
    }

    /**
     * @test
     */
    public function correctly_identifies_product_type()
    {
        $gadget = new Gadget(
            1,
            'Watch',
            30.45,
            0.50
        );

        $this->assertTrue(
            $gadget->isGadget(),
            "Product::isGadget failed to identify isGadget"
        );

        $this->assertTrue(
            $gadget->is('Gadget'),
            "Product::is failed to identify Gadget"
        );

        $furniture = new Furniture(
            2,
            'Wardrobe',
            80.99,
            10.00
        );

        $this->assertTrue(
            $furniture->isFurniture(),
            "Product::isFurniture failed to identify Furniture"
        );

        $this->assertTrue(
            $furniture->is('Furniture'),
            "Product::is failed to identify Furniture"
        );

        $vehicle = new Vehicle(
            3,
            'Car',
            15000.00,
            6000.00
        );

        $this->assertTrue(
            $vehicle->isVehicle(),
            "Product::isVehicle failed to identify Vehicle"
        );

        $this->assertTrue(
            $vehicle->is('Vehicle'),
            "Product::is failed to identify Vehicle"
        );

        $instrument = new MusicalInstrument(
            4,
            'Bass guitar',
            1200.95,
            50
        );

        $this->assertTrue(
            $instrument->isMusicalInstrument(),
            "Product::isMusicalInstrument failed to identify MusicalInstrument"
        );

        $this->assertTrue(
            $instrument->is('MusicalInstrument'),
            "Product::is failed to identify MusicalInstrument"
        );
    }
}