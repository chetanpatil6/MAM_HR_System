<html>
<body>
<tr><td colspan="4"><h5>Companywise Search Results </h5></td></tr>
<?php 
require_once '../Classes/PHPExcel.php';

include('../model/Model.php');


$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

// Add some data



$arr_dbname = array();
if (file_exists("connection.xml")) 
{
$xml = simplexml_load_file("connection.xml");
}
else if(file_exists("model/connection.xml")) 
{
$xml = simplexml_load_file("model/connection.xml");
}
else if(file_exists("../model/connection.xml")) 
{
$xml = simplexml_load_file("../model/connection.xml");
}
else
{
  echo "Failed to open XML";
  exit(0);
}


$arr_company = array();
$arr_company_name = array();
$act =0;
foreach($xml->children() as $child1)
{   
  foreach($child1->children() as $child)
  {  
   $name = $child->getName();
   if($name == 'dbname')
   {    $act=$act+1;
   		array_push($arr_dbname, $child);
		//echo "Db name ".$child."   ".$act;
   }
  }
}
$len_arr = sizeof($arr_dbname);
	  
	  
	  $id = $_GET['id'];
	  $id1 = $_GET['id1'];
	  
	 // if(preg_match("/[A-Z  | a-z]+/", $id)){ 
	 if(isset($id)){ 
	  $name = $id; 
	  //connect  to the database 
	  ///
	for($arr=0;$arr<$len_arr;$arr++)
	{
		$db1 = $arr_dbname[$arr];

        $servername = "localhost";
		$usernm = "root";
		$pas= "";

		mysql_connect("$servername", "$usernm", "$pas") or die("unable to connect server");
		if(mysql_select_db("$db1"))
		{
		//$i++;
        //echo "Databsse name "+"$db1";
		$sq_name = mysql_query("select * from company_info");
		while($row_info = mysql_fetch_assoc($sq_name))
		{
		$row_info['name'] = str_replace('12345', ' ', $row_info['name']);
		$str_address = $row_info['name']." \n".$row_info['address1']." ".$row_info['address2']." ".$row_info['address3']." ".$row_info['address4'].", ".$row_info['city']." ".$row_info['pin_code'];

		array_push($arr_company_name, $row_info['name']);
		}
      

///
      if($id1 == 'emp_name')
	  {
	  $sql=mysql_query("SELECT employee_no, first_name, last_name, emp_code  FROM empl_master WHERE  first_name LIKE '%" .$name ."%' OR last_name LIKE '%".$name ."%'");
	  }
	  else if($id1 == 'emp_code')
	  {
	   $sql=mysql_query("SELECT employee_no, first_name, last_name, emp_code  FROM empl_master WHERE  emp_code LIKE '%".$name ."%'");
	  } 
	  else
	  {
	    echo "Not a Proper Value";
	  }
	  
	  $num_rows = mysql_num_rows($sql)
	  ?>
	  
	  <table width="950" border="1" style="background-color:#C5AB1D" >
	  <?php
	  echo '<tr><th  style="background-color:#FFFFFF;" colspan="4"><center>'.$arr_company_name[$arr]."- Records Found ".$num_rows.'</center></th></tr>';
	  if($num_rows!=0)
	  {
	  ?>
	  <!--tr><th></th><th  style="background-color:#FFC993;"><center>Employee Code</center></th><th style="background-color:#FFC993;"><center>First Name</center></th><th  style="background-color:#FFC993;"><center>Last Name</center></th></tr-->
	  <tr><th  style="background-color:#FFC993;"><center>Employee Code</center></th><th style="background-color:#FFC993;"><center>First Name</center></th><th  style="background-color:#FFC993;"><center>Last Name</center></th><th  style="background-color:#FFC993;"><center>PF Number</center></th></tr>
	  <?php
	  }
	  //echo '<tr><td colspan="4">'.$arr_company_name[$arr].'</td></tr>';
	   while($row = mysql_fetch_assoc($sql))
	   {
	   $pf_sql=mysql_fetch_assoc(mysql_query("SELECT pf_number from  comp_details where employee_no = ".$row['employee_no'] ));
	   
	   $num_rows = mysql_num_rows($sql);
 //echo '<tr onclick="toggle(this)">'.'<td width="100">'.'<a value='.$row['employee_no'].' onclick="showUser(this)">'.'Details'.'</a>'.'</td>'.'<td width="100">'.$row['employee_no'].'</td>'.'<td width="100">'.$row['first_name'].'</td>'.'<td width="220">'.$row['last_name'].'</td>'.'</tr>';
 
  //echo '<tr onclick="toggle(this)">'.'<td width="20" border="1" >'.'<input type="radio" value='.$row['employee_no'].' name="rdb_emp_no" id="rdb_emp_no" />'.'</td>'.'<td width="100" style="background-color:#FADED1">'.$row['emp_code'].'</td>'.'<td width="100" style="background-color:#FADED1">'.$row['first_name'].'</td>'.'<td width="220"style="background-color:#FADED1">'.$row['last_name'].'</td>'.'</tr>';
  echo '<tr>'.'<td width="100" style="background-color:#FADED1">'.$row['emp_code'].'</td>'.'<td width="100" style="background-color:#FADED1">'.$row['first_name'].'</td>'.'<td width="220"style="background-color:#FADED1">'.$row['last_name'].'</td>'.'<td width="220"style="background-color:#FADED1">'.$pf_sql['pf_number'].'</td>'.'</tr>';
	   }
	  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  
	  if(isset($num_rows))
	  {
	  if($num_rows == 1)
	  {
	      echo '<tr onclick="toggle(this)" style="display:none;" >'.'<td width="20" border="1" >'.'<input type="radio" name="rdb_emp_no" id="rdb_emp_no" />'.'</td>'.'</tr>';

	  }
	  }
	
	?> </table>
	<table border="1" width="900">
	<center><b>
	<?php 
	if($num_rows == 0)
	{
	  //echo "No Such Records Found";
	  echo '<tr><td colspan="4">'."No Such Records Found".'</td></tr>';
	}
	else
	{
	?>
	</b></center>
	<!--tr><td colspan="4"><center><input type="submit" name="btn_update_info" id="btn_update_info" value="View Details" /></center></td></tr-->
	<tr><td colspan="4"><center>---------------------------------------------------------------</center></td></tr>
	<?php
	}
	?>
	</table>
	
	<?php
	}
	}
	?>
	
	
	
	</body>
	</html>
	