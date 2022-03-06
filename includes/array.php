<?php

function bubbleSort($arr)  {
    $length = count($arr);
    for($i = 0; $i < $length - 1; $i++) {
        $flag = false;
        echo "<br>Iteration ".($i + 1)." : <br>";
        for($j = 0; $j < $length - $i - 1; $j++) {
            if(strcmp($arr[$j], $arr[$j + 1]) > 0)
            {
                $flag = true;
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
        
        echo displayArr($arr)."<br>";
        echo "<br>";
        if(!$flag)
            break;
    }
    return $arr;
}

function q2($arr) {
    $positive = $negative = [];
    foreach($arr as $a) {
        if($a < 0)
        array_push($negative, $a);
        else
        array_push($positive, $a);
    }
    return array_merge($positive, $negative);
}

function a_search($array, $val) {
    foreach($array as $a) {
        // echo $a." ".$val." ";
        if($val == $a)
            return true;
    }
    return false;
}
?>