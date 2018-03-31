<?php

namespace NagoyaPhp\Twelve\Passenger;

class Passenger
{
    /**
     * @var bool
     */
    private $pass;

    /**
     * @var bool
     */
    private $child;

    /**
     * @var bool
     */
    private $infantWithAdult;

    /**
     * @var bool
     */
    private $infant;

    /**
     * @var bool
     */
    private $welfare;

    /**
     * @param bool $pass
     * @param bool $child
     * @param bool $infantWithAdult
     * @param bool $infant
     * @param bool $welfare
     */
    public function __construct($pass = false, $child = false, $infantWithAdult = false, $infant = false, $welfare = false)
    {
        $this->pass = $pass;
        $this->child = $child;
        $this->infantWithAdult = $infantWithAdult;
        $this->infant = $infant;
        $this->welfare = $welfare;
    }

    /**
     * @return bool
     */
    public function isPass()
    {
        return $this->pass;
    }

    /**
     * @return bool
     */
    public function isChild()
    {
        return $this->child;
    }

    /**
     * @return bool
     */
    public function isInfant()
    {
        return $this->infant;
    }

    /**
     * @return bool
     */
    public function isWelfare()
    {
        return $this->welfare;
    }

    /**
     * @return bool
     */
    public function isInfantWithAdult()
    {
        return $this->infantWithAdult;
    }
}
