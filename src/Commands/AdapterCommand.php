<?php

namespace App\Commands;

use App\Adapter\LegacyPaymentSystem;
use App\Adapter\PaymentAdapter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class AdapterCommand extends Command
{
    public function configure(): void
    {
        $this->setName('adapter')->setDescription('Adapter payment system');
    }
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $paymentSystem = new PaymentAdapter(
            new LegacyPaymentSystem(),
        );

        $result = $paymentSystem->processPayment(10.00, 'RUB');
        if($result) {
            echo 'Success'.PHP_EOL;
            return Command::SUCCESS;
        }
        echo 'Fail'.PHP_EOL;
        return Command::FAILURE;
    }
}