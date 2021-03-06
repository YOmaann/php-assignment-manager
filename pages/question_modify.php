<?php

include "../DB/Assignment_DB.php";
include "../includes/files.php";

$mode = $_REQUEST['mode'];

$question = $_REQUEST['question'];
$assignment = $_REQUEST['assignment'];

if ($mode != 'delete'){
    $statement = $_REQUEST['statement'];
    $code = $_REQUEST['code'];
    $inputs = $_REQUEST['inputs'];
    $labels = explode(",", $_REQUEST['labels']);
}

$location = "../assignments/$assignment/$question.php";

$db = new Assignment_DB("assignment");

$error = "Something went wrong !";



?>

<html>
  <head>
    <title><?= strtoupper($mode)." Assignment" ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- <script src="./js/ajax.js"></script>
    <script src="./js/script.js"></script> -->
  </head>
  <body>
    <div class="main">
        <?php
        echo "<span class='modify'>";
        if($mode == 'new') {
            writeF($location, $code, false);
            $db->increamentAssC($assignment);
            $result = $db->insertInto("questions", [$question, $assignment, $statement, $location, $inputs]);
            $result = $result && $db->addNewLabels($assignment, $question, $labels);
            if($result) echo "Successfully added Question $question to Assignment $assignment</span>";
            else echo $error;
        }
        else if($mode == 'edit') {
            writeF($location, $code, false);
            $values = ["statement" => $statement, "no_of_inputs" => $inputs];
            $where = ["question_no" => $question, "assignment_no" => $assignment];
            $result = $db->update("questions", $values, $where);
            // if(!$result) die("Error deleting errors !");
            $result = $result && $db->addNewLabels($assignment, $question, $labels);
            // if(!$result) die("Error deleting errors !");
            if($result) echo "Successfully edited Question $question in Assignment $assignment</span>";
            else echo $error;
        }
        else if($mode == 'delete') {
            $result = $db->deleteQuestion($assignment, $question);
            $db->decreamentAssC($assignment);
            echo $location."<br>";
            unlink($location);
            if($result) echo "Successfully deleted Question $question from Assignment $assignment</span>";
            else echo $error;
        }
        ?>
        <form action="assign.php" method="post">
        <label>
            <input type="submit" value="" class="hidden">
            <input type="text" name="option" value="<?= $assignment ?>" id="" class="hidden">
        <div class="elements center"><span class="manage">Go back</span></div>
        </label>
        </form>
    </div>
    </div>
  </body>
</html>
