<?php

namespace App\Decorator\Discounts\Abstract;

use App\Decorator\Discounts\Interface\ProductInterface;

abstract class Product implements ProductInterface
{
    abstract public function getPrice(): float;
    abstract public function getDescription(): string;
}