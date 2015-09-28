<?php include('../model/Model.php');



$emp_no=$_GET['id1'];



  $query="select * from balanced_leaves where ";
  
  if($emp_no=='select')
  {
    $query=$query." 1";
  }
  else
  {
      $query=$query." employee_no='$emp_no' and 1";
  }
 ?> 
  
 <tr><td colspan='10'><center><label><b>Current Leaves</b></label></center></td></tr>
<tr><!--<td width='42'><b><center>CL</center></b></td><td width='42'><b><center>EL</center></b></td><td width='42'><b><center>FL</center></b></td><td width='42'><b><center>ML</center></b></td><td width='42'><b><center>SP</center></b></td><td width='42'><b><center>Total Leaves</center></b></td> -->
<?php
$sq_leaves_type = mysql_query("select * from leaves_type");
$count_leaves_type = mysql_num_rows($sq_leaves_type);
$i = 1;
$temp = array();
$j=0;
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
{
$temp[$j] = $res_leaves_type['leave_short_code'];
  $j = $j+1;
?>
<td width="42" title="<?php echo $res_leaves_type['leave_description']; ?>"><b><center><?php echo strtoupper($res_leaves_type['leave_short_code']); ?></center></b></td><!--<td width="42"><b><center>FL</center></b></td><td width="42"><b><center>EL</center></b></td><td width="42"><b><center>ML</center></b></td><td width="42"><b><center>SP</center></b></td><td width="42"><b><center>Paid Leaves</center></b></td> -->
<?php
}
?>
<input type="text" id="txt_count_leave_type" name="txt_count_leave_type" value="<?php echo $count_leaves_type; ?>" style="display:none" />
<td width='42'><b><center>Total Leaves</center></b></td></tr>
<?php
  $i = 1;
  $cl = $ml =$fl = $el = $sp =  $total= 0;
      echo "<tr>";
//echo $query;
$size = sizeof($temp);
  
  for($k=0;$k<$size;$k++)
  {
      $sq_leaves_exists = mysql_query("select * from balanced_leaves where employee_no='$emp_no' and leave_short_code = '$temp[$k]'");
//  $sql_emp=mysql_query($query);
  while($res_leave_master=mysql_fetch_assoc($sq_leaves_exists))
  { 
  
	  /*if($res_leave_master['leave_short_code'] == 'cl')
	  {
	 echo "<td><input type='text' name='txt_current_cl' id='txt_current_cl' size='10' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td>";
	 $cl = $res_leave_master['leavedays_onhand'];
	 }
	  if($res_leave_master['leave_short_code'] == 'el')
	  {
	 echo "<td><input type='text' name='txt_current_el' id='txt_current_el' size='10' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td>";
	 $el = $res_leave_master['leavedays_onhand'];
	 }
	  if($res_leave_master['leave_short_code'] == 'fl')
	  {
	 echo "<td><input type='text' name='txt_current_fl' id='txt_current_fl' size='10' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td>";
	 $fl = $res_leave_master['leavedays_onhand'];
	 }
	  if($res_leave_master['leave_short_code'] == 'ml')
	  {
	 echo "<td><input type='text' name='txt_current_ml' id='txt_current_ml' size='10' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td>";
	 $ml = $res_leave_master['leavedays_onhand'];
	 }
	  if($res_leave_master['leave_short_code'] == 'sp')
	  {
	 echo "<td><input type='text' name='txt_current_sp' id='txt_current_sp' size='10' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td>";
	 $sp = $res_leave_master['leavedays_onhand'];
	 } */
	 
	 echo "<td><input type='text' name='txt_current_leaves$i' id='txt_current_leaves$i' size='10' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td><td style='display:none'><input type='text' name='txt_current_leaves_code$i' id='txt_current_leaves_code$i' size='10' value='$res_leave_master[leave_short_code]' disabled='disabled' /></td>";
	 $total = $total + $res_leave_master['leavedays_onhand']; 
	
     
	$i++;
}
   
  }
  echo "<td><input type='text' name='txt_current_total_leave' id='txt_current_total_leave' size='10' value='$total' disabled='disabled' /></td>";
   echo "</tr>";

?>

