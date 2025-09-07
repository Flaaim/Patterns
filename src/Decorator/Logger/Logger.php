<?php

namespace App\Decorator\Logger;

interface Logger
{
    public function log(string $message): void;
}