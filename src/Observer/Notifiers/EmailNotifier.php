<?php

namespace App\Observer\Notifiers;

use App\Observer\Order;
use App\Observer\Service\Filter;
use App\Observer\Status;
use SplSubject;

class EmailNotifier implements \SplObserver
{
    private array $allowedStatuses = [
        Status::STATUSES['new'],
        Status::STATUSES['send'],
    ];
    private int $priority = 90;
    public function update(SplSubject $subject): void
    {
        /** @var Order $subject */
        if(Filter::byStatus($this->allowedStatuses, $subject->getStatus())) {
            echo "Email отправлен на client@example.com: Заказ #" .
                $subject->getId(). ' сменил статус на: ' . $subject->getStatus()->getValue(). PHP_EOL;
        }
    }
    public function getPriority(): int
    {
        return $this->priority;
    }
}