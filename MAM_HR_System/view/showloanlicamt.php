<?php 
include('../model/Model.php');
	  
$id = $_GET['id'];

$sq_emp_master = mysql_query("select lic_amt_1, lic_amt_2, loan_amt_1, loan_amt_2 from comp_details where employee_no='$id'");
while($r_emp_master = mysql_fetch_assoc($sq_emp_master))
{

  $lic_amt = $r_emp_master['lic_amt_1'] + $r_emp_master['lic_amt_2'];
  $loan_amt = $r_emp_master['loan_amt_1'] + $r_emp_master['loan_amt_2'];
  
  ?>
  <input type="text" name="txt_lic_amt" id="txt_lic_amt" value="<?php echo $lic_amt; ?>" />
  <input type="text" name="txt_loan_amt" id="txt_loan_amt" value="<?php echo $loan_amt; ?>" />
  
  <?php
}


?>
