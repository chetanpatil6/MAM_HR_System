<?php
include("../model/Model.php");
$dbconnect = new Model();

$batch_no = $_POST['batch_no'];
$month_no = $_POST['month_no'];
$remark = $_POST['remark'];

$employee_number = $_POST['employee_number'];
$comp_code = $_POST['comp_code'];
$adjustment_amount = $_POST['adjustment_amount'];
$remark_any = $_POST['remark_any'];

$dbconnect->update_batch($batch_no, $month_no, $remark, $employee_number, $comp_code, $adjustment_amount, $remark_any);
?>