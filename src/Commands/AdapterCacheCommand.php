<?php

namespace App\Commands;

use App\Adapter\Cache\MemcachedAdapter;
use App\Adapter\Cache\MemcachedClient;
use App\Adapter\Cache\RedisAdapter;
use App\Adapter\Cache\RedisClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class AdapterCacheCommand extends Command
{
    public function configure(): void
    {
        $this->setName('adapter:cache');
        $this->setDescription('Adapter cache');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        echo "== REDIS ==" . PHP_EOL;
        $adapterCache = new RedisAdapter(new RedisClient());

        $adapterCache->connect('127.0.0.1', 11211);
        $adapterCache->set('name', 'Mike');

        $adapterCache->get('name');

        $adapterCache->delete('name');
        echo "== END ==" . PHP_EOL;
        echo "== MEMCACHE ==" . PHP_EOL;

        $memcached = new MemcachedAdapter(new MemcachedClient());
        $memcached->set('name', 'Tom');

        $memcached->get('name');

        $memcached->delete('name');
        echo "== END ==" . PHP_EOL;
        return Command::SUCCESS;
    }
}