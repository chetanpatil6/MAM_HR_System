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



$arr_dbname = array();
if (file_exists("connection.xml")) 
{
$xml = simplexml_load_file("connection.xml");
}
else if(file_exists("model/connection.xml")) 
{
$xml = simplexml_load_file("model/connection.xml");
}
else if(file_exists("../model/connection.xml")) 
{
$xml = simplexml_load_file("../model/connection.xml");
}
else
{
  echo "Failed to open XML";
  exit(0);
}


$arr_company = array();

foreach($xml->children() as $child1)
{   
  foreach($child1->children() as $child)
  {  
   $name = $child->getName();
   if($name == 'dbname')
   {
   		array_push($arr_dbname, $child);
   }
  }
}
$len_arr = sizeof($arr_dbname);


$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];

$month_no = $_POST['cmb_pf_collective_month'];
$company_name = $_POST['cmb_company'];

if($company_name == 'mam')
{
  $code = 'G2';
}
else
{
  $code = 'G1';
}	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$arr_a1 = array();
$arr_a2 = array();
$arr_a3 = array();
$arr_a4 = array();
$arr_a5 = array();
$arr_total = array();
$arr_company_name = array();
$arr_total_basic_da = array();
$i = 1;
	$sr_no = 1;

	$basic_total1 = 0;
	$da_total1 = 0;
	$total_of_total1 = 0;
	$pf_total1 = 0;
	$a_total1 = 0;
	$b_total1 = 0;
	$c_total1 = 0;
	$other_total1 = 0;
	$total_grand1 = 0;
	
	
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", "Sr. No.")
			->setCellValue("B1", "Account No.")
			->setCellValue("C1", "Name of Employee")
			->setCellValue("D1", "Basic")
			->setCellValue("E1", "DA")
			->setCellValue("F1", "Total")
			->setCellValue("G1", "HRA+Other")
			->setCellValue("H1", "Grand Total")
			->setCellValue("I1", "Employee Single Share")
			->setCellValue("J1", "15.67% A")
			->setCellValue("K1", "8.33% B")
			->setCellValue("L1", "24% (A+B)");
		
		$i = 2;	 
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

for($arr=0;$arr<$len_arr;$arr++)
{


$db1 = $arr_dbname[$arr];


mysql_connect("$servername", "$usernm", "$pas") or die("unable to connect server");
if(mysql_select_db("$db1"))
{
//$i++;

$sq_name = mysql_query("select * from company_info");
while($row_info = mysql_fetch_assoc($sq_name))
{
$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
$str_address = $row_info['name']." \n".$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'];

array_push($arr_company_name, $row_info['name']);
}


//$i = $i + 2;
 



//$i = $i + 2;

	
	$basic_total = 0;
	$da_total = 0;
	$total_of_total = 0;
	$pf_total = 0;
	$a_total = 0;
	$b_total = 0;
	$c_total = 0;
	$other_total = 0;
	$total_grand = 0;

$sq_payroll_dtls = mysql_query("select distinct payroll_details.employee_no from payroll_details,comp_details where payroll_details.month_no='$month_no' and comp_details.type_of_sep='' and comp_details.pf_number!='' order by comp_details.pf_number ASC");
while($r_payroll_details = mysql_fetch_assoc($sq_payroll_dtls))
{
  $employee_no = $r_payroll_details['employee_no'];
 // echo $employee_no."<br />";
  $sq_pf_no = mysql_query("select SUBSTRING(pf_number, 1, 2) as pfsubstr from comp_details where employee_no='$employee_no' order by pf_number");
  $r_pf_no = mysql_fetch_assoc($sq_pf_no);
  
  //echo $r_pf_no['pfsubstr']."<br />";
  
  if($code == $r_pf_no['pfsubstr'])
  {
  //echo "here";
  $total_basic = 0;
  $da = 0;
  

  $pf_number = '';
  
  $sq_employment_dtls = mysql_query("select pf_number from comp_details where employee_no='$employee_no' order by pf_number");
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
	 $tb = $total_basic;
  }
  
  $sq_grade = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='E0002'");
  while($r_grade = mysql_fetch_assoc($sq_grade))
  {
     $total_basic = $total_basic + $r_grade['paid_amt'];
	 $tb = $total_basic;
  }
  
  $sq_da = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='E0003'");
  while($r_da = mysql_fetch_assoc($sq_da))
  {
     $total_basic = $total_basic + $r_da['paid_amt'];
	 $da_inpayslip = $r_da['paid_amt'];
  }
  
  $total_basic = round($total_basic, 0);
  //$total_basic = $total_basic;
  if($total_basic > 6500)
  {
    $basic = 6500;           /////////////////////////////////////////////// basic
	$da = 0;               /////////////////////////////////////////////// DA
  }
  else
  {
  //  $basic = $total_basic;           /////////////////////////////////////////////// basic
    $basic = $tb;           /////////////////////////////////////////////// basic
	$da = round($da_inpayslip, 0);            /////////////////////////////////////////////// DA
	//$da = $da_inpayslip;            /////////////////////////////////////////////// DA
  }
  
  $total_basic_da = $basic + $da; /////////////////////////////////////////////////////////////  Total
  
  
  
  $total_other = 0;
/*  $sq_others = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code LIKE 'E%' and comp_code<>'E0001' and comp_code<>'E0002' and comp_code<>'E0003'");
  while($r_others = mysql_fetch_assoc($sq_others))
  {
    $total_other = $total_other + $r_others['paid_amt'];
  }*/
  
  $sq_others = mysql_query("select paid_amt from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code LIKE 'E%'");
  while($r_others = mysql_fetch_assoc($sq_others))
  {
    $total_other = $total_other + $r_others['paid_amt'];
  }
  
    $total_other = round($total_other, 0);
     // $total_other = $total_other;
  
 // $grand_total = $total_basic_da + $total_other; ///////////////////////////////////////////////////////// Grand Total
 
  $total_other = $total_other - $total_basic_da; ///////////////////////////////////////////////////////// Total other
  
  $grand_total = $total_basic_da + $total_other; ///////////////////////////////////////////////////////// Grand Total

  
  $pf = 0;
  $sq_pf = mysql_query("select * from payroll_details where month_no='$month_no' and employee_no='$employee_no' and comp_code='D0001'");
  while($r_pf = mysql_fetch_assoc($sq_pf))
  {
    $pf = round($r_pf['paid_amt'], 0);
//      $pf = $r_pf['paid_amt'];
  }
  
  
  $a = $total_basic_da*15.67/100;
  $a = round($a, 0); ///////////////////////////////////////////////////////////////////////////// 15.67%
  
  
  $b = $total_basic_da*8.33/100;
  $b = round($b, 0); ///////////////////////////////////////////////////////////////////////////// 8.33%
  //$b = $b;

  $c = $a + $b; ////////////////////////////////////////////////////////////////////////////////// 24%
  
  if($grand_total!=0)
  {
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
			$sr_no = $sr_no + 1;
	}
	
	
	$basic_total = $basic_total + $basic;
	$basic_total1 = $basic_total1 + $basic;
	$da_total = $da_total + $da;
	$da_total1 = $da_total1 + $da;
	$total_of_total = $total_of_total + $total_basic_da;
	$total_of_total1 = $total_of_total1 + $total_basic_da;
	$other_total = $other_total + $total_other;
	$other_total1 = $other_total1 + $total_other;
	$total_grand = $total_grand + $grand_total;
	$total_grand1 = $total_grand1 + $grand_total;
	$pf_total = $pf_total + $pf;
	$pf_total1 = $pf_total1 + $pf;
	$a_total = $a_total + $a;
	$a_total1 = $a_total1 + $a;
	$b_total = $b_total + $b;
	$b_total1 = $b_total1 + $b;
	$c_total = $c_total + $c;
	$c_total1 = $c_total1 + $c;
	
	
	$basic = 0;
	$da = 0;
	$grand_total = 0;
	$pf = 0;
	$a = 0;
	$b = 0;
	$c = 0;
}
}






//$objPHPExcel->getActiveSheet()->getStyle("C".$i)->getFont()->setBold(true);
//$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
	
array_push($arr_total_basic_da, $total_of_total);

 //if($basic_total!=0 and $da_total!=0 and $total_of_total!=0)
  {
  /*$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("C".$i, "Total"); 
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D".$i, $basic_total1)
			->setCellValue("E".$i, $da_total1)
			->setCellValue("F".$i, $total_of_total1)
			->setCellValue("G".$i, $other_total1)
			->setCellValue("H".$i, $total_grand1)
			->setCellValue("I".$i, $pf_total1)
			->setCellValue("J".$i, $a_total1)
			->setCellValue("K".$i, $b_total1)
			->setCellValue("L".$i, $c_total1);*/
	}
/*$objPHPExcel->getActiveSheet()->getStyle("D".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("H".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("I".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("J".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("K".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("L".$i)->getFont()->setBold(true);*/
		
//$i = $i + 2;

$a1 = $a_total;
$a2 = $total_of_total * 0.0110;
$a2 = round($a2, 0);
//$a2 = $a2;
$a3 = $b_total;
$a4 = $total_of_total * 0.005;
$a4 = round($a4, 0);
//$a4 = $a4;
$a5 = $total_of_total * 0.0001;
$a5 = round($a5, 0);
//$a5 = $a5;
$total = $a1 + $a2 + $a3 + $a4 + $a5;



array_push($arr_a1, $a1);
array_push($arr_a2, $a2);
array_push($arr_a3, $a3);
array_push($arr_a4, $a4);
array_push($arr_a5, $a5);
array_push($arr_total, $total);


/*echo $a1."<br />";
echo $a2."<br />";
echo $a3."<br />";
echo $a4."<br />";
echo $a5."<br />";
echo $total."<br />";*/

}		

}


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("C".$i, "Total"); 
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D".$i, $basic_total1)
			->setCellValue("E".$i, $da_total1)
			->setCellValue("F".$i, $total_of_total1)
			->setCellValue("G".$i, $other_total1)
			->setCellValue("H".$i, $total_grand1)
			->setCellValue("I".$i, $pf_total1)
			->setCellValue("J".$i, $a_total1)
			->setCellValue("K".$i, $b_total1)
			->setCellValue("L".$i, $c_total1);
$objPHPExcel->getActiveSheet()->getStyle("C".$i)->getFont()->setBold(true);		
$objPHPExcel->getActiveSheet()->getStyle("D".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("H".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("I".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("J".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("K".$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("L".$i)->getFont()->setBold(true);
			
/*$sr_no = $sr_no +2;
$objPHPExcel->getActiveSheet()->getStyle("C".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C'.$sr_no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
	

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("C".$sr_no, "Total"); 
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D".$sr_no, $basic_total)
			->setCellValue("E".$sr_no, $da_total)
			->setCellValue("F".$sr_no, $total_of_total)
			->setCellValue("G".$sr_no, $other_total)
			->setCellValue("H".$sr_no, $total_grand)
			->setCellValue("I".$sr_no, $pf_total)
			->setCellValue("J".$sr_no, $a_total)
			->setCellValue("K".$sr_no, $b_total)
			->setCellValue("L".$sr_no, $c_total);

$objPHPExcel->getActiveSheet()->getStyle("D".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("H".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("I".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("J".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("K".$sr_no)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("L".$sr_no)->getFont()->setBold(true);*/

//////////////////////////////////////////////////////////code for summary//////////////////////////////////////////////////////////////////////////////////////
$i = $i + 3;
$alphabet = 'B';
$arr_val = array("No.", 1, 2, 10, 21, 22, "Total");

$m = $i;
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".$m, "No.")
			->setCellValue("A".($m+1), "1 :")
			->setCellValue("A".($m+2), "2 :")
			->setCellValue("A".($m+3), "10 :")
			->setCellValue("A".($m+4), "21 :")
			->setCellValue("A".($m+5), "22 :")
			->setCellValue("A".($m+6), "Total");

			
$objPHPExcel->getActiveSheet()->getStyle("A".$m)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+1))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+2))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+3))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+4))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+5))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+6))->getFont()->setBold(true);


$arr_a1_tot = 0;
$arr_a2_tot = 0;
$arr_a3_tot = 0;
$arr_a4_tot = 0;
$arr_a5_tot = 0;
$arr_total_tot = 0;

for($arr=0;$arr<sizeof($arr_company_name);$arr++)
{
  $m = $i;
  $objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($alphabet.$m, $arr_company_name[$arr])
			->setCellValue($alphabet.($m+1), $arr_a1[$arr])
			->setCellValue($alphabet.($m+2), $arr_a2[$arr])
			->setCellValue($alphabet.($m+3), $arr_a3[$arr])
			->setCellValue($alphabet.($m+4), $arr_a4[$arr])
			->setCellValue($alphabet.($m+5), $arr_a5[$arr])
			->setCellValue($alphabet.($m+6), $arr_total[$arr]);
			
$objPHPExcel->getActiveSheet()->getStyle($alphabet.$m)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.($m+6))->getFont()->setBold(true);

$arr_a1_tot = $arr_a1_tot + $arr_a1[$arr];
$arr_a2_tot = $arr_a2_tot + $arr_a2[$arr];
$arr_a3_tot = $arr_a3_tot + $arr_a3[$arr];
$arr_a4_tot = $arr_a4_tot + $arr_a4[$arr];
$arr_a5_tot = $arr_a5_tot + $arr_a5[$arr];
$arr_total_tot = $arr_total_tot + $arr_total[$arr];


$alphabet++;		
}
			
$m = $i;

  $objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($alphabet.$m, "Total")
			->setCellValue($alphabet.($m+1), $arr_a1_tot)
			->setCellValue($alphabet.($m+2), $arr_a2_tot)
			->setCellValue($alphabet.($m+3), $arr_a3_tot)
			->setCellValue($alphabet.($m+4), $arr_a4_tot)
			->setCellValue($alphabet.($m+5), $arr_a5_tot)
			->setCellValue($alphabet.($m+6), $arr_total_tot);
			
$objPHPExcel->getActiveSheet()->getStyle($alphabet.$m)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.($m+1))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.($m+2))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.($m+3))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.($m+4))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.($m+5))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle($alphabet.($m+6))->getFont()->setBold(true);

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".($m+7), "Pay  : ")
			->setCellValue("A".($m+8), "P.F. :")
			->setCellValue("A".($m+9), "F. P :");
			
$alphabet = "B";

for($arr=0;$arr<sizeof($arr_company_name);$arr++)
{
  $m = $i;
  $objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($alphabet.($m+7), $arr_total_basic_da[$arr])
			->setCellValue($alphabet.($m+8), $arr_a1[$arr])
			->setCellValue($alphabet.($m+9), $arr_a3[$arr]);
  $alphabet++;
}

			
$objPHPExcel->getActiveSheet()->getStyle("A".$m)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+1))->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".($m+2))->getFont()->setBold(true);



$objPHPExcel->getActiveSheet()->setTitle('PF Report');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="pf_collective_report.xlsx"');
//read from server and write to buffer
readfile("pf_collective_report.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";



?>