<?php  include("../model/Model.php"); ?>

<tr>
<td><center><font color="#CC0000">Details</font></center></td>
<td><center><font color="#CC0000">Employee No</font></center></td>
<td><center><font color="#CC0000">First Name</font></center></td>
<td><center><font color="#CC0000">Middle Name</font></center></td>
<td><center><font color="#CC0000">Last Name</font></center></td>
</tr>
<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("sane_guruji_arogya_kendra_hadapsar", $con);

$first_name=$_GET['project_id'];
$last_name=$_GET['last_name_id'];
$sq1="select * from empl_master where ";
if($first_name!='select')
{
$sq1=$sq1." first_name='$first_name' and ";
}
else
{
 $sq1=$sq1." 1 and ";
}
if($last_name!='select')
{
$sq1=$sq1." last_name='$last_name' ";
}
else
{
 $sq1=$sq1." 1 ";
}
$sq=mysql_query($sq1);
while($row=mysql_fetch_assoc($sq))
{
echo "<tr>";



echo '<td><a href="show_leaves.php?">show detail</a></td>';
echo "<td>$row[employee_no]</td>";
echo "<td>$row[first_name]</td>";
echo "<td>$row[middle_name]</td>";
echo "<td>$row[last_name]</td>";


echo "</tr>";
}
?>