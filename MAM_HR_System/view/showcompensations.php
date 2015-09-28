<?php

include("../model/Model.php");

$id = $_GET['option'];

printf ( "<option value='select'>Select</option>") ;


$sq_comp_master = mysql_query("select comp_code, comp_name from comp_head order by comp_code");
while($r_comp_master = mysql_fetch_assoc($sq_comp_master))
{

if($r_comp_master['comp_code']!='E0005' && $r_comp_master['comp_code']!='E0006')
{
$sq_emp_comp = mysql_query("select comp_code from emp_comp_master_lines where comp_code='$r_comp_master[comp_code]' and employee_no='$id'");
if(mysql_num_rows($sq_emp_comp) == 0)
{
    $Options = Array ( 
        $id => Array ( 
             $r_comp_master['comp_code']. " - ".$r_comp_master['comp_name'], 
        ) , 
    ) ; 
    forEach ( $Options [ $_GET [ 'option' ] ] as $Item ) {
        printf ( "<option value='$r_comp_master[comp_code]'>%s</option>" , $Item , $Item) ;
    }
}
}
}



?>