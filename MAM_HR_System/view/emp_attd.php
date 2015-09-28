<?php 
    include('../model/Model.php');
	
 	 $i = 1;
	 $month = $_GET['id2'];
	 $emp_no = $_GET['id1'];
	 
	 $query = "select * from attendance where month_no='$month' and ";
	 
	 if($emp_no == 'All')
	 {
	 	$query = $query." 1 ";
	 }
	 else
	 {
	    $query = $query." employee_no='".$emp_no."'";
	 }
	 //echo $emp_no;
	 $s1 = mysql_query($query);
	 while($row1 = mysql_fetch_assoc($s1))
	 {
	 $s2 = mysql_query("select * from empl_master where employee_no ='$row1[employee_no]' order by emp_code");
	 
	 while($row2 = mysql_fetch_assoc($s2))
	 {
	 $res_amount = mysql_fetch_assoc(mysql_query("select amount from emp_comp_master_lines where comp_code='D0004' and employee_no='$row2[employee_no]'"));
	 $month_active_no = '';
     $sq = mysql_query("select * from month_control where month_active='Y'");
     while($r = mysql_fetch_assoc($sq))
     {
     $month_active_no = $r['month_no'];
	 echo '<input type="text" name="txt_no_days" id="txt_no_days" value="'.$r['no_days'].'" style="display:none;" />';
     }
	 if($row1['month_no']==$month_active_no)
	 {
	 echo '<tr>'.'<td style="display:none";>'.'<input type="text" name="txt_emp_no'.$i.'" id="txt_emp_no'.$i.'" value="'.$row2['employee_no'].'" size="1"  />'.'</td>'.'<td>'.'<input type="text" name="txt_comp_code'.$i.'" disabled="disabled" id="txt_comp_code'.$i.'" title="'.$row2['first_name'].' '.$row2['middle_name'].' '.$row2['last_name'].'" value="'.$row2['first_name'].' '.$row2['middle_name'].' '.$row2['last_name'].'" size="32" />'.'</td>'.'<td>'.'<input type="text" name="txt_comp_change_eff_date'.$i.'" id="txt_comp_change_eff_date'.$i.'" value="'.$row1['month_no'].'" size="5" disabled />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['pay_days'].'"   />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['holidays'].'"  />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['paid_leaves'].'" />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['unpaid_leaves'].'"  />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['suspention_days'].'"  />'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['adj_days'].'" size="5" />'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['ot_hrs'].'" size="5" />'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['leave_encash_days'].'" size="5" />'.'</td>'.'<td><input type="text" name="txt_income_tax'.$i.'" id="txt_income_tax'.$i.'" value="'.$res_amount['amount'].'" size="5"  /></td></tr>';
	 
	 $i = $i + 1;
	 }
	 else
	 {
	 echo '<tr>'.'<td >'.'<input type="text" name="txt_emp_no'.$i.'"  id="txt_emp_no'.$i.'" value="'.$row2['employee_no'].'" size="1" disabled="disabled" />'.'</td>'.'<td>'.'<input type="text" name="txt_comp_code'.$i.'" disabled="disabled" id="txt_comp_code'.$i.'" title="'.$row2['first_name'].' '.$row2['middle_name'].' '.$row2['last_name'].'" value="'.$row2['first_name'].' '.$row2['middle_name'].' '.$row2['last_name'].'" size="32" />'.'</td>'.'<td>'.'<input type="text" name="txt_comp_change_eff_date'.$i.'" id="txt_comp_change_eff_date'.$i.'" value="'.$row1['month_no'].'" size="5" disabled />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['pay_days'].'" disabled="disabled"  />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['holidays'].'" disabled="disabled"  />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['paid_leaves'].'" disabled="disabled"  />'.'</td>'.'<td >'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['unpaid_leaves'].'" disabled="disabled"  />'.'</td>'.'<td>'.'<input type="text" name="'.$i.'" id="'.$i.'" size="5" value="'.$row1['suspention_days'].'"  />'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['adj_days'].'" size="5" disabled="disabled"/>'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['ot_hrs'].'" size="5" disabled="disabled" />'.'</td>'.'<td>'.'<input type="text" name="txt_amount'.$i.'" id="txt_amount'.$i.'" value="'.$row1['leave_encash_days'].'" size="7" disabled="disabled" />'.'</td>'.'<td><input type="text" name="txt_income_tax'.$i.'" id="txt_income_tax'.$i.'" value="'.$res_amount['amount'].'" size="5"  /></td></tr>';
	 
	 $i = $i + 1;
	 }
	 }
	 }


?>

