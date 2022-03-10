<?php
include '../includes/csv.php';

$csv = loadCSV("csv.txt");
print_r($csv);

echo toCSV($csv);



?>