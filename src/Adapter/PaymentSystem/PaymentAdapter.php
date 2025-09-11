<?php

namespace App\Adapter\PaymentSystem;

class PaymentAdapter implements PaymentProcessor
{
    private LegacyPaymentSystem $paymentSystem;

    public function __construct(LegacyPaymentSystem $paymentSystem)
    {
        $this->paymentSystem = $paymentSystem;
    }
    public function processPayment(float $amount, string $currency): bool
    {
        $this->paymentSystem->makePayment($amount, $currency);
        if($this->paymentSystem->checkStatus('some_id')){
            return true;
        }
        return false;
    }
}