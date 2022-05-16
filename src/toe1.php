<?php

/*
2
X.O
OO.
XXX

O.X
XX.
OOO
 */

// $input = [
// 	[
// 		"x.o",
// 		"oo.",
// 		"xxx"
// 	],
// 	[
// 		"o.x",
// 		"xx.",
// 		"ooo"
// 	]
// ];

$N = readline(":");
$input[] = [];

for ($i=0; $i < $N; $i++) {

    $N1 = 3;
    for ($j=0; $j < $N1; $j++) {
        $input[$i][$j] = readline(":");
    }
    echo "\n";
}

foreach ($input as $key => $value) {

    $str = '';
    $flagX = 0;
    $flagO = 0;

    foreach ($value as $i => $val) {

        $str .= $val;

        if (substr_count($val, 'x') == 3) {
            $flagX = 1;
        }

        if (substr_count($val, 'o') == 3) {
            $flagO = 1;
        }

    }

    $countX = substr_count($str, 'x');
    $countO = substr_count($str, 'o');

    if ($countX > $countO && $flagX == 1) {
        echo "yes\n";
    } else {
        echo "no\n";
    }

}