<?php
include './files.php';

function loadCSV($name, $default = true) {
    $lines = getLineBLine($name, $default);
    $out = [];
    foreach($lines as $line) {
        $tmp = multiple(",", $line);
        array_push($out, $tmp);
    }
    return $out;
}


?>