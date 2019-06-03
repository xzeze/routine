<?php

/**
 * 选择排序
 */

function selectedSort ($arr = [])
{
	// 计算数组长度
	$lenght = count($arr);

	// 循环对比
	for ($outer = 0; $outer < $lenght - 1; $outer++) {
		// 默认当前是最小的下标
		$minIndex = $outer;

		for ($innert = $outer + 1; $innert < $lenght; $innert++) {
			if ($arr[$minIndex] > $arr[$innert]) {
				$minIndex = $innert;
			}
		}

		// 判断最小下标是否发生变化
		if ($minIndex != $outer) {
			$temp = $arr[$outer];

			$arr[$outer] = $arr[$minIndex];
			$arr[$minIndex] = $temp;
		}
	}

	return $arr;
}