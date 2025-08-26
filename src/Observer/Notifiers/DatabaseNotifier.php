<?php

namespace App\Observer\Notifiers;

use App\Observer\Order;
use SplSubject;

class DatabaseNotifier implements \SplObserver
{
    private int $priority = 100;
    public function update(SplSubject $subject): void
    {
        /** @var Order $subject */
        echo "Запись в базу данных: ".
            (new \DateTimeImmutable())->format('d.m.Y H:i:s') .
            " - Заказ #" . $subject->getId() .
            ': '. $subject->getStatus()->getValue() . PHP_EOL;
    }
    public function getPriority(): int
    {
        return $this->priority;
    }
}