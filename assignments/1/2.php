<?php

function question() {
    global $N;
    if($N > 2000)
    {
        echo "N is greater than 2000.";
        return;
    }
    echo "<h2>Prime numbers <= ".$N." :</h2><br>";
    echo isPrime(9);
    for($i = 1; $i <= $N; $i++) {
        // if($i % 30 == 0 )
        //     echo "<br>";
        if( isPrime($i) )
        echo $i." ";
    }
}

question();
?>