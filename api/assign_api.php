<?php

include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = $db->getAll();

$result = [];

foreach($out["rows"] as $a) {
    $count = $a["no_of_questions"];
    $questions = array_column($a["questions"]["rows"], "question_no");
    $statements = array_column($a["questions"]["rows"], "statement");
    $no_of_inputs = array_column($a["questions"]["rows"], "no_of_inputs");
    $no_of_inputs = array_combine($questions, $no_of_inputs);
    $statements = array_combine($questions, $statements);
    $labels = array_column(array_column($a["questions"]["rows"], "labels"), "rows");
    array_map("array_values", $labels);
    $result[$a['assignment_no']] = ["questions" => $questions, "questionsDone" => $count, "statements" => $statements, "inputs" => $no_of_inputs, "labels" => $labels];
}

// print_r($result);

header('Content-Type: application/json');
echo json_encode($result);


?>