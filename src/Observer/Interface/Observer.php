<?php

namespace App\Observer\Interface;

interface Observer
{
    public function notify(Subject $subject): void;

}