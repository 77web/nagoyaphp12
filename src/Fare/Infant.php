<?php


namespace NagoyaPhp\Twelve\Fare;


use NagoyaPhp\Twelve\Passenger\Passenger;

class Infant implements FareDefinitionInterface
{
    public function supports(Passenger $passenger)
    {
        return $passenger->isInfant() && !$passenger->isInfantWithAdult();
    }

    public function getMultiplier()
    {
        return 0.5;
    }
}
