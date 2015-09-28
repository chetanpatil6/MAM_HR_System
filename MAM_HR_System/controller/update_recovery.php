<?php
include("../model/Model.php");
$dbconnect = new Model();


$emple_no = $_POST['emple_no'];
$recovery_title = $_POST['recovery_title'];
$total_amount = $_POST['total_amount'];
$no_of_installments = $_POST['no_of_installments'];
$installment_amount_per_salary = $_POST['installment_amount_per_salary'];
$amount_balance_after_recovery = $_POST['amount_balance_after_recovery'];
$compen_code = $_POST['compen_code'];
$recovery_status = $_POST['recovery_status'];
$remark_any = $_POST['remark_any'];
$dbconnect->update_recovery($emple_no,$recovery_title, $total_amount,$no_of_installments,$installment_amount_per_salary,$amount_balance_after_recovery,$compen_code,$recovery_status,$remark_any);
?>