<?php

namespace App\Observer\Notifiers;

use App\Observer\Order;
use SplSubject;

class SmsNotifier implements \SplObserver
{
    public function update(SplSubject $subject): void
    {
        /** @var Order $subject */
        echo "SMS отправлено на +79161234567: статус заказа #".$subject->getId(). ': '.$subject->getStatus()->getValue() .PHP_EOL;
    }
}