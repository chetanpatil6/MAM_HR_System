<?php
define('FPDF_FONTPATH', 'font/');
require('en_table.php');





$pdf->SetLeftMargin(18.0);

$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];
$db1 = $_POST['txt_db'];
$yeart = $_POST['cmb_month_no1'];
$original_basic = 0;

mysql_connect("$servername", "$usernm", "$pas");
mysql_select_db("$db1");

							  
//$emp_no = $_POST['txt_emple_no'];
$month_no = $_POST['cmb_month_no1'];

$month_changed_format= date('F Y', strtotime($month_no));
$compnay_name = '';


$sq_name = mysql_query("select * from company_info");
while($row_info = mysql_fetch_assoc($sq_name))
{
$signature1 = $row_info['signature1'];
$signature2 = $row_info['signature2'];
$signature3 = $row_info['signature3'];

$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
$compnay_name = $row_info['name'];
$pdf->SetFont('Arial', '', 11);
//Table with 20 rows and 4 columns
$tot_earnings = 0;
$tot_deductions = 0;
$pdf->SetFont('Arial','B',13);
$pdf->Cell(190,4,$row_info['name'],0,1,'C');
$pdf->Ln(2);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,4,$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'],0,1,'C');
}
					

$pdf->SetFont('Arial', '', 11);
//Table with 20 rows and 4 columns
$tot_earnings = 0;
$tot_deductions = 0;
$pdf->SetFont('Arial','B',10);

//$emp_no = $_POST['txt_emple_no'];
$pdf->Cell(190,6,'Leaves Encashment',0,0,'C');
$pdf->Cell(1,6,'Month: '.$month_changed_format,0,1,'R');






 	 
	  
	
	    
	 // $res_current_el = mysql_fetch_assoc(mysql_query("select leavedays_onhand from balanced_leaves where leave_short_code = 'el'"));
	  
	  $pdf->SetWidths(array(45, 50, 45, 50));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',11);
	  $pdf->Row2(array("Employee Name", "Current EL", "Balance EL", "Total EL"));
	  $pdf->SetFont('Arial','B',9);
	  
	 $encash = mysql_query("select * from leave_encashment where from_date like '$yeart%'");
		 while($res_current_el = mysql_fetch_assoc($encash))
	  {
	  $sq2= mysql_fetch_assoc(mysql_query("select first_name,middle_name,last_name from empl_master where employee_no='$res_current_el[employee_no]'"));
	  
	  $pdf->Row2(array("".$sq2['first_name']." ".$sq2['middle_name']." ".$sq2['last_name']."", $res_current_el['current_el'], $res_current_el['balanced_el'], $res_current_el['total_el']));
	  }
	  
	  
	  



	 
	
	  $pdf->Output();
	  $dir='../PaySlips/';
	  date_default_timezone_set('Asia/Calcutta');
	  
	  $filename = 'PaySplit_'.$month_no.'_'.$compnay_name;
	  $filename = $filename."_".date('Y-m-d')."_".time().".pdf";
	
	  $pdf ->Output($dir.$filename);







	 
?>
