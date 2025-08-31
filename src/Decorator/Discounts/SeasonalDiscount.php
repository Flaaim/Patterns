<?php

namespace App\Decorator\Discounts;


use App\Decorator\Discounts\Interface\Product;

class SeasonalDiscount
{

    public function __construct(
        private readonly Product $product
    )
    {}

    public function getPrice(): float
    {
        return $this->product->getPrice();
    }

    public function getDescription(): string
    {
        return $this->product->getDescription();
    }
}