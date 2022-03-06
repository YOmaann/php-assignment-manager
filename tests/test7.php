<?php
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = $db->getAll();

?>
<pre>
    <?php
   print_r($out);
    ?>
</pre>