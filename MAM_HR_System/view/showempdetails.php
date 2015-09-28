<html>
<head>
</head>
<body>
<tr><td><center><b>Recovery Code</b></center></td><td><center><b>Compensation Name</b></center></td><td><center><b>Balance Amount</b></center></td></tr>
<?php
include('../model/Model.php');
$id = $_GET['id'];

$sq = mysql_query("select * from recovery where employee_no='$id'");
while($r = mysql_fetch_assoc($sq))
{

$sq1 = mysql_query("select * from comp_head where comp_code='$r[recov_title]'");
while($r1 = mysql_fetch_assoc($sq1))
{
?>



<tr><td><center><?php echo $r['recov_title']  ?></center></td><td><center><?php echo $r1['comp_name']  ?></center></td><td><center><?php echo $r['balance_amount']; ?></center></td></tr>

<?php 
}
}
?>
</body>
</html>