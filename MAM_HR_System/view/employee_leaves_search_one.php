<?php 
include('../model/Model.php');

$emp_no=$_GET['id1'];
//echo $emp_no;

  $query="select * from balanced_leaves where ";
  
  if($emp_no=='select')
  {
    $query=$query." 1";
	return false;
  }
  else
  {
      $query=$query." employee_no='$emp_no' and 1";
  }
  $sql_emp=mysql_query($query);
  
  
  
$sq_emp = mysql_query("select * from empl_master where employee_no='$emp_no'");
if($r_emp = mysql_fetch_assoc($sq_emp))
{
  $emp_name= $r_emp['first_name']." ".$r_emp['middle_name']." ".$r_emp['last_name'];
}
  
?>



<tr><td colspan='10'><center><label><b>Balance Leaves</b></label></center></td></tr>
<tr>
<td width="240"><b><center>Employee Name:<font color="#FF0000">*</font></center></b></td>
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
<td size='3' title="<?php echo $res_leaves_type['leave_description']; ?>"><b><center><?php echo strtoupper($res_leaves_type['leave_short_code']); ?></center></b></td>
<?php
}
?>
<input type="text" id="txt_count_leave_type" name="txt_count_leave_type" value="<?php echo $count_leaves_type; ?>" style="display:none" />
<td><b><center>Total Leaves</center></b></td></tr>

<?php
 $total= 0;
 echo "<tr><td><b>$emp_name</b></td>";
$size = sizeof($temp);
  
for($k=0;$k<$size;$k++)
  {
      $sq_leaves_exists = mysql_query("select * from balanced_leaves where employee_no='$emp_no' and leave_short_code = '$temp[$k]'");
  	 
      if (!mysql_num_rows($sq_leaves_exists))
	  {
	 
	 	 echo "<td><input type='text' name='txt_current_leaves$i' id='txt_current_leaves$i' size='8' value='0' disabled='disabled' /></td>";

	  }
      else
	  {  
		  while($res_leave_master=mysql_fetch_assoc($sq_leaves_exists))
		  {  
			  echo "<td><input type='text' name='txt_current_leaves$i' id='txt_current_leaves$i' size='8' value='$res_leave_master[leavedays_onhand]' disabled='disabled' /></td><td style='display:none'><input type='text' name='txt_current_leaves_code$i' id='txt_current_leaves_code$i' size='8' value='$res_leave_master[leave_short_code]' disabled='disabled' /></td>";
		  $total = $total + $res_leave_master['leavedays_onhand']; 
		  //$i++;
		  }
  		}
   
     $i++;
 
 }
   echo "<td><input type='text' name='txt_current_total_leave' id='txt_current_total_leave' size='8' value='$total' disabled='disabled' /></td>";
   echo "</tr>";
?>
