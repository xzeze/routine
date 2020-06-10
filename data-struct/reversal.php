<?php

$str = 'xzz';
$strLen = strlen($str);

for ($i = 0; $i < $strLen; $i++) {
    $head = $i;
    $tail = $strLen - ($i + 1);

    if ($head == $tail || $head > $tail) {
        break;
    }

    $tmp = $str{$head};

    $str{$head} = $str{$tail};
    $str{$tail} = $tmp;
}

echo $str;