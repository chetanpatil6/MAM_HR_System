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



$pdf->SetLeftMargin(18.0);

$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];
$db1 = $_POST['txt_db'];
$original_basic = 0;

mysql_connect("$servername", "$usernm", "$pas");
mysql_select_db("$db1");

							  
//$emp_no = $_POST['txt_emple_no'];
$month_no = $_POST['cmb_month_no1'];

$month_changed_format= date('F Y', strtotime($month_no));
$compnay_name = '';
//$sq = mysql_query("select * from payroll_hdr where employee_no='$emp_no' and month_no='$month_no'");
$sq = mysql_query("select * from payroll_hdr, empl_master, comp_details where empl_master.employee_no=payroll_hdr.employee_no and comp_details.employee_no=payroll_hdr.employee_no and payroll_hdr.month_no='$month_no' order by empl_master.emp_code");
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
$pdf->Cell(190,6,'Pay Slip',0,0,'C');
$pdf->Cell(1,6,'Month: '.$month_changed_format,0,1,'R');




//$pdf->Ln(10);


  $sq1 = mysql_query("select * from empl_master where employee_no='$emp_no'");
  while($r = mysql_fetch_assoc($sq1))
  {
  
  $pdf->SetWidths(array(190));
  srand(microtime()*1000000);	
  
  //$pdf->Row(array("Employee Name: ".$r['first_name']." ".$r['middle_name']." ".$r['last_name'].""));
 
   $sq2 = mysql_query("select * from comp_details where employee_no='$emp_no'");
  while($r2 = mysql_fetch_assoc($sq2))
  {
  $bank_acc_no = $r2['bank_account_no'];
  $pf_uan = $r2['pf_uan'];
  //$bank_branch = $r2['bank_branch_name'];
  
  if($r2['mode_of_payment'] == 'Cash')
  {
     $bank_branch = "Cash";
  }
  else
  {
    $bank_branch = $r2['bank_branch_name'];
  }
  
  $sq3 = mysql_query("select * from family_info  where employee_no='$emp_no'");
  while($r3 = mysql_fetch_assoc($sq3))
  {
  
 /* $sq_payroll_details_e1 = mysql_query("select paid_amt from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code='E0001'");
  while($r_payroll_details_e1 = mysql_fetch_assoc($sq_payroll_details_e1)) 
  {
     $original_basic = intval($r_payroll_details_e1['paid_amt']);
  }
  
  $sq_payroll_details_e2 = mysql_query("select paid_amt from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code='E0002'");
  while($r_payroll_details_e2 = mysql_fetch_assoc($sq_payroll_details_e2)) 
  {
     $original_basic = $original_basic + intval($r_payroll_details_e2['paid_amt']);
  }*/
  
  $sq_comp = mysql_query("select amount from emp_comp_master_lines where employee_no='$emp_no' and comp_code='E0001'");
  while($r_comp = mysql_fetch_assoc($sq_comp))
  {
      $original_basic = round($r_comp['amount']);
  }
  
  $sq_comp_1 = mysql_query("select amount from emp_comp_master_lines where employee_no='$emp_no' and comp_code='E0002'");
  while($r_comp_1 = mysql_fetch_assoc($sq_comp_1))
  {
      $original_basic = $original_basic + round($r_comp_1['amount']);
  }
  
  $sq_month_control = mysql_query("select no_days from month_control where month_no='$month_no'");
  while($r_month = mysql_fetch_assoc($sq_month_control))
  {
    $no_days = $r_month['no_days'];
  }
  
  if(substr($r2['pf_number'], 0, 2) == 'G1')
  {
  $r2['pf_number'] = "MH-14718/".$r2['pf_number'];
  }
  else if(substr($r2['pf_number'], 0, 2) == 'G2')
  {
    $r2['pf_number'] = "MH-26567/".$r2['pf_number'];
  }
  
  
 	  $pdf->SetWidths(array(95,95));
      srand(microtime()*1000000);	
      $pdf->SetFont('Arial','B',10);
	  
	  //$pdf->Row(array("Employee Name: ".$r['first_name']." ".$r['middle_name']." ".$r['last_name']."","P.F. Universal Account No : ".$pf_uan));
	  $pdf->Row(array(" ".$r['first_name']." ".$r['middle_name']." ".$r['last_name']."","P.F. Universal Account No : ".$pf_uan));
	  $pdf->Row(array("Employee Code                   : ".$r['emp_code']."\n"."Designation                         : ".$r2['designation']."\n"."Original Basic+Grade Pay : "." Rs. ".number_format($original_basic, 0)." /-",
	 "Bank Account/Cheque No : ".$r2['bank_account_no']."\n"."PF Account No.                  : ".$r2['pf_number']."\n"."No. of Days in Month         : ".$no_days));
	 
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
	  
	  	$pdf->Row(array("Working Days: ".$r_attendance['pay_days'], "Holidays: ".$r_attendance['holidays'], "Paid Leaves: ". $r_attendance['paid_leaves'], "Unpaid Leaves: ".$r_attendance['unpaid_leaves']." + ".$r_attendance['suspention_days']));
	  
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
		//	$eligible_amt = number_format(intval($r2['paid_amt']), 0); 
			$eligible_amt = number_format(round($r2['paid_amt']), 0); 
	  	//	$pdf->Row1(array($r3['comp_name'], $eligible_amt));
			if($str_comp_name_e != '')
			{
				//$str_comp_name_e = $str_comp_name_e."\n".$r3['comp_name'];
				if($r2['comp_code']=='E0006')
				{
				 $no_days='';
				 $res_leave_enchashment = mysql_fetch_assoc(mysql_query("select leave_encash_days from attendance where employee_no='$emp_no' and month_no='$month_no'"));
				 $no_days=$res_leave_enchashment['leave_encash_days'];				 
				 $str_comp_name_e = $str_comp_name_e."\n".$r3['comp_name']."($no_days Days)";
				}
				else
				{
				 $str_comp_name_e = $str_comp_name_e."\n".$r3['comp_name'];
				}
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
		    //$eligible_amt = number_format(intval($r4['paid_amt']), 2); 
		    $eligible_amt = number_format(round($r4['paid_amt']), 0); 
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
	    /*if($r4['eligible_amt'] >= 0)
		{
	  	$pdf->SetWidths(array(95, 95));
      	srand(microtime()*1000000);	
      	$pdf->SetFont('Arial','',9);
		$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
		while($r5 = mysql_fetch_assoc($sq5))
		{
		
		    $eligible_amt = number_format(round($r4['paid_amt']), 0); 
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
		
		else*/
		{
		$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
		while($r5 = mysql_fetch_assoc($sq5))
		{
		    $eligible_amt = number_format(round($r4['paid_amt']), 0); 
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
				$eligible_amt = str_replace('-','',$eligible_amt);
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
	  $pdf->Row2(array("Earnings", "Amount", "Deductions", "Amount"));
	  $pdf->SetFont('Arial','B',9);
	  $pdf->Row2(array($str_comp_name_e, $str_eligible_amt_e, $str_comp_name, $str_eligible_amt));
	  
	  
	  $pdf->SetWidths(array(45, 50, 45, 50));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',9);
	
	 // $tot_earn = number_format($tot_earnings, 2);
	//  $tot_deduct = number_format($tot_deductions, 2);
	$r1['gross_earnings'] = number_format(round($gross_earn), 0);
	
	$r1['gross_deduction'] = number_format(round($gross_deduct), 0);
	if($r1['net_salary'] > 0)
	{
		$in_words = number_to_words($netsal);
	}
	
	  $pdf->Row2(array("Total Earnings", "Rs. ".$r1['gross_earnings']." /-", "Total Deductions", "Rs. ".$r1['gross_deduction']." /-"));
	  
	  $pdf->SetWidths(array(190));
	    srand(microtime()*1000000);
	 // $net_pay = $tot_earnings - $tot_deductions;
	//  $net_pay = number_format($net_pay, 2);
	 $r1['net_salary'] = number_format($netsal, 0);
	 
	 
	  $pdf->Row1(array("Net Salary: "." Rs. ".$r1['net_salary']." /-"));
	  if($r1['net_salary'] > 0)
	  {
	  	//$pdf->Row1(array("Received Rs. (In Words)".$in_words." Only,  \nby ".$bank_branch."'s  S/B A/C. No.: ".$bank_acc_no."."));
		$pdf->Row1(array("Received Rs. (In Words) ".$in_words." Only, by ".$bank_branch."."));
	  }
	  
	  $pdf->SetWidths(array(190));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',6);
	 // $pdf->Row(array("\n"."____________________________________"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t"."____________________________________"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t"."____________________________________"."\n".
//"             Cashier"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".  "Account Officer".
	  
//"\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".  "Employer"));
   $pdf->SetWidths(array(50, 50, 50,40));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',6);
	//  $pdf->SetFont('Arial','C',6);
	  
	//  $pdf->Row(array("\nCashier", "\nAccount Officer", "\nEmployer"));
	// $pdf->Row(array("\n".$signature1, "\n".$signature2, "\n".$signature3,"\n Date: "));
  $pdf->Row(array("$signature1", "$signature2", "$signature3","Date: "));
	  
	  



	 
	//  $pdf->SetFont('Arial','C',6);
	  
	  //$pdf->Row(array("Date: "));
	  

	  /*$pdf->SetWidths(array(190));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',9);
	  $pdf->Row(array("Balanace Leanes"));*/
	   $pdf->SetWidths(array(50,25,25,25,25,20,20));
      srand(microtime()*1000000);
	  $pdf->SetFont('Arial','B',9);
	 
	    $code_array = array();
		$onhand_array = array();
		$sq_balanced_leaves = mysql_query("select leave_short_code,leavedays_onhand from balanced_leaves where employee_no='$emp_no'");			
		while($res_balanced_leaves = mysql_fetch_assoc($sq_balanced_leaves))
		{
			//$pdf->Row(array(strtoupper($res_balanced_leaves['leave_short_code'])." : ".$res_balanced_leaves['leavedays_onhand']));	
			array_push($code_array,	$res_balanced_leaves['leave_short_code']);
			array_push($onhand_array,	$res_balanced_leaves['leavedays_onhand']);				
		}
	  
	   
	  if(mysql_num_rows($sq_balanced_leaves)>0)
	  $pdf->Row(array("Balanace Leaves",strtoupper($code_array[0])." : ".$onhand_array[0],strtoupper($code_array[1])." : ".$onhand_array[1],strtoupper($code_array[2])." : ".$onhand_array[2],strtoupper($code_array[3])." : ".$onhand_array[3],strtoupper($code_array[4])." : ".$onhand_array[4],strtoupper($code_array[5])." : ".$onhand_array[5]));	
    
	$pdf->Ln(10);
	  }
	  $pdf->AddPage();
	  
	  }

	  $pdf->Output();
	  $dir='../PaySlips/';
	  date_default_timezone_set('Asia/Calcutta');
	  
	  $filename = 'PaySplit_'.$month_no.'_'.$compnay_name;
	  $filename = $filename."_".date('Y-m-d')."_".time().".pdf";
	
	  $pdf ->Output($dir.$filename);







	 
?>
