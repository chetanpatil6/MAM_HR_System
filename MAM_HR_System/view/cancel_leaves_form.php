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
 <li><a href="add_employee_leaves.php"><span class="l"></span><span class="r"></span><span class="t"><font>Leave Managment</font></span></a>
<ul>
<li><a href="add_employee_leaves.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Deposit Leaves</font></span></a></li>
<li><a href="remove_employee_leaves.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Modify Deposit Leaves</font></span></a></li>
<!--<li><a href="add_leave_managment_form.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leave Application</font></span></a></li>
<li><a href="update_leave_managment_form_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Leave Form</font></span></a></li> -->
<li><a href="add_leave_managment_form.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leave Application</font></span></a>
<ul>
    <!--<li><a href="update_leave_managment_form_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Leave Form</font></span></a></li> -->

</ul>
</li>
<li><a href="cancel_leaves_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leave Cancellation</font></span></a></li>
<li><a href="add_leave_master.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Attendance</font></span></a></li>
<li><a href="add_leave_transfer_type.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Trnasfer Leaves</font></span></a></li>
<li><a href="add_leave_encashment_form.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leave Encashment</font></span></a></li>
</ul>
</li>
<?php if($_SESSION['role']=='Admin')
 {
 ?>

<li><a href="personal_info.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>
<li><a href="leaves_dashboard.php"><span class="l"></span><span class="r"></span><span class="t">Leaves Dashboard</span></a><ul>
	<li><a href="leaves_dashboard.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leaves Management Dashboard</font></span></a></li>
<li><a href="leaves_transaction_dashboard.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leaves Transaction Dashboard</font></span></a></li>
</ul>
</li>

<?php
$query = mysql_query("SELECT * FROM payroll_hdr");

if($query)
{
?>
<?php
}
?>
<?php 
}
?>
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
$state="";
$query=mysql_query("select * from leave_management where leave_application_no='$_POST[cmb_leave_application_number]'");
while($row=mysql_fetch_assoc($query))
{
 if($row['leave_status']=="Active")
 {
  $state="Active";
 }
}
if($state=="Active")
{
$sql=mysql_query("SELECT * from leave_management where leave_application_no='$_POST[cmb_leave_application_number]'");
while($row = mysql_fetch_assoc($sql))
{
?>       

<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Cancel Leave Application</center></font></td></tr></table>
<table border="1" width="900">
<tr><td width="130"><label><b>Attendance Number*</b></label></td><td><input type="text" name="txt_attendance_no" id="txt_attendance_no" value="<?php echo $row['attendance_no']; ?>" disabled="disabled"  size="15"/></td><td width="120"><label><b>Leave Application Number*</b></label></td><td><input type="text" name="txt_leave_application_number" id="txt_leave_application_number" value="<?php echo $row['leave_application_no']; ?>" disabled="disabled"  size="15"/></td><td width="150"><label><b>Registration Number*</b></label></td><td colspan="5"><input type="text" name="txt_registration_no" id="txt_registration_no" size="15" value="<?php echo $row['registration_no']; ?>" disabled="disabled"/></td></tr>
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
<td td width="130"><label><b>Designation</b></label></td><td colspan="5"><input type="text" name="txt_designation" id="txt_designation"  size="15" value="<?php echo $row['designation']; ?>" disabled="disabled"/></td>

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
<td><label><b>To Date</b></label></td><td ><input type="text" name="txt_to_date" id="txt_to_date" disabled="disabled"  size="15" value="<?php echo $row['to_date']; ?>"/><!--</td><td> <button id="f_btn_to_date">...</button>--></td>
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
	 <td><label><b>Type Of Leave</b></label></td><td><input type="text" name="txt_leave_type" id="txt_leave_type" value="<?php echo $row['leave_short_code']; ?>" disabled="disabled"/>  </td>
  
	</tr><tr>	
<td><label><b>Status</b></label></td><td ><input type="text" name="txt_status" id="txt_status" value="Cancel" disabled="disabled"/>  </td>
<td><label><b>Total Leaves</b></label></td><td ><input type="text" name="txt_total_leav" id="txt_total_leav" value="<?php echo $row['total_days']; ?>" disabled="disabled"/>  </td>
</tr>
</table>

<table border="1" width="900">
<tr><td align="right" width="50%"><input type="button" name="btn_save" id="btn_save" value=" Cancel Leave " onclick="cancel_leave();"/><!--<input type="reset" name="btn_existing_balance" id="btn_existing_balance" value=" Show " size="30" /> -->&nbsp;&nbsp;</td><td>&nbsp;&nbsp;<a href="cancel_leaves_select.php"><font color="#FF0033">Next Cancellation</font></a>
</td></tr>
</table>
<?php
}



?>
<center><b><div id="error"></div></b></center>
<?php
}
?>
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
   <script type="text/javascript" src="../js/jquery-1.4.js"></script>
</body>
</html>