<?php include('../model/Model.php');
$count=0;
$moved_date=$_GET['id1'];
$query="select * from emp_move_details";
  if($moved_date=='All')
  {
    $query=$query;
  }
  else
  {
    $query=$query." where moved_date='$moved_date'";
  }
  //echo $query;
  $sql_date=mysql_query($query);
  while($row=mysql_fetch_assoc($sql_date))
  {
 
  echo '<tr><td width="70">'.$row['employee_no'].'</td><td width="170">'.$row['first_name'].' '.$row['last_name'].'</td><td width="170">'.$_SESSION['company_name'].'</td><td width="170">'.$row['to_company_name'].'</td><td width="70">'.$row['to_employee_no'].'</td><td width="70">'.$row['moved_date'].'</td></tr>';
   $count++;  
   
  }
  
 echo '<tr><td colspan="6">Total no. of Employees:'.$count.'</td></tr>';
?>
