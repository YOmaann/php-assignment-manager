<?php

function question() {
    $names = multiple();
    // $names = array_map('sanitize', $names);
    // $f1 = fopen($names[0], 'r');
    // $f2 = fopen($names[1], 'w+');
    // $f3 = fopen($names[2], 'w+');
    // $size1 = filesize($names[0]);
    $content = readF($names[0]);
    $len = strlen($content);
    $n1 = $len/2;
    $n2 = $len - $n1;
    $c1 = substr($content, 0, $n1);
    $c2 = substr($content, $n1, $n2);
    writeF($names[1], $c1);
    writeF($names[2], $c2);
    // fclose($f1);
    // fclose($f2);
    // fclose($f3);
    echo "file 1 => ".$c1;
    echo "<br>file 2 => ".$c2;
}
question();

?>