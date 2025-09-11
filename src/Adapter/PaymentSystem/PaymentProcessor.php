<?php

namespace App\Adapter\PaymentSystem;

interface PaymentProcessor
{
    public function processPayment(float $amount, string $currency): bool;
}