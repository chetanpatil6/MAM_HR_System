<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$sr_no = $_POST['sr_no'];
$from_period = $_POST['from_period'];
$upto_period = $_POST['upto_period'];
$company_name = $_POST['company_name'];
$designation =$_POST['designation'];
$role_details =$_POST['role_details'];

$dbconnect->update_experience($emp_no,$sr_no, $from_period, $upto_period, $company_name, $designation, $role_details);
?>