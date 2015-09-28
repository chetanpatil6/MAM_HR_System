<?php
include("../model/Model.php");
$dbconnect = new Model();


$employee_name = $_POST['employee_name'];
$transfer_from = $_POST['transfer_from'];
$leaves_transfer = $_POST['leaves_transfer'];
$transfer_to = $_POST['transfer_to'];

$leaveArray = $_POST['leaveArray'];
$currentLeaveCodeArray = $_POST['currentLeaveCodeArray'];
$current_total_leaves = $_POST['current_total_leaves'];
$created_date = $_POST['created_date'];
/*$current_sp = $_POST['current_sp'];
$current_total_leaves = $_POST['current_total_leaves'];
$created_date = $_POST['created_date'];*/


$dbconnect->add_leave_transfer_type($employee_name,$transfer_from, $leaves_transfer, $transfer_to,$leaveArray,$currentLeaveCodeArray, $current_total_leaves,$created_date);
?>