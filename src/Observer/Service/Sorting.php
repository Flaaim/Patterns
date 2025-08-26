<?php

namespace App\Observer\Service;

use SplObjectStorage;

class Sorting
{
    public function sortByPriority(SplObjectStorage $observers, bool $asc = false): array
    {
        $objectsToSort = [];
        foreach ($observers as $object) {
            $objectsToSort[] = $object;
        }
        usort($objectsToSort, function ($a, $b) use ($asc) {
            if($asc) {
                return $a->getPriority() <=> $b->getPriority();
            }
            return $b->getPriority() <=> $a->getPriority();
        });
        return $objectsToSort;
    }
}