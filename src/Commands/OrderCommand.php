<?php

namespace App\Commands;

use App\Observer\Notifiers\EmailNotifier;
use App\Observer\Notifiers\LoggerNotifier;
use App\Observer\Notifiers\SmsNotifier;
use App\Observer\Order;
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
            'Создан',
            new \DateTimeImmutable(),
        );
        $emailNotifier = new EmailNotifier();
        $smsNotifier = new SmsNotifier();
        $loggerNotifier = new LoggerNotifier();
        echo "Подписываем наблюдателей:". PHP_EOL;
        $order->attach($emailNotifier);
        $order->attach($smsNotifier);
        $order->attach($loggerNotifier);

        $order->setStatus('в обработке');
        $order->setStatus('отправлен');
        return self::SUCCESS;
    }
}