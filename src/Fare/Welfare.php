<?php


namespace NagoyaPhp\Twelve\Fare;

use NagoyaPhp\Twelve\Passenger\Passenger;

class Welfare implements FareDefinitionInterface
{
    public function supports(Passenger $passenger)
    {
        return $passenger->isWelfare();
    }

    public function getMultiplier()
    {
        return 0.5;
    }
}
