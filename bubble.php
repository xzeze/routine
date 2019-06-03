<?php

/**
 * 冒泡排序
 */

function bubble ($arr = [])
{
	// 计算数组长度
	$lenght = count($arr);

	// 进行循环对比
	for ($outer = 0; $outer < $lenght; $outer++) {
		for ($innert = $lenght - 1; $innert > $outer; $innert--) {
			// 对比前一个
			if ($arr[$innert] < $arr[$innert - 1]) {
				$temp = $arr[$innert - 1];

				$arr[$innert - 1] = $arr[$innert];
				$arr[$innert] = $temp;
			}
		}
	}

	return $arr;
}