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


function cellColor($cells,$color){
        global $objPHPExcel;
        $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()
        ->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array('rgb' => $color)
        ));
    }
    	
// Add some data
$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];
$db1 = $_POST['txt_db'];

 
mysql_connect("$servername", "$usernm", "$pas") or die("unable to connect server");
mysql_select_db("$db1") or die("unable to connect db");



// Add some data

 $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", "Sr.No.")
            ->setCellValue("B1", "Employee Code")
			->setCellValue("C1", "Employee Name")
			->setCellValue("D1", " Basic") 
			->setCellValue("E1", "Grade Pay")
			->setCellValue("F1", "DA 30%")
			->setCellValue("G1", "HRA 20%") 
			->setCellValue("H1", "CLA") 
			->setCellValue("I1", "TA") 
			->setCellValue("J1", "WA") 
			->setCellValue("K1", "Oth") 
			->setCellValue("L1", "IT")
			->setCellValue("M1", "Electricity and Water")
			->setCellValue("N1", "Salary Deposit")
			->setCellValue("O1", "Late mark deduction")
			->setCellValue("P1", "Hospital Bill")
			->setCellValue("Q1", "Other Deduction");

$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('P1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('Q1')->getFont()->setBold(true);
			
$i = 2;
		
$sq_attendance = mysql_query("select first_name, middle_name, last_name, employee_no, emp_code from empl_master");
while($r_attendance = mysql_fetch_assoc($sq_attendance))
{
  $sq_comp_details = mysql_query("select employee_no from comp_details where employee_no='$r_attendance[employee_no]' and type_of_sep=''");
  if($r_comp_details = mysql_fetch_assoc($sq_comp_details))
  {
  
   $sq_month = mysql_query("select month_no from month_control where month_active='Y'");
   while($r_month = mysql_fetch_assoc($sq_month))
   {
     $res_amount = mysql_fetch_assoc(mysql_query("select amount from emp_comp_master_lines where employee_no='$r_comp_details[employee_no]' and comp_code='D0004'"));
	 
	 //"select * from emp_comp_master_lines,comp_details where emp_comp_master_lines.employee_no=comp_details.employee_no and emp_comp_master_lines.comp_code='D0004'"
	 
   	//if()$res_amount['amount']
       //$objPHPExcel->getCell('A'.$i)->setValueExplicit($r_attendance['emp_code'], PHPExcel_Cell_DataType::TYPE_STRING);
	  // $sq_amount = mysql_query("select amount,comp_code from emp_comp_master_lines where employee_no='$r_comp_details[employee_no]'");
	   //while($res_amount = mysql_fetch_assoc($sq_amount))
	   {
	     
	   	   $objPHPExcel->getActiveSheet()->setCellValueExplicit('B'.$i, $r_attendance['emp_code'], PHPExcel_Cell_DataType::TYPE_STRING);  	   
           $objPHPExcel->setActiveSheetIndex(0)
		   
   			->setCellValue("A".$i, $r_attendance['employee_no'])
			->setCellValue("C".$i, $r_attendance['first_name']." ".$r_attendance['middle_name']." ".$r_attendance['last_name']);
			// ->setCellValue("D".$i, $r_attendance['employee_no']); 
			//->setCellValue("C".$i, $r_month['month_no'])
			//->setCellValue("L".$i, $res_amount['amount']);
			
			 /*if($res_amount['comp_code'] == 'D0004')
			 {
				cellColor('L'.$i, '66FF00');
			 }
			 else
			 {
			 	cellColor('L'.$i, 'FFFFF');
			 }*/
		}
			
	$i++; 
	}
   }
}

/*$objPHPExcel->getActiveSheet()
    ->getStyle('A')
    ->getNumberFormat()
    ->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
*/

foreach(range('A','Q') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}




$objPHPExcel->getActiveSheet()->setTitle('Compensation Template');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="compensation_template.xlsx"');
//read from server and write to buffer
readfile("compensation_template.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";



?>