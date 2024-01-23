<?php

use App\Cart\CartItem;
use App\Cart\cost\SimpleCost;

class SimpleCostTest extends \PHPUnit\Framework\TestCase
{
    public function testCalculate()
    {
        $calculator = new SimpleCost();
        $this->assertEquals(1000,$calculator->getCost([
            5=>new CartItem(5,2,200),
            7=>new CartItem(7,4,150)
        ]));

    }
}