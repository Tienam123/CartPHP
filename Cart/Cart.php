<?php

namespace App\Cart;

use App\Cart\cost\IntefraceCalculator;
use App\Cart\storage\StorageInterface;

class Cart
{
    private $items;
    private $storage;
    private $calculator;

    public function __construct(StorageInterface $storage,IntefraceCalculator $calculator)
    {
        $this->storage = $storage;
        $this->calculator = $calculator;
    }

    public function getItems()
    {
        $this->loadItems();
        return $this->items;
    }


    public function add($id, $count, $price)
    {
        $this->loadItems();
        $current = isset($this->items[$id]) ? $this->items[$id]->getCount() : 0;
        $this->items[$id] = new CartItem($id, $current + $count, $price);
        $this->saveItems();
    }

    public function remove($id)
    {
        $this->items = $this->getItems();
        if (array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
        }
        $this->saveItems();
    }

    public function clear()
    {
        $this->items = [];
    }

    public function getCost()
    {
        $this->loadItems();
       return $this->calculator->getCost($this->items);
    }

    private function loadItems()
    {
        if ($this->items === null) {
            $this->items = $this->storage->load();

        }
    }

    private function saveItems()
    {
        $this->storage->save($this->items);
    }
}