

<?php
include('../model/Model.php');

//$count=0;

$emp_no=$_GET['id1'];



  $query="select DISTINCT (employee_no),leavedays_onhand,leave_short_code from  leaves_transfer where ";
  
  if($emp_no=='select')
  {
    $query=$query." 1";
  }
  else
  {
      $query=$query." employee_no='$emp_no' and 1";
  }
  
  

  //echo $query;
  $sql_emp=mysql_query($query);
  $total = 0;
  ?>
  
  
<!--<tr><td colspan='10'><center><label><b>Balace Leaves</b></label></center></td></tr> -->
<tr>
<?php
$sq_leaves_type = mysql_query("select * from leaves_type");
$count_leaves_type = mysql_num_rows($sq_leaves_type);
$i = 1;
while($res_leaves_type = mysql_fetch_assoc($sq_leaves_type))
{
?>
<td width="42" title="<?php echo $res_leaves_type['leave_description']; ?>"><b><center><?php echo strtoupper($res_leaves_type['leave_short_code']); ?></center></b></td>
<?php
}
?>
<input type="text" id="txt_count_leave_type" name="txt_count_leave_type" value="<?php echo $count_leaves_type; ?>" style="display:none" />
<td width='42'><b><center>Total Leaves</center></b></td></tr>

<!--  <tr><td width="42"><b><center>CL</center></b></td><td width="42"><b><center>FL</center></b></td><td width="42"><b><center>EL</center></b></td><td width="42"><b><center>ML</center></b></td><td width="42"><b><center>SP</center></b></td><td width="42"><b><center>Total Leaves</center></b></td></tr>
 -->
<?php
 $total= 0;
 
 
  echo "<tr>";
 
  while($res_leave_master=mysql_fetch_assoc($sql_emp))
  {  
	  echo "<td><input type='text' name='txt_current_leaves$i' id='txt_current_leaves$i' size='14' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td><td style='display:none'><input type='text' name='txt_current_leaves_code$i' id='txt_current_leaves_code$i' size='10' value='$res_leave_master[leave_short_code]' disabled='disabled' /></td>";
  $total = $total + $res_leave_master['leavedays_onhand']; 
  $i++;
  }
  
   echo "<td><input type='text' name='txt_current_total_leave' id='txt_current_total_leave' size='10' value='$total' disabled='disabled' /></td>";
   echo "</tr>";

//else

?>

