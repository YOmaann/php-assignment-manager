<?php
include '../DB/Assignment_DB.php';
include '../includes/files.php';
include '../includes/array.php';

$assignment = $_REQUEST['assignment'];
$mode = $_REQUEST['mode'];

$db = new Assignment_DB("assignment");

$statement = '';
$code = '';
$location = '';
$no_of_inputs = '';
$labels = '';

if(isset($_REQUEST["option"])){
$question = $_REQUEST['option'];
$question_info = $db->getQuestionDetails($assignment, $question);
$statement = $question_info['statement'];
$location = $question_info['location'];
// print_r($question_info['labels']);
$labels = implode(",", $question_info['labels']);
$code = readF($location, false);
$no_of_inputs = $question_info['no_of_inputs'];
}

$questionsin = array_column($db->getQuestions($assignment)['rows'], "question_no");

// print_r($questionsin);
?>

<html>
  <head>
    <title>Question manager</title>
    <link rel="stylesheet" href="../css/style.css">
     <!-- <script src="./js/.js"></script>
    <script src="./js/elements.js"></script> -->
  </head>
  <body>
    <div class="main width30">
      <form action="question_modify.php" action="post">
          <input type="text" name="assignment" value="<?= $assignment ?>" class="hidden">
          <input type="text" name="mode" value="<?= $mode ?>" class="hidden">

        <div class="elements">
            <?php
            if($mode == "new") {
          echo "<span class='assign'>Adding to Assignment $assignment</span></div><div class='elements'>";
          echo '<span>Input Question Number</span><span><div class="op"><select name="question">';
          for($i = 1 ; $i <= 20; $i++){
                echo $i." ".array_search($i, $questionsin)." ";
                if(!a_search( $questionsin, $i))
                 echo "<option value=$i>$i</option>";}
          echo '</select></div></span>';
            }
            else{
                echo '<span class="assign">Editing '."$assignment - $question</span> <input type='text' name='question' value='$question' class='hidden'></div>";
                echo "<div class='elements'>Location : ".$question_info['location'];
            }
          ?>
        </div>
        <div class="elements">
          <span>No. of inputs</span><span><input type="text" name="inputs" value="<?= $no_of_inputs ?>" required/></span>
        </div>
        <div class="elements">
          <span>Labels</span><span><input type="text" name="labels" value="<?= $labels ?>" required/></span>
        </div>
        <div class="elements" id = 'm'>
          <span>Input Question Statement</span><span><textarea name="statement" id="n" cols="20" rows="3" class="question_filler"><?= $statement?></textarea></span>
        </div>
        <div class="elements" id = 'm'>
          <span><textarea name="code" id="n" cols="60" rows="20" class="question_filler code" placeholder="Input code here"><?= readF($location, false) ?></textarea></span>
        </div>
        <div class="submit">
        <input type="submit" value="SUBMIT"></form>
        </div>
      </form>
      <div class="elements center margin_top">
    <?php
    
    if($mode == 'edit')
      echo '<form action="question_modify.php" method="post">
        <label>
            <input type="submit" value="" class="hidden">
            <input type="text" name="question" value="'.$question.'" id="" class="hidden">
            <input type="text" name="mode" value="delete" id="" class="hidden">
            <!-- <input type="text" name="assignment" value="" id="" class="hidden"> -->
            <input type="text" name="assignment" value="'.$assignment.'" id="" class="hidden">
        <div class="elements"><span class="center red">DELETE</span></div>
        </label>
        </form>';
        ?>
      </div>
      <form action="assign.php" method="post">
        <label>
            <input type="submit" value="" class="hidden">
            <input type="text" name="option" value="<?= $assignment ?>" id="" class="hidden">
        <div class="elements center"><span class="manage">Manage assignment <?= $assignment ?></span></div>
        </label>
        </form>
    </div>
  </body>
</html>
