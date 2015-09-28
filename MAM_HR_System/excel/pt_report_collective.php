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



function number_to_words($number)
{
    if ($number > 999999999)
    {
       throw new Exception("Number is out of range");
    }

   /* $Gn = floor($number / 1000000);  /* Millions (giga) 
    $number -= $Gn * 1000000; */
	$crn = floor($number / 10000000);  /* Crores (giga) */
    $number -= $crn * 10000000;
    $Ln = floor($number / 100000);  /* Millions (giga) */
    $number -= $Ln * 100000;
    $kn = floor($number / 1000);     /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100);      /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10);       /* Tens (deca) */
    $n = $number % 10;               /* Ones */
	$cn = round(($number-floor($number))*100); /* Cents */
    $result = ""; 

  /*  if ($Gn)
    {  $result .= number_to_words($Gn) . " Million";  } */
	
	if ($crn)
    {  $result .= (empty($result) ? "" : " ") . number_to_words($crn) . " Crores"; } 

	
	if ($Ln)
    {  $result .= (empty($result) ? "" : " ") . number_to_words($Ln) . " Lacs"; } 

	
    if ($kn)
    {  $result .= (empty($result) ? "" : " ") . number_to_words($kn) . " Thousand"; } 


    if ($Hn)
    {  $result .= (empty($result) ? "" : " ") . number_to_words($Hn) . " Hundred";  } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
        "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n)
    {
       if (!empty($result))
       {  $result .= " ";
       } 

       if ($Dn < 2)
       {  $result .= $ones[$Dn * 10 + $n];
       }
       else
       {  $result .= $tens[$Dn];
          if ($n)
          {  $result .= "-" . $ones[$n];
          }
       }
    }

    if ($cn)
    {
       if (!empty($result))
       {  $result .= ' ';
       }
      // $title = $cn==1 ? 'cent ': 'cents';
	   $title = $cn==1 ? '': '';
       $result .= strtolower(number_to_words($cn)).' '.$title;
    }
	
	

    if (empty($result))
    {  $result = "zero"; } 

    return $result;
}



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
/*$len = sizeof($arr);

for($i=0;$i<$len;$i++)
{
  $arr[$i] = str_replace('12345', ' ', $arr[$i]);
  echo "<option value='$arr[$i]'>$arr[$i]</option>";
}
*/


$len_arr = sizeof($arr_dbname);

$month_no = $_POST['cmb_pt_collective_month'];
 

			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];
$arr_company_name = array();
$arr_total = array();


$i =  2;
$total_amt = 0;
for($arr=0;$arr<$len_arr;$arr++)
{

//echo $arr." ";
$db1 = $arr_dbname[$arr];
//echo $db1."<br />";
mysql_connect("$servername", "$usernm", "$pas") or die("unable to connect server");
if(mysql_select_db("$db1"))
{
$sq_name = mysql_query("select * from company_info");
while($row_info = mysql_fetch_assoc($sq_name))
{
$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
$str_address = $row_info['name']." \n".$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'];

array_push($arr_company_name, $row_info['name']);
}


 $objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue("A".$i, $str_address. "\n Month : ".date('M-Y', strtotime($month_no)));
			
 $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setBold(true);
 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$i = $i + 2;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, "Sr. No")
			->setCellValue("B".$i, "Name of Employee") 
			->setCellValue("C".$i, "Amount")
			->setCellValue("E".$i, "Sr. No")
			->setCellValue("F".$i, "Name of Employee") 
			->setCellValue("G".$i, "Amount"); 
			 
$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getFont()->setBold(true);

$i = $i + 1;;
$j = 1;

$emp_no = array();
$paid_amt = array();

$sq_payroll_details = mysql_query("select employee_no, comp_code, paid_amt from payroll_details where comp_code='D0002' and month_no='$month_no'");
while($r_payroll_details = mysql_fetch_assoc($sq_payroll_details))
{
   array_push($emp_no, $r_payroll_details['employee_no']);
   array_push($paid_amt, round($r_payroll_details['paid_amt'],0));
}


for($m=0;$m<sizeof($emp_no);$m++)
{
if($j%2 != 0)
{
 $sq_empl_master = mysql_query("select first_name, middle_name, last_name from empl_master where employee_no='$emp_no[$m]'");
 while($r_empl_master = mysql_fetch_assoc($sq_empl_master))
 {
    $emp_name = $r_empl_master['first_name']." ".$r_empl_master['middle_name']." ".$r_empl_master['last_name'];
 }

  
    $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $j)
				->setCellValue('B'.$i, $emp_name)
				->setCellValue('C'.$i, $paid_amt[$m]);
				
	$total_amt = $total_amt + $paid_amt[$m];
	

	$j = $j + 1;
}
else
{
  $sq_empl_master = mysql_query("select first_name, middle_name, last_name from empl_master where employee_no='$emp_no[$m]'");
 while($r_empl_master = mysql_fetch_assoc($sq_empl_master))
 {
    $emp_name = $r_empl_master['first_name']." ".$r_empl_master['middle_name']." ".$r_empl_master['last_name'];
 }
 

  
  
    $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('E'.$i, $j)
				->setCellValue('F'.$i, $emp_name)
				->setCellValue('G'.$i, $paid_amt[$m]);
				
	$total_amt = $total_amt + $paid_amt[$m];
	

	$j = $j + 1;
	$i = $i + 1;
}
}

$i = $i + 1;
$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('F'.$i, "Total")
				->setCellValue('G'.$i, $total_amt);
				
$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);



$i = $i + 3;



array_push($arr_total, $total_amt);

}
}


$i = $i + 3;
$j = 1;

 $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, 'Monthly Profession Tax List');
$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setBold(true);


$i = $i + 1;
   $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, 'Sr. No.')
				->setCellValue('B'.$i, 'Department Name')
				->setCellValue('C'.$i, 'Amount');
				
$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getFont()->setBold(true);
				
$i = $i + 1;
$total = 0;
for($arr=0;$arr<sizeof($arr_company_name);$arr++)
{
   $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $j)
				->setCellValue('B'.$i, $arr_company_name[$arr])
				->setCellValue('C'.$i, $arr_total[$arr]);
				
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getFont()->setBold(true);
	
	$total = $total + $arr_total[$arr];
	$j++;
}

$i = $i + 1;


   $objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B'.$i, 'Total')
				->setCellValue('C'.$i, $total);
				
$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getFont()->setBold(true);


$objPHPExcel->getActiveSheet()->setTitle('Profession Tax');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
     

// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage


header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="pt_report_collective.xlsx"');
//read from server and write to buffer
readfile("pt_report_collective.xlsx");
// Echo memory peak usage
echo date('H:i:s') . "Done writing file.\r\n";


?>