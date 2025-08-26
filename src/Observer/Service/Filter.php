<?php

namespace App\Observer\Service;

class Filter
{
    public static function byStatus(array $statuses, $status): bool
    {
        return in_array($status->getValue(), $statuses);
    }
}