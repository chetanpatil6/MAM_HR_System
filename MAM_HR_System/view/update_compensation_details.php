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
	function validate()
	{
	     var emp_info = '';
		 var employee_info = '';
		 for (var i=0; i < document.reprt.employee_info.length; i++)
  		 {
   			if (document.reprt.employee_info[i].checked)
     		 {
       			 emp_info = document.reprt.employee_info[i].value;
     		 }
   		}
		
		for (var i=0; i < document.reprt.emp_info.length; i++)
  		 {
   			if (document.reprt.emp_info[i].checked)
     		 {
       			 employee_info = document.reprt.emp_info[i].value;
     		 }
   		}
    
  		 if(emp_info == '' || employee_info == '' )
  		 {
    		 alert("Select Radio Button");
			 return false;
   		}
	}
	
	
function copyaddr()
{
var chk = document.getElementById('chk');

if(chk.checked == true)
{
   document.getElementById('txt_permanent_addr_1').value = document.getElementById('txt_present_addr_1').value;
   document.getElementById('txt_permanent_addr_2').value = document.getElementById('txt_present_addr_2').value;
    document.getElementById('txt_permanent_addr_3').value = document.getElementById('txt_present_addr_3').value;
	document.getElementById('txt_permanent_city').value = document.getElementById('txt_present_city').value;
	document.getElementById('txt_permanent_pin_code').value = document.getElementById('txt_present_pin_code').value;
	document.getElementById('txt_permanent_state').value = document.getElementById('txt_present_state').value;
	document.getElementById('txt_permanent_country').value = document.getElementById('txt_present_country').value;
 }
 else
 {
   document.getElementById('txt_permanent_addr_1').value = '';
   document.getElementById('txt_permanent_addr_2').value = '';
   document.getElementById('txt_permanent_addr_3').value = '';
   document.getElementById('txt_permanent_city').value = '';
   document.getElementById('txt_permanent_pin_code').value = '';
   document.getElementById('txt_permanent_state').value = '';
   document.getElementById('txt_permanent_country').value = '';
 }
}
</script>

<script type="text/javascript">
function caltotal()
{

var a = document.getElementById('txt_basic').value;
var b = document.getElementById('txt_dearness_pay').value;
var c = document.getElementById('txt_da').value;
var d = document.getElementById('txt_hra').value;
var e = document.getElementById('txt_lta').value;
var f = document.getElementById('txt_conveyance').value;
var g = document.getElementById('txt_special').value;
var total = parseFloat(a) + parseFloat(b) + parseFloat(c) + parseFloat(d) + parseFloat(e) + parseFloat(f) + parseFloat(g); 
total = total.toFixed(2);
document.getElementById('txt_gross_salary').value = total;
tot=parseFloat(total)*12;
document.getElementById('txt_ctc').value = tot;
}

</script>

<SCRIPT language="javascript">
function copyname()
{
var emp_code = document.getElementById('txt_emp_no1').value;
var first_name = document.getElementById('txt_first_name').value;
document.getElementById('txt_emp_name1').value=first_name;
document.getElementById('txt_emp_name2').value=first_name;
document.getElementById('txt_emp_name3').value=first_name;
document.getElementById('txt_emp_name4').value=first_name;
document.getElementById('txt_emp_no2').value=emp_code;
document.getElementById('txt_emp_no3').value=emp_code;
document.getElementById('txt_emp_no4').value=emp_code;
document.getElementById('txt_emp_no5').value=emp_code;
}

    </SCRIPT>
	
<SCRIPT language="javascript">



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
		
		
		function run(id)
{
 			var table = document.getElementById('empcomptable');
			var rowCount = table.rows.length;
               
				Calendar.setup({
        					inputField : "txt_comp_change_eff_date"+id,
        					trigger    : id,
        					onSelect   : function() { this.hide() },
        					showTime   : 12,
        					dateFormat : "%Y-%m-%d"
      				});
}
 
    </SCRIPT>

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
    <script type="text/javascript">
		
		
function displayrow(str)
{
  if(str == 'P')
  {
     document.getElementById("displayrow").style.display = 'none';
  }
  else
  {
    document.getElementById("displayrow").style.display = 'block';
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
                                            
                     <form action="#" method="post" name="frm_comensation_heads">
				<?php
$emp_no = $_POST['cmb_comp_code'];
$sql = mysql_query("select * from comp_head where comp_code='$emp_no'");
while($row = mysql_fetch_assoc($sql))
{
?>					  
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Update Compensation Details</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Compensation Code:</b><font color="#FF0000">*</font></td><td><input type="text" name="txt_comp_code" id="txt_comp_code"  size="20" value="<?php echo $row['comp_code']; ?>" disabled="disabled" /></td>
<td><b>Code Name:</b><font color="#FF0000">*</font></td><td><input type="text" name="txt_code_name" id="txt_code_name" value="<?php echo $row['comp_name']; ?>" /></td></tr>
<tr><td><b>Code Description</b></td><td colspan="5"><textarea name="txt_code_desc" id="txt_code_desc" cols="50" rows="3" ><?php echo $row['code_descr']; ?></textarea></td></tr>	 
<tr><td><b>When to pay this code </b></td><td><b>P - Payroll</b><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="P"  onclick="displayrow(this.value)" <?php 
if($row['pay_when']=='P')
{
?> checked="checked" <?php } ?>  /></td><td><b>A - Once in year</b><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="A"  onclick="displayrow(this.value)" <?php 
if($row['pay_when']=='A')
{
?> checked="checked" <?php } ?>  /></td><td><b>X - as and when needed</b><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="X"  onclick="displayrow(this.value)" <?php 
if($row['pay_when']=='X')
{
?> checked="checked" <?php } ?>  /></td></tr>
	 
<tr><td><b>PF Computation</b></td><td><input type="radio" name="rdb_pf_Compute" id="rdb_pf_Compute" value="Y" <?php 
if($row['pf_compute']=='Y')
{
?> checked="checked" <?php } ?>  /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_pf_Compute" id="rdb_pf_Compute" value="N" <?php 
if($row['pf_compute']=='N')
{
?> checked="checked" <?php } ?>  /><b>NO</b></td></tr>
<tr><td><b>Prof Tax Computation </b></td><td><input type="radio" name="rdb_pt_Compute" id="rdb_pt_Compute" value="Y" <?php 
if($row['pt_compute']=='Y')
{
?> checked="checked" <?php } ?>  /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_pt_Compute" id="rdb_pt_Compute" value="N" <?php 
if($row['pt_compute']=='N')
{
?> checked="checked" <?php } ?>  /><b>NO</b></td></tr>
<td><b>ESI Tax Computation </b></td><td><input type="radio" name="rdb_esi_Compute" id="rdb_esi_Compute" value="Y"  <?php 
if($row['esi_compute']=='Y')
{
?> checked="checked" <?php } ?> /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_esi_Compute" id="rdb_esi_Compute" value="N" <?php 
if($row['esi_compute']=='N')
{
?> checked="checked" <?php } ?> /><b>NO</b></td></tr>	 
	
 
	 
<tr><td colspan="5"><center><input type="button" name="btn_update_compensation_heads" id="btn_update_compensation_heads" value="Update" onclick="update_compensation_heads();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>

 <?php
}
 ?>
</table></center>


</form>                        
                                             
 <center>  <div id="error1"></div></center>
                                              
                                            	
                                                
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
