﻿<?php include("../model/Model.php"); ?>

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
	
		
function balace_leaves(id)
{
	 var num = document.getElementById(id).value;
	 if(isNaN(num))
	 {
	   alert("Please enter only number");
	   document.getElementById(id).value = '';
	   return false;
	 }
	var total = 0;
	var cl = document.getElementById('txt_cl').value;
	var fl = document.getElementById('txt_fl').value;
	var el = document.getElementById('txt_el').value;
	var ml = document.getElementById('txt_ml').value;
	var sp = document.getElementById('txt_sp').value;
	var unpaid_leaves = document.getElementById('txt_unpaid_leaves').value;	
	var total_leave = document.getElementById('txt_total_leave').value;	
	
	
	
	var balace_total_leave = document.getElementById('txt_balace_total_leave').value;
	var balace_cl = document.getElementById('txt_balace_cl').value;
	var balace_fl = document.getElementById('txt_balace_fl').value;
	var balace_ml = document.getElementById('txt_balace_ml').value;
	
	
	if(cl !='')
	{
		total = parseFloat(total) + parseFloat(cl);
		//document.getElementById('txt_balace_cl').value = parseFloat(balace_cl) - parseFloat(cl);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		cl=0;
	}
	
	if(fl !='')
	{
		total = parseFloat(total) + parseFloat(fl);
		//document.getElementById('txt_balace_fl').value = parseFloat(balace_fl) - parseFloat(fl);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		fl=0;
	}
	
	if(el !='')
	{
		total = parseFloat(total) + parseFloat(el);
		//document.getElementById('txt_balace_fl').value = parseFloat(balace_fl) - parseFloat(fl);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		el=0;
	}
	
	if(ml !='')
	{
		total = parseFloat(total) + parseFloat(ml);
		//document.getElementById('txt_balace_ml').value = parseFloat(balace_ml) - parseFloat(ml);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	else
	{
		ml=0;
	}
	
	
	if(sp !='')
	{
		total = parseFloat(total) + parseFloat(sp);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}
	
	if(unpaid_leaves !='')
	{
		total = parseFloat(total) + parseFloat(unpaid_leaves);
		document.getElementById('txt_total_leave').value = parseFloat(total);	
		//document.getElementById('txt_balace_total_leave').value = parseFloat(balace_total_leave) - parseFloat(total);
	}	
}



function employee_balace_leaves()
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
xmlhttp.open("GET","employee_balace_leaves.php?id1="+emp_name,true);
xmlhttp.send();
}


/*function validation_date(obj)
{
	var date = new Date();
	var from_date = document.getElementById('txt_from_date').value;
	var to_date = document.getElementById('txt_to_date').value;
	var application_date = document.getElementById('txt_application_date').value;
	
	
	var date1 = new Date(from_date);
	var date2 = new Date(to_date);
	var date3 = new Date(application_date);
	var diffDays = parseInt((date2 - date1) / (1000 * 60 * 60 * 24)); 	
	
    
	
	document.getElementById('txt_total_leaves').value = diffDays+1;
	
	var total_days = document.getElementById('txt_total_leaves').value;
	
	if(document.frm_leave_management.rdb_to_day.value == 'Half Day' || document.frm_leave_management.rdb_from_day.value == 'Half Day')
	{		
		document.getElementById('txt_total_leaves').value =parseInt(total_days)-0.5;
	}
	
	
	if(document.frm_leave_management.rdb_to_day.value == 'Half Day' && document.frm_leave_management.rdb_from_day.value == 'Half Day')
	{
	   document.getElementById('txt_total_leaves').value =parseInt(total_days)-1;
	}	
	
	if(from_date == '')
	{
		alert("Please select From Date");
		document.getElementById('txt_to_date').value='';
		return false;
	}	
	if(new Date(from_date) < new Date(application_date))
	{
		alert("Please select correct date ,From Date less that To Date");	
		document.getElementById('txt_from_date').value ='';	
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
	if(new Date(to_date) < new Date(from_date))
	{
		alert("Please select correct date ,From Date less that To Date");	
		document.getElementById('txt_to_date').value ='';	
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
	
	
}*/

function validation_From_date(obj)
{
	var date = new Date();
	var fromDate = document.getElementById('txt_from_date').value;
	var activemonth = document.getElementById('txt_active_month').value;
	var prevmonth = document.getElementById('txt_prev_month').value;
	
	var dd = "26";
	var prev_month_date = prevmonth+"-"+dd;
	
	//alert (activemonth);
	//alert (prev_month_date);
   
	if(new Date(fromDate) < new Date(prev_month_date))
	{
		alert("From date can not be less than 26th of the previous month that is " + prev_month_date);
		document.getElementById('txt_from_date').value='';
		return false;
	}
}

/*
function validation_From_date(obj)
{
	var date = new Date();
	var fromDate = document.getElementById('txt_from_date').value;
	//alert(date);
	//alert (date.getMonth());
	var dd = "26";
	var mm = date.getMonth();
	var yyyy = date.getFullYear();
	var prev_month_date = yyyy+"-"+mm+"-"+dd;
	
	//alert (prev_month_date);
   
	if(new Date(fromDate) < new Date(prev_month_date))
	{
		alert("From date can not be less than 26th of the previous month that is " + prev_month_date);
		document.getElementById('txt_from_date').value='';
		return false;
	}
}
*/

function validation_date(obj)
{
	var date = new Date();
	var from_date = document.getElementById('txt_from_date').value;
	var to_date = document.getElementById('txt_to_date').value;
	//alert("test")	
	//alert("test"+application_date);
	var date1 = new Date(from_date);
	var date2 = new Date(to_date);
	var diffDays = parseInt((date2 - date1) / (1000 * 60 * 60 * 24)); 	
	
    
	
	document.getElementById('txt_total_leaves').value = diffDays+1;
	
	var total_days = document.getElementById('txt_total_leaves').value;
	
	if(document.frm_leave_management.rdb_to_day.value == 'Half Day' || document.frm_leave_management.rdb_from_day.value == 'Half Day')
	{		
		document.getElementById('txt_total_leaves').value =parseInt(total_days)-0.5;
	}
	
	
	if(document.frm_leave_management.rdb_to_day.value == 'Half Day' && document.frm_leave_management.rdb_from_day.value == 'Half Day')
	{
	   document.getElementById('txt_total_leaves').value =parseInt(total_days)-1;
	}	
	
	if(from_date == '')
	{
		alert("Please select From Date");
		document.getElementById('txt_to_date').value='';
		return false;
	}		
	
	
	if(new Date(to_date) < new Date(from_date))
	{
		alert("Please select correct date ,From Date less that To Date");	
		document.getElementById('txt_to_date').value ='';	
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}


function validation_application_date(obj)
{
	var date = new Date();
	var from_date = document.getElementById('txt_from_date').value;
	//var to_date = document.getElementById('txt_to_date').value;
	
	var application_date = document.getElementById('txt_application_date').value;
	
	
	//alert("test");
	if(new Date(application_date) >= new Date(from_date))
	{
		alert("Please select from date greater than application date");
		document.getElementById('txt_from_date').value='';
		return false;		
	}
	else
	{
		//alert("mncxv,mn");
	}
}


function foo() {

    if( typeof foo.counter == 'undefined' ) {
        foo.counter = 1;
    }
    foo.counter++;
	var table = document.getElementById('dataTable');
 
            var rowCount = table.rows.length;
			
	for(var i=0; i<rowCount; i++)
{
var row = table.rows[i];
    //document.write(foo.counter+"<br />");
}
row.cells[1].childNodes[0].value = foo.counter;
}

        function addRow(tableID) {
 
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
 
        function deleteRow(tableID) {
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
	
<script type="text/javascript" src="../js/jquery.min.js"></script> 
<script type="text/javascript">  
          $(function(){
                $('#cmb_to_employee_name').change(function(){
                 //   console.log($(this));
                    $.get( "Designation_from_combo.php" , { option : $(this).val() } , function ( data ) {
                        $ ( '#txt_designation' ) . html ( data ) ;						
						
                    } ) ;
                });
            });
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

<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Leave Application</center></font></td></tr></table>
<table border="1" width="900">
<tr style="display:none;"><td width="130"><label><b>Doc no&nbsp;<font color="#FF0000">*</font></b></label></td><td><input type="text" name="txt_doc_no" id="txt_doc_no" value="<?php echo $docno ;?>" disabled="disabled"  size="15"/></td><td><label><b>doc Date</b></label></td><td><input type="text" name="txt_doc_date" id="txt_doc_date" disabled="disabled" value="<?php echo date('Y-m-d'); ?>"  size="15"/><!--</td><td> <button id="f_btn">...</button>--></td>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_doc_date",
        trigger    : "f_btn",
        onSelect   : function() { this.hide(); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script></tr>
<tr><td width="130"><label><b>Attendance Number&nbsp;<font color="#FF0000">*</font></b></label></td><td><input type="text" name="txt_attendance_no" id="txt_attendance_no" value="<?php echo $count ;?>" disabled="disabled"  size="15"/></td><td width="120"><label><b>Leave Application Number&nbsp;<font color="#FF0000">*</font></b></label></td><td><input type="text" name="txt_leave_application_number" id="txt_leave_application_number" value="<?php echo $count ;?>"  disabled="disabled"  size="15"/></td><td width="150"><label><b>Registration Number&nbsp;<font color="#FF0000">*</font></b></label></td><td colspan="5"><input type="text" name="txt_registration_no" id="txt_registration_no" size="15"/></td></tr>
<tr><tr>
<td><b>Employee Name&nbsp;<font color="#FF0000">*</font></b></td><td><select name="cmb_to_employee_name" id="cmb_to_employee_name" style="width:200px" onchange="employee_balace_leaves();">
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

<td><label><b>Leave Application Date&nbsp;<font color="#FF0000">*</font></b></label></td><td><input type="text" name="txt_application_date" id="txt_application_date" placeholder="yyyy-mm-dd" size="15"/><button id="f_btn">...</button></td>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_application_date",
        trigger    : "f_btn",
        onSelect   : function() { this.hide(); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script> 
<td><label><b>Designation</b></label></td><td colspan="5">
<select name="txt_designation" id="txt_designation" style="width:150px" disabled="disabled">
<option value="select">Select</option>
<?php
$sq_desig = mysql_query("select distinct designation from comp_details where designation!='' and designation!='0' and designation!='-'");
while($res_desig = mysql_fetch_assoc($sq_desig))
{
//if($res_desig['designation']!='' and $res_desig['designation']!=0 and $res_desig['designation']!='-')
 echo '<option value="'.$res_desig['designation'].'">'.$res_desig['designation'].'</option>';
}
?>
</select>

<!--<input type="text" name="txt_designation" id="txt_designation"  size="15"/> --></td>

</tr></tr>


<tr><tr><tr>
<td><b>From Date&nbsp;<font color="#FF0000">*</font></b></td><td>
<input type="text" name="txt_from_date" id="txt_from_date" disabled="disabled"  size="15"/><button id="f_btn_from_date">...</button></td>
<!--<input id='datepicker' type="text"  name='date'  size="10" class="inputfield" />
--><script type="text/javascript">//<![CDATA[
     
	
	  Calendar.setup({
        inputField : "txt_from_date",
        trigger    : "f_btn_from_date",
        onSelect   : function() { this.hide();validation_From_date(this);},
        showTime   : 12,
        dateFormat : "%Y-%m-%d",
		
      });
	 // calendar.parseDate("2014/07/06")
	  </script>
</td>
<td><label><b>To Date</b></label></td><td><input type="text" name="txt_to_date" id="txt_to_date" disabled="disabled"  size="15"/><!--</td><td> --><button id="f_btn_to_date">...</button></td>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_to_date",
        trigger    : "f_btn_to_date",
        onSelect   : function() { this.hide();validation_date(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>

<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_month",
        trigger    : "f_btn_month",
        onSelect   : function() { this.hide(); },
        showTime   : 12,
        dateFormat : "%Y-%m"
      });
	  </script>

<td><label><b>Total Leaves</b></label></td><td><input type="text" name="txt_total_leaves" id="txt_total_leaves" disabled="disabled" size="15"/></td>
</tr></tr></tr>
<tr><tr><tr>
<td><b>From Day type</b></td><td><label><b>Half Day</b></label><input type="radio" name="rdb_from_day" id="rdb_from_day" value="Half Day" onclick="validation_date();"/><label><b>Full Day</b></label><input type="radio" name="rdb_from_day" id="rdb_from_day" value="Full Day" onclick="validation_date();"/></td>
<td ><b>To Day type</b></td><td width="150"><label><b>Half Day</b></label><input type="radio" name="rdb_to_day" id="rdb_to_day" value="Half Day"  onclick="validation_date();"/><label><b>Full Day</b></label><input type="radio" name="rdb_to_day" id="rdb_to_day" value="Full Day" onclick="validation_date();"/></td>
<td width="42"><label><b>Select Leave Type&nbsp;<font color="#FF0000">*</font></b></label></td><td>
<select name="cmb_leave_type" id="cmb_leave_type" style="width:150px">
<option value="select">Select</option>
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
</tr></tr></tr>
<tr></tr>
<!--<td width="42"><b><center>Unpaid Leave</center></b></td>
<td><input type="text" name="txt_unpaid_leaves" id="txt_unpaid_leaves" size="8"  onkeyup="balace_leaves(this.id);"/></td>

<td width="42"><b><center>Absent Days</center></b></td>

<td><input type="text" name="txt_absent_days" id="txt_absent_days" size="8" /></td>-->
<tr><tr><tr>
<td><b>Application Received Date</b></td><td>
<input type="text" name="txt_received_date" id="txt_received_date" placeholder="yyyy-mm-dd"  size="15"/><!--</td><td> --><button id="f_btn_received_date">...</button></td>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_received_date",
        trigger    : "f_btn_received_date",
        onSelect   : function() { this.hide(); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
</td>
<td style="display:none"><b>Leave Stock Type</b></td>
<td style="display:none"<input type="text" name="txt_stock_type" id="txt_stock_type" disabled="disabled" value="LA" size="15"/></td>
<td><b>Created By</b></td>
<td colspan="3"><input type="text" name="txt_updated_by" id="txt_updated_by" disabled="disabled" value="<?php echo $_SESSION['role']; ?>" size="15"/></td>

</tr></tr></tr>
<tr></tr><tr></tr><tr>
<td style="display:none"><b>Leave Status</b></td>
<td style="display:none"><input type="text" name="txt_leave_status" id="txt_leave_status" disabled="disabled" value="Active" size="15"/></td>
<td width=""><b>Remark</b></td>
<td colspan="5"><input type="text" name="txt_remark" id="txt_remark" size="28" /></td>
<tr></tr></tr>

</table>
<!--<table width="900" id="dataTable" border="1">
<tr><TD width="5"><INPUT type="checkbox" name="chk[]"/></TD><td width="10"><input type="text" name="txt_sir_no" id="txt_sir_no" size="2" onkeyup="checkforduplicate()" value="1" disabled="disabled"/></td>
<td width="120"><select name="cmb_leave_full_half" id="cmb_leave_full_half" style="width:150px">
<option value="1">Full Day</option>
<option value="0.5">Half Day</option>
</select></td></tr>
</table>-->

<table border="1" width="900" id="tableDisplay">
<tbody>
</tbody>
</table>
<table border="1" width="900">
<tr><td align="right" width="50%"><input type="button" name="btn_save" id="btn_save" value=" Save " onclick="add_leave();" />&nbsp;&nbsp;</td><td>&nbsp;&nbsp;<a href="add_leave_managment_form.php"><font color="#FF0033">Next Leave Application</font></a>
</td><tr></tr></tr>
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