<?php

// Array handling

function displayArr($arr, $del = " ") {
    foreach($arr as $a) {
        echo $a.$del;
    }
}

// String handling

function multiple($del = ",", $default = false) {
    if(!$default)
        global $N;
    else
        $N = $default;
    $nums = explode($del,  $N);
    $numarr = [];
    foreach($nums as $num ) {
        if(is_numeric($num)) 
            array_push($numarr, (int)trim($num));
        else {
            array_push($numarr, trim($num));
        }
    }
    return $numarr;
}

function multipleN() {
    global $N, $M, $L;
    $tmp = $N;
    $N = $N[0];
    if(isset($N[1]))
        $M = $tmp[1];
    // echo $M;
    $L = $tmp;
}

?>