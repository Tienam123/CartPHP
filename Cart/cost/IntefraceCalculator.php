<?php

namespace App\Cart\cost;

use App\Cart\CartItem;

interface IntefraceCalculator
{
    /**
     * @param CartItem[] $items
     * @return float
     * */
    public function getCost($items);
}