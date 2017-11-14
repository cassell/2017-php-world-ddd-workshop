<?php

namespace Beeriously\Domain\Measurements\AlcoholConcentration;

use Beeriously\Domain\Measurements\SpecificGravity\GravityRange;

class AlcoholByWeight
{
    const DENSITY_OF_ETHANOL = 0.789;

    private $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException;
        }
        $this->value = $value;
    }

    public static function fromGravityRange(GravityRange $range)
    {
        // https://www.homebrewersassociation.org/attachments/0000/2497/Math_in_Mash_SummerZym95.pdf
        // ABW (A%w) =     OE - RE
        //             ---------------
        //              2.0665 - 0.10665 OE
        //
        // ABW (A%w) = 76.08 (OG – FG)
        //             ---------------
        //              1.775  - OG
        return new AlcoholByWeight(
            ( 76.08 * ($range->getOriginalGravity()->getValue() - $range->getFinalGravity()->getValue()))
                      /
                  (1.775 - $range->getOriginalGravity()->getValue())
        );
    }



    public function getValue(): float
    {
        return $this->value;
    }

}