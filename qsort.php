<?php

/**
 * @param array $arr
 * @param int $low
 * @param int $high
 * @return array
 */
function my_qsort(array $arr, int $low, int $high): array
{
    if ($low < $high) {

        $result = partition($arr, $low, $high);
        $pi = $result["pi"];
        $arr = $result["arr"];

        $arr = my_qsort($arr, $low, $pi - 1);
        $arr = my_qsort($arr, $pi + 1, $high);
    }

    return $arr;
}

/**
 * @param array $arr
 * @param int $low
 * @param int $high
 * @return array
 */
function partition(array $arr, int $low, int $high): array
{
    $result = [];

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

    $result["pi"] = $i + 1;
    $result["arr"] = $arr;

    return $result;
}

$test_arr = ['Jimmy', 9, 'Timothy', 8, 'William', 7, 'butts'];

$test_arr_sorted = my_qsort($test_arr, 0, count($test_arr) - 1);

echo "BEFORE:\n";
print_r($test_arr);

echo "AFTER:\n";
print_r($test_arr_sorted);