<?php
function bubble_sort($items_array): array {
    $time_begin = hrtime(true);
    $items_remain = count($items_array);

    $sorted = false;

    $cmp = 0;
    $itr = 0;

    while($sorted == false) {
        $sorted = true;
        for($i = 0; $i < $items_remain - 1; $i++) {
            if($items_array[$i] > $items_array[$i + 1]) {
                $tmp = $items_array[$i + 1];
                $items_array[$i + 1] = $items_array[$i];
                $items_array[$i] = $tmp;
                $sorted = false;
            }

            $cmp++;
            $itr++;
        }

        $items_remain -= 1;

        $itr++;
    }

    return array($items_array, $cmp, $itr, number_format((hrtime(true) - $time_begin) / 1e+9, 2));
}

function comb_sort($items_array): array {
    $time_begin = hrtime(true);

    $gap = count($items_array);
    $item_count = count($items_array);
    $shrink = 1.3;
    $sorted = false;

    $cmp = 0;
    $itr = 0;

    while($sorted == false) {
        $gap /= $shrink;

        if ($gap <= 1) {
            $gap = 1;
            $sorted = true;
        }

        for($i = 0; $i + $gap < $item_count; $i++) {
            if($items_array[$i] > $items_array[$i + $gap]) {
                $items_array = my_swap($items_array, $i, $i + $gap);
                $sorted = false;
            }

            $cmp++;
            $itr++;
        }

        $itr++;
    }

    return array($items_array, $cmp, $itr, number_format((hrtime(true) - $time_begin) / 1e+9, 2));
}

function insertion_sort($items_array): array {
    $time_begin = hrtime(true);

    $items_count = count($items_array);

    $cmp = 0;
    $itr = 0;

    for($i = 1; $i < $items_count; $i++) {
        $insert_value = $items_array[$i];
        $hole_position = $i;

        while($hole_position > 0 && $items_array[$hole_position - 1] > $insert_value) {
            $items_array[$hole_position] = $items_array[$hole_position - 1];
            $hole_position -= 1;

            $itr++;
        }

        $items_array[$hole_position] = $insert_value;

        $cmp++;
        $itr++;
    }

    return array($items_array, $cmp, $itr, number_format((hrtime(true) - $time_begin) / 1e+9, 2));
}

function split_merge($items_array, &$cmp) {
    $items_count = count($items_array);

    if ($items_count == 1)
        return $items_array;

    $mid = $items_count / 2;

    // called recursively
    $top = split_merge(array_slice($items_array, 0, $mid), $cmp);
    $down = split_merge(array_slice($items_array, $mid), $cmp);

    return top_down_merge($top, $down, $cmp);
}

function top_down_merge($top, $down, &$cmp) {
    $merge = [];
    $max_top = count($top);
    $max_down = count($down);

    $top_i = 0;
    $down_i = 0;

    // merging
    while ($top_i < $max_top && $down_i < $max_down) {
        if ($top[$top_i] > $down[$down_i]) {
            $merge[] = $down[$down_i];
            $down_i++;
        } else {
            $merge[] = $top[$top_i];
            $top_i++;
        }
        $cmp++;
    }

    // cpy the remaining elements
    while($top_i < $max_top) {
        $merge[] = $top[$top_i];
        $top_i++;
    }
    while ($down_i < $max_down) {
        $merge[] = $down[$down_i];
        $down_i++;
    }

    return $merge;
}

function merge_sort($items_array): array {
    $time_begin = hrtime(true);
    $cmp = 0;

    $items_array = split_merge($items_array, $cmp);

    return array($items_array, $cmp, number_format((hrtime(true) - $time_begin) / 1e+9, 2));
}

function quick_sort($array) {
    if (count($array) == 0) {
        return array(array(), 0);
    }

    // Place pivot at the left of part of array
    $pivot_value = $array[0];
    // Declare both arrays parts
    $left_array_part = $right_array_part = array();
    // Number of comparison
    $nb_compare = 0;

    // Iterate on array for split in two subarray
    for ($i = 1; $i < count($array); $i++) {
        $nb_compare++;
        if ($array[$i] < $pivot_value) {
            $left_array_part[] = $array[$i];
        } else {
            $right_array_part[] = $array[$i];
        }
    }

    $call_left_part = quick_sort($left_array_part);
    $call_right_part = quick_sort($right_array_part);
    return array(array_merge($call_left_part[0], array($pivot_value), $call_right_part[0]), $nb_compare + $call_left_part[1] + $call_right_part[1]);
}

function shell_sort($array) {
    // Number of comparison
    $nbCompare = 0;
    // Number of iteration
    $nbIteration = 0;

    for ($gap = count($array) / 2; $gap > 0;  $gap = round($gap / 2.2), $nbIteration++) {
        for ($i = $gap; $i < count($array); $i++, $nbIteration++) {
            $temp = $array[$i];
            for ($j = $i; $j >= $gap and $array[(int)$j - (int)$gap] > $temp; $j -= (int)$gap, $nbIteration++) {
                $array[$j] = $array[(int)$j - (int)$gap];
            }
            $nbCompare++;

            $array[$j] = $temp;
        }
    }

    return array($array, $nbCompare, $nbIteration);
}

function selection_sort($array) {
    // Number of comparison
    $nbCompare = 0;
    // Number of iteration
    $nbIteration = 0;

    // Loop on all array
    for ($i = 0; $i < count($array); $i++) {
        $nbIteration++;
        $minIndexUnsortedPart = $i;

        // Loop on unsorted part of array
        for ($j = $i + 1; $j < count($array); $j++) {
            $nbCompare++;
            $nbIteration++;
            if ($array[$j] < $array[$minIndexUnsortedPart]) {
                $minIndexUnsortedPart = $j;
            }
        }

        $array = my_swap($array, $i, $minIndexUnsortedPart);
    }

    return array($array, $nbCompare, $nbIteration);
}

function my_swap($array, $first_index, $second_index) {
    $temp = $array[$first_index];
    $array[$first_index] = $array[$second_index];
    $array[$second_index] = $temp;

    return $array;
}