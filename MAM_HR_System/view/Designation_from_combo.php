<?php

include("../model/Model.php");

$id = $_GET['option'];
echo $id;
$sq_desig = mysql_fetch_assoc(mysql_query("select distinct designation from comp_details where employee_no='$id'"));
$designation=$sq_desig['designation'];
echo "<option value='$designation'>$designation</option>";
//printf ( "<option value='select'>Select</option>") ;
/*
while($res_desig = mysql_fetch_assoc($sq_desig))
{

    $Options = Array ( 
        $id => Array ( 
             $res_desig['designation'], 
        ) , 
    ) ; 
    forEach ( $Options [ $_GET [ 'option' ] ] as $Item ) {
        printf ( "<option value='$res_desig[designation]'>%s</option>" , $Item , $Item) ;
		
    }
}*/


?>

