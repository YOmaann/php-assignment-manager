<?php
function question() {
    $arr = multiple();
    $output = q2($arr);
    echo "Original array contains: ";
    displayArr($arr);
    echo "<br>Modified Array: ";
    displayArr($output);
}

question();
?>