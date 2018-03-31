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

        // 大人
        $adultCount = 0;
        foreach ($passengers->getAdults() as $passenger) {
            $adultCount++;
            $multiplier = 1;

            foreach ($this->definitions as $definition) {
                if ($definition->supports($passenger)) {
                    $multiplier = $multiplier * $definition->getMultiplier();
                }
            }

            $amount += $this->makeFare($baseFare, $multiplier);
        }

        // 子供料金
        foreach ($passengers->getChildren() as $passenger) {
            $multiplier = 1;

            foreach ($this->definitions as $definition) {
                if ($definition->supports($passenger)) {
                    $multiplier = $multiplier * $definition->getMultiplier();
                }
            }

            $amount += $this->makeFare($baseFare, $multiplier);
        }

        // 幼児
        $freeInfants = $this->getFreeInfantsCount($adultCount);
        $infants = [];
        foreach ($passengers->getInfants() as $passenger) {
            $multiplier = 1;

            foreach ($this->definitions as $definition) {
                if ($definition->supports($passenger)) {
                    $multiplier = $multiplier * $definition->getMultiplier();
                }
            }

            $fare = $this->makeFare($baseFare, $multiplier);
            $infants[] = [
                'passenger' => $passenger,
                'fare' => $fare,
            ];
        }
        // 料金高い順で無料幼児を削除
        if ($freeInfants > 0) {
            uasort($infants, function($a, $b){
                return $a['fare'] < $b['fare'];
            });
            $infants = array_slice($infants, $freeInfants);
        }
        foreach ($infants as $infantData) {
            $amount += $infantData['fare'];
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
        $fare = ceil($baseFare * $multiplier);
        $gap = $fare % 10;

        return $gap >= 1 ? ($fare - $gap + 10) : $fare;
    }

    /**
     * 無料幼児の人数
     *
     * @param int $adultCount
     * @return float|int
     */
    private function getFreeInfantsCount($adultCount)
    {
        return $adultCount * 2;
    }

}
