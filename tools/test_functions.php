<?php

//include "../quick_sort.php";
//include "../selection_sort.php";
include "../shell_sort.php";

function generate_data($length = 10000, $interval = array(0, 10000), $numbersAfterDecimal = 0) {
	$string = '';
	$pow = ($numbersAfterDecimal > 0 ? pow(10, $numbersAfterDecimal) : 1);

	for ($i = 0; $i < $length; $i++) {
		$string .= rand($interval[0] * $pow, $interval[1] * $pow) / $pow . ($i == $length - 1 ? '' : ';');
	}

	return $string;
}


function test_function($iteration = 1, $iterateFunction = true, $displayTime = true, $displayStrings = false) {
	$times = array();

	for ($i = 0; $i < $iteration; $i++) {
		// Generate random data for test
		$data = generate_data();
		$array = explode(';', $data);

		// Call function we want test
		$timeStart = hrtime(true);
		//$result = quick_sort($array); // Not iterate function
		//$result = selection_sort($array);
		$result = shell_sort($array);
		$timeEnd = hrtime(true);
		$times[$i] = number_format(($timeEnd - $timeStart) / 1e+9, 2);

		// Retrieve data
		$sorted_array = $result[0];
		$nbCompare = $result[1];
		if ($iterateFunction) {
			$nbIterate = $result[2];
		}

		// Display information
		echo "Test n°" . ($i + 1) . "\n";
		if ($displayStrings) {
			echo "Série : " . $data . "\n";
			echo "Résultat : " . implode(';', $sorted_array) . "\n";
		}
		echo "Nb compare: " . $nbCompare . "\n";
		if ($iterateFunction) {
			echo "Nb iteration: " . $nbIterate . "\n";
		}
		if ($displayTime) {
			echo "Temps (sec) : " . $times[$i] . "\n";
		}
		if ($i != $iteration - 1) {
			echo "\n";
		}
	}

	if ($displayTime) {
		echo "\nMoyenne temps (sec) : " . array_sum($times) / count($times) . "\n";
	}
}

test_function();