<?php include('../model/Model.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <script src="../calendar/src/js/jscal2.js"></script>
    <script src="../calendar/src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/steel/steel.css" />


    <!--
    Created by Artisteer v2.3.0.23326
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php echo $_SESSION['company_name']; ?></title>

    <script type="text/javascript" src="../script.js"></script>
    <script type="text/javascript" src="stmenu.js"></script>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
	
</head>
<body>
<div id="art-page-background-simple-gradient">
    </div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
                <div class="art-Header">
                    <div class="art-Header-png"></div>
                    <div class="art-Header-jpeg"></div>
                    <div class="art-Logo">
					<table><tr><td width="250"><img src="../images/rssIcon1.png"  /></td>
					<td>
                        <h1 id="name-text" class="art-Logo-name"><?php echo $_SESSION['txt_name'];
												  ?></td></tr></table>
                        <!--<div id="slogan-text" class="art-Logo-text">Slogan text</div> -->
						<form name="frm_logout" id="frm_logout" method="post" action="../index.php">
																	<table><tr><td width="1000" style="text-align:right">
						    
							
							<font face="Times New Roman, Times, serif" size="+1" color="#A7380A">
							<?php
						 
						  
						  echo $_SESSION['txt_login_name'];
						  ?></font> <input type="submit" name="btn_logout" id="btn_logout" value="Logout"  style="background-color:#F3D9A5"/>
						  <br /><a href="change_password.php"><font size="-2">Change Password</font></a>
						 </td></tr></table>
						 </form>
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
					
                	<ul class="art-menu">
                		
<?php if($_SESSION['role']=='Admin')
 {
 ?>
 


<li><a href="../view/personal_info.php"><span class="l"></span><span class="r"></span><span class="t"><font>Home</font></span></a>

<li><a href="../view/comp_head_add.php"><span class="l"></span><span class="r"></span><span class="t"><font>Compensations</font></span></a>
<ul>
<li><a href="../view/comp_head_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Compensations</font></span></a></li>
<li><a href="../view/update_comp_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Compensations</font></span></a></li>
</ul>
</li>


<li><a href="../view/grade_comp_add.php"><span class="l"></span><span class="r"></span><span class="t">Grade Compensations</span></a>
<ul>
<li><a href="../view/grade_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Grade</font></span></a></li>

<li><a href="../view/grade_comp_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Grade Comp.</font></span></a></li>
<li><a href="../view/update_grade_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Grade Comp.</font></span></a></li>
</ul>
</li>

<li><a href="../view/month_control_add.php"><span class="l"></span><span class="r"></span><span class="t">Month Control</span></a>
<ul>
<li><a href="../view/month_control_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Month Control</font></span></a></li>
<li><a href="../view/update_month_control_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Month Control</font></span></a></li>
</ul>
</li>

<li><a href="../view/batch_add.php"><span class="l"></span><span class="r"></span><span class="t">Batch</span></a>
<ul>
<li><a href="../view/batch_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Batch Details</font></span></a></li>
<li><a href="../view/update_batch_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Batch Details</font></span></a></li>
</ul>
</li>


<li><a href="../view/payroll_emp_comp.php"><span class="l"></span><span class="r"></span><span class="t">Employee Compensations</span></a>
<ul>
<li><a href="../view/payroll_emp_comp.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Emp Comp</font></span></a>
<ul>
<li><a href="../view/search_for_payroll_update.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Emp Comp</font></span></a></li>
</ul>
</li>


<li><a href="../view/add_attendance.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Emp Attendance</font></span></a>
<ul>
    <li><a href="../view/update_attendance_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Emp Attendance</font></span></a></li>

</ul>
</li>

<li><a href="../view/../view/add_recovery.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Recovery</font></span></a>
<ul>
    <li><a href="../view/update_recovery_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Recovery</font></span></a></li>

</ul>
</li>
</ul>
</li>

<li><a href="../view/payroll_process.php"><span class="l"></span><span class="r"></span><span class="t">Payroll Process</span></a></li>
<li><a href="../view/reports.php"><span class="l"></span><span class="r"></span><span class="t">Reports</span></a></li>
<li><a href="../view/transfer_employees.php"><span class="l"></span><span class="r"></span><span class="t">Move Employees</span></a></li>


       <?php } ?>    

	         	</ul>
                </div>
                <div class="art-contentLayout">
                    <div class="art-content">
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                                        <h2 class="art-PostHeader">
                                        
                                        </h2>
                                        <div class="art-PostContent">
										
										
<?php

setlocale(LC_ALL, 'ja_JP.UTF8');

$file_name = $_POST['upload_file'];

$file = fopen($file_name,"r");
$count = 1;
$today_date = date('Y-m-d');
$today_date_time = date('Y-m-d H:i:s');

mysql_query("SET NAMES sjis");

 $filedata = fgetcsv($file);
	
//Add entries to empl_comp_log first
     //echo "Here";
	 //echo $filedata[1];
	 //echo "****".$filedata[0]."----";
	 //$sq_emp_master = mysql_query("select * from empl_master where emp_code='$filedata[1]'");
	 $sq_emp_master = mysql_query("select * from empl_master order by employee_no");
	 while($r_emp_master = mysql_fetch_assoc($sq_emp_master))
		 {
		    //echo "here****".$r_emp_master['employee_no']."  ";
			$query = mysql_query("select * from emp_comp_master_lines where employee_no='$r_emp_master[employee_no]'");
		   // $sq_emp_master_one = mysql_fetch_assoc();
			while($sq_emp_master_one = mysql_fetch_assoc($query))
			{
			  //echo "----".$r_emp_master['employee_no']."----".$sq_emp_master_one['amount']."-";
			  $sq = mysql_query("insert into empl_comp_log values('','$sq_emp_master_one[employee_no]','$sq_emp_master_one[comp_code]','$today_date_time','$sq_emp_master_one[amount]','')");	 		}
			//echo "      ";
		
		}

mysql_query("delete from emp_comp_master");
mysql_query("delete from emp_comp_master_lines");

//$uploads = '';
//foreach ($_FILES as $inputName => $fileInfo) {
//    foreach ((array) $fileInfo['name'] as $n) {
//        $uploads .= $n . ' ';
//    }
//}
//
//print_r($_FILES);

while(!feof($file))
  {
// echo "in while";  
     $filedata = fgetcsv($file);
	
	 if($count != 0)
	 {
     //echo "Here";
	 //echo $filedata[1];
	 //echo "****".$filedata[0]."----";
	 //$sq_emp_master = mysql_query("select * from empl_master where emp_code='$filedata[1]'");
	 //echo $filedata['0'];
	 $sq_emp_master = mysql_query("select * from empl_master where employee_no='$filedata[0]'");
	 while($r_emp_master = mysql_fetch_assoc($sq_emp_master))
	 {
	   //echo "here****";
		
	
        $sq = mysql_query("insert into emp_comp_master values('$r_emp_master[employee_no]','$today_date','','$today_date','')");

	   //(OLD value) Get the value from emp_comp_master_lines for given code for eg E0001 for $r_emp_master[employee_no]
       // insert into log  (OLD value) and $filedata[3] (new value) date todays date
	    //echo "**".$r_emp_master['employee_no']."--";
		//$query = mysql_query("select * from emp_comp_master_lines where employee_no='$r_emp_master[employee_no]'");
	    //$sq_emp_master_one = mysql_fetch_assoc();
		//while($sq_emp_master_one = mysql_fetch_assoc($query))
		//{
	      //echo "----".$r_emp_master['employee_no']."----".$sq_emp_master_one['amount']."-";
		//}
		//echo "      ";
	   // $sq = mysql_query("insert into empl_comp_log values('$r_emp_master[employee_no]','E0001','$today_date','$sq_emp_master_one[amount]','$filedata[3]')");	 
		//$sq = mysql_query("insert into empl_comp_log values('$r_emp_master[employee_no]','E0001','$today_date','$filedata[3]','$filedata[3]')");	 
		
		//$query = mysql_fetch_assoc(mysql_query("select * from empl_comp_log where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date'"));
		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[3]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'E0001'");
		//Main Entry
		$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0001','$today_date','$filedata[3]')");


		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[4]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'E0002'");
		//Main Entry
		$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0002','$today_date','$filedata[4]')");
		
		if($filedata[5] != 'NA')
		{
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0003','$today_date','')");
		}
		
		if($filedata[6] != 'NA')
		{
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0004','$today_date','')");
		}
		
		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[7]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'E0007'");
		//Main Entry
		$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0007','$today_date','$filedata[7]')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[8]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'E0008'");
		//Main Entry
		$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0008','$today_date','$filedata[8]')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[9]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'E0009'");
		//Main Entry
		$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0009','$today_date','$filedata[9]')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[10]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'E0010'");
		//Main Entry
		$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','E0010','$today_date','$filedata[10]')");
		
	
		
		$sq_employment_details = mysql_query("select lic_amt_1, lic_amt_2, loan_amt_1, loan_amt_2, pf_number, prof_tax_applicable from comp_details where employee_no='$r_emp_master[employee_no]'");
		while($r_employment_details = mysql_fetch_assoc($sq_employment_details))
		{
		   // if($r_employment_details['pf_number'] != '')
			{
				$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','D0001','$today_date','')");
			}
		
			
			//if($r_employment_details['prof_tax_applicable'] == 'Y')
			{
				$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','D0002','$today_date','')");
			}
			
			
			$lic_amt = $r_employment_details['lic_amt_1'] + $r_employment_details['lic_amt_2'];
  			$loan_amt = $r_employment_details['loan_amt_1'] + $r_employment_details['loan_amt_2'];

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$loan_amt' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'D0007'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','D0007','$today_date','$loan_amt')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$lic_amt' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'D0008'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','D0008','$today_date','$lic_amt')");
		}
			
		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[11]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'D0004'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','D0004','$today_date','$filedata[11]')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[12]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'D0005'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','D0005','$today_date','$filedata[12]')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[13]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'F0001'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','F0001','$today_date','$filedata[13]')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[14]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'F0003'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','F0003','$today_date','$filedata[14]')");

		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[15]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'F0002'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','F0002','$today_date','$filedata[15]')");


		//LOG Entry
		$sq = mysql_query("update empl_comp_log set new_amount = '$filedata[16]' where employee_no='$r_emp_master[employee_no]' and new_amount = '' and transaction_date = '$today_date_time' and comp_code = 'F0004'");
		//Main Entry
			$sq = mysql_query("insert into emp_comp_master_lines values('$r_emp_master[employee_no]','F0004','$today_date','$filedata[16]')");

	 }
	 }
	 $count = 1;
 }
  
  
  //$sq_emp_master_one = mysql_query("select * from emp_comp_master_lines");
//	 while($r_emp_master_one = mysql_fetch_assoc($sq_emp_master_one))
//	 { 
//  $sq = mysql_query("insert into empl_comp_log values('$r_emp_master_one[employee_no]','$r_emp_master_one[comp_code]','$r_emp_master_one[comp_change_eff_date]','$r_emp_master_one[amount]','$filedata[3]')");	  
//}
fclose($file);

echo '<br />'.'<br />'.'<br />'.'<br />'.'<br />'.'<center>'.'<b>'."Employee Compensations Imported Successfully".'</b>'.'<a href="../view/payroll_emp_comp.php"><input type="button" name="btn_back" id="btn_back" value="Back" /></a> '.'</center>'.'<br />'.'<br />'.'<br />'.'<br />'.'<br />';
?>

   
                                            <table class="table" width="100%">
                                            	<tr>
                                            		<td width="33%" valign="top">
                                            		<div class="art-Block">
                                            			<div class="art-Block-body">
                                            				<div class="art-BlockHeader">
                                                      <div class="l"></div>
                                            				  <div class="r"></div>
                                            				  <div class="t"><center></center></div>
                                            			  </div>
                                            				<div class="art-BlockContent">
                                            					<div class="art-PostContent">
                                            						
                                            						
                                            					</div>
                                            				</div>
                                            			</div>
                                            		</div>
                                            		</td>
                                            		<td width="33%" valign="top">
                                            		<div class="art-Block">
                                            			<div class="art-Block-body">
                                            				<div class="art-BlockHeader">
                                                      <div class="l"></div>
                                            				  <div class="r"></div>
                                            				  <div class="t"><center></center></div>
                                            			  </div>
                                            				<div class="art-BlockContent">
                                            					<div class="art-PostContent">
                                            						
                                            					</div>
                                            				</div>
                                            			</div>
                                            		</div>
                                            		</td>
                                            		<td width="33%" valign="top">
                                            		<div class="art-Block">
                                            			<div class="art-Block-body">
                                                    <div class="art-BlockHeader">
                                                      <div class="l"></div>
                                            				  <div class="r"></div>
                                            				  <div class="t"><center></center></div>
                                            			  </div>
                                            				<div class="art-BlockContent">
                                            					<div class="art-PostContent">
                                            						
                                            					</div>
                                            				</div>
                                            			</div>
                                            		</div>
                                            		</td>
                                            	</tr>
                                            </table>
                                                
                                        </div>
                                        <div class="cleared"></div>
                        </div>
                        
                        		<div class="cleared"></div>
                            </div>
                        </div>
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                                        <h2 class="art-PostHeader">
                                            
                                        </h2>
                                        <div class="art-PostContent">
                                            
                                            
                                             
                                                    
                                              
                                            	
                                                
                                        </div>
                                        <div class="cleared"></div>
                        </div>
                        
                        		<div class="cleared"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cleared"></div><div class="art-Footer">
                    <div class="art-Footer-inner">
                        <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                        <div class="art-Footer-text">
                            <br />
                           <p class="art-page-footer">Copyright � 2011-12. All Rights Reserved. Designed & Maintained By<a href="http://www.adikul.com/" target="_blank">&nbsp;Aaditya Software Solutions</a> </p>
                        </div>
                    </div>
                    <div class="art-Footer-background"></div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>

    </div>
    
</body>
</html>
