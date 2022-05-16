<?php
/*
3
2
acm
ibm
3
acm
malform
mouse
2
ok
ok
 */

$N = readline(":");
$input[] = [];

for ($i=0; $i < $N; $i++) {

    $N1 = readline(":");
    for ($j=0; $j < $N1; $j++) {
        $input[$i][$j] = readline(":");
    }

}

foreach ($input as $value) {

    $tmp = [];

    foreach ($value as $val) {
        $tmp[] = substr($val, 0, 1);
        $tmp[] = substr($val, -1);
    }

    $result = array_slice($tmp, 1, -1);

    if (count(array_unique($result)) === 1) {
        echo "Ordering is possible.\n";
    } else {
        echo "The door cannot be opened.\n";
    }
}
