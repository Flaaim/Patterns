<?php

namespace App\Decorator\Logger;

abstract class Decorator implements Logger
{
    protected Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

}