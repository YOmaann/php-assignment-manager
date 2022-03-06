<?php
function question() {
    $names = multiple();
    $content = str_split(readF($names[0]), 1);
    $result = "";
    foreach($content as $c) {
        if($c < "a")
            $result = $result.strtolower($c);
        else
            $result = $result.$c;
    }
    writeF($names[1], $result);
    echo $result;
}
question();
?>