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

var emp_name = document.getElementById('cmb_to_employee_name').value;

	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	http=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	
	http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.onreadystatechange=function()
	{
	
	if (http.readyState==4 &&  http.status==200)
	{
	
	var myTable = document.getElementById('tableDisplay1');
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML = http.responseText;
	   
	}
	}
http.open("GET","employee_leaves_search_one.php?id1="+emp_name,true);
//xmlhttp.open("GET","employee_leaves_search_one.php?id1="+emp_name,true);
http.send();

}


function calculate_total(id) 
{
	
	   var table = document.getElementById('tableDisplay');
       var rowCount = table.rows.length;		  
	   var count=1;	   
	   var temp_count = 1;
	   var count_type = document.getElementById('txt_count_leave_type').value;	
	   //alert(rowCount);
	   //alert(id);
       for(var i=1; i<rowCount; i++) 
	   {    
	        //alert(" outer i "+i);    	   
			var row = table.rows[i];
			var working_day = 0;						
		    var emp_cl = document.getElementById(id).value;		
			
			if(emp_cl!='')
			{
				if(isNaN(emp_cl))
				{
				 alert("Please enter number");		
				 document.getElementById(id).value = '';
				 return false;
				}			 
				
			}					
			var temp_count1 = 1;			
			for(var j=0; j<count_type; j++)
			{
				//alert(" j in innner for "+j);    	   
				//alert('txt_emp_leave_type_onhand'+count+temp_count1);
				var onhand = document.getElementById('txt_emp_leave_type_onhand'+count+temp_count1).value;
				//var leave_type = $("#txt_emp_leave_type"+temp_count1+temp_count).val();
				//alert(onhand);
				if(onhand!='')
				{
					working_day = parseFloat(working_day) + parseFloat(onhand);	
				}
				//alert(working_day);				
				
				temp_count1++;
				//temp_count1++;					
			}	
			
			document.getElementById('txt_emp_total_leave'+count).value = parseFloat(working_day);				
			count++;
	   }
	   
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
<tr><td colspan="15"><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Deposit Leaves</center></font></td></tr>

<tr><td><label><b>Select Employee </b></label></td><td><select name="cmb_to_employee_name" id="cmb_to_employee_name" style="width:200px" onchange="employee_leaves_search();">
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
<td><label><b>Created By : <?php echo $_SESSION['txt_login_name']; ?></b></label></td>
<td><label><b>Created Date : <?php echo date('Y-m-d'); ?></b></label></td>
</tr>
</table></center>

<center><table width="912" border="1" id="tableDisplay">
<thead>
<tr><td width="180"><b><center>Employee Name:<font color="#FF0000">*</font></center></b></td>
<?php
$sq_leaves_type = mysql_query("select * from leaves_type");
$count_leaves_type = mysql_num_rows($sq_leaves_type);
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
{
?>
<td width="42" title="<?php echo strtoupper($res_leaves_type['leave_description']); ?>"><b><center><?php echo strtoupper($res_leaves_type['leave_short_code']); ?></center></b></td><!--<td width="42"><b><center>FL</center></b></td><td width="42"><b><center>EL</center></b></td><td width="42"><b><center>ML</center></b></td><td width="42"><b><center>SP</center></b></td><td width="42"><b><center>Paid Leaves</center></b></td> -->
<?php
}
?>
<td width="42" style="display:none"><b><center>Unpaid Leaves</center></b></td><td width="42"><b><center>Total Leaves</center></b></td></tr>
<input type="text" id="txt_count_leave_type" name="txt_count_leave_type" value="<?php echo $count_leaves_type; ?>" style="display:none" />
</thead>
<tbody>
<?php 	
$sq_employee_no = mysql_query("select * from empl_master,comp_details where comp_details.type_of_sep='' and comp_details.grant_type!='Grantable' and empl_master.employee_no=comp_details.employee_no order by empl_master.emp_code");
$i = 1;

while($res_employee_no = mysql_fetch_assoc($sq_employee_no))
{	



$sq_leaves_type = mysql_query("select * from leaves_type");
$countOne = 1;
$empBalance ="";
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
{
$query = mysql_fetch_assoc(mysql_query("select leavedays_onhand from balanced_leaves where employee_no='".$res_employee_no['employee_no']."' and leave_short_code = '".$res_leaves_type['leave_short_code']."';"));

         $empBalance = $empBalance." ".$res_leaves_type['leave_short_code']."-".$query['leavedays_onhand']." ";
	}
	
	$empBalance = $res_employee_no['first_name']." ".$res_employee_no['middle_name']." ".$res_employee_no['last_name']." ".$empBalance;
	
	
				echo '<tr><td style="display:none">'.'<input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['employee_no'].'" size="8"  /></td>
			<td><input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" size="30" title= "'.$empBalance.'" disabled="disabled" /></td>';
			
			$sq_leaves_type = mysql_query("select * from leaves_type");
			$count = 1;
			$total = 0;
			while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
			{	
			
			$query = mysql_fetch_assoc(mysql_query("select leavedays_onhand from balanced_leaves where employee_no='".$res_employee_no['employee_no']."' and leave_short_code = '".$res_leaves_type['leave_short_code']."';"));
					
			echo '<td style="display:none"><input type="text" name="txt_emp_leave_type'.$i.$count.'" id="txt_emp_leave_type'.$i.$count.'" size="8" value="'.$res_leaves_type['leave_short_code'].'" disabled="disabled"/></td><td><input type="text" name="txt_emp_leave_type_onhand'.$i.$count.'" id="txt_emp_leave_type_onhand'.$i.$count.'" size="8" onkeyup="calculate_total(this.id);" title="'.$query['leavedays_onhand'].' '.strtoupper($res_leaves_type['leave_description']).'"/></td>';
			 $count++;
		    }
			echo '<td style="display:none"><input type="text" name="txt_emp_unpaid_leave'.$i.'" id="txt_emp_unpaid_leave'.$i.'" size="8" onkeyup="calculate_total();" /></td>
			<td><input type="text" name="txt_emp_total_leave'.$i.'" id="txt_emp_total_leave'.$i.'" size="8" disabled="disabled" value="'.$total.'" /></td></tr>';
			
		
	$i++;
}

?>
</tbody>
</table>

<table width="912" border="1"  id="tableDisplay1">
<tbody>
</tbody>
</table>

<table width="912" border="1">
<tr><td align="right" width="50%"><input type="button" name="btn_save" id="btn_save" value=" Save " onclick="add_employee_leaves();" />&nbsp;&nbsp;</td><td>&nbsp;&nbsp;<a href="add_employee_leaves.php"><font color="#FF0033">Select Next Employee</font></a>
</td></tr>
</table>
</form>
<center><b><div id="error"></div></b></center>
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
