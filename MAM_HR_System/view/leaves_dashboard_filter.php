<?php  include("../model/Model.php"); ?>


<?php
$employee_no=$_GET['project_id'];
$leave_short_code=$_GET['leave_type'];
$from_date=$_GET['from_date'];
$to_date=$_GET['to_date'];
//echo "To date is "+$to_date;
$leave_status=$_GET['status'];
$sq1="select * from leave_management where ";

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

if($leave_status!='select')
{
$sq1=$sq1." and leave_status='$leave_status' ";
}
else
{
 $sq1=$sq1." and 1 ";
}

if($from_date!='select')
{
$sq1=$sq1." and from_date='$from_date' ";
}
else
{
 $sq1=$sq1." and 1 ";
}


if($to_date!='select')
{
$sq1=$sq1." and to_date='$to_date' ";
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
$sq_desig = mysql_fetch_assoc(mysql_query("select designation from comp_details where employee_no='$row[employee_no]'"));

echo "<tr>";
echo "<td>$sq2[first_name] $sq2[middle_name] $sq2[last_name]</td>";
 //$leave_short_code =  strtoupper($row['leave_short_code']);
//echo "<td style='text-align:center'>$leave_short_code $sq3[leave_description]</td>";
$leave_description =  strtoupper($sq3['leave_description']);
 $leave_description =  ucwords(strtolower($leave_description));
echo "<td> $leave_description</td>";
echo "<td style='text-align:center'>$row[leave_application_no]</td>";
 $join_date = date('d-m-Y', strtotime($row['leave_application_date']));
echo "<td  style='text-align:right'>$join_date</td>";
echo "<td style='text-align:center'>$sq_desig[designation]</td>";
$from_date = date('d-m-Y', strtotime($row['from_date']));
echo "<td  style='text-align:right'>$from_date</td>";
$to_date = date('d-m-Y', strtotime($row['to_date']));
echo "<td  style='text-align:right'>$to_date</td>";
echo "<td style='text-align:center'>$row[total_days]</td>";
echo "<td style='text-align:center'>$row[leave_status]</td>";
echo "<td style='text-align:center'>$row[leave_stock_type]</td>";

echo "</tr>";
}
?>