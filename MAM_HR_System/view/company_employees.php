<?php
$id = $_GET['option'];

mysql_connect('localhost', 'root', '');
//mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($id);



printf ( "<option value='select'>Select</option>") ;

$sq_emp = mysql_query("select * from empl_master, comp_details where comp_details.employee_no=empl_master.employee_no and (comp_details.type_of_sep='' or comp_details.type_of_sep!='Grantable') order by empl_master.last_name");
//$sq_emp = mysql_query("select * from empl_master");
while($r_emp = mysql_fetch_assoc($sq_emp))
{
   //$trimmed_first_name = explode(" ", $r_emp['first_name']);
   
    $Options = Array ( 
        $id => Array ( 
             $r_emp['last_name'].' '.$r_emp['first_name'].' '.$r_emp['middle_name'], 
        ) , 
    ) ; 
    forEach ( $Options [ $_GET [ 'option' ] ] as $Item ) {
        printf ( "<option value='$r_emp[employee_no]'>%s</option>" , $Item , $Item) ;
    }
}


?>