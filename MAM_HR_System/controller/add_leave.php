<?php
include("../model/Model.php");
$dbconnect = new Model();

$doc_no=$_POST['doc_no'];
$doc_date=$_POST['doc_date'];
$emp_no = $_POST['emp_no'];
$leave_type = $_POST['leave_type'];
$attendance_no = $_POST['attendance_no'];
$leave_application_number = $_POST['leave_application_number'];
$registration_no = $_POST['registration_no'];
$application_date = $_POST['application_date'];
$designation = $_POST['designation'];
$received_date= $_POST['received_date'];
$from_date = $_POST['from_date'];
$from_day = $_POST['from_day'];
$to_date = $_POST['to_date'];
$to_day = $_POST['to_day'];
/*$half_full_day = $_POST['half_full_day'];*/
$total_leave = $_POST['total_leave'];
$stock_type =$_POST['stock_type'];
$updated_by =$_POST['updated_by'];
$leave_status = $_POST['leave_status'];
/*
$fl = $_POST['fl'];
$el = $_POST['el'];

$ml = $_POST['ml'];
$sp = $_POST['sp'];*/

/*$unpaid_leaves = $_POST['unpaid_leaves'];
$absent_days = $_POST['absent_days'];*/
$remark = $_POST['remark'];

$dbconnect->add_leave($doc_no,$doc_date,$emp_no,$leave_type,$attendance_no,$leave_application_number,$registration_no,$application_date,$designation,$received_date,$from_date,$from_day, $to_date,$to_day,$total_leave,$stock_type,$updated_by,$leave_status,$remark);
?>