<html>
<body>
<?php
include("../model/Model.php");
$file = $_FILES['my_uploaded_file']['name'];
move_uploaded_file($_FILES['my_uploaded_file']['tmp_name'],"../upload/$file");

?>
</body>
</html>