<?php

function loadCSV($name, $default = true) {
    $lines = getLineBLine($name, $default);
    $out = [];
    foreach($lines as $line) {
        $tmp = multiple(",", $line);
        array_push($out, $tmp);
    }
    return $out;
}


function toCSV($content) {
    $out = [];
    foreach($content as $c) {
        array_push($out, implode(",", $c));
    }
    $out = implode("\n\r", $out);
    return $out;
}

function toOneCSV($content) {
    return toCSV([$content]);
}

?>