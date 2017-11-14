<?php

namespace Beeriously\Domain\Measurements\AlcoholConcentration;

use Beeriously\Domain\Measurements\SpecificGravity\GravityRange;

class AlcoholByVolume
{
    private $value;

    public function __construct(float $value)
    {
        if($value < 0 || $value > 100) {
            throw new \InvalidArgumentException;
        }
        $this->value = $value;
    }

    public static function fromGravityRange(GravityRange $range)
    {
        // https://www.homebrewersassociation.org/attachments/0000/2497/Math_in_Mash_SummerZym95.pdf
        // ABV =(76.08 * (og-fg) / (1.775-og)) * (fg / 0.794)
        // A%v = A%w (FG / 0.794)

        return new AlcoholByVolume(
            AlcoholByWeight::fromGravityRange($range)->getValue() * $range->getFinalGravity()
                  / AlcoholByWeight::DENSITY_OF_ETHANOL
        );
    }

    public function getValue(): float
    {
        return $this->value;
    }

}


