<?php

namespace App\Cart\storage;

interface StorageInterface
{
    public function load();

    public function save(array $items);
    public function destroy();

}
