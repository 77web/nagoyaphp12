<?php


namespace NagoyaPhp\Twelve\Passenger;


class PassengerCollectionFactory
{
    /**
     * @var PassengerFactory
     */
    private $passengerFactory;

    /**
     * @param PassengerFactory $passengerFactory
     */
    public function __construct(PassengerFactory $passengerFactory)
    {
        $this->passengerFactory = $passengerFactory;
    }

    /**
     * @param string[] $passengerCodes
     * @return PassengerCollection
     */
    public function create(array $passengerCodes)
    {
        $passengers = [];
        foreach ($passengerCodes as $passengerCode) {
            $passengers[] = $this->passengerFactory->createFromCode($passengerCode);
        }

        return new PassengerCollection($passengers);
    }
}
