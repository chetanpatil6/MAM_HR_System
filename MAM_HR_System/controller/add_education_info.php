<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$sr_no = $_POST['sr_no'];
$degree_title = $_POST['degree_title'];
$subject = $_POST['subject'];
$year_of_passing = $_POST['year_of_passing'];
$university =$_POST['university'];
$state =$_POST['state'];
$country =$_POST['country'];

$dbconnect->add_education_info($emp_no,$sr_no, $degree_title, $subject, $year_of_passing, $university, $state, $country);
?>