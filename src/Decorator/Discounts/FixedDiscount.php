<?php

namespace App\Decorator\Discounts;


use App\Decorator\Discounts\Abstract\AbstractDiscount;
use App\Decorator\Discounts\Interface\ProductInterface;

class FixedDiscount extends AbstractDiscount
{
    protected ProductInterface $product;
    protected float $discount;
    public function __construct(ProductInterface $product, float $discount)
    {
        parent::__construct($product);
        $this->product = $product;
        $this->discount = $discount;
    }

    public function getPrice(): float
    {
        return $this->product->getPrice() - $this->discount;
    }

    public function getDescription(): string
    {
        return $this->product->getDescription();
    }
}