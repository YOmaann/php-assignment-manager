<?php
include "../DB/Assignment_DB.php";


$db = new Assignment_DB("assignment");
$arr = ["name" => "lucky", "roll" => 123];
$where = ["id" => 1];
$out = $db->update("test", $arr, $where);

?>
<pre>
    <?php
    echo $out;
    ?>
</pre>