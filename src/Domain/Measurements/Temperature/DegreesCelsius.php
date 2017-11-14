<?php

namespace Beeriously\Domain\Measurements\Temperature;


class DegreesCelsius implements Temperature
{
    use TemperatureFromString, TemperatureStringFormat;

    private const SYMBOL = "°C";

    private const FLOAT_PRECISION = 3;

    /**
     * @var float
     */
    private $degreesCelsius;

    public function __construct(float $value)
    {



    }

    public static function getSymbol(): string
    {
        return self::SYMBOL;
    }

    public static function fromFahrenheit(DegreesFahrenheit $fahrenheit): self
    {

    }

    public function getValue(): float
    {
        return $this->degreesCelsius;
    }

}