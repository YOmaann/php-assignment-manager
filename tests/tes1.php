<?php
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$result = $db->insertInto("assignment",[2,0]);
if($result) echo "records added !";

?>