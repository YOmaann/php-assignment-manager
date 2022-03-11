<?php
function question() {
global $N, $M;

$file = "payslip.txt";
$tb = new Table;

$da = 3/100 * $M;
$hra = 15/100 * $M;
$pf = 12/100 * $M;
$gross = $M + $da +$hra + $pf;
$net = $gross - $pf;
$tb->addHeadRow(["Type", "Amount"]);
$tb->addRow(["Dearness Allowance", $da]);
$tb->addRow(["House Rental Allowance", $hra]);
$tb->addRow(["Provident Fund", $pf]);
$tb->addRow(["Gross Salary", $gross]);
$tb->addRow(["Net Salary", $net]);

$csv = toOneCSV([$N, $M, $da, $hra, $pf, $gross, $net]);
writeF($file, $csv);
echo "NAME : $N <br> Basic Salary : $M <br><br>";

echo $tb->getTable();
echo "<br>CSV file : $csv";
}
question();
?>