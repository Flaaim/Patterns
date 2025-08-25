<?php

namespace App\Observer\Notifiers;

use App\Observer\Interface\Observer;
use App\Observer\Interface\Subject;
use App\Observer\Order;

class LoggerNotifier implements Observer
{

    public function notify(Subject $subject): void
    {
       /** @var Order $subject */
        echo "Запись в лог: ".
            (new \DateTimeImmutable())->format('d.m.Y H:i:s') .
                " - Заказ #" . $subject->getId() .
                    ': '. $subject->getStatus() . PHP_EOL;
    }
}