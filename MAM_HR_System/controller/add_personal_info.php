<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$emp_code = $_POST['emp_code'];
$punching_code = $_POST['punching_code'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name  = $_POST['last_name'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$marital_status = $_POST['marital_status'];
$blood_group = $_POST['blood_group'];
$place_of_origin =$_POST['place_of_origin'];
$nationality =$_POST['nationality'];
$permanent_addr_1 = $_POST['permanent_addr_1'];
$permanent_addr_2 = $_POST['permanent_addr_2'];
$permanent_addr_3 = $_POST['permanent_addr_3'];
$permanent_city = $_POST['permanent_city'];
$permanent_state = $_POST['permanent_state'];
$permanent_country = $_POST['permanent_country'];
$present_addr_1 = $_POST['present_addr_1'];
$present_addr_2 = $_POST['present_addr_2'];
$present_addr_3 = $_POST['present_addr_3'];
$present_city = $_POST['present_city'];
$present_state = $_POST['present_state'];
$present_country = $_POST['present_country'];
$residential_phone_no = $_POST['residential_phone_no'];
$mobile_no = $_POST['mobile_no'];
$emergency_contact_no = $_POST['emergency_contact_no'];
$emergency_contact_person = $_POST['emergency_contact_person'];
$email_id = $_POST['email_id'];
$present_pin_code = $_POST['present_pin_code'];
$permanent_pin_code = $_POST['permanent_pin_code'];

$dbconnect->add_personal_info($emp_no, $first_name, $middle_name, $last_name, $gender, $date_of_birth, $marital_status, $blood_group, $place_of_origin, $nationality, $permanent_addr_1, $permanent_addr_2, $permanent_addr_3, $permanent_city, $permanent_state, $permanent_country, $present_addr_1, $present_addr_2, $present_addr_3, $present_city,$present_state, $present_country,$residential_phone_no, $mobile_no, $emergency_contact_no, $emergency_contact_person, $email_id,$present_pin_code,$permanent_pin_code, $emp_code, $punching_code);
?>