<?php

include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = $db->getAll();

header('Content-Type: application/json');
echo json_encode($out);

?>