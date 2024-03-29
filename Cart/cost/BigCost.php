<?php

namespace App\Cart\cost;

class BigCost implements IntefraceCalculator
{
    private  $next;
    private $limit;
    private $percent;


    public function __construct(IntefraceCalculator $next, $limit, $percent)
    {
        $this->next = $next;
        $this->limit = $limit;
        $this->percent = $percent;
    }

    public function getCost($items)
    {
        $cost = $this->next->getCost($items);
        if ($cost > $this->limit) {
            return (1 - $this->percent / 100) * $cost;
        } else {
            return $cost;
        }
    }
}