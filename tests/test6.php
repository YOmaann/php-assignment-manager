<?php
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = $db->getQuestions(1);

?>
<pre>
    <?php
   print_r($out);
    ?>
</pre>