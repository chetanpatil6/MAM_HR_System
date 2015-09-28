<?php
include("../model/Model.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>


    <!--
    Created by Artisteer v2.3.0.23326
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php echo $_SESSION['company_name']; ?></title>

    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="stmenu.js"></script>


    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
	

	
	<link rel="stylesheet" href="tabs.css" type="text/css" media="screen, projection"/>
	
	  <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
	  
	<script src="../calendar/src/js/jscal2.js"></script>
    <script src="../calendar/src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/steel/steel.css" />

	<script type="text/javascript" src="tab_js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="tab_js/jquery-ui-1.7.custom.min.js"></script>
    <script type="text/javascript">
	
function validation_date_confirm(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_date_confirm').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;
	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_date_confirm').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}


		
		
function balace_leaves(id)
{
	 var num = document.getElementById(id).value;
	 if(isNaN(num))
	 {
	   alert("Please enter only number");
	   document.getElementById(id).value = '';
	   return false;
	 }
	var total = 0;
	var cl = document.getElementById('txt_cl').value;
	var fl = document.getElementById('txt_fl').value;
	var el = document.getElementById('txt_el').value;
	var ml = document.getElementById('txt_ml').value;
	var sp = document.getElementById('txt_sp').value;
	var unpaid_leaves = document.getElementById('txt_unpaid_leaves').value;	
	var total_leave = document.getElementById('txt_total_leave').value;	
	
	
	
	var balace_total_leave = document.getElementById('txt_balace_total_leave').value;
	var balace_cl = document.getElementById('txt_balace_cl').value;
	var balace_fl = document.getElementById('txt_balace_fl').value;
	var balace_ml = document.getElementById('txt_balace_ml').value;
	
	
	if(cl !='')
	{
		total = parseFloat(total) + parseFloat(cl);
		//document.getElementById('txt_balace_cl').value = parseFloat(balace_cl) - parseFloat(cl);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		cl=0;
	}
	
	if(fl !='')
	{
		total = parseFloat(total) + parseFloat(fl);
		//document.getElementById('txt_balace_fl').value = parseFloat(balace_fl) - parseFloat(fl);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		fl=0;
	}
	
	if(el !='')
	{
		total = parseFloat(total) + parseFloat(el);
		//document.getElementById('txt_balace_fl').value = parseFloat(balace_fl) - parseFloat(fl);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		el=0;
	}
	
	if(ml !='')
	{
		total = parseFloat(total) + parseFloat(ml);
		//document.getElementById('txt_balace_ml').value = parseFloat(balace_ml) - parseFloat(ml);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		ml=0;
	}
	
	
	if(sp !='')
	{
		total = parseFloat(total) + parseFloat(sp);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	
	if(unpaid_leaves !='')
	{
		total = parseFloat(total) + parseFloat(unpaid_leaves);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}	
}



	</script>
	

	
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
					
                        <h1 id="name-text" class="art-Logo-name"><?php  $que1 = mysql_query("select * from company_info");
												 while($ro = mysql_fetch_assoc($que1))
												 {
												 $ro['name'] = str_replace('12345', ' ', $ro['name']);
												 $_SESSION['txt_name']= $ro['name'];
												     echo $_SESSION['txt_name'];
												 }
												  ?>
												 </h1>
												 </td></tr></table>
						<form name="frm_logout" id="frm_logout" method="post" action="../index.php">
																	<table><tr><td width="1000" style="text-align:right">
						    
							
							<font face="Times New Roman, Times, serif" size="+1" color="#A7380A">
							<?php
						 
						 
						  echo $_SESSION['txt_login_name'];
						  ?></font> <input type="submit" name="btn_logout" id="btn_logout" value="Logout"  style="background-color:#F3D9A5"/>
						 </td></tr></table>
						 </form>
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
 <li><a href="personal_info.php" class=" active"><span class="l"></span><span class="r"></span><span class="t">Personal Info</span></a>
</li>
                			
<li><a href="search_for_update.php"><span class="l"></span><span class="r"></span><span class="t">Search For Update</span></a>
</li> 
<li><a href="report.php"><span class="l"></span><span class="r"></span><span class="t">Report</span></a>
</li> 
<?php if($_SESSION['role']=='Admin')
 {
 ?>

<li><a href="add_user.php"><span class="l"></span><span class="r"></span><span class="t">User</span></a>
</li>
<li><a href="change_role_select.php"><span class="l"></span><span class="r"></span><span class="t">Change Role</span></a>
</li>
<li><a href="add_company_info.php"><span class="l"></span><span class="r"></span><span class="t">Add Company Info</span></a>
<ul>
<li><a href="update_company_info.php"><span class="l"></span><span class="r"></span><span class="t">Update Company Info</span></a></li>
</ul>
</li> 
<?php
$query = mysql_query("SELECT * FROM payroll_hdr");

if($query)
{
?>
<li><a href="comp_head_add.php"><span class="l"></span><span class="r"></span><span class="t">Payroll</span></a>
<?php
}
?>
<?php 
}
?>
<li><a href="change_password.php"><span class="l"></span><span class="r"></span><span class="t">Change Password</span></a></li>					
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
										
										<div id="container">
		<div id="content" style="padding-top:-1px;">
	<div id="page-wrap">
<center><form action="#" name="personal_info" method="post" onsubmit="return validatemalefemale()" onmousemove="validate_emp_code()">
<?php
//print_r($_POST);
$sql=mysql_query("SELECT * from leave_management where leave_application_no='$_POST[cmb_leave_application_number]'");
while($row = mysql_fetch_assoc($sql))
{
?>       

<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Leave Application</center></font></td></tr></table>
<table border="1" width="900">
<tr><td width="130"><label><b>Attendance Number*</b></label></td><td><input type="text" name="txt_emp_no" id="txt_emp_no" value="<?php echo $row['attendance_no']; ?>" disabled="disabled"  size="15"/></td><td width="120"><label><b>Leave Application Number*</b></label></td><td><input type="text" name="txt_leave_application_number" id="txt_leave_application_number" value="<?php echo $row['leave_application_no']; ?>" disabled="disabled"  size="15"/></td><td width="150"><label><b>Registration Number*</b></label></td><td colspan="5"><input type="text" name="txt_registration_no" id="txt_registration_no" size="15" value="<?php echo $row['leave_application_no']; ?>" disabled="disabled"/></td></tr>
<tr>
<td><b>Employee Name*</b></td><td><select name="cmb_to_employee_name" id="cmb_to_employee_name" style="width:200px" disabled="disabled">
<?php
$sq_emp = mysql_query("select last_name,first_name,middle_name from empl_master where employee_no = '$row[employee_no]'");
while($r_emp = mysql_fetch_assoc($sq_emp))
{
   echo "<option value='$row[employee_no]'>".$r_emp['first_name'].' '.$r_emp['middle_name'].' '.$r_emp['last_name']."</option>";
}
?>
</select>
</td>
<td><label><b>Application Date</b></label></td><td><input type="text" name="txt_application_date" id="txt_application_date" disabled="disabled"  size="15" value="<?php echo $row['leave_application_date']; ?>"/><!--</td><td> <button id="f_btn">...</button>--></td>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_application_date",
        trigger    : "f_btn",
        onSelect   : function() { this.hide();validation_date_of_birth(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
<td><label><b>Designation</b></label></td><td colspan="5"><input type="text" name="txt_designation" id="txt_designation"  size="15" value="<?php echo $row['designation']; ?>" disabled="disabled"/></td>

</tr>


<tr>
<td><b>From Date*</b></td><td>
<input type="text" name="txt_from_date" id="txt_from_date" disabled="disabled"  size="15" value="<?php echo $row['from_date']; ?>"/><!--</td><td><button id="f_btn_from_date">...</button> --></td>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_from_date",
        trigger    : "f_btn_from_date",
        onSelect   : function() { this.hide();validation_date_of_birth(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
</td>
<td><label><b>To Date</b></label></td><td colspan="5"><input type="text" name="txt_to_date" id="txt_to_date" disabled="disabled"  size="15" value="<?php echo $row['to_date']; ?>"/><!--</td><td> <button id="f_btn_to_date">...</button>--></td>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_to_date",
        trigger    : "f_btn_to_date",
        onSelect   : function() { this.hide();validation_date_of_birth(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
<td style="display:none"><label><b>Month</b></label></td><td colspan="5" style="display:none"><input type="text" name="txt_month" id="txt_month" disabled="disabled" size="15" value="<?php echo $row['month']; ?>"/><!--<button id="f_btn_month">...</button> --></td>

<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_month",
        trigger    : "f_btn_month",
        onSelect   : function() { this.hide();validation_date_of_birth(this); },
        showTime   : 12,
        dateFormat : "%Y-%m"
      });
	  </script>

</tr>
</table>
<table border="1" width="900">
<tr><td width="42"><b><center>CL</center></b></td><td width="42"><b><center>FL</center></b></td><td width="42"><b><center>EL</center></b></td><td width="42"><b><center>ML</center></b></td><td width="42"><b><center>SP</center></b></td><td width="42"><b><center>Unpaid Leave</center></b></td><td width="42"><b><center>Absent Days</center></b></td><td width="42"><b><center>Total Leaves</center></b></td><td width=""><b><center>Remark</center></b></td></tr>

<tr><td><input type="text" name="txt_cl" id="txt_cl" size="8" onkeyup="balace_leaves(this.id);"  value="<?php echo $row['cl']; ?>" /></td><td><input type="text" name="txt_fl" id="txt_fl" size="8"  value="<?php echo $row['fl']; ?>" onkeyup="balace_leaves(this.id);" /></td><td><input type="text" name="txt_el" id="txt_el" size="8"  value="<?php echo $row['el']; ?>" onkeyup="balace_leaves(this.id);" /></td><td><input type="text" name="txt_ml" id="txt_ml" size="8" onkeyup="balace_leaves(this.id);"  value="<?php echo $row['ml']; ?>" /></td><td><input type="text" name="txt_sp" id="txt_sp" size="8" onkeyup="balace_leaves(this.id);"  value="<?php echo $row['sp']; ?>" /></td><td><input type="text" name="txt_unpaid_leaves" id="txt_unpaid_leaves" size="8"  onkeyup="balace_leaves(this.id);"  value="<?php echo $row['unpaid_leave']; ?>"/></td><td><input type="text" name="txt_absent_days" id="txt_absent_days" size="8" value="<?php echo $row['absent_days']; ?>" /></td><td><input type="text" name="txt_total_leave" id="txt_total_leave" size="8" disabled="disabled"  value="<?php echo $row['total_leaves']; ?>" /></td><td><input type="text" name="txt_remark" id="txt_remark" size="34" onkeyup="balace_leaves(this.id);" value="<?php echo $row['remark']; ?>"  /></td></tr>
</table>

<table border="1" width="900">

<tr><td colspan='10'><center><label><b>Balace Leaves</b></label></center></td></tr>
<tr>
<?php
$sq_leaves_type = mysql_query("select * from leaves_type");
$count_leaves_type = mysql_num_rows($sq_leaves_type);
$i = 1;
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
{
?>
<td width="42" title="<?php echo $res_leaves_type['leave_description']; ?>"><b><center><?php echo strtoupper($res_leaves_type['leave_short_code']); ?></center></b></td>
<?php
}
?>
<input type="text" id="txt_count_leave_type" name="txt_count_leave_type" value="<?php echo $count_leaves_type; ?>" style="display:none" />
<td width='42'><b><center>Total Leaves</center></b></td></tr>

<?php

 $total= 0;
 echo "<tr>";
 $sql_emp=mysql_query("select * from balanced_leaves where employee_no='$row[employee_no]'");
  while($res_leave_master=mysql_fetch_assoc($sql_emp))
  {  
	  echo "<td><input type='text' name='txt_current_leaves$i' id='txt_current_leaves$i' size='16' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td><td style='display:none'><input type='text' name='txt_current_leaves_code$i' id='txt_current_leaves_code$i' size='12' value='$res_leave_master[leave_short_code]' disabled='disabled' /></td>";
  $total = $total + $res_leave_master['leavedays_onhand']; 
  $i++;
  }
  
   echo "<td><input type='text' name='txt_current_total_leave' id='txt_current_total_leave' size='10' value='$total' disabled='disabled' /></td>";
   echo "</tr>";
?>

	
<?php	
	//$i++;
	//}
   
  //}
  ?>
</table>

<table border="1" width="900">
<tr><td><center><input type="button" name="btn_save" id="btn_save" value=" Update " onclick="update_leave();" /> &nbsp;&nbsp;<!--<input type="reset" name="btn_existing_balance" id="btn_existing_balance" value=" Show " size="30" /> --></center></td></tr>
</table>
<?php
}
?>
<center><b><div id="error"></div></b></center>

</form></center>
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
                        <div class="art-Footer-text"><br />
                           <p class="art-page-footer">Copyright © 2011-12. All Rights Reserved. Designed & Maintained By<a href="http://www.adikul.com/" target="_blank">&nbsp;Aaditya Software Solutions</a> </p>
                        </div>
                    </div>
                    <div class="art-Footer-background"></div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
       
    </div>
   <script type="text/javascript" src="../js/ajax.js"></script> 
</body>
</html>