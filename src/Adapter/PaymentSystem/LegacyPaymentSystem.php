<?php

namespace App\Adapter\PaymentSystem;

class LegacyPaymentSystem
{
    public function makePayment($sum, $curr) {
        // Старая логика
        echo "Оплата через старую систему: $sum $curr\n";
        return true;
    }

    public function checkStatus($transactionId) {
        return "completed";
    }
}