<?php

namespace App\Observer\Notifiers;

use App\Observer\Interface\Observer;
use App\Observer\Interface\Subject;
use App\Observer\Order;

class EmailNotifier implements Observer
{

    public function notify(Subject $subject): void
    {
        /** @var Order $subject */
        echo "Email отправлен на client@example.com: Заказ #" .
            $subject->getId(). ' сменил статус на: ' . $subject->getStatus(). PHP_EOL;

    }
}