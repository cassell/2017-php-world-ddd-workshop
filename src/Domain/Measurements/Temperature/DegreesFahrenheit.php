<?php

namespace Beeriously\Domain\Measurements\Temperature;

class DegreesFahrenheit implements Temperature
{
    private const SYMBOL = "°F";

    /**
     * @var float
     */
    private $degreesFahrenheit;

    public function __construct(float $value)
    {















    }

    public function __toString(): string
    {

        
    }

    public static function getSymbol(): string
    {
        return self::SYMBOL;
    }

    public function getValue(): float
    {
        return $this->degreesFahrenheit;
    }


    public static function fromCelsius(DegreesCelsius $degreesCelsius): self
    {





    }


}