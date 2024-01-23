<?php

namespace App\Cart\cost;

class DummyCost implements IntefraceCalculator
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getCost($items)
    {
        return $this->value;
    }
}