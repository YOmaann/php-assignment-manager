<?php
function question() {
    $arr = multiple();
    $hash = [];
    foreach($arr as $a) {
        if(array_key_exists($a, $hash)){
            $hash[$a]++;
            // echo "hello";
        }
        else {
            $tmp = array(
                $a => 1
            );
            // print_r($tmp);
            $hash += $tmp;
            // print_r($hash);
            // echo "<br>";
        }
    }
    print_r($hash);
}
question();
?>