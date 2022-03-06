<?php
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$result = $db->getRows("assignment");
echo json_encode($result);
// if($result) echo "records added !";

?>