<?php

namespace App\Decorator\Logger;

use App\Decorator\Discounts\Interface\ProductInterface;

class FileLogger implements Logger
{
    private readonly string $filename;
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }
    public function log(string $message): void
    {
        file_put_contents($this->filename, $message . PHP_EOL, FILE_APPEND);
    }
}