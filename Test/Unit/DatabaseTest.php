<?php

namespace App\Test\Unit;

use App\Cart\Cart;
use App\Cart\cost\SimpleCost;
use App\Cart\storage\SessionStorage;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    private $cart;

    public function setUp(): void
    {
        $this->cart = new Cart(new SessionStorage('cart'),new SimpleCost());
        parent::setUp();
    }

    public function testCreate()
    {
        $this->assertEquals([],$this->cart->getItems());
    }

    public function testAdd()
    {
        $this->cart->add(5,3,100);
        $this->assertEquals(1,count($items = $this->cart->getItems()));
        $this->assertEquals(5,$items[5]->getId());
        $this->assertEquals(3,$items[5]->getCount());
        $this->assertEquals(100,$items[5]->getPrice());
    }
    public function testAddExist()
    {
        $this->cart->add(5,2,100);
        $items = $this->cart->getItems();
        $this->assertEquals(1,$this->count($items));
        $this->assertEquals(5,$items[5]->getCount());
    }

    public function testRemove()
    {
        $this->cart->remove(5);
        $this->assertEquals([],$this->cart->getItems());
    }
    public function testClear()
    {
        $this->cart->clear();
        $this->assertEquals([],$this->cart->getItems());
    }
    public function testCost()
    {
        $this->cart->add(5,3,100);
        $this->cart->add(6,4,150);
        $this->assertEquals(900,$this->cart->getCost());
    }

}