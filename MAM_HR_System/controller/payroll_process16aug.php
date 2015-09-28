<?php
include("../model/Model.php");

$tdate = date('Y/m/d');
$tot_deductions = 0;
$tot_earnings = 0;
$tot_f = 0;
$tot_x = 0;
$adj_amt = 0;
$status = $_POST['cmb_status'];

$pf_per = 12;
$esi_per = 12;

$pf_amt = 0;
$pt_amt = 0;
$esi_amt = 0;

$count_comp = 0;
$per_day_devisor_prev = '';
$negative_net_salary_count = 0;



$sq_attendance = mysql_query("select * from attendance where month_no='$_POST[cmb_month_no]'");
$num_rows = mysql_num_rows($sq_attendance);

$sq1 = mysql_query("select * from comp_details where type_of_sep=''");
$num_rows1 = mysql_num_rows($sq1);

$sql1 = mysql_query("select * from month_control where month_active='Y'");
$num_rw = mysql_num_rows($sql1);

if($num_rw > 1)
{
       echo "Two months can not be active at a time";
	   exit(0);
}


$sq3 = mysql_query("select * from month_control where month_no='$_POST[cmb_month_no]'");
while($r3 = mysql_fetch_assoc($sq3))
{

  if($r3['process_status'] == 'Complete')
  {
     echo "Payroll for selected month has already processed";
	 exit(0);
  }
  
  if($r3['month_active'] != 'Y')
  {
     echo "Month is Inactive";
	 exit(0);
  }
  
  $month_number = $r3['month_no'];
  
  $per_day_devisor = $r3['per_day_divisor'];
  
  $no_of_calendar_days = $r3['no_days'];
  
  $da_index = $r3['da_index'];
  
  $hra_index = $r3['hra_index'];
  
  $prev_month = date('Y-m', strtotime($month_number." -1 month"));
  
  $sq_prev_month = mysql_query("select * from month_control where month_no='$prev_month'");
  while($r_prev_month = mysql_fetch_assoc($sq_prev_month))
  {
     $per_day_devisor_prev = $r_prev_month['per_day_divisor'];
  }
}


if($per_day_devisor_prev == '')
{
// echo "Please Enter the details for previous month";
// exit(0);
 $per_day_devisor_prev = 0;
}
 
if($num_rows != $num_rows1)
{
  echo "Attendance for all employees not filled";
  exit(0);
}
else
{
 $q1 = mysql_query("delete from payroll_hdr where month_no='$month_number'");
 $q2 = mysql_query("delete from payroll_details where month_no='$month_number'");

  while($r = mysql_fetch_assoc($sq_attendance))
  {
  
    $sq_empl_master = mysql_query("select * from empl_master where employee_no='$r[employee_no]'");
	while($r_empl_master = mysql_fetch_assoc($sq_empl_master))
	{
	  $empl_name = $r_empl_master['first_name']." ".$r_empl_master['middle_name']." ".$r_empl_master['last_name'];
	}
    $sq2 = mysql_query("select * from emp_comp_master_lines where employee_no='$r[employee_no]' and comp_code LIKE 'E%'");
	while($r1 = mysql_fetch_assoc($sq2))
	{
	///////////  For Adjustment days, leave encashment, OT hrs use earning code E0001  /////////////////
	
	////////// consider E0001 code fixed for Basic Pay, E0002 code fixed for Grade Pay /////////////////
	if($r1['comp_code'] == 'E0001')
	{
	/* $sq_comp = mysql_query("select * from comp_head where comp_code='$r1[comp_code]'");
	 while($r_comp = mysql_fetch_assoc($sq_comp))
	   {
	     if($r_comp['pf_compute'] == 'Y')
		 {
		   $pf_amt = $pf_amt + $r1['amount'];
		 }
	  }*/
	  
	  $grade_pay = 0;

	  $sq_grade_pay = mysql_query("select * from emp_comp_master_lines where employee_no='$r[employee_no]' and comp_code='E0002'");
	  while($r_grade_pay = mysql_fetch_assoc($sq_grade_pay))
	  {
	    $grade_pay = $r_grade_pay['amount'];
	  }
	
	   $amt = $r1['amount'] + $grade_pay;
	   
	   
	   $amt = $r1['amount'];
	   
	   $pay_days = $r['pay_days'] + $r['holidays'] + $r['paid_leaves'];

	   $amt = ($amt * $pay_days) / $no_of_calendar_days;
	   $total_pay_days = $amt;
	   
	   $total_pay_days = round($total_pay_days, 2);
	   	   
	   $pay_days = $r['pay_days'] + $r['holidays'] + $r['paid_leaves'];

	   $amt = ($amt * $pay_days) / $no_of_calendar_days;
	   $total_pay_days1 = $amt;
	   
	   $total_pay_days1 = round($total_pay_days1, 2);
	   
	   //////// code for calculating DA //////////////////
	   
	   $da = ($r1['amount'] + $grade_pay) * $da_index/100;
	   
	     $sq4 = mysql_query("insert into payroll_details values('$r1[employee_no]', '$month_number', 'E0003', '$da', '$da', '$da', '$da', '$tdate', '$_SESSION[txt_login_name]', '', '')");
		 
		 $tot_earnings = $tot_earnings + $da;
		 
	   //////// End of DA calculation ////////////
	   
	   ///////////// PF amount ////////////////
	   $pf_amt = $r1['amount'] + $grade_pay + $da;
	    //////// code for calculating HRA //////////////////
		
		
		
	   
	   $hra = ($r1['amount'] + $grade_pay) * $hra_index/100;
	   
	   $sq4 = mysql_query("insert into payroll_details values('$r1[employee_no]', '$month_number', 'E0004', '$hra', '$hra', '$hra', '$hra', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	   
	   $tot_earnings = $tot_earnings + $hra;
		 
	   //////// End of HRA calculation ////////////
	   
	   $adj_days = $r['adj_days'];
	   
	   
	   $leave_encashment = $r['leave_encash_days'];
	   
	   $ot_hrs = $r['ot_hrs'];
	   
	   $amt_for_adjusted_days = 0;
	   
	   if($per_day_devisor_prev != '' || $per_day_devisor_prev != 0)
	   {
	   $amt_for_adjusted_days = ($amt * $adj_days) / $per_day_devisor_prev;	
	   }   
	   
	   $amt_for_leave_encash_days = 0;
	   $leave_encash_basic_amt = $r1['amount'] + $grade_pay + $da;
	   if($per_day_devisor != '' || $per_day_devisor!= 0)
	   {
	  // $amt_for_leave_encash_days = ($amt * $leave_encashment) / $per_day_devisor;
	     $amt_for_leave_encash_days = ($leave_encash_basic_amt * $leave_encashment) / $per_day_devisor;
	   }	  
	    
		$amt_for_ot_days = 0;
	   $ot_days = $ot_hrs / 24;	
	    
		if($per_day_devisor != '' || $per_day_devisor!= 0)
	   {  
	   $amt_for_ot_days = ($amt * $ot_days) / $per_day_devisor;
	   }
	   
	   $total_pay_days = $amt_for_adjusted_days + $amt_for_leave_encash_days + $amt_for_ot_days;	
	      
	   $total_pay_days = round($total_pay_days,2);
	   
	   $adj_amt = 0;
	   $sq_batch = mysql_query("select * from batch_hdr where month_no='$month_number'");
	   while($r_batch = mysql_fetch_assoc($sq_batch))
	   {
	   		$w1 = mysql_query("select * from batch_dtls where employee_no='$r[employee_no]' and comp_code='$r1[comp_code]' and batch_no='$r_batch[batch_no]'");
	   		while($rw = mysql_fetch_assoc($w1))
	  		 {
	      		$adj_amt = $rw['adj_amount'];
	   		 }
	   }
	   
	   $paid_amt = $adj_amt + $total_pay_days + $amt;
	   
	   

	   
	   $sq4 = mysql_query("insert into payroll_details values('$r1[employee_no]', '$month_number', '$r1[comp_code]', '$amt', '$total_pay_days', '$total_pay_days', '$paid_amt', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	   
	   $tot_earnings = $tot_earnings + $paid_amt;
	  }
	  ///////////  For Grade pay use earning code E0002 /////////////////////////
	/* else if($r1['comp_code'] == 'E0002')
	 {
	       
	    
	
	 }*/
	  
	  ///////////  For Earning codes other than E0001 and E0002 //////////////////////////
	  else 
	  {
	     if($r1['comp_code'] != 'E0002' && $r1['comp_code'] != 'E0003' && $r1['comp_code'] != 'E0004')
		 {
	 	$sq_comp = mysql_query("select * from comp_head where comp_code='$r1[comp_code]'");
		while($r_comp = mysql_fetch_assoc($sq_comp))
	   {
	     $num_r_sq_payroll_chk = 0;
	     if($r_comp['pay_when'] == 'A')
	    {
	      $current_month_year = substr($month_number, 0, 4);
	      $sq_payroll_chk = mysql_query("select * from payroll_details where employee_no='$r[employee_no]' and comp_code='$r1[comp_code]' and substring(month_no, length(month_no) - 6, 4)='$current_month_year'");
		 // echo $current_month_year;
		  $num_r_sq_payroll_chk = mysql_num_rows($sq_payroll_chk);
		 // echo $num_r_sq_payroll_chk;
	    }
	   
	  
	  }
	   
	  if($num_r_sq_payroll_chk == 0)
	   {
	   $amt = $r1['amount'];
	   $pay_days = $r['pay_days'] + $r['holidays'] + $r['paid_leaves'];

	   $amt_for_pay_days = ($amt * $pay_days) / $no_of_calendar_days;
	   $total_pay_days = $amt_for_pay_days;
	   
	   $total_pay_days = round($total_pay_days, 2);
	   
	   $adj_amt = 0;
	   $sq_batch = mysql_query("select * from batch_hdr where month_no='$month_number'");
	   while($r_batch = mysql_fetch_assoc($sq_batch))
	   {
	   		$w1 = mysql_query("select * from batch_dtls where employee_no='$r[employee_no]' and comp_code='$r1[comp_code]' and batch_no='$r_batch[batch_no]'");
	   		while($rw = mysql_fetch_assoc($w1))
	   		{
	      		$adj_amt = $rw['adj_amount'];
	  	    }
	   }
	  
	   $paid_amt = $adj_amt + $total_pay_days;
	   
	   $sq4 = mysql_query("insert into payroll_details values('$r1[employee_no]', '$month_number', '$r1[comp_code]', '$r1[amount]', '$total_pay_days', '$adj_amt', '$paid_amt', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	   
	   $tot_earnings = $tot_earnings + $paid_amt;
	  
	  } 
	 }
	 }
	}
	
	
	//echo $tot_earnings;
	//exit(0);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
/////////////  For deductions ////////////

   
	$sq2 = mysql_query("select * from emp_comp_master_lines where employee_no='$r[employee_no]' and comp_code LIKE 'D%'");
	while($r1 = mysql_fetch_assoc($sq2))
	{
	 $sq_comp = mysql_query("select * from comp_head where comp_code='$r1[comp_code]'");
	 while($r_comp = mysql_fetch_assoc($sq_comp))
	   {
	     $num_r_sq_payroll_chk = 0;
	      if($r_comp['pay_when'] == 'A')
	    {
	      $current_month_year = substr($month_number, 0, 4);
	      $sq_payroll_chk = mysql_query("select * from payroll_details where employee_no='$r[employee_no]' and comp_code='$r1[comp_code]' and substring(month_no, length(month_no) - 6, 4)='$current_month_year'");
		 // echo $current_month_year;
		  $num_r_sq_payroll_chk = mysql_num_rows($sq_payroll_chk);
		 // echo $num_r_sq_payroll_chk;
	    }
	   
	  /* if($num_r_sq_payroll_chk == 0)
	 {
	     if($r_comp['pf_compute'] == 'Y')
		 {
		   $pf_amt = $pf_amt + $r1['amount'];
		 }
		 if($r_comp['pt_compute'] == 'Y')
		 {
		   $pt_amt = $pt_amt + $r1['amount'];
		 }
		 if($r_comp['esi_compute'] == 'Y')
		 {
		   $esi_amt = $esi_amt + $r1['amount'];
		 }
	   }*/
	   }
	
	if($num_r_sq_payroll_chk == 0)
	   {
	   $amt = $r1['amount'];
	   $pay_days = $r['pay_days'] + $r['holidays'] + $r['paid_leaves'];
	   
	   $amt_for_pay_days = $amt;
	   $total_pay_days = $amt_for_pay_days;
	   
	   
	   $adj_amt = 0;
	  
	   $paid_amt = $total_pay_days;
	   
	   $sq4 = mysql_query("insert into payroll_details values('$r1[employee_no]', '$month_number', '$r1[comp_code]', '$r1[amount]', '$amt_for_pay_days', '$adj_amt','$paid_amt', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	   
	   
	   $tot_deductions = $tot_deductions + $paid_amt;
	  }
  }
  
  
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////  For compensation codes starting with F i.e. Fixed codes //////////	
	
	$sq2 = mysql_query("select * from emp_comp_master_lines where employee_no='$r[employee_no]' and comp_code LIKE 'F%'");
	while($r1 = mysql_fetch_assoc($sq2))
	{
	$sq_comp = mysql_query("select * from comp_head where comp_code='$r1[comp_code]'");
	while($r_comp = mysql_fetch_assoc($sq_comp))
	{
		  $num_r_sq_payroll_chk = 0;
	      if($r_comp['pay_when'] == 'A')
	  	  {
	      $current_month_year = substr($month_number, 0, 4);
	      $sq_payroll_chk = mysql_query("select * from payroll_details where employee_no='$r[employee_no]' and comp_code='$r1[comp_code]' and substring(month_no, length(month_no) - 6, 4)='$current_month_year'");
		 // echo $current_month_year;
		  $num_r_sq_payroll_chk = mysql_num_rows($sq_payroll_chk);
		 // echo $num_r_sq_payroll_chk;
	    }
	   
	
	   }
	
	
	if($num_r_sq_payroll_chk == 0)
	   {
	   $amt = $r1['amount'];
	   $total_pay_days = $amt;
	   
	   $adj_amt = 0;
	   $sq_batch = mysql_query("select * from batch_hdr where month_no='$month_number'");
	   while($r_batch = mysql_fetch_assoc($sq_batch))
	   {
	   $w1 = mysql_query("select * from batch_dtls where employee_no='$r[employee_no]' and comp_code='$r1[comp_code]' and batch_no='$r_batch[batch_no]'");
	   while($rw = mysql_fetch_assoc($w1))
	   {
	      $adj_amt = $rw['adj_amount'];
	   }
	   }
	   
	   $paid_amt = $adj_amt + $total_pay_days;
	   
	   $sq4 = mysql_query("insert into payroll_details values('$r1[employee_no]', '$month_number', '$r1[comp_code]', '$r1[amount]', '$total_pay_days', '$adj_amt', '$paid_amt', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	   
	   $tot_f = $tot_f + $paid_amt;
	   }
	}
	
	if($tot_f < 0)
	{
	  $tot_deductions = $tot_deductions - $tot_f;
	}
	
	if($tot_f > 0)
	{
	  $tot_earnings = $tot_earnings + $tot_f;
	}
	
	//echo "\t\t\t-".$tot_deductions;
	//echo "\t\t\t-".$tot_earnings;
	

//////////////////////////////// End of F code ////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////// For Recovery ///////////


	$sq_recov = mysql_query("select * from recovery where employee_no='$r[employee_no]' and recov_status='Open'");
	while($r_recov = mysql_fetch_assoc($sq_recov))
	{
	   $amt = $r_recov['inst_amount'];       	  
	   
	   $sq_payroll_recovery_f = mysql_query("select * from payroll_details where month_no='$month_number' and comp_code='$r_recov[comp_code]' and employee_no='$r_recov[employee_no]'");
	   
	   if($r_payroll_recovery_f = mysql_fetch_assoc($sq_payroll_recovery_f))
	   {     
			    $updated_paid_amt = $r_payroll_recovery_f['paid_amt'] - $amt;
			    $sq4 = mysql_query("update payroll_details set paid_amt='$updated_paid_amt' where month_no='$month_number' and comp_code='$r_recov[comp_code]' and employee_no='$r_recov[employee_no]'");
				
				if($r_payroll_recovery_f['eligible_amt'] > 0)
				{
				   $tot_earnings = $tot_earnings - $amt;
				}
	   }
	   else
	   {
 			 $sq4 = mysql_query("insert into payroll_details values('$r_recov[employee_no]', '$month_number', '$r_recov[comp_code]', '-$amt', '', '', '-$amt', '$tdate', '$_SESSION[txt_login_name]', '', '')");
  	   }
	   
	   $tot_deductions = $tot_deductions + $amt;
	   
	   $balance_amt = $r_recov['balance_amount'] + $amt;

	   if($balance_amt > $r_recov['total_amount'])
	   {
	     echo "Balance amount should not be greater than Total Recovery Amount for ".$empl_name;
		 exit(0);
	   }
	   
//////////////////////////// If status is complete update recovery balance amount ///////////////////////////////////////
	   if($status == 'complete')
	   {
		  if($balance_amt == $r_recov['inst_amount'])
		  {
		    $sq_update_recov = mysql_query("update recovery set balance_amount='$balance_amt', recov_status='Close' where employee_no='$r_recov[employee_no]' and recov_title='$r_recov[recov_title]'");
		  }
		  else
		  {
		    $sq_update_recov = mysql_query("update recovery set balance_amount='$balance_amt' where employee_no='$r_recov[employee_no]' and recov_title='$r_recov[recov_title]'");
		  }
	   }
////////////////////// End of updating recovery balance amount ///////////////////////////////////////////////
	}
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////// /////////////////////	
	
$month_feb = date('m', strtotime($month_number));
$pt_amt = $tot_earnings;
	
	$tot_pf  = $pf_per/100 * $pf_amt;
	
	if($tot_pf > 780)
	{
	  $tot_pf = 780;
	}
	
		if($month_feb == '02')
		{
		    $tot_pt = 300;
		}
		else if($pt_amt >= 5001 && $pt_amt <= 10000)
		{
	   		$tot_pt = 175;
		}
		else if($pt_amt >= 10001)
		{
	   		$tot_pt = 200;
		}
		else
		{
		   $tot_pt = 0;
		}
	
	
	
	
	$tot_esi = $esi_per/100 * $esi_amt;
	
	$sq_pf = mysql_query("insert into payroll_details values('$r[employee_no]', '$month_number', 'D0001', '', '', '', '$tot_pf', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	
	$sq_pt = mysql_query("insert into payroll_details values('$r[employee_no]', '$month_number', 'D0002', '', '', '', '$tot_pt', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	
	//$sq_pf = mysql_query("insert into payroll_details values('$r[employee_no]', '$month_number', 'D0003', '', '', '', '$tot_esi', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	
	$tot_deductions = $tot_deductions + $tot_pf + $tot_pt + $tot_esi;
	
	$tot_earnings = round($tot_earnings, 2);
	$tot_deductions = round($tot_deductions, 2);
	
	$net_salary = ($tot_earnings - $tot_deductions);
	
	$net_salary = round($net_salary);
	
	
	if($net_salary < 0)
	{
	  $negative_net_salary_count = $negative_net_salary_count + 1;
	}
	$sq6 = mysql_query("select * from comp_details where employee_no='$r[employee_no]'");
	while($r6 = mysql_fetch_assoc($sq6))
	{
	   $bank_branch_name = $r6['bank_branch_name'];
	   $acc_no = $r6['bank_account_no'];
	}
	
	
	$sq5 = mysql_query("insert into payroll_hdr values('$r[employee_no]', '$month_number', '', '$bank_branch_name', '$acc_no', '$r[pay_days]', '$tot_earnings', '$tot_deductions', '$net_salary', '$tdate', '$_SESSION[txt_login_name]', '', '')");
	
	$tot_deductions = 0;
	$tot_earnings = 0;
	$tot_f = 0;
	$tot_x = 0;
	$pf_amt = 0;
	$pt_amt = 0;
	$esi_amt = 0;
  }
}




if($status == 'complete')
{

  if($negative_net_salary_count > 0)
  {
    echo "Can not complete the process, Some employees are having negative salary";
	exit(0);
  }
  else
  {
   $sq_month_control = mysql_query("update month_control set process_status='Complete' where month_no='$month_number'");
  }
}

if($sq5)
{
  echo "Payroll Processed Successfully !!!";
}
?>
