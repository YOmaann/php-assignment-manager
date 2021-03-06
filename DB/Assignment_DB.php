<?php
include "db.php";
include "../includes/db_util.php";

class Assignment_DB {
    private $connection;
    function __construct($db_name = false) {
        if(!$db_name) return false;
        global $host, $username, $password;
        $this->connection = mysqli_connect($host, $username, $password, $db_name);
        if(!$this->connection) {
            die("MYSQL connection failed!");
        }
    }
    function check() {
        if(!$this->connection)
            die("Database not connected! Error:".mysqli_error($this->connection));
    }
    function query($q) {
        $this->check();
        $result = mysqli_query($this->connection, $q);
        if(!$result) {
            echo "Query Failed! error: ".mysqli_error($this->connection);
        }
        return $result;
    }
    function createTable($table_name, $assoc_attrib = []) {
        $query = "CREATE TABLE $table_name (";
        $attrib = [];
        foreach($assoc_attrib as $bob) {
            $t = "{$bob['name']} {$bob['type']}";
            $t.= (isset($bob['primary_key']) && $bob['primary_key'])?" PRIMARY KEY": "";
            array_push($attrib,  $t);
        }
        $query .= implode(",", $attrib).")";
        // echo $query;
        $this->query($query);
    }
    function dropTable($table_name) {
        $query = "DROP TABLE $table_name";
        return $this->query($query);
    }
    function createDatabase($db_name) {
        global $host, $username, $password;
        $this->connection = mysqli_connect($host, $username, $password);
        // $this->check();
        $query = "CREATE DATABASE IF NOT EXISTS $db_name";
        return $this->query($query);
    }
    function dropDatabase($db_name) {global $host, $username, $password;
        $this->connection = mysqli_connect($host, $username, $password);
        $query = "DROP DATABASE $db_name";
        $this->query($query);
    }
    function insertInto($table_name, $elements) {
        $elements = array_map('sanitizeEl' , $elements);
        $query = "insert into $table_name values(".implode(",",$elements).")";
        return $this->query($query);
    }
    function configure() {
        global $host, $username, $password, $db;
        $this->connection = mysqli_connect($host, $username, $password);
        $q1 = "Create database $db";
        $this->query($q1);
        $this->connection = mysqli_connect($host, $username, $password, $db);
        $q2 = "create table assignment(assignment_no integer(3) primary key, no_of_questions integer(3))";
        $this->query($q2);
        $q2 = "create table questions(question_no int(3), assignment_no int(3), statement varchar(1000), location varchar(1000), no_of_inputs int(3), primary key(question_no, assignment_no))";
        $this->query($q2);
        $q2 = "create table label(label_no int(3), question_no int(3), assignment_no int(3), statement varchar(1000), primary key(label_no, question_no, assignment_no))";
        $this->query($q2);
    }
    function rowToarr($result) {
        $out = ["count" => mysqli_num_rows($result),"rows" => []];
        while($array = mysqli_fetch_assoc($result)) {
            array_push($out['rows'], $array);
        }
        return $out;
    }
    function getRows($tb_name, $where = null) {
        $query = "select * from $tb_name";
        if($where){
            $assoc_w = assoc_helper($where);
            $query .= " where $assoc_w";
        }
        $result = $this->query($query);
        $out = $this->rowToarr($result);
        return $out;
        // print_r($array);
        // foreach($array as $r) {
        //     echo $r['assignment_no']." ".$r['no_of_questions'];
        // }
    }

    function getLabels($assign, $question) {
        $query = "select statement from label where assignment_no=$assign and question_no=$question order by label_no";
        $labels = $this->query($query);
        return $this->rowToarr($labels);
    }
    function getAllLabels($assign) {
        $query = "select statement from label where assignment_no=$assign order by question_no";
        $labels = $this->query($query);
        return $this->rowToarr($labels);
    }
    function getQuestions($assign) {
        // $tmp_connection
        $query = "select question_no, statement, location, no_of_inputs from assignment natural join questions where assignment.assignment_no=$assign ";
        $result = $this->query($query);
        // $query = 
        $resultR = $this->rowToarr($result);
        // print_r($resultR);

        foreach($resultR['rows'] as &$q) {
            $q['labels'] = array_column(($this->getLabels($assign , $q['question_no'])['rows']), "statement");
        }
        return $resultR;
    }
    function assignmentExist($assign) {
        $query = "select * from assignment where assignment_no=$assign";
        $result = $this->query($query);
        if(mysqli_num_rows($result) == 0)
            return false;
        return true;
    }
    function createAssignment($assign) {
        $this->insertInto("assignment", [$assign, 0]);
    }
    function getAll() {
        $assignments = $this->getRows("assignment");
        foreach($assignments["rows"] as &$a) {
            $a["questions"] = $this->getQuestions($a["assignment_no"]);

        }
        return $assignments;
    }
    function update($tb_name, $values, $where) {
        // $keys = array_keys($assoc);
        $assoc_v = assoc_helper($values);
        $assoc_w = addAnd(assoc_helper($where));
        $query = "update $tb_name set $assoc_v where $assoc_w";
        return $this->query($query);
    }
    function getFunctionLocation($assign, $question) {
        $row = $this->getQuestionDetails($assign, $question);
        if(!$row) return false;
        return $row["location"];
    }
    function getQuestionDetails($assign, $question) {
        $query = "select question_no, statement, location, no_of_inputs from assignment natural join questions where assignment.assignment_no=$assign and questions.question_no=$question";
        $result = $this->query($query);
        $row = mysqli_fetch_assoc($result);
        $row["labels"] = array_column($this->getLabels($assign, $question)['rows'], "statement");
        if(!$row) return false;
        return $row;
    }
    function increamentAssC($assign) {
        $query = "update assignment set no_of_questions=no_of_questions+1 where assignment_no=$assign";
        return $this->query($query);
    }
    function decreamentAssC($assign) {
        $query = "update assignment set no_of_questions=no_of_questions-1 where assignment_no=$assign";
        return $this->query($query);
    }
    function deleteRow($table_name, $where) {
        $assoc_where = assoc_helper($where);
        // print_r($where);
        $assoc_where = addAnd($assoc_where);
        $query = "delete from $table_name where $assoc_where";
        // echo $query;
        $result = $this->query($query);
        return $result;
        // $query = 
    }
    function deleteQuestion($assign, $question) {
        // echo $assign." -------------".$question."<br>";
        return $this->deleteRow("questions", ["assignment_no" => $assign, "question_no"=> $question]) && $this->deleteLabels($question, $assign);
        // $query = "delete from assignment where assignment_no=$assign";
        // $this->query($query);
    }
    function deleteLabels($assign, $question) {
        return $this->deleteRow("label", ["assignment_no" => $assign, "question_no"=> $question]);
    }
    function deleteAllQuestions($assign) {
        return $this->deleteRow("questions", ["assignment_no" => $assign]);
    }
    function deleteAssignment($assign) {
        
        return $this->deleteRow("assignment", ["assignment_no" => $assign]) && $this->deleteAllQuestions($assign);
    }
    function addNewLabels($assignment, $question, $labels) {
        $result = $this->deleteLabels($assignment, $question);
        $i = 1;
        foreach($labels as $l) {
          $result = $result && $this->insertInto("label", [$i++, $question, $assignment, $l]);
        }
        return $result;
      }

}
?>