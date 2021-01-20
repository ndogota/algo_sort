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

function main($argc, $argv) {
    echo $argc;

    if ($argc == 2) {
        $items_array = explode(";", $argv[1]);
        $result_array = bubble_sort($items_array);
        display_result($argv[1], $result_array[0], $result_array[1], $result_array[2], $result_array[3]);
    } else {
        echo "You have to use only one string.";
    }
}

main($argc, $argv);