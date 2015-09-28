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

$con = mysql_connect("localhost","root","");
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

$sq1 = "CREATE TABLE company_info (
  name varchar(100),
  address1 varchar(100),
  address2 varchar(100),
  address3 varchar(100),
  address4 varchar(100),
  city varchar(100),
  pin_code int(20),
  state varchar(100),
  country varchar(100),
  phone_number int(20),
  landline int(20),
  email varchar(50),
  alternate_email varchar(50),
  vat_no varchar(50),
  cst_no varchar(50),
  service_tax_no varchar(50),
  exicise_regn_no varchar(50),
  accessee_code varchar(50),
  certificate_no varchar(50),
  rate_of_duty float,
  income_tax_no varchar(20),
  pan_no varchar(20),
  excise_range varchar(100),
  excise_div varchar(100),
  commissionorate varchar(100),
  pla_ac_no varchar(10)
)";

mysql_query($sq1, $con);

$sq9 = "INSERT INTO company_info (name, address1, address2, address3, address4, city, pin_code, state, country, phone_number, landline, email, alternate_email, vat_no, cst_no, service_tax_no, exicise_regn_no, accessee_code, certificate_no, rate_of_duty, income_tax_no, pan_no, excise_range, excise_div, commissionorate, pla_ac_no) VALUES
('$company', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";

mysql_query($sq9, $con);


// Table structure for table `comp_details`


$sq2 = "CREATE TABLE IF NOT EXISTS `comp_details` (
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
  `created_on` date NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` varchar(10) NOT NULL,
  PRIMARY KEY (`employee_no`)
)";

mysql_query($sq2, $con);


$sq3 = "CREATE TABLE empl_master (
  employee_no varchar(10),
  initial VARCHAR(10),
  emp_code VARCHAR(20),
  first_name varchar(50),
  middle_name varchar(50),
  last_name varchar(50),
  gender text,
  birth_date varchar(20),
  marital_status varchar(10),
  blood_group varchar(10),
  place_of_origin varchar(50),
  nationality varchar(50),
  permanent_addr_1 varchar(100),
  permanent_addr_2 varchar(100),
  permanent_addr_3 varchar(100),
  permanent_city varchar(50),
  permanent_pin_code int(20),
  permanent_state varchar(50),
  permanent_country varchar(50),
  present_addr_1 varchar(100),
  present_addr_2 varchar(100),
  present_addr_3 varchar(100),
  present_city varchar(50),
  present_pin_code int(20),
  present_state varchar(50),
  present_country varchar(50),
  residence_phone_no varchar(20),
  mobile_no varchar(20),
  emergency_contact_no varchar(20),
  emergency_contact_person varchar(100),
  email_id varchar(50),
  created_on date,
  created_by varchar(10),
  updated_on date,
  updated_by varchar(20),
  PRIMARY KEY (`employee_no`)
)";


mysql_query($sq3, $con);

// Dumping data for table `empl_master`



// Table structure for table `experience`


$sq4 = "CREATE TABLE experience (
  employee_no varchar(10),
  sr_no int(11),
  from_period varchar(10),
  upto_period varchar(10),
  company_name varchar(100),
  designation varchar(50),
  role_details varchar(500),
  created_on date,
  created_by varchar(10),
  updated_on date,
  updated_by varchar(10),
  PRIMARY KEY (`employee_no`,`sr_no`)
)";

mysql_query($sq4, $con);

// Table structure for table `family_info`


$sq5 = "CREATE TABLE family_info (
  employee_no varchar(10),
  spouse_name varchar(100),
  spouse_contact_no varchar(50),
  no_of_members int(11),
  no_of_dependents int(11),
  name1 varchar(50),
  relation1 varchar(20),
  age1 int(10),
  gaurdian_name1 varchar(50),
  name2 varchar(50),
  relation2 varchar(20),
  age2 int(10),
  gaurdian_name2 varchar(50),
  created_on date,
  created_by varchar(10),
  updated_on date,
  updated_by varchar(10),
  PRIMARY KEY (`employee_no`)
)";

mysql_query($sq5, $con);

// Table structure for table `qualification`

$sq6 = "CREATE TABLE qualification (
  employee_no varchar(10),
  sr_no int(11),
  degree_title varchar(50),
  subject varchar(50),
  year_of_passing varchar(10),
  university varchar(50),
  state varchar(50),
  country varchar(50),
  created_on date,
  created_by varchar(10),
  updated_on date,
  updated_by varchar(10),
  PRIMARY KEY (`employee_no`,`sr_no`)
)";

mysql_query($sq6, $con);

// Table structure for table `user`

$sq7 = "CREATE TABLE `user` (
  user_name varchar(20),
  password varchar(20),
  role varchar(20),
  PRIMARY KEY (`user_name`,`role`)
)";

mysql_query($sq7, $con);

$sql = "INSERT INTO user (user_name, password, role) VALUES
('admin', 'admin123', 'Admin'),
('bgurav', 'timeoffice', 'SuperUser'),
('aaditya', 'aytidaa', 'Admin'),
('kbadal', 'payroll', 'SuperUser')";

mysql_query($sql, $con);

// Table structure for table `user_roles`

$sq8 = "CREATE TABLE user_roles (
  employee_no varchar(10),
  role varchar(10),
  PRIMARY KEY (`employee_no`,`role`)
)";

mysql_query($sq8, $con);

////////////////////////////////////////////////////////////////////////////PAYROLL////////////////////////////////////////////////////////////////////////////////
// Table structure for table `attendance`

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

mysql_query($sq9, $con);

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

mysql_query($sq10, $con);

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

mysql_query($sq11, $con);

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

mysql_query($sq12, $con);

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

mysql_query($sq13, $con);

// Table structure for table `Grade master`

$sq14 = "CREATE TABLE IF NOT EXISTS `grade_master` (
  `grade` varchar(10) NOT NULL,
  `desc` varchar(100) NOT NULL,
  PRIMARY KEY (`grade`)
)";

mysql_query($sq14, $con);


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

mysql_query($sq15, $con);

// Table structure for table `Emp Comp Master`

$sq16 = "CREATE TABLE IF NOT EXISTS `emp_comp_master` (
  `employee_no` varchar(10) NOT NULL DEFAULT '',
  `created_on` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`employee_no`)
)";

mysql_query($sq16, $con);

// Table structure for table `Emp Comp Master Lines`

$sq17 = "CREATE TABLE IF NOT EXISTS `emp_comp_master_lines` (
  `employee_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `comp_change_eff_date` date NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`employee_no`,`comp_code`)
)";

mysql_query($sq17, $con);

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

mysql_query($sq18, $con);

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

mysql_query($sq19, $con);

// Table structure for table `Emp Comp Log`

$sq20 = "CREATE TABLE IF NOT EXISTS `empl_comp_log` (
  `employee_no` varchar(20) NOT NULL,
  `comp_code` varchar(20) NOT NULL,
  `transaction_date` date NOT NULL,
  `old_amount` float NOT NULL,
  `new_amount` float NOT NULL,
  PRIMARY KEY (`employee_no`,`comp_code`)
)";

mysql_query($sq20, $con);

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

mysql_query($sq21, $con);

}
}
else
{
  echo "Please Enter the Company Name";
}
?>