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
<li><a href="add_user.php"><span class="l"></span><span class="r"></span><span class="t">Payroll</span></a>
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
        		<li><a href="#fragment-1">Compensation Heads</a></li>
        		<li><a href="#fragment-2">Employee Compensation Master</a></li>
        		<li><a href="#fragment-3">Grade wise compensation</a></li>
        		<li><a href="#fragment-4">Month Control</a></li>
        		<li><a href="#fragment-5">Attendance</a></li><br /><br />
				<li><a href="#fragment-6">Recovery</a></li>
        	  
        		
    	   </ul>
	
        	<div id="fragment-1" class="ui-tabs-panel">
                                      <form action="#" method="post" name="frm_comensation_heads">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Compensation Heads</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Compensation Code:</b></td><td><input type="text" name="txt_comp_code" id="txt_comp_code"  size="20" /></td>
<td><b>Code Name:</b></td><td><input type="text" name="txt_code_name" id="txt_code_name" /></td></tr>
<tr><td><b>Code Description</b></td><td colspan="5"><textarea name="txt_code_desc" id="txt_code_desc" cols="50" rows="3" ></textarea></td></tr>	 
<tr><td><b>When to pay this code </b></td><td><b>P - Payroll</b><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="P" /></td><td><b>A - Once in year</b><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="A" /></td><td><b>X - as and when needed</b><input type="radio" name="rdb_when_to_pay" id="rdb_when_to_pay" value="X" /></td></tr>
	 
<tr><td><b>PF Computation</b></td><td><input type="radio" name="rdb_pf_Compute" id="rdb_pf_Compute" value="Y" /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_pf_Compute" id="rdb_pf_Compute" value="N" /><b>NO</b></td></tr>
<tr><td><b>Prof Tax Computation </b></td><td><input type="radio" name="rdb_pt_Compute" id="rdb_pt_Compute" value="Y" /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_pt_Compute" id="rdb_pt_Compute" value="N" /><b>NO</b></td></tr>
<td><b>ESI Tax Computation </b></td><td><input type="radio" name="rdb_esi_Compute" id="rdb_esi_Compute" value="Y" /><b>YES</b></td><td colspan="2"><input type="radio" name="rdb_esi_Compute" id="rdb_esi_Compute" value="N" /><b>NO</b></td></tr>	 
	
	 	 
	 
<tr><td colspan="5"><center><input type="button" name="btn_add_compensation_heads" id="btn_add_compensation_heads" value="Save" onclick="add_compensation_heads();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>


</form>
<div id="error1"></div>

<!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->

</div>

                              <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
							 <form action="#" method="post" name="frm_compensation_master">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Employee Compensation Master</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Employee Code:</b></td><td><input type="text" name="txt_emp_code" id="txt_emp_code" /></td><td><b>Compensation Code:</b></td><td><input type="text" name="txt_com_code" id="txt_com_code"  size="20" /></td>
</tr>
<tr><td><b>Comp. Change Effective Date</b></td><td colspan="3"><input type="text" name="txt_comp_change_eff_date" id="txt_comp_change_eff_date" /><button id="f_btn" >...</button></td></tr>

<tr><td><b>Amount</b></td><td colspan="3"><input type="text" name="txt_amount" id="txt_amount" /></td></tr>
	 
	
	 	 
	 
<tr><td colspan="5"><center><input type="button" name="btn_add_emp_compensation" id="btn_add_emp_compensation" value="Save" onclick="add_emp_compensation();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


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
										<div id="error2"></div>
<!--<script type="text/javascript" src="../js/ajax.js"></script>
 --><!--<script type="text/javascript" src="../js/jquery-1.4.js"></script> -->
	     </div>
	  
	  
	   <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
	  
	   <form action="#" method="post" name="frm_grade_wise_compensation">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Grade wise compensation</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Grade:</b></td><td><input type="text" name="txt_grade" id="txt_grade" /></td><td><b>Compensation Code:</b></td><td><input type="text" name="txt_compe_code" id="txt_compe_code"  size="20" /></td>
</tr>

<tr><td><b>Amount</b></td><td colspan="3"><input type="text" name="txt_amounts" id="txt_amounts" /></td></tr>
			 
<tr><td colspan="5"><center><input type="button" name="btn_add_grade_wise_compensation" id="btn_add_grade_wise_compensation" value="Save" onclick="add_grade_wise_compensation();"  /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>



</form>
<div id="error3"></div>
</div>
	  <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide"> 
	   <form action="#" method="post" name="frm_month_control">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Month Control</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Month No:</b></td><td colspan="4"><input type="text" name="txt_month_no" id="txt_month_no" /></td>
</tr>
<tr><td><b>Month Active:</b></td><td><b>Active</b><input type="radio" name="rdb_month_avtive" id="rdb_month_avtive" value="Y" /></td><td><b>Closed</b><input type="radio" name="rdb_month_avtive" id="rdb_month_avtive" value="N" /></td>
</tr>

<tr><td><b>No of Calendar Days in Month</b></td><td colspan="3"><input type="text" name="txt_no_days" id="txt_no_days" /></td></tr>
	 
<tr><td><b>Per Day Divisor</b></td><td colspan="3"><input type="text" name="txt_per_day_divisor" id="txt_per_day_divisor" /></td></tr>

<tr><td><b>Dearness Allowance Index</b></td><td colspan="3"><input type="text" name="txt_da_index" id="txt_da_index" /></td></tr>

	 	 
	 
<tr><td colspan="5"><center><input type="button" name="btn_add_month_control" id="btn_add_month_control" value="Save" onclick="add_month_control();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>
</form>
									 <div id="error4"></div>
									 
</div>


  <div id="fragment-5" class="ui-tabs-panel ui-tabs-hide"> 
  <form action="#" method="post" name="frm_attendance">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Attendance</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Employee No:</b></td><td colspan="4"><input type="text" name="txt_empl_no" id="txt_empl_no" /></td><td><b>Month No:</b></td><td><input type="text" name="txt_month_nob" id="txt_month_nob" /></td>
</tr>
<tr><td><b>Days Payable for the Month:</b></td><td colspan="6"><input type="text" name="txt_per_day_for_month" id="txt_per_day_for_month" /></td>
</tr>

<tr><td><b>No of adjustment days, from prev month</b></td><td colspan="6"><input type="text" name="txt_adj_days" id="txt_adj_days" /></td></tr>
	 
<tr><td><b>Overtime in Hrours for the month</b></td><td colspan="6"><input type="text" name="txt_other_Hrs" id="txt_other_Hrs" /></td></tr>

<tr><td><b>No of Days for leave Encashment</b></td><td colspan="6"><input type="text" name="txt_leave_encash_days" id="txt_leave_encash_days" /></td></tr>

	 	 
	 
<tr><td colspan="8"><center><input type="button" name="btn_add_attendance" id="btn_add_attendance" value="Save" onclick="add_attendance();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>



</form>
								    <div id="error5"></div>

</div>
<div id="fragment-6" class="ui-tabs-panel ui-tabs-hide">
							 <form action="#" method="post" name="frm_recovery">
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Recovery</center></font></td></tr></table>
<center><table class="listing" border="1" width="800" >
<tr><td><b>Employee No:</b></td><td colspan="4"><input type="text" name="txt_emple_no" id="txt_emple_no" /></td><td><b>Recovery Title:</b></td><td><input type="text" name="txt_recovery_title" id="txt_recovery_title" /></td>
</tr>
<tr><td><b>Total Amount:</b></td><td colspan="6"><input type="text" name="txt_total_amount" id="txt_total_amount" /></td>
</tr>

<tr><td><b>No of installments:</b></td><td colspan="6"><input type="text" name="txt_no_of_installments" id="txt_no_of_installments" /></td></tr>
	 
<tr><td><b>Installment Amount per salary:</b></td><td colspan="6"><input type="text" name="txt_installment_amount_per_salary" id="txt_installment_amount_per_salary" /></td></tr>

<tr><td><b>Amount Balance After Recovery:</b></td><td colspan="6"><input type="text" name="txt_amount_balance_after_recovery" id="txt_amount_balance_after_recovery" /></td></tr>

<tr><td><b>Compensation Code:</b></td><td colspan="6"><input type="text" name="txt_compen_code" id="txt_compen_code"  size="20" /></td></tr>	 
<tr><td><b>Recovery Status:</b></td><td ><b>Open</b><input type="radio" name="rdb_recovery_status" id="rdb_recovery_status" value="Open" /></td><td><b>Close</b><input type="radio" name="rdb_recovery_status" id="rdb_recovery_status" value="Close" /></td><td colspan="5"><b>ForeClosed</b><input type="radio" name="rdb_recovery_status" id="rdb_recovery_status" value="Foreclosed" /></td></tr>	 

<tr><td><b>Remark:</b></td><td colspan="6"><input type="text" name="txt_remark_any" id="txt_remark_any" size="30" /></td></tr>

<tr><td colspan="8"><center><input type="button" name="btn_add_recovery" id="btn_add_recovery" value="Save" onclick="add_recovery();" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table></center>



</form>
										<div id="error6"></div>
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
