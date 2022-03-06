<?php

// displays number of vowels, consonants and whitespaces.
function clacW($s) {
    $s = strtoupper($s);
    $s = str_split($s);
    // print_r($s);
    $vowel = $cont = $white = 0;
    foreach($s as $c) {
        switch($c) {
            case 'A': 
            case 'E':
            case 'I':
            case 'O':
            case 'U':
                $vowel++;
                break;
            case ' ':
                $white++;
                break;
            case '?':  case '.': case',': case ';':
                break;
            default:
                $cont++;
        }
    }
    echo "Vowels = ".$vowel."<br>Consonants = ".$cont."<br>Whitespaces = ".$white;
}

// displays the word count.

function word($str) {
    $str = trim($str)." ";
    $word = "";
    $wc = 0;
    for($i = 0; $i < strlen($str); $i++) {
        $c = $str[$i];
        if($c == " " || $c == "," || $c == ".") {
            // echo strlen($word)."<br>";
            if(strlen($word)==0)
                continue;
            $wc++;
            echo $word."<br>";
            $word = "";
        }
        else
            $word = $word.$c;

    }  
    echo "Word count = ".$wc;
}

// converts a number to Roman Numeral

function toRoman($num) {
    // $nums = [1, 4, 5, 9, 10, 40, 50, 90, 100, 400, 500, 900, 1000];
    // $letters = ["I", "IV", "V", "IX", "X", "XL", "L","XC", "C", "CD", "D", "CM", "M"];
    $pairs = [1000=>"M",900=>"CM",500=>"C",400=>"CD",100=>"C",90=>"XC",50=>"L",40=>"XL",10=>"X",9=>"IX",5=>"V",4=>"IV",1=>"I"];
    $tmp = $num;
    // rsort($nums);
    // rsort($letters);
    $result = "";
    foreach($pairs as $a => $letter) {
        $count = floor($tmp / $a);
        if($count > 0){
            $tmp -= $count * $a;
            for($i = 0; $i < $count; $i++)
                $result = $result.$letter; 
        }
        
    }
    return $result;
}

// converts a number to it's word form.

function numTo($num) {
    $ones = ["zero", "one", "two", "three","four","five","six","seven","eight","nine","ten","eleven","twelve","thirteen","fourteen","fifteen", "sixteen", "seventeen","eighteen","nineteen"];
    $tens = ["ten", "twenty", "thirty", "forty", "fifty", "sixty", "seventy","eighty", "ninety", "twenty"];
    $big = ["hundred", "thousand", "lakh"];
    $tmp = $num;
    $pos = 0;
    $result = "";
    // echo $tmp."|";
    if($num < 20){
        return $ones[$num]."";}
    else if($num < 100){
        return $tens[floor($num/10) - 1]."".(($num%10!=0) ? (" ".$ones[$num%10]) : "");
    }
    while($tmp > 0) {
        if($pos == 1) {
            $last = $tmp % 10;
            $tmp = (int)($tmp / 10);
        }
        else{
            $last = $tmp % 100;
            $tmp = (int)($tmp /100);
        }
        if($pos < 1) {
            $result = numTo($last);
        }
        else {
            $result = (($last!=0)?numTo($last)." ".$big[$pos - 1]:"")." ".$result;
        }
        $pos++;
    }
    return $result;
}

// Checks for patters in a string.
function pattern($string, $pat) {
    $f = 0;
    $tstring = $string;
    $string = strtolower($string);
    $slen = strlen($string);
    $pat = strtolower($pat);
    $len = strlen($pat);
    // $color = [];
    $color = array_fill(0, $slen + 2, 0);

    for($i = 1; $i <= $slen - $len + 1; $i++) {
        $sub = substr($string, $i - 1, $len);
        // echo $sub." ".$pat." ".strcmp($sub, $pat)."<br>";
        if(strcmp($sub, $pat) == 0)
       {
        $f++;       
        $color[$i] += 1;
        $color[$i + $len] -=  1;
        // for($j =0; $j <= $slen + 1 ; $j++) {
        //     echo $color[$j]." ";
        // }
        // echo "<br>";
    }
    }
    // echo "<br>";
    for($i =1; $i <= $slen + 1 ; $i++) {
        $color[$i] += $color[$i - 1]; 
        // echo $color[$i]." ";
    }
    echo "Frequency = ".$f."<br>";
    for($i =1; $i <= $slen ; $i++) {
        if($color[$i] > 0){
        echo "<span style='color: red;'>".$tstring[$i - 1]."</span>";
    }
        else 
        echo $tstring[$i - 1];
    }
}
?>