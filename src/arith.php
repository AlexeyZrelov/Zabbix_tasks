<?php
/*
4
12345+67890
324-111
325*4405
1234*4
 */

$N = readline(":");
$input = [];

for ($i=0; $i < $N; $i++) {
    $input[] = readline(":");
}

foreach ($input as $value) {

    preg_match('/[-+*]/', $value, $sign);

    [$x, $y] = explode($sign[0], $value);

    if ($sign[0] == '+') {

        $res = $x + $y;
        $dashes = str_repeat("-", strlen($res) + 1);

        echo "\n $x\n{$sign[0]}{$y}\n$dashes\n $res\n\n";

    }

    if ($sign[0] == '-') {

        $res = $x - $y;
        $dashes = str_repeat("-",strlen($res) + 1);

        echo " $x\n{$sign[0]}{$y}\n$dashes\n $res\n\n";

    }

    if ($sign[0] == '*') {

        $res = $x * $y;
        $dashes = str_repeat("-", strlen($res));
        $gapX = str_repeat(" ", strlen($res) - strlen($x));
        $gapY = str_repeat(" ", strlen($res) - (strlen($y) + 1));

        if (strlen($x) < strlen($y)) {

            $dash = str_repeat("-", strlen($y) + 1);
            $n = 0;

            echo "{$gapX}{$x}\n{$gapY}{$sign[0]}{$y}\n{$gapY}{$dash}\n";

            foreach (str_split(strrev($y)) as $val) {

                $result = $val * $x;

                $gap = ($result == 0) ? str_repeat(" ",  strlen($res) - ($n + 1)) : str_repeat(" ", strlen($res) - (strlen($y) + $n)) ;

                echo "{$gap}{$result}\n";
                $n ++;

            }

            echo "$dashes\n$res\n\n";

        } else {

            echo "$x\n{$gapY}{$sign[0]}{$y}\n$dashes\n$res\n\n";

        }
    }
}