<?php

namespace App\Adapter\Cache;



class RedisAdapter implements Cache
{
    public function __construct(private readonly RedisClient $redis){

    }
    public function get(string $key): ?string
    {
        return $this->redis->getValue($key) ?: null;
    }

    public function set(string $key, string $value, int $ttl = 3600): void
    {
        $this->redis->setValue($key, $value, $ttl);
    }

    public function delete(string $key): void
    {
        $this->redis->remove($key);
    }
}