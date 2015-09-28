<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$month = $_POST['month'];
$no_day_month = $_POST['no_day_month'];

$week_off = $_POST['week_off'];
$working_days = $_POST['working_days'];
$present_days = $_POST['present_days'];
$paid_days = $_POST['paid_days'];

$unpaid_days = $_POST['unpaid_days'];
$absent_days = $_POST['absent_days'];
$suspen_days = $_POST['suspen_days'];
$encashment_days = $_POST['encashment_days'];
$remark = $_POST['remark'];

$dbconnect->add_leave_attendance($emp_no,$month, $no_day_month, $week_off, $working_days, $present_days, $paid_days, $unpaid_days,$absent_days, $suspen_days,$encashment_days,$remark);
?>