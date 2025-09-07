<?php

namespace App\Decorator\Logger;

use App\Decorator\Logger\Service\Email;

class EmailDecorator extends Decorator
{
    private Email $service;
    public function __construct(Logger $logger, Email $service)
    {
        parent::__construct($logger);
        $this->service = $service;
    }
    public function log(string $message): void
    {
        $this->logger->log($message);
        if($this->shouldSendEmail($message)){
            $this->service->send($message);
        }
    }

    private function shouldSendEmail($message): bool
    {
        return str_contains($message, 'ERROR');
    }
}