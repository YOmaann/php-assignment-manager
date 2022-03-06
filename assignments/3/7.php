<?php
function question() {
    $name = multiple();
    // $name = array_map('sanitize', $name);
    // $f1 = fopen($name[0], "r");
    // $size1 = filesize($name[0]);
    $f2 = fopen($name[1], "w+");
    // $size2 = filesize($name[1]);
    $content = str_split(trim(readF($name[0]))." ", 1);
    // print_r($content);
    $words = [];
    $word = "";
    $c = "";
    foreach($content as $c) {
        if(strcmp($c, " ") != 0) {
            // echo $c;
            $word = $word.$c;
        }
        else {
            fwrite($f2, $word."\n");
            array_push($words, $word);
            $word = "";
        }
    }
    echo "Length = ".count($words)."<br>";
    displayArr($words, "<br>");
    // fclose($f1);
    fclose($f2);
}
question();

?>