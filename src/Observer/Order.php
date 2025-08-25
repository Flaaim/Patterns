<?php

namespace App\Observer;

use App\Observer\Interface\Observer;
use App\Observer\Interface\Subject;
use DateTimeImmutable;

class Order implements Subject
{
    private int $id;
    private string $name;
    private string $status;
    private DateTimeImmutable $date;

    private array $observers = [];
    public function __construct(int $id, string $name, string $status, DateTimeImmutable $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->date = $date;
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
        $this->update();
    }
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }
    public function attach(Observer $observer): void
    {
        if(in_array($observer, $this->observers, true)) {
            throw new \DomainException('Observer already attached');
        }
        $this->observers[] = $observer;
        echo "Наблюдатель добавлен...". PHP_EOL;
    }

    public function detach(Observer $observer): void
    {
        if($key = array_search($observer, $this->observers, true)) {
            unlink($this->observers[$key]);
            echo "Наблюдатель удален...". PHP_EOL;
        }
    }

    public function update(): void
    {
        echo "Статус заказа изменен: новый статус -> ". $this->getStatus(). PHP_EOL;
        foreach($this->observers as $observer) {
            /** @var Observer $observer */
            $observer->notify($this);
        }
        echo "----". PHP_EOL;
    }
}