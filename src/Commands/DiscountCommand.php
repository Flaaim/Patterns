<?php

namespace App\Commands;

use App\Decorator\Discounts\BasicProduct;
use App\Decorator\Discounts\FixedDiscount;
use App\Decorator\Discounts\PercentageDiscount;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DiscountCommand extends Command
{
    public function configure(): void
    {
        $this->setName('discount');
        $this->setDescription('Discount system decorator');
    }
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        echo "== Система скидок ==". PHP_EOL;

        $product = new BasicProduct('Basic Product', 200);

        echo 'Цена товара: '. $product->getPrice() . PHP_EOL;

        echo "== Добавляем фиксируемую скидку ==". PHP_EOL;

        $product = new FixedDiscount($product, 50);

        echo 'Цена товара: '. $product->getPrice() . PHP_EOL;

        echo "== Добавляем скидку 20% ==". PHP_EOL;

        $product = new PercentageDiscount($product, 20);

        echo 'Цена товара: '. $product->getPrice() . PHP_EOL;
        return Command::SUCCESS;
    }
}