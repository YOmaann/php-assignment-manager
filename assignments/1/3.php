<?php

function question() {
    global $N;
    $sum = 0;
    $tmp = abs($N);

    while($tmp > 0) {
        $sum += $tmp % 10;
        $tmp = floor( $tmp/10 );
    }
    echo "Sum of digits of ".$N." is ".$sum;
}
question();
?>