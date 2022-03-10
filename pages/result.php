<?php

//intval

$assignment_no = $_REQUEST["assignment"];
$N = $_REQUEST["n"];
// $M = $_REQUEST['m'];
$question_no =  $_REQUEST["x"];

include '../includes/input.php';
include '../includes/files.php';
include '../includes/math.php';
include '../includes/string.php';
include '../includes/array.php';
include '../DB/Assignment_DB.php';

$db = new Assignment_DB("assignment");
$location = $db->getFunctionLocation($assignment_no, $question_no);

$title = "Question $assignment_no - $question_no";
//Assignment 1

// include '../assign_files/assign_1.php';

// assignment 2

// include './assign_files/assign_2.php';

// assignment 3

// include './assign_files/assign_3.php';

?>

<html>
    <head>
    <link rel="stylesheet" href="../css/result.css">    
    <title>Question <?= $title ?></title></head>
    <body>
        <div class="answer">        
        <div class="header"><?= $title ?> <span><a href="../index.html">Go back</a></span></div>
        <div class="body">
            <?php
                if($location) {
                    include $location;
                }
                else {
                    echo "Invalid !";
                }
                // $func = "question".$x;
                // if(function_exists($func)){
                //     // array_map($func, [0]);
                //     $func();
                // }
                // else echo "Invalid Option!";
            ?>
        </div>
        </div>
    </body>
</html>