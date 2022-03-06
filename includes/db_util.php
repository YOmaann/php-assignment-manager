<?php

function sanitizeEl($string) {
    if(!is_numeric($string))
        return "'$string'";
    return $string;
}

function assoc_helper($array) {
    $keys = array_keys($array);
    $out = [];
    foreach($keys as $a) {
        $tmp = "$a=".sanitizeEl($array[$a]);
        array_push($out, $tmp);
    }
    $out_string = implode(",", $out);
    return $out_string;
}

function addAnd($cond) {
    $tmp = explode(",", $cond);
    $tmp = implode(" and ", $tmp);
    return $tmp;
}
?>