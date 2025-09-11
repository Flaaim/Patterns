<?php

namespace App\Adapter\Cache;

class RedisClient
{
    public function connect($host, $port) { /* ... */ }

    public function getValue($key) {
        echo "Получение из Redis: $key\n";
        return "cached_value";
    }

    public function setValue($key, $value, $expiry = 3600) {
        echo "Запись в Redis: $key = $value (TTL: $expiry)\n";
    }

    public function remove($key) {
        echo "Удаление из Redis: $key\n";
    }
}