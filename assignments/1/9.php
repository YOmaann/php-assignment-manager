<?php

function question() {
    global $N;
    // $result = decbin($N);
    $result = binNum($N . "", 0);
    echo "Binary value of ".$N." is ".$result;
}

question();
?>