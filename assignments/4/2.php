<?php

$connection = mysqli_connect("localhost", "root", "", "question4");
if(!$connection) {
die("Couldn't connect to the database!");
}

$name = $L[0];
$email = $L[1];
$num = $L[2];

// $multi = "INSERT INTO info(name, email, number) VALUES ($name, $email,$num); SELECT * FROM info;";
$query = "INSERT INTO info(name, email, number) VALUES('$name', '$email',$num)";

$result = mysqli_query($connection, $query);

// $result = ($connection);

if(!$result) die("Error inserting into table ".mysqli_error($connection));



echo "INSERTED INTO THE TABLE !";
// mysqli_commit($connection);

$query = "SELECT * from info";
$result = mysqli_query($connection, $query);


$table = new Table();
$table->addHeadRow(["Name", "Email" , "Number"]);
while($row = mysqli_fetch_assoc($result)) {
    $name = $row["name"];
    $email = $row["email"];
    $no = $row["number"];

    $table->addRow([$name, $email, $no]);
}
echo "<br><br>".$table->getTable()
?>