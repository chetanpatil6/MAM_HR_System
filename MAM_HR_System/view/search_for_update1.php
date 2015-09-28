<html>
<body>
<tr><td colspan="4"><h5>Search Results </h5></td></tr>
<?php include('../model/Model.php');
	  
	  
	  $id = $_GET['id'];
	  $id1 = $_GET['id1'];
	  
	 // if(preg_match("/[A-Z  | a-z]+/", $id)){ 
	 if(isset($id)){ 
	  $name = $id; 
	  //connect  to the database 
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
	  if($num_rows!=0)
	  {
	  ?>
	  <tr><th></th><th  style="background-color:#FFC993;"><center>Employee Code</center></th><th style="background-color:#FFC993;"><center>First Name</center></th><th  style="background-color:#FFC993;"><center>Last Name</center></th></tr>
	  <?php
	  }
	   while($row = mysql_fetch_assoc($sql))
	   {
 //echo '<tr onclick="toggle(this)">'.'<td width="100">'.'<a value='.$row['employee_no'].' onclick="showUser(this)">'.'Details'.'</a>'.'</td>'.'<td width="100">'.$row['employee_no'].'</td>'.'<td width="100">'.$row['first_name'].'</td>'.'<td width="220">'.$row['last_name'].'</td>'.'</tr>';
 
  echo '<tr onclick="toggle(this)">'.'<td width="20" border="1" >'.'<input type="radio" value='.$row['employee_no'].' name="rdb_emp_no" id="rdb_emp_no" />'.'</td>'.'<td width="100" style="background-color:#FADED1">'.$row['emp_code'].'</td>'.'<td width="100" style="background-color:#FADED1">'.$row['first_name'].'</td>'.'<td width="220"style="background-color:#FADED1">'.$row['last_name'].'</td>'.'</tr>';

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
	  echo "No Such Records Found";
	}
	else
	{
	?>
	</b></center>
	<tr><td colspan="4"><center><input type="submit" name="btn_update_info" id="btn_update_info" value="View Details" /></center></td></tr>
	<?php
	}
	?>
	</table>
	
	
	
	
	</body>
	</html>
	