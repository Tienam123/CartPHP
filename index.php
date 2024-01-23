<?php
require_once "./vendor/autoload.php";


use App\Cart\Cart;
use App\Cart\cost\SimpleCost;
use App\Cart\storage\SessionStorage;
$storage = new SessionStorage('cart');
$cart = new Cart($storage,new SimpleCost());
$cart->add(5,3,100);
$cart->add(3,2,100);
$cart->add(1,4,100);
var_dump($cart->getCost());
