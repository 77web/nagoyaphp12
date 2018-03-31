<?php

namespace NagoyaPhp\Twelve\Fare;

use NagoyaPhp\Twelve\Passenger\Passenger;
use NagoyaPhp\Twelve\Passenger\PassengerCollection;
use PHPUnit\Framework\TestCase;

class FareCalculatorTest extends TestCase
{
    /**
     * @var FareCalculator
     */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new FareCalculator([
            new Infant(),
            new InfantWithAdult(),
            new Child(),
            new Welfare(),
            new Pass(),
        ]);
    }

    public function tearDown()
    {
        $this->SUT = null;
    }

    public function test_大人3人_通常料金100円()
    {
        $passengers = new PassengerCollection([
            new Passenger(),
            new Passenger(),
            new Passenger(),
        ]);

        $this->assertEquals(300, $this->SUT->calculate(100, $passengers));
    }

    public function test_福祉料金1人_通常料金100円()
    {
        $passengers = new PassengerCollection([
            new Passenger(false, false, false, false, true),
        ]);

        $this->assertEquals(50, $this->SUT->calculate(100, $passengers));
    }

    public function test_同伴幼児2名_通常料金100円()
    {
        $passengers = new PassengerCollection([
            new Passenger(false, false, true, false, false),
            new Passenger(false, false, true, false, false),
        ]);

        $this->assertEquals(0, $this->SUT->calculate(100, $passengers));
    }

    public function test_同伴じゃない幼児2名_通常料金100円()
    {
        $passengers = new PassengerCollection([
            new Passenger(false, false, false, true, false),
            new Passenger(false, false, false, true, false),
        ]);

        $this->assertEquals(100, $this->SUT->calculate(100, $passengers));
    }

    public function test_子供福祉_通常料金100円()
    {
        $passengers = new PassengerCollection([
            new Passenger(false, true, false, false, true),
        ]);

        $this->assertEquals(25, $this->SUT->calculate(100, $passengers));
    }
}
