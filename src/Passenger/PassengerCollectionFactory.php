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
        $infants = [];
        $children = [];
        $adults = [];
        foreach ($passengerCodes as $passengerCode) {
            $passenger = $this->passengerFactory->createFromCode($passengerCode);
            if ($passenger->isInfant()) {
                $infants[] = $passenger;
            } elseif ($passenger->isChild()) {
                $children[] = $passenger;
            } else {
                $adults[] = $passenger;
            }
        }

        return new PassengerCollection($adults, $children, $infants);
    }
}
