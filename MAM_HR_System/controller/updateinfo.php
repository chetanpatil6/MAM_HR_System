<?php
include("../model/Model.php");
$dbconnect = new Model();

$name = $_POST['name'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$address3 = $_POST['address3'];
$address4 = $_POST['address4'];
$city = $_POST['city'];
$pin_code = $_POST['pin_code'];
$state = $_POST['state'];
$country= $_POST['country'];
$phone_number= $_POST['phone_number'];
$landline= $_POST['landline'];
$email= $_POST['email'];
$alternate_email = $_POST['alternate_email'];
$vat_no = $_POST['vat_no'];
$cst_no= $_POST['cst_no'];
$service_tax_no = $_POST['service_tax_no'];

$exicise_regn_no = $_POST['exicise_regn_no'];
$accessee_code = $_POST['accessee_code'];
$certificate_no = $_POST['certificate_no'];
$rate_of_duty= $_POST['rate_of_duty'];
$income_tax_no= $_POST['income_tax_no'];
$pan_no= $_POST['pan_no'];
$exicise_range= $_POST['exicise_range'];
$exicise_div= $_POST['exicise_div'];
$commissionorate= $_POST['commissionorate'];
$pla_ac_no= $_POST['pla_ac_no'];

$sign1= $_POST['sign1'];
$sign2= $_POST['sign2'];
$sign3= $_POST['sign3'];


$dbconnect->updateinfo( $name, $address1,  $address2,  $address3, $address4, $city, $pin_code, $state, $country, $phone_number, $landline, $email,  $alternate_email, $vat_no, $cst_no, $service_tax_no, $exicise_regn_no, $accessee_code,$certificate_no,$rate_of_duty,$income_tax_no, $pan_no,$exicise_range, $exicise_div,$commissionorate,$pla_ac_no, $sign1,$sign2,$sign3);
//echo "Record inserted successfully";
?>