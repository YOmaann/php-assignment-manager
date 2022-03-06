<?php

function question() {
    $names = multiple();
    // $names = array_map('sanitize', $names);
    // $f1 = fopen($names[0], 'r');
    // $f2 = fopen($names[1], 'r');
    // $f3 = fopen($names[2], 'w+');
    // $size1 = filesize($names[0]);
    // $size2 = filesize($names[1]);
    $content1 = readF($names[0]);
    $content2 = readF($names[1]);
    $result = $content1.$content2;
    echo "<h2>Done</h2><br>".$result;
    writeF($names[2], $result);
}
question();

?>