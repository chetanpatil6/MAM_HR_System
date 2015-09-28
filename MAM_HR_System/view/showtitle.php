<html>
<head>
</head>
<body>
<?php
include('../model/Model.php');
$id = $_GET['id'];

$sq = mysql_query("select * from comp_head where comp_code='$id'");
while($r = mysql_fetch_assoc($sq))
{
?>
<tr><td width="385"><b>Code Title:</b><font color="#FF5F55">*</font></td><td colspan="3"><input type="text" name="txt_code_title" id="txt_code_title" value="<?php echo $r['comp_name'] ?>" disabled="disabled" /></td></tr>
<?php }
?>
</body>
</html>