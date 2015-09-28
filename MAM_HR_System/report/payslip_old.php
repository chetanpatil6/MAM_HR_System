<?php
define('FPDF_FONTPATH', 'font/');
require('mc_table.php');


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
       {  $result .= " and ";
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
       {  $result .= ' and ';
       }
      // $title = $cn==1 ? 'cent ': 'cents';
	   $title = $cn==1 ? '': '';
       $result .= strtolower(number_to_words($cn)).' '.$title;
    }
	
	

    if (empty($result))
    {  $result = "zero"; } 

    return $result;
}




$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];
$db1 = $_POST['txt_db'];

mysql_connect("$servername", "$usernm", "$pas");
mysql_select_db("$db1");

							  
//$emp_no = $_POST['txt_emple_no'];
$month_no = $_POST['cmb_month_no1'];

$month_changed_format= date('M-Y', strtotime($month_no));

//$sq = mysql_query("select * from payroll_hdr where employee_no='$emp_no' and month_no='$month_no'");
$sq = mysql_query("select * from payroll_hdr where month_no='$month_no'");
while($r1 = mysql_fetch_assoc($sq))
{
$emp_no = $r1['employee_no'];
$gross_earn = $r1['gross_earnings'];
$gross_deduct = $r1['gross_deduction'];
$netsal = $r1['net_salary'];


for($print_twice=0;$print_twice<2;$print_twice++)
{
$sq_name = mysql_query("select * from company_info");
while($row_info = mysql_fetch_assoc($sq_name))
{
$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
$pdf->SetFont('Arial', '', 11);
//Table with 20 rows and 4 columns
$tot_earnings = 0;
$tot_deductions = 0;
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,4,$row_info['name'],0,1,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(190,4,$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'],0,1,'C');

}
					

$pdf->SetFont('Arial', '', 11);
//Table with 20 rows and 4 columns
$tot_earnings = 0;
$tot_deductions = 0;
$pdf->SetFont('Arial','B',10);

//$emp_no = $_POST['txt_emple_no'];

$pdf->Cell(190,6,'Month '.$month_changed_format,0,1,'C');

//$pdf->Ln(10);


  $sq1 = mysql_query("select * from empl_master where employee_no='$emp_no'");
  while($r = mysql_fetch_assoc($sq1))
  {
   $sq2 = mysql_query("select * from comp_details where employee_no='$emp_no'");
  while($r2 = mysql_fetch_assoc($sq2))
  {
  
  $sq3 = mysql_query("select * from family_info  where employee_no='$emp_no'");
  while($r3 = mysql_fetch_assoc($sq3))
  {
 	  $pdf->SetWidths(array(95,95));
      srand(microtime()*1000000);	
      $pdf->SetFont('Arial','B',9);
	  $pdf->Row(array("Employee No.                      : ".$r['employee_no']."\n"."Designation                         : ".$r2['designation']."\n"."Days Worked                       : ".$r1['pay_days']."\n"."Bank Account/Cheque No : ".$r2['bank_account_no'],
	  "Name                                 : ".$r['first_name']." ".$r['middle_name']." ".$r['last_name']."\n"."Date of Joining                 : ".$r2['joining_date']."\n"."PF Account No.                : ".$r2['pf_number']."\n"."Father/Husband's Name. : ".$r3['spouse_name']));
	 
	  //$pdf->Row(array("Designation  : ".$r2['designation'],"Date of Joining :".$r2['joining_date']));
	  
	  //$pdf->Row(array("Days Worked :".$r1['pay_days'],"PF Account No. : ".$r2['pf_number']));	
	  
	  //$pdf->Row(array("Bank Account/Cheque No :".$r2['bank_account_no'],"Father/Husband's Name. : ".$r3['spouse_name']));
	  
	 

 }
 }	 
 }
 
 
	    $sq_attendance = mysql_query("select * from attendance where employee_no='$emp_no' and month_no='$month_no'");
		while($r_attendance = mysql_fetch_assoc($sq_attendance))
		{
		
		 $pdf->SetWidths(array(45, 50, 45, 50));
      	 srand(microtime()*1000000);	
         $pdf->SetFont('Arial','B',9);
	  
	  	$pdf->Row(array("Worked Days: ".$r_attendance['pay_days'], "Holidays: ".$r_attendance['holidays'], "Paid Leaves: ". $r_attendance['paid_leaves'], "Unpaid Leaves: ".$r_attendance['unpaid_leaves']));
	  
//$pdf->Ln(0);
		}
  
	 $pdf->SetWidths(array(95, 95));
      srand(microtime()*1000000);	
      $pdf->SetFont('Arial','B',9);
	//  $pdf->Row1(array("Earnings", "Amount"));
	  
	
	 $str_comp_name = '';
	 $str_eligible_amt = '';
	 $str_comp_name_e = '';
	 $str_eligible_amt_e = '';  
	 
$sq2 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'E%'");
	  while($r2 = mysql_fetch_assoc($sq2))
	  {
	  	$pdf->SetWidths(array(95, 95));
      	srand(microtime()*1000000);	
      	$pdf->SetFont('Arial','',9);
		$sq3 = mysql_query("select * from comp_head where comp_code='$r2[comp_code]'");
		while($r3 = mysql_fetch_assoc($sq3))
		{
			$eligible_amt = number_format($r2['paid_amt'], 2); 
	  	//	$pdf->Row1(array($r3['comp_name'], $eligible_amt));
			if($str_comp_name_e != '')
			{
			$str_comp_name_e = $str_comp_name_e."\n".$r3['comp_name'];
			}
			else
			{
			$str_comp_name_e = $r3['comp_name'];
			}
			
			if($str_eligible_amt_e != '')
			{
			$str_eligible_amt_e = $str_eligible_amt_e."\n".$eligible_amt;
			}
			else
			{
			$str_eligible_amt_e = $eligible_amt;
			}
		}
		$tot_earnings = $tot_earnings + $r2['paid_amt'];
	  }
	  

 	  //$pdf->Ln(5);
	  $pdf->SetWidths(array(95, 95));
      srand(microtime()*1000000);	
      $pdf->SetFont('Arial','B',9);
	//  $pdf->Row1(array("Deductions", "Amount"));
	  
	
	  
	  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'D%'");
	  while($r4 = mysql_fetch_assoc($sq4))
	  {
	  	$pdf->SetWidths(array(95, 95));
      	srand(microtime()*1000000);	
      	$pdf->SetFont('Arial','',9);
		$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
		while($r5 = mysql_fetch_assoc($sq5))
		{
		    $eligible_amt = number_format($r4['paid_amt'], 2); 
	  	//	$pdf->Row1(array($r5['comp_name'], $eligible_amt));
			if($str_comp_name != '')
			{
			$str_comp_name = $str_comp_name."\n".$r5['comp_name'];
			}
			else
			{
			$str_comp_name = $r5['comp_name'];
			}
			
			
			if($str_eligible_amt != '')
			{
			$str_eligible_amt = $str_eligible_amt."\n".$eligible_amt;
			}
			else
			{
			$str_eligible_amt = $eligible_amt;
			}
		}
		$tot_deductions = $tot_deductions + $r4['paid_amt'];
	  }
	  
	  
	  
	  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'F%'");
	  while($r4 = mysql_fetch_assoc($sq4))
	  {
	    if($r4['eligible_amt'] >= 0)
		{
	  	$pdf->SetWidths(array(95, 95));
      	srand(microtime()*1000000);	
      	$pdf->SetFont('Arial','',9);
		$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
		while($r5 = mysql_fetch_assoc($sq5))
		{
		
		    $eligible_amt = number_format($r4['paid_amt'], 2); 
	  	//	$pdf->Row1(array($r5['comp_name'], $eligible_amt));
			if($str_comp_name_e != '')
			{
			$str_comp_name_e = $str_comp_name_e."\n".$r5['comp_name'];
			}
			else
			{
			$str_comp_name_e = $r5['comp_name'];
			}
			
			
			if($str_eligible_amt_e != '')
			{
			$str_eligible_amt_e = $str_eligible_amt_e."\n".$eligible_amt;
			}
			else
			{
			$str_eligible_amt_e = $eligible_amt;
			}
		}
		$tot_earnings = $tot_earnings + $r4['paid_amt'];
		}
		
		else
		{
		$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
		while($r5 = mysql_fetch_assoc($sq5))
		{
		    $eligible_amt = number_format($r4['paid_amt'], 2); 
	  	//	$pdf->Row1(array($r5['comp_name'], $eligible_amt));
			if($str_comp_name != '')
			{
			$str_comp_name = $str_comp_name."\n".$r5['comp_name'];
			}
			else
			{
			$str_comp_name = $r5['comp_name'];
			}
			
			
			if($str_eligible_amt != '')
			{
			$str_eligible_amt = $str_eligible_amt."\n".$eligible_amt;
			}
			else
			{
			$str_eligible_amt = $eligible_amt;
			}
		}
		$tot_deductions = $tot_deductions + $r4['paid_amt'];
		  
		}
}
	  
	  
	 /* $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'X%'");
	  while($r4 = mysql_fetch_assoc($sq4))
	  {
	    if($r4['eligible_amt'] > 0)
		{
	  	$pdf->SetWidths(array(95, 95));
      	srand(microtime()*1000000);	
      	$pdf->SetFont('Arial','',9);
		$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
		while($r5 = mysql_fetch_assoc($sq5))
		{
		
		 
		    $eligible_amt = number_format($r4['paid_amt'], 2); 
	  	//	$pdf->Row1(array($r5['comp_name'], $eligible_amt));
			if($str_comp_name_e != '')
			{
			$str_comp_name_e = $str_comp_name_e."\n".$r5['comp_name'];
			}
			else
			{
			$str_comp_name_e = $r5['comp_name'];
			}
			
			
			if($str_eligible_amt_e != '')
			{
			$str_eligible_amt_e = $str_eligible_amt_e."\n".$eligible_amt;
			}
			else
			{
			$str_eligible_amt_e = $eligible_amt;
			}
		}
		$tot_earnings = $tot_earnings + $r4['paid_amt'];
		}
		
		else
		{
		$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
		while($r5 = mysql_fetch_assoc($sq5))
		{
		    $eligible_amt = number_format($r4['paid_amt'], 2); 
	  	//	$pdf->Row1(array($r5['comp_name'], $eligible_amt));
			if($str_comp_name != '')
			{
			$str_comp_name = $str_comp_name."\n".$r5['comp_name'];
			}
			else
			{
			$str_comp_name = $r5['comp_name'];
			}
			
			
			if($str_eligible_amt != '')
			{
			$str_eligible_amt = $str_eligible_amt."\n".$eligible_amt;
			}
			else
			{
			$str_eligible_amt = $eligible_amt;
			}
		}
		$tot_deductions = $tot_deductions + $r4['paid_amt'];
		  
		}
	  }*/
	  
	  
	  $pdf->SetWidths(array(45, 50, 45, 50));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',9);
	  $pdf->Row(array("Earnings", "Amount", "Deductions", "Amount" ));
	  $pdf->SetFont('Arial','',9);
	  $pdf->Row(array($str_comp_name_e, $str_eligible_amt_e, $str_comp_name, $str_eligible_amt));
	  
	  
	  $pdf->SetWidths(array(45, 50, 45, 50));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',9);
	
	 // $tot_earn = number_format($tot_earnings, 2);
	//  $tot_deduct = number_format($tot_deductions, 2);
	$r1['gross_earnings'] = number_format($gross_earn, 2);
	
	$r1['gross_deduction'] = number_format($gross_deduct, 2);
	
	$in_words = number_to_words($netsal);
	
	  $pdf->Row1(array("Total Earnings", $r1['gross_earnings'], "Total Deductions", $r1['gross_deduction']));
	  
	  $pdf->SetWidths(array(190));
	    srand(microtime()*1000000);
	 // $net_pay = $tot_earnings - $tot_deductions;
	//  $net_pay = number_format($net_pay, 2);
	 $r1['net_salary'] = number_format($netsal, 2);
	 
	 
	  $pdf->Row1(array("Net Salary: ".$r1['net_salary']));
	  $pdf->Row1(array("Amount in Words: ".$in_words));
	  
	  
	  $pdf->SetWidths(array(190));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',6);
	  $pdf->Row(array("\n"."____________________________________"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t"."____________________________________"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t"."____________________________________"."\n".
"             Cashier"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".  "Account Officer".
	  
"\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".  "Employer"));
    
	$pdf->Ln(10);
	  }
	  $pdf->AddPage();
	  
	  }
	  $pdf->Output();
	 
?>