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
	function numberOfDays() {
	var month_no = document.getElementById("txt_month_no1").value;

	var year = month_no.substr(0, 4);
	var month = month_no.substr(5, 2);
	
    var d = new Date(year, month, 0);
	//alert(d.getDate());
	document.getElementById("txt_no_days").value = d.getDate();
    return d.getDate();
	}
	
	
	
	
	function showcompcode(str)
{
if (str=="")
{
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
var myTable = document.getElementById('tblcompcode');
var tBody = myTable.getElementsByTagName('tbody')[0];
tBody.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.open("GET","showcompcode.php?id="+str,true);


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
										
										<div id="container">
		<div id="content" style="padding-top:-1px;">
	<div id="page-wrap">
		
		<div id="tabs">
		
    		<ul>
        		<li><a href="#fragment-1">Compensation Heads</a></li>
        		<li><a href="#fragment-2">Grade wise compensation</a></li>
        		<li><a href="#fragment-3">Month Control</a></li>
				<li><a href="#fragment-4">Batch Header</a></li>
    	   </ul>
	
        	<div id="fragment-1" class="ui-tabs-panel">
			
<form action="#" method="post" name="frm_comensation_heads">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Compensation Heads</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >

<tr><td><b>Select Type: </b></td>
<td colspan="4"><select name="cmb_type" id="cmb_type" style="width:200px" onchange="showcompcode(this.value)">
<option selected="selected" value="select">Select</option>
<option value="E">Earnings</option>
<option value="D">Deductions</option>
<option value="F">Fixed</option>
<option value="X">X-as and when needed</option>
</select>
</td>
</tr>

<tr><td><b>Compensation Code:</b><font color="#FF5F55">*</font></td><td><table id="tblcompcode"><tbody></tbody></table><!--<input type="text" name="txt_comp_code" id="txt_comp_code"  size="20" /> --></td>
<td><b>Code Name:</b><font color="#FF5F55">*</font></td><td><input type="text" name="txt_code_name" id="txt_code_name" /></td></tr>
<tr><td><b>Code Description</b></td><td colspan="5"><textarea name="txt_code_desc" id="txt_code_desc" cols="50" rows="3" ></textarea></td></tr>	 
<tr><td><b>When to pay this code </b></td><td><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="P" /><b> P - Payroll</b></td><td><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="A" /><b> A - Once in year</b></td><td><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="X" /><b> X - as and when needed</b></td></tr>
	 
<tr><td><b>PF Computation</b></td><td><input type="radio" name="rdb_pf_Compute" id="rdb_pf_Compute" value="Y" /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_pf_Compute" id="rdb_pf_Compute" value="N" /><b>NO</b></td></tr>
<tr><td><b>Prof Tax Computation </b></td><td><input type="radio" name="rdb_pt_Compute" id="rdb_pt_Compute" value="Y" /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_pt_Compute" id="rdb_pt_Compute" value="N" /><b>NO</b></td></tr>
<td><b>ESI Tax Computation </b></td><td><input type="radio" name="rdb_esi_Compute" id="rdb_esi_Compute" value="Y" /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_esi_Compute" id="rdb_esi_Compute" value="N" /><b>NO</b></td></tr>	 
 
<tr><td colspan="5"><center><input type="button" name="btn_add_compensation_heads" id="btn_add_compensation_heads" value="Save" onclick="add_compensation_heads();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>


</form>
<center><div id="error1"></div></center>

<!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->

</div>

	  
	  
	   <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
	  
	   <form action="#" method="post" name="frm_grade_wise_compensation">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Grade wise compensation</center></font></td></tr></table>
<center><table class="listing" border="1" width="800">
<tr><td width="210"><b>Grade:</b><font color="#FF5F55">*</font></td><td>
<select  name="txt_grade" id="txt_grade" style="width:100px">
<option value="select">Select</option>
<?php
$sq_grade = mysql_query("select * from grade_master");
while($r_grade = mysql_fetch_assoc($sq_grade))
{
  echo "<option value='$r_grade[grade]'>$r_grade[grade]</option>";
}

?>
</select>
<!--<input type="text" name="txt_grade" id="txt_grade" /> --></td>
</tr>
<tr><td colspan="2">
         <INPUT type="button" value="Add Row" onClick="addRow1('tblgradecomp')" />
    	 <INPUT type="button" value="Delete Row" onClick="deleteRow1('tblgradecomp')" />
</td></tr>
</table>
<table id="tblgradecomp" width="800" border="1" class="listing">
<tr><td><INPUT type="checkbox" name="chk[]" /></td>
<td><b>Compensation Code:</b><font color="#FF5F55">*</font></td>
<td><select name="txt_compe_code" id="txt_compe_code" style="width:250px">
<option selected="selected" value="select">Select</option>
<?php
$sq = mysql_query("select * from comp_head where comp_code LIKE 'E%' OR comp_code LIKE 'D%' order by comp_code");
while($r = mysql_fetch_assoc($sq))
{
  echo "<option value='$r[comp_code]'>$r[comp_code] - $r[comp_name]</option>";
}
?>
</select>
</td>
<td><b>Amount</b><font color="#FF5F55">*</font></td><td><input type="text" name="txt_amounts" id="txt_amounts" /></td></tr>
			 </table>
			 
<tr><td colspan="5"><center><input type="button" name="btn_add_grade_wise_compensation" id="btn_add_grade_wise_compensation" value="Save" onclick="add_grade_wise_compensation();"  /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>
</form>

<center><div id="error3"></div></center>
</div>

	   <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide"> 
	   <form action="#" method="post" name="frm_month_control">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Month Control</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Month No:</b><font color="#FF5F55">*</font></td><td colspan="4"><input type="text" name="txt_month_no1" id="txt_month_no1" value="<?php echo date('Y-m'); ?>" /><button id="f_btn1">...</button></td>
</tr>
<tr><td><b>Month Active:</b><font color="#FF5F55">*</font></td><td><b>Active</b><input type="radio" name="rdb_month_avtive" id="rdb_month_avtive" value="Y" checked="checked" /></td><td><b>Closed</b><input type="radio" name="rdb_month_avtive" id="rdb_month_avtive" value="N" /></td>
</tr>

<tr><td><b>No of Calendar Days in Month</b><font color="#FF5F55">*</font></td><td colspan="3"><input type="text" name="txt_no_days" id="txt_no_days"  onfocus="numberOfDays();" /></td></tr>
	 
<tr><td><b>Per Day Divisor</b><font color="#FF5F55">*</font></td><td colspan="3"><input type="text" name="txt_per_day_divisor" id="txt_per_day_divisor" /></td></tr>

<tr><td><b>Dearness Allowance Index</b></td><td colspan="3"><input type="text" name="txt_da_index" id="txt_da_index" /></td></tr>
	 
<tr><td colspan="5"><center><input type="button" name="btn_add_month_control" id="btn_add_month_control" value="Save" onclick="add_month_control();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_month_no1",
        trigger    : "f_btn1",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m"
      });
</script>
</form>


       
							<center>		 <div id="error4"></div></center>
							
							<br /><br /><br />
						<center>	<table border="1" width="800">
<tr><td width="200"><b>Month Number</b></td><td width="200"><b>Status</b></td><td width="200"><b>Number of Days in Month</b></td><td width="200"><b>Per Day Devisor</b></td></tr>
<?php
 $prev_month = date('Y-m', strtotime(date('Y-m')." -1 month"));
 $sq_prev_month = mysql_query("select * from month_control where month_no='$prev_month'");
 while($r_prev_month = mysql_fetch_assoc($sq_prev_month))
 {
     if($r_prev_month['month_active'] == 'Y')
	 {
	   $status = "Active";
	 }
	 else
	 {
	   $status = "Inactive";
	 }
    echo '<tr>'.'<td>'.$prev_month.'</td>'.'<td>'.$status.'</td>'.'<td>'.$r_prev_month['no_days'].'</td>'.'<td>'.$r_prev_month['per_day_divisor'].'</td>'.'</tr>';
  }
  
  $month_number = $prev_month;
  
  $prev_month = date('Y-m', strtotime($month_number." -1 month"));
 $sq_prev_month = mysql_query("select * from month_control where month_no='$prev_month'");
 while($r_prev_month = mysql_fetch_assoc($sq_prev_month))
 {
  if($r_prev_month['month_active'] == 'Y')
	 {
	   $status = "Active";
	 }
	 else
	 {
	   $status = "Inactive";
	 }
    echo '<tr>'.'<td>'.$prev_month.'</td>'.'<td>'.$status.'</td>'.'<td>'.$r_prev_month['no_days'].'</td>'.'<td>'.$r_prev_month['per_day_divisor'].'</td>'.'</tr>';
  }
  
  $month_number = $prev_month;
   
 $prev_month = date('Y-m', strtotime($month_number." -1 month"));
 $sq_prev_month = mysql_query("select * from month_control where month_no='$prev_month'");
 while($r_prev_month = mysql_fetch_assoc($sq_prev_month))
 {
  if($r_prev_month['month_active'] == 'Y')
	 {
	   $status = "Active";
	 }
	 else
	 {
	   $status = "Inactive";
	 }
    echo '<tr>'.'<td>'.$prev_month.'</td>'.'<td>'.$status.'</td>'.'<td>'.$r_prev_month['no_days'].'</td>'.'<td>'.$r_prev_month['per_day_divisor'].'</td>'.'</tr>';
  }
  ?>

</table></center>
									 
</div>


<div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">
<form action="#" method="post" name="frm_batch">
<?php 
$month_active_no = '';
$sq = mysql_query("select * from month_control where month_active='Y'");
while($r = mysql_fetch_assoc($sq))
{
  $month_active_no = $r['month_no'];
}
?>
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Batches For Month <?php  echo $month_active_no  ?></center></font></td></tr></table>
<center><table width="800" border="1">
 <tr><td width="200"><b><center>Batch No.</center></b></td><td><b><center>Remark</center><b></td></tr>
 </table></center>
<?php 

$sq_month_details = mysql_query("select * from batch_hdr where month_no='$month_active_no'");
 while($month_details = mysql_fetch_assoc($sq_month_details))
 {
 ?>
 <center><table width="800" border="1">
<tr><td width="200"><?php echo $month_details['batch_no'] ?></td><td><?php echo $month_details['remark'] ?></td></tr>
 </table>
 </center>
 
 <?php }
?>
<br /><br />
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Batch Header</center></font></td></tr></table>
<br />

<?php
$sq_month = mysql_query("select * from month_control where month_active='Y'");
$num_row_month = mysql_num_rows($sq_month);

if($num_row_month == 0)
{
 echo '<b>'.'<center>'.'No month is Active, Can not add Batch Details'.'</center>'.'</b>';
 //exit(0); 
}
else
{
?>

<center><table class="listing" border="1" width="800">
<tr><td><b>Batch No:</b><font color="#FF5F55">*</font></td><td colspan="3"><input type="text" name="txt_batch_no" id="txt_batch_no" /></td>
</tr>
<tr>
<td><b>Month No:</b><font color="#FF5F55">*</font></td><td colspan="3">
<?php
$month_active_no = '';
$sq = mysql_query("select * from month_control where month_active='Y'");
while($r = mysql_fetch_assoc($sq))
{
  $month_active_no = $r['month_no'];
}
?>

<input type="text" name="txt_month_no" id="txt_month_no" value="<?php echo $month_active_no; ?>" disabled="disabled"  /> 
</td>
</tr>
<tr><td><b>Remark:</b></td><td colspan="3"><textarea name="txt_remark" id="txt_remark" cols="50" rows="3" ></textarea></td>
</tr>
<tr><td colspan="15">
 <INPUT type="button" value="Add Row" onClick="addRow1('tblbatchdtls')" />
 <INPUT type="button" value="Delete Row" onClick="deleteRow1('tblbatchdtls')" /></td></tr>
<tr><td width="215"><b><center>Employee No.<font color="#FF5F55">*</font></center></b></td><td width="200"><b><center>Compensation Code<font color="#FF5F55">*</font></center></b></td><td width="182"><b><center>Adjustment Amount<font color="#FF5F55">*</font></center></b></td><td><b><center>Remark</center></b></td></tr>
</table>

<table class="listing" border="1" width="800" id="tblbatchdtls">
<tr>
<td><INPUT type="checkbox" name="chk[]"/></td>
<td><select name="txt_employee_number" id="txt_employee_number" style="width:185px;">
<option selected="selected" value="select">Select</option>
<?php
$sql1 = mysql_query("select * from empl_master order by employee_no");
while($row1 = mysql_fetch_assoc($sql1))
{
  echo "<option value='$row1[employee_no]'>$row1[employee_no] - $row1[first_name] $row1[middle_name] $row1[last_name]";
}
?>
</td>
<td><select name="txt_comps_code" id="txt_comps_code" style="width:180px;">
<option selected="selected" value="select">Select</option>
<?php
$sql2 = mysql_query("select * from comp_head where comp_code LIKE 'E%' OR comp_code LIKE 'D%' OR comp_code LIKE 'F%' order by comp_code");
while($row2 = mysql_fetch_assoc($sql2))
{
  echo "<option value='$row2[comp_code]'>$row2[comp_code] - $row2[comp_name]</option>";
}
?>
</select> <!--<input type="text" name="txt_comps_code" id="txt_comps_code" /> --></td>
<td><input type="text" name="txt_adjustment_amount" id="txt_adjustment_amount" size="20" /></td>
<td><input type="text" name="txt_remark_any" id="txt_remark_any" size="20" /></td>
</tr>
</table>

<table width="900"> 
<tr><td colspan="8"><center><input type="button" name="btn_add_batch_details" id="btn_add_batch_details" value="Save" onclick="add_batch();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table>
</center>
<?php
}

?>
</form>
										<center><div id="error7"></div></center>
<!--<script type="text/javascript" src="../js/ajax.js"></script>
 --><!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->

	     </div>


 
	  </div></div></div>    
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
