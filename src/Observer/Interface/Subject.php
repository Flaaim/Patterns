<?php

namespace App\Observer\Interface;

interface Subject
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function update(): void;
}