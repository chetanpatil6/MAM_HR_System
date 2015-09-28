<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_id = $_POST['emp_id'];
$role = $_POST['role'];

$dbconnect->change_user_role($emp_id,$role);
?>