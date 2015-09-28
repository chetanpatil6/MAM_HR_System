<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$password = $_POST['password'];
$role = $_POST['role'];

$dbconnect->add_user($emp_no,$password,$role);
?>