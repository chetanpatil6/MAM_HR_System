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
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1','Sr.No')
			->setCellValue('B1','Employee Name')
			->setCellValue('C1','PF.No.')
			->setCellValue('D1','PF Salary')
			->setCellValue('E1','Pension Sal')
			->setCellValue('F1','Workers Share')
			->setCellValue('G1','Employers Share')
			->setCellValue('H1','Total')
			->setCellValue('I1','Pension Fund');
			
    
 $i = 2;
 $s = 1;
 
 
  $sq_payroll_hdr = mysql_query("select * from payroll_hdr where month_no='$_POST[cmb_month_no_pf_print]'");
  while($r_payroll_hdr = mysql_fetch_assoc($sq_payroll_hdr))
  {
  $basic_pay = 0;
 $grade_pay = 0;
 
  $sq1 = mysql_query("select * from empl_master where employee_no='$r_payroll_hdr[employee_no]'");
  while($row = mysql_fetch_assoc($sq1))
  {
  
  $sq2 = mysql_query("select * from comp_details where employee_no='$row[employee_no]'");
  while($row1 = mysql_fetch_assoc($sq2))
  {
  $sq_payroll = mysql_query("select * from payroll_details where employee_no='$row[employee_no]' and month_no='$_POST[cmb_month_no_pf_print]' and comp_code='E0001'");
  while($r_payroll = mysql_fetch_assoc($sq_payroll))
  {
    $basic_pay = $r_payroll['eligible_amt'];
  }
  
    $sq_payroll_1 = mysql_query("select * from payroll_details where employee_no='$row[employee_no]' and month_no='$_POST[cmb_month_no_pf_print]' and comp_code='E0002'");
  while($r_payroll_1 = mysql_fetch_assoc($sq_payroll_1))
  {
    $grade_pay = $r_payroll_1['eligible_amt'];
  }
  
  
  $total_basic = $basic_pay + $grade_pay;
  
  $total_basic = round($total_basic);
  
  
  $pension_sal = $total_basic;
  
  if($pension_sal > 6500)
  {
    $pension_sal = 6500;
  }
  
  $pension_fund = $pension_sal * 8.33/100;
  
  if($pension_fund > 541)
  {
    $pension_fund = 541;
  }
  $workers_share = $total_basic * 12/100;
  
  $employee_share = $workers_share - $pension_fund;
  
  
  $total = $workers_share + $employee_share;
  
 $objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue('A'.$i, $s)
			 ->setCellValue('B'.$i, $row['last_name'].$row['first_name'].$row['middle_name'])
			 ->setCellValue('C'.$i, $row1['pf_number'])
			 ->setCellValue('D'.$i, $total_basic)
			 ->setCellValue('E'.$i, $pension_sal)
			 ->setCellValue('F'.$i, $workers_share)
			 ->setCellValue('G'.$i, $employee_share)
			 ->setCellValue('H'.$i, $total)
			 ->setCellValue('I'.$i, $pension_fund);	

$i = $i + 1;
$s = $s + 1;

}
}
}

$objPHPExcel->getActiveSheet()->setTitle('PF Report');

$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
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