<?php


namespace NagoyaPhp\Twelve\Passenger;

use PHPUnit\Framework\TestCase;

class PassengerFactoryTest extends TestCase
{
    /**
     * @var PassengerFactory
     */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new PassengerFactory();
    }

    public function test_adult()
    {
        $this->assertAdult($this->SUT->createFromCode('A'));
    }


    public function test_child()
    {
        $infant = $this->SUT->createFromCode('C');
        $this->assertTrue($infant->isChild());
    }

    public function test_infant()
    {
        $infant = $this->SUT->createFromCode('I');
        $this->assertTrue($infant->isInfant());
    }

    public function test_pass()
    {
        $pass = $this->SUT->createFromCode('Cp');
        $this->assertTrue($pass->isPass());
    }

    public function test_welfare_child()
    {
        $passenger = $this->SUT->createFromCode('Cw');
        $this->assertTrue($passenger->isChild());
        $this->assertTrue($passenger->isWelfare());
    }

    private function assertAdult(Passenger $passenger)
    {
        $this->assertFalse($passenger->isChild());
        $this->assertFalse($passenger->isInfant());
    }
}
