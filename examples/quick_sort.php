<?php

// Алгоритм быстрой сортировки (Глава 4, страница 93)

function quickSort($array)
{
    if (count($array) < 2) {
        return $array;
    }

    $pivot = array_shift($array);

    $less    = [];
    $greater = [];

    foreach ($array as $element) {
        if ($element <= $pivot) {
            $less[] = $element;
        } else {
            $greater[] = $element;
        }
    }

    return array_merge(quickSort($less), [$pivot], quicksort($greater));
}

// ----------- тестовый массив -------------
$test_array = [];

for ($i = 0; $i <= 100000; $i++) {
    $test_array[] = mt_rand(1, 10000);
}

shuffle($test_array);

// -----------------------------------------

$start = time();
$res   = quickSort($test_array);
$end   = time();

print_r($res);
echo date("s", $end - $start) . " sec";
