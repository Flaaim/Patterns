<?php

namespace App\Decorator\Discounts\Abstract;

use App\Decorator\Discounts\Interface\ProductInterface;

abstract class AbstractDiscount extends Product
{
    public function __construct(private readonly ProductInterface $product)
    {}

}