<?php

class Table {
    private $result;
    function __construct()
    {
        $this->result = "";
    }
    function getTable() {
        return "<table>$this->result</table>";
    }
    function addRow($data, $heading = false) {
        // global $result;
        $tmp = "";
        // print_r($data);
        foreach($data as $d) {
            if($heading) 
            $tmp .= "<th>$d</th>";
            else
            $tmp .= "<td>$d</td>";
        }
        $this->result .= "<tr>$tmp</tr>";
    }
    function addHeadRow($data) {
        $this->addRow($data, true);
    }
}

?>