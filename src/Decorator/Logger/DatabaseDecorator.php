<?php

namespace App\Decorator\Logger;

use App\Decorator\Logger\Service\Db;

class DatabaseDecorator extends Decorator
{
    private Db $db;
    public function __construct(Logger $logger, Db $db)
    {
        parent::__construct($logger);
        $this->db = $db;
    }
    public function log(string $message): void
    {
        $this->save($message);
        $this->logger->log($message);
    }
    private function save($message): void
    {
        $this->db->save($message);
    }
}