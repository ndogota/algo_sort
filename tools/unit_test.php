<?php
include "function_test.php";

function generate_data($length = 10000, $interval = array(0, 10000), $numbersAfterDecimal = 0) {
	$string = '';
	$pow = ($numbersAfterDecimal > 0 ? pow(10, $numbersAfterDecimal) : 1);

	for ($i = 0; $i < $length; $i++) {
		$string .= rand($interval[0] * $pow, $interval[1] * $pow) / $pow . ($i == $length - 1 ? '' : ';');
	}

	return $string;
}

function display($function, $input, $result, $time) {
	//echo "Série : " . $input . "\n";
	//echo "Résultat : " . implode(';', $result[0]) . "\n";
	echo "Sort : " . $function. "\n";
	echo "Nb de comparaison : " . $result[1] . "\n";
	if ($function != 'merge_sort' && $function != 'quick_sort') {
		echo "Nb d'itération : " . $result[2] . "\n";
	}
	echo "Temps (sec) : " . $time . "\n\n";
}

function unit_test() {
	$random_data = explode(';', generate_data());
	$functions = array('bubble_sort', 'comb_sort', 'insertion_sort', 'merge_sort', 'quick_sort', 'selection_sort', 'shell_sort');
	
	foreach ($functions as $function) {
		$timeStart = hrtime(true);
		$result = call_user_func_array($function, array($random_data));
		$timeEnd = hrtime(true);
		display($function, $random_data, $result, number_format(($timeEnd - $timeStart) / 1e+9, 2));
	}
}

unit_test();