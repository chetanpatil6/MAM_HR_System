<?php
include("../model/Model.php");
$dbconnect = new Model();

$emp_no = $_POST['emp_no'];
$attendance_no = $_POST['attendance_no'];
$leave_application_number = $_POST['leave_application_number'];
$registration_no = $_POST['registration_no'];

$application_date = $_POST['application_date'];
$designation = $_POST['designation'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

$month = $_POST['month'];
$total_leave = $_POST['total_leave'];
$cl = $_POST['cl'];
$fl = $_POST['fl'];
$el = $_POST['el'];

$ml = $_POST['ml'];
$sp = $_POST['sp'];

$unpaid_leaves = $_POST['unpaid_leaves'];
$absent_days = $_POST['absent_days'];
$remark = $_POST['remark'];

$dbconnect->update_leave($emp_no,$attendance_no,$leave_application_number, $registration_no, $application_date, $designation, $from_date, $to_date, $month,$total_leave, $cl,$fl,$el,$ml,$sp,$unpaid_leaves,$absent_days,$remark);
?>