<?php

namespace App\Commands;

use App\Observer\Notifiers\DatabaseNotifier;
use App\Observer\Notifiers\EmailNotifier;
use App\Observer\Notifiers\LoggerNotifier;
use App\Observer\Notifiers\SmsNotifier;
use App\Observer\Order;
use App\Observer\Priority;
use App\Observer\Service\Sorting;
use App\Observer\Status;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OrderCommand extends Command
{
    public function configure(): void
    {
        $this->setName('order');
        $this->setDescription('Observer example');
    }
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        echo "=== СИСТЕМА УВЕДОМЛЕНИЙ ЗАКАЗОВ ===" . PHP_EOL;

        $order = new Order(
            1,
            'Доставка пиццы',
            Status::new(),
            new \DateTimeImmutable(),
            new \SplObjectStorage(),
            new Sorting()
        );
        $emailNotifier = new EmailNotifier();
        $smsNotifier = new SmsNotifier();
        $loggerNotifier = new LoggerNotifier();
        $dbNotifier = new DatabaseNotifier();

        echo "Подписываем наблюдателей:". PHP_EOL;

        $order->attach($emailNotifier);
        $order->attach($smsNotifier);
        $order->attach($loggerNotifier);
        $order->attach($dbNotifier);

        $order->setStatus(Status::processing());

        $order->detach($emailNotifier);

        $order->setStatus(Status::send());


        return self::SUCCESS;
    }
}