#!/usr/bin/env php
<?php


declare(strict_types=1);

require __DIR__. '/../vendor/autoload.php';

use App\Commands\DiscountCommand;
use App\Commands\LoggerCommand;
use App\Commands\OrderCommand;
use App\Commands\TextCommand;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new OrderCommand());
$application->add(new TextCommand());
$application->add(new DiscountCommand());
$application->add(new LoggerCommand());

$application->run();
