<?php
include("../model/Model.php");
$dbconnect = new Model();


$emp_no = $_POST['emp_no'];
$date_of_joining = $_POST['date_of_joining'];
$comp_change_eff_date = $_POST['comp_change_eff_date'];
$designation = $_POST['designation'];
$grade = $_POST['grade'];
$basic =$_POST['basic'];
$hra =$_POST['hra'];
$special =$_POST['special'];
$conveyance = $_POST['conveyance'];
$lta = $_POST['lta'];
$pf_applicable = $_POST['pf_applicable'];
$prof_tax_applicable = $_POST['prof_tax_applicable'];
$esi_applicable = $_POST['esi_applicable'];
$bank_branch_name = $_POST['bank_branch_name'];
$account_no = $_POST['account_no'];

$gratuity_applicable = $_POST['gratuity_applicable'];
$tds_applicable = $_POST['tds_applicable'];
$pension_fund_applicable = $_POST['pension_fund_applicable'];
$pf_no = $_POST['pf_no'];
$pf_date = $_POST['pf_date'];
$pf_uan_no = $_POST['pf_uan_no'];
$pf_uan_date = $_POST['pf_uan_date'];
$dearness_pay = $_POST['dearness_pay'];
$da = $_POST['da'];
$gross_salary = $_POST['gross_salary'];
$ctc = $_POST['ctc'];
$emp_type = $_POST['emp_type'];
$emp_cat = $_POST['emp_cat'];
$date_confirm = $_POST['date_confirm'];
$date_sep = $_POST['date_sep'];
$type_sep = $_POST['type_sep'];
$remark_sep = $_POST['remark_sep'];
$salary_on_joining = $_POST['salary_on_joining'];
$mode_of_payment = $_POST['mode_of_payment'];

$lic_acc_1 = $_POST['lic_acc_1'];
$lic_amt_1 = $_POST['lic_amt_1'];
$lic_acc_2 = $_POST['lic_acc_2'];
$lic_amt_2 = $_POST['lic_amt_2'];
$loan_acc_1 = $_POST['loan_acc_1'];
$loan_amt_1 = $_POST['loan_amt_1'];
$loan_acc_2 = $_POST['loan_acc_2'];
$loan_amt_2 = $_POST['loan_amt_2'];

$lic_id_1 = $_POST['lic_id_1'];
$lic_id_2 = $_POST['lic_id_2'];
$lic_gratuity_1 = $_POST['lic_gratuity_1'];
$lic_gratuity_2 = $_POST['lic_gratuity_2'];
$loan_id_1 = $_POST['loan_id_1'];
$loan_id_2 = $_POST['loan_id_2'];
$loan_gratuity_1 = $_POST['loan_gratuity_1'];
$loan_gratuity_2 = $_POST['loan_gratuity_2'];

$grant_type = $_POST['grant_type'];
$department = $_POST['department'];

$dbconnect->update_company_info($emp_no, $date_of_joining, $comp_change_eff_date, $designation, $grade, $basic, $hra, $special, $conveyance,$lta, $pf_applicable, $prof_tax_applicable, $esi_applicable, $bank_branch_name, $account_no, $gratuity_applicable, $tds_applicable, $pension_fund_applicable,$pf_no, $pf_date,$pf_uan_no, $pf_uan_date,$dearness_pay, $da, $gross_salary, $ctc, $emp_type,$emp_cat,$date_confirm,$date_sep,$type_sep,$remark_sep,$salary_on_joining,$mode_of_payment, $lic_acc_1, $lic_amt_1, $lic_acc_2, $lic_amt_2, $loan_acc_1, $loan_amt_1, $loan_acc_2, $loan_amt_2, $lic_id_1, $lic_id_2, $lic_gratuity_1, $lic_gratuity_2, $loan_id_1, $loan_id_2, $loan_gratuity_1, $loan_gratuity_2, $grant_type, $department);
?>