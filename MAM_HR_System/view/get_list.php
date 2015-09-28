<?php
include("../model/Model.php");
$q = strtolower($_GET["q"]);
if (!$q) return;




$sr1 = mysql_query("select * from empl_master where last_name like '$q%' or first_name LIKE '%$q%'");
while($rr1 = mysql_fetch_assoc($sr1))
{
  $sq_comp_details = mysql_query("select * from comp_details where employee_no='$rr1[employee_no]'");
  while($r_comp_details = mysql_fetch_assoc($sq_comp_details))
  {
    if($r_comp_details['type_of_sep'] == '')
	{
	 // $trimmed_first_name = ltrim($rr1['first_name'], " ");
	// $trimmed_first_name = explode(" ", $rr1['first_name']);
  	 // echo "<option value='$rr1[employee_no]'>$rr1[employee_no] - $rr1[first_name] $rr1[middle_name] $rr1[last_name]</option>";
	 $cid = $rr1['employee_no'];
	 $cname = $rr1['first_name'].$rr1['middle_name'].$rr1['last_name'];
	
	 
	 echo "$cname|$cid\n";
    }
  }
}
?>