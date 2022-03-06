<?php

/*
array_column()
and array_search()


*/
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$result = $db->getRows("assignment");


$flag_ui = 0;

if(isset($_REQUEST["option"])) {
    $assignment = $_REQUEST["option"];
    $result = $db->getQuestions($assignment);
    $flag_ui = 1;
}

if(isset($_REQUEST["d-assignment"])) {
    $delete = $_REQUEST["d-assignment"];
    $location = "../assignments/$delete";
    $db->deleteAssignment($delete);
    array_map('unlink', glob("$location/*.*"));
    rmdir($location);
    $result =  $db->getRows("assignment");
}
?>
<html>
<head>
    <title>Assignment manager</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/assign_form.js"></script>
</head>
<body>
    <?php
    if(isset($_REQUEST["aqno"])) {
        $aqno = $_REQUEST["aqno"];
        if($db->assignmentExist($aqno)) {
            echo "<div class='notif'>Assignment $aqno already exists!</div>";
        }
        else {
            $location = "../assignments/$aqno";
            if(!file_exists($location))
                mkdir($location);
            $db->createAssignment($aqno);
            $result = $db->getRows("assignment");
        }
    }
    ?>
    <div class="main <?= ($flag_ui != 0)? "hidden":"" ?>">
    <form id='<?= ($flag_ui != 0)? "":"submet" ?>' method="post" action="assign.php">
    <div class="assign">Assignments</div>
    <input type='radio' name='option' value=0 class='hidden' checked="checked">
        <?php
        if ($flag_ui == 0){
        $count = $result["count"];
        // print_r($result);
        $row = $result["rows"];
        foreach($row as $line) {
            $ano = $line['assignment_no'];
            $qno = $line['no_of_questions'];
            echo "<label><input type='radio' id='assignment' name='option' value=$ano class='hidden'><div class='container container-1'><span>Assignment $ano</span><span class='noa'>$qno</span></div></label>";
        }
        if($count == 0) echo "<span class='center'>NO ASSIGNMENTSS DONE!</span>";    
        }    
        ?>
    </form>
    <form action="assign.php" method="post">
        <label>
            <input type="submit" value="" class="hidden">
        <div class="add-q"><input type="text" name="aqno" class=" text_a"><span class="add-q-text"> Add an assignmennt </span></div></label>
            </form>
            <div class="elements center"><a href="../index.html" class="manage">Check assignments</a></div>
    </div>
    <div class="main <?= ($flag_ui != 1)? "hidden":""  ?>">
    <form method="post" action="question.php" id="<?= ($flag_ui != 1)? "":"submet"  ?>">
    <div class="assign">Questions in Assignment <?= $assignment ?></div>
        <?php
        if ($flag_ui == 1){
        $count = $result["count"];
        // print_r($result);
        $row = $result["rows"];
        foreach($row as $line) {
            $qno = $line['question_no'];
            $stat = $line['statement'];
            echo "<label><input type='radio' id='assignment' name='option' value=$qno class='hidden'><div class='container container-2'><span>Question $qno</span><span class='cont-2-sub'>$stat</span></div></label>";
        }
        if($count == 0) echo "<span class='center'>NO QUESTIONS DONE!</span>";       
        
        echo ""; 
    }
        ?>
        <input type='text' name='assignment' value=<?= $assignment ?> class='hidden'>
        <input type='text' class='hidden' value='edit' name='mode'>
        </form>
        <form action="question.php" method="post">
        <label>
            <div class="add-q"><span class="add-q-text"> Add a question </span></div>
            <input type="submit" value="" class="hidden">
        </label>
        <input type="text" name="mode" value="new" class="hidden">
        <input type='text' name='assignment' value=<?= $assignment ?> class='hidden'>
        </form>
        <form action="assign.php" method="post">
        <label>
            <input type="submit" value="" class="hidden">
            <!-- <input type="text" name="mode" value="delete" id="" class="hidden"> -->
            <!-- <input type="text" name="assignment" value="" id="" class="hidden"> -->
            <input type="text" name="d-assignment" value="<?= $assignment ?>" id="" class="hidden">
        <div class="elements center"><span class="red">DELETE</span></div>
        </label>
        </form>
        <div class="elements center"><a href="assign.php" class="manage">Manage assignments</a></div>
    </div>
</body>
</html>