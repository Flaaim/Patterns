<?php

namespace App\Observer;

class Status
{
    public const STATUSES = [
        'new' => 'Создан',
        'processing' => 'В обработке',
        'send' => 'Отправлен',
        'completed' => 'Завершен'
    ];
    private string $value;
    private function __construct(string $value)
    {
        $this->value = $value;
    }
    public static function new(): self
    {
        return new self(self::STATUSES['new']);
    }
    public static function processing(): self
    {
        return new self(self::STATUSES['processing']);
    }
    public static function send(): self
    {
        return new self(self::STATUSES['send']);
    }
    public function completed(): self
    {
        return new self(self::STATUSES['completed']);
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