<?php

namespace App\Observer\Notifiers;

use App\Observer\Order;
use App\Observer\Service\Filter;
use App\Observer\Status;
use SplSubject;

class SmsNotifier implements \SplObserver
{
    private array $allowedStatuses = [
        Status::STATUSES['processing'],
        Status::STATUSES['send'],
    ];
    private int $priority = 30;
    public function update(SplSubject $subject): void
    {
        /** @var Order $subject */
        if(Filter::byStatus($this->allowedStatuses, $subject->getStatus())){
            echo "SMS отправлено на +79161234567: статус заказа #".$subject->getId(). ': '.$subject->getStatus()->getValue() .PHP_EOL;
        }

    }
    public function getPriority(): int
    {
        return $this->priority;
    }
}