<?php

function question() {
    global $N, $M;
    $min = min($N, $M);
    $max = max($N, $M);
    echo "LCM of ".$min." and ".$max." is <b>".lcm($min, $max)."</b>.<br>HCF of ".$min." and ".$max." is <b>".hcf($min, $max)."</b>.";
}

question();
?>