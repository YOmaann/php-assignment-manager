<?php
include "../DB/Assignment_DB.php";

$test = new Assignment_DB("assignment");
$test->createTable("popoye", [[
"name" => "ID", "type" => "int(10)", "length" => 10, "primary_key" => true
],
[
    "name" => "name", "type" => "varchar(10)", "length" => 10]]);

?>