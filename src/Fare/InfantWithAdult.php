<?php


namespace NagoyaPhp\Twelve\Fare;


use NagoyaPhp\Twelve\Passenger\Passenger;

class InfantWithAdult implements FareDefinitionInterface
{
    public function supports(Passenger $passenger)
    {
        return $passenger->isInfantWithAdult();
    }

    public function getMultiplier()
    {
        return 0;
    }
}
