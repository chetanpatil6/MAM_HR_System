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
 $month_no = $_POST['cmb_gratuity_month'];
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
			 
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
 
 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 


$objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue("A2", "Sr. No")
			 ->setCellValue("B2", "LIC_ID Number")
			 ->setCellValue("C2", "LIC_Emp Number") 
			 ->setCellValue("D2", "Name of Employee") 
			 ->setCellValue("E2", "Salary (Basic+Da+Dp)"); 
			 
$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);

$salary = 0;
$i = 3;
$j = 1;
$total_salary = 0;


$sq_payroll_details = mysql_query("select employee_no, comp_code, paid_amt from payroll_details where comp_code='D0008' and month_no='$month_no'");
while($r_payroll_details = mysql_fetch_assoc($sq_payroll_details))
{
 $sq_payroll_details_1 = mysql_query("select employee_no, comp_code, paid_amt from payroll_details where comp_code='E0001' and month_no='$month_no' and employee_no='$r_payroll_details[employee_no]'");
 while($r_payroll_details_1 = mysql_fetch_assoc($sq_payroll_details_1))
 {
   $salary = $salary + round($r_payroll_details_1['paid_amt'], 0);
 }
 
 $sq_payroll_details_2 = mysql_query("select employee_no, comp_code, paid_amt from payroll_details where comp_code='E0002' and month_no='$month_no' and employee_no='$r_payroll_details[employee_no]'");
 while($r_payroll_details_2 = mysql_fetch_assoc($sq_payroll_details_2))
 {
   $salary = $salary + round($r_payroll_details_2['paid_amt'], 0);
 }
 
 $sq_payroll_details_3 = mysql_query("select employee_no, comp_code, paid_amt from payroll_details where comp_code='E0003' and month_no='$month_no' and employee_no='$r_payroll_details[employee_no]'");
 while($r_payroll_details_3 = mysql_fetch_assoc($sq_payroll_details_3))
 {
   $salary = $salary + round($r_payroll_details_3['paid_amt'], 0);
 }
 
 $sq_empl_master = mysql_query("select first_name, middle_name, last_name from empl_master where employee_no='$r_payroll_details[employee_no]'");
 while($r_empl_master = mysql_fetch_assoc($sq_empl_master))
 {
    $emp_name = $r_empl_master['first_name']." ".$r_empl_master['middle_name']." ".$r_empl_master['last_name'];
 }
 
 $sq_employment_dtls = mysql_query("select * from comp_details where employee_no='$r_payroll_details[employee_no]'");
 while($r_employment_dtls = mysql_fetch_assoc($sq_employment_dtls))
 {
 
    if($r_employment_dtls['lic_acc_no_1'] != '')
	{
    $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $j)
				->setCellValue('B'.$i, $r_employment_dtls['lic_id_no_1'])
				->setCellValue('C'.$i, $r_employment_dtls['lic_gratuity_no_1'])
				->setCellValue('D'.$i, $emp_name)
				->setCellValue('E'.$i, $salary);
				
	$total_salary = $total_salary + $salary;
	}
	if($r_employment_dtls['lic_acc_no_2'] != '')
	{
	$i = $i + 1;
	$j = $j + 1;
	
    $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $j)
				->setCellValue('B'.$i, $r_employment_dtls['lic_id_no_1'])
				->setCellValue('C'.$i, $r_employment_dtls['lic_gratuity_no_1'])
				->setCellValue('D'.$i, $emp_name)
				->setCellValue('E'.$i, $salary);
				
	$total_salary = $total_salary + $salary;
	}
				
				
	$i = $i + 1;
	$j = $j + 1;
 }
}


$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('D'.$i, "Total")
				->setCellValue('E'.$i, $total_salary);
				
$objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
				


$objPHPExcel->getActiveSheet()->setTitle('Gratuity Report');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="gratuity_report.xlsx"');
//read from server and write to buffer
readfile("gratuity_report.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";



?>