<?php


namespace NagoyaPhp\Twelve\Fare;


use NagoyaPhp\Twelve\Passenger\PassengerCollection;

class FareCalculator
{
    /**
     * @var FareDefinitionInterface[]
     */
    private $definitions;

    /**
     * @param FareDefinitionInterface[] $definitions
     */
    public function __construct(array $definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * @param int $baseFare
     * @param PassengerCollection $passengers
     * @return float|int
     */
    public function calculate($baseFare, PassengerCollection $passengers)
    {
        $amount = 0;
        foreach ($passengers as $passenger) {
            $multiplier = 1;
            foreach ($this->definitions as $definition) {
                if ($definition->supports($passenger)) {
                    $multiplier = $multiplier * $definition->getMultiplier();
                }
            }

            $amount += $baseFare * $multiplier;
        }

        return $amount;
    }
}
