<?php


namespace NagoyaPhp\Twelve\Fare;


use NagoyaPhp\Twelve\Passenger\Passenger;

class Pass implements FareDefinitionInterface
{
    public function supports(Passenger $passenger)
    {
        return $passenger->isPass();
    }

    public function getMultiplier()
    {
        return 0;
    }
}
