<?php


namespace NagoyaPhp\Twelve;


use NagoyaPhp\Twelve\Fare\FareCalculator;
use NagoyaPhp\Twelve\Passenger\PassengerCollectionFactory;

class App
{
    /**
     * @var PassengerCollectionFactory
     */
    private $passengerCollectionFactory;

    /**
     * @var FareCalculator
     */
    private $fareCalculator;


    public function run($input)
    {
        list($baseFare, $passengerCodes) = explode(':', $input);

        $passengerCodeList = explode(',', $passengerCodes);
        $passengerCollection = $this->passengerCollectionFactory->create($passengerCodeList);


        return $this->fareCalculator->calculate($baseFare, $passengerCollection);
    }
}
