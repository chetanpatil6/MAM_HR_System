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

 $month_no = $_POST['cmb_ecr_month'];
 
$sq_name = mysql_query("select * from company_info");
while($row_info = mysql_fetch_assoc($sq_name))
{
$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
$str_address = $row_info['name']." \n".$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'];
}
 
 
 
 
 $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", $str_address. "\n Month : ".date('M-Y', strtotime($month_no)));
			
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A5", "Sr. No.")
			->setCellValue("B5", "Member Id")
			->setCellValue("C5", "Member Name")
			->setCellValue("D5", "EPF Wages")
			->setCellValue("E5", "EPS Wages")
			->setCellValue("F5", "EPF Contribution (EE Share due)")
			->setCellValue("G5", "EPF Contribution (EE Share being remitted)")
			->setCellValue("H5", "EPS Contribution due")
			->setCellValue("I5", "EPS Contribution being remitted")
			->setCellValue("J5", "Diff EPF and EPS contribution (EE Share due)")
			->setCellValue("K5", "Diff EPF and EPS contribution (EE Share being remitted)");
			 
$objPHPExcel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('I5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('J5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('K5')->getFont()->setBold(true);


$i = 6;

	$basic_total = 0;
	$da_total = 0;
	$total_of_total = 0;
	$pf_total = 0;
	$a_total = 0;
	$b_total = 0;
	$c_total = 0;
	$other_total = 0;
	$total_grand = 0;
	  $sr_no = 1;

$sq_payroll_dtls = mysql_query("select distinct employee_no from payroll_details where month_no='$month_no'");
while($r_payroll_details = mysql_fetch_assoc($sq_payroll_dtls))
{
  $employee_no = $r_payroll_details['employee_no'];
  $total_basic = 0;
  $da = 0;

  $pf_number = '';
  
  $sq_employment_dtls = mysql_query("select pf_number from comp_details where employee_no='$employee_no'");
  while($r_employment_dtls = mysql_fetch_assoc($sq_employment_dtls))
  {
  if($r_employment_dtls['pf_number'] != '')
    $pf_number = substr($r_employment_dtls['pf_number'], 2);
  }
  
 	$sq_emp = mysql_query("select * from empl_master where employee_no='$employee_no'");
	  while($r_emp = mysql_fetch_assoc($sq_emp))
	  {
		  $emp_name = $r_emp['first_name']." ".$r_emp['middle_name']." ".$r_emp['last_name'];
		  $emp_code = $r_emp['emp_code'];
	  }
  
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
  
  $sq_da = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='E0003'");
  while($r_da = mysql_fetch_assoc($sq_da))
  {
     $total_basic = $total_basic + $r_da['paid_amt'];
	 $da_inpayslip = $r_da['paid_amt'];
  }
  
  $total_basic = round($total_basic, 0);
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
  
  $total_other = 0;
  $sq_others = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code LIKE 'E%' and comp_code<>'E0001' and comp_code<>'E0002' and comp_code<>'E0003'");
  while($r_others = mysql_fetch_assoc($sq_others))
  {
    $total_other = $total_other + $r_others['paid_amt'];
  }
  
  $total_other = round($total_other, 0);
  
  $grand_total = $total_basic_da + $total_other; ///////////////////////////////////////////////////////// Grand Total
  
  $pf = 0;
  $sq_pf = mysql_query("select * from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='D0001'");
  while($r_pf = mysql_fetch_assoc($sq_pf))
  {
    $pf = round($r_pf['paid_amt'], 0);
  }
  
  
  
  $a = 0;
  $c = 0;
  
  $b = $total_basic_da*8.33/100;
  $b = round($b, 0); ///////////////////////////////////////////////////////////////////////////// 8.33%
  
  $diff = $pf - $b;
  
  
  $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $sr_no)
			->setCellValue("B".$i, $emp_code)
			->setCellValue("C".$i, $emp_name)
			->setCellValue("D".$i, $basic)
			->setCellValue("E".$i, $basic)
			->setCellValue("F".$i, $pf)
			->setCellValue("G".$i, $pf)
			->setCellValue("H".$i, $b)
			->setCellValue("I".$i, $b)
			->setCellValue("J".$i, $diff)
			->setCellValue("K".$i, $diff);
			
	$i = $i + 1;
	
	$basic_total = $basic_total + $basic;
	$da_total = $da_total + $da;
	$total_of_total = $total_of_total + $total_basic_da;
	$other_total = $other_total + $total_other;
	$total_grand = $total_grand + $grand_total;
	$pf_total = $pf_total + $pf;
	$a_total = $a_total + $a;
	$b_total = $b_total + $b;
	$c_total = $c_total + $c;
	$sr_no = $sr_no + 1;
	
	$basic = 0;
	$da = 0;
	$grand_total = 0;
	$pf = 0;
	$a = 0;
	$b = 0;
	$c = 0;
}



			


$objPHPExcel->getActiveSheet()->setTitle('PF Report');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="ecr_report.xlsx"');
//read from server and write to buffer
readfile("ecr_report.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";



?>