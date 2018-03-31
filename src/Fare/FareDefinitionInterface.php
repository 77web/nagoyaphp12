<?php


namespace NagoyaPhp\Twelve\Fare;


use NagoyaPhp\Twelve\Passenger\Passenger;

interface FareDefinitionInterface
{
    /**
     * @param Passenger $passenger
     * @return boolean
     */
    public function supports(Passenger $passenger);

    /**
     * @return float
     */
    public function getMultiplier();
}
