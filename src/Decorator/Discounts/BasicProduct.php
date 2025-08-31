<?php

namespace App\Decorator\Discounts;

use App\Decorator\Discounts\Interface\ProductInterface;

class BasicProduct implements ProductInterface
{
    private float $price;
    private string $name;
    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getDescription(): string
    {
        return $this->name;
    }
}