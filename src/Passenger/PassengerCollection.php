<?php


namespace NagoyaPhp\Twelve\Passenger;


class PassengerCollection
{
    /**
     * @var Passenger[]
     */
    private $adults;

    /**
     * @var Passenger[]
     */
    private $children;

    /**
     * @var Passenger[]
     */
    private $infants;

    /**
     * @param Passenger[] $adults
     * @param Passenger[] $children
     * @param Passenger[] $infants
     */
    public function __construct(array $adults, array $children, array $infants)
    {
        $this->adults = $adults;
        $this->children = $children;
        $this->infants = $infants;
    }

    public function getAdults()
    {
        return $this->adults;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getInfants()
    {
        return $this->infants;
    }
}
