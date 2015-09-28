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
		 $sq_current_el = mysql_query("select leavedays_onhand from balanced_leaves where leave_short_code = 'el' and employee_no = '$res_employee_no[employee_no]'");
	 $res_current_el = mysql_fetch_assoc($sq_current_el);
	 $total = $res_current_el['leavedays_onhand']-15;
				echo '<tr><td style="display:none">'.'<input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['employee_no'].'" size="8"  /></td>
			<td><input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" size="50" title="'.$res_employee_no['first_name'].' '.$res_employee_no['middle_name'].' '.$res_employee_no['last_name'].'" disabled="disabled" /></td>
			<td title="Current EL"><input type="text" name="txt_current_el'.$i.'"id="txt_current_el'.$i.'" value="'.$res_current_el['leavedays_onhand'].'" size="12" onkeyup="calculate_el();"/></td>
			<td title="Balance EL"><input type="text" name="txt_balanced_el'.$i.'"id="txt_balanced_el'.$i.'" value="15" size="12" onkeyup="calculate_el();" /></td>
			<td title="Total EL"><input type="text" name="txt_total_el'.$i.'"id="txt_total_el'.$i.'" value="'.$total.'" size="12" disabled="disabled" /></td>';
		
	$i++;
}
  
// echo '<tr><td colspan="12"></td></tr>';
?>

