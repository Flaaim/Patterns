<?php

namespace App\Observer;

use DateTimeImmutable;
use SplObjectStorage;

class Order implements \SplSubject
{
    private int $id;
    private string $name;
    private string $status;
    private DateTimeImmutable $date;

    private SplObjectStorage $observers;
    public function __construct(int $id, string $name, string $status, DateTimeImmutable $date)
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
    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus(string $status): void
    {
        $this->status = $status;
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
        echo "Статус заказа изменен: новый статус -> ". $this->getStatus(). PHP_EOL;
        foreach($this->observers as $observer) {
            /** @var \SplObserver $observer */
            $observer->update($this);
        }
        echo "----". PHP_EOL;
    }
}