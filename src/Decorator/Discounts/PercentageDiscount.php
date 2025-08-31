<?php

namespace App\Decorator\Discounts;

use App\Decorator\Discounts\Abstract\AbstractDiscount;
use App\Decorator\Discounts\Interface\ProductInterface;

class PercentageDiscount extends AbstractDiscount
{

    public function __construct(
        private readonly ProductInterface $product,
        private readonly int $discount
    )
    {
        parent::__construct($product);
    }

    public function getPrice(): float
    {
        return $this->product->getPrice() - ($this->product->getPrice() * ($this->discount / 100));
    }

    public function getDescription(): string
    {
        return $this->product->getDescription();
    }
}