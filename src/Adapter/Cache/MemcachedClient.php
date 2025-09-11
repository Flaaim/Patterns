<?php

namespace App\Adapter\Cache;

class MemcachedClient
{
    public function addServer($host, $port) { /* ... */ }

    public function retrieve($key) {
        echo "Получение из Memcached: $key\n";
        return "cached_value";
    }

    public function store($key, $value, $expiration = 3600) {
        echo "Запись в Memcached: $key = $value (Exp: $expiration)\n";
    }

    public function erase($key) {
        echo "Удаление из Memcached: $key\n";
    }
}