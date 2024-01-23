<?php

namespace App\Cart\cost;

class SimpleCost implements IntefraceCalculator
{
    public function getCost($items)
    {
        $cost = 0;
        foreach ($items as $item) {
            $cost += $item->getCost();
        }
        return $cost;
    }
}