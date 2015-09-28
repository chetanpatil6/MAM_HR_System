<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_code = $_POST['emp_code'];
$comp_code = $_POST['comp_code'];
$comp_change_eff_date = $_POST['comp_change_eff_date'];
$amount = $_POST['amount'];
$dbconnect->add_emp_compensation($emp_code,$comp_code, $comp_change_eff_date,$amount);
?>