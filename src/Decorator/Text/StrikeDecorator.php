<?php

namespace App\Decorator\Text;

use App\Decorator\Text\Interface\Decorator;
use App\Decorator\Text\Interface\Text;

class StrikeDecorator implements Decorator
{

    public function __construct(private readonly Text $text)
    {
    }

    public function render(): string
    {
        return '<s>'. $this->text->render(). '</s>';
    }
}