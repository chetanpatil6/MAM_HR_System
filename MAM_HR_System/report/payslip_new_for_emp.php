<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Payslip</title>


	<link rel="stylesheet" href="tabs.css" type="text/css" media="screen, projection"/>

	<script type="text/javascript" src="tab_js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="tab_js/jquery-ui-1.7.custom.min.js"></script>
    <script type="text/javascript">
		$(function() {

			var $tabs = $('#tabs').tabs();

	
			$(".ui-tabs-panel").each(function(i){
	
			  var totalSize = $(".ui-tabs-panel").size() - 1;
	
			  if (i != totalSize) {
			      next = i + 2;
		   		  $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next  &#187;</a>");
			  }
	  
			  if (i != 0) {
			      prev = i;
		   		  $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev </a>");
			  }
   		
			});
	
			$('.next-tab, .prev-tab').click(function() {
			      
				   
		           	$tabs.tabs('select', $(this).attr("rel"));
		           	return false;
				
				  
		       });
		});

    </script>
	
</head>

<body  bgcolor="#FBEAD0">
<div id="container">
		<div id="content" style="padding-top:-1px;">
	<div id="page-wrap">
<?php
if($_POST['cmb_emp_name']=='All')
		{
				$servername = $_POST['txt_s'];
				$usernm = $_POST['txt_u'];
				$pas = $_POST['txt_p'];
				$db1 = $_POST['txt_db'];
				
				
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
				
				
				
				
				mysql_connect("$servername", "$usernm", "$pas");
				mysql_select_db("$db1");
				
				
				$month_no = $_POST['cmb_month_no1'];
				
				?>		
						<div id="tabs">
						<ul>
						<?php
							$s = 1;
							$sq = mysql_query("select * from payroll_hdr where month_no='$month_no'");
							while($r1 = mysql_fetch_assoc($sq))
							{
						?>
								<li><a href="#fragment-<?php echo $s; ?>"></a></li>
							<?php
							  $s = $s + 1;		
							}
					?>
			   </ul>
		
		
		
		<?php
		$i = 1;
		$sq = mysql_query("select * from payroll_hdr where month_no='$month_no'");
		while($r1 = mysql_fetch_assoc($sq))
		{
		
		$tot_earnings = 0;
		$tot_deductions = 0;
		
		
			$str_comp_name = '';
			$str_eligible_amt = '';
			$str_comp_name_e = '';
			$str_eligible_amt_e = '';  
		?>
		<?php 
		$sq_name = mysql_query("select * from company_info");
		while($row_info = mysql_fetch_assoc($sq_name))
		{
		$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
		?>
		<div id="fragment-<?php echo $i; ?>" class="ui-tabs-panel ui-tabs-hide">
		<table border="1" width="800">
		<tr><td>
		<table class="listing" width="810" border="1" bgcolor="#FECCA3">
		<tr><td><center><b><?php echo $row_info['name'] ?><br /><font size="-1"><?php echo $row_info['address1'].$row_info['address2'].$row_info['address3'].$row_info['address4']?></font></b></center></td></tr>
		
		
		<tr><td><center><b>Pay Slip for month <?php echo $month_no; ?></b></center></td></tr>
		</table>
		<?php } ?>
		<table class="listing" width="800">
		<?php
		  $original_basic  = 0;
		  $emp_no = $r1['employee_no'];
		  $sq1 = mysql_query("select * from empl_master where employee_no='$emp_no'");
		  while($r = mysql_fetch_assoc($sq1))
		  {
		  $sq2 = mysql_query("select * from comp_details where employee_no='$emp_no'");
		  while($r2 = mysql_fetch_assoc($sq2))
		  {
		  $bank_acc_no = $r2['bank_account_no'];
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
		  
		  /*$sq_payroll_details_e1 = mysql_query("select paid_amt from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code='E0001'");
		  while($r_payroll_details_e1 = mysql_fetch_assoc($sq_payroll_details_e1)) 
		  {
			 $original_basic = round($r_payroll_details_e1['paid_amt']);
		  }
		  
		  $sq_payroll_details_e2 = mysql_query("select paid_amt from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code='E0002'");
		  while($r_payroll_details_e2 = mysql_fetch_assoc($sq_payroll_details_e2)) 
		  {
			 $original_basic = $original_basic + round($r_payroll_details_e2['paid_amt']);
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
		  
		  ?>
		  
		<tr><td width="120"><b>Employee Code </b></td><td width="5"><b>:</b></td><td width="200"><?php echo $r['emp_code']; ?></td><td width="150"><b>Employee Name </b> </td><td width="5"><b>:</b></td><td width="200"><?php echo $r['first_name']." ".$r['middle_name']." ".$r['last_name']; ?></td></tr><br />
		
		<tr><td><b>Designation</b> </td><td width="5"><b>:</b></td><td><?php echo $r2['designation']; ?></td><td><b>Date of Joining  </b> </td><td width="9"><b>:</b></td><td><?php echo $r2['joining_date']; ?></td></tr>
		
		<tr><td><b>Bank Account No</b> </td><td width="9"><b>:</b></td><td><?php echo $r1['bank_account_no']; ?></td><td><b>PF Account No</b> </td><td width="9"><b>:</b></td><td><?php echo $r2['pf_number']; ?></td></tr>
		
		<tr><td><b>Original Basic+Grade Pay</b> </td><td width="9"><b>:</b></td><td><?php echo "Rs. ".number_format($original_basic, 0)." /-"; ?></td><td><b>No. of days in month </b> </td><td width="9"><b>:</b></td><td><?php echo $no_days; ?></td></tr>
		
		<tr></tr>
		  <?php 
		   }
		   }
		   }
			?>
			  
			  </table>
			  <br />
			  <br />
			   <table class="listing" width="800">
			   <?php
				$sq_attendance = mysql_query("select * from attendance where employee_no='$emp_no' and month_no='$month_no'");
				while($r_attendance = mysql_fetch_assoc($sq_attendance))
				{
			   ?>
			  <tr><td><b>Worked Days: <?php echo $r_attendance['pay_days']; ?></b></td>
				  <td><b>Holidays: <?php echo $r_attendance['holidays']; ?></b></td>
				  <td><b>Paid Leaves: <?php echo $r_attendance['paid_leaves']; ?></b></td>
				  <td><b>Unpaid Leaves: <?php echo $r_attendance['unpaid_leaves']; ?></b></td>
			  </tr>
			   <?php
				}
			   ?>
			  
			  </table>
			  <br />
			  <br />
			  <table class="listing" width="810" border="1">
			  <tr><td width="200"><b>Earnings</b></td><!--<td><b>Eligible Amount</b></td><td><b>Computed Amount</b></td><td><b>Adjusted Amount</b></td> --><td style="text-align:right" width="205"><b>Amount</b></td><td width="200"><b>Deductions</b></td><td style="text-align:right" width="200"><b>Amount</b></td></tr>
			  </table>
			  <table class="listing" width="800" border="1">
			<!--  <tr><td width="400"><b><center>Earnings</center></b></td><td><b>Eligible Amount</b></td><td><b>Computed Amount</b></td><td><b>Adjusted Amount</b></td> <td style="text-align:right" width="400" colspan="3"><b>Amount</b></td><td width="200"><b><center>Deductions</center></b></td><td style="text-align:right" colspan="3"><b>Amount</b></td></tr> -->
			  <tr>
			  <td colspan="5">
						<table class="listing" width="400">
						
						<?php
		$sq2 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'E%'");
			  while($r2 = mysql_fetch_assoc($sq2))
			  {
			  
				$sq3 = mysql_query("select * from comp_head where comp_code='$r2[comp_code]'");
				while($r3 = mysql_fetch_assoc($sq3))
				{
					$eligible_amt = number_format($r2['eligible_amt'], 0); 
					$computed_amt = number_format($r2['computed_amt'], 0); 
					$adj_amt = number_format($r2['adj_amt'], 0); 
					$paid_amt = number_format(intval($r2['paid_amt']), 0); 
					
					?>
					 <tr>
							<td><?php echo $r3['comp_name']; ?></td>
							<!--<td style="text-align:right"><?php echo $eligible_amt; ?></td>
							<td width="110" style="text-align:right"><?php echo $computed_amt; ?></td>
							<td width="110" style="text-align:right"><?php echo $adj_amt; ?></td> -->
							<td width="200" style="text-align:right"><?php echo $paid_amt; ?></td>
					</tr>
					
						
						<?php
				}
				$tot_earnings = $tot_earnings + $r2['paid_amt'];
			  }
			  
			 ///////////////////////
			 //////////////////////
			 //////////////////////
			 //////////////////////
			  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'F%'");
			  while($r4 = mysql_fetch_assoc($sq4))
			  {
			 
				/*if($r4['eligible_amt'] >= 0)
				{
				
				$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
				while($r5 = mysql_fetch_assoc($sq5))
				{
					
					$eligible_amt = number_format(round($r4['paid_amt']), 0); 
				//	$pdf->Row1(array($r5['comp_name'], $eligible_amt));
					if($str_comp_name_e != '')
					{
					$str_comp_name_e = $str_comp_name_e."<br />".$r5['comp_name'];
					}
					else
					{
					$str_comp_name_e = $r5['comp_name'];
					}
					
					
					if($str_eligible_amt_e != '')
					{
					$str_eligible_amt_e = $str_eligible_amt_e."<br />".$eligible_amt;
					}
					else
					{
					$str_eligible_amt_e = $eligible_amt;
					}
				}
				$tot_earnings = $tot_earnings + $r4['paid_amt'];
				}
				}*/
				
				
				
			  
			/*  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'X%'");
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
				}*/
				}
			  
			  ?>
			  
			   <!--<tr>
							<td width="200"><?php // echo $str_comp_name_e; ?></td>
							<td style="text-align:right"><?php // echo $str_eligible_amt_e; ?></td>
				</tr> -->
					   
						</table>
			  </td>
			  <td colspan="2">
						<table class="listing" width="400">
						
						<?php
			  $sq2 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'D%'");
			  while($r2 = mysql_fetch_assoc($sq2))
			  {
			  if($r2['comp_code'] == 'D0008')
			  {
				 $sq_comp_details = mysql_query("select lic_acc_no_1, lic_acc_no_2, lic_amt_1, lic_amt_2 from comp_details where employee_no='$emp_no'");
				 while($r_comp_details = mysql_fetch_assoc($sq_comp_details))
				 {
				  if($r_comp_details['lic_acc_no_1'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "LIC: ".$r_comp_details['lic_acc_no_1']; ?></td>
							<td style="text-align:right"><?php echo number_format(round($r_comp_details['lic_amt_1']),0); ?></td>
						</tr>
				<?php
				   }
				   
				  if($r_comp_details['lic_acc_no_2'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "LIC: ".$r_comp_details['lic_acc_no_2']; ?></td>
							<td style="text-align:right"><?php echo number_format(round($r_comp_details['lic_amt_2']),0); ?></td>
						</tr>
				<?php
				 }
				 }
			  }
			  else if($r2['comp_code'] == 'D0007')
			  {
			  
				$sq_comp_details = mysql_query("select loan_acc_no_1, loan_acc_no_2, loan_amt_1, loan_amt_2 from comp_details where employee_no='$emp_no'");
				 while($r_comp_details = mysql_fetch_assoc($sq_comp_details))
				 {
				  if($r_comp_details['loan_acc_no_1'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "Loan: ".$r_comp_details['loan_acc_no_1']; ?></td>
							<td style="text-align:right"><?php echo  number_format(round($r_comp_details['loan_amt_1']),0); ?></td>
						</tr>
				<?php
				   }
				   
				  if($r_comp_details['loan_acc_no_2'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "Loan: ".$r_comp_details['loan_acc_no_2']; ?></td>
							<td style="text-align:right"><?php echo  number_format(round($r_comp_details['loan_amt_2']),0); ?></td>
						</tr>
				<?php
				 }
				}
			  }
			  else
			  {
				$sq3 = mysql_query("select * from comp_head where comp_code='$r2[comp_code]'");
				while($r3 = mysql_fetch_assoc($sq3))
				{
					$eligible_amt = number_format(round($r2['paid_amt']), 0); 
					
					?>
					 <tr>
							<td width="200"><?php echo $r3['comp_name']; ?></td>
							<td style="text-align:right"><?php echo  $eligible_amt; ?></td>
						</tr>
						
						<?php
				}
			  }
				$tot_deductions = $tot_deductions + $r2['paid_amt'];
			  }
			  
			  
			  
			  
		$sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'F%'");
			  while($r4 = mysql_fetch_assoc($sq4))
			  {
				//if($r4['eligible_amt'] < 0)
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
			  
			  
			  
			  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'X%'");
			  while($r4 = mysql_fetch_assoc($sq4))
			  {
				if($r4['eligible_amt'] > 0)
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
			  
			  ?>
			  
			   <tr>
							<td width="200"><?php echo $str_comp_name; ?></td>
							<td style="text-align:right"><?php echo  $str_eligible_amt; ?></td>
				</tr>
			  
					   
						</table>
			  </td>
			  </tr>
			  
			  <?php
			 //  $tot_earn = number_format($tot_earnings, 2);
			//  $tot_deduct = number_format($tot_deductions, 2);
			$r1['gross_earnings'] = round($r1['gross_earnings']);
			$r1['gross_deduction'] = round($r1['gross_deduction']);
			  
			  $gr_earn = number_format($r1['gross_earnings'], 0);
			  $gr_deduct = number_format($r1['gross_deduction'], 0);
			  ?>
			  <tr>
			  <td colspan="5"><b>Total Earnings : </b><?php echo ' Rs. '.$gr_earn.' /-'; ?></td>
			  <td colspan="2"><b>Total Deductions : </b><?php echo ' Rs. '.$gr_deduct.' /-'; ?></td>
			  </tr>
			  
			  <tr>
			  <td colspan="7">
			  <b> Net Salary:  <?php 
			 // $net_pay = $tot_earnings - $tot_deductions;
			 // $net_pay = number_format($net_pay, 2);
			 $net_pay = number_format(round($r1['net_salary']), 0); 
			  echo ' Rs. '.$net_pay.' /-';  ?></b>
			  </td>
			  </tr>
			  
			  <tr>
			  <td colspan="7">
			  <?php
			  if($r1['net_salary'] > 0)
			  {
			  
			   $in_words = number_to_words(round($r1['net_salary']));
			  ?>
			  <b> <?php echo "Received Rs. ".$in_words." Only, by ".$bank_branch;
			 // $net_pay = $tot_earnings - $tot_deductions;
			 // $net_pay = number_format($net_pay, 2);
		
			  }
			  ?></b>	  </td>
			  </tr>
			  
			  </table>
			  
			<br />
			  </td>
		</tr>
		</table>
				<br /><br /><br /><br />
				
				</div>
				
			  <?php
			  $i = $i + 1;
			  }
}//end of if



else
{ 
	$servername = $_POST['txt_s'];
				$usernm = $_POST['txt_u'];
				$pas = $_POST['txt_p'];
				$db1 = $_POST['txt_db'];
				
				
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
				
				
				
				
				mysql_connect("$servername", "$usernm", "$pas");
				mysql_select_db("$db1");
				
				
				$month_no = $_POST['cmb_month_no1'];
				
				?>		
						<div id="tabs">
						<ul>
						<?php
							$s = 1;
							$sq = mysql_query("select * from payroll_hdr where month_no='$month_no'");
							while($r1 = mysql_fetch_assoc($sq))
							{
						?>
								<li><a href="#fragment-<?php echo $s; ?>"></a></li>
							<?php
							  $s = $s + 1;		
							}
					?>
			   </ul>
		
		
		
		<?php
		$i = 1;
		$sq = mysql_query("select * from payroll_hdr,empl_master where month_no='$month_no' and payroll_hdr.employee_no=empl_master.employee_no and emp_code='$_POST[cmb_emp_name]'");
		while($r1 = mysql_fetch_assoc($sq))
		{
		
		$tot_earnings = 0;
		$tot_deductions = 0;
		
		
			$str_comp_name = '';
			$str_eligible_amt = '';
			$str_comp_name_e = '';
			$str_eligible_amt_e = '';  
		?>
		<?php 
		$sq_name = mysql_query("select * from company_info");
		while($row_info = mysql_fetch_assoc($sq_name))
		{
		$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
		?>
		<div id="fragment-<?php echo $i; ?>" class="ui-tabs-panel ui-tabs-hide">
		<table border="1" width="800">
		<tr><td>
		<table class="listing" width="810" border="1" bgcolor="#FECCA3">
		<tr><td><center><b><?php echo $row_info['name'] ?><br /><font size="-1"><?php echo $row_info['address1'].$row_info['address2'].$row_info['address3'].$row_info['address4']?></font></b></center></td></tr>
		
		
		<tr><td><center><b>Pay Slip for month <?php echo $month_no; ?></b></center></td></tr>
		</table>
		<?php } ?>
		<table class="listing" width="800">
		<?php
		  $original_basic  = 0;
		  $emp_no = $r1['employee_no'];
		  $sq1 = mysql_query("select * from empl_master where employee_no='$emp_no'");
		  while($r = mysql_fetch_assoc($sq1))
		  {
		  $sq2 = mysql_query("select * from comp_details where employee_no='$emp_no'");
		  while($r2 = mysql_fetch_assoc($sq2))
		  {
		  $bank_acc_no = $r2['bank_account_no'];
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
		  
		  /*$sq_payroll_details_e1 = mysql_query("select paid_amt from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code='E0001'");
		  while($r_payroll_details_e1 = mysql_fetch_assoc($sq_payroll_details_e1)) 
		  {
			 $original_basic = round($r_payroll_details_e1['paid_amt']);
		  }
		  
		  $sq_payroll_details_e2 = mysql_query("select paid_amt from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code='E0002'");
		  while($r_payroll_details_e2 = mysql_fetch_assoc($sq_payroll_details_e2)) 
		  {
			 $original_basic = $original_basic + round($r_payroll_details_e2['paid_amt']);
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
		  
		  ?>
		  
		<tr><td width="120"><b>Employee Code </b></td><td width="5"><b>:</b></td><td width="200"><?php echo $r['emp_code']; ?></td><td width="150"><b>Employee Name </b> </td><td width="5"><b>:</b></td><td width="200"><?php echo $r['first_name']." ".$r['middle_name']." ".$r['last_name']; ?></td></tr><br />
		
		<tr><td><b>Designation</b> </td><td width="5"><b>:</b></td><td><?php echo $r2['designation']; ?></td><td><b>Date of Joining  </b> </td><td width="9"><b>:</b></td><td><?php echo $r2['joining_date']; ?></td></tr>
		
		<tr><td><b>Bank Account No</b> </td><td width="9"><b>:</b></td><td><?php echo $r1['bank_account_no']; ?></td><td><b>PF Account No</b> </td><td width="9"><b>:</b></td><td><?php echo $r2['pf_number']; ?></td></tr>
		
		<tr><td><b>Original Basic+Grade Pay</b> </td><td width="9"><b>:</b></td><td><?php echo "Rs. ".number_format($original_basic, 0)." /-"; ?></td><td><b>No. of days in month </b> </td><td width="9"><b>:</b></td><td><?php echo $no_days; ?></td></tr>
		
		<tr></tr>
		  <?php 
		   }
		   }
		   }
			?>
			  
			  </table>
			  <br />
			  <br />
			   <table class="listing" width="800">
			   <?php
				$sq_attendance = mysql_query("select * from attendance where employee_no='$emp_no' and month_no='$month_no'");
				while($r_attendance = mysql_fetch_assoc($sq_attendance))
				{
			   ?>
			  <tr><td><b>Worked Days: <?php echo $r_attendance['pay_days']; ?></b></td>
				  <td><b>Holidays: <?php echo $r_attendance['holidays']; ?></b></td>
				  <td><b>Paid Leaves: <?php echo $r_attendance['paid_leaves']; ?></b></td>
				  <td><b>Unpaid Leaves: <?php echo $r_attendance['unpaid_leaves']; ?></b></td>
			  </tr>
			   <?php
				}
			   ?>
			  
			  </table>
			  <br />
			  <br />
			  <table class="listing" width="810" border="1">
			  <tr><td width="200"><b>Earnings</b></td><!--<td><b>Eligible Amount</b></td><td><b>Computed Amount</b></td><td><b>Adjusted Amount</b></td> --><td style="text-align:right" width="205"><b>Amount</b></td><td width="200"><b>Deductions</b></td><td style="text-align:right" width="200"><b>Amount</b></td></tr>
			  </table>
			  <table class="listing" width="800" border="1">
			<!--  <tr><td width="400"><b><center>Earnings</center></b></td><td><b>Eligible Amount</b></td><td><b>Computed Amount</b></td><td><b>Adjusted Amount</b></td> <td style="text-align:right" width="400" colspan="3"><b>Amount</b></td><td width="200"><b><center>Deductions</center></b></td><td style="text-align:right" colspan="3"><b>Amount</b></td></tr> -->
			  <tr>
			  <td colspan="5">
						<table class="listing" width="400">
						
						<?php
		$sq2 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'E%'");
			  while($r2 = mysql_fetch_assoc($sq2))
			  {
			  
				$sq3 = mysql_query("select * from comp_head where comp_code='$r2[comp_code]'");
				while($r3 = mysql_fetch_assoc($sq3))
				{
					$eligible_amt = number_format($r2['eligible_amt'], 0); 
					$computed_amt = number_format($r2['computed_amt'], 0); 
					$adj_amt = number_format($r2['adj_amt'], 0); 
					$paid_amt = number_format(intval($r2['paid_amt']), 0); 
					
					?>
					 <tr>
							<td><?php echo $r3['comp_name']; ?></td>
							<!--<td style="text-align:right"><?php echo $eligible_amt; ?></td>
							<td width="110" style="text-align:right"><?php echo $computed_amt; ?></td>
							<td width="110" style="text-align:right"><?php echo $adj_amt; ?></td> -->
							<td width="200" style="text-align:right"><?php echo $paid_amt; ?></td>
					</tr>
					
						
						<?php
				}
				$tot_earnings = $tot_earnings + $r2['paid_amt'];
			  }
			  
			 ///////////////////////
			 //////////////////////
			 //////////////////////
			 //////////////////////
			  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'F%'");
			  while($r4 = mysql_fetch_assoc($sq4))
			  {
			 
			/*	if($r4['eligible_amt'] >= 0)
				{
				
				$sq5 = mysql_query("select * from comp_head where comp_code='$r4[comp_code]'");
				while($r5 = mysql_fetch_assoc($sq5))
				{
					
					$eligible_amt = number_format(round($r4['paid_amt']), 0); 
				//	$pdf->Row1(array($r5['comp_name'], $eligible_amt));
					if($str_comp_name_e != '')
					{
					$str_comp_name_e = $str_comp_name_e."<br />".$r5['comp_name'];
					}
					else
					{
					$str_comp_name_e = $r5['comp_name'];
					}
					
					
					if($str_eligible_amt_e != '')
					{
					$str_eligible_amt_e = $str_eligible_amt_e."<br />".$eligible_amt;
					}
					else
					{
					$str_eligible_amt_e = $eligible_amt;
					}
				}
				$tot_earnings = $tot_earnings + $r4['paid_amt'];
				}*/
				}
				
				
				
			  
			/*  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'X%'");
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
				}*/
			  
			  ?>
			  
			   <tr>
							<td width="200"><?php echo $str_comp_name_e; ?></td>
							<td style="text-align:right"><?php echo $str_eligible_amt_e; ?></td>
				</tr>
					   
						</table>
			  </td>
			  <td colspan="2">
						<table class="listing" width="400">
						
						<?php
			  $sq2 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'D%'");
			  while($r2 = mysql_fetch_assoc($sq2))
			  {
			  if($r2['comp_code'] == 'D0008')
			  {
				 $sq_comp_details = mysql_query("select lic_acc_no_1, lic_acc_no_2, lic_amt_1, lic_amt_2 from comp_details where employee_no='$emp_no'");
				 while($r_comp_details = mysql_fetch_assoc($sq_comp_details))
				 {
				  if($r_comp_details['lic_acc_no_1'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "LIC: ".$r_comp_details['lic_acc_no_1']; ?></td>
							<td style="text-align:right"><?php echo number_format(round($r_comp_details['lic_amt_1']),0); ?></td>
						</tr>
				<?php
				   }
				   
				  if($r_comp_details['lic_acc_no_2'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "LIC: ".$r_comp_details['lic_acc_no_2']; ?></td>
							<td style="text-align:right"><?php echo number_format(round($r_comp_details['lic_amt_2']),0); ?></td>
						</tr>
				<?php
				 }
				 }
			  }
			  else if($r2['comp_code'] == 'D0007')
			  {
			  
				$sq_comp_details = mysql_query("select loan_acc_no_1, loan_acc_no_2, loan_amt_1, loan_amt_2 from comp_details where employee_no='$emp_no'");
				 while($r_comp_details = mysql_fetch_assoc($sq_comp_details))
				 {
				  if($r_comp_details['loan_acc_no_1'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "Loan: ".$r_comp_details['loan_acc_no_1']; ?></td>
							<td style="text-align:right"><?php echo  number_format(round($r_comp_details['loan_amt_1']),0); ?></td>
						</tr>
				<?php
				   }
				   
				  if($r_comp_details['loan_acc_no_2'] != '')
				  {
				 ?>
					<tr>
							<td width="200"><?php echo "Loan: ".$r_comp_details['loan_acc_no_2']; ?></td>
							<td style="text-align:right"><?php echo  number_format(round($r_comp_details['loan_amt_2']),0); ?></td>
						</tr>
				<?php
				 }
				}
			  }
			  else
			  {
				$sq3 = mysql_query("select * from comp_head where comp_code='$r2[comp_code]'");
				while($r3 = mysql_fetch_assoc($sq3))
				{
					$eligible_amt = number_format(round($r2['paid_amt']), 0); 
					
					?>
					 <tr>
							<td width="200"><?php echo $r3['comp_name']; ?></td>
							<td style="text-align:right"><?php echo  $eligible_amt; ?></td>
						</tr>
						
						<?php
				}
			  }
				$tot_deductions = $tot_deductions + $r2['paid_amt'];
			  }
			  
			  
			  
			  
		$sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'F%'");
			  while($r4 = mysql_fetch_assoc($sq4))
			  {
				//if($r4['eligible_amt'] < 0)
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
			  
			  
			  
			  $sq4 = mysql_query("select * from payroll_details where employee_no='$emp_no' and month_no='$month_no' and comp_code like 'X%'");
			  while($r4 = mysql_fetch_assoc($sq4))
			  {
				if($r4['eligible_amt'] > 0)
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
			  
			  ?>
			  
			   <tr>
							<td width="200"><?php echo $str_comp_name; ?></td>
							<td style="text-align:right"><?php echo  $str_eligible_amt; ?></td>
				</tr>
			  
					   
						</table>
			  </td>
			  </tr>
			  
			  <?php
			 //  $tot_earn = number_format($tot_earnings, 2);
			//  $tot_deduct = number_format($tot_deductions, 2);
			$r1['gross_earnings'] = round($r1['gross_earnings']);
			$r1['gross_deduction'] = round($r1['gross_deduction']);
			  
			  $gr_earn = number_format($r1['gross_earnings'], 0);
			  $gr_deduct = number_format($r1['gross_deduction'], 0);
			  ?>
			  <tr>
			  <td colspan="5"><b>Total Earnings : </b><?php echo ' Rs. '.$gr_earn.' /-'; ?></td>
			  <td colspan="2"><b>Total Deductions : </b><?php echo ' Rs. '.$gr_deduct.' /-'; ?></td>
			  </tr>
			  
			  <tr>
			  <td colspan="7">
			  <b> Net Salary:  <?php 
			 // $net_pay = $tot_earnings - $tot_deductions;
			 // $net_pay = number_format($net_pay, 2);
			 $net_pay = number_format(round($r1['net_salary']), 0); 
			  echo ' Rs. '.$net_pay.' /-';  ?></b>
			  </td>
			  </tr>
			  
			  <tr>
			  <td colspan="7">
			  <?php
			  if($r1['net_salary'] > 0)
			  {
			  
			   $in_words = number_to_words(round($r1['net_salary']));
			  ?>
			  <b> <?php echo "Received Rs. ".$in_words." Only, by ".$bank_branch;
			 // $net_pay = $tot_earnings - $tot_deductions;
			 // $net_pay = number_format($net_pay, 2);
		
			  }
			  ?></b>	  </td>
			  </tr>
			  
			  </table>
			  
			<br />
			  </td>
		</tr>
		</table>
				<br /><br /><br /><br />
				
				</div>
				
			  <?php
			  $i = $i + 1;
			  }		
}	
  
?>
 </div></div></div> 


</body>
</html>
