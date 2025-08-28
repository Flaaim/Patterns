<?php

namespace App\Decorator\Text;

use App\Decorator\Text\Interface\Text;

class PlainText implements Text
{
    private string $value;
    public function __construct(string $value)
    {
        $this->value = $value;
    }
    public function render(): string
    {
        return $this->value;
    }
}