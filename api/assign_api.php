<?php

include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = $db->getAll();

$result = [];

foreach($out["rows"] as $a) {
    $count = $a["no_of_questions"];
    $questions = array_column($a["questions"]["rows"], "question_no");
    $statements = array_column($a["questions"]["rows"], "statement");
    $statements = array_combine($questions, $statements);
    $result[$a['assignment_no']] = ["questions" => $questions, "questionsDone" => $count, "statements" => $statements];
}

// print_r($result);

header('Content-Type: application/json');
echo json_encode($result);


?>