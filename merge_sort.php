<?php
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

function display_result($base_array, $items_array, $cmp, $duration) {
    echo "Série : " . $base_array . "\n";
    echo "Résultat : " . implode(';', $items_array) . "\n";
    echo "Nb de comparaison : " . $cmp . "\n";
    echo "Temps (sec) : " . $duration . "\n";
}

function main($argv, $argc) {
    if ($argc == 2) {
        $items_array = explode(";", $argv[1]);
        $result_array = merge_sort($items_array);
        display_result($argv[1], $result_array[0], $result_array[1], $result_array[2], );
    } else {
        echo "You have to use only one string.";
    }
}

main($argv, $argc);