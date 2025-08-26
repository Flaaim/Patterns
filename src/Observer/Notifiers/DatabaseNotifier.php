<?php

namespace App\Observer\Notifiers;

use App\Observer\Order;
use App\Observer\Service\Filter;
use App\Observer\Status;
use SplSubject;

class DatabaseNotifier implements \SplObserver
{
    private array $allowedStatuses = [
        Status::STATUSES['new'],
        Status::STATUSES['processing'],
        Status::STATUSES['send'],
    ];
    private int $priority = 100;
    public function update(SplSubject $subject): void
    {
        /** @var Order $subject */
        if(Filter::byStatus($this->allowedStatuses, $subject->getStatus())){
            echo "Запись в базу данных: ".
                (new \DateTimeImmutable())->format('d.m.Y H:i:s') .
                " - Заказ #" . $subject->getId() .
                ': '. $subject->getStatus()->getValue() . PHP_EOL;
        }
    }
    public function getPriority(): int
    {
        return $this->priority;
    }
}