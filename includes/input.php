<?php

// Array handling

function displayArr($arr, $del = " ") {
    foreach($arr as $a) {
        echo $a.$del;
    }
}

// String handling

function multiple($del = ",") {
    global $N;
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

// File handling

?>