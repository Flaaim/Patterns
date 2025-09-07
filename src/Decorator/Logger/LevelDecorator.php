<?php

namespace App\Decorator\Logger;

class LevelDecorator extends Decorator
{
    public const LEVELS = [
        'INFO',
        'NOTICE',
        'WARNING',
        'ERROR',
    ];
    public function __construct($logger)
    {
        parent::__construct($logger);
    }
    public function log(string $message): void
    {
        $message = $this->getLevel() . " | " . $message;
        $this->logger->log($message);
    }

    private function getLevel(): string
    {
        return self::LEVELS[rand(0, count(self::LEVELS) - 1)];
    }

}