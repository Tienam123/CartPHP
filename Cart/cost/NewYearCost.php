<?php

namespace App\Cart\cost;

class NewYearCost implements IntefraceCalculator
{
    private  $next;
    private $month;
    private $percent;


    public function __construct(IntefraceCalculator $next, $month, $percent)
    {
        $this->next = $next;
        $this->month = $month;
        $this->percent = $percent;
    }

    public function getCost($items)
    {
        $cost = $this->next->getCost($items);
        if ($this->month == 12) {
            return (1 - $this->percent / 100) * $cost;
        } else {
            return $cost;
        }
    }
}