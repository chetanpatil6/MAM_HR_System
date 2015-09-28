<?php  include("../model/Model.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>Cancel Leaves</title>

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
function personal_information()
{
    var table = document.getElementById('tblDisplay');
	table.style.display = 'table';
	
	var project_id = document.getElementById("cmb_first_name").value;
	var last_name_id = document.getElementById("cmb_last_name").value;
	
	var myTable = document.getElementById("tblDisplay");
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML="";
	
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
	var myTable = document.getElementById('tblDisplay');
	var tBody = myTable.getElementsByTagName('tbody')[0];
	tBody.innerHTML = xmlhttp.responseText; //alert('hiiiii');
	}
	}  
	xmlhttp.open("GET","cancel_leave_management_form_filter.php?project_id="+project_id+"&last_name_id="+last_name_id,true);
	xmlhttp.send();
}
</script> 

</head>


<body>

<h1 style="background-color:#FFCC66" align="center"> <font color="#000000" style="font-size:22px"> Cancel Leaves </font></h1>

<table width="900" border="1" align="center">
 	<tr>
<td width="100"><label><font color="#FF6666"> First Name :</font></label></td>
<td><select name="cmb_first_name" id="cmb_first_name" style="height:27px; width:200px;" onchange="personal_information();">
<option selected="selected" value="select">--Select--</option>

<?php


$con = mysql_connect('localhost', 'root', '');
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("sane_guruji_arogya_kendra_hadapsar", $con);

	$first_name = mysql_query("select first_name from empl_master");
	while($row=mysql_fetch_assoc($first_name))
	{
	 echo"<option value='$row[first_name]'>$row[first_name]</option>";
	}
	?>



</select>
</td>
<td width="100"><label><font color="#FF6666"> Last Name :</font></label></td>
<td><select name="cmb_last_name" id="cmb_last_name" style="height:27px; width:200px;" onchange="personal_information();">
<option selected="selected" value="select">--Select--</option>

<?php
	$last_name = mysql_query("select last_name from empl_master");
	while($row=mysql_fetch_assoc($last_name))
	{
	 echo"<option value='$row[last_name]'>$row[last_name]</option>";
	}
	?>


</select>
</td> 

</tr>
</table>
<br />
<br />
<table id="tblDisplay" width="900" align="center" class="table-bordered table-hover table_border table-striped" border="2" style="display:none">
<tbody>
</tbody>
</table>

</body>
</html>
