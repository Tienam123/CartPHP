<?php
namespace App\Test\Unit;
use App\Cart\CartItem;
use App\Cart\storage\SessionStorage;
use PHPUnit\Framework\TestCase;

class SessionStorageTest extends TestCase
{

    public function testCreate()
    {
        $storage = new SessionStorage('cart');
        $this->assertEquals([],$storage->load());
    }

    public function testStore()
    {
        $storage = new SessionStorage('cart');
        $storage->save([5=> new CartItem(5,11,500)]);
        $this->assertEquals(1,count($items = $storage->load()));
        $this->assertNotNull($items[5]);
        $this->assertEquals(5,$items[5]->getId());
        $this->assertEquals(11,$items[5]->getCount());
        $this->assertEquals(500,$items[5]->getPrice());
    }
}