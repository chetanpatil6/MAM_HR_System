<?php include('../model/Model.php');?>
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

    <script type="text/javascript" src="../script.js"></script>
    <script type="text/javascript" src="stmenu.js"></script>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
	<script type="text/javascript">
	
	function btnenable()
			{
			var c= document.getElementById("btn_next");
            
		    var a= document.getElementById("txt_emp_id").value;
            
			
			if(a=='select')
			{
		alert("Select Employee Id");
			return false
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
<li><a href="report.php"><span class="l"></span><span class="r"></span><span class="t">Report</span></a>
</li>

<?php if($_SESSION['role']=='Admin')
 {
 ?>


<li><a href="add_user.php" ><span class="l"></span><span class="r"></span><span class="t">User</span></a>
</li>
<li><a href="change_role_select.php"><span class="l"></span><span class="r"></span><span class="t">Change Role</span></a>
</li>
<li><a href="add_company_info.php" class=" active"><span class="l"></span><span class="r"></span><span class="t">Add Company Info</span></a>
<ul>
<li><a href="update_company_info.php"><span class="l"></span><span class="r"></span><span class="t">Update Company Info</span></a></li>
</ul>
</li> 

       <?php } ?>  
	   <li><a href="change_password.php"><span class="l"></span><span class="r"></span><span class="t">Change Password</span></a>
</li>        	</ul>
                </div>
                <div class="art-contentLayout">
                    <div class="art-content">
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                                        <h2 class="art-PostHeader">
                                            
                                        </h2>
                                        <div class="art-PostContent">
										
											<form action="#" name="company_info"  method="post">
											
<table width="900"><tr><td><font face="Courier New, Courier, monospace" size="+1" color="#FF6600"><center>Company Information</center></font></td></tr></table>

<table width="900" align="center" border="1">

<tr><td><label><b>Company Name</b></label></td><td colspan="3"><input type="text" name="txt_comp_name" id="txt_comp_name" size="50" /></td></tr>
<tr><td rowspan="4"><label><b>Address</b></label></td><td colspan="3"><input type="text" name="txt_comp_address1" id="txt_comp_address1" size="50" /></td></tr>
<tr><td colspan="3"><input type="text" name="txt_comp_address2" id="txt_comp_address2" size="50"  /></td></tr>
<tr><td colspan="3"><input type="text" name="txt_comp_address3" id="txt_comp_address3" size="50"  /></td></tr>
<tr><td colspan="3"><input type="text" name="txt_comp_address4" id="txt_comp_address4" size="50"  /></td></tr>

<tr><td><label><b>City</b></label></td><td><input type="text" name="txt_city" id="txt_city" /></td>
<td><label><b>Pin Code</b></label></td><td><input type="text" name="txt_pin_code" id="txt_pin_code" onkeyup="check_field('txt_pin_code');" /></td>

<tr><td><label><b>State</b></label></td><td><input type="text" name="txt_state" id="txt_state" /></td>
<td><label><b>Country</b></label></td><td colspan="3"><input type="text" name="txt_country" id="txt_country" /></td></tr>

<tr><td><label><b>Phone</b></label></td><td><input type="text"  name="txt_phone_number" id="txt_phone_number" onkeyup="check_field('txt_landline1');" /></td>
<td><label><b>Landline</b></label></td><td  colspan="3"><input type="text"  name="txt_landline" id="txt_landline" onkeyup="check_field('txt_landline1');" /></td>
</tr>


<tr><td><label><b>Email</b></label></td><td><input type="text" name="txt_email" id="txt_email" /></td>
<td><label><b>Alternate Email</b></label></td><td><input type="text" name="txt_email1" id="txt_email1" /></td>
</tr>

<tr><td><label><b>VAT Number</b></label></td><td><input type="text" name="txt_vat_no" id="txt_vat_no" /></td>


<td><label><b>CST Number</b></label></td><td><input type="text" name="txt_cst_no" id="txt_cst_no" onkeyup="check_field('txt_contact_number');"  /></td></tr>
<tr><td><label><b>Service Tax No</b></label></td><td><input type="text"  name="txt_service_tax_no" id="txt_service_tax_no" onkeyup="check_field('txt_landline2');" /></td>
<td><label><b>Income Tax No</b></label></td><td><input type="text" name="txt_inco_tax_no" id="txt_inco_tax_no" /></td>

</tr>
<tr><td><label><b>PAN</b></label></td><td><input type="text" name="txt_pan_no" id="txt_pan_no" /></td>
<td><label><b>ACC No</b></label></td><td><input type="text" name="txt_acc_no" id="txt_acc_no"  /></td>
</tr>

<tr><td><label><b>Certificate No</b></label></td><td><input type="text" name="txt_cert_no" id="txt_cert_no" maxlength="12" /></td>
<td><label><b>Rate Of Duty</b></label></td><td><input type="text" name="txt_rate_of_duty" id="txt_rate_of_duty" /></td></tr>
<tr><td><label><b>Exicise Reg No</b></label></td><td><input type="text"  name="txt_exicise_regn_no" id="txt_exicise_regn_no" onkeyup="check_field('txt_landline2');" /></td><td><label><b>Commissionorate</b></label></td><td><input type="text"  name="txt_commissionorate" id="txt_commissionorate" /></td></tr>
<tr><td><label><b>Exicise Range</b></label></td>
<td><input type="text"  name="txt_exicise_range" id="txt_exicise_range" onkeyup="check_field('txt_landline2');" /></td>
<td><label><b>P.L.A.A/c No.:</b></label></td>
<td><input type="text"  name="txt_pla_ac_no" id="txt_pla_ac_no" /></td></tr>
<tr><td><label><b>Exicise Division</b></label></td>
<td colspan="3"><input type="text"  name="txt_exicise_div" id="txt_exicise_div" onkeyup="check_field('txt_landline2');" /></td></tr>


<tr><td><label><b>Signatures: </b></label></td>
<td><input type="text" name="txt_signature_1" id="txt_signature_1" size="25" /></td>
<td><input type="text" name="txt_signature_2" id="txt_signature_2" size="25" /></td>
<td><input type="text" name="txt_signature_3" id="txt_signature_3" size="25" /></td>
</tr>

<tr><td colspan="4"><center><input type="button" name="btn_addinfo1" id="btn_addinfo1" value="Save" onclick="addinfo();" /></center></td></tr>

</table>

<center><div id="error"></div></center>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/jquery-1.4.js"></script>
 </form>      
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
