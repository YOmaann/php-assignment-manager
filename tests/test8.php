<?php
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = $db->getFunctionLocation(1,1);

?>
<pre>
    <?php
   echo $out;
    ?>
</pre>