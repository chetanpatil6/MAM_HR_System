<?php  include("../model/Model.php"); ?>




<?php
$employee_no=$_GET['project_id'];
$leave_short_code=$_GET['leave_type'];
$trans_date=$_GET['from_date'];
$for_date=$_GET['to_date'];
$trans_type=$_GET['status'];
$sq1="select * from leaves_transaction where ";

if($employee_no!='select')
{
$sq1=$sq1." employee_no='$employee_no' ";
}
else
{
 $sq1=$sq1." 1 ";
}

if($leave_short_code!='select')
{
$sq1=$sq1." and leave_short_code='$leave_short_code' ";
}
else
{
 $sq1=$sq1." and 1 ";
}

if($trans_type!='select')
{
$sq1=$sq1." and trans_type='$trans_type' ";
}
else
{
 $sq1=$sq1." and 1 ";
}

if($trans_date!='select')
{
$sq1=$sq1." and trans_date='$trans_date' ";
}
else
{
 $sq1=$sq1." and 1 ";
}


if($for_date!='select')
{
$sq1=$sq1." and for_date='$for_date' ";
}
else
{
 $sq1=$sq1." and 1 ";
}



$sq=mysql_query($sq1);
while($row=mysql_fetch_assoc($sq))
{
$sq2= mysql_fetch_assoc(mysql_query("select first_name,middle_name,last_name from empl_master where employee_no='$row[employee_no]'"));
$sq3= mysql_fetch_assoc(mysql_query("select leave_description from leaves_type where leave_short_code='$row[leave_short_code]'"));
echo "<tr>";
echo "<td>$sq2[first_name] $sq2[middle_name] $sq2[last_name]</td>";
echo "<td style='text-align:center'>$row[trans_no]</td>";
$trans_date = date('d-m-Y', strtotime($row['trans_date']));
echo "<td  style='text-align:right'>$trans_date</td>";
$for_date = date('d-m-Y', strtotime($row['for_date']));
echo "<td  style='text-align:right'>$for_date</td>";
//$leave_short_code =  strtoupper($row['leave_short_code']);
//echo "<td style='text-align:center'>$leave_short_code $sq3[leave_description]</td>";
$leave_description =  strtoupper($sq3['leave_description']);
 $leave_description =  ucwords(strtolower($leave_description));
echo "<td> $leave_description</td>";
echo "<td style='text-align:center'>$row[trans_type]</td>";
echo "<td style='text-align:center'>$row[leave_days]</td>";

echo "</tr>";
}
?>