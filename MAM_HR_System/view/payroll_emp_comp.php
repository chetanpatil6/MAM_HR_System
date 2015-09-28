<?php include('../model/Model.php');
$sr1 = mysql_query("select * from empl_master order by last_name");
while($rr1 = mysql_fetch_assoc($sr1)){

$trimmed_first_name = explode(" ", $rr1['first_name']);
echo      "--->".$cnt_trimmed_first_name=count($trimmed_first_name);
echo "<pre>ww";
print_r($trimmed_first_name['0']);
echo "</pre>";
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>


<script type="text/javascript" src="../js/jquery.min.js"></script> 
<script type="text/javascript">
		
		$(document).ready(function(){
                $('#txt_emp_code').change(function(){
                  //  console.log($(this));
                    $.get("showcompensations.php", {option:$(this).val()}, function(data){
                        $('#cmb_comp_code').html(data);
                    });
                });
            });
			
</script> 
			
	<script type="text/javascript">
	function attendance_sheet_import()
	{
	  var csv_file_name = document.getElementById('upload_file').value;
	  if(csv_file_name=='')
		{
	 		alert("Please Import Compensation Sheet");	
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
	 		alert("Please Import Compensation Sheet");	
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
	xhr.open("POST", '../controller/upload_emp_comp_xls.php');

	// Send the file
	xhr.send(formData);
}

//////////////////////////////////////////////////////////////////////////table Attendance///////////
 
	</script>


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
	
	
function displayempcode(str)
{

  document.getElementById("txt_empl_no").value = str;
  document.getElementById("txt_emple_no").value = str;
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
 
 
function showloanlicamt(str)
{

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
var myTable = document.getElementById('showloanlicamt');
var tBody = myTable.getElementsByTagName('tbody')[0];
tBody.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.open("GET","showloanlicamt.php?id="+str,true);


xmlhttp.send();
}

 
    </SCRIPT>

    <!--
    Created by Artisteer v2.3.0.23326
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php echo $_SESSION['company_name']; ?></title>

 

    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->


    <script type="text/javascript">
		
		
		function displayvalifapplicable()
		{
		var table = document.getElementById('empcomptable');
 		var rowCount = table.rows.length;
			
		for(var i=0; i<rowCount; i++) {
               	 var row = table.rows[i];
				 
		var txtBox1 = row.cells[1].childNodes[0].value;		
		
		if(txtBox1=='D0001' || txtBox1=='D0002' || txtBox1=='D0003' || txtBox1=='E0003' || txtBox1=='E0004' || txtBox1=='E0005' || txtBox1=='E0006')
		{
		 row.cells[4].childNodes[0].value = '0';
		 row.cells[4].childNodes[0].disabled = true;
		 row.cells[2].childNodes[0].value = '0000-00-00';
		}
		else if(txtBox1=='D0008')
		{
		 row.cells[4].childNodes[0].value = document.getElementById("txt_lic_amt").value;
		 row.cells[4].childNodes[0].disabled = true;
		 row.cells[2].childNodes[0].value = '0000-00-00';
		}
		else if(txtBox1=='D0007')
		{
		  row.cells[4].childNodes[0].value = document.getElementById("txt_loan_amt").value;
		 row.cells[4].childNodes[0].disabled = true;
		 row.cells[2].childNodes[0].value = '0000-00-00';
		}
		else
		{
		  row.cells[4].childNodes[0].disabled = false;
		  row.cells[2].childNodes[0].value = '0000-00-00';
		}
		
		}
		
		}

    </script>
	
	
	<!--<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../js/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	
	$("#txt_emp_code").autocomplete("get_list.php", {
		width: 260,
		matchContains: true,
		mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#txt_emp_code").result(function(event, data, formatted) {
		$("#txt_cust_code").val(data[1]);
		//displaycustinfo();
	});
	
});
</script>  -->
	
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
										
									
        
                              <div id="fragment-1" class="ui-tabs-panel ui-tabs-hide">
							  
							  
							  <center>
<table width="800"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Employee Compensation Master</center></font></td></tr></table></center>
							  
							  
							  <form name="get_attendance_sheet" id="get_attendance_sheet" action="../excel/compensation_template.php" method="post">
							  <center>
							  <table width="800" border="1">
							  <tr><td><input type="submit" name="btn_get_attendance_template" id="btn_get_attendance_template" value="Get Compensation Template" /> </td></tr>
							  </td>
	</tr>
	<tr style="display:none">
<td><input type="text" name="txt_db" id="txt_db" value="<?php echo $_SESSION['dbname']; ?>" /></td>
<td><input type="text" name="txt_p" id="txt_p" value="<?php echo $_SESSION['password']; ?>" /></td>
<td><input type="text" name="txt_u" id="txt_u" value="<?php echo $_SESSION['uname']; ?>" /></td>
<td><input type="text" name="txt_s" id="txt_s" value="<?php echo $_SESSION['server']; ?>" /></td>
</tr>
							  </table>
							 </center>
							  </form>
							  
							  <form action="../upload/upload_emp_comp_xls.php" method="post" name="frm_compensation" onsubmit="return attendance_sheet_import();">
							   
							  
<?php
 $sq = mysql_query("select * from month_control where month_active='Y'");
     while($r = mysql_fetch_assoc($sq))
     {
     $month_active_no = $r['month_no'];
	 echo '<input type="text" name="txt_no_days" id="txt_no_days" value="'.$r['no_days'].'" style="display:none;" />';
     }
?>
<center>
<table width="800" border="1" >
  <tr><td colspan="7"><b>Upload Compensation CSV File </b><input id="upload_file" type="file" name="upload_file" /> <input type="button" name="btn_upload" id="btn_uplaod" onclick="loadFile()" value="Upload" /><input type="submit" name="btn_Save" id="btn_save" value="Save" /></td>
</tr>

</table></center>

<center><div id="error5"></div></center>
</form>
							 <br /><br />
							 <form action="#" method="post" name="frm_compensation_master">
<!--<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Employee Compensation Master</center></font></td></tr></table>
 -->
<table id="showloanlicamt" style="display:none">
<tbody>
</tbody>
</table>
<center><table class="listing" border="1" width="800">
<tr><td><b>Employee Name:</b><font color="#FF0000">*</font></td><td colspan="2">
<select name="txt_emp_code" id="txt_emp_code" style="width:250px" onchange="showloanlicamt(this.value);">
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
  	  echo "<option value='$rr1[employee_no]'>$rr1[employee_no] - $rr1[first_name] $rr1[middle_name] $rr1[last_name]</option>";
    }
  //}
  }
}
?-->
<?php
$sr1 = mysql_query("select * from empl_master order by last_name");
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

	 // $trimmed_first_name = ltrim($rr1['first_name'], " ");
	 $trimmed_first_name = explode(" ", $rr1['first_name']);
//echo      $cnt_trimmed_first_name=count($trimmed_first_name);

  	 // echo "<option value='$rr1[employee_no]'>$rr1[employee_no] - $rr1[first_name] $rr1[middle_name] $rr1[last_name]</option>";
     if(isset($trimmed_first_name['1']))
      echo "<option value=".$rr1['employee_no'].">".$trimmed_first_name['1'] .$rr1['first_name']. $rr1['middle_name']. $rr1['last_name'] .'-'.$rr1['employee_no']."</option>";
     else
	  echo "<option value=".$rr1['employee_no'].">".$rr1['first_name']. $rr1['middle_name']. $rr1['last_name'] .'-'.$rr1['employee_no']."</option>";

    }
  //}
  }
}
?>
</select></td>
</tr>

<tr><td colspan="15">
 <INPUT type="button" value="Add Row" onClick="addRow1('empcomptable')" />
 <INPUT type="button" value="Delete Row" onClick="deleteRow1('empcomptable')" />
</td></tr>
 
<tr><td width="265"><b><center>Compensation Code:<font color="#FF0000">*</font></center></b></td><td width="270"><b><center>Comp. Change Effective Date<font color="#FF0000">*</font></center></b></td><td><b><center>Amount<font color="#FF0000">*</font></center></b></td></tr>

</table>

<table width="800" id="empcomptable" border="1">
<tr><TD width="5"><INPUT type="checkbox" name="chk[]"/></TD>
<td><select name="cmb_comp_code" id="cmb_comp_code" style="width:215px" onchange="displayvalifapplicable()">
<option selected="selected">Select</option>
<?php

?>

</select></td>
<td><input type="text" name="txt_comp_change_eff_date1" id="txt_comp_change_eff_date1" size="30" value="0000-00-00" /></td>
<td><input type="button" name="1" id="1" value="..." onClick="run(this.id)" /></td>
<td><input type="text" name="txt_amount" id="txt_amount" size="30" /></td>
</tr>
</table>
	 
	
	 	 
	 
<tr><td colspan="5"><center><input type="button" name="btn_add_emp_compensation" id="btn_add_emp_compensation" value="Save" onclick="add_emp_compensation();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>
<!--<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_comp_change_eff_date",
        trigger    : "f_btn",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script> -->


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
