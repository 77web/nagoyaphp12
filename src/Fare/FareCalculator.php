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

            $amount += $this->makeFare($baseFare, $multiplier);
        }

        return $amount;
    }

    /**
     * 10円未満切り捨て
     *
     * @param int $baseFare
     * @param float $multiplier
     * @return int
     */
    private function makeFare($baseFare, $multiplier)
    {
        $fare = $baseFare * $multiplier;

        return round($fare, -1, PHP_ROUND_HALF_DOWN);
    }
}
