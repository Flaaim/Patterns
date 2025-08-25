<?php

namespace App\Observer\Notifiers;

use App\Observer\Interface\Observer;
use App\Observer\Interface\Subject;
use App\Observer\Order;

class SmsNotifier implements Observer
{

    public function notify(Subject $subject): void
    {
        /** @var Order $subject */
        echo "SMS отправлено на +79161234567: статус заказа #".$subject->getId(). ': '.$subject->getStatus() .PHP_EOL;
    }
}