<?php

namespace App\Decorator\Text;

use App\Decorator\Text\Interface\Decorator;
use App\Decorator\Text\Interface\Text;

class UnderlineDecorator implements Decorator
{

    public function __construct(private readonly Text $text)
    {}

    public function render(): string
    {
        return '<u>'.$this->text->render().'</u>';
    }
}