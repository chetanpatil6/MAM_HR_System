<?php include('../model/Model.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<script src="../calendar/src/js/jscal2.js"></script>
    <script src="../calendar/src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/steel/steel.css" />
<script type="text/javascript">
	function employee_leaves_search()
{

var emp_name = document.getElementById('cmb_to_employee_name').value;


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
	var myTable = document.getElementById('tableDisplay');
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML = xmlhttp.responseText;
	
	}
	}
xmlhttp.open("GET","employee_leaves_search.php?id1="+emp_name,true);
xmlhttp.send();
}

function show_emp_leave_tranfer_history()
{

	var emp_name = document.getElementById('cmb_to_employee_name').value;
//var month = document.getElementById('txt_month').value;
   if(emp_name == 'select')
   {
   		alert("Please select employee");
		return false;
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
	var myTable = document.getElementById('tableDisplay');
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML = xmlhttp.responseText;
	
	}
	}
xmlhttp.open("GET","show_emp_leave_tranfer_history.php?id1="+emp_name,true);
xmlhttp.send();
}

function current_leaves_search()
{

var emp_name = document.getElementById('cmb_to_employee_name').value;


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
	var myTable = document.getElementById('tableDisplay');
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML = xmlhttp.responseText;
	
	}
	}
xmlhttp.open("GET","current_leaves_search.php?id1="+emp_name,true);
xmlhttp.send();
}


</script>


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
	<script type="text/javascript" src="tab_js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="tab_js/jquery-ui-1.7.custom.min.js"></script>

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
<li><a href="leaves_dashboard.php"><span class="l"></span><span class="r"></span><span class="t">Leaves Dashboard</span></a><ul>
	<li><a href="leaves_dashboard.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leaves Management Dashboard</font></span></a></li>
<li><a href="leaves_transaction_dashboard.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Leaves Transaction Dashboard</font></span></a></li>
</ul>
</li>
<?php
if($_SESSION['role'] == 'Admin')
{
?>
	<li><a href="personal_info.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>
	
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


<form action="#" name="personal_info" method="post" onsubmit="return validatemalefemale()" onmousemove="validate_emp_code()">          
<center><table width="912" border="1">
<tr><td colspan="15"><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Transfer Leaves </center></font></td></tr>
<tr><td><label><b>Select Employee </b></label></td><td colspan="3"><select name="cmb_to_employee_name" id="cmb_to_employee_name" style="width:200px" onchange="current_leaves_search();">
<option value="select">Select</option>
<?php
$sq_emp = mysql_query("select * from empl_master,comp_details where comp_details.type_of_sep='' and comp_details.grant_type!='Grantable' and empl_master.employee_no=comp_details.employee_no order by empl_master.employee_no");
while($r_emp = mysql_fetch_assoc($sq_emp))
{
    $trimmed_first_name = explode(" ",$r_emp['first_name']);
   echo "<option value='$r_emp[employee_no]'>".$r_emp['last_name'].' '.$trimmed_first_name[1].' '.$r_emp['middle_name']."</option>";
}
?>
</select>
</td><td><label><b>Created Date</b></label></td><td><input type="text" id="txt_date" name="txt_date" value="<?php echo date('Y-m-d'); ?>" disabled="disabled" /></td></tr>
<tr><td><label><b>Transfer from</b></label></td><td><select name="cmb_transfer_from" id="cmb_transfer_from" style="width:200px" onchange="month_leave_attendance();">
<option value="select">Select</option>
<!--<option value="cl">CL</option>
<option value="fl">FL</option>
<option value="el">EL</option>
<option value="ml">ML</option>
<option value="sp">SP</option> -->
<?php
$sq_leaves_type = mysql_query("select * from leaves_type");
$count_leaves_type = mysql_num_rows($sq_leaves_type);
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
{
 echo '<option value="'.$res_leaves_type['leave_short_code'].'">'.strtoupper($res_leaves_type['leave_short_code']).'</option>';
}
?>
</select>
</td>
<td><label><b>Enter Leaves to Transfer</b></label></td><td><input type="text" name="txt_leaves_transfer" id="txt_leaves_transfer" size="10"  /></td>
<td><label><b>Transfer To</b></label></td><td><select name="cmb_transfer_to" id="cmb_transfer_to" style="width:200px" onchange="month_leave_attendance();">
<option value="select">Select</option>
<?php
$sq_leaves_type1 = mysql_query("select * from leaves_type");
$count_leaves_type = mysql_num_rows($sq_leaves_type);
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type1))
{
 echo '<option value="'.$res_leaves_type['leave_short_code'].'">'.strtoupper($res_leaves_type['leave_short_code']).'</option>';
}
?>
</select>
</td>
</tr>

<!--<tr><td colspan="10"><center><label><b>Current Leaves</b></label></center></td></tr>
<tr><td width="42"><b><center>CL</center></b></td><td width="42"><b><center>FL</center></b></td><td width="42"><b><center>EL</center></b></td><td width="42"><b><center>ML</center></b></td><td width="42"><b><center>SP</center></b></td><td width="42"><b><center>Total Leaves</center></b></td></tr>
<!--?php

$sq_leave_master = mysql_query("select * from total_leaves_master LIMIT 1");
$total = 0;
while($res_leave_master = mysql_fetch_assoc($sq_leave_master))
{
	$total = $res_leave_master['cl'] + $res_leave_master['fl'] + $res_leave_master['ml'];
?>
<tr><td><input type="text" name="txt_current_cl" id="txt_current_cl" size="10" value="<?php //echo $res_leave_master['cl']; ?>" disabled="disabled" /></td><td><input type="text" name="txt_current_fl" id="txt_current_fl" size="10" value="<?php //echo $res_leave_master['fl']; ?>" disabled="disabled"/></td><td><input type="text" name="txt_current_el" id="txt_current_el" size="10" value="<?php //echo $res_leave_master['fl']; ?>" disabled="disabled"/></td><td><input type="text" name="txt_current_ml" id="txt_current_ml" size="10" value="<?php //echo $res_leave_master['ml']; ?>" disabled="disabled" /></td><td><input type="text" name="txt_current_sp" id="txt_current_sp" size="10" value="<?php //echo $res_leave_master['ml']; ?>" disabled="disabled" /></td><td><input type="text" name="txt_current_total_leave" id="txt_current_total_leave" size="10" value="<?php //echo $total ; ?>" disabled="disabled" /></td></tr>
<?php
//}
?>-->
<tr><td colspan="10"><center><input type="button" name="btn_save" id="btn_save" value=" Save " onclick="add_leave_transfer_type();"  /><input type="button" name="btn_show" id="btn_show" value=" Show " onclick="show_emp_leave_tranfer_history();" style="display:none"  /></center></td></tr>
</table>
</center>
</form>

<center><b><div id="error"></div></b></center>
<center><table width="912" border="1" id="tableDisplay">
<tbody>
</tbody></table>
 <script type="text/javascript" src="../js/ajax.js"></script> 

 <div class="art-PostContent">

                                         <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />      
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
