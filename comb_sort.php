<?php
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

function display_result($base_array, $items_array, $cmp, $itr, $duration) {
    echo "Série : " . $base_array . "\n";
    echo "Résultat : " . implode(';', $items_array) . "\n";
    echo "Nb de comparaison : " . $cmp . "\n";
    echo "Nb d'itération : " . $itr . "\n";
    echo "Temps (sec) : " . $duration . "\n";
}

function my_swap($array, $first_index, $second_index) {
    $temp = $array[$first_index];
    $array[$first_index] = $array[$second_index];
    $array[$second_index] = $temp;

    return $array;
}

function main($argv, $argc) {
    if ($argc == 2) {
        $items_array = explode(";", $argv[1]);
        $result_array = comb_sort($items_array);
        display_result($argv[1], $result_array[0], $result_array[1], $result_array[2], $result_array[3]);
    } else {
        echo "You have to use only one string.";
    }
}

main($argv, $argc);