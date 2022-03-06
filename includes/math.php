<?php

// sieve implementation to make an array of prime numbers
function sieve() {
    $size = 1000000;
    $ar = array_fill(0, $size, true);
    for($i = 2; $i <= $size; $i+=2) {
        $ar[$i] = false;
    }
    for($i = 3; $i <= $size; $i+=2) {
        if($ar[$i]) {
            for($j = $i * $i; $j <= $size; $j += $i)
            $ar[$j] = false;
        }
    }
    return $ar;
}

// checks if a number is prime.
function isPrime($x) {
    $f = 0;
    for( $i = 1; $i <= $x; $i++ )
    if( $x % $i ==0 )
    $f++;
    if( $f == 2 ) return true;
    return false;

}

// iterative program to find the lcm.
function lcm($a, $b) {
    // $m = max($a, $b);
    for($i = $b; $i <= $a * $b; $i++) {
        if($i % $a ==0 && $i % $b ==0)
        break;
    }
    return $i;
}

// recursive program to find the hcf.
function hcf($a, $b) {
    if($a == 0)
    return $b;
    $div = $b % $a;
    return hcf($div, $a);
}

function binNum($dec) {
    $a = $dec % 2;
    $b = floor($dec / 2);
    if ($b == 1)
        return $b."".$a;
    else {
        return binNum($b)."".$a;
    }
}

?>