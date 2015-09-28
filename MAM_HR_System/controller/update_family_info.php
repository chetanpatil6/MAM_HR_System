<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$spouse_Name = $_POST['spouse_Name'];
$spouse_contact_no = $_POST['spouse_contact_no'];
$no_of_family_member = $_POST['no_of_family_member'];
$no_of_dependents =$_POST['no_of_dependents'];

$name1 =$_POST['name1'];
$relation1 =$_POST['relation1'];
$age1 =$_POST['age1'];
$gaurdian1 =$_POST['gaurdian1'];

$name2 =$_POST['name2'];
$relation2 =$_POST['relation2'];
$age2 =$_POST['age2'];
$gaurdian2 =$_POST['gaurdian2'];



$dbconnect->update_family_info($emp_no,$spouse_Name, $spouse_contact_no, $no_of_family_member, $no_of_dependents,$name1,$relation1,$age1,$gaurdian1,$name2,$relation2,$age2,$gaurdian2);
?>