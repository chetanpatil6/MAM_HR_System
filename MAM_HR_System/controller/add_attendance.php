<?php
include("../model/Model.php");
$dbconnect = new Model();

if(isset($_POST['empl_no']))
  $empl_no = $_POST['empl_no'];
else
	$empl_no = '';

if(isset($_POST['month_nob']))
$month_nob = $_POST['month_nob'];

if(isset($_POST['per_day_for_month']))
$per_day_for_month = $_POST['per_day_for_month'];

if(isset($_POST['holidays']))
$holidays = $_POST['holidays'];

if(isset($_POST['paid_leaves']))
$paid_leaves = $_POST['paid_leaves'];

if(isset($_POST['unpaid_leaves']))
$unpaid_leaves = $_POST['unpaid_leaves'];

if(isset($_POST['suspention_days']))
$suspention_days = $_POST['suspention_days'];

if(isset($_POST['adj_days']))
$adj_days = $_POST['adj_days'];

if(isset($_POST['other_Hrs']))
$other_Hrs = $_POST['other_Hrs'];

if(isset($_POST['leave_encash_days']))
$leave_encash_days = $_POST['leave_encash_days'];

if(isset($_POST['income_tax']))
$income_tax = $_POST['income_tax'];

if($empl_no!='')
   $dbconnect->add_attendance($empl_no,$month_nob, $per_day_for_month, $holidays, $paid_leaves, $unpaid_leaves, $adj_days, $other_Hrs,$leave_encash_days, $suspention_days,$income_tax);
?>