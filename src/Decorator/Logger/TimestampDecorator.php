<?php

namespace App\Decorator\Logger;

class TimestampDecorator extends Decorator
{
    public function __construct(Logger $logger)
    {
        parent::__construct($logger);
    }
    public function log(string $message): void
    {
        $this->logger->log(
            (new \DateTimeImmutable())->format('d.M.Y'). " | " . $message . PHP_EOL);
    }

}