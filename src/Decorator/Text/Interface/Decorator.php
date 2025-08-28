<?php

namespace App\Decorator\Text\Interface;

interface Decorator extends Text
{
    public function __construct(Text $text);

}