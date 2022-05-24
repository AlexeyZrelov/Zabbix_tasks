<?php
/*
$input = [
	"12345+67890",
	"324-111",
	"325*4405",
	"1234*4"
];

 12345
+67890
------
 80235

 324
-111
----
 213

    325
  *4405
  -----
   1625
     0
 1300
1300
-------
1431625

1234
  *4
----
4936

 999999999999999
-999999999999990
----------------
               9

1000
  -1
 ---
 999

 1234
   *2
 ----
    0
2468
-----
24680

*/

$input = [
    // "12345+67890",
    // "10000+11",
    // "100+67890",
    // "9000+99890",
    // "10000+99890",
    // "324-111",
    // "1000-1",
    // "999999999999999-999999999999990",
    "325*4405",
    "1234*4",
    "1234*20",
    "1*12345",
    "999*999",

];

// $N = readline();
// $input = [];

// for ($i=0; $i < $N; $i++) {
//     $input[] = readline();
// }

foreach ($input as $value) {

    preg_match('/[-+*]/', $value, $sign);
    list($x, $y) = explode($sign[0], $value);
    $max = max($x, $y);
    $gapX = '';
    $gapY = '';
    $gapD = '';
    $gapR = '';

    if ($sign[0] == '+') {
        $res = $x + $y;
        $dashes = str_repeat("-", strlen($res));

        if (strlen($x) > strlen($y)) {
            $gapY =  str_repeat(" ", strlen($res) - (strlen($y) + 1));

            $str = $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapD . $dashes . "\n" . $gapR . $res ."\n";

            echo $str . PHP_EOL;

        } elseif (strlen($x) < strlen($y)) {
            $dashes = str_repeat("-", strlen($max) + 1);
            $gapX =  str_repeat(" ", (strlen($max) + 1) - strlen($x));
            $gapR = (strlen($max) + 1) > strlen($res) ? str_repeat(" ", (strlen($max) + 1) - strlen($res)) : '' ;

            $str = $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapD . $dashes . "\n" . $gapR . $res ."\n";

            echo $str . PHP_EOL;

        } else {
            $dashes = str_repeat("-", strlen($max) + 1);
            $gapX =  str_repeat(" ", (strlen($max) + 1) - strlen($x));
            $gapR = str_repeat(" ", (strlen($max) + 1) - strlen($res));

            $str = $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapD . $dashes . "\n" . $gapR . $res ."\n";

            echo $str . PHP_EOL;
        }
    }

    if ($sign[0] == '-') {
        $res = $x - $y;

        if (strlen($x) > strlen($y)) {
            $dashes =  str_repeat("-",strlen($res));
            $gapY = str_repeat(" ", strlen($x) - (strlen($y) + 1));
            $gapD = str_repeat(" ", strlen($x) - strlen($res));
            $gapR = str_repeat(" ", strlen($x) - strlen($res));

            $str = $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapD . $dashes . "\n" . $gapR . $res ."\n";

            echo $str . PHP_EOL;

        } else {
            $dashes = str_repeat("-",strlen($max) + 1);
            $gapX = str_repeat(" ", (strlen($max) + 1) - strlen($x));
            $gapR = (strlen($max) + 1) > strlen($res) ? str_repeat(" ", (strlen($max) + 1) - strlen($res)) : '' ;

            $str = $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapD . $dashes . "\n" . $gapR . $res ."\n";

            echo $str . PHP_EOL;
        }

    }

    if ($sign[0] == '*') {
        $res = $x * $y;
        $dashes = str_repeat("-", strlen($res));

        if (strlen($x) < strlen($y)) {
            $gapX =  str_repeat(" ", strlen($res) - strlen($x));
            $gapY =  str_repeat(" ", (strlen($res) - (strlen($y) + 1)) >= 0 ? strlen($res) - (strlen($y) + 1) : 0);
            $dash = str_repeat("-", strlen($y) + 1);
            $n = 0;

            if (strlen($x) === 1) {
                $dash = str_repeat("-", strlen($y) + 1);
                $gapX = str_repeat(" ", strlen($res) < strlen($y) + 1 ? strlen($y) : strlen($res));
                $n = 0;

                echo $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapY . $dash . "\n";

                foreach (str_split(strrev($y)) as $val) {

                    $result = $val * $x;

                    $gap = ($result == 0) ? str_repeat(" ",  strlen($res) - ($n + 1)) : str_repeat(" ", strlen($res) - (strlen($result) + $n)) ;

                    echo $gap . $result . "\n";
                    $n ++;
                }

                echo $dashes . "\n" . $res . "\n\n";
            } else {

                echo $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapY . $dash . "\n";

                foreach (str_split(strrev($y)) as $val) {

                    $result = $val * $x;

                    $gap = ($result == 0) ? str_repeat(" ",  strlen($res) - ($n + 1)) : str_repeat(" ", strlen($res) - (strlen($y) + $n)) ;

                    echo $gap . $result . "\n";
                    $n ++;

                }

                echo $dashes . "\n" . $res . "\n\n";
            }
        } elseif (strlen($x) > strlen($y)) {
            $dash = str_repeat("-", strlen($y) + 1);
            $gapX =  str_repeat(" ", strlen($res) - strlen($x));
            $gapY =  str_repeat(" ", strlen($res) - (strlen($y) + 1));
            $n = 0;

            if (strlen($y) === 1) {
                echo $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $dashes . "\n" . $res . "\n\n";
            } else {

                $dash = str_repeat("-", strlen($y) + 1);

                echo $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapY . $dash . "\n";

                foreach (str_split(strrev($y)) as $val) {
                    $result = $val * $x;
                    $gap = ($result == 0) ? str_repeat(" ",  strlen($res) - ($n + 1)) : str_repeat(" ", strlen($res) - (strlen($result) + $n)) ;

                    echo $gap . $result . "\n";
                    $n ++;
                }
                echo $dashes . "\n" . $res . "\n\n";
            }
        } else {
            $gapX =  str_repeat(" ", (strlen($max) + 1) - strlen($x));
            // $gapR = str_repeat(" ", (strlen($max) + 1) - strlen($res));

            $str = $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n" . $gapD . $dashes . "\n" . $gapR . $res ."\n";

            echo $str . PHP_EOL;
        }
    }
}