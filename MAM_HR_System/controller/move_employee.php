<?php
//include("../model/Model.php");
//$dbconnect = NEW Model('pharma', 'root', '');
session_start();

$from_company_name = $_POST['from_company_name'];
$to_company_name = $_POST['to_company_name'];
$to_employee_name = $_POST['to_employee_name'];

mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$arr_empl_master = array();
  
  
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($to_company_name); 

$sq_emp_no_incre = mysql_query("select max(employee_no) as max_emp from empl_master");
$r_emp_no_incre = mysql_fetch_assoc($sq_emp_no_incre);
$employee_no = $r_emp_no_incre['max_emp'] + 1;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$sq_empl = mysql_query("select * from empl_master where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{
$changed_emp_code = $r_empl['emp_code'].'moved';
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($to_company_name);
   
mysql_query("insert into empl_master values('$employee_no','$r_empl[initial]','$r_empl[emp_code]','$r_empl[punching_code]','$r_empl[first_name]','$r_empl[middle_name]','$r_empl[last_name]','$r_empl[gender]','$r_empl[birth_date]','$r_empl[marital_status]','$r_empl[blood_group]','$r_empl[place_of_origin]','$r_empl[nationality]','$r_empl[permanent_addr_1]','$r_empl[permanent_addr_2]','$r_empl[permanent_addr_3]','$r_empl[permanent_city]','$r_empl[permanent_pin_code]','$r_empl[permanent_state]','$r_empl[permanent_country]','$r_empl[present_addr_1]','$r_empl[present_addr_2]','$r_empl[present_addr_3]','$r_empl[present_city]','$r_empl[present_pin_code]','$r_empl[present_state]','$r_empl[present_country]','$r_empl[residence_phone_no]','$r_empl[mobile_no]','$r_empl[emergency_contact_no]','$r_empl[emergency_contact_person]','$r_empl[email_id]','$r_empl[created_on]','$r_empl[created_by]','$r_empl[updated_on]','$r_empl[updated_by]')");

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$sq_empl = mysql_query("select * from comp_details where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($to_company_name);


   mysql_query("insert into comp_details values('$employee_no','$r_empl[joining_date]','$r_empl[comp_change_eff_date]','$r_empl[designation]','$r_empl[grade]','$r_empl[bank_branch_name]','$r_empl[bank_account_no]','$r_empl[basic]','$r_empl[hra]','$r_empl[special]','$r_empl[conveyance]','$r_empl[lta]','$r_empl[pf_applicable]','$r_empl[prof_tax_applicable]','$r_empl[esi_applicable]','$r_empl[tds_applicable]','$r_empl[gratuity_applicable]','$r_empl[pension_fund_applicable]','$r_empl[pf_number]','$r_empl[pf_date]','$r_empl[pf_uan]','$r_empl[pf_uan_date]','$r_empl[dearness_pay]','$r_empl[da]','$r_empl[gross_salary]','$r_empl[ctc]','$r_empl[emp_type]','$r_empl[emp_cat]','$r_empl[date_of_confirm]','$r_empl[date_of_sepration]','$r_empl[type_of_sep]','$r_empl[remark_for_sepration]','$r_empl[salary_on_joining]','$r_empl[mode_of_payment]','$r_empl[lic_acc_no_1]','$r_empl[lic_id_no_1]','$r_empl[lic_gratuity_no_1]','$r_empl[lic_amt_1]','$r_empl[lic_acc_no_2]','$r_empl[lic_id_no_2]','$r_empl[lic_gratuity_no_2]','$r_empl[lic_amt_2]','$r_empl[loan_acc_no_1]','$r_empl[loan_id_no_1]','$r_empl[loan_gratuity_no_1]','$r_empl[loan_amt_1]','$r_empl[loan_acc_no_2]','$r_empl[loan_id_no_2]','$r_empl[loan_gratuity_no_2]','$r_empl[loan_amt_2]','$r_empl[grant_type]','$r_empl[department]','$r_empl[created_on]','$r_empl[created_by]','$r_empl[updated_on]','$r_empl[updated_by]')");
   
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$sq_empl = mysql_query("select * from family_info where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($to_company_name);
   
   
    mysql_query("insert into family_info values('$employee_no','$r_empl[spouse_name]','$r_empl[spouse_contact_no]','$r_empl[no_of_members]','$r_empl[no_of_dependents]','$r_empl[name1]','$r_empl[relation1]','$r_empl[age1]','$r_empl[gaurdian_name1]','$r_empl[name2]','$r_empl[relation2]','$r_empl[age2]','$r_empl[gaurdian_name2]','$r_empl[created_on]','$r_empl[created_by]','$r_empl[updated_on]','$r_empl[updated_by]')");
	
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$sq_empl = mysql_query("select * from experience where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{

   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
   
   mysql_query("insert into experience values('$employee_no','$r_empl[sr_no]','$r_empl[from_period]','$r_empl[upto_period]','$r_empl[company_name]','$r_empl[designation]','$r_empl[role_details]','$r_empl[created_on]','$r_empl[created_by]','$r_empl[updated_on]','$r_empl[updated_by]')");

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);
$sq_empl = mysql_query("select * from qualification where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{

   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
   
   mysql_query("insert into qualification values('$employee_no','$r_empl[sr_no]','$r_empl[degree_title]','$r_empl[subject]','$r_empl[year_of_passing]','$r_empl[university]','$r_empl[state]','$r_empl[country]','$r_empl[created_on]','$r_empl[created_by]','$r_empl[updated_on]','$r_empl[updated_by]')");

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$sq_empl = mysql_query("select * from qualification where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{

   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
   
   mysql_query("insert into qualification values('$employee_no','$r_empl[sr_no]','$r_empl[degree_title]','$r_empl[subject]','$r_empl[year_of_passing]','$r_empl[university]','$r_empl[state]','$r_empl[country]','$r_empl[created_on]','$r_empl[created_by]','$r_empl[updated_on]','$r_empl[updated_by]')");

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$sq_empl = mysql_query("select * from emp_comp_master where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{
   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
   
   mysql_query("insert into emp_comp_master values('$employee_no','$r_empl[created_by]','$r_empl[created_on]','$r_empl[updated_by]','$r_empl[updated_on]')");
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$sq_empl = mysql_query("select * from emp_comp_master_lines where employee_no='$to_employee_name'");
while($r_empl = mysql_fetch_assoc($sq_empl))
{

   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
   
   mysql_query("insert into emp_comp_master_lines values('$employee_no','$r_empl[comp_code]','$r_empl[comp_change_eff_date]','$r_empl[amount]')");

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);

$current_date = date('Y-m-d');
$current_time = time();
$current_time = date('h:i a', strtotime($current_time));
$sq_emp = mysql_query("select first_name, last_name from empl_master where employee_no='$to_employee_name'");
$r_emp = mysql_fetch_assoc($sq_emp);

mysql_query("insert into emp_move_details values('$to_employee_name','$r_emp[first_name]','$r_emp[last_name]','$to_company_name','$employee_no','$current_date','$current_time')");
mysql_query("update comp_details set type_of_sep='moved' where employee_no='$to_employee_name'");
mysql_query("update empl_master set emp_code='$changed_emp_code' where employee_no='$to_employee_name'");

///////////////////////////////////////////////////////code for leaves/////////////////////////////////////

////////for balance leaves
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);
$sq_balanced_leaves = mysql_query("select * from balanced_leaves where employee_no='$to_employee_name'");
while($res_balanced_leaves = mysql_fetch_assoc($sq_balanced_leaves))
{

   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
   
   mysql_query("insert into balanced_leaves values('$employee_no','$res_balanced_leaves[leave_short_code]','$res_balanced_leaves[leavedays_onhand]','$res_balanced_leaves[last_receipt_date]','$res_balanced_leaves[last_issue_date]','$res_balanced_leaves[updated_by]','$res_balanced_leaves[updated_date]')");

}


////////for transaction
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);
$sq_leaves_transaction = mysql_query("select * from leaves_transaction where employee_no='$to_employee_name' and trans_type!='LA'");
while($res_leaves_transaction = mysql_fetch_assoc($sq_leaves_transaction))
{
	//if($res_leaves_transaction['trans_type']  != 'LA')
	//{
   		mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   		mysql_select_db($to_company_name);
      
		mysql_query("insert into leaves_transaction values('','$res_leaves_transaction[trans_date]','$res_leaves_transaction[for_date]','$employee_no','$res_leaves_transaction[leave_short_code]','$res_leaves_transaction[trans_type]','$res_leaves_transaction[leave_days]','$res_leaves_transaction[ref_docno]')");
	//}
	/*else
	{
	////////for Leave application Management
	mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
	mysql_select_db($from_company_name);
	$sq_leave_management = mysql_query("select * from leave_management where employee_no='$to_employee_name'");
	while($res_leave_management = mysql_fetch_assoc($sq_leave_management))
	{
		mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
		mysql_select_db($to_company_name);
		
			$count = mysql_num_rows(mysql_query("select doc_no from leave_management"))+1;
			$code = 'LA'.$count;
			
	mysql_query("insert into leave_management values ('$code','$res_leave_management[doc_date]','$employee_no','$res_leave_management[leave_short_code]','$res_leave_management[attendance_no]','$res_leave_management[leave_application_no]','$res_leave_management[registration_no]', '$res_leave_management[leave_application_date]','$res_leave_management[designation]','$res_leave_management[application_received_date]', '$res_leave_management[from_date]','$res_leave_management[from_day_type]','$res_leave_management[to_date]','$res_leave_management[to_day_type]','$res_leave_management[total_days]','$res_leave_management[leave_stock_type]','$res_leave_management[updated_by]','$res_leave_management[leave_status]','$res_leave_management[remark]')");
	
	   // mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   		//mysql_select_db($to_company_name);
	mysql_query("insert into leaves_transaction values('','$res_leaves_transaction[trans_date]','$res_leaves_transaction[for_date]','$employee_no','$res_leaves_transaction[leave_short_code]','$res_leaves_transaction[trans_type]','$res_leaves_transaction[leave_days]','$res_leaves_transaction[ref_docno]')");
	 }*/
	
	//}
}

////////for transfer
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);
$sq_leaves_transfer = mysql_query("select * from leaves_transfer where employee_no='$to_employee_name'");
while($res_leaves_transfer = mysql_fetch_assoc($sq_leaves_transfer))
{

   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
      
mysql_query("insert into leaves_transfer values('$employee_no','$res_leaves_transfer[from]','$res_leaves_transfer[leaves_transfer]','$res_leaves_transfer[to]','$res_leaves_transfer[leave_short_code]','$res_leaves_transfer[leavedays_onhand]','$res_leaves_transfer[created_date]')");
}


////////for Leave application Management
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);
$sq_leave_management = mysql_query("select * from leave_management where employee_no='$to_employee_name'");
while($res_leave_management = mysql_fetch_assoc($sq_leave_management))
{
   
   
   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
        $count = mysql_num_rows(mysql_query("select doc_no from leave_management"))+1;
		$code = 'LA'.$count;
		
mysql_query("insert into leave_management values ('$code','$res_leave_management[doc_date]','$employee_no','$res_leave_management[leave_short_code]','$res_leave_management[attendance_no]','$res_leave_management[leave_application_no]','$res_leave_management[registration_no]', '$res_leave_management[leave_application_date]','$res_leave_management[designation]','$res_leave_management[application_received_date]', '$res_leave_management[from_date]','$res_leave_management[from_day_type]','$res_leave_management[to_date]','$res_leave_management[to_day_type]','$res_leave_management[total_days]','$res_leave_management[leave_stock_type]','$res_leave_management[updated_by]','$res_leave_management[leave_status]','$res_leave_management[remark]')");   

	mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
	mysql_select_db($from_company_name);
   $sql_leave_transaction = mysql_query("select * from leaves_transaction where employee_no='$to_employee_name' and ref_docno='$res_leave_management[doc_no]' and trans_type='LA'");	
   while($res_leaves_transaction = mysql_fetch_assoc($sql_leave_transaction))
   {
   	mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
    mysql_select_db($to_company_name);
   	mysql_query("insert into leaves_transaction values('','$res_leaves_transaction[trans_date]','$res_leaves_transaction[for_date]','$employee_no','$res_leaves_transaction[leave_short_code]','$res_leaves_transaction[trans_type]','$res_leaves_transaction[leave_days]','$code')");
   }

}


////////for Month Attendance
mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
mysql_select_db($from_company_name);
$sq_moth_attendance = mysql_query("select * from month_attendance where employee_no='$to_employee_name'");
while($res_moth_attendance = mysql_fetch_assoc($sq_moth_attendance))
{

   mysql_connect($_SESSION['server'], $_SESSION['uname'], $_SESSION['password']);
   mysql_select_db($to_company_name);
        $count = mysql_num_rows(mysql_query("select doc_no from leave_management"))+1;
		//$code = 'LA'.$count;
		
mysql_query("insert into month_attendance values ('$count','$employee_no','$res_moth_attendance[month]','$res_moth_attendance[from_date]','$res_moth_attendance[to_date]','$res_moth_attendance[total_month_day]','$res_moth_attendance[weekly_off]', '$res_moth_attendance[working_days]','$res_moth_attendance[emp_present_day]','$res_moth_attendance[paid_leaves]', '$res_moth_attendance[unpaid_leaves]','$res_moth_attendance[absent_days]','$res_moth_attendance[suspension_days]','$res_moth_attendance[leave_encashment_days]','$res_moth_attendance[remark]','$res_moth_attendance[entered_date_time]','$res_moth_attendance[entered_by]')");   

}


///////////////////////////////////////////////////////End code for leaves/////////////////////////////////////



echo "Employee Moved Successfully";


?>
