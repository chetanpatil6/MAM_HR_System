<?php include('../model/Model.php');



$emp_no=$_GET['id1'];



  $query="select * from  empl_master where ";
  
  if($emp_no=='select')
  {
    $query=$query." 1";
  }
  else
  {
      $query=$query." employee_no='$emp_no' and 1";
  }
  
  
  
  $i = 1;
  
//echo $query;
  $sql_emp=mysql_query($query);
  while($res_employee_no=mysql_fetch_assoc($sql_emp))
  {	
	
				echo '<tr><td style="display:none">'.'<input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['employee_no'].'" size="8"  /></td>
			<td><input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" size="30" title="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" disabled="disabled" /></td>';
			
			$sq_leaves_type = mysql_query("select * from leaves_type");
			$count = 1;
			$total = 0;
			while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
			{			
			echo '<td style="display:none"><input type="text" name="txt_emp_leave_type'.$i.$count.'" id="txt_emp_leave_type'.$i.$count.'" size="8" value="'.$res_leaves_type['leave_short_code'].'" disabled="disabled"/></td><td><input type="text" name="txt_emp_leave_type_onhand'.$i.$count.'" id="txt_emp_leave_type_onhand'.$i.$count.'" size="8" onkeyup="calculate_total(this.id);" title='.strtoupper($res_leaves_type['leave_description']).'/></td>';
			 $count++;
		    }
			echo '<td style="display:none"><input type="text" name="txt_emp_unpaid_leave'.$i.'" id="txt_emp_unpaid_leave'.$i.'" size="8" onkeyup="calculate_total();" /></td>
			<td><input type="text" name="txt_emp_total_leave'.$i.'" id="txt_emp_total_leave'.$i.'" size="8" disabled="disabled" value="'.$total.'" /></td></tr>';
			
		
	$i++;
}
  
?>

