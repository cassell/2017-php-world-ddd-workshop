<?php

namespace Beeriously\Tests\Unit\Domain\Measurements\Weight;

use Beeriously\Domain\Measurements\Weight\Kilogram;
use Beeriously\Domain\Measurements\Weight\Pounds;
use PHPUnit\Framework\TestCase;

class PoundsTest extends TestCase
{

    public function testGetValue()
    {
        $this->assertEquals(0.0,(new Pounds(0))->getValue());
        $this->assertEquals(1.0,(new Pounds(1))->getValue());
    }

    public function testToString()
    {
        $this->assertEquals("1.0000 lbs",(string)new Pounds(1));
    }

    public function testNegativeThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Weight may not be negative");
        new Pounds(-0.1);
    }

    public function testReduceBy()
    {
        // 10 - 6.1 = 3.9
        $this->assertEquals(3.9,(new Pounds(10))->reduceBy(new Pounds(6.1))->getValue());
    }

    public function testCantReduceBy()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Weight may not be negative");

        // 5 - 6.1 = -1.1
        (new Pounds(5))->reduceBy(new Pounds(6.1));
    }

    public function testFromKilos()
    {
        $this->assertEquals(0.9979,round(Pounds::fromKilograms(new Kilogram(2.2))->getValue(),4));
    }

}


