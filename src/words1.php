<?php
/*
Sample input:
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

Sample output:
The door cannot be opened.
Ordering is possible.
The door cannot be opened
 */

/*
$N = readline();
$input[] = [];

for ($i=0; $i < $N; $i++) {

    $N1 = readline();
    for ($j=0; $j < $N1; $j++) {
        $input[$i][$j] = readline();
    }

}
/*/

/*
$N = rtrim(fgets(STDIN));
$input = [];

for ($i=0; $i < $N; $i++) {

	$N1 = rtrim(fgets(STDIN));
    for ($j=0; $j < $N1; $j++) {
        $input[$i][$j] = rtrim(fgets(STDIN));
    }

}
//*/
//=====================

/**/
$input = [
    ['acm', 'ibm'],
    ['acm', 'malform', 'mouse'],
    ['ok', 'ok']
];
//*/

foreach ($input as $value) {

    $graph = [];
    // $startNode = $value[0];
    $node = $value[0];
    $path = false;
    // $count = 0;

    foreach ($value as $val) {

        $graph[$val] = [];
        // $i = 0;

        foreach ($value as $v) {

            if (substr($node, -1) === substr($v, 0,1) && $node !== $v) {

                // if (in_array($v, $graph[$node])) {
                //     $i++;
                //     $graph[$node][] = $v.$i;
                // } else {
                //     $graph[$node][] = $v;
                // }

                $graph[$node][] = $v;
                $path = true;
                // $count++;

            }

            $node = $val;

        }

    }

    // $visited[] = $startNode;
    // foreach($graph[$startNode] as $vertex) {
    //     if( !in_array($vertex , $visited )) {
    //         $visited[] = $vertex;
    //         $count++;
    //     }
    // }


    if ($path) {
        echo "Ordering is possible.\n";
    } else {
        echo "The door cannot be opened.\n";
    }

    // if ($count !== 0) {
    //     echo "Ordering is possible.\n";
    // } else {
    //     echo "The door cannot be opened.\n";
    // }


}