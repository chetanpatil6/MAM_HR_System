<?php
include("../model/Model.php");
$dbconnect = new Model();

$attendance_no = $_POST['attendance_no'];
$leave_application_number = $_POST['leave_application_number'];
$registration_no = $_POST['registration_no'];
$emp_no= $_POST['emp_no'];
$application_date = $_POST['application_date'];
$designation = $_POST['designation'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$leave_status = $_POST['leave_status'];
$total_leav = $_POST['total_leav'];

$dbconnect->cancel_leave($attendance_no,$leave_application_number, $registration_no, $emp_no, $application_date, $designation, $from_date, $to_date, $leave_status, $total_leav);
?>