<?php

namespace App\Commands;

use App\Decorator\Logger\DatabaseDecorator;
use App\Decorator\Logger\EmailDecorator;
use App\Decorator\Logger\FileLogger;
use App\Decorator\Logger\LevelDecorator;
use App\Decorator\Logger\Service\Db;
use App\Decorator\Logger\Service\Email;
use App\Decorator\Logger\TimestampDecorator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoggerCommand extends Command
{
    public function configure(): void
    {
        $this->setName('logger');
        $this->setDescription('Logger command');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        echo "== Логирование файлов ==". PHP_EOL;

        $logger = new FileLogger('log.txt');
        $logger->log($message = 'Простое сообщение');
        $logger = new LevelDecorator($logger);
        $logger = new TimestampDecorator($logger);
        $logger = new EmailDecorator($logger, new Email());
        $logger = new DatabaseDecorator($logger, new Db());

        $logger->log($message);



        return Command::SUCCESS;
    }
}