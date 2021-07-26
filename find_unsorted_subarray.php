<?php

/**
 * @param int[] $inputArray
 * @return int[]
 */
function findUnsortedSubarray(array $inputArray): array
{
    $left = -1;
    $right = -1;

    if (count($inputArray) <= 2) {
        return [$left, $right];
    }

    $sortedArray = $inputArray;
    sort($sortedArray, SORT_NUMERIC);

    foreach ($inputArray as $key => $value) {
        if ($sortedArray[$key] !== $value) {
            if ($left === -1) {
                $left = $key;
            } else {
                $right = $key;
            }
        }
    }

    return [$left, $right];
}

$arr = [1, 4, 3, 2, 3, 4];

print_r(findUnsortedSubarray($arr));


