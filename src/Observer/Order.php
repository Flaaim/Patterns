<?php

namespace App\Observer;

use DateTimeImmutable;
use SplObjectStorage;

class Order implements \SplSubject
{
    private int $id;
    private string $name;
    private Status $status;
    private DateTimeImmutable $date;

    private SplObjectStorage $observers;
    public function __construct(int $id, string $name, Status $status, DateTimeImmutable $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->date = $date;
        $this->observers = new SplObjectStorage();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getStatus(): Status
    {
        return $this->status;
    }
    public function setStatus(Status $newStatus): void
    {
        if($newStatus === $this->status) {
            throw new \DomainException('Status already set');
        }
        $clone = clone $this;
        $this->status = $newStatus;
        $this->status->notify(
            $clone->getStatus()->getValue(),
            $this->status->getValue()
        );
        $this->notify();
    }
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }
    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
        echo "Наблюдатель добавлен...". PHP_EOL;
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
        echo "Наблюдатель удален...". PHP_EOL;
    }

    public function notify(): void
    {
        foreach($this->observers as $observer) {
            /** @var \SplObserver $observer */
            $observer->update($this);
        }
    }
}