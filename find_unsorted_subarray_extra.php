<?php

/**
 * @param int[] $array
 * @return int[]
 */
function findUnsortedSubarray(array &$array): array
{
    $left = 0;
    $right = count($array) - 1;
    $start = -1;
    $end = -1;

    if ($right <= 1) {
        return [$start, $end];
    }

    return sortWithSearch($array, $left, $right, $start, $end);
}

/**
 * @param int[] $array
 * @param int $left
 * @param int $right
 * @param int $start
 * @param int $end
 * @return int[]
 */
function sortWithSearch(array &$array, int $left, int $right, int &$start, int &$end): array
{
    $l = $left;
    $r = $right;

    $center = $array[($left + $right) / 2];

    do {
        while ($array[$r] > $center) {
            $r--;
        }

        while ($array[$l] < $center) {
            $l++;
        }

        if ($l <= $r) {

            list($array[$r], $array[$l]) = [$array[$l], $array[$r]];

            if ($l !== $r && $array[$r] > $array[$l]) {
                $start = $start === -1 || $start > $l ? $l : $start;

                $end = $end < $r ? $r : $end;
            }

            $l++;
            $r--;
        }

    } while ($l <= $r);

    if ($r > $left) {
        sortWithSearch($array, $left, $r, $start, $end);
    }

    if ($l < $right) {
        sortWithSearch($array, $l, $right, $start, $end);
    }

    return [$start, $end];
}

$arr = [1, 4, 3, 2, 3, 4];
print_r(findUnsortedSubarray($arr));


