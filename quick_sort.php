<?php

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

function display($argv, $result, $time) {
	echo "Série : " . $argv[1] . "\n";
	echo "Résultat : " . implode(';', $result[0]) . "\n";
	echo "Nb de comparaison : " . $result[1] . "\n";
	// Nb d'itération => Not required for quick sort
	echo "Temps (sec) : " . $time . "\n";
}

function main($argv, $argc) {
	if ($argc > 1 && !empty($argv[1])) {
		$timeStart = hrtime(true);
		$result = quick_sort(explode(';', $argv[1]));
		$timeEnd = hrtime(true);
		display($argv, $result, number_format(($timeEnd - $timeStart) / 1e+9, 2));
	}
}

main($argv, $argc);