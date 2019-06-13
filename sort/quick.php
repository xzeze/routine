<?php

function quick($arr = [])
{
	$lenght = count($arr);

	if ($lenght <= 1) {
		return $arr;
	}

	$left = [];
	$right = [];

	for ($i = 1; $i < $lenght; $i++) {
		if ($arr[$i] < $arr[0]) {
			$left[] = $arr[$i];
		} else {
			$right[] = $arr[$i];
		}
	}

	return array_merge(quick($left), [$arr[0]], quick($right));
}

$arr = [2, 4, 1, 9, 8];

var_dump(quick($arr));