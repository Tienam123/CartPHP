<?php

namespace App\Cart;

class CartItem
{
    private $id;
    private $count;
    private $price;

    public function __construct($id, $count, $price)
    {
        $this->id = $id;
        $this->count = $count;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCount()
    {
        return $this->count;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function getCost()
    {
        return $this->getCount() * $this->getPrice();
    }
}