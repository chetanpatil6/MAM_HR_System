<?php
include("../model/Model.php");
$dbconnect = NEW Model('pharma', 'root', '');

$uname = $_POST['uname'];

$currentpass = $_POST['currentpass'];
$changepass = $_POST['changepass'];
$confirmpass = $_POST['confirmpass'];

$dbconnect->changepassword($uname, $currentpass, $changepass, $confirmpass);

//echo "Item Added to Inventory";
?>
