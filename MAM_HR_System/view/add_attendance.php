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
	function attendance_sheet_import()
	{
	  var csv_file_name = document.getElementById('upload_file').value;
	  if(csv_file_name=='')
		{
	 		alert("Please Import Attendance Sheet");	
	 		return false;
		}
	}
	</script>
	
	<script type="text/javascript">
	function loadFile() {
	// Retrieve the FileList object from the referenced element ID
	var myFileList = document.getElementById('upload_file').files;
	
	var csv_file_name = document.getElementById('upload_file').value;
	
	if(csv_file_name=='')
	{
	 alert("Please Import Attendance Sheet");	
	 return false;
	}
 
	// Grab the first File Object from the FileList
	var myFile = myFileList[0];
 
	// Set some variables containing the three attributes of the file
	var myFileName = myFile.name;
	var myFileSize = myFile.size;
	var myFileType = myFile.type;
 
 	var file_name = myFileName;
	var str = myFileName;
	var file_type = str.substr(-3)
    if(file_type!='csv')
	{
	alert("Import csv File Format");
	return false;
	}

	
	// Alert the information we just gathered
	alert("FileName: " + myFileName + "- FileSize: " + myFileSize + " - FileType: " + myFileType);
 
	// Let's upload the complete file object
	uploadFile(myFile);
}

function uploadFile(myFileObject) {
	// Open Our formData Object
	var formData = new FormData();
 
	// Append our file to the formData object
	// Notice the first argument "file" and keep it in mind
	formData.append('my_uploaded_file', myFileObject);

	// Create our XMLHttpRequest Object
	var xhr = new XMLHttpRequest();
 
	// Open our connection using the POST method
	xhr.open("POST", '../controller/upload_file.php');

	// Send the file
	xhr.send(formData);
}

//////////////////////////////////////////////////////////////////////////table Attendance///////////
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



function transfer_attendance()
{

    var month = document.getElementById('cmb_month').value;

	if(month == 'select')
	{
		alert("Please select month");
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
	
	
xmlhttp.open("GET","transfer_attendance.php?id1="+month,true);
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
										
<form name="get_attendance_sheet" id="get_attendance_sheet" action="../excel/attendance_template.php" method="post">
<center>
<table width="950" class="listing" border="1"><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Add Attendance</center></font>
	<tr>
		<td><input type="submit" name="btn_get_attendance_template" id="btn_get_attendance_template" value="Get Attendance Template" /> <input type="button" name="btn_transfer_attendance" id="btn_transfer_attendance" value="Get From Leaves" onclick="transfer_attendance();"/></td>
<td><label><b>Select Month </b></label></td><td><select name="cmb_month" id="cmb_month" style="width:200px">
<option value="select">Select</option>
<?php
$sq_emp_month = mysql_query("select distinct(month) from month_attendance order by employee_no");
while($res_emp_month = mysql_fetch_assoc($sq_emp_month))
{
  echo "<option value='$res_emp_month[month]'>".$res_emp_month['month']."</option>";
}
?>
</select>
</td>
	</tr>
	<tr style="display:none">
<td><input type="text" name="txt_db" id="txt_db" value="<?php echo $_SESSION['dbname']; ?>" /></td>
<td><input type="text" name="txt_p" id="txt_p" value="<?php echo $_SESSION['password']; ?>" /></td>
<td><input type="text" name="txt_u" id="txt_u" value="<?php echo $_SESSION['uname']; ?>" /></td>
<td><input type="text" name="txt_s" id="txt_s" value="<?php echo $_SESSION['server']; ?>" /></td>
</tr>


</table>

<table width="950" border="1" id="tableDisplay">
<tbody></tbody>
</table>
</center>						
</form>
<br /><br /><br />
<?php
										
/*$sq_month = mysql_query("select * from month_control where month_active='Y'");
$r_month = mysql_fetch_assoc($sq_month);

$sq_attendance = mysql_query("select * from attendance where month_no='$r_month[month_no]'");  
if(mysql_num_rows($sq_attendance))
{
      echo '<br />'.'<br />'.'<br />'.'<br />'.'<br />'.'<center>'.'<b>'.'Attendace of Employees for '.date('M-Y', strtotime($r_month['month_no'])).' already exists.'.'</b>'.'</center>'.'<br />'.'<br />'.'<br />'.'<br />';
} 
else*/
{
?>
<form action="../upload/file_upload.php" method="post" name="frm_aatendance" onsubmit="return attendance_sheet_import();"><center>

<?php

	 $sq = mysql_query("select * from month_control where month_active='Y'");
     while($r = mysql_fetch_assoc($sq))
     {
     $month_active_no = $r['month_no'];
	 echo '<input type="text" name="txt_no_days" id="txt_no_days" value="'.$r['no_days'].'" style="display:none;" />';
     }
?>
<center>
<table width="950" border="1" >
  <tr><td colspan="7"><b>Upload File</b><input id="upload_file" type="file" name="upload_file" /> <input type="button" name="btn_upload" id="btn_uplaod" onclick="loadFile()" value="Upload" /><input type="submit" name="btn_Save" id="btn_save" value="Save" /></td>
</tr>
</table></center>
<br /><br /><br />
<table width="950" border="1">
<!--<tr><td colspan="15">
 <<INPUT type="button" value="Add Row" onClick="addRow1('attendancetable')" />
 <INPUT type="button" value="Delete Row" onClick="deleteRow1('attendancetable')" />
</td></tr>-->
<!--<tr><td width="210"><b><center>Employee No:<font color="#FF0000">*</font></center></b></td><td width="76"><b><center>Month No <font color="#FF0000">*</font></center></b></td><td width="76"><b>Working Days<font color="#FF0000">*</font></b></td><td width="76"><b>Holidays<font color="#FF0000">*</font></b></td><td width="76"><b>Paid Leaves</b></td><td width="76"><b><center>Unpaid Leaves</center></b></td><td width="76"><b><center>Suspention Days</center></b></td><td width="76"><b>No of adjustment days, from prev month</b></td><td width="76"><b>Overtime in Hours for the month</b></td><td width="76"><b>No of Days for leave Encashment</b></td></tr> -->

<tr><td width="200"><b><center>Employee Name:<font color="#FF0000">*</font></center></b></td><td width="70"><b><center>Month No <font color="#FF0000">*</font></center></b></td><td width="76"><b>Working Days<font color="#FF0000">*</font></b></td><td width="76"><b>Holidays<font color="#FF0000">*</font></b></td><td width="76"><b>Paid Leaves</b></td><td width="76"><b><center>Unpaid Leaves</center></b></td><td width="76"><b><center>Suspention Days</center></b></td><td width="76"><b>No of adjustment days, from prev month</b></td><td width="76"><b>Overtime in Hours for the month</b></td><td width="76"><b>No of Days for leave Encashment</b></td><td width="76"><b><center>Income Tax</center></b></td></tr>
</table>

<table width="950" id="attendancetable" border="1">
<!--<tr><TD width="5"><INPUT type="checkbox" name="chk[]" /></TD>
<td width="125"><select name="txt_empl_no" id="txt_empl_no" style="width:120px">
<option selected="selected" value="select">Select</option>
<!--?php
$sr1 = mysql_query("select * from empl_master order by employee_no");
while($rr1 = mysql_fetch_assoc($sr1))
{
  //$sr2 = mysql_query("select * from emp_comp_master where employee_no='$rr1[employee_no]'");
 // $num_rows = mysql_num_rows($sr2);
  //if($num_rows == 0)
  //{
  $sq_comp_details = mysql_query("select * from comp_details where employee_no='$rr1[employee_no]'");
  while($r_comp_details = mysql_fetch_assoc($sq_comp_details))
  {
    if($r_comp_details['type_of_sep'] == '')
	{
	
	$sq_month = mysql_query("select * from month_control where month_active='Y'");
	$r_month = mysql_fetch_assoc($sq_month);

	$sq_attendance=mysql_query("select * from attendance where month_no='$r_month[month_no]' and employee_no='$rr1[employee_no]'");  
	if(!mysql_num_rows($sq_attendance))
	{
  	  echo "<option value='$rr1[employee_no]'>$rr1[employee_no] - $rr1[first_name] $rr1[middle_name] $rr1[last_name]</option>";
	}
    }
  //}
  }
}
?>
</select></td>
<td width="190"><select name="txt_month_nob" id="txt_month_nob" style="width:80px">

<!--?php  

$sq = mysql_query("select * from month_control where month_active='Y'");
while($r = mysql_fetch_assoc($sq))
{
  echo "<option value='$r[month_no]'>$r[month_no]</option>";
}
?></select></td>
<td width="100"><input type="text" name="txt_per_day_for_month" id="txt_per_day_for_month" size="8" /></td>
<td width="100"><input type="text" name="txt_holidays" id="txt_holidays" size="8" /></td>
<td width="100"><input type="text" name="txt_paid_leaves" id="txt_paid_leaves" size="8" /></td>
<td width="100"><input type="text" name="txt_unpaid_leaves" id="txt_unpaid_leaves" size="8" /></td>
<td width="100"><input type="text" name="txt_suspention_days" id="txt_suspention_days" size="8" /></td>
<td><input type="text" name="txt_adj_days" id="txt_adj_days"  size="8" /></td>
<td><input type="text" name="txt_other_Hrs" id="txt_other_Hrs" size="8" /></td>
<td><input type="text" name="txt_leave_encash_days" id="txt_leave_encash_days" size="8" /></td>
</tr>-->
<?php
$sq_attendance = mysql_query("select first_name, middle_name, last_name, employee_no, emp_code from empl_master order by emp_code");
while($r_attendance = mysql_fetch_assoc($sq_attendance))
{
  $sq_comp_details = mysql_query("select employee_no from comp_details where employee_no='$r_attendance[employee_no]' and (type_of_sep='' and grant_type!='Grantable')");
  if($r_comp_details = mysql_fetch_assoc($sq_comp_details))
  {
   $sq_month = mysql_query("select month_no from month_control where month_active='Y'");
   while($r_month = mysql_fetch_assoc($sq_month))
   {
    $sq_if_exists = mysql_query("select employee_no from attendance where employee_no='$r_attendance[employee_no]' and month_no='$r_month[month_no]'");
    if(mysql_num_rows($sq_if_exists) == 0)
	{
  
   ?>
         <tr>
        <td width="5" style="display:none"></td>
        <td width="125"><input type="text" name="txt_emp_name" id="txt_emp_name" value="<?php echo $r_attendance['employee_no']; ?>" style="display:none" />
<input type="text" name="txt_emp_name" id="txt_emp_name" value="<?php echo $r_attendance['first_name']." ".$r_attendance['middle_name']." ".$r_attendance['last_name']; ?>" title="<?php echo $r_attendance['first_name']." ".$r_attendance['middle_name']." ".$r_attendance['last_name']; ?>" disabled="disabled" size="32"/>
</td>
        <td><input type="text" name="txt_month" id="txt_month" style="display:none" value="<?php echo $r_month['month_no']; ?>" size="5" /><input type="text" name="txt_month" id="txt_month" disabled="disabled" value="<?php echo $r_month['month_no']; ?>" size="5" /></td>
        <td><input type="text" name="txt_per_day_for_month" id="txt_per_day_for_month" size="5" /></td>
		<td><input type="text" name="txt_holidays" id="txt_holidays" size="5" /></td>
		<td><input type="text" name="txt_paid_leaves" id="txt_paid_leaves" size="5" /></td>
		<td><input type="text" name="txt_unpaid_leaves" id="txt_unpaid_leaves" size="5" /></td>
		<td><input type="text" name="txt_suspention_days" id="txt_suspention_days" size="5" /></td>
		<td><input type="text" name="txt_adj_days" id="txt_adj_days"  size="5" /></td>
		<td><input type="text" name="txt_other_Hrs" id="txt_other_Hrs" size="5" /></td>
		<td><input type="text" name="txt_leave_encash_days" id="txt_leave_encash_days" size="5" /></td>
		<td><input type="text" name="txt_income_tax" id="txt_income_tax" size="5" /></td>
</tr>
	<?php
		}
	}
   }
}
?>

</table>  
	 </center>
	
	 	 
	 
<tr><td colspan="5"><center><input type="button" name="btn_add_attendance" id="btn_add_attendance" value="Save" onclick="add_attendance();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>
</form>

</table></center>
<center><b><div id="error5"></div></b></center>
<?php
}
?>
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
