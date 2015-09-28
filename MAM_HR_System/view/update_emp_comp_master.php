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
        function check_field(id) {
            var field = document.getElementById(id);
 
            if (isNaN(field.value)) {
                alert('Not a number');
				
				field.value='';
            }
        }
    </script>
	
	<script type="text/javascript">
 function foo() {

    if( typeof foo.counter == 'undefined' ) {
        foo.counter = 1;
    }
    foo.counter++;
	var table = document.getElementById('empcomptable');
 
            var rowCount = table.rows.length;
			
	for(var i=0; i<rowCount; i++)
	{
		var row = table.rows[i];
	}
	
	row.cells[3].childNodes[0].setAttribute("id", foo.counter);
	row.cells[2].childNodes[0].setAttribute("id", "txt_comp_change_eff_date"+foo.counter);
	}
	
	
        function addRow1(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }foo();
        }
 
        function deleteRow1(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
	
	</script>
	
	
	
<script type="text/javascript">
function run(id)
{
 			//var table = document.getElementById('empcomptable');
			//var rowCount = table.rows.length; 
				Calendar.setup({
        					inputField : "txt_comp_change_eff_date"+id,
        					trigger    : id,
        					onSelect   : function() { this.hide() },
        					showTime   : 12,
        					dateFormat : "%Y-%m-%d"
      				});
}

</script>


	
    <!--
    Created by Artisteer v2.3.0.23326
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php echo $_SESSION['company_name']; ?></title>

    <script type="text/javascript" src="script.js"></script>
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
						  <br /><a href="change_password.php"><font size="-2">Change Password</font></a>
						 </td></tr></table>
						 </form>
                        <!--<div id="slogan-text" class="art-Logo-text">Slogan text</div> -->
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
					<!--<script type="text/javascript" src="main_menu.js"></script> -->
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

<li><a href="employee_dashboard.php"><span class="l"></span><span class="r"></span><span class="t">Dashboard</span></a>
<ul>
<li><a href="employee_dashboard.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Employee Dashboard</font></span></a></li>
<li><a href="employee_attendance_dashboard.php"><span class="l"></span><span class="r"></span><span class="t"><font color="#000000">Employee Attendance Dashboard</font></span></a></li>
</ul>
</li>

<li><a href="payroll_process.php"><span class="l"></span><span class="r"></span><span class="t">Payroll Process</span></a></li>
<li><a href="reports.php"><span class="l"></span><span class="r"></span><span class="t">Reports</span></a></li>
<li><a href="transfer_employees.php"><span class="l"></span><span class="r"></span><span class="t">Move Employees</span></a></li>


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
										
										
							 <form action="#" method="post" name="frm_compensation_master">
							 <?php
$emp_no = $_POST['rdb_emp_no'];
$sql = mysql_query("select * from emp_comp_master where employee_no='$emp_no'");
while($row = mysql_fetch_assoc($sql))
{
?>				
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Employee Compensation Master</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Employee No:</b><font color="#FF0000">*</font></td><td><input type="text" name="txt_emp_code" id="txt_emp_code" value="<?php echo $row['employee_no'] ?>" disabled="disabled" /></td>
<?php
$sr1 = mysql_query("select * from empl_master where employee_no='$emp_no'");
while($rr1 = mysql_fetch_assoc($sr1))
{
?>
<td><b>Name:</b></td><td><input type="text" name="txt_emp_name" id="txt_emp_name" disabled="disabled" value="<?php echo $rr1['first_name']." ".$rr1['middle_name']." ".$rr1['last_name']; ?>" title="<?php echo $rr1['first_name']." ".$rr1['middle_name']." ".$rr1['last_name']; ?>" /></td>
<?php
}
?>
</tr>
<tr><td width="253"><b><center>Compensation Code:<font color="#FF0000">*</font></center></b></td><td width="278"><b><center>Comp. Change Effective Date<font color="#FF0000">*</font></center></b></td><td colspan="2"><b><center>Amount<font color="#FF0000">*</font></center></b></td></tr>
</table>

	 <table width="800" id="empcomptable" border="1">
	 <?php 
	 $i = 1;
	 $s1 = mysql_query("select * from emp_comp_master_lines where employee_no='$row[employee_no]'");
	 while($row1 = mysql_fetch_assoc($s1))
	 {
	 $sq_comp_head = mysql_query("select comp_code, comp_name from comp_head where comp_code='$row1[comp_code]'");
	 while($r_comp_head = mysql_fetch_assoc($sq_comp_head))
	 {
	   $comp_name = $r_comp_head['comp_name'];
	 }
	 if($row1['comp_code'] == 'D0008' || $row1['comp_code'] == 'D0007' || $row1['comp_code'] == 'F0001' || $row1['comp_code'] == 'F0002' || $row1['comp_code'] == 'F0003' || $row1['comp_code'] == 'F0004' || $row1['comp_code'] == 'D0012')
	 {
	 echo '<tr>'.'<td>'.'<input type="text" name="txt_comp_code'.$i.'" disabled="disabled" id="txt_comp_code'.$i.'" value="'.$row1['comp_code'].'" size="30" style="display:none" /><input type="text" name="txt_comp_code_name'.$i.'" disabled="disabled" id="txt_comp_code_name'.$i.'" value="'.$comp_name.'" title="'.$comp_name.'" size="30" />'.'</td>'.'<td>'.'<input type="text" name="txt_comp_change_eff_date'.$i.'" id="txt_comp_change_eff_date'.$i.'" value="'.$row1['comp_change_eff_date'].'" size="30"  disabled="disabled"/>'.'</td>'.'<td>'.'<input type="button" name="'.$i.'" id="'.$i.'" value="..." onClick="run(this.id)" />'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['amount'].'" size="30" disabled="disabled" />'.'</td>'.'</tr>';
	 }
	 
	 else
	 {
	 
	 	 echo '<tr>'.'<td>'.'<input type="text" name="txt_comp_code'.$i.'" disabled="disabled" id="txt_comp_code'.$i.'" value="'.$row1['comp_code'].'" size="30" style="display:none" /><input type="text" name="txt_comp_code_name'.$i.'" disabled="disabled" id="txt_comp_code_name'.$i.'" value="'.$comp_name.'" title="'.$comp_name.'" size="30" />'.'</td>'.'<td>'.'<input type="text" name="txt_comp_change_eff_date'.$i.'" id="txt_comp_change_eff_date'.$i.'" value="'.$row1['comp_change_eff_date'].'" size="30" disabled="disabled"
		  />'.'</td>'.'<td>'.'<input type="button" name="'.$i.'" id="'.$i.'" value="..." onClick="run(this.id)" />'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['amount'].'" size="30" />'.'</td>'.'</tr>';
	 }
	 
	 $i = $i + 1;
	 }
	 ?>
	 
</table>
	
<?php } ?>	 	 
	 
<tr><td colspan="5"><center><input type="button" name="btn_update_emp_compensation" id="btn_update_emp_compensation" value="Update" onclick="update_emp_compensation();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_comp_change_eff_date",
        trigger    : "f_btn",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>


</form>
								<center><div id="error2"></div></center>

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
