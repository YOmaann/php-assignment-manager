<?php

function question() {
    $names = multiple();
    $content = readF($names[0]);
    writeF($names[1], $content);
    echo $content;
}

question();
?>