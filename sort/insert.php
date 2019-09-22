<?php

function test(&$a)
{
	$a = $a + 100;
}

$b = 1;

test($b);

$a = 1;

test(1);

echo $a;