<?php include('../model/Model.php');



  $month=$_GET['id1'];



  $query="select * from  month_attendance where ";
  
  if($month=='select')
  {
    $query=$query." 1";
  }
  else
  {
      $query=$query." month='$month' and 1";
  }
  
  
  
  $i = 1;
  
//echo $query;
  $sql_emp=mysql_query($query);
  $insert='';
  $temp = 0;
  while($res_employee_no=mysql_fetch_assoc($sql_emp))
  { 
	$date = date('Y-m-d');
	$sq_emp_leave_mngt = mysql_query("select * from attendance where employee_no='$res_employee_no[employee_no]' and month_no='$month'");
	
	$num_rows1 = mysql_num_rows(mysql_query("select month from month_attendance where month='$month'"));	
	$num_rows2 = mysql_num_rows(mysql_query("select employee_no from comp_details where type_of_sep='' and grant_type!='Grantable'"));
	
	if($num_rows1 != $num_rows2)
	{	
		echo '<tr><td><center><b>Please fill up all employee attendence</b></center></td></tr>';
		exit();
		  /*$diff = $num_rows2 - $num_rows1;
		  echo "Total Employees are ".$num_rows2.", You have filled attendance for ".$num_rows1." Employees. Attendance for ".$diff." employees not filled. \n";
		  echo "<br /><br />Those Employees are : <br />";
		  $sq_comp_det = mysql_query("select employee_no from comp_details where type_of_sep='' and grant_type!='Grantable'");
		  while($r_comp_det = mysql_fetch_assoc($sq_comp_det))
		  {
			$sq_atten = mysql_query("select employee_no from month_attendance where month='$month' and employee_no='$r_comp_det[employee_no]'");
			if(!mysql_fetch_assoc($sq_atten))
				 {
					$r_employee = mysql_fetch_assoc(mysql_query("select first_name, middle_name, last_name, emp_code from empl_master where employee_no='$r_comp_det[employee_no]'"));
					echo "<br />".$r_employee['emp_code'].", ".$r_employee['first_name']." ".$r_employee['middle_name']." ".$r_employee['last_name'];
				 }
		  }
    	 exit(0);*/
	}
	
	 

	if(mysql_num_rows($sq_emp_leave_mngt)==0)
	{	
	//$insert = mysql_query("insert into attendance values('$res_employee_no[employee_no]','$res_employee_no[month]','$res_employee_no[working_days]','$res_employee_no[weekly_off]','$res_employee_no[paid_leaves]','$res_employee_no[unpaid_leaves]','$res_employee_no[suspension_days]','','','$res_employee_no[leave_encashment_days]','$date','$_SESSION[role]','','')");	
	$insert = mysql_query("insert into attendance values('$res_employee_no[employee_no]','$res_employee_no[month]','$res_employee_no[emp_present_day]','$res_employee_no[weekly_off]','$res_employee_no[paid_leaves]','$res_employee_no[unpaid_leaves]','$res_employee_no[suspension_days]','','','$res_employee_no[leave_encashment_days]','$date','$_SESSION[role]','','')");	
	$temp =1;
	}
	else
	{
		$sq_emp_name = mysql_query("select * from empl_master where employee_no='$res_employee_no[employee_no]'");
		while($res_emp_name = mysql_fetch_assoc($sq_emp_name))
		{
			echo "Attendance already exists for employee ".$res_emp_name['first_name'].' '.$res_emp_name['middle_name'].' '.$res_emp_name['last_name']."<br>";
		}
	}
	$i++;
   
  }
  
  if($temp == 1)
  {
		 echo '<tr><td><center><b>Attendace added successfuly</b></center></td></tr>';
  }
  //else
  //{
  	//echo '<tr><td><center><b>Error</b></center></td></tr>';
  //}
?>

