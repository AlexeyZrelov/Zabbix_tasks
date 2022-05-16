<?php

/*
4
6 3
1 2 3 4 5 6
8 2
1 2 4 7 11 16 22 29
10 2
1 1 1 1 1 1 1 1 1 2
1 10
3
 */

$N = readline(":");
$input[] = [];

for ($i=0; $i < $N; $i++) {

    $N1 = 2;
    for ($j=0; $j < $N1; $j++) {
        $input[$i][$j] = readline(":");
    }
}

foreach ($input as $j => $value) {

    [$s, $c] = explode(' ', $value[0]);
    $sequence = explode(' ', $value[1]);

    $x = $sequence[$s - 1];
    $tmp = 0;

    for ($i = $x + 1, $k = 1; $i < ($x + 1) + $c; $i++, $k++) {

        if ($j == 0) {
            echo "$i ";
        }

        if ($j == 1) {
            echo $i + ($s - 1) + $tmp . " ";
            $tmp = $s;
        }

        if ($j == 2) {
            echo $i + ($s - 2) + $tmp . " ";
            $tmp = ($s * $c + $c) * $c;
        }

        if ($j == 3) {
            echo $i - $k . " ";
        }

    }

    echo "\n";

}