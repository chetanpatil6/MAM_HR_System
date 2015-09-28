<?php
include("../model/Model.php");
//session_start();
if(isset($_POST['txt_login_name']))
{
$_SESSION['txt_login_name'] = $_POST['txt_login_name'];
$_SESSION['password_1'] = $_POST['txt_password'];

}
$sq1 = mysql_query("select * from user where user_name='$_SESSION[txt_login_name]' and password='$_SESSION[password_1]'");

if($r1 = mysql_fetch_assoc($sq1))
{
$_SESSION['role'] = $r1['role'];
?>
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
 
    </SCRIPT>
	
	<SCRIPT language="javascript">



function foo1() {

    if( typeof foo1.counter == 'undefined' ) {
        foo1.counter = 1;
    }
    foo1.counter++;
	var table = document.getElementById('dataTable1');
 
            var rowCount = table.rows.length;
			
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

    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
	<link rel="stylesheet" href="tabs.css" type="text/css" media="screen, projection"/>

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
			       var save_btn = document.getElementById('btn_add_personal_info');
				   if(save_btn.disabled == true)
				   {
		           	$tabs.tabs('select', $(this).attr("rel"));
		           	return false;
				   }
				   else
				   {
				   var r = confirm("Do you want to save Personal Information???");
				   	if (r==true)
  					{
  						add_personal_info();
						$tabs.tabs('select', $(this).attr("rel"));
						return false;
  					}
					else
  					{
  						return false;
  					}
				   
				   }
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
                        <!--<div id="slogan-text" class="art-Logo-text">Slogan text</div> -->
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
					<!--<script type="text/javascript" src="main_menu.js"></script> -->
                	<ul class="art-menu">
 <li><a href="personal_info.php" class=" active"><span class="l"></span><span class="r"></span><span class="t">Personal Info</span></a>
</li>
                			
<li><a href="search_for_update.php"><span class="l"></span><span class="r"></span><span class="t">Search For Update</span></a>
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
		<div id="content" style="padding-top:-1px;">
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
                                      <form action="#" name="personal_info" method="post" onsubmit="return validatemalefemale()">          
                             
								
<?php
$count1 = 0;
$sql=mysql_query("SELECT employee_no from empl_master order by employee_no");
while($row = mysql_fetch_assoc($sql))
{
$count1 = $count1 + 1;
}

$var = $count1 + 1;
$code1 = 'E'.$var;
?>                   <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Personal Information</center></font></td></tr></table>
 <table border="1" width="900">
                     <tr><td><label><b>Employee Id</b></label></td><td colspan="2"><input type="text" name="txt_emp_no1" id="txt_emp_no1"><td colspan="2" style="display:none"><input type="text" name="txt_emp_no1" id="txt_emp_no1" value="<?php echo $code1; ?>" disabled="disabled"/></td></tr>
					                      <tr><td><label><b>Employee Code</b></label></td><td colspan="2"><input type="text" name="txt_emp_code" id="txt_emp_code"></tr>

							    <tr><td colspan="3" height="30"><label><b><center>Employee Name</center></b></label></td></tr>
								<tr><td><label><b><center>First Name*</center></b></label></td><td><label><b><center>Middle Name</center></b></label></td><td><label><b><center>Last Name*</center></b></label></td></tr>
								
								<tr><td><center><input type="text" name="txt_first_name" id="txt_first_name" size="30" onblur="copyname();"  /></center></td>
								<td><center><input type="text" name="txt_middle_name" id="txt_middle_name" size="30" /></center></td><td><center><input type="text" name="txt_last_name" id="txt_last_name" size="30" /></center></td></tr></table>


<table border="1" width="900">								

<tr><td><label><b>Gender*</b></label></td><td><label><b>Male</b></label><input type="radio" name="rdb_gender" id="rdb_gender" value="Male" /><label><b>Female</b></label><input type="radio" name="rdb_gender" id="rdb_gender" value="Female" /></td>
<td><label><b>Date of Birth</b></label></td><td><input type="text" name="txt_date_of_birth" id="txt_date_of_birth"  /><button id="f_btn" >...</button></td></tr>

<tr><td><label><b>Marital Status</b></label></td><td><select style="width:150px" name="cmb_marital_status" id="cmb_marital_status" onchange="validatemalefemale();"><option>Unmarried</option><option>Married</option><option>Divorcee</option>
<option>Widow</option>
</select></td><td><label><b>Blood Group</b></label></td><td><input type="text" name="txt_blood_group" id="txt_blood_group" /></td></tr>

<tr><td><label><b>Place of Origin</b></label></td><td><input type="text" name="txt_place_of_origin" id="txt_place_of_origin" /></td>
<td><label><b>Nationality</b></label></td><td><input type="text" name="txt_nationality" id="txt_nationality" /></td></tr>

<tr><td colspan="2" height="30"><label><b><center>Present Addresss</font></center></b></label></td>
<td colspan="2"><label><b><center>Permanent Address</center></b></label></td></tr>
<tr><td colspan="6">
<input type="checkbox" name="chk" id="chk" onclick="copyaddr()"  /><b>Same As</b></td>
<tr><td colspan="2"><center><input type="text" name="txt_present_addr_1" id="txt_present_addr_1" size="50" /></center></td>
<td colspan="2"><center><input type="text" name="txt_permanent_addr_1" id="txt_permanent_addr_1" size="50"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_present_addr_2" id="txt_present_addr_2" size="50" /></center></td>
<td colspan="2"><center><input type="text" name="txt_permanent_addr_2" id="txt_permanent_addr_2" size="50"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_present_addr_3" id="txt_present_addr_3" size="50" /></center></td>
<td colspan="2"><center><input type="text" name="txt_permanent_addr_3" id="txt_permanent_addr_3" size="50"></center></td></tr>

<tr><td><label><b>City</b></label></td><td><input type="text" name="txt_present_city" id="txt_present_city" /></td>
<td><label><b>City</b></label></td><td><input type="text" name="txt_permanent_city" id="txt_permanent_city" /></td></tr>

<tr><td><label><b>Pin Code</b></label></td><td><input type="text" name="txt_present_pin_code" id="txt_present_pin_code" onkeyup="check_field('txt_present_pin_code');" /></td>
<td><label><b>Pin Code</b></label></td><td><input type="text" name="txt_permanent_pin_code" id="txt_permanent_pin_code" onkeyup="check_field('txt_permanent_pin_code');" /></td></tr>


<tr><td><label><b>State</b></label></td><td><input type="text" name="txt_present_state" id="txt_present_state" /></td>
<td><label><b>State</b></label></td><td><input type="text" name="txt_permanent_state" id="txt_permanent_state" /></td></tr>
		
<tr><td><label><b>Country</b></label></td><td><input type="text" name="txt_present_country" id="txt_present_country" /></td>
<td><label><b>Country</b></label></td><td><input type="text" name="txt_permanent_country" id="txt_permanent_country" /></td></tr>	

<tr><td><label><b>Residential Phone No.</b></label></td><td><input type="text" name="txt_residential_phone_no" id="txt_residential_phone_no" onkeyup="check_field('txt_residential_phone_no');" /></td>
<td><label><b>Mobile No.</b></label></td><td><input type="text" name="txt_mobile_no" id="txt_mobile_no" onkeyup="check_field('txt_mobile_no');" /></td></tr>							 
<tr>
<td><label><b>Emergency Contact Person</b></label></td><td><input type="text" name="txt_emergency_contact_person" id="txt_emergency_contact_person" /></td><td><label><b>Emergency Contact No.</b></label></td><td><input type="text" name="txt_emergency_contact_no" id="txt_emergency_contact_no" onkeyup="check_field('txt_emergency_contact_no');" /></td></tr>	
<tr><td><label><b>Email Id</b></label></td><td colspan="3"><input type="text" name="email_id" id="email_id" size="50" /></td></tr>						

<tr><td colspan="5"><center><input type="button" name="btn_add_personal_info" id="btn_add_personal_info" onclick="add_personal_info();" 
<?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
value="Save"  />


<input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>
                                       </form>
<div id="error1"></div>

<!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->

<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_of_birth",
        trigger    : "f_btn",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>

   
   </div>

                              <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
							 <form action="#" name="company_info" method="post">          
                                <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Employement Details</center></font></td></tr></table>
							    <table border="1" width="900">
								
								
 <tr><td><label><b>Employee Code.</b></label></td><td><input type="text" name="txt_emp_no2" id="txt_emp_no2" disabled="disabled" /><td style="display:none"><input type="text" name="txt_emp_no2" id="txt_emp_no2" value="<?php echo $code1; ?>" disabled="disabled" /></td><td><b>Employee Name</b></td>

<td><input type="text" name="txt_emp_name1" id="txt_emp_name1" disabled="disabled" /></td></tr>
<tr><td><label><b>Date of Joining*</b></label></td><td><input type="text" name="txt_date_of_joining" id="txt_date_of_joining" /><button id="f_btn1">...</button></td>
<td><label><b>Company Change Effective Date</b></label></td><td><input type="text" name="txt_comp_change_eff_date" id="txt_comp_change_eff_date" /><button id="f_btn_effective_date">...</button></td></tr>
<tr><td><label><b>Designation</b></label></td><td><input type="text" name="txt_designation" id="txt_designation" /></td>
<td><label><b>Grade</b></label></td><td><input type="text" name="txt_grade" id="txt_grade" /></td></tr>


<tr><td colspan="5" height="30"><label><b><center>Salary Structure</center></b></label></td>
</tr>

<tr><td height="30" colspan="2"><label><b><center>Earnings</center></b></label></td><td colspan="2" height="30"><label><b><center>Deduction</center></b></label></td>
</tr>

<tr><td><label><b>Basic</b></label></td><td><input type="text" name="txt_basic" id="txt_basic" onfocus="caltotal();" /></td>
<td><label><b>PF Applicable</b></label></td><td><input type="radio" name="chk_pf_applicable" id="chk_pf_applicable" value="Yes" /><b>YES</b>&nbsp;<input type="radio" name="chk_pf_applicable" id="chk_pf_applicable" value="NO" /><b>NO</b></td></tr>

<tr><td><label><b>Dearness Pay</b></label></td><td><input type="text" name="txt_dearness_pay" id="txt_dearness_pay" /></td>
<td><label><b>PF Number</b></label></td><td><input type="text" name="txt_pf_no" id="txt_pf_no" size="10" /><label><b>Date</b></label><input type="text" name="txt_pf_date" id="txt_pf_date" size="10" /><button id="btn_pf_date">...</button></td></tr>


<tr><td><label><b>DA</b></label></td><td><input type="text" name="txt_da" id="txt_da" /></td>
<td><label><b>Prof Tax Applicable</b></label></td><td><input type="radio" name="chk_prof_tax_applicable" id="chk_prof_tax_applicable" value="Yes"  /><b>YES</b>&nbsp;<input type="radio" name="chk_prof_tax_applicable" id="chk_prof_tax_applicable" value="NO" /><b>NO</b></td>
</tr>


<tr><td><label><b>HRA</b></label></td><td><input type="text" name="txt_hra" id="txt_hra" /></td>
<td><label><b>Gratuity Applicable</b></label></td><td><input type="radio" name="chk_gratuity_applicable" id="chk_gratuity_applicable" value="Yes"  /><b>YES</b>&nbsp;<input type="radio" name="chk_gratuity_applicable" id="chk_gratuity_applicable" value="NO" /><b>NO</b></td>
</tr>


<tr><td><label><b>LTA</b></label></td><td><input type="text" name="txt_lta" id="txt_lta" /></td>
<td><label><b>TDS</b></label></td><td><input type="radio" name="chk_tds_applicable" id="chk_tds_applicable" value="Yes"  /><b>YES</b>&nbsp;<input type="radio" name="chk_tds_applicable" id="chk_tds_applicable" value="NO" /><b>NO</b></td>
</tr>

<tr><td><label><b>Conveyance</b></label></td><td><input type="text" name="txt_conveyance" id="txt_conveyance" /></td>
<td><label><b>ESI Applicable.</b></label></td><td><input type="radio" name="chk_esi_applicable" id="chk_esi_applicable" value="Yes"  /><b>YES</b>&nbsp;<input type="radio" name="chk_esi_applicable" id="chk_esi_applicable" value="NO" /><b>NO</b></td></tr>	



<tr><td><label><b>Washing Allowance</b></label></td><td><input type="text" name="txt_special" id="txt_special" /></td>
<td><label><b>Pension Fund Applicable</b></label></td><td><input type="radio" name="chk_pension_fund_applicable" id="chk_pension_fund_applicable" value="Yes"  /><b>YES</b>&nbsp;<input type="radio" name="chk_pension_fund_applicable" id="chk_pension_fund_applicable" value="NO" /><b>NO</b></td></tr>
</tr>


<tr><td><label><b>Gross Salary</b></label></td><td colspan="3"><input type="text" name="txt_gross_salary" id="txt_gross_salary" /><input type="button" name="Calculate" id="Calculate" onclick="caltotal();" value="Calculate" /></td>
<tr>						 

<tr><td><label><b>CTC</b></label></td><td colspan="3"><input type="text" name="txt_ctc" id="txt_ctc" /></td>
<tr>						 

<tr><td><label><b>Employement type</b></label></td><td><select name="txt_emp_type" id="txt_emp_type"><option></option><option>Permanent </option><option>Contract</option><option>Temporary</option><option>Probationary</option></select></td>
<td><label><b>Employee Category</b></label></td><td><select name="txt_emp_cat" id="txt_emp_cat"><option></option><option>Medical  </option><option>Paramedical</option><option>Admin </option><option>Class4</option></select></td>
<tr>						 


<tr><td><label><b>Date of Confirmation</b></label></td><td><input type="text" name="txt_date_confirm" id="txt_date_confirm"><button id="btn_confirm_date">...</button></td>
<td><label><b>Date of Separation</b></label></td><td><input type="text" name="txt_date_sep" id="txt_date_sep"><button id="btn_sep_date">...</button></td>
<tr>

<tr><td><label><b>Type of Separation</b></label></td><td><select name="txt_type_of_sep" id="txt_type_of_sep"><option></option><option>Suspention</option><option>Resignation</option><option>Retirement</option><option>Termination</option><option>Medical ground</option><option>Death Case</option></select></td>
<td><label><b>Remark for Separation</b></label></td><td><input type="text" name="txt_remarl_for_sep" id="txt_remarl_for_sep"></td></tr>


<tr><td><label><b>Salary on joining</b></label></td><td><input type="text" name="txt_salary_on_joining" id="txt_salary_on_joining" /></td>
<td><label><b>Mode of Payment</b></label></td><td><select name="txt_mode_of_payment" id="txt_mode_of_payment"><option>Cash</option><option>cheque</option><option>Bank Transfer</option></select></td></tr>

<tr><td colspan="5" height="30"><label><b><center>Bank Details</center></b></label></td></tr>

<tr><td><label><b>Bank Branch Name</b></label></td><td><input type="text" name="txt_bank_branch_name" id="txt_bank_branch_name"  /></td>
<td><label><b>Account No.</b></label></td><td><input type="text" name="txt_account_no" id="txt_account_no" /></td></tr>


<!--<tr><td colspan="2" height="30"><label><b><center>Allowance</center></b></label></td>
<td colspan="2" height="30"><label><b><center>Deduction</center></b></label></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_allowance_1" size="50" id="txt_allowance_1" /></center></td>
<td colspan="2"><center><input type="text" name="txt_deduction_1" id="txt_deduction_1" size="50"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_allowance_2" id="txt_allowance_2" size="50" /></center></td>
<td colspan="2"><center><input type="text" name="txt_deduction_2" id="txt_deduction_2" size="50"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_allowance_3" id="txt_allowance_3" size="50" /></center></td>
<td colspan="2"><center><input type="text" name="txt_deduction_3" id="txt_deduction_3" size="50"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_allowance_4" id="txt_allowance_4" size="50" /></center></td>
<td colspan="2"><center><input type="text" name="txt_deduction_4" id="txt_deduction_4" size="50"></center></td></tr>

<tr><td colspan="2"><center><input type="text" name="txt_allowance_5" id="txt_allowance_5" size="50" /></center></td>
<td colspan="2"><center><input type="text" name="txt_deduction_5" id="txt_deduction_5" size="50"></center></td></tr>
 -->


<tr><td colspan="5"><center><input type="button" name="btn_add_company_info" id="btn_add_company_info" value="Save"
<?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>

 onclick="add_company_info();"  /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>
                                      </form> 
										<div id="error2"></div>
<!--<script type="text/javascript" src="../js/ajax.js"></script>
 --><!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->
 <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_of_joining",
        trigger    : "f_btn1",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script> 
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_comp_change_eff_date",
        trigger    : "f_btn_effective_date",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	  
	   <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_pf_date",
        trigger    : "btn_pf_date",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	  
	   <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_confirm",
        trigger    : "btn_confirm_date",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	  
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_date_sep",
        trigger    : "btn_sep_date",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
	     </div>
	  
	  
	   <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
	  
	   <form action="#" name="qualification_info" method="post">          
                                <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Qualification Information</center></font></td></tr></table>
							   <table border="1" width="900">
								
								

                               <tr><td><label><b>Employee Code.</b></label></td><td><input type="text" name="txt_emp_no3" id="txt_emp_no3" disabled="disabled" /><td style="display:none;"><input type="text" name="txt_emp_no3" id="txt_emp_no3" value="<?php echo $code1; ?>" disabled="disabled"  /></td><td><b>Employee Name</b></td>
  <td><input type="text" name="txt_emp_name2" id="txt_emp_name2" disabled="disabled" /></tr>
	</table>
<table width="900" border="1">
<tr><td colspan="15">
 <INPUT type="button" value="Add Row" onClick="addRow('dataTable')" />
 
 <INPUT type="button" value="Delete Row" onClick="deleteRow('dataTable')" /></td></tr>
<tr><td width="30"><b>Sr.No</b></td><td width="120"><b><center>Degree Title*</center></b></td><td width="100"><b><center>Subject*</center></b></td><td width="70"><b><center>Year Of Passing*</center></b></td><td width="60"><b><center>University*</center></b></td><td width="57"><b><center>State</center></b></td><td width="100"><b><center>Country</center></b></td></tr>
</table>
<table width="900" id="dataTable" border="1">
<tr><TD width="10"><INPUT type="checkbox" name="chk[]"/></TD><td width="30"><input type="text" name="txt_sir_no0" id="txt_sir_no0" size="2" onkeyup="checkforduplicate()" value="1" disabled="disabled" /></td>
<td width="120"><input type="text" name="txt_degree_title" id="txt_degree_title" size="26" /></td>
<td width="100"><input type="text" name="txt_subject" id="txt_subject" size="21" /></td>
<td width="60"><input type="text" name="txt_year_of_passing" id="txt_year_of_passing" size="13" /></td>
<td width="70"><input type="text" name="txt_university" id="txt_university" size="14" /></td>
<td width="80"><input type="text" name="txt_state" id="txt_state" size="10" /></td>
<td><input type="text" name="txt_country" id="txt_country" size="20"  /></td>

</tr>

</table>





<tr><td colspan="5"><center><input type="button" name="btn_add_education_info" id="btn_add_education_info"
<?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>

 onclick="add_education_info();" value="Save"  /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>
                                         </form> 
										 <div id="error3"></div>
</div>
	  <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide"> 
	   <form action="#" name="experience_info" method="post">
	    <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Experience Information</center></font></td></tr></table>       
                                <table border="1" width="900">
								
								
                               <tr><td><label><b>Employee Code.</b></label></td><td><input type="text" name="txt_emp_no4" id="txt_emp_no4" disabled="disabled"/><td style="display:none;"><input type="text" name="txt_emp_no4" id="txt_emp_no4" value="<?php echo $code1; ?>" disabled="disabled" /></td><td><b>Employee Name</b></td>
							   
 <td><input type="text" name="txt_emp_name3" id="txt_emp_name3" disabled="disabled" /></td></tr>


</table>

<table width="900" border="1">
<tr><td colspan="15">
 <INPUT type="button" value="Add Row" onClick="addRow1('dataTable1')" /><INPUT type="button" value="Delete Row" onClick="deleteRow1('dataTable1')" /></td></tr><tr><td width="2"><b>Sr.No</b></td><td width="80"><b><center>Company Name*</center></b></td><td width="80"><b><center>Designation</center></b></td><td width="70"><b><center>From Period*</center></b></td><td width="40"><b><center>Upto Period*</center></b></td><td width="70"><b><center>Role Details</center></b></td></tr>
</table>
<table width="900" id="dataTable1" border="1">
<tr><TD width="10"><INPUT type="checkbox" name="chk[]"/></TD><td width="30"><input type="text" name="txt_sir_no0" id="txt_sir_no0" size="6" onkeyup="checkforduplicate()" value="1"  disabled="disabled" /></td>
<td width="85"><input type="text" name="txt_company_name" id="txt_company_name" size="25" /><!--<button id="From_Period" >...</button> --></td>
<td width="75"><input type="text" name="txt_designation" id="txt_designation" size="26" /><!--<button id="updo_Period" >...</button> --></td>
<td width="70"><input type="text" name="txt_from_period" id="txt_from_period" size="21" /></td>
<td><input type="text" name="txt_upto_period" id="txt_upto_period" size="13" /></td>
<td><input type="text" name="txt_role_details" id="txt_role_details" size="19"/></td>


</tr>

</table>





<tr><td colspan="5"><center><input type="button" name="btn_add_experience_info" id="btn_add_experience_info" value="Save" onclick="add_experience();" <?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
 /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						   
							   </table>
                                     </form>
									 <div id="error4"></div>
									  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_from_period",
        trigger    : "From_Period",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script> 
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_upto_period",
        trigger    : "updo_Period",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>  
	  
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "txt_upto_period",
        trigger    : "updo_Period",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>  
</div>


  <div id="fragment-5" class="ui-tabs-panel ui-tabs-hide"> 
  <form action="#" name="family_info" method="post">          
                                
								 <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Family Information</center></font></td></tr></table> 
								<table border="1" width="900">
								
                               <tr><td><label><b>Employee Code.</b></label></td><td colspan="3"><input type="text" name="txt_emp_no5" id="txt_emp_no5" disabled="disabled" /><td colspan="3" style="display:none;"><input type="text" name="txt_emp_no5" id="txt_emp_no5" value="<?php echo $code1; ?>" disabled="disabled" /></td></tr>
<tr><td><b>Employee Name</b></td><td colspan="3"><input type="text" name="txt_emp_name4" id="txt_emp_name4" disabled="disabled" /></td></tr>							    							


<tr><td><label><b>Spouse_Name*</b></label></td><td colspan="3"><input type="text" name="txt_spouse_Name" id="txt_spouse_Name" /></td></tr>
<tr><td><label><b>Spouse Contact No.</b></label></td><td colspan="3"><input type="text" name="txt_spouse_contact_no" id="txt_spouse_contact_no" onkeyup="check_field('txt_spouse_contact_no');" /></td></tr>

<tr><td><label><b>No Of Family Members</b></label></td><td colspan="3"><input type="text" name="txt_no_of_family_member" id="txt_no_of_family_member" /></td></tr>
<tr><td><label><b>Dependents Members</b></label></td><td colspan="3"><input type="text" name="txt_no_of_dependents" id="txt_no_of_dependents" /></td></tr>
<tr><td colspan="4"><label><b><center>Nominees</center></b></label></td></tr>
<tr><td><b><center>Name</center></b></td><td><b><center>Relation</center></b></td><td><b><center>Age</center></b></td><td><b><center>Name of Gaurdian</center></b></td></tr>
<tr><td><input type="text" name="txt_name1" id="txt_name1" size="25" /></td>
<td><input type="text" name="txt_relation1" id="txt_relation1" size="20" /></td>
<td><input type="text" name="txt_age1" id="txt_age1" /></td>
<td><input type="text" name="txt_name_of_gaurdian1" id="txt_name_of_gaurdian1" /></td></tr>

<tr><td><input type="text" name="txt_name2" id="txt_name2" size="25" /></td>
<td><input type="text" name="txt_relation2" id="txt_relation2" size="20" /></td>
<td><input type="text" name="txt_age2" id="txt_age2" /></td>
<td><input type="text" name="txt_name_of_gaurdian2" id="txt_name_of_gaurdian2" /></td></tr>


<tr><td colspan="5"><center><input type="button" name="btn_add_family_info" id="btn_add_family_info" value="Save" onclick="add_family_info();" <?php if($_SESSION['role']=='ViewOnly')
 {
 ?>
 disabled="disabled"  <?php } ?>
  /><input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></center></td></tr> 
						     
							   </table>
                                   </form> 
								    <div id="error5"></div>

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
<?php
}
else
{
echo "Invalid Password";
//header('location:../index.php');
}
?>