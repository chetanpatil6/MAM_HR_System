<?php
error_reporting(E_ALL);

//date_default_timezone_set('Europe/London');

/** PHPExcel */
require_once '../Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

// Add some data
$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];
$db1 = $_POST['txt_db'];

 
mysql_connect("$servername", "$usernm", "$pas") or die("unable to connect server");
mysql_select_db("$db1") or die("unable to connect db");



// Add some data
$from_yr = $_POST['cmb_from_year'];
$to_yr = $_POST['cmb_to_year'];
 
$sq_name = mysql_query("select * from company_info");
while($row_info = mysql_fetch_assoc($sq_name))
{
$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
$str_address = $row_info['name']." \n".$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'];
}
 
 
 
 
 $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", $str_address. "\n Year : ".$from_yr.'-'.$to_yr);
			
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A2", "Sr. No.")
			->setCellValue("B2", "Account No.")
			->setCellValue("C2", "Name of Employee")
			->setCellValue("D2", "Total Basic")
			->setCellValue("E2", "Employee Single Share (B)")
			->setCellValue("F2", "B - 8.33%  (C)")
			->setCellValue("G2", "B - C");

$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);


$i = 3;

$from_month = $from_yr.'-04';
$to_month = $to_yr.'-03';
$total_basic = 0; 
$emp_buf = '';
 $sr_no = 1;
 $total_of_total = 0;
 $total_pf = 0;
 $total_of_b = 0;



//$sq_payroll_details = mysql_query("select distinct(month_no, employee_no), paid_amt from payroll_details where month_no>='$from_month' and month_no<='$to_month' order by employee_no");
$sq_payroll_details = mysql_query("select distinct employee_no from payroll_details");
while($r_payroll_details = mysql_fetch_assoc($sq_payroll_details))
{

  $employee_no = $r_payroll_details['employee_no'];
 
  if($emp_buf == '')
  {
    $emp_buf = $employee_no;
  }


 if($emp_buf == $employee_no)
 {
 
  buf:
   
 $sq_month = mysql_query("select distinct month_no from payroll_details where employee_no='$employee_no' and month_no>='$from_month' and month_no<='$to_month'");
 while($r_month = mysql_fetch_assoc($sq_month))
 {  
  $month_no = $r_month['month_no'];
  $total_basic=0;
  $sq_basic = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='E0001'");
  while($r_basic = mysql_fetch_assoc($sq_basic))
  {
     $total_basic = $total_basic + $r_basic['paid_amt'];
  }
  
  $sq_grade = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='E0002'");
  while($r_grade = mysql_fetch_assoc($sq_grade))
  {
     $total_basic = $total_basic + $r_grade['paid_amt'];
  }
  
  $da_inpayslip = 0;
  $sq_da = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='E0003'");
  while($r_da = mysql_fetch_assoc($sq_da))
  {
     $total_basic = $total_basic + $r_da['paid_amt'];
	 $da_inpayslip = $r_da['paid_amt'];
  }
   $total_basic = round($total_basic, 0);
   
   $basic = 0;
   $da = 0;
   
  if($total_basic > 6500)
  {
    $basic = 6500;           /////////////////////////////////////////////// basic
	$da = 0;               /////////////////////////////////////////////// DA
  }
  else
  {
    $basic = $total_basic;           /////////////////////////////////////////////// basic
	$da = round($da_inpayslip, 0);            /////////////////////////////////////////////// DA
  }
  
  $total_basic_da = $basic + $da; /////////////////////////////////////////////////////////////  Total
  
  $pf = 0;
  $sq_pf = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='D0001'");
  while($r_pf = mysql_fetch_assoc($sq_pf))
  {
    $pf = round($r_pf['paid_amt'], 0);
  }
  
  
  $b = $total_basic_da*8.33/100;
  $b = round($b, 0); ///////////////////////////////////////////////////////////////////////////// 8.33%
  
  $total_of_total = $total_of_total + $total_basic_da;
  $total_pf = $total_pf + $pf;
  $total_of_b = $total_of_b + $b;
  
  $emp_buf = $employee_no;
  }
  }
  ///////////////////////////////////////////////////// end emp_buf if //////////////////////////////////////////////////////////////////
  else
  {
  
 
  $sq_employment_dtls = mysql_query("select pf_number from comp_details where employee_no='$emp_buf'");
  while($r_employment_dtls = mysql_fetch_assoc($sq_employment_dtls))
  {
  	if($r_employment_dtls['pf_number'] != '')
    	$pf_number = $r_employment_dtls['pf_number'];
  }
  
  $sq_emp = mysql_query("select * from empl_master where employee_no='$emp_buf'");
  while($r_emp = mysql_fetch_assoc($sq_emp))
  {
		  $emp_name = $r_emp['first_name']." ".$r_emp['middle_name']." ".$r_emp['last_name'];
  }
     
	$c = $total_pf - $total_of_b;
	$d = $total_pf - $c;
	
	 $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $sr_no)
			->setCellValue("B".$i, $pf_number)
			->setCellValue("C".$i, $emp_name)
			->setCellValue("D".$i, $total_of_total)
			->setCellValue("E".$i, $total_pf)
			->setCellValue("F".$i, $c)
			->setCellValue("G".$i, $d);  
			
	$i = $i+1;
	$sr_no = $sr_no + 1;

  $total_of_total = 0;
  $total_pf = 0;
  $total_of_b = 0;
  goto buf;
  }
}




$objPHPExcel->getActiveSheet()->setTitle('6A Form');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="6A_form.xlsx"');
//read from server and write to buffer
readfile("6A_form.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";



?>