<?php
include("../model/Model.php");
$dbconnect = new Model();


$comp_code = $_POST['comp_code'];
$code_name = $_POST['code_name'];
$code_desc = $_POST['code_desc'];
$when_to_pay = $_POST['when_to_pay'];
$pf_Compute = $_POST['pf_Compute'];
$pt_Compute =$_POST['pt_Compute'];
$esi_Compute =$_POST['esi_Compute'];


$dbconnect->update_compensation_heads($comp_code,$code_name, $code_desc,$when_to_pay, $pf_Compute, $pt_Compute, $esi_Compute);
?>