<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$password = $_POST['password'];


$dbconnect->add_new_dearness_allowance($emp_no,$password);
?>