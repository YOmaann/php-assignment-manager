<?php
include "../includes/db_util.php";

$arr = ["name" => "lucky", "roll" => 123];
$out = assoc_helper($arr);

?>
<pre>
    <?php
    echo $out;
    ?>
</pre>