<?php

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
		$result = shell_sort(explode(';', $argv[1]));
		$timeEnd = hrtime(true);
		display($argv, $result, number_format(($timeEnd - $timeStart) / 1e+9, 2));
	}
}

main($argv, $argc);
