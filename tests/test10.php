<?php
include "../DB/Assignment_DB.php";

$db = new Assignment_DB("assignment");
$out = $db->getQuestionDetails(1, 4);

?>
<pre>
    <?php
   print_r($out);
    ?>
</pre>