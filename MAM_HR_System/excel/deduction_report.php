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

 $deduction_codes = array();
 $month_no = $_POST['cmb_month_no_deduction'];
 $employee_no = array();
 
$sq_name = mysql_query("select * from company_info");
while($row_info = mysql_fetch_assoc($sq_name))
{
$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
$str_address = $row_info['name']." \n".$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'];
}
 
 
 
 
 $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", $str_address. "\n Month : ".date('M-Y', strtotime($month_no)));
			
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			

 
$sq_payroll_details = mysql_query("select distinct comp_code from payroll_details where month_no='$month_no' and comp_code like 'D%' order by comp_code");
while($r_payroll_details = mysql_fetch_assoc($sq_payroll_details))
{
    array_push($deduction_codes, $r_payroll_details['comp_code']);
}


$sq_payroll_details = mysql_query("select distinct employee_no from payroll_details where month_no='$month_no' and comp_code like 'D%' order by comp_code");
while($r_payroll_details = mysql_fetch_assoc($sq_payroll_details))
{
    array_push($employee_no, $r_payroll_details['employee_no']);
}

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A2", "Employee Name / Deductions")
			->setCellValue("B2", "Suspention Days")
			->setCellValue("C2", "Total Earnings"); 
			 
$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);

$alphabet = 'D';
$alphabet1 = 'A';
for($i=0;$i<sizeof($deduction_codes);$i++)
{
 $j = 2;
 $m = $i + 1;
 $sq_deduction = mysql_query("select comp_name from comp_head where comp_code='$deduction_codes[$i]'");
 while($r_deduction = mysql_fetch_assoc($sq_deduction))
 {
    $d_name = $r_deduction['comp_name'];
 }
 $objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue($alphabet.$j, $d_name); 
			 
 $objPHPExcel->getActiveSheet()->getStyle($alphabet.$j)->getFont()->setBold(true);	
 	 
 $alphabet++;
}



$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($alphabet.$j, "Total"); 

$objPHPExcel->getActiveSheet()->getStyle($alphabet.$j)->getFont()->setBold(true);
	
$alphabet++;
			
$objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue($alphabet.$j, "Net Salary");
			 
$objPHPExcel->getActiveSheet()->getStyle($alphabet.$j)->getFont()->setBold(true);

$k = 3;
$total_deduction = 0;

for($e=0;$e<sizeof($employee_no);$e++)
{
	  $sq_emp = mysql_query("select * from empl_master where employee_no='$employee_no[$e]'");
	  while($r_emp = mysql_fetch_assoc($sq_emp))
	  {
		  $emp_name = $r_emp['first_name']." ".$r_emp['middle_name']." ".$r_emp['last_name'];
	  }
  
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$k, $emp_name); 
					
					
	$sq_payroll_hdr = mysql_query("select employee_no, gross_earnings, net_salary from payroll_hdr where month_no='$month_no' and employee_no='$employee_no[$e]'");
	
	while($r_payroll_hdr = mysql_fetch_assoc($sq_payroll_hdr))
	{
	  $r_payroll_hdr['gross_earnings'] = round($r_payroll_hdr['gross_earnings'], 0);
	  
	  $objPHPExcel->setActiveSheetIndex(0)
				  ->setCellValue('C'.$k, $r_payroll_hdr['gross_earnings']); 
		
	  $net_salary = round($r_payroll_hdr['net_salary'], 0);	  
	}
				
$alphabet = 'D';	
 
for($d=0;$d<sizeof($deduction_codes);$d++)
{
	
	 
	 $sq_attendance = mysql_query("select suspention_days from attendance where month_no='$month_no' and employee_no='$employee_no[$e]'");
	 while($r_attendance = mysql_fetch_assoc($sq_attendance))
	 {
	    $objPHPExcel->setActiveSheetIndex(0)
				    ->setCellValue('B'.$k, $r_attendance['suspention_days']); 
	 }
	$sq_payroll = mysql_query("select employee_no, comp_code, paid_amt from payroll_details where month_no='$month_no' and comp_code='$deduction_codes[$d]' and employee_no='$employee_no[$e]'");
	
	while($r_payroll = mysql_fetch_assoc($sq_payroll))
	{
	
	  $r_payroll['paid_amt'] = intval($r_payroll['paid_amt']);
	  $objPHPExcel->setActiveSheetIndex(0)
				  ->setCellValue($alphabet.$k, round($r_payroll['paid_amt'],0)); 
				  
	  $total_deduction = $total_deduction + $r_payroll['paid_amt'];
	}
	 
	 $alphabet++;
}


$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($alphabet.$k, $total_deduction);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.$k)->getFont()->setBold(true);

$alphabet++;
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($alphabet.$k, $net_salary);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.$k)->getFont()->setBold(true);
			
$total_deduction = 0;
$k++;
}
$alphabet_old = $alphabet;

$objPHPExcel->getActiveSheet()->setCellValue('B'.$k, "Total");
$objPHPExcel->getActiveSheet()->getStyle('B'.$k)->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle('B'.$k)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

$k = $k - 1;


	
	
//echo '=SUM('.$alphabet.'1:'.$alphabet.$k.')';
for($alphabet='C';$alphabet<=$alphabet_old;$alphabet++)
{
$objPHPExcel->getActiveSheet()->setCellValue($alphabet.($k+1), '=SUM('.$alphabet.'1:'.$alphabet.$k.')');

$objPHPExcel->getActiveSheet()->getStyle($alphabet.($k+1))->getFont()->setBold(true);
}


foreach(range('A',$alphabet) as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}

/*foreach(range('A',$alphabet) as $columnID) {
    $calculatedWidth = $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->getWidth();
     $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setWidth($calculatedWidth); 
}
*/
/*for($i = 'A'; $i < $alphabet; $i++) {
    $calculatedWidth = $objPHPExcel->getActiveSheet()->getColumnDimension($i)->getWidth();
    $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setWidth((int) $calculatedWidth * 1.05); 
}*/


$objPHPExcel->getActiveSheet()->mergeCells("A1".":".$alphabet."1");

$objPHPExcel->getActiveSheet()->setTitle('Deduction Report');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="deduction_report.xlsx"');
//read from server and write to buffer
readfile("deduction_report.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";



?>