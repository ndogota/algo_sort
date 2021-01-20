<?php
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

function display_result($base_array, $items_array, $cmp, $itr, $duration) {
    echo "Série : " . $base_array . "\n";
    echo "Résultat : " . implode(';', $items_array) . "\n";
    echo "Nb de comparaison : " . $cmp . "\n";
    echo "Nb d'itération : " . $itr . "\n";
    echo "Temps (sec) : " . $duration . "\n";
}

function main($argv, $argc) {
    if ($argc == 2) {
        $items_array = explode(";", $argv[1]);
        $result_array = insertion_sort($items_array);
        display_result($argv[1], $result_array[0], $result_array[1], $result_array[2], $result_array[3]);
    } else {
        echo "You have to use only one string.";
    }
}

main($argv, $argc);