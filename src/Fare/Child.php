<?php


namespace NagoyaPhp\Twelve\Fare;


use NagoyaPhp\Twelve\Passenger\Passenger;

class Child implements FareDefinitionInterface
{
    public function supports(Passenger $passenger)
    {
        return $passenger->isChild();
    }

    public function getMultiplier()
    {
        return 0.5;
    }
}
