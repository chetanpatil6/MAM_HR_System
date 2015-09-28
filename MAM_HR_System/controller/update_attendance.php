<?php
include("../model/Model.php");
$dbconnect = new Model();


$empl_no = $_POST['empl_no'];
$month_nob = $_POST['month_nob'];
$per_day_for_month = $_POST['per_day_for_month'];

$holidays = $_POST['holidays'];
$paid_leaves = $_POST['paid_leaves'];
$unpaid_leaves = $_POST['unpaid_leaves'];

$adj_days = $_POST['adj_days'];
$other_Hrs = $_POST['other_Hrs'];
$leave_encash_days = $_POST['leave_encash_days'];
$suspention_days = $_POST['suspention_days'];

$income_tax = $_POST['income_tax'];

$dbconnect->update_attendance($empl_no,$month_nob, $per_day_for_month, $holidays, $paid_leaves, $unpaid_leaves, $adj_days,$other_Hrs, $leave_encash_days, $suspention_days,$income_tax);
?>