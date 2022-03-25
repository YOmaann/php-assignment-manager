<?php

function question() {
global $N;
$db = new Assignment_DB();
// if($db->dropDatabase($N))
// echo "Database $N dropped!";
// else
// die("Error!");

if($db->createDatabase($N))
echo "Database $N created!";
else
die("Error");
}

question();

?>