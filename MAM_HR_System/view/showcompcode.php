<html>
<head>
</head>
<body>
<?php
include('../model/Model.php');
$id = $_GET['id'];


if($id == 'select')
{
 $code = '';
}
else
{
$sq = mysql_query("select * from comp_head where comp_code like '$id%'");
$num_row = mysql_num_rows($sq);
if($id == "D")
{
$num_row = $num_row + 2;
}
else
{
$num_row = $num_row + 1;
}

$len = strlen($num_row);

if($len == 1)
{
$code = $id.'000'.$num_row;
}
else if($len == 2)
{
$code = $id.'00'.$num_row;
}
else if($len == 3)
{
 $code = $id.'0'.$num_row;
}
else
{
$code = $id.$num_row;
}
}
?>
<tr><td><input type="text" name="txt_comp_code" id="txt_comp_code" value="<?php echo $code; ?>" disabled="disabled" /></td></tr>
</body>
</html>