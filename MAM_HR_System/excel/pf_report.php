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

 $month_no = $_POST['cmb_pf_month'];
 
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
            ->setCellValue("A2", "Sr. No.")
			->setCellValue("B2", "Account No.")
			->setCellValue("C2", "Name of Employee")
			->setCellValue("D2", "Basic")
			->setCellValue("E2", "DA")
			->setCellValue("F2", "Total")
			->setCellValue("G2", "HRA+Other")
			->setCellValue("H2", "Grand Total")
			->setCellValue("I2", "Employee Single Share")
			->setCellValue("J2", "15.67% A")
			->setCellValue("K2", "8.33% B")
			->setCellValue("L2", "24% (A+B)");
			 
$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('I2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('J2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('K2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('L2')->getFont()->setBold(true);


$i = 3;

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
  
  
  $a = $total_basic_da*15.67/100;
  $a = round($a, 0); ///////////////////////////////////////////////////////////////////////////// 15.67%
  
  
  $b = $total_basic_da*8.33/100;
  $b = round($b, 0); ///////////////////////////////////////////////////////////////////////////// 8.33%
  
  
  $c = $a + $b; ////////////////////////////////////////////////////////////////////////////////// 24%
  
  
  $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $sr_no)
			->setCellValue("B".$i, $pf_number)
			->setCellValue("C".$i, $emp_name)
			->setCellValue("D".$i, $basic)
			->setCellValue("E".$i, $da)
			->setCellValue("F".$i, $total_basic_da)
			->setCellValue("G".$i, $total_other)
			->setCellValue("H".$i, $grand_total)
			->setCellValue("I".$i, $pf)
			->setCellValue("J".$i, $a)
			->setCellValue("K".$i, $b)
			->setCellValue("L".$i, $c);
			
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


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("C".$i, "Total"); 

$objPHPExcel->getActiveSheet()->getStyle("C".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
	

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D".$i, $basic_total)
			->setCellValue("E".$i, $da_total)
			->setCellValue("F".$i, $total_of_total)
			->setCellValue("G".$i, $other_total)
			->setCellValue("H".$i, $total_grand)
			->setCellValue("I".$i, $pf_total)
			->setCellValue("J".$i, $a_total)
			->setCellValue("K".$i, $b_total)
			->setCellValue("L".$i, $c_total);
			
$objPHPExcel->getActiveSheet()->getStyle("D".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("H".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("I".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("J".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("K".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("L".$i)->getFont()->setBold(true);
		
$i = $i + 2;

$a1 = $a_total;
$a2 = $total_of_total * 0.0110;
$a2 = round($a2, 0);
$a3 = $b_total;
$a4 = $total_of_total * 0.005;
$a4 = round($a4, 0);
$a5 = $total_of_total * 0.0001;
$a5 = round($a5, 0);
$total = $a1 + $a2 + $a3 + $a4 + $a5;

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D".($i+1), "A/c No. 1  : ".$a1)
			->setCellValue("D".($i+2), "A/c No. 2  : ".$a2)
			->setCellValue("D".($i+3), "A/c No. 10 : ".$a3)
			->setCellValue("D".($i+4), "A/c No. 21 : ".$a4)
			->setCellValue("D".($i+5), "A/c No. 22 : ".$a5)
			->setCellValue("D".($i+6), "Total      : ".$total);
			


			



$objPHPExcel->getActiveSheet()->setTitle('PF Report');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="pf_report.xlsx"');
//read from server and write to buffer
readfile("pf_report.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";



?>