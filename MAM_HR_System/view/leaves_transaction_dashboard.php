<?php include("../model/Model.php"); ?>

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

function leave_dashboard_info()
{
    var table = document.getElementById('tblDisplay');
	table.style.display = 'table';
	
	var emp_no = document.getElementById("cmb_to_employee_name").value;  
	var leave_type = document.getElementById("cmb_leave_type").value;
	//alert ("Leave Short code is "+leave_type);
	var from_date = document.getElementById("txt_from_date").value;
	//alert("From Date :"+from_date);
	var to_date = document.getElementById("txt_to_date").value;
	//alert("To Date :"+to_date);
	var status = document.getElementById("txt_status").value;	
				
	var myTable = document.getElementById("tblDisplay");
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML="";
	
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
	var myTable = document.getElementById('tblDisplay');
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML = xmlhttp.responseText; //alert('hiiiii');
	}
	}  
	xmlhttp.open("GET","leaves_transaction_dashboard_filter.php?project_id="+emp_no+"&leave_type="+leave_type+"&from_date="+from_date+"&to_date="+to_date+"&status="+status,true); 
	xmlhttp.send();
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
										
										<div id="container">
		<div id="content" style="padding-top:-1px;">
	<div id="page-wrap">
<center><form action="#" name="frm_leave_management" method="post" onmousemove="validate_emp_code()">
<?php
$count = mysql_num_rows(mysql_query("select leave_application_no from leave_management")) + 1;

$docno= "LA".$count;
?>       

<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Leave Transaction Dashboard</center></font></td></tr></table>
<table border="1" width="900">


<tr>
<td><b>Employee Name&nbsp;<font color="#FF0000">*</font></b></td><td><select name="cmb_to_employee_name" id="cmb_to_employee_name" style="width:150px" onchange="leave_dashboard_info();">
<option value="select">Select</option>
<?php
$sq_emp = mysql_query("select * from empl_master,comp_details where comp_details.type_of_sep='' and comp_details.grant_type!='Grantable' and empl_master.employee_no=comp_details.employee_no order by empl_master.employee_no");
while($row1 = mysql_fetch_assoc($sq_emp))
{
   $trimmed_first_name = explode(" ", $row1['first_name']);
  echo "<option value='$row1[employee_no]'>$row1[last_name] $trimmed_first_name[1] $row1[middle_name]</option>";
  // echo "<option value='$r_emp[employee_no]'>".$r_emp['first_name'].' '.$r_emp['middle_name'].' '.$r_emp['last_name']."</option>";
}
?>
</select>
</td>

<td width="150"><label><b>Select Leave Type&nbsp;<font color="#FF0000">*</font></b></label></td><td>
<select name="cmb_leave_type" id="cmb_leave_type" style="width:150px" onchange="leave_dashboard_info();">
<option value="select">Select</option>
<?php
$sq_leaves_type = mysql_query("select * from leaves_type");
$count_leaves_type = mysql_num_rows($sq_leaves_type);
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
{
 $leave_description =  strtoupper($res_leaves_type['leave_description']);
 $leave_description =  ucwords(strtolower($leave_description));
 echo '<option value="'.$res_leaves_type['leave_short_code'].'">'.$leave_description.'</option>';
}
?>
</select>
</td>

</tr>

<tr>



<td>
<b><font color="#000000">Trans Date: </font> </b></td><td>
<select style="width:120px" name="txt_from_date" id="txt_from_date" onchange="leave_dashboard_info()">
<option value="select">Select</option>
<?php
$sq_trans_date = mysql_query("select distinct trans_date from leaves_transaction");
$count_leaves_type = mysql_num_rows($sq_trans_date);
while($res_leaves_type = mysql_fetch_assoc($sq_trans_date))
{
 echo '<option value="'.$res_leaves_type['trans_date'].'">'.strtoupper($res_leaves_type['trans_date']).'</option>';
}
?>

</select>
</td>

<td><b><font color="#000000">For Date: </font></b></td>
<td><select style="width:120px" name="txt_to_date" id="txt_to_date" onchange="leave_dashboard_info()">
<option value="select">Select</option>
<?php
$sq_trans_date = mysql_query("select distinct for_date from leaves_transaction");
$count_leaves_type = mysql_num_rows($sq_trans_date);
while($res_leaves_type = mysql_fetch_assoc($sq_trans_date))
{
 echo '<option value="'.$res_leaves_type['for_date'].'">'.strtoupper($res_leaves_type['for_date']).'</option>';
}
?>

</select>
</td>




<tr>





<td><b>Transaction Type &nbsp;<font color="#FF0000">*</font></b></td><td><select name="txt_status" id="txt_status" style="width:200px" onchange="leave_dashboard_info();">
<option value="select">Select</option>
<option value="LD">LD-Leave Deposit</option>
<option value="MD">MD-Modify Deposit</option>
<option value="LA">LA-Leave Application</option>
<option value="LC">LC-Leave Cancellation</option>
<option value="Conv-LA">Conv-LA-Leaves Transferred</option>
<?php /*?><?php
	$status = mysql_query("select distinct trans_type from leaves_transaction");
	while($row=mysql_fetch_assoc($status))
	{
	 echo"<option value='$row[trans_type]'>$row[trans_type]</option>";
	}
	?><?php */?>
</select>
</td>

</tr>

</table>

<br />
<br />

<table width="900">
<tr><td colspan="11"><b><center>Leaves Transaction Dashboard</center></b></td></tr>




<?php /*?><?php
echo '<tr>'.'<th width="29">'."".'</th>'.'<th width="50">'."Task Id.".'</th>'.'<th width="190">'."Client Name".'</th>'.'<th width="100">'."Task".'</th>'.'<th width="55">'."Year".'</th>'.'<th width="57">'."Input Id".'</th>'.'<th width="90">'."Assigned to".'</th>'.'<th width="90">'."Created By".'</th>'.'<th width="50">'."Compl-<br>etion %".'</th>'.'<th>'."Task Status".'</th>'.'<th>'."Task Desc".'</th>'.'</tr>';
?></table><?php */?>
</table>

<div style="overflow:auto" class="table">
<table id="tblDisplay" width="900" align="center" class="table-bordered table-hover table_border table-striped" border="2">
<thead>
<tr>
<td><center><font color="#CC0000">Employee Name</font></center></td>
<td><center><font color="#CC0000">Transaction Number</font></center></td>
<td><center><font color="#CC0000">Transaction Date</font></center></td>
<td><center><font color="#CC0000">For Date</font></center></td>
<td><center><font color="#CC0000">Leave Type</font></center></td>
<td><center><font color="#CC0000">Transaction Type</font></center></td>
<td><center><font color="#CC0000">Leave Days</font></center></td>
</tr>
</thead>
<tbody>
<?php
$sq1= "select * from leaves_transaction";

$sq=mysql_query($sq1);
while($row=mysql_fetch_assoc($sq))
{

$sq2= mysql_fetch_assoc(mysql_query("select first_name,middle_name,last_name from empl_master where employee_no='$row[employee_no]'"));
$sq3= mysql_fetch_assoc(mysql_query("select leave_description from leaves_type where leave_short_code='$row[leave_short_code]'"));
echo "<tr>";
echo "<td>$sq2[first_name] $sq2[middle_name] $sq2[last_name]</td>";
echo "<td style='text-align:center'>$row[trans_no]</td>";
$trans_date = date('d-m-Y', strtotime($row['trans_date']));
echo "<td  style='text-align:right'>$trans_date</td>";
$for_date = date('d-m-Y', strtotime($row['for_date']));
echo "<td  style='text-align:right'>$for_date</td>";
//$leave_short_code =  strtoupper($row['leave_short_code']);
//echo "<td style='text-align:center'>$leave_short_code $sq3[leave_description]</td>";
$leave_description =  strtoupper($sq3['leave_description']);
 $leave_description =  ucwords(strtolower($leave_description));
echo "<td> $leave_description</td>";
echo "<td style='text-align:center'>$row[trans_type]</td>";
echo "<td style='text-align:center'>$row[leave_days]</td>";
echo "</tr>";
}

?>
</tbody>
</table>

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
   <script type="text/javascript" src="../js/ajax.js"></script> 
</body>
</html>