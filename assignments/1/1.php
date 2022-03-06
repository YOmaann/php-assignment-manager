<?php

function series1() {
    global $N;
    echo "<b>1 + (1 + 2)...   :  </b>";
    $sum = 0;
  for($i = 1; $i <= $N; $i++)
    for($j = 1; $j <= $i; $j++)
      $sum += $j;
    echo $sum;
}
function series2() {
    global $N;
    echo "<b>1 * 2 * 3...   :</b>  ";
    $sum = 1;
for($i = 1; $i <= $N; $i++)
    $sum *= $i;
    echo $sum;
}
function series3() {
    global $N;
        echo "<b>1 - 2 + 3...   :</b>  ";
        $sum = 0;
    for($i = 1; $i <= $N; $i++)
        $sum += ($i % 2 == 0)? -$i : $i;
        echo $sum;
    }
function question() {
    echo "<ul><li>";
    series1();
    echo "</li><li>";
    series2();
    echo "</li><li>";
    series3();
    echo "</li><ul>";
}

question();
?>