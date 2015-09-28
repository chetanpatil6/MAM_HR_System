<?php
include("../model/Model.php");
$dbconnect = new Model();


$grade = $_POST['grade'];
$compe_code = $_POST['compe_code'];
$amounts = $_POST['amounts'];
$dbconnect->add_grade_wise_compensation($grade,$compe_code, $amounts);
?>