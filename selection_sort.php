<?php

function my_swap($array, $first_index, $second_index) {
	$temp = $array[$first_index];
	$array[$first_index] = $array[$second_index];
	$array[$second_index] = $temp;

	return $array;
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

function display($argv, $result, $time) {
	echo "Série : " . $argv[1] . "\n";
	echo "Résultat : " . implode(';', $result[0]) . "\n";
	echo "Nb de comparaison : " . $result[1] . "\n";
	echo "Nb d'itération : " . $result[2] . "\n";
	echo "Temps (sec) : " . $time . "\n";
}

function main($argv, $argc) {
	if ($argc > 1 && !empty($argv[1])) {
		$timeStart = hrtime(true);
		$result = selection_sort(explode(';', $argv[1]));
		$timeEnd = hrtime(true);
		display($argv, $result, number_format(($timeEnd - $timeStart) / 1e+9, 2));
	}
}

main($argv, $argc);
