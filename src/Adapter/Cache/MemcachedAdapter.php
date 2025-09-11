<?php

namespace App\Adapter\Cache;



class MemcachedAdapter implements Cache
{
    public function __construct(private readonly MemcachedClient $memcached){}
    public function get(string $key): ?string
    {
        return $this->memcached->retrieve($key) ?? null;
    }

    public function set(string $key, string $value, int $ttl = 3600): void
    {
        $this->memcached->store($key, $value, $ttl);
    }

    public function delete(string $key): void
    {
        $this->memcached->erase($key);
    }
}