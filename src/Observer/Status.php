<?php

namespace App\Observer;

class Status
{
    public const NEW = 'Создан';
    public const PROCESSING = 'В обработке';
    public const SEND = 'Отправлен';
    public const COMPLETED = 'Завершен';
    private string $value;
    private function __construct(string $value)
    {
        $this->value = $value;
    }
    public static function new(): self
    {
        return new self(self::NEW);
    }
    public static function processing(): self
    {
        return new self(self::PROCESSING);
    }
    public static function send(): self
    {
        return new self(self::SEND);
    }
    public function completed(): self
    {
        return new self(self::COMPLETED);
    }
    public function getValue(): string
    {
        return $this->value;
    }
    public function notify($oldStatus, $newStatus): void
    {
        echo "Статус заказа изменен: ". $oldStatus ." -> ". $newStatus. PHP_EOL;
        echo "----". PHP_EOL;
    }
}