<?php
include("../model/Model.php");

$id = $_GET['option'];
echo '<option selected="selected" value="select">Select</option>';
$sq_recov = mysql_query("select * from recovery where employee_no='$id'");
while($r_recov = mysql_fetch_assoc($sq_recov))
{
 $sq_comp = mysql_query("select * from comp_head where comp_code='$r_recov[recov_title]'");
 while($r_comp = mysql_fetch_assoc($sq_comp))
 {
 $Options = Array ( 
        $id => Array ( 
             $r_comp['comp_code']." - ".$r_comp['comp_name'], 
        ) , 
    ) ; 
    forEach ( $Options [ $_GET [ 'option' ] ] as $Item ) {
        printf ( "<option value='$r_comp[comp_code]'>%s</option>" , $Item , $Item) ;
    }

}
}

?>