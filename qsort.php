<?php

function my_qsort($arr, $low, $high)
{
    if ($low < $high) {

        $pi = partition($arr, $low, $high);

        $arr = my_qsort($arr, $low, $pi - 1);
        $arr = my_qsort($arr, $pi + 1, $high);
    }
    return $arr;
}

function partition(&$arr, $low, $high)
{
    $pivot = $arr[$high];
    $i = ($low - 1);
    for ($j = $low; $j <= $high; $j++) {
        if (strtoupper($arr[$j]) < strtoupper($pivot)) {
            $i++;
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
    $temp = $arr[$i + 1];
    $arr[$i + 1] = $arr[$high];
    $arr[$high] = $temp;
    return $i + 1;
}

$test_arr = ['Jimmy', 9, 'Timothy', 8, 'William', 7, 'butts'];

$test_arr_sorted = my_qsort($test_arr, 0, count($test_arr) - 1);

echo "BEFORE:\n";
print_r($test_arr);

echo "AFTER:\n";
print_r($test_arr_sorted);