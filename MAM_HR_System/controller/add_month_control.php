<?php
include("../model/Model.php");
$dbconnect = new Model();


$month_no = $_POST['month_no'];
$month_avtive = $_POST['month_avtive'];
$no_days = $_POST['no_days'];
$per_day_divisor = $_POST['per_day_divisor'];
$da_index = $_POST['da_index'];
$hra_index = $_POST['hra_index'];
$bonus_index = $_POST['bonus_index'];

$dbconnect->add_month_control($month_no,$month_avtive, $no_days,$per_day_divisor,$da_index,$hra_index, $bonus_index);
?>