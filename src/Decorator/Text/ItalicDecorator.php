<?php

namespace App\Decorator\Text;

use App\Decorator\Text\Interface\Decorator;
use App\Decorator\Text\Interface\Text;

class ItalicDecorator implements Decorator
{

    public function __construct(
        private readonly Text $text
    )
    {}

    public function render(): string
    {
        return '<i>' . $this->text->render() . '</i>';
    }
}