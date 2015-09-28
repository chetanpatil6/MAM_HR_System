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
                		 <li><a href="personal_info.php"><span class="l"></span><span class="r"></span><span class="t">Personal Info</span></a>
</li>
                			
<li><a href="search_for_update.php"><span class="l"></span><span class="r"></span><span class="t">Search For Update</span></a>
</li> 
<li><a href="report.php" class=" active"><span class="l"></span><span class="r"></span><span class="t">Report</span></a>
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

       <?php } ?>    
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
										
										
										

                                 																 <form action="../excel/basic_info.php" name="reprt" method="post" onsubmit="return validate()">
																								 <table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Report</center></font></td></tr></table>
<table width="900" border="1">
<tr><td colspan="5"><b><center>Excel Report</center></b></td></tr>
<tr><td rowspan="5"><b>Employee Information</b></td><td colspan="2"><input type="radio" name="employee_info" id="employee_info" value="personal_info" checked="checked" />&nbsp;&nbsp;&nbsp;<b>Basic Info</b></td></tr>
<tr><td><input type="radio" name="employee_info" id="employee_info" value="company_info" />&nbsp;&nbsp;&nbsp;<b>Company Info</b></td></tr>
<tr><td><input type="radio" name="employee_info" id="employee_info" value="experience_info" />&nbsp;&nbsp;&nbsp;<b>Experience Info</b></td></tr>
<tr><td><input type="radio" name="employee_info" id="employee_info" value="qualification_info" />&nbsp;&nbsp;&nbsp;<b>Qualification Info</b></td></tr>

<tr><td><input type="radio" name="employee_info" id="employee_info" value="family_info" />&nbsp;&nbsp;&nbsp;<b>Family Info</b></td></tr>
<tr><td colspan="4">&nbsp;</td></tr>
<tr><td rowspan="4">&nbsp;</td><td><input type="radio" name="emp_info" id="emp_info" value="all" checked="checked" />&nbsp;&nbsp;&nbsp;<b>All Info</b></td></tr>
<tr><td ><input type="radio" name="emp_info" id="emp_info" value="empno" />&nbsp;&nbsp;&nbsp;<b>From Emp No.</b>&nbsp;&nbsp;&nbsp;&nbsp;
<select name="frm_emp_no" id="frm_emp_no" style="width:100px"><option>Select</option>
<?php

$sq= "select * from empl_master";
$result = mysql_query($sq);
while($r = mysql_fetch_array($result)) 
{
echo "<option value='$r[employee_no]'>$r[employee_no]</option>";
}

?>

</select>
&nbsp;<b>To</b>&nbsp;



<select name="to_emp_no" id="to_emp_no" style="width:100px"><option>Select
</option>
<?php

$sq= "select * from empl_master";
$result = mysql_query($sq);
while($r = mysql_fetch_array($result)) 
{
echo "<option value='$r[employee_no]'>$r[employee_no]</option>";
}

?>

</select>

</td></tr>
<tr><td><input type="radio" name="emp_info" id="emp_info" value="grade" />&nbsp;&nbsp;&nbsp;<b>From Grade.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select style="width:100px"  name="frm_grade" id="frm_grade"><?php

$sq= "select distinct grade from comp_details order by grade";
$result = mysql_query($sq);
while($r = mysql_fetch_array($result)) 
{
echo "<option value='$r[grade]'>$r[grade]</option>";
}

?></select>&nbsp;<b>To</b>&nbsp;

<select  style="width:100px" name="to_grade" id="to_grade"><?php

$sq= "select distinct grade from comp_details order by grade";
$result = mysql_query($sq);
while($r = mysql_fetch_array($result)) 
{
echo "<option value='$r[grade]'>$r[grade]</option>";
}

?>
</select>



</td></tr>

<tr style="display:none">
<td><input type="text" name="txt_db" id="txt_db" value="<?php echo $_SESSION['dbname']; ?>" /></td>
<td><input type="text" name="txt_p" id="txt_p" value="<?php echo $_SESSION['password']; ?>" /></td>
<td><input type="text" name="txt_u" id="txt_u" value="<?php echo $_SESSION['uname']; ?>" /></td>
<td><input type="text" name="txt_s" id="txt_s" value="<?php echo $_SESSION['server']; ?>" /></td>
</tr>

<tr><td><input type="radio" name="emp_info" id="emp_info" value="date" />&nbsp;&nbsp;&nbsp;<b>From join Date</b>&nbsp;&nbsp;&nbsp;<input type="text"  name="frm_join_date" id="frm_join_date" size="10" /><button id="f_btn_frm">...</button>&nbsp;<b>To</b>&nbsp;<input type="text" name="to_join_date" id="to_join_date" size="10" /><button id="f_btn_to">...</button></td></tr>
<tr><td colspan="4"><center><input type="submit" name="btn_print" id="btn_print" value="Create Report"  /><input type="button" name="veiw_reprt" value="View Report" style="display:none" /><input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></center></td></tr>
</table> </form>
<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "frm_join_date",
        trigger    : "f_btn_frm",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script> 
	  
	  <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "to_join_date",
        trigger    : "f_btn_to",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
	  </script>
       
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
