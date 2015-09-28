<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$currentelArray = $_POST['currentelArray'];
$balancedelArray = $_POST['balancedelArray'];
$totalelArray = $_POST['totalelArray'];

$dbconnect->add_leave_encashment_form($emp_no,$currentelArray,$balancedelArray,$totalelArray);
?>