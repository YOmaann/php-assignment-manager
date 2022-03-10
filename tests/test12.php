<?php
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = array_column(($db->getLabels(1,1))['rows'],"statement");

print_r($out);
?>