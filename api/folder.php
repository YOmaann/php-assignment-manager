<?php

$folder = "../files/*";
$list = glob($folder);

header('Content-Type: application/json');
echo json_encode($list);

?>