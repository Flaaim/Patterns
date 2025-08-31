<?php

namespace App\Decorator\Discounts\Interface;

interface ProductInterface
{
    public function getPrice(): float;
    public function getDescription(): string;
}