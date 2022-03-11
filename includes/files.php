<?php
function sanitize($filename) {
    return "../files/".$filename;
}

function readF($name, $default = true) {
    if($default)
        $name = sanitize($name);
    if(!file_exists($name)) return false;
    $size = filesize($name);
    $handle = fopen($name, "r");
    $content = fread($handle, $size);
    fclose($handle);
    return $content;
}
function writeF($name, $content, $default = true) {
    if($default)
        $name = sanitize($name);
    // if(!file_exists($name)) return false;
    $handle = fopen($name, "w+");
    fwrite($handle, $content);
    fclose($handle);
}

function appendF($name, $content, $default = true) {
    if($default)
        $name = sanitize($name);
    // if(!file_exists($name)) return false;
    $handle = fopen($name, "a");
    fwrite($handle, "$content".PHP_EOL);
    fclose($handle);
}

function getLineBLine($name, $default = true) {
    if($default) $name = sanitize($name);
    if(!file_exists($name)) return false;
    $lines = [];
    $handle = fopen($name, 'r');
    while($line = fgets($handle))
        array_push($lines, $line);
    return $lines;
}

?>