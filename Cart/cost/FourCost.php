<?php

namespace App\Cart\cost;

class FourCost implements IntefraceCalculator
{
    private IntefraceCalculator $next;

    public function __construct(IntefraceCalculator $next)
    {

        $this->next = $next;
    }

    public function getCost($items)
    {
        $cost = $this->next->getCost($items);
        $k = 0;
        foreach ($items as $item) {
            if ($k % 4 === 3) {
                $cost -= $item->getCost() - 1;
            }
            $k++;
        }
        return $cost;
    }
}