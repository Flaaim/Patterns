<?php

namespace App\Observer\Notifiers;

use App\Observer\Order;
use SplSubject;

class LoggerNotifier implements \SplObserver
{
    private int $priority = 50;
    public function update(SplSubject $subject): void
    {
        /** @var Order $subject */
        echo "Запись в лог: ".
            (new \DateTimeImmutable())->format('d.m.Y H:i:s') .
            " - Заказ #" . $subject->getId() .
            ': '. $subject->getStatus()->getValue() . PHP_EOL;
    }
    public function getPriority(): int
    {
        return $this->priority;
    }
}