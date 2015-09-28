<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$role = $_POST['role'];

$dbconnect->add_user_role($emp_no,$role);
?>