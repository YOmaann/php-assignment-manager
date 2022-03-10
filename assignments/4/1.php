<?php
function question() {
global $N, $M;
Table $tb = new Table;
$da = 3/100 * $N;
$hra = 15/100 * $N;
$pf = 12/100 * $N;
$gross = $N + $da +$hra + $pf;
$net = $gross - $pf;
$tb->addHeadRow(["Type", "Amount"]);
$tb->addRow(["Dearness Allowance", $da]);
$tb->addRow(["House Rental Allowance", $hra]);
$tb->addRow(["Provident Fund", $pf]);
$tb->addRow(["Gross Salary", $gross]);
$tb->addRow(["Net Salary", $net]);

echo "NAME : $N <br> Basic Salary : $M <br>";

echo $tb->getTable();
}
question();
?>