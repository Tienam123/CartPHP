<?php

namespace App\Cart\cost;

use http\Exception\InvalidArgumentException;

class MinCost implements IntefraceCalculator
{
    private $calculators;
    public function __construct()
    {
        $calculators = func_get_args();
        foreach ($calculators as $calculator) {
            if (!$calculator instanceof IntefraceCalculator) {
                throw new InvalidArgumentException('Invalid calculator');
            }
        }
        $this->calculators = $calculators;
    }

    public function getCost($items)
    {
        $costs = [];
        foreach ($this->calculators as $calculator) {
            $costs[] = $calculator->getCost($items);
        }
        return min($costs);
    }
}