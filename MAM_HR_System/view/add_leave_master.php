﻿<?php include('../model/Model.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<script src="../calendar/src/js/jscal2.js"></script>
    <script src="../calendar/src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../calendar/src/css/steel/steel.css" />
<script type="text/javascript">
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




function ShowCal_from(id)
{
	var table = document.getElementById('tableDisplay');
	var rowCount = table.rows.length;
	   
		Calendar.setup({
					inputField : "txt_leave_from_date"+id,
					trigger    : "btn_leave_from_date"+id,
					onSelect   : function() { this.hide() },
					showTime   : 12,
					dateFormat : "%Y-%d-%m"
			});
}
		
		
function ShowCal_to(id)
{
	var table = document.getElementById('tableDisplay');
	var rowCount = table.rows.length;
	   
		Calendar.setup({
					inputField : "txt_leave_to_date"+id,
					trigger    : "btn_leave_to_date"+id,
					onSelect   : function() { this.hide() },
					showTime   : 12,
					dateFormat : "%Y-%d-%m"
			});
}


function month_leave_attendance()
{

var emp_name = document.getElementById('cmb_to_employee_name').value;
var month = document.getElementById('txt_month').value;

var date=document.getElementById('txt_month').value;
 var mon = date.split("-");
 var fr=mon[1]-1;
 if(mon[1]=='01')
 {
  var year=mon[0]-1;
  var from=year+"-"+12+"-26";
 }
 else
 {
  var from=mon[0]+"-"+fr+"-26";
 } 
 var to=mon[0]+"-"+mon[1]+"-27"; 
 document.getElementById('txt_from').value=from;
 document.getElementById('txt_to').value=to;


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
	
xmlhttp.open("GET","month_leave_attendance.php?id1="+emp_name+"&id2="+month+"&id3="+from+"&id4="+to,true);
xmlhttp.send();
}


function numberOfDays() 
{

	var month_no = document.getElementById("txt_month").value;

	var year = month_no.substr(0, 4);
	var month = month_no.substr(5, 2);
	
    var d = new Date(year, month, 0);
	//alert(d.getDate());
	
	   var table = document.getElementById('tableDisplay');
       var rowCount = table.rows.length;		  
	   var count=1;
	  
       for(var i=1; i<rowCount; i++) 
	   {        
	   //alert(d.getDate());
			var row = table.rows[i];						
		    document.getElementById('txt_day_in_month'+count).value = d.getDate();		
			count++;	
	   }
	    //alert("test");
	  // alert("test"+d.getDate());
	document.getElementById("txt_no_days").value = d.getDate();
	//alert("test");
    return d.getDate();


}

function calculate_days() 
{
	//alert("tet");
	   var table = document.getElementById('tableDisplay');
       var rowCount = table.rows.length;		  
	   var count=1;	   
	 // alert("tet");
      for(var i=1; i<rowCount; i++) 
	   {        	   
			var row = table.rows[i];						
		    var month_day = document.getElementById('txt_day_in_month'+count).value;		
			var weekly_off = document.getElementById('txt_weekly_off'+count).value;	
			//alert("tet");
			if(isNaN(weekly_off))
			{
				alert("Please enter number");
				document.getElementById('txt_weekly_off'+count).value = ''
				return false;
			}
			
			
			if(month_day!='' && weekly_off!='')
			{
				var working_day = parseFloat(month_day) - parseFloat(weekly_off);				
				document.getElementById('txt_working_days'+count).value = parseFloat(working_day);		
			}
			
			count++;
	   }
	   
}

function calculate_present_days() 
{
	//alert("tet");
	   var table = document.getElementById('tableDisplay');
       var rowCount = table.rows.length;		  
	   var count=1;	   
	  //alert(rowCount);
      for(var i=1; i<rowCount; i++) 
	   {        	   
			var row = table.rows[i];		
			var suspension_days = document.getElementById('txt_suspension_days'+count).value;					
		    var month_day = document.getElementById('txt_day_in_month'+count).value;		
			var weekly_off = document.getElementById('txt_weekly_off'+count).value;	
			
			var working_days = document.getElementById('txt_working_days'+count).value;		
			//var present_days = document.getElementById('txt_present_days'+count).value;	
			
			var paid_leaves = document.getElementById('txt_paid_leaves'+count).value;		
			var unpaid_leaves = document.getElementById('txt_unpaid_leaves'+count).value;				
			var absent_days = document.getElementById('txt_absent_days'+count).value;		
			
			//alert("tet");
			if(isNaN(suspension_days))
			{
				alert("Please enter number");
				document.getElementById('txt_suspension_days'+count).value = ''
				return false;
			}
			
			
			else if(isNaN(unpaid_leaves))
			{
				alert("Please enter number");
				document.getElementById('txt_unpaid_leaves'+count).value = ''
				return false;
			}
			
			
			else if(isNaN(absent_days))
			{
				alert("Please enter number");
				document.getElementById('txt_absent_days'+count).value = ''
				return false;
			}
			
			
			if(month_day!='' && weekly_off!='' && suspension_days!='' && unpaid_leaves!='' && absent_days!='')
			{
				//var working_day = parseFloat(month_day) - parseFloat(weekly_off);				
				var present_days = parseFloat(working_days) - (parseFloat(paid_leaves) + parseFloat(unpaid_leaves) + parseFloat(absent_days) +  parseFloat(suspension_days)) ;
				document.getElementById('txt_present_days'+count).value = parseFloat(present_days);		
			}
			
			count++;
	   }
	   
}


function interger_validation()
{
	   var table = document.getElementById('tableDisplay');
       var rowCount = table.rows.length;		  
	   var count=1;	   
	 
      for(var i=1; i<rowCount; i++) 
	  {        	   
			var row = table.rows[i];						
		    var unpaid_leaves = document.getElementById('txt_unpaid_leaves'+count).value;		
			var absent_days = document.getElementById('txt_absent_days'+count).value;	
			//alert("tet");
			if(isNaN(unpaid_leaves))
			{
				alert("Please enter number");
				document.getElementById('txt_unpaid_leaves'+count).value = ''
				return false;
			}
			
			if(isNaN(absent_days))
			{
				alert("Please enter number");
				document.getElementById('txt_absent_days'+count).value = ''
				return false;
			}
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
<center><table width="912" border="1" >
<tr><td colspan="15"><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Attendance</center></font></td></tr>

<tr><td><label><b>Select Employee </b></label></td><td><select name="cmb_to_employee_name" id="cmb_to_employee_name" style="width:200px" onchange="month_leave_attendance();">
<option value="select">Select</option>
<?php
$sq_emp = mysql_query("select * from empl_master,comp_details where comp_details.type_of_sep='' and comp_details.grant_type!='Grantable' and empl_master.employee_no=comp_details.employee_no order by empl_master.employee_no");
while($r_emp = mysql_fetch_assoc($sq_emp))
{

   $trimmed_first_name = explode(" ", $r_emp['first_name']);
 echo "<option value='$r_emp[employee_no]'>$r_emp[last_name] $trimmed_first_name[1] $r_emp[middle_name]</option>";
 //  echo "<option value='$r_emp[employee_no]'>".$r_emp['first_name'].' '.$r_emp['middle_name'].' '.$r_emp['last_name']."</option>";
}
$current_month = date('Y-m');
?>
</select>
</td>

<?php

	 $sq = mysql_query("select month_no from month_control where month_active='Y'");
     while($r = mysql_fetch_assoc($sq))
     {
     	$month_active_no = $r['month_no'];
	// echo '<input type="text" name="txt_no_days" id="txt_no_days" value="'.$r['no_days'].'" style="display:none;" />';
     }
?>
<td><label><b>Select Month</b></label></td><td><input type="text" name="txt_month" id="txt_month" disabled="disabled" value="<?php echo $month_active_no; ?>" size="15" onchange="month_leave_attendance();"/><button id="f_btn_month">...</button></td>
<script type="text/javascript">//<![avi[
      Calendar.setup({
        inputField : "txt_month",
        trigger    : "f_btn_month",
        onSelect   : function() { this.hide(); month_leave_attendance(); },
        showTime   : 12,
        dateFormat : "%Y-%m"
      });
	  </script>
<?php

	list($year,$month) = preg_split('[-]', $month_active_no);//split('[-]', $regis_date);$day,
	//$regis_date = "$year/$month/$day";
//	$pre_month = $month - 1;
			if ($month > 1)
			{
				 $pre_month = $month - 1;
				 $prev_year = $year;
			}
			else
			{
				$pre_month = 12;
				$prev_year = $year-1;
			}
			
	//$prev_date = "$year-0$pre_month-26";
		if ($pre_month <10)
		{
			$prev_date = "$prev_year-0$pre_month-26";
		}
		else
		{
			$prev_date = "$prev_year-$pre_month-26";
		 }
	 
	$curr_date = "$year-$month-25";

?>
<td><label><b>From Date:<input type="text" name="txt_from" id="txt_from" value="<?php echo $prev_date?>" size="8" disabled="disabled" /> To : <input name="txt_to" id="txt_to" type="text" value="<?php echo $curr_date ; ?>" size="10" disabled="disabled" /></b></label></td></tr>

<TR><td><label><b>Created Date:<?php echo date('Y-m-d') ?></b></label></td><td colspan="5"><label><b>Created By: <?php echo $_SESSION['txt_login_name']; ?></b></label></td></TR>
</table></center>
<div style="overflow:auto; height:350px; padding-left:19px; position:relative;">
<center><table width="912" border="1" id="tableDisplay" align="left" >
<thead>

<tr><td width="180"  title="Employee Name"><b><center>Employee Name:<font color="#FF0000">*</font></center></b></td><td width="70"  title="Month"><b><center>Month<font color="#FF0000">*</font></center></b></td><td width="42"  title="Days In Month"><b><center>Days in Month<font color="#FF0000">*</font></center></b></td><td width="92"  title="Weekly off"><center><b>Weekly Off<font color="#FF0000">*</font></b></center></td><td width="42"  title="Working Days"><b><center>Working Days</center></b></td><td width="42"  title="Present Days"><b><center>Present Days</center></b></td><td width="42"  title="Paid Leaves"><b><center>Paid Leaves</center></b></td><td width="42"  title="Unpaid Leaves"><b><center>Unpaid Leaves</center></b></td><td width="42"  title="Absent Days"><b><center>Absent Days</center></b></td><td width="42"  title="Suspention Days"><b><center>Susp. Days</center></b></td><td width="42"  title="Encashment Days"><b><center>Encash. Days</center></b></td><td width="42"  title="Remark"><b><center>Remark</center></b></td></tr></thead>
<tbody>
<?php 
//$sq_employee_no = mysql_query("select * from empl_master,leave_management where empl_master.employee_no = leave_management.employee_no");

	
$sq_employee_no = mysql_query("select * from empl_master,comp_details where comp_details.type_of_sep='' and comp_details.grant_type!='Grantable' and empl_master.employee_no=comp_details.employee_no order by empl_master.emp_code");
$i = 1;
while($res_employee_no = mysql_fetch_assoc($sq_employee_no))
{
	$total_unpaid_leaves = 0;
	$absent_day = 0;
	$sq_emp_leave_mngt = mysql_query("select * from month_attendance where employee_no='$res_employee_no[employee_no]' and month='$month_active_no'");
	if(mysql_num_rows($sq_emp_leave_mngt)==0)
	{		
		$date = date('Y-m-d');
		list($year,$month) = preg_split('[-]', $month_active_no);		
		//echo " month ". $month;
		
		//$pre_month = $month - 1;
			if ($month > 1)
			{
				 $pre_month = $month - 1;
			}
			else
			{
				$pre_month = 12;
				$year = $year-1;
			}
		
		//$prev_date = "$year-$pre_month-26";
			if ($pre_month <10)
			{
				$prev_date = "$year-0$pre_month-26";
			}
			else
			{
				$prev_date = "$year-$pre_month-26";
			 }
		$curr_date = "$year-$month-25";
		$total_paid_leaves = 0;
		
		//echo " prev_date ". $prev_date;
		//echo " pre_month ". $pre_month;
		//echo " curr_date ". $curr_date;
		
		$encashment_days=0;
		
		if($month == '03')
		{
			$prev_ench_date = "$year-03-01";
			$curr_ench_date = "$year-03-31";
			$sq_encashment=mysql_query("select * from leave_encashment where employee_no='$res_employee_no[employee_no]' and (created_date>='$prev_ench_date' and created_date<='$curr_ench_date')");
			if($row_encashment=mysql_fetch_array($sq_encashment))
			{
			 $encashment_days=$row_encashment['total_el'];
			}		
		}
	
		$sq_total_leaves = mysql_query("select leave_days from leaves_transaction where employee_no='$res_employee_no[employee_no]' and (for_date>='$prev_date' and for_date<='$curr_date') and trans_type='LA'");
		while($res_total_leaves = mysql_fetch_assoc($sq_total_leaves))
		{		
			$total_paid_leaves = $total_paid_leaves + $res_total_leaves['leave_days'];
				

		
		}
		//echo "Total paid Leaves".$total_paid_leaves;
		$total_paid_leaves_cancelled = 0;
		
		$sq_total_leaves = mysql_query("select leave_days from leaves_transaction where employee_no='$res_employee_no[employee_no]' and (for_date>='$prev_date' and for_date<='$curr_date') and trans_type='LC'");
		while($res_total_leaves = mysql_fetch_assoc($sq_total_leaves))
		{		
			$total_paid_leaves_cancelled = $total_paid_leaves_cancelled + $res_total_leaves['leave_days'];
			
			
		}
		//echo ("Total cancelled Leaves"+$total_paid_leaves_cancelled);
		$total_paid_leaves = $total_paid_leaves - $total_paid_leaves_cancelled;
		
		//echo $total_paid_leaves;
		
		
		$res_no_days = mysql_fetch_assoc(mysql_query("select no_days from month_control where month_active='Y'"));
		
		echo '<tr><td style="display:none">'.'<input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['employee_no'].'" size="8"  /></td>
		<td><input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" size="25" title="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" disabled="disabled" /></td>
		<td><input type="text" name="txt_leave_month'.$i.'" id="txt_leave_month'.$i.'" value="'.$month_active_no.'" size="4" title="'.$month_active_no.'" disabled="disabled"  /></td><td><input type="text" name="txt_day_in_month'.$i.'" id="txt_day_in_month'.$i.'" size="2"   title="Days In Month" disabled="disabled"  value="'.$res_no_days['no_days'].'"/></td>
		<td   title="Weekly Off"><input type="text" name="txt_weekly_off'.$i.'" id="txt_weekly_off'.$i.'" size="8" onkeyup="calculate_days();calculate_present_days();" /></td>
		<td   title="Working Days"><input type="text" name="txt_working_days'.$i.'" id="txt_working_days'.$i.'" size="2" disabled="disabled" /></td>
		<td   title="Present Days"><input type="text" name="txt_present_days'.$i.'" id="txt_present_days'.$i.'" size="2" disabled="disabled"/></td>
		<td   title="Paid Leaves"><input type="text" name="txt_paid_leaves'.$i.'" id="txt_paid_leaves'.$i.'" size="2" disabled="disabled" value="'.$total_paid_leaves.'" /></td>
		<td   title="Unpaid Leaves"><input type="text" name="txt_unpaid_leaves'.$i.'" id="txt_unpaid_leaves'.$i.'" size="2" onkeyup="calculate_present_days();" /></td>
		<td   title="Absent Days"><input type="text" name="txt_absent_days'.$i.'" id="txt_absent_days'.$i.'" size="2" onkeyup="calculate_present_days();"/></td>
		<td   title="Suspension Days"><input type="text" name="txt_suspension_days'.$i.'" id="txt_suspension_days'.$i.'" size="2"  onkeyup="calculate_present_days();" /></td>
		<td   title="Encashment Days"><input type="text" name="txt_encashment_days'.$i.'" id="txt_encashment_days'.$i.'" size="2"  onkeyup="calculate_present_days();" disabled="disabled" value="'.$encashment_days.'" /></td>
		<td   title="Remark"><input type="text" name="txt_remark'.$i.'" id="txt_remark'.$i.'" size="15" /></td></tr>';		
		
	}
	else
	{
		$res_no_days = mysql_fetch_assoc(mysql_query("select no_days from month_control where month_active='Y'"));
		list($year,$month) = preg_split('[-]', $month_active_no);		
		
		$encashment_days=0;
		$prev_ench_date = "$year-03-01";
		$curr_ench_date = "$year-03-31";
		$sq_encashment=mysql_query("select * from leave_encashment where employee_no='$res_employee_no[employee_no]' and (from_date>='$prev_ench_date' and to_date<='$curr_ench_date')");
		if($row_encashment=mysql_fetch_array($sq_encashment))
		{
		 $encashment_days=$row_encashment['total_el'];
		}
		
		while($res_emp_leave_mngt = mysql_fetch_assoc($sq_emp_leave_mngt))
		{
		echo '<tr><td style="display:none">'.'<input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['employee_no'].'" size="8"  /></td>
		<td><input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" size="25" title="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" disabled="disabled" /></td>
		<td><input type="text" name="txt_leave_month'.$i.'" id="txt_leave_month'.$i.'" value="'.$month_active_no.'" size="4" title="'.$month_active_no.'" disabled="disabled"  /></td><td><input type="text" name="txt_day_in_month'.$i.'" id="txt_day_in_month'.$i.'" size="2"   title="Days In Month" disabled="disabled"  value="'.$res_no_days['no_days'].'"/></td>
		<td   title="Weekly Off"><input type="text" name="txt_weekly_off'.$i.'" id="txt_weekly_off'.$i.'" size="8" onkeyup="calculate_days();calculate_present_days();" value="'.$res_emp_leave_mngt['weekly_off'].'"/></td>
		<td   title="Working Days"><input type="text" name="txt_working_days'.$i.'" id="txt_working_days'.$i.'" size="2" disabled="disabled" value="'.$res_emp_leave_mngt['working_days'].'"/></td>
		<td   title="Present Days"><input type="text" name="txt_present_days'.$i.'" id="txt_present_days'.$i.'" size="2" disabled="disabled" value="'.$res_emp_leave_mngt['emp_present_day'].'"/></td>
		<td   title="Paid Leaves"><input type="text" name="txt_paid_leaves'.$i.'" id="txt_paid_leaves'.$i.'" size="2" disabled="disabled" value="'.$res_emp_leave_mngt['paid_leaves'].'"/></td>
		<td   title="Unpaid Leaves"><input type="text" name="txt_unpaid_leaves'.$i.'" id="txt_unpaid_leaves'.$i.'" size="2" value="'.$res_emp_leave_mngt['unpaid_leaves'].'" onkeyup="calculate_present_days();" /></td>
		<td   title="Absent Days"><input type="text" name="txt_absent_days'.$i.'" id="txt_absent_days'.$i.'" size="2" value="'.$res_emp_leave_mngt['absent_days'].'" onkeyup="calculate_present_days();"/></td>
		<td   title="Suspension Days"><input type="text" name="txt_suspension_days'.$i.'" id="txt_suspension_days'.$i.'" size="2"  onkeyup="calculate_present_days();" value="'.$res_emp_leave_mngt['suspension_days'].'"/></td>
		<td   title="Encashment Days"><input type="text" name="txt_encashment_days'.$i.'" id="txt_encashment_days'.$i.'" size="2"  onkeyup="calculate_present_days();" disabled="disabled" value="'.$res_emp_leave_mngt['leave_encashment_days'].'" /></td>
		<td   title="Remark"><input type="text" name="txt_remark'.$i.'" id="txt_remark'.$i.'" size="15" /></td></tr>';		
		}
	}
	$i++;
}
?>
</tbody>
</table>
</div>
<div style="padding-top:inherit; top:auto">
<table width="912" border="1" align="center">
<tr>
<td align="right" width="50%"><input type="button" name="btn_save" id="btn_save" value=" Save " onclick="add_leave_attendance();"  />&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;<a href="add_leave_master.php"><font color="#FF0033">Next Employee</font></a></td>
<!--td>&nbsp;&nbsp;<a href="update_leave_master.php"><font color="#FF0033">Update Employee attendance</font></a>
</td--> 
</tr>
</table>
</div>

</center>

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
