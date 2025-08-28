<?php

namespace App\Commands;

use App\Decorator\Text\BoldDecorator;
use App\Decorator\Text\ItalicDecorator;
use App\Decorator\Text\PlainText;
use App\Decorator\Text\UnderlineDecorator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TextCommand extends Command
{
    public function configure(): void
    {
        $this->setName('text')
            ->setDescription('Decorator pattern');
    }
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        echo "== Декоратор текста ==". PHP_EOL;


        echo (new UnderlineDecorator(
            new ItalicDecorator(
                new BoldDecorator(
                    new PlainText('Обычный текст')
                )
            )
        ))->render().PHP_EOL;


        return Command::SUCCESS;
    }
}