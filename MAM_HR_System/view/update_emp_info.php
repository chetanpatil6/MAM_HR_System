<?php include('../model/Model.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>

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
	
	
	

	</script>

<script type="text/javascript">
function foo() {

    var table = document.getElementById('dataTable');
    var rowCount = table.rows.length;
	rowCount1 = rowCount - 1;
    if( typeof foo.counter == 'undefined' ) {
        foo.counter = rowCount1;
    }
    foo.counter++;
	
			
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
 
    </SCRIPT>
	
	<SCRIPT language="javascript">



function foo1() {

    var table = document.getElementById('dataTable1');
    var rowCount = table.rows.length;
	rowCount1 = rowCount - 1;
    if( typeof foo1.counter == 'undefined' ) {
        foo1.counter = rowCount1;
    }
    foo1.counter++;
	
			
	for(var i=0; i<rowCount; i++)
{
var row = table.rows[i];
    //document.write(foo.counter+"<br />");
}
row.cells[1].childNodes[0].value = foo1.counter;
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
            }foo1();
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

    
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
	<link rel="stylesheet" href="tabs.css" type="text/css" media="screen, projection"/>
	
	 <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />

	<script type="text/javascript" src="tab_js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="tab_js/jquery-ui-1.7.custom.min.js"></script>
    <script type="text/javascript">
		$(function() {

			var $tabs = $('#tabs').tabs();
	
			$(".ui-tabs-panel").each(function(i){
	
			  var totalSize = $(".ui-tabs-panel").size() - 1;
	
			  if (i != totalSize) {
			      next = i + 2;
		   		  $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next  &#187;</a>");
			  }
	  
			  if (i != 0) {
			      prev = i;
		   		  $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev </a>");
			  }
   		
			});
	
			$('.next-tab, .prev-tab').click(function() { 
		           $tabs.tabs('select', $(this).attr("rel"));
		           return false;
		       });
       

		});
		
		
		
		 function validation_date_of_birth(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_date_of_birth').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;
	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_date_of_birth').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}

function validation_date_joining(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_date_of_joining').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;
	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_date_of_joining').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}

function validation_comp_change_eff_date(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_comp_change_eff_date').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;
	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_comp_change_eff_date').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}
function validation_pf_date(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_pf_date').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;

	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_pf_date').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}
function validation_pf_uan_date(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_pf_uan_date').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;

	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_pf_uan_date').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}
function validation_date_confirm(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_date_confirm').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;
	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_date_confirm').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}

function validation_date_sep(obj)
{
	var date = new Date();
	var selected_date = document.getElementById('txt_date_sep').value;
	
	
	var dd = date.getDate()+1;
	var mm = date.getMonth()+1;
	var yyyy = date.getFullYear();
	var today_date = yyyy+"-"+mm+"-"+dd;
	
	if(new Date(selected_date) >= new Date(today_date))
	{
		alert("Can not select date greater that today date");
		//alert(selected_date+today_date);
		document.getElementById('txt_date_sep').value = "";
		return false;
	}
	else
	{
		//alert("Correct Date");		
	}
	
}

    </script>
	<script src="../calendar/src/js/jscal2.js"></script>
    <script src="../calendar/src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/steel/steel.css" />
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
                        <h1 id="name-text" class="art-Logo-name"><?php  echo $_SESSION['txt_name'];
												  ?></h1></td></tr></table>
                        <!--<div id="slogan-text" class="art-Logo-text">Slogan text</div> --><form name="frm_logout" id="frm_logout" method="post" action="../index.php">
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
					<!--<script type="text/javascript" src="main_menu.js"></script>  -->
                	<ul class="art-menu">
                		 <li><a href="personal_info.php"><span class="l"></span><span class="r"></span><span class="t">Personal Info</span></a>
</li>
                			
<li><a href="search_for_update.php" class=" active"><span class="l"></span><span class="r"></span><span class="t">Search For Update</span></a>
</li> 

<li><a href="report.php"><span class="l"></span><span class="r"></span><span class="t">Report</span></a>
</li>
<?php if($_SESSION['role']=='Admin')
 {
 ?>


<li><a href="add_user.php"><span class="l"></span><span class="r"></span><span class="t">User</span></a>
</li>
<li><a href="change_role_select.php"><span class="l"></span><span class="r"></span><span class="t">Change Role</span></a>
</li>
<li><a href="add_company_info.php"><span class="l"></span><span class="r"></span><span class="t">Add Company Info</span></a>
<ul>
<li><a href="update_company_info.php"><span class="l"></span><span class="r"></span><span class="t">Update Company Info</span></a></li>
</ul>
</li> 

<?php
} 
?>
<li><a href="change_password.php"><span class="l"></span><span class="r"></span><span class="t">Change Password</span></a>
</li>
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
		<div id="content" style="padding-top:0px;">
	<div id="page-wrap">
		
		<div id="tabs">
		
    		<ul>
        		<li><a href="#fragment-1">Personal Info</a></li>
        		<li><a href="#fragment-2">Employement Details</a></li>
        		<li><a href="#fragment-3">Qualification</a></li>
        		<li><a href="#fragment-4">Experience</a></li>
        		<li><a href="#fragment-5">Family Info</a></li>
        	    
        		
    	   </ul>
	
        	<div id="fragment-1" class="ui-tabs-panel">
<form action="#" name="personal_info" method="post">          
<?php
$emp_no = $_POST['rdb_emp_no'];
$sql = mysql_query("select * from empl_master where employee_no='$emp_no'");
while($row = mysql_fetch_assoc($sql))
{
?>
 <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Update Personal Information</center></font></td></tr></table> 
  <table border="1" width="900">
                     <tr><td><label><b>Employee No.</b></label></td><td colspan="2"><input type="text" name="txt_emp_no1" id="txt_emp_no1" value="<?php echo $emp_no;  ?>" disabled="disabled" /></td></tr>
										                      <tr><td><label><b>Employee Code</b></label></td><td colspan="2"><input type="text" name="txt_emp_code" id="txt_emp_code" value="<?php echo $row['emp_code']; ?>"></tr>
<tr><td><label><b>Punching Code</b></label></td><td colspan="2"><input type="text" name="txt_punching_code" id="txt_punching_code" value="<?php echo $row['punching_code']; ?>"></tr>

							    <tr><td colspan="3" height="30"><label><b><center>Employee Name</center></b></label></td></tr>
								<tr><td><label><b><center>First Name*</center></b></label></td><td><label><b><center>Middle Name</center></b></label></td><td><label><b><center>Last Name*</center></b></label></td></tr>
								
								<tr><td><center><input type="text" name="txt_first_name" id="txt_first_name" size="30" value="<?php echo $row['first_name']; ?>" /></center></td>
								<td><center><input type="text" name="txt_middle_name" id="txt_middle_name" size="30" value="<?php echo $row['middle_name']; ?>" /></center></td><td><center><input type="text" name="txt_last_name" id="txt_last_name" size="30" value="<?php echo $row['last_name']; ?>" /></center></td></tr></table>


<table border="1" width="900">								

<tr><td><label><b>Gender</b></label></td><td><label><b>Male</b></label><input type="radio" name="rdb_gender" id="rdb_gender" value="Male"  <?php 
if($row['gender']=='Male')
{
?> checked="checked" <?php } ?> /><label><b>Female</b></label><input type="radio" name="rdb_gender" id="rdb_gender" value="Female" <?php 
if($row['gender']=='Female')
{
?> checked="checked" <?php } ?> /></td>
<?php if($row['birth_date']=='0000-00-00')
{
$row['birth_date']='';
}
?>

<td><label><b>Date of Birth</b></label></td><td><input type="text" name="txt_date_of_birth" id="txt_date_of_birth" value="<?php echo $row['birth_date']; ?>" disabled="disabled" /><button id="f_btn">...</button></td></tr>

<tr><td><label><b>Marital Status</b></label></td><td><select style="width:150px" name="cmb_marital_status" id="cmb_marital_status"><option>Select</option><option selected="selected"><?php echo $row['marital_status']; ?></option><option>Unmarried</option><option>Married</option><option>Divorcee</option>
<option>Widow</option></select></td>
<td><label><b>Blood Group</b></label></td><td><input type="text" name="txt_blood_group" id="txt_blood_group" value="<?php echo $row['blood_group']; ?>" /></td></tr>

<tr><td><label><b>Place of Origin</b></label></td><td><input type="text" name="txt_place_of_origin" id="txt_place_of_origin" value="<?php echo $row['place_of_origin']; ?>" /></td>
<td><label><b>Nationality</b></label></td><td><input type="text" name="txt_nationality" id="txt_nationality" value="<?php echo $row['nationality']; ?>" /></td></tr>

<tr><td colspan="2" height="30"><label><b><center>Present Addresss</center></b></label></td>
<td colspan="2" height="30"><label><b><center>Permanent Address</center></b></label></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_present_addr_1" id="txt_present_addr_1" size="50" value="<?php echo $row['present_addr_1']; ?>" /></center></td>
<td colspan="2"><center><input type="text" name="txt_permanent_addr_1" id="txt_permanent_addr_1" size="50" value="<?php echo $row['permanent_addr_1']; ?>"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_present_addr_2" id="txt_present_addr_2" size="50" value="<?php echo $row['present_addr_2']; ?>" /></center></td>
<td colspan="2"><center><input type="text" name="txt_permanent_addr_2" id="txt_permanent_addr_2" size="50" value="<?php echo $row['permanent_addr_2']; ?>"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_present_addr_3" id="txt_present_addr_3" size="50" value="<?php echo $row['present_addr_3']; ?>" /></center></td>
<td colspan="2"><center><input type="text" name="txt_permanent_addr_3" id="txt_permanent_addr_3" size="50" value="<?php echo $row['permanent_addr_3']; ?>"></center></td></tr>

<tr><td><label><b>City</b></label></td><td><input type="text" name="txt_present_city" id="txt_present_city" value="<?php echo $row['present_city']; ?>" /></td>
<td><label><b>City</b></label></td><td><input type="text" name="txt_permanent_city" id="txt_permanent_city" value="<?php echo $row['permanent_city']; ?>" /></td></tr>

<?php if($row['present_pin_code']=='0')
{
$row['present_pin_code']='';
}
?>
<tr><td><label><b>Pin Code</b></label></td><td><input type="text" name="txt_present_pin_code" id="txt_present_pin_code" value="<?php echo $row['present_pin_code']; ?>" /></td>

<?php if($row['permanent_pin_code']=='0')
{
$row['permanent_pin_code']='';
}
?>
<td><label><b>Pin Code</b></label></td><td><input type="text" name="txt_permanent_pin_code" id="txt_permanent_pin_code" value="<?php echo $row['permanent_pin_code']; ?>" /></td></tr>

<tr><td><label><b>State</b></label></td><td><input type="text" name="txt_present_state" id="txt_present_state" value="<?php echo $row['present_state']; ?>" /></td>
<td><label><b>Permanent State</b></label></td><td><input type="text" name="txt_permanent_state" id="txt_permanent_state" value="<?php echo $row['permanent_state']; ?>" /></td></tr>
		
<tr><td><label><b>Country</b></label></td><td><input type="text" name="txt_present_country" id="txt_present_country" value="<?php echo $row['present_country']; ?>" /></td>
<td><label><b>Country</b></label></td><td><input type="text" name="txt_permanent_country" id="txt_permanent_country" value="<?php echo $row['permanent_country']; ?>" /></td></tr>	

<tr><td><label><b>Residential Phone No.</b></label></td><td><input type="text" name="txt_residential_phone_no" id="txt_residential_phone_no" value="<?php echo $row['residence_phone_no']; ?>" onkeyup="check_field('txt_residential_phone_no');" /></td>
<td><label><b>Mobile No.</b></label></td><td><input type="text" name="txt_mobile_no" id="txt_mobile_no" value="<?php echo $row['mobile_no']; ?>" onkeyup="check_field('txt_mobile_no');" /></td></tr>							 
<tr>
<td><label><b>Emergency Contact Person</b></label></td><td><input type="text" name="txt_emergency_contact_person" id="txt_emergency_contact_person" value="<?php echo $row['emergency_contact_person']; ?>" /></td><td><label><b>Emergency Contact No.</b></label></td><td><input type="text" name="txt_emergency_contact_no" id="txt_emergency_contact_no" value="<?php echo $row['emergency_contact_no']; ?>" onkeyup="check_field('txt_emergency_contact_no');" /></td></tr>	
<tr><td><label><b>Email Id</b></label></td><td colspan="3"><input type="text" name="email_id" id="email_id" size="50" value="<?php echo $row['email_id']; ?>" /></td></tr>								

<tr><td colspan="5"><center><input type="button" name="btn_update_personal_info" id="btn_update_personal_info" onclick="update_personal_info();" value="Update" <?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
 /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>
							   <?php
							   }
							   ?>
                                       </form>
<center><b><div id="error1"></div></b></center>

<!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->

<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_of_birth",
        trigger    : "f_btn",
        onSelect   : function() { this.hide();validation_date_of_birth(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>

   
   </div>                                  






                              <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
							 <form action="#" name="company_info" method="post">          
                                 <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Update Employement Details</center></font></td></tr></table> 
								<table border="1" width="900">
								
<?php
$emp_no = $_POST['rdb_emp_no'];
$sql1 = mysql_query("select * from comp_details where employee_no='$emp_no'");
while($row1 = mysql_fetch_assoc($sql1))
{
$sql6 = mysql_query("select * from empl_master where employee_no='$emp_no'");
while($r  =mysql_fetch_assoc($sql6))
{
?>							
 <tr><td><label><b>Employee No.</b></label></td><td><input type="text" name="txt_emp_no2" id="txt_emp_no2" value="<?php echo $emp_no; ?>" disabled="disabled" /></td><td><b>Employee Name</b></td><td><input type="text" name="emp_name" value="<?php echo $r['first_name'];?>" disabled="disabled"/></td></tr>
<?php if($row1['joining_date']=='0000-00-00')
{
$row1['joining_date']='';
}
?>
							    
<tr><td><label><b>Date of Joining*</b></label></td><td><input type="text" name="txt_date_of_joining" id="txt_date_of_joining" value="<?php echo $row1['joining_date'] ?>" disabled="disabled" /><button id="f_btn1">...</button></td>
<?php if($row1['comp_change_eff_date']=='0000-00-00')
{
$row1['comp_change_eff_date']='';
}
?>

<td><label><b>Company Change Effective Date</b></label></td><td><input type="text" name="txt_comp_change_eff_date" id="txt_comp_change_eff_date" disabled="disabled" value="<?php echo $row1['comp_change_eff_date'] ?>" /><button id="f_btn_effective_date">...</button></td></tr>
<tr><td><label><b>Designation</b></label></td><td><input type="text" name="txt_designation" id="txt_designation" value="<?php echo $row1['designation']; ?>" /></td>
<td><label><b>Grade</b></label></td><td>

<select  name="txt_grade" id="txt_grade" style="width:100px">

<?php
echo "<option value='$row1[grade]'>$row1[grade]</option>";
$sq_grade = mysql_query("select * from grade_master");
while($r_grade = mysql_fetch_assoc($sq_grade))
{
  if($r_grade['grade'] != $row1['grade'])
  {
  	echo "<option value='$r_grade[grade]'>$r_grade[grade]</option>";
  }
}

?>
</select>

</td></tr>

<tr><td><label><b>Department</b></label></td>
<td colspan="4"><input type="text" name="txt_dept" id="txt_dept" value="<?php echo $row1['department']; ?>" /></td></tr>


<tr><td colspan="5" height="30"><label><b><center>Salary Structure</center></b></label></td>
</tr>

<tr><td height="30" colspan="2" style="display:none;"><label><b><center>Earnings</center></b></label></td><td colspan="5" height="30"><label><b><center>Deduction</center></b></label></td>
</tr>


<tr><td style="text-align:right" colspan="5"><b>Grant Type  </b>
<select name="cmb_grant" id="cmb_grant">
<option selected="selected"><?php echo $row1['grant_type']; ?></option>
<option value="Grantable">Grantable</option>
<option value="NonGrantable">NonGrantable</option>
</select>
</td></tr>


<tr><td style="display:none;"><label><b>Basic</b></label></td><td style="display:none;"><input type="text" name="txt_basic" id="txt_basic" value="<?php echo $row1['basic']; ?>" /></td>
<td><label><b>PF Applicable</b></label></td><td colspan="5"><input type="radio" name="chk_pf_applicable" id="chk_pf_applicable" value="Yes"  <?php 
if($row1['pf_applicable']=='Y')
{
?> checked="checked" <?php } ?> /><b>YES</b>&nbsp;<input type="radio" name="chk_pf_applicable" id="chk_pf_applicable" value="NO" <?php 
if($row1['pf_applicable']=='N')
{
?> checked="checked" <?php } ?> /><b>NO</b></td></tr>


<tr><td style="display:none;"><label><b>Dearness Pay</b></label></td><td style="display:none;"><input type="text" name="txt_dearness_pay" id="txt_dearness_pay" value="<?php echo $row1['dearness_pay']; ?>"  /></td>
<td><label><b>PF Number</b></label></td><td colspan="5"><input type="text" name="txt_pf_no" id="txt_pf_no" size="10" value="<?php echo $row1['pf_number']; ?>" /><label><b>Date</b></label><input type="text" name="txt_pf_date" id="txt_pf_date" disabled="disabled" size="10" value="<?php echo $row1['pf_date']; ?>" /><button id="btn_pf_date">...</button></td></tr>

<tr>
<td><label><b>PF UA Number</b></label></td><td colspan="5"><input type="text" name="txt_pf_uan_no" id="txt_pf_uan_no" size="10" value="<?php echo $row1['pf_uan']; ?>" /><label><b>Date</b></label><input type="text" name="txt_pf_uan_date" id="txt_pf_uan_date" disabled="disabled" size="10" value="<?php echo $row1['pf_uan_date']; ?>" /><button id="btn_pf_uan_date">...</button></td></tr>


<tr><td style="display:none;"><label><b>DA</b></label></td><td style="display:none;"><input type="text" name="txt_da" id="txt_da" value="<?php echo $row1['da']; ?>" /></td>
<td><label><b>Prof Tax Applicable</b></label></td><td colspan="5"><input type="radio" name="chk_prof_tax_applicable" id="chk_prof_tax_applicable" value="Yes"<?php 
if($row1['prof_tax_applicable']=='Y')
{
?> checked="checked" <?php } ?> /><b>YES</b>&nbsp;<input type="radio" name="chk_prof_tax_applicable" id="chk_prof_tax_applicable" value="NO" <?php 
if($row1['prof_tax_applicable']=='N')
{
?> checked="checked" <?php } ?>  /><b>NO</b></td>
</tr>

<tr><td style="display:none;"><label><b>HRA</b></label></td><td style="display:none;"><input type="text" name="txt_hra" id="txt_hra" value="<?php echo $row1['hra']; ?>" /></td>
<td><label><b>Gratuity Applicable</b></label></td><td colspan="5"><input type="radio" name="chk_gratuity_applicable" id="chk_gratuity_applicable" value="Yes" <?php 
if($row1['gratuity_applicable']=='Y')
{
?> checked="checked" <?php } ?> /><b>YES</b>&nbsp;<input type="radio" name="chk_gratuity_applicable" id="chk_gratuity_applicable"value="NO" 
<?php if($row1['gratuity_applicable']=='N')
{
?> checked="checked" <?php } ?> /><b>NO</b></td>
</tr>


<tr><td style="display:none;"><label><b>LTA</b></label></td><td style="display:none;"><input type="text" name="txt_lta" id="txt_lta" value="<?php echo $row1['lta']; ?>" /></td>
<td><label><b>TDS</b></label></td><td colspan="5"><input type="radio" name="chk_tds_applicable" id="chk_tds_applicable" value="Yes" <?php if($row1['tds_applicable']=='Y')
{
?> checked="checked" <?php } ?>  /><b>YES</b>&nbsp;<input type="radio" name="chk_tds_applicable" id="chk_tds_applicable" value="NO" <?php if($row1['tds_applicable']=='N')
{
?> checked="checked" <?php } ?>  /><b>NO</b></td>
</tr>


<tr><td style="display:none;"><label><b>Conveyance</b></label></td><td style="display:none;"><input type="text" name="txt_conveyance" id="txt_conveyance" value="<?php echo $row1['conveyance']; ?>" /></td>
<td><label><b>ESI Applicable.</b></label></td><td colspan="5"><input type="radio" name="chk_esi_applicable" id="chk_esi_applicable" value="Yes"   <?php 
if($row1['esi_applicable']=='Y')
{
?> checked="checked" <?php } ?> /><b>YES</b>&nbsp;<input type="radio" name="chk_esi_applicable" id="chk_esi_applicable" value="NO"  <?php 
if($row1['esi_applicable']=='N')
{
?> checked="checked" <?php } ?> /><b>NO</b></td></tr>	


<tr><td style="display:none;"><label><b>Washing Allowance</b></label></td><td style="display:none;"><input type="text" name="txt_special" id="txt_special" value="<?php echo $row1['special']; ?>" /></td>
<td><label><b>Pension Fund Applicable</b></label></td><td colspan="5"><input type="radio" name="chk_pension_fund_applicable" id="chk_pension_fund_applicable" value="Yes"  <?php 
if($row1['pension_fund_applicable']=='Y')
{
?> checked="checked" <?php } ?>   /><b>YES</b>&nbsp;<input type="radio" name="chk_pension_fund_applicable" id="chk_pension_fund_applicable" value="NO"  <?php 
if($row1['pension_fund_applicable']=='N')
{
?> checked="checked" <?php } ?>  /><b>NO</b></td></tr>
</tr>



<tr><td style="display:none;"><label><b>Gross Salary</b></label></td><td colspan="3" style="display:none;"><input type="text" name="txt_gross_salary" id="txt_gross_salary" value="<?php echo $row1['gross_salary']; ?>" /><input type="button" name="Calculate" id="Calculate" onclick="caltotal();" value="Calculate" style="display:none;" /></td>
<tr>						 

<tr><td style="display:none;"><label><b>CTC</b></label></td><td colspan="3" style="display:none;"><input type="text" name="txt_ctc" id="txt_ctc" value="<?php echo $row1['ctc']; ?>" /></td>
<tr>						 

<tr><td><label><b>Employement type</b></label></td><td><select name="txt_emp_type" id="txt_emp_type"><option><?php echo $row1['emp_type'] ?></option><option>Permanent </option><option>Contract</option><option>Temporary</option><option>Probationary</option></select></td>
<td><label><b>Employee Category</b></label></td><td><select name="txt_emp_cat" id="txt_emp_cat"><option><?php echo $row1['emp_cat']; ?></option><option>Medical  </option><option>Paramedical</option><option>Admin </option><option>Class4</option></select></td>
<tr>						 


<tr><td><label><b>Date of Confirmation</b></label></td><td><input type="text" name="txt_date_confirm" id="txt_date_confirm" disabled="disabled" value="<?php echo $row1['date_of_confirm']; ?>"/><button id="btn_confirm_date">...</button></td>
<td><label><b>Date of Separation</b></label></td><td><input type="text" name="txt_date_sep" id="txt_date_sep" disabled="disabled" value="<?php echo $row1['date_of_sepration']; ?>"/><button id="btn_sep_date">...</button></td>
<tr>

<tr><td><label><b>Type of Separation</b></label></td><td><select name="txt_type_of_sep" id="txt_type_of_sep"><option><?php echo $row1['type_of_sep'] ?></option><option>Suspention</option><option>Resignation</option><option>Retirement</option><option>Termination</option><option>Medical ground</option><option>Death Case</option><option value="">None</option></select></td>
<td><label><b>Remark for Separation</b></label></td><td><input type="text" name="txt_remarl_for_sep" id="txt_remarl_for_sep" value="<?php echo $row1['remark_for_sepration']; ?>"></td></tr>


<tr><td><label><b>Salary on joining</b></label></td><td><input type="text" name="txt_salary_on_joining" id="txt_salary_on_joining" value="<?php echo $row1['salary_on_joining']; ?>" /></td>
<td><label><b>Mode of Payment</b></label></td><td><select name="txt_mode_of_payment" id="txt_mode_of_payment"><option><?php echo $row1['mode_of_payment']; ?></option><option>Cash</option><option>cheque</option><option>Bank Transfer</option></select></td></tr>

					 

<tr><td colspan="5" height="30"><label><b><center>Bank Details</center></b></label></td>
</tr>

<tr><td><label><b>Bank Branch Name</b></label></td><td><input type="text" name="txt_bank_branch_name" id="txt_bank_branch_name" value="<?php echo $row1['bank_branch_name'] ?>"  /></td>
<td><label><b>Account No.</b></label></td><td><input type="text" name="txt_account_no" id="txt_account_no" value="<?php echo $row1['bank_account_no'] ?>"  /></td></tr>
</table>

<table border="1" width="900">
<tr><td colspan="4" height="30"><label><b><center>LIC Details</center></b></label></td></tr>

<tr><td><label><b>LIC Account No. 1</b></label></td><td><input type="text" name="txt_lic_acc_no_1" id="txt_lic_acc_no_1" value="<?php echo $row1['lic_acc_no_1'] ?>"  /></td>
<td><label><b>Amount</b></label></td><td><input type="text" name="txt_lic_amt_1" id="txt_lic_amt_1" value="<?php echo $row1['lic_amt_1'] ?>" /></td>
</tr>

<tr><td><label><b>LIC Account No. 2</b></label></td><td><input type="text" name="txt_lic_acc_no_2" id="txt_lic_acc_no_2" value="<?php echo $row1['lic_acc_no_2'] ?>"  /></td>
<td style="display:none"><label><b>LIC ID Number</b></label></td><td style="display:none"><input type="text" name="txt_lic_id_number_2" id="txt_lic_id_number_2" value="<?php echo $row1['lic_id_no_2'] ?>"  /></td>
<td style="display:none"><label><b>LIC Gratuity Number</b></label></td><td style="display:none"><input type="text" name="txt_lic_gratuity_number_2" id="txt_lic_gratuity_number_2"  value="<?php echo $row1['lic_gratuity_no_2'] ?>"  /></td>
<td><label><b>Amount</b></label></td><td><input type="text" name="txt_lic_amt_2" id="txt_lic_amt_2" value="<?php echo $row1['lic_amt_2'] ?>" /></td></tr>

<tr><td><label><b>LIC ID Number</b></label></td><td><input type="text" name="txt_lic_id_number_1" id="txt_lic_id_number_1" value="<?php echo $row1['lic_id_no_1'] ?>"  /></td>
<td><label><b>LIC Gratuity Number</b></label></td><td><input type="text" name="txt_lic_gratuity_number_1" id="txt_lic_gratuity_number_1"  value="<?php echo $row1['lic_gratuity_no_1'] ?>"  /></td></tr>

</table>
<table border="1" width="900">
<tr><td colspan="8" height="30"><label><b><center>Loan Details</center></b></label></td></tr>

<tr><td colspan="2"><label><b>Loan Account No. 1</b></label></td><td><input type="text" name="txt_loan_acc_no_1" id="txt_loan_acc_no_1" value="<?php echo $row1['loan_acc_no_1'] ?>"  /></td>
<td style="display:none"><label><b>Loan ID Number</b></label></td><td style="display:none"><input type="text" name="txt_loan_id_number_1" id="txt_loan_id_number_1"  value="<?php echo $row1['loan_id_no_1'] ?>"  /></td>
<td style="display:none"><label><b>Loan Gratuity Number</b></label></td><td style="display:none"><input type="text" name="txt_loan_gratuity_number_1" id="txt_loan_gratuity_number_1"  value="<?php echo $row1['loan_gratuity_no_1'] ?>"  /></td>
<td colspan="2"><label><b>Amount</b></label></td><td colspan="3"><input type="text" name="txt_loan_amt_1" id="txt_loan_amt_1" value="<?php echo $row1['loan_amt_1'] ?>" /></td></tr>

<tr><td colspan="2"><label><b>Loan Account No. 2</b></label></td><td><input type="text" name="txt_loan_acc_no_2" id="txt_loan_acc_no_2" value="<?php echo $row1['loan_acc_no_2'] ?>"  /></td>
<td style="display:none"><label><b>Loan ID Number</b></label></td><td style="display:none"><input type="text" name="txt_loan_id_number_2" id="txt_loan_id_number_2" value="<?php echo $row1['loan_id_no_2'] ?>"  /></td>
<td style="display:none"><label><b>Loan Gratuity Number</b></label></td><td style="display:none"><input type="text" name="txt_loan_gratuity_number_2" id="txt_loan_gratuity_number_2"  value="<?php echo $row1['loan_gratuity_no_2'] ?>"  /></td>
<td colspan="2"><label><b>Amount</b></label></td><td colspan="3"><input type="text" name="txt_loan_amt_2" id="txt_loan_amt_2" value="<?php echo $row1['loan_amt_2'] ?>" /></td></tr>

</table>



<tr><td colspan="5"><center><input type="button" name="btn_update_company_info" id="btn_update_company_info" value="Update" onclick="update_company_info();" <?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
  /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>
							   <?php
							   }
							   }
							   ?>
                                      </form> 
<center><b><div id="error2"></div></b></center>
<!--<script type="text/javascript" src="../js/ajax.js"></script>
 --><!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->
 <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_of_joining",
        trigger    : "f_btn1",
        onSelect   : function() { this.hide();validation_date_joining(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script> 
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_comp_change_eff_date",
        trigger    : "f_btn_effective_date",
        onSelect   : function() { this.hide();validation_comp_change_eff_date(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	  
	   <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_pf_date",
        trigger    : "btn_pf_date",
        onSelect   : function() { this.hide();validation_pf_date(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	  
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_pf_uan_date",
        trigger    : "btn_pf_uan_date",
        onSelect   : function() { this.hide();validation_pf_uan_date(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	   <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_confirm",
        trigger    : "btn_confirm_date",
        onSelect   : function() { this.hide();validation_date_confirm(this); },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	  
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_sep",
        trigger    : "btn_sep_date",
        onSelect   : function() { this.hide();validation_date_sep(this);  },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	    </div>
	  
	  
	   <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
	  
	   <form action="#" name="qualification_info" method="post">
	     <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Update  Qualification Information</center></font></td></tr></table> 
                                <table border="1" width="900">
								<tr><td colspan="5"><b><center>Education & Qualification</center></b></td></tr>
<?php
$emp_no = $_POST['rdb_emp_no'];
$sql7 = mysql_query("select * from empl_master where employee_no='$emp_no'");
while($r1  =mysql_fetch_assoc($sql7))
{
?>								
                               <tr><td><label><b>Employee No.</b></label></td><td><input type="text" name="txt_emp_no3" id="txt_emp_no3" value="<?php echo $emp_no; ?>" disabled="disabled" /></td><td><b>Employee Name</b></td><td><input type="text" name="emp_name" value="<?php echo $r1['first_name']; ?>" disabled="disabled" /></td></tr>
<?php
}
?>							    							
</table>
<table width="900" border="1">
  
<tr><td colspan="15">
 <INPUT type="button" value="Add Row" onClick="addRow('dataTable')" />
 
    <INPUT type="button" value="Delete Row" onClick="deleteRow('dataTable')" /></td></tr>
<tr><td width="55"><b>Sr.No</b></td><td width="180"><b><center>Degree Title*</center></b></td><td width="152"><b><center>Subject**</center></b></td><td width="80"><b><center>Year Of Passing*</center></b></td><td width="110"><b><center>University*</center></b></td><td width="106"><b><center>State</center></b></td><td width=""><b><center>Country</center></b></td></tr>
</table>
<table width="900" id="dataTable" border="1">
 <?php
$emp_no = $_POST['rdb_emp_no'];
$sql2 = mysql_query("select * from qualification where employee_no='$emp_no'");
while($row2 = mysql_fetch_assoc($sql2))
{
?>	    
<tr><TD width="10"><INPUT type="checkbox" name="chk[]"/></TD><td width="30"><input type="text" name="txt_sir_no0" id="txt_sir_no0" size="1" onkeyup="checkforduplicate()" value="<?php echo $row2['sr_no']; ?>" /></td>
<td width="120"><input type="text" name="txt_degree_title" id="txt_degree_title" size="25" value="<?php echo $row2['degree_title']; ?>" /></td>
<td width="100"><input type="text" name="txt_subject" id="txt_subject" size="21" value="<?php echo $row2['subject']; ?>" /></td>
<td width="50"><input type="text" name="txt_year_of_passing" id="txt_year_of_passing" size="8" value="<?php echo $row2['year_of_passing']; ?>" /></td>
<td width="60"><input type="text" name="txt_university" id="txt_university" size="13" value="<?php echo $row2['university']; ?>" /></td>
<td width="60"><input type="text" name="txt_state" id="txt_state" size="13" value="<?php echo $row2['state']; ?>" /></td>
<td><input type="text" name="txt_country" id="txt_country" size="23" value="<?php echo $row2['country']; ?>" /></td>

</tr>
<?php
}

?>
</table>


<tr><td colspan="5"><center><input type="button" name="btn_update_education_info" id="btn_update_education_info" onclick="update_education_info();" value="Update"  <?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
 /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>

                                         </form> 
<center><b><div id="error3"></div></b></center>
</div>
	  <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide"> 
	   <form action="#" name="experience_info" method="post">  
	    <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Update  Experience Information</center></font></td></tr></table> 
                                <table border="1" width="900">
<?php
$emp_no = $_POST['rdb_emp_no'];
$sql8 = mysql_query("select * from empl_master where employee_no='$emp_no'");
while($r1  =mysql_fetch_assoc($sql8))
{
?>								
								
								
                               <tr><td><label><b>Employee No.</b></label></td><td><input type="text" name="txt_emp_no4" id="txt_emp_no4" value="<?php echo $emp_no; ?>" disabled="disabled" /></td><td><b>Employee Name</b></td><td><input type="text" name="emp_name" value="<?php echo $r1['first_name']; ?>" disabled="disabled" /></td></tr></table>
<?php
}
?>
						    							
<table width="900" border="1">
  

<tr><td colspan="15">
 <INPUT type="button" value="Add Row" onClick="addRow1('dataTable1')" /><INPUT type="button" value="Delete Row" onClick="deleteRow1('dataTable1')" /></td></tr><tr><td width="55"><b>Sr.No</b></td><td width="150"><b><center>Company Name*</center></b></td><td width="153"><b><center>Designation</center></b></td><td width="152"><b><center>From Period*</center></b></td><td width=""><b><center>Upto Period*</center></b></td><td width=""><b><center>Role Details</center></b></td></tr>
</table>
<table width="900" id="dataTable1" border="1">
<?php
$emp_no = $_POST['rdb_emp_no'];
$sql3 = mysql_query("select * from experience where employee_no='$emp_no'");
while($row3 = mysql_fetch_assoc($sql3))
{
?>	      
<tr><TD width="10"><INPUT type="checkbox" name="chk[]"/></TD><td width="30"><input type="text" name="txt_sir_no0" id="txt_sir_no0" size="2" onkeyup="checkforduplicate()" value="<?php echo $row3['sr_no']; ?>"  /></td>
<td width="120"><input type="text" name="txt_company_name" id="txt_company_name" value="<?php echo $row3['company_name']; ?>" /></td>
<td width="100"><input type="text" name="txt_designation" id="txt_designation"  value="<?php echo $row3['designation']; ?>"  /></td>
<td width="70"><input type="text" name="txt_from_period" id="txt_from_period" value="<?php echo $row3['from_period']; ?>" /></td>
<td><input type="text" name="txt_upto_period" id="txt_upto_period" value="<?php echo $row3['upto_period']; ?>" /></td>
<td><input type="text" name="txt_role_details" id="txt_role_details" value="<?php echo $row3['role_details']; ?>" /></td>


</tr>
<?php
}
?>
</table>





<tr><td colspan="5"><center><input type="button" name="btn_update_experience_info" id="btn_update_experience_info" value="Update" onclick="update_experience();" <?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
  /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>

                                     </form>
<center><b><div id="error4"></div></b></center>
</div>


  <div id="fragment-5" class="ui-tabs-panel ui-tabs-hide"> 
  <form action="#" name="family_info" method="post"> 
 <?php
$emp_no = $_POST['rdb_emp_no'];
$sql4 = mysql_query("select * from family_info where employee_no='$emp_no'");
while($row4 = mysql_fetch_assoc($sql4))
{
?>	         <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Update  Family Information</center></font></td></tr></table> 
                                <table border="1" width="900">
								<tr><td colspan="5"><b><center>Family Information</center></b></td></tr>
								
								<?php
$emp_no = $_POST['rdb_emp_no'];
$sql9 = mysql_query("select * from empl_master where employee_no='$emp_no'");
while($r1  =mysql_fetch_assoc($sql9))
{
?>								

                               <tr><td><label><b>Employee No.</b></label></td><td colspan="3"><input type="text" name="txt_emp_no5" id="txt_emp_no5" value="<?php echo $emp_no; ?>" disabled="disabled" /></td><tr>
<tr><td><b>Employee Name</b></td><td colspan="3"><input type="text" name="emp_name" value="<?php echo $r1['first_name']; ?>" disabled="disabled" /></td></tr>
							    							
<?php
}
?>

<tr><td><label><b>Spouse_Name*</b></label></td><td colspan="3"><input type="text" name="txt_spouse_Name" id="txt_spouse_Name" value="<?php echo $row4['spouse_name']; ?>" /></td></tr>
<tr><td><label><b>Spouse Contact No.</b></label></td><td colspan="3"><input type="text" name="txt_spouse_contact_no" id="txt_spouse_contact_no" value="<?php echo $row4['spouse_contact_no']; ?>" onkeyup="check_field('txt_spouse_contact_no');" /></td></tr>

<tr><td><label><b>No Of Family Members</b></label></td><td colspan="3"><input type="text" name="txt_no_of_family_member" id="txt_no_of_family_member" value="<?php echo $row4['no_of_members']; ?>" /></td></tr>
<tr><td><label><b>Dependents Members</b></label></td><td colspan="3"><input type="text" name="txt_no_of_dependents" id="txt_no_of_dependents" value="<?php echo $row4['no_of_dependents']; ?>" /></td></tr>
<tr><td colspan="4"><label><b><center>Nominees</center></b></label></td></tr>
<tr><td><b><center>Name</center></b></td><td><b><center>Relation</center></b></td><td><b><center>Age</center></b></td><td><b><center>Name of Gaurdian</center></b></td></tr>
<tr><td><input type="text" name="txt_name1" id="txt_name1" size="25" value="<?php echo $row4['name1']; ?>" /></td>
<td><input type="text" name="txt_relation1" id="txt_relation1" size="20" value="<?php echo $row4['relation1']; ?>" /></td>
<td><input type="text" name="txt_age1" id="txt_age1" value="<?php echo $row4['age1']; ?>" /></td>
<td><input type="text" name="txt_name_of_gaurdian1" id="txt_name_of_gaurdian1" value="<?php echo $row4['gaurdian_name1']; ?>" /></td></tr>

<tr><td><input type="text" name="txt_name2" id="txt_name2" size="25" value="<?php echo $row4['name2']; ?>" /></td>
<td><input type="text" name="txt_relation2" id="txt_relation2" size="20" value="<?php echo $row4['relation2']; ?>" /></td>
<td><input type="text" name="txt_age2" id="txt_age2" value="<?php echo $row4['age2']; ?>" /></td>
<td><input type="text" name="txt_name_of_gaurdian2" id="txt_name_of_gaurdian2" value="<?php echo $row4['gaurdian_name2']; ?>" /></td></tr>


<tr><td colspan="5"><center><input type="button" name="btn_update_family_info" id="btn_update_family_info" value="Update" onclick="update_family_info();"  <?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
 /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						     
							   </table>
<?php
}
?>
                                   </form> 
<center><b><div id="error5"></div></b></center>

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
   <script type="text/javascript" src="../js/ajax.js"></script> 
</body>
</html>
