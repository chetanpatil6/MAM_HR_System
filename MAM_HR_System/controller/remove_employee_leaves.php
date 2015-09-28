<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];

$leaveArray = $_POST['leaveArray'];
/*$flArray = $_POST['flArray'];
$elArray = $_POST['elArray'];

$mlArray = $_POST['mlArray'];
$spArray = $_POST['spArray'];
$paid_leaves = $_POST['paid_leaves'];*/
//$unpaid_leaves = $_POST['unpaid_leaves'];

$leaveCodeArray = $_POST['leaveCodeArray'];
$count_type = $_POST['count_type'];
/*$fl_codeArray = $_POST['fl_codeArray'];
$el_codeArray = $_POST['el_codeArray'];
$ml_codeArray = $_POST['ml_codeArray'];
$sp_codeArray = $_POST['sp_codeArray'];
$paid_codeArray = $_POST['paid_codeArray'];*/

$dbconnect->remove_employee_leaves($emp_no,$leaveArray,$leaveCodeArray,$count_type);
?>