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
	<script type="text/javascript">
	function displaytext()
{
for (var i=0; i < document.frm_recovery.rdb_no_of_intallments.length; i++)
{
 if(document.frm_recovery.rdb_no_of_intallments[i].checked)
 {
    chk1 = document.frm_recovery.rdb_no_of_intallments[i].value;

	if(chk1 == 'no_of_intallments')
	{
	 document.getElementById("txt_no_of_installments").disabled = false;
	  document.getElementById("txt_installment_amount_per_salary").disabled = true;
	 }
	 else
	 {
	 document.getElementById("txt_no_of_installments").disabled = true;
	 document.getElementById("txt_installment_amount_per_salary").disabled = false;
	
	 }
  }
}

}


</script>
<script type="text/javascript">
function showrecvtitle(str)
{

if (str=="")
{
alert(str);
document.getElementById("txtHint").innerHTML="";
return;
}
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
var myTable = document.getElementById('tbltitle');
var tBody = myTable.getElementsByTagName('tbody')[0];
tBody.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.open("GET","showtitle.php?id="+str,true);
xmlhttp.send();
}

 </SCRIPT>
 
 <script type="text/javascript">
 function calrecov(id)
{
  var a = document.getElementById("txt_total_amount").value;
  var b = document.getElementById("txt_no_of_installments").value;
  var c = document.getElementById("txt_installment_amount_per_salary").value;
  
  if(id == 'txt_no_of_installments')
  {
  	document.getElementById("txt_installment_amount_per_salary").value = parseFloat(a) / parseFloat(b);
  }
  
  else if(id == 'txt_installment_amount_per_salary')
  {
    document.getElementById("txt_no_of_installments").value = parseFloat(a) / parseFloat(c);
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
                        <h1 id="name-text" class="art-Logo-name"><?php echo $_SESSION['txt_name'];
												  ?></td></tr></table>
                        <!--<div id="slogan-text" class="art-Logo-text">Slogan text</div> -->
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
                		 
<?php if($_SESSION['role']=='Admin')
 {
 ?>
 
<li><a href="personal_info.php"><span class="l"></span><span class="r"></span><span class="t"><font>Home</font></span></a>

<li><a href="comp_head_add.php"><span class="l"></span><span class="r"></span><span class="t"><font>Compensations</font></span></a>
<ul>
<li><a href="comp_head_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Compensations</font></span></a></li>
<li><a href="update_comp_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Compensations</font></span></a></li>
</ul>
</li>


<li><a href="grade_comp_add.php"><span class="l"></span><span class="r"></span><span class="t">Grade Compensations</span></a>
<ul>
<li><a href="grade_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Grade</font></span></a></li>

<li><a href="grade_comp_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Grade Comp.</font></span></a></li>
<li><a href="update_grade_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Grade Comp.</font></span></a></li>
</ul>
</li>

<li><a href="month_control_add.php"><span class="l"></span><span class="r"></span><span class="t">Month Control</span></a>
<ul>
<li><a href="month_control_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Month Control</font></span></a></li>
<li><a href="update_month_control_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Month Control</font></span></a></li>
</ul>
</li>

<li><a href="batch_add.php"><span class="l"></span><span class="r"></span><span class="t">Batch</span></a>
<ul>
<li><a href="batch_add.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Batch Details</font></span></a></li>
<li><a href="update_batch_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Batch Details</font></span></a></li>
</ul>
</li>


<li><a href="payroll_emp_comp.php"><span class="l"></span><span class="r"></span><span class="t">Employee Compensations</span></a>
<ul>
<li><a href="payroll_emp_comp.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Emp Comp</font></span></a>
<ul>
<li><a href="search_for_payroll_update.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Emp Comp</font></span></a></li>
</ul>
</li>


<li><a href="add_attendance.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Emp Attendance</font></span></a>
<ul>
    <li><a href="update_attendance_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Emp Attendance</font></span></a></li>

</ul>
</li>

<li><a href="add_recovery.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Add Recovery</font></span></a>
<ul>
    <li><a href="update_recovery_select.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Update Recovery</font></span></a></li>

</ul>
</li>
</ul>
</li>

<li><a href="payroll_process.php"><span class="l"></span><span class="r"></span><span class="t">Payroll Process</span></a></li>
<li><a href="reports.php"><span class="l"></span><span class="r"></span><span class="t">Reports</span></a></li>
<li><a href="transfer_employees.php"><span class="l"></span><span class="r"></span><span class="t">Move Employees</span></a></li>




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
										
										
										

							  <form action="#" method="post" name="frm_recovery">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Recovery</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >

<?php
$sq3 = mysql_query("select * from recovery where employee_no='$_POST[cmb_emp_no]' and recov_title='$_POST[cmb_recv_code]'");
while($row3 = mysql_fetch_assoc($sq3))
{

$sq1 = mysql_query("select * from empl_master where employee_no='$row3[employee_no]'");
while($r1 = mysql_fetch_assoc($sq1))
{
$emp_name=$r1['first_name'].$r1['middle_name'].$r1['last_name'];
}

$sq2 = mysql_query("select * from comp_head where comp_code='$row3[recov_title]'");
while($r2 = mysql_fetch_assoc($sq2))
{
$comp_name=$r2['comp_name'];
}
?>
<tr><td><b>Employee No:</b><font color="#FF0000">*</font></td><td colspan="4"><input type="text" name="txt_emple_no" id="txt_emple_no" value="<?php echo $row3['employee_no']; ?>" disabled="disabled" /></td>
<td><b>Employee name:</b></td><td><input type="text" name="txt_emp_name" id="txt_emp_name" value="<?php echo $emp_name; ?>" disabled="disabled" /></td>
</tr>
<tr>
<td><b>Recovery Code:</b><font color="#FF0000">*</font></td><td colspan="4"><input type="text" name="txt_recovery_title" id="txt_recovery_title"  value="<?php echo $row3['recov_title']; ?>" disabled="disabled"/></td><td><b>Compensation Name:</b></td><td><input type="text" name="txt_comp_name" id="txt_comp_name" value="<?php echo $comp_name;  ?>" disabled="disabled" /></td>
</tr>
<?php if($row3['total_amount']=='0')
{
$row3['total_amount']='';
}
 ?>
<tr><td><b>Total Amount:</b><font color="#FF0000">*</font></td><td colspan="6"><input type="text" name="txt_total_amount" id="txt_total_amount" value="<?php echo $row3['total_amount']; ?>" /></td>
</tr>
<?php if($row3['no_of_installments']=='0')
{
$row3['no_of_installments']='';
}
 ?>
 
 <tr><td colspan="8"><center><input type="radio" name="rdb_no_of_intallments" id="rdb_no_of_intallments" value="no_of_intallments" onclick="displaytext();"  checked="checked"/><b>&nbsp;&nbsp;No of installments</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rdb_no_of_intallments" id="rdb_no_of_intallments" value="intallments_after_recovery" onclick="displaytext();" /><b>&nbsp;&nbsp;Installment Amount per salary</b></center></td>
</tr>
<tr><td><b>No of installments:</b><font color="#FF0000">*</font></td><td colspan="6"><input type="text" name="txt_no_of_installments" id="txt_no_of_installments" value="<?php echo $row3['no_of_installments']; ?>" onkeyup="calrecov(this.id)" />
</td></tr>
<?php if($row3['inst_amount']=='0')
{
$row3['inst_amount']='';
}
 ?>	 
<tr><td><b>Installment Amount per salary:</b></td><td colspan="6"><input type="text" name="txt_installment_amount_per_salary" id="txt_installment_amount_per_salary" value="<?php echo $row3['inst_amount']; ?>" onkeyup="calrecov(this.id)"  /></td></tr>

<tr><td><b>Amount Balance After Recovery:</b></td><td colspan="6"><input type="text" name="txt_amount_balance_after_recovery" id="txt_amount_balance_after_recovery" value="<?php echo $row3['balance_amount']; ?>"  disabled="disabled"/></td></tr>

<tr><td><b>Compensation Code:</b></td><td colspan="6">
<select name="cmb_comp_code" id="cmb_comp_code" style="width:215px" disabled="disabled">

<?php
$s3 = mysql_query("select * from comp_head where comp_code='$row3[comp_code]'");
while($r1 = mysql_fetch_assoc($s3))
{
 echo "<option selected='selected' value='$row3[comp_code]'>$row3[comp_code] - $r1[comp_name]</option>";
}
$s2= mysql_query("select * from comp_head");
while($r = mysql_fetch_assoc($s2))
{
  if($r['comp_code'] != $row3['comp_code'])
  {
  	echo "<option value='$r[comp_code]'>$r[comp_code] - $r[comp_name]</option>";
  }
}

$recvstatus = $row3['recov_status'];
?>
</select>
</td></tr>	 

<tr><td><b>Recovery Status:</b></td><td ><b>Open</b><input type="radio" name="rdb_recovery_status" id="rdb_recovery_status" value="Open" <?php if($row3['recov_status'] == 'Open') { ?> checked="checked" <?php } ?> /></td><td><b>Close</b><input type="radio" name="rdb_recovery_status" id="rdb_recovery_status" value="Close" <?php if($row3['recov_status'] == 'Close') { ?> checked="checked" <?php } ?>  disabled="disabled"/></td><td colspan="5"><b>ForeClosed</b><input type="radio" name="rdb_recovery_status" id="rdb_recovery_status" value="Foreclosed" <?php if($row3['recov_status'] == 'Foreclosed') { ?> checked="checked" <?php } ?> /></td></tr>

<tr><td><b>Remark:</b></td><td colspan="6"><input type="text" name="txt_remark_any" id="txt_remark_any" size="30" value="<?php echo $row3['remarks']; ?>" /></td></tr>

<?php
}


if(isset($recvstatus) && ($recvstatus == 'Foreclosed' || $recvstatus == 'Close'))
{
?>
<tr><td colspan="8"><center><input type="button" name="btn_update_recovery" id="btn_update_recovery" value="Update" onclick="update_recovery();" disabled="disabled" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>

<?php 
}
else
{
?>
<tr><td colspan="8"><center><input type="button" name="btn_update_recovery" id="btn_update_recovery" value="Update" onclick="update_recovery();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>

<?php
}
?>
</table></center>



</form>
<center><div id="error6"></div></center>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/jquery-1.4.js"></script>       
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
    
</body>
</html>
