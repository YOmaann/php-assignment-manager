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

?>