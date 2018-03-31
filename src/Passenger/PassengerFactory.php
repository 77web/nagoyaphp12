<?php


namespace NagoyaPhp\Twelve\Passenger;


class PassengerFactory
{
    /**
     * @param string $code
     * @return Passenger
     */
    public function createFromCode($code)
    {
        $isInfant = strpos($code, 'I') !== false;
        $isChild = strpos($code, 'C') !== false;
        $isWelfare = strpos($code, 'w') !== false;
        $isPass = strpos($code, 'p') !== false;

        return new Passenger($isPass, $isChild, $isInfant, $isWelfare);
    }
}
