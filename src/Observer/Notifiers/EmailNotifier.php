<?php

namespace App\Observer\Notifiers;

use App\Observer\Order;
use SplSubject;

class EmailNotifier implements \SplObserver
{
    public function update(SplSubject $subject): void
    {
        /** @var Order $subject */
        echo "Email отправлен на client@example.com: Заказ #" .
            $subject->getId(). ' сменил статус на: ' . $subject->getStatus()->getValue(). PHP_EOL;
    }
}