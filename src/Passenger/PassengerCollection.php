<?php


namespace NagoyaPhp\Twelve\Passenger;


class PassengerCollection extends \ArrayIterator
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
     * @param Passenger[] $passengers
     */
    public function __construct(array $passengers)
    {
        parent::__construct($passengers);

        $this->adults = array_filter($passengers, function(Passenger $passenger){
            return !$passenger->isChild() && !$passenger->isInfant();
        });
        $this->children = array_filter($passengers, function(Passenger $passenger){
            return $passenger->isChild();
        });
        $this->infants = array_filter($passengers, function(Passenger $passenger){
            return $passenger->isInfant();
        });
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
