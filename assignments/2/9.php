<?php
function question() {
    global $N;
    $n = $N;
    $l = multiple(" ");
    $letters = [];
    foreach($l as $a) {
        $a = strtolower($a);
        $a = strtoupper($a[0]).substr($a, 1);
        array_push($letters, $a);
    }
    echo "Original name : ".$N."<br>";
    echo "Modified name : ".$letters[count($letters) - 1];
    if(count($letters) > 1)
    echo ", ";
    for($i = 0; $i < count($letters) - 1; $i++) {
        echo $letters[$i]." ";
    }
}
question();
?>