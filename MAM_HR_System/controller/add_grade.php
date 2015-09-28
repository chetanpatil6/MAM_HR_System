<?php
include("../model/Model.php");
$dbconnect = new Model();


$grade = $_POST['grade'];
$desc = $_POST['desc'];

$dbconnect->add_grade($grade, $desc);
?>