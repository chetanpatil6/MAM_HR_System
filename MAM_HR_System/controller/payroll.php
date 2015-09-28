<?php
include('../model/Model.php');

$payroll = $_POST['payroll'];

////////////////////////////////////////////////////////////////////////////PAYROLL////////////////////////////////////////////////////////////////////////////////
// Table structure for table `attendance`


mysql_select_db($_SESSION['dbname']);

if($payroll == 'yes')
{

$sq9 = "CREATE TABLE IF NOT EXISTS `attendance` (
  `employee_no` int(10) NOT NULL DEFAULT '0',
  `month_no` varchar(10) NOT NULL DEFAULT '0',
  `pay_days` int(10) DEFAULT NULL,
  `adj_days` int(10) DEFAULT NULL,
  `ot_hrs` int(10) DEFAULT NULL,
  `leave_encash_days` int(10) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`employee_no`,`month_no`)
)";

mysql_query($sq9);

// Table structure for table `Payroll Header`

$sq10 = "CREATE TABLE IF NOT EXISTS `payroll_hdr` (
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
)";

mysql_query($sq10);

// Table structure for table `Payroll Details`

$sq11 = "CREATE TABLE IF NOT EXISTS `payroll_details` (
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
)";

mysql_query($sq11);

// Table structure for table `Batch Header`

$sq12 = "CREATE TABLE IF NOT EXISTS `batch_hdr` (
  `batch_no` varchar(20) NOT NULL,
  `month_no` varchar(20) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  PRIMARY KEY (`batch_no`)
)";

mysql_query($sq12);

// Table structure for table `Batch Details`

$sq13 = "CREATE TABLE IF NOT EXISTS `batch_dtls` (
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
)";

mysql_query($sq13);

// Table structure for table `Grade master`

$sq14 = "CREATE TABLE IF NOT EXISTS `grade_master` (
  `grade` varchar(10) NOT NULL,
  `desc` varchar(100) NOT NULL,
  PRIMARY KEY (`grade`)
)";

mysql_query($sq14);


// Table structure for table `Comp Head`

$sq15 = "CREATE TABLE IF NOT EXISTS `comp_head` (
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
)";

mysql_query($sq15);

// Table structure for table `Emp Comp Master`

$sq16 = "CREATE TABLE IF NOT EXISTS `emp_comp_master` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`employee_no`)
)";

mysql_query($sq16);

// Table structure for table `Emp Comp Master Lines`

$sq17 = "CREATE TABLE IF NOT EXISTS `emp_comp_master_lines` (
  `employee_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `comp_change_eff_date` date NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`employee_no`,`comp_code`)
)";

mysql_query($sq17);

// Table structure for table `Grade Comp master`

$sq18 = "CREATE TABLE IF NOT EXISTS `grade_comp_master` (
  `grade` varchar(50) NOT NULL DEFAULT '',
  `comp_code` varchar(5) NOT NULL DEFAULT '',
  `amount` int(10) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`grade`,`comp_code`)
)";

mysql_query($sq18);

// Table structure for table `Month Control`

$sq19 = "CREATE TABLE IF NOT EXISTS `month_control` (
  `month_no` varchar(10) NOT NULL DEFAULT '0',
  `month_active` varchar(1) DEFAULT NULL,
  `no_days` int(10) DEFAULT NULL,
  `per_day_divisor` int(10) DEFAULT NULL,
  `da_index` int(10) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `process_status` varchar(10) NOT NULL,
  PRIMARY KEY (`month_no`)
)";

mysql_query($sq19);

// Table structure for table `Emp Comp Log`

$sq20 = "CREATE TABLE IF NOT EXISTS `empl_comp_log` (
  `employee_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `transaction_date` date NOT NULL,
  `old_amount` float NOT NULL,
  `new_amount` float NOT NULL,
  PRIMARY KEY (`employee_no`,`comp_code`)
)";

mysql_query($sq20);

// Table structure for table `Recovery`

$sq21 = "CREATE TABLE IF NOT EXISTS `recovery` (
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
)";

mysql_query($sq21);

}


echo "Payroll added successfully";
?>