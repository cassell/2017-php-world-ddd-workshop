<?php

namespace Beeriously\Domain\Ingredients\Grains;

class DegreesLintner
{
    private const SYMBOL = "°L";

    // https://en.wikipedia.org/wiki/Degree_Lintner
    // Evaluation of a malt or extract is usually done by the manufacturer rather than by the end user; as a rule of thumb,
    // the total grain bill of a mash should have a diastatic power of at least 40 °L in order to guarantee efficient
    // conversion of all the starches in the mash to sugars.
    const MINIMUM_DIASTATIC_POWER_TO_CONVERT = 40;

    /**
     * @var int
     */
    private $degrees;

    public function __construct(int $degrees)
    {
        if($degrees < 0) {
            throw new \InvalidArgumentException;
        }
        $this->degrees = $degrees;
    }

    public function getValue()
    {
        return $this->degrees;
    }

    public function __toString()
    {
        return round($this->degrees,0) . " " . self::SYMBOL;
    }

    public function hasEnoughDiastaticPowerToConvert()
    {
        return $this->getValue() > self::MINIMUM_DIASTATIC_POWER_TO_CONVERT;
    }

}