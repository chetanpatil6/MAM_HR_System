<?php


$company = $_POST['company_name'];
$dbname = $_POST['dbname'];
$payroll = $_POST['payroll'];


if($company!='')
{

$xml = simplexml_load_file("../model/connection.xml"); //This line will load the XML file.

$sxe = new SimpleXMLElement($xml->asXML()); //In this line it create a SimpleXMLElement object with the source of the XML file.
//The following lines will add a new child and others child inside the previous child created.
$db = strtolower($company);
$dbname = str_replace(' ', '_' , $db);

$company = str_replace(' ', '12345', $company);

$person = $sxe->addChild($company);

$person->addChild("host", "localhost");
$person->addChild("uname", "root");
$person->addChild("password", "");
$person->addChild("dbname", $dbname);
//This next line will overwrite the original XML file with new data added
$sxe->asXML("../model/connection.xml"); 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
ini_set("error_reporting", E_ALL & ~E_DEPRECATED);
$con = mysql_connect("localhost","root","my_password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (mysql_query("CREATE DATABASE $dbname",$con))
  {
  echo "$dbname Database created successfully!!";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

// Create table
mysql_select_db($dbname, $con);


$sq1 = mysql_query("CREATE TABLE IF NOT EXISTS `attendance` (
  `employee_no` int(10) NOT NULL DEFAULT '0',
  `month_no` varchar(10) NOT NULL DEFAULT '0',
  `pay_days` float DEFAULT NULL,
  `holidays` float NOT NULL,
  `paid_leaves` float NOT NULL,
  `unpaid_leaves` float NOT NULL,
  `suspention_days` float NOT NULL,
  `adj_days` int(10) DEFAULT NULL,
  `ot_hrs` int(10) DEFAULT NULL,
  `leave_encash_days` float DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`employee_no`,`month_no`))");
  
$sq2 = mysql_query("CREATE TABLE IF NOT EXISTS `balanced_leaves` (
  `employee_no` varchar(20) NOT NULL,
  `leave_short_code` varchar(20) NOT NULL,
  `leavedays_onhand` double NOT NULL,
  `last_receipt_date` date DEFAULT NULL,
  `last_issue_date` date DEFAULT NULL,
  `updated_by` varchar(20) NOT NULL,
  `updated_date` date NOT NULL
)");

$sq3 = mysql_query("CREATE TABLE IF NOT EXISTS `batch_dtls` (
  `batch_no` varchar(20) NOT NULL,
  `employee_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `adj_amount` float NOT NULL,
  `remark_for_adj` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  PRIMARY KEY (`batch_no`,`employee_no`,`comp_code`)
)");

$sq4 = mysql_query("CREATE TABLE IF NOT EXISTS `batch_hdr` (
  `batch_no` varchar(20) NOT NULL,
  `month_no` varchar(20) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  PRIMARY KEY (`batch_no`)
)");


$sq5 = mysql_query("CREATE TABLE IF NOT EXISTS `company_info` (
  `name` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `address4` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pin_code` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone_number` int(20) DEFAULT NULL,
  `landline` int(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alternate_email` varchar(50) DEFAULT NULL,
  `vat_no` varchar(50) DEFAULT NULL,
  `cst_no` varchar(50) DEFAULT NULL,
  `service_tax_no` varchar(50) DEFAULT NULL,
  `exicise_regn_no` varchar(50) DEFAULT NULL,
  `accessee_code` varchar(50) DEFAULT NULL,
  `certificate_no` varchar(50) DEFAULT NULL,
  `rate_of_duty` float DEFAULT NULL,
  `income_tax_no` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `excise_range` varchar(100) DEFAULT NULL,
  `excise_div` varchar(100) DEFAULT NULL,
  `commissionorate` varchar(100) DEFAULT NULL,
  `pla_ac_no` varchar(10) DEFAULT NULL,
  `signature1` varchar(50) NOT NULL,
  `signature2` varchar(50) NOT NULL,
  `signature3` varchar(50) NOT NULL
)");


$sq_insert_company_info = mysql_query("INSERT INTO company_info (name, address1, address2, address3, address4, city, pin_code, state, country, phone_number, landline, email, alternate_email, vat_no, cst_no, service_tax_no, exicise_regn_no, accessee_code, certificate_no, rate_of_duty, income_tax_no, pan_no, excise_range, excise_div, commissionorate, pla_ac_no) VALUES
('$company', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");



$sq6 = mysql_query("CREATE TABLE IF NOT EXISTS `comp_details` (
  `employee_no` varchar(10) NOT NULL,
  `joining_date` varchar(20) NOT NULL,
  `comp_change_eff_date` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `bank_branch_name` varchar(100) NOT NULL,
  `bank_account_no` varchar(20) NOT NULL,
  `basic` int(11) NOT NULL,
  `hra` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  `conveyance` int(11) NOT NULL,
  `lta` int(11) NOT NULL,
  `pf_applicable` char(1) NOT NULL,
  `prof_tax_applicable` char(1) NOT NULL,
  `esi_applicable` char(1) NOT NULL,
  `tds_applicable` char(1) NOT NULL,
  `gratuity_applicable` char(1) NOT NULL,
  `pension_fund_applicable` char(1) NOT NULL,
  `pf_number` varchar(20) NOT NULL,
  `pf_date` varchar(20) NOT NULL,
  `pf_uan` varchar(20) NOT NULL,
  `pf_uan_date` varchar(20) NOT NULL,
  `dearness_pay` int(11) NOT NULL,
  `da` int(11) NOT NULL,
  `gross_salary` int(11) NOT NULL,
  `ctc` int(11) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  `emp_cat` varchar(20) NOT NULL,
  `date_of_confirm` date NOT NULL,
  `date_of_sepration` date NOT NULL,
  `type_of_sep` varchar(20) NOT NULL,
  `remark_for_sepration` varchar(50) NOT NULL,
  `salary_on_joining` int(10) NOT NULL,
  `mode_of_payment` varchar(10) NOT NULL,
  `lic_acc_no_1` varchar(30) NOT NULL,
  `lic_id_no_1` varchar(30) NOT NULL,
  `lic_gratuity_no_1` varchar(30) NOT NULL,
  `lic_amt_1` float NOT NULL,
  `lic_acc_no_2` varchar(30) NOT NULL,
  `lic_id_no_2` varchar(30) NOT NULL,
  `lic_gratuity_no_2` varchar(30) NOT NULL,
  `lic_amt_2` float NOT NULL,
  `loan_acc_no_1` varchar(30) NOT NULL,
  `loan_id_no_1` varchar(30) NOT NULL,
  `loan_gratuity_no_1` varchar(30) NOT NULL,
  `loan_amt_1` float NOT NULL,
  `loan_acc_no_2` varchar(30) NOT NULL,
  `loan_id_no_2` varchar(30) NOT NULL,
  `loan_gratuity_no_2` varchar(30) NOT NULL,
  `loan_amt_2` float NOT NULL,
  `grant_type` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` varchar(10) NOT NULL,
  PRIMARY KEY (`employee_no`)
)");


$sq7 = mysql_query("CREATE TABLE IF NOT EXISTS `comp_head` (
  `comp_code` varchar(15) NOT NULL DEFAULT '',
  `comp_name` varchar(30) DEFAULT NULL,
  `code_descr` varchar(50) DEFAULT NULL,
  `pay_when` varchar(1) DEFAULT NULL,
  `pf_compute` varchar(1) DEFAULT NULL,
  `pt_compute` varchar(1) DEFAULT NULL,
  `esi_compute` varchar(1) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`comp_code`)
)");


$sq8 = mysql_query("CREATE TABLE IF NOT EXISTS `empl_comp_log` (
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `old_amount` float NOT NULL,
  `new_amount` float NOT NULL,
  PRIMARY KEY (`SNo`)
)");


$sq9 = mysql_query("CREATE TABLE IF NOT EXISTS `empl_master` (
  `employee_no` int(10) NOT NULL,
  `initial` varchar(10) DEFAULT NULL,
  `emp_code` varchar(20) DEFAULT NULL,
  `punching_code` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` text,
  `birth_date` varchar(20) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `place_of_origin` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `permanent_addr_1` varchar(100) DEFAULT NULL,
  `permanent_addr_2` varchar(100) DEFAULT NULL,
  `permanent_addr_3` varchar(100) DEFAULT NULL,
  `permanent_city` varchar(50) DEFAULT NULL,
  `permanent_pin_code` int(20) DEFAULT NULL,
  `permanent_state` varchar(50) DEFAULT NULL,
  `permanent_country` varchar(50) DEFAULT NULL,
  `present_addr_1` varchar(100) DEFAULT NULL,
  `present_addr_2` varchar(100) DEFAULT NULL,
  `present_addr_3` varchar(100) DEFAULT NULL,
  `present_city` varchar(50) DEFAULT NULL,
  `present_pin_code` int(20) DEFAULT NULL,
  `present_state` varchar(50) DEFAULT NULL,
  `present_country` varchar(50) DEFAULT NULL,
  `residence_phone_no` varchar(20) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `emergency_contact_no` varchar(20) DEFAULT NULL,
  `emergency_contact_person` varchar(100) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`employee_no`)
)");


$sq10 = mysql_query("CREATE TABLE IF NOT EXISTS `emp_comp_master` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`employee_no`)
)");


$sq11 = mysql_query("CREATE TABLE IF NOT EXISTS `emp_comp_master_lines` (
  `employee_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `comp_change_eff_date` date NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`employee_no`,`comp_code`)
)");


$sq12 = mysql_query("CREATE TABLE IF NOT EXISTS `emp_move_details` (
  `employee_no` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `to_company_name` varchar(100) NOT NULL,
  `to_employee_no` int(11) NOT NULL,
  `moved_date` date NOT NULL,
  `moved_time` varchar(10) NOT NULL
)");


$sq13 =mysql_query("CREATE TABLE IF NOT EXISTS `experience` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `sr_no` int(11) NOT NULL DEFAULT '0',
  `from_period` varchar(10) DEFAULT NULL,
  `upto_period` varchar(10) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `role_details` varchar(500) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`employee_no`,`sr_no`)
)");


$sq14 = mysql_query("CREATE TABLE IF NOT EXISTS `family_info` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `spouse_name` varchar(100) DEFAULT NULL,
  `spouse_contact_no` varchar(50) DEFAULT NULL,
  `no_of_members` int(11) DEFAULT NULL,
  `no_of_dependents` int(11) DEFAULT NULL,
  `name1` varchar(50) DEFAULT NULL,
  `relation1` varchar(20) DEFAULT NULL,
  `age1` int(10) DEFAULT NULL,
  `gaurdian_name1` varchar(50) DEFAULT NULL,
  `name2` varchar(50) DEFAULT NULL,
  `relation2` varchar(20) DEFAULT NULL,
  `age2` int(10) DEFAULT NULL,
  `gaurdian_name2` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`employee_no`)
)");


$sq15 = mysql_query("CREATE TABLE IF NOT EXISTS `grade_comp_master` (
  `grade` varchar(50) NOT NULL DEFAULT '',
  `comp_code` varchar(5) NOT NULL DEFAULT '',
  `amount` int(10) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`grade`,`comp_code`)
)");


$sq16 = mysql_query("CREATE TABLE IF NOT EXISTS `grade_master` (
  `grade` varchar(10) NOT NULL,
  `desc` varchar(100) NOT NULL,
  PRIMARY KEY (`grade`)
)");


$sq17 = mysql_query("CREATE TABLE IF NOT EXISTS `leaves_transaction` (
  `trans_no` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` date DEFAULT NULL,
  `for_date` date NOT NULL,
  `employee_no` varchar(20) NOT NULL,
  `leave_short_code` varchar(20) NOT NULL,
  `trans_type` varchar(20) DEFAULT NULL,
  `leave_days` double NOT NULL,
  `ref_docno` varchar(20) NOT NULL,
  PRIMARY KEY (`trans_no`)
)");


$sq18 = mysql_query("CREATE TABLE IF NOT EXISTS `leaves_transfer` (
  `employee_no` varchar(20) NOT NULL,
  `from` varchar(20) NOT NULL,
  `leaves_transfer` double NOT NULL,
  `to` varchar(20) NOT NULL,
  `leave_short_code` varchar(20) NOT NULL,
  `leavedays_onhand` double NOT NULL,
  `created_date` date NOT NULL
)");


$sq19 = mysql_query("CREATE TABLE IF NOT EXISTS `leaves_type` (
  `leave_short_code` varchar(20) NOT NULL,
  `leave_description` varchar(40) NOT NULL,
  PRIMARY KEY (`leave_short_code`)
)");


$sq20 = mysql_query("CREATE TABLE IF NOT EXISTS `leave_encashment` (
  `encash_id` varchar(20) NOT NULL,
  `employee_no` int(11) NOT NULL,
  `current_el` double NOT NULL,
  `balanced_el` double NOT NULL,
  `total_el` double NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`encash_id`)
)");


$sq21 = mysql_query("CREATE TABLE IF NOT EXISTS `leave_management` (
  `doc_no` varchar(11) NOT NULL,
  `doc_date` date DEFAULT NULL,
  `employee_no` varchar(20) NOT NULL DEFAULT '0',
  `leave_short_code` varchar(10) NOT NULL,
  `attendance_no` varchar(10) NOT NULL DEFAULT '0',
  `leave_application_no` float DEFAULT NULL,
  `registration_no` int(11) DEFAULT NULL,
  `leave_application_date` date NOT NULL,
  `designation` varchar(20) NOT NULL,
  `application_received_date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `from_day_type` varchar(20) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `to_day_type` varchar(20) DEFAULT NULL,
  `total_days` double DEFAULT NULL,
  `leave_stock_type` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `leave_status` varchar(10) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`doc_no`)
)");


$sq22 = mysql_query("CREATE TABLE IF NOT EXISTS `month_attendance` (
  `sr_no` varchar(20) NOT NULL DEFAULT '0',
  `employee_no` varchar(20) NOT NULL DEFAULT '0',
  `month` varchar(20) NOT NULL DEFAULT '',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_month_day` double NOT NULL,
  `weekly_off` double NOT NULL,
  `working_days` double NOT NULL,
  `emp_present_day` double NOT NULL,
  `paid_leaves` double DEFAULT NULL,
  `unpaid_leaves` double DEFAULT NULL,
  `absent_days` double DEFAULT NULL,
  `suspension_days` double NOT NULL,
  `leave_encashment_days` double NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `entered_date_time` varchar(50) NOT NULL,
  `entered_by` varchar(10) NOT NULL,
  PRIMARY KEY (`employee_no`,`month`)
)");


$sq23 = mysql_query("CREATE TABLE IF NOT EXISTS `month_control` (
  `month_no` varchar(10) NOT NULL DEFAULT '0',
  `month_active` varchar(1) DEFAULT NULL,
  `no_days` int(10) DEFAULT NULL,
  `per_day_divisor` int(10) DEFAULT NULL,
  `da_index` int(10) DEFAULT NULL,
  `hra_index` float NOT NULL,
  `bonus_index` float NOT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `process_status` varchar(10) NOT NULL,
  PRIMARY KEY (`month_no`)
)");


$sq24 = mysql_query("CREATE TABLE IF NOT EXISTS `payroll_details` (
  `employee_no` varchar(20) NOT NULL,
  `month_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `eligible_amt` float NOT NULL,
  `computed_amt` float NOT NULL,
  `adj_amt` float NOT NULL,
  `paid_amt` float NOT NULL,
  `created_on` varchar(20) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_no`,`month_no`,`comp_code`)
)");


$sq25 = mysql_query("CREATE TABLE IF NOT EXISTS `payroll_hdr` (
  `employee_no` varchar(20) NOT NULL,
  `month_no` varchar(20) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `bank_branch_name` varchar(100) NOT NULL,
  `bank_account_no` varchar(20) NOT NULL,
  `pay_days` int(11) NOT NULL,
  `gross_earnings` float NOT NULL,
  `gross_deduction` float NOT NULL,
  `net_salary` float NOT NULL,
  `created_on` varchar(20) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_no`,`month_no`)
)");

$sq26 = mysql_query("CREATE TABLE IF NOT EXISTS `pf_collective_report_sorted` (
  `sr_no` int(11) NOT NULL,
  `account_no` double NOT NULL,
  `employee_no` varchar(20) NOT NULL,
  `name_of_employee` varchar(250) NOT NULL,
  `basic` double NOT NULL,
  `da` double NOT NULL,
  `total` double NOT NULL,
  `hra_other` double NOT NULL,
  `grand_total` double NOT NULL,
  `employee_single_share` double NOT NULL,
  `15_67_per_a` double NOT NULL,
  `8_33_per_b` double NOT NULL,
  `24_a_and_b` double NOT NULL,
  `company_name` varchar(350) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `pf_number` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  PRIMARY KEY (`sr_no`)
)");


$sq27 = mysql_query("CREATE TABLE IF NOT EXISTS `pf_collective_report_summary` (
  `company_name` varchar(300) NOT NULL,
  `1` double NOT NULL,
  `2` double NOT NULL,
  `10` double NOT NULL,
  `21` double NOT NULL,
  `22` double NOT NULL,
  `pay` double NOT NULL
)");



$sq28 = mysql_query("CREATE TABLE IF NOT EXISTS `qualification` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `sr_no` int(11) NOT NULL DEFAULT '0',
  `degree_title` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `year_of_passing` varchar(25) DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`employee_no`,`sr_no`)
)");


$sq29 = mysql_query("CREATE TABLE IF NOT EXISTS `recovery` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `recov_title` varchar(20) NOT NULL DEFAULT '',
  `total_amount` int(10) DEFAULT NULL,
  `no_of_installments` int(10) DEFAULT NULL,
  `inst_amount` int(10) DEFAULT NULL,
  `balance_amount` int(10) DEFAULT NULL,
  `comp_code` varchar(5) DEFAULT NULL,
  `recov_status` varchar(10) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`employee_no`,`recov_title`)
)");


$sq30 = mysql_query("CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_name`,`role`)
)");


$sql = mysql_query("INSERT INTO user (user_name, password, role) VALUES
('admin', 'admin123', 'Admin'),
('bgurav', 'timeoffice', 'SuperUser'),
('aaditya', 'aytidaa', 'Admin'),
('kbadal', 'payroll', 'SuperUser')");


$sq31 = mysql_query("CREATE TABLE IF NOT EXISTS `user_roles` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `role` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`employee_no`,`role`)
)");


}
else
{
  echo "Please Enter the Company Name";
}
?>