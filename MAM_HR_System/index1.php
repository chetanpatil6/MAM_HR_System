 <?php
if(isset($_SESSION['txt_login_name']))
{
        session_destroy();
}
?>

<?php 
session_start();
if(isset($_POST['cmb_company_name']))
{
    $_POST['cmb_company_name'] = str_replace('12345', ' ', $_POST['cmb_company_name']);
    $_SESSION['company_name'] = $_POST['cmb_company_name'];
}

include('model/Model.php'); ?>

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

    <!--<script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="stmenu.js"></script> -->

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
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
                        <h1 id="name-text" class="art-Logo-name"><?php  $que1 = mysql_query("select * from company_info");
												 while($ro = mysql_fetch_assoc($que1))
												 {
												 $ro['name'] = str_replace('12345', ' ', $ro['name']);
												 $_SESSION['txt_name']= $ro['name'];
												     echo $_SESSION['txt_name'];
												 }
												  ?></h1>
                        <!--<div id="slogan-text" class="art-Logo-text">Slogan text</div> -->
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
				<!--	<script type="text/javascript" src="main_menu.js"></script> -->
                	<ul class="art-menu">
                		<!--<li>
                			<a href="#" class=" active"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
                		</li>
                		<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Menu Item</span></a>
                			<ul>
                				<li><a href="#">Menu Subitem 1</a>
                					<ul>
                						<li><a href="#">Menu Subitem 1.1</a></li>
                						<li><a href="#">Menu Subitem 1.2</a></li>
                						<li><a href="#">Menu Subitem 1.3</a></li>
                					</ul>
                				</li>
                				<li><a href="#">Menu Subitem 2</a></li>
                				<li><a href="#">Menu Subitem 3</a></li>
                			</ul>
                		</li>		
                		<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">About</span></a>
                		</li> -->
                	</ul>
                </div>
                <div class="art-contentLayout">
                    <div class="art-content">
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                                        <h2 class="art-PostHeader">
                                            Login
                                        </h2>
                                        <div class="art-PostContent">
                              
											<form action="view/personal_info.php" method="post" name="login" id="login">
											 
<center><table align="center" border="1" >


<tr><td width="100"><label><b>User Id</b></label></td><td><input type="text" name="txt_login_name" id="txt_login_name" size="30" /></td></tr>
<tr><td width="100"><label><b>Password</b></label></td><td ><input type="password" name="txt_password" id="txt_password" ></td></tr>

<tr><td colspan="2">
<center>
<input type="submit" name="btn_login" id="btn_login" value="Login" /><input type="reset" name="btn_reset" value="Cancel" /></center></td></tr>


</table>
</center>
</form>

<!-- -->

<div id="error"></div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/jquery-1.4.js"></script>                                             
                                            
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
