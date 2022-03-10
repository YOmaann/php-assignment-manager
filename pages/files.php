<?php

/*
array_column()
and array_search()


*/

$folder = "../files/*";
$files = glob($folder);


?>
<html>
<head>
    <title>Assignment manager</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/ajax.js"></script>
    <script src="../js/files.js"></script>
</head>
<body>
    <div class="main wide">
    <div class="assign">Files</div>
    <div class="case">
    <div class="file_list">
    <input type='radio' name='option' value=0 class='hidden' checked="checked">
        <?php
        $count = count($files);
        // print_r($result);
        // $row = $result["rows"];
        foreach($files as $line) {
            echo "<label><input type='radio' id='assignment' name='option' value=$line class='hidden fish'><div class='container container-1'><span>$line</span><span class='files'>&#8594;</span></div></label>";
        }
        if($count == 0) echo "<span class='center'>No Files</span>";    
        ?>
    </div>
    <div class="file_open">
        <div class="button" onclick="toggle()">Close</div>
        <div class="content_file">

        </div>
    </div>
        </div>
        <div class="elements center"><a href="assign.php" class="manage">Manage assignments</a></div>
    </div>
</body>
</html>