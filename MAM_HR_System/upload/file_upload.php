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

<li><a href="../view/add_recovery.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Recovery</font></span></a>
<ul>
    <li><a href="../view/update_recovery_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Recovery</font></span></a></li>

</ul>
</li>
</ul>
</li>

<li><a href="../view/payroll_process.php"><span class="l"></span><span class="r"></span><span class="t">Payroll Process</span></a></li>
<li><a href="../view/reports.php"><span class="l"></span><span class="r"></span><span class="t">Reports</span></a></li>




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
$count = 0;

mysql_query("SET NAMES sjis");

while(!feof($file))
  {
     $filedata = fgetcsv($file);
	 //echo "in while";
	 
	 if($count != 0)
	 {
	 	//  echo "if 1";
     	if($filedata[0] != '' && $filedata[1] != '' && $filedata[2]!= '' && ($filedata[3]!= '' || $filedata[4]!= '' || $filedata[5]!= '' || $filedata[6]!= ''))
		 {
		         //echo "if 2";
		        if($count == 1)
				{
				  $sq_del = mysql_query("delete from attendance where month_no='$filedata[2]'");
				}      
				else
				{
					//echo "Conut not 1<br>";
				}
		        $sum_days = $filedata[3] + $filedata[4] + $filedata[5] + $filedata[6] + $filedata[7];
				//echo $sum_days;
				
				
				if(round($sum_days, 0) > 31)
				{
				  echo '<br />'.'<br />'.'<br />'.'<br />'.'<br />'.'<center>'.'<b>'."Days entered in XLS are not valid, Plz correct it and upload attendance file again".'</b>'.'</center>'.'<br />'.'<br />'.'<br />'.'<br />'.'<br />';
				  $sq_del = mysql_query("delete from attendance where month_no='$filedata[2]'");
				  goto a;
				}
				else
				{
					//echo "sum wrong<br>";
				}
				
				//echo "select comp_details.employee_no, empl_master.employee_no, comp_details.type_of_sep, empl_master.emp_code from empl_master, comp_details where empl_master.emp_code='$filedata[0]' and comp_details.employee_no=empl_master.employee_no and (comp_details.type_of_sep='' or comp_details.type_of_sep!='Grantable');<br>";
				//$value = ltrim($value, '00');
				//$emp_code = '00'.$filedata[0];
				$sq_emp = mysql_query("select comp_details.employee_no, empl_master.employee_no, comp_details.type_of_sep, empl_master.emp_code from empl_master, comp_details where empl_master.emp_code='$filedata[0]' and comp_details.employee_no=empl_master.employee_no and (comp_details.type_of_sep='' or comp_details.type_of_sep!='Grantable')");
				while($r_emp = mysql_fetch_assoc($sq_emp))
				{
				//	$sq_attendance = mysql_query("select employee_no from attendance where employee_no='$r_emp[employee_no]' and month_no='$filedata[2]'");
				//	if(mysql_num_rows($sq_attendance) == 0)
				//	
  						mysql_query("insert into attendance values('$r_emp[employee_no]', '$filedata[2]', '$filedata[3]', '$filedata[4]', '$filedata[5]', '$filedata[6]', '$filedata[7]', '$filedata[8]', '$filedata[9]', '$filedata[10]', '', '', '', '')");
						//echo "insert into attendance values('$r_emp[employee_no]', '$filedata[2]', '$filedata[3]', '$filedata[4]', '$filedata[5]', '$filedata[6]', '$filedata[7]', '$filedata[8]', '$filedata[9]', '$filedata[10]', '', '', '', '')";
						$emp_no = $r_emp['employee_no'];
						mysql_query("update emp_comp_master_lines set amount='$filedata[11]' where comp_code='D0004' and employee_no='$emp_no'");
						//echo "update emp_comp_master_lines set amount='$filedata[11]' where comp_code='D0004' and employee_no='$emp_no';<br>";
				//	}
				}
				//else
				{
					//echo "Blank records<br>";
				}
		}	
		else
		{
			//echo "Counts zero<br>";
		}	
		//else
		//{
		//  echo $count;
		//  echo '<br />'.'<br />'.'<br />'.'<br />'.'<br />'.'<center>'.'<b>'."Please Fill Up the blanks in Excel File".'</b>'.'</center>'.'<br />'.'<br />'.'<br />'.'<br />'.'<br />';
		 // $sq_del = mysql_query("delete from attendance where month_no='$filedata[2]'");
		 // goto a;
		//}
	}
	$count++;
 }
  

fclose($file);

echo '<br />'.'<br />'.'<br />'.'<br />'.'<br />'.'<center>'.'<b>'."Attendance for all employees added successfully".'</b>'.'<a href="../view/add_attendance.php"><input type="button" name="btn_back" id="btn_back" value="Back" /></a> '.'</center>'.'<br />'.'<br />'.'<br />'.'<br />'.'<br />';

a: 

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
