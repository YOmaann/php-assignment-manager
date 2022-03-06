<?php
function question() {
    $names = multiple();
    // $names = array_map('sanitize', $names);
    // $f1 = fopen($names[0], 'r');
    // $f2 = fopen($names[1], 'w+');
    // $size = filesize($names[0]);
    $c = strrev(readF($names[0]));
    writeF($names[1], $c);
    // fclose($f1);
    // fclose($f2);
    echo $c;  
}
question();


?>