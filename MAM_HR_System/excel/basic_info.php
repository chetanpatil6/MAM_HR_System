<?php
error_reporting(E_ALL);

//include("../model/Model.php");

date_default_timezone_set('Europe/London');

/** PHPExcel */
require_once '../Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
$servername = $_POST['txt_s'];
$usernm = $_POST['txt_u'];
$pas = $_POST['txt_p'];
$db1 = $_POST['txt_db'];

 
mysql_connect("$servername", "$usernm", "$pas") or die("unable to connect server");
mysql_select_db("$db1") or die("unable to connect db");


$objPHPExcel->createSheet();
$selection1 = $_POST['employee_info'];
$selection2 = $_POST['emp_info'];
$tablename = '';


if($selection1 == 'personal_info')
{
  $header_name = 'Employee Personal Information';
}
else if($selection1=='company_info')
{
$header_name = 'Employement Details';
}
else if($selection1=='qualification_info')
{
$header_name = 'Employee Qualification Information';
}
else if($selection1=='experience_info')
{
$header_name = 'Employee Experience Information';
}
else if($selection1=='family_info')
{
$header_name = 'Employee Family Information';
}


$sq = mysql_query("select * from company_info");
	while($row = mysql_fetch_assoc($sq))
	{	
	$row['name'] = str_replace('12345', ' ', $row['name']);
	
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('H1',$row['name']);
	}		
$objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setSize(14);
			


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('H2',$header_name);
		
$objPHPExcel->getActiveSheet()->getStyle('H2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H2')->getFont()->setSize(12);
			
if($selection1 =='personal_info')
{

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3','Emp No.')
			->setCellValue('B3','First name')
			->setCellValue('C3','Middle Name')
			->setCellValue('D3','Last Name')
			->setCellValue('E3','Gender')
            ->setCellValue('F3','Birth Date')
			->setCellValue('G3','Marital Status')
            ->setCellValue('H3','Blood Group')
            ->setCellValue('I3','Place Of Origin')
            ->setCellValue('J3','Nationality')
            ->setCellValue('K3','Permanent Address 1')
            ->setCellValue('L3','Permanent Address 3')
            ->setCellValue('M3','Permanent Address 3')
          	->setCellValue('N3','Permanent City')
			->setCellValue('O3','Permanent State')
			->setCellValue('P3','Permanent Country')
			->setCellValue('Q3','Present Address 1')
			->setCellValue('R3','Present Address 3')
			->setCellValue('S3','Present Address 3')
			->setCellValue('T3','Present City')
			->setCellValue('U3','Present State')
			->setCellValue('V3','Present Country')
            ->setCellValue('W3','Residence Phone No.')
            ->setCellValue('X3','Mobile No')
            ->setCellValue('Y3','Emergency Contact NO')
            ->setCellValue('Z3','Emergency Contact Person')
	        ->setCellValue('AA3','Email Id');


			
$tablename = "empl_master";
}
			
else if($selection1=='company_info')
{

$objPHPExcel->setActiveSheetIndex(0)
           ->setCellValue('A3','Emp No.')
		   ->setCellValue('B3','Employee Name')
			->setCellValue('C3','Joining Date')
			->setCellValue('D3','Company Change Effective Date')
			->setCellValue('E3','Designation')
            ->setCellValue('F3','Grade')
			->setCellValue('G3','Bank Branch Name')
            ->setCellValue('H3','Bank Account No.')
            ->setCellValue('I3','Basic')
			->setCellValue('J3','Dearness Pay')
			->setCellValue('K3','DA')
            ->setCellValue('L3','Hra')
			->setCellValue('M3','LTA')
            ->setCellValue('N3','Conveyance')
			->setCellValue('O3','Washing Allowance')
            ->setCellValue('P3','Gross Salary')
			->setCellValue('Q3','CTC')
          	->setCellValue('R3','PF Applicable')
			->setCellValue('S3','PF NO.')
			->setCellValue('T3','PF Date')
			->setCellValue('U3','Prof Tax Applicable')
			->setCellValue('V3','Gratuity Applicable')
			->setCellValue('W3','TDS Applicable')
			->setCellValue('X3','ESI Applicable')
			->setCellValue('Y3','Pension Fund Applicable')
			->setCellValue('Z3','Employement type')
			->setCellValue('AA3','Employee Category')
			->setCellValue('AB3','Date of Confirmation')
			->setCellValue('AC3','Date of Separation')
			->setCellValue('AD3','Type of Separation')
            ->setCellValue('AE3','Remark for Separation')
            ->setCellValue('AF3','Salary on joining')
            ->setCellValue('AG3','Mode of Payment');
           


	      

$tablename = "comp_details";
}

else if($selection1=='qualification_info')
{
$objPHPExcel->setActiveSheetIndex(0)
           ->setCellValue('A3','Emp No.')
		   ->setCellValue('B3','Employee Name')
			->setCellValue('C3','Sr.No.')
			->setCellValue('D3','Degree Title')
			->setCellValue('E3','Subject')
            ->setCellValue('F3','Year Of Passing')
			->setCellValue('G3','University')
            ->setCellValue('H3','State')
            ->setCellValue('I3','Country');

            
			
$tablename = "qualification";
}

else if($selection1=='experience_info')
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3','Emp No.')
			->setCellValue('B3','Employee Name')
			->setCellValue('C3','Sr No.')
			->setCellValue('D3','From Period')
			->setCellValue('E3','Upto Period')
            ->setCellValue('F3','Company Name')
			->setCellValue('G3','Designation')
            ->setCellValue('H3','Role Details');

           
			
$tablename = "experience";
}

else if($selection1=='family_info')
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3','Emp No.')
			->setCellValue('B3','Employee Name')
			->setCellValue('C3','Spouse Name')
			->setCellValue('D3','Spouse Contact No.')
			->setCellValue('E3','No Of Members')
            ->setCellValue('F3','No Of Dependents')
			->setCellValue('G3','Name')
			->setCellValue('H3','Relation')
			->setCellValue('I3','Age')
			->setCellValue('J3','Name of Gaurdian')
			->setCellValue('K3','Name')
			->setCellValue('L3','Relation')
            ->setCellValue('M3','Age')
			->setCellValue('N3','Name of Gaurdian');
$tablename = "family_info";
}


			
//mysql_connect('localhost', 'root', '');
//mysql_select_db('mam_system_appdb');



 $i = 4;
if($selection2 == 'all')
{

 	if($tablename == 'empl_master')
	{
	
	$sq = mysql_query("select * from empl_master");
	while($row = mysql_fetch_assoc($sq))
	{
     

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row['first_name'])
				->setCellValue('C'.$i,$row['middle_name'])
				->setCellValue('D'.$i,$row['last_name'])
				->setCellValue('E'.$i,$row['gender'])
				->setCellValue('F'.$i,$row['birth_date'])
				->setCellValue('G'.$i,$row['marital_status'])
				->setCellValue('H'.$i,$row['blood_group'])
				->setCellValue('I'.$i,$row['place_of_origin'])
				->setCellValue('J'.$i,$row['nationality'])
				->setCellValue('K'.$i,$row['permanent_addr_1'])
				->setCellValue('L'.$i,$row['permanent_addr_2'])
				->setCellValue('M'.$i,$row['permanent_addr_3'])
				->setCellValue('N'.$i,$row['permanent_city'])
				->setCellValue('O'.$i,$row['permanent_state'])
				->setCellValue('P'.$i,$row['permanent_country'])
				->setCellValue('Q'.$i,$row['present_addr_1'])
				->setCellValue('R'.$i,$row['present_addr_2'])
				->setCellValue('S'.$i,$row['present_addr_3'])
				->setCellValue('T'.$i,$row['present_city'])
				->setCellValue('U'.$i,$row['present_state'])
				->setCellValue('V'.$i,$row['present_country'])
				->setCellValue('W'.$i,$row['residence_phone_no'])
				->setCellValue('X'.$i,$row['mobile_no'])
				->setCellValue('Y'.$i,$row['emergency_contact_no'])
				->setCellValue('Z'.$i,$row['emergency_contact_person'])
		    	->setCellValue('AA'.$i,$row['email_id']);
			
			
				$i = $i + 1;
		}
		}
	else if($tablename == 'comp_details')
	{
	$sq = mysql_query("select * from comp_details");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['joining_date'])
				->setCellValue('D'.$i,$row['comp_change_eff_date'])
				->setCellValue('E'.$i,$row['designation'])
				->setCellValue('F'.$i,$row['grade'])
				->setCellValue('G'.$i,$row['bank_branch_name'])
				->setCellValue('H'.$i,$row['bank_account_no'])
				->setCellValue('I'.$i,$row['basic'])
				->setCellValue('J'.$i,$row['dearness_pay'])
				->setCellValue('K'.$i,$row['da'])
				->setCellValue('L'.$i,$row['hra'])
				->setCellValue('M'.$i,$row['lta'])
				->setCellValue('N'.$i,$row['conveyance'])
				->setCellValue('O'.$i,$row['special'])
				->setCellValue('P'.$i,$row['gross_salary'])
				->setCellValue('Q'.$i,$row['ctc'])
				->setCellValue('R'.$i,$row['pf_applicable'])
				->setCellValue('S'.$i,$row['pf_number'])
				->setCellValue('T'.$i,$row['pf_date'])
				->setCellValue('U'.$i,$row['prof_tax_applicable'])
				->setCellValue('V'.$i,$row['gratuity_applicable'])
				->setCellValue('W'.$i,$row['tds_applicable'])
				->setCellValue('X'.$i,$row['esi_applicable'])
				->setCellValue('Y'.$i,$row['pension_fund_applicable'])
				->setCellValue('Z'.$i,$row['emp_type'])
				->setCellValue('AA'.$i,$row['emp_cat'])
				->setCellValue('AB'.$i,$row['date_of_confirm'])
				->setCellValue('AC'.$i,$row['date_of_sepration'])
				->setCellValue('AD'.$i,$row['type_of_sep'])
				->setCellValue('AE'.$i,$row['remark_for_sepration'])
				->setCellValue('AF'.$i,$row['salary_on_joining'])
				->setCellValue('AG'.$i,$row['mode_of_payment']);
				
		    	
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'experience')
	{
	$sq = mysql_query("select * from experience");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{
  
	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['sr_no'])
				->setCellValue('D'.$i,$row['from_period'])
				->setCellValue('E'.$i,$row['upto_period'])
				->setCellValue('F'.$i,$row['company_name'])
				->setCellValue('G'.$i,$row['designation'])
				->setCellValue('H'.$i,$row['role_details']);
				
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'qualification')
	{
	
	$sq4 = mysql_query("select * from qualification");
	while($row4 = mysql_fetch_assoc($sq4))
	{
    $sq1 = mysql_query("select * from empl_master where employee_no='$row4[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{
   
	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row4['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row4['sr_no'])
				->setCellValue('D'.$i,$row4['degree_title'])
				->setCellValue('E'.$i,$row4['subject'])
				->setCellValue('F'.$i,$row4['year_of_passing'])
				->setCellValue('G'.$i,$row4['university'])
				->setCellValue('H'.$i,$row4['state'])
				->setCellValue('I'.$i,$row4['country']);
				
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'family_info')
	{
	$sq = mysql_query("select * from family_info");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['spouse_name'])
				->setCellValue('D'.$i,$row['spouse_contact_no'])
				->setCellValue('E'.$i,$row['no_of_members'])
				->setCellValue('F'.$i,$row['no_of_dependents'])
				->setCellValue('G'.$i,$row['name1'])
				->setCellValue('H'.$i,$row['relation1'])
				->setCellValue('I'.$i,$row['age1'])
				->setCellValue('J'.$i,$row['gaurdian_name1'])
			    ->setCellValue('K'.$i,$row['name2'])
				->setCellValue('L'.$i,$row['relation2'])
				->setCellValue('M'.$i,$row['age2'])
				->setCellValue('N'.$i,$row['gaurdian_name2']);
			
				$i = $i + 1;
		}
		}
		}
}

/////////////////////////////////////////////////////////////////////////////////////////

else if($selection2 == 'empno')
{
    $start = $_POST['frm_emp_no'];
	$end = $_POST['to_emp_no'];
	
 	if($tablename == 'empl_master')
	{
	
	
	$sq = mysql_query("select * from empl_master where employee_no between '$start' AND '$end'");
	while($row = mysql_fetch_assoc($sq))
	{ 

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row['first_name'])
				->setCellValue('C'.$i,$row['middle_name'])
				->setCellValue('D'.$i,$row['last_name'])
				->setCellValue('E'.$i,$row['gender'])
				->setCellValue('F'.$i,$row['birth_date'])
				->setCellValue('G'.$i,$row['marital_status'])
				->setCellValue('H'.$i,$row['blood_group'])
				->setCellValue('I'.$i,$row['place_of_origin'])
				->setCellValue('J'.$i,$row['nationality'])
				->setCellValue('K'.$i,$row['permanent_addr_1'])
				->setCellValue('L'.$i,$row['permanent_addr_2'])
				->setCellValue('M'.$i,$row['permanent_addr_3'])
				->setCellValue('N'.$i,$row['permanent_city'])
				->setCellValue('O'.$i,$row['permanent_state'])
				->setCellValue('P'.$i,$row['permanent_country'])
				->setCellValue('Q'.$i,$row['present_addr_1'])
				->setCellValue('R'.$i,$row['present_addr_2'])
				->setCellValue('S'.$i,$row['present_addr_3'])
				->setCellValue('T'.$i,$row['present_city'])
				->setCellValue('U'.$i,$row['present_state'])
				->setCellValue('V'.$i,$row['present_country'])
				->setCellValue('W'.$i,$row['residence_phone_no'])
				->setCellValue('X'.$i,$row['mobile_no'])
				->setCellValue('Y'.$i,$row['emergency_contact_no'])
				->setCellValue('Z'.$i,$row['emergency_contact_person'])
		    	->setCellValue('AA'.$i,$row['email_id']);
			
				$i = $i + 1;
		}
		}
	else if($tablename == 'comp_details')
	{
	$sq = mysql_query("select * from comp_details where employee_no between '$start' AND '$end'");
	while($row = mysql_fetch_assoc($sq))
	{
    $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['joining_date'])
				->setCellValue('D'.$i,$row['comp_change_eff_date'])
				->setCellValue('E'.$i,$row['designation'])
				->setCellValue('F'.$i,$row['grade'])
				->setCellValue('G'.$i,$row['bank_branch_name'])
				->setCellValue('H'.$i,$row['bank_account_no'])
				->setCellValue('I'.$i,$row['basic'])
				->setCellValue('J'.$i,$row['dearness_pay'])
				->setCellValue('K'.$i,$row['da'])
				->setCellValue('L'.$i,$row['hra'])
				->setCellValue('M'.$i,$row['lta'])
				->setCellValue('N'.$i,$row['conveyance'])
				->setCellValue('O'.$i,$row['special'])
				->setCellValue('P'.$i,$row['gross_salary'])
				->setCellValue('Q'.$i,$row['ctc'])
				->setCellValue('R'.$i,$row['pf_applicable'])
				->setCellValue('S'.$i,$row['pf_number'])
				->setCellValue('T'.$i,$row['pf_date'])
				->setCellValue('U'.$i,$row['prof_tax_applicable'])
				->setCellValue('V'.$i,$row['gratuity_applicable'])
				->setCellValue('W'.$i,$row['tds_applicable'])
				->setCellValue('X'.$i,$row['esi_applicable'])
				->setCellValue('Y'.$i,$row['pension_fund_applicable'])
				->setCellValue('Z'.$i,$row['emp_type'])
				->setCellValue('AA'.$i,$row['emp_cat'])
				->setCellValue('AB'.$i,$row['date_of_confirm'])
				->setCellValue('AC'.$i,$row['date_of_sepration'])
				->setCellValue('AD'.$i,$row['type_of_sep'])
				->setCellValue('AE'.$i,$row['remark_for_sepration'])
				->setCellValue('AF'.$i,$row['salary_on_joining'])
				->setCellValue('AG'.$i,$row['mode_of_payment']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'experience')
	{
	$sq = mysql_query("select * from experience where employee_no between '$start' AND '$end'");
	while($row = mysql_fetch_assoc($sq))
	{
  $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['sr_no'])
				->setCellValue('D'.$i,$row['from_period'])
				->setCellValue('E'.$i,$row['upto_period'])
				->setCellValue('F'.$i,$row['company_name'])
				->setCellValue('G'.$i,$row['designation'])
				->setCellValue('H'.$i,$row['role_details']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'qualification')
	{
	$sq = mysql_query("select * from qualification  where employee_no between '$start' AND '$end'");
	while($row = mysql_fetch_assoc($sq))
	{
    $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{
     
	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['sr_no'])
				->setCellValue('D'.$i,$row['degree_title'])
				->setCellValue('E'.$i,$row['subject'])
				->setCellValue('F'.$i,$row['year_of_passing'])
				->setCellValue('G'.$i,$row['university'])
				->setCellValue('H'.$i,$row['state'])
				->setCellValue('I'.$i,$row['country']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'family_info')
	{
	$sq = mysql_query("select * from family_info where employee_no between '$start' AND '$end'");
	while($row = mysql_fetch_assoc($sq))
	{
      $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['spouse_name'])
				->setCellValue('D'.$i,$row['spouse_contact_no'])
				->setCellValue('E'.$i,$row['no_of_members'])
				->setCellValue('F'.$i,$row['no_of_dependents'])
				->setCellValue('G'.$i,$row['name1'])
				->setCellValue('H'.$i,$row['relation1'])
				->setCellValue('I'.$i,$row['age1'])
				->setCellValue('J'.$i,$row['gaurdian_name1'])
			    ->setCellValue('K'.$i,$row['name2'])
				->setCellValue('L'.$i,$row['relation2'])
				->setCellValue('M'.$i,$row['age2'])
				->setCellValue('N'.$i,$row['gaurdian_name2']);
				$i = $i + 1;
		}
		}
		}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

else if($selection2 == 'grade')
{
 	
	$start = $_POST['frm_grade'];
	$end = $_POST['to_grade'];
	
$sql = mysql_query("select * from comp_details where grade between '$start' AND '$end'");
while($row1 = mysql_fetch_assoc($sql))
{

	if($tablename == 'empl_master')
	{
	$sq = mysql_query("select * from empl_master where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{ 

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row['first_name'])
				->setCellValue('C'.$i,$row['middle_name'])
				->setCellValue('D'.$i,$row['last_name'])
				->setCellValue('E'.$i,$row['gender'])
				->setCellValue('F'.$i,$row['birth_date'])
				->setCellValue('G'.$i,$row['marital_status'])
				->setCellValue('H'.$i,$row['blood_group'])
				->setCellValue('I'.$i,$row['place_of_origin'])
				->setCellValue('J'.$i,$row['nationality'])
				->setCellValue('K'.$i,$row['permanent_addr_1'])
				->setCellValue('L'.$i,$row['permanent_addr_2'])
				->setCellValue('M'.$i,$row['permanent_addr_3'])
				->setCellValue('N'.$i,$row['permanent_city'])
				->setCellValue('O'.$i,$row['permanent_state'])
				->setCellValue('P'.$i,$row['permanent_country'])
				->setCellValue('Q'.$i,$row['present_addr_1'])
				->setCellValue('R'.$i,$row['present_addr_2'])
				->setCellValue('S'.$i,$row['present_addr_3'])
				->setCellValue('T'.$i,$row['present_city'])
				->setCellValue('U'.$i,$row['present_state'])
				->setCellValue('V'.$i,$row['present_country'])
				->setCellValue('W'.$i,$row['residence_phone_no'])
				->setCellValue('X'.$i,$row['mobile_no'])
				->setCellValue('Y'.$i,$row['emergency_contact_no'])
				->setCellValue('Z'.$i,$row['emergency_contact_person'])
		    	->setCellValue('AA'.$i,$row['email_id']);
			
			
				$i = $i + 1;
		}
		}
	else if($tablename == 'comp_details')
	{
	$sq = mysql_query("select * from comp_details where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['joining_date'])
				->setCellValue('D'.$i,$row['comp_change_eff_date'])
				->setCellValue('E'.$i,$row['designation'])
				->setCellValue('F'.$i,$row['grade'])
				->setCellValue('G'.$i,$row['bank_branch_name'])
				->setCellValue('H'.$i,$row['bank_account_no'])
				->setCellValue('I'.$i,$row['basic'])
				->setCellValue('J'.$i,$row['dearness_pay'])
				->setCellValue('K'.$i,$row['da'])
				->setCellValue('L'.$i,$row['hra'])
				->setCellValue('M'.$i,$row['lta'])
				->setCellValue('N'.$i,$row['conveyance'])
				->setCellValue('O'.$i,$row['special'])
				->setCellValue('P'.$i,$row['gross_salary'])
				->setCellValue('Q'.$i,$row['ctc'])
				->setCellValue('R'.$i,$row['pf_applicable'])
				->setCellValue('S'.$i,$row['pf_number'])
				->setCellValue('T'.$i,$row['pf_date'])
				->setCellValue('U'.$i,$row['prof_tax_applicable'])
				->setCellValue('V'.$i,$row['gratuity_applicable'])
				->setCellValue('W'.$i,$row['tds_applicable'])
				->setCellValue('X'.$i,$row['esi_applicable'])
				->setCellValue('Y'.$i,$row['pension_fund_applicable'])
				->setCellValue('Z'.$i,$row['emp_type'])
				->setCellValue('AA'.$i,$row['emp_cat'])
				->setCellValue('AB'.$i,$row['date_of_confirm'])
				->setCellValue('AC'.$i,$row['date_of_sepration'])
				->setCellValue('AD'.$i,$row['type_of_sep'])
				->setCellValue('AE'.$i,$row['remark_for_sepration'])
				->setCellValue('AF'.$i,$row['salary_on_joining'])
				->setCellValue('AG'.$i,$row['mode_of_payment']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'experience')
	{
	$sq = mysql_query("select * from experience where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['sr_no'])
				->setCellValue('D'.$i,$row['from_period'])
				->setCellValue('E'.$i,$row['upto_period'])
				->setCellValue('F'.$i,$row['company_name'])
				->setCellValue('G'.$i,$row['designation'])
				->setCellValue('H'.$i,$row['role_details']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'qualification')
	{
	$sq = mysql_query("select * from qualification where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
    $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['sr_no'])
				->setCellValue('D'.$i,$row['degree_title'])
				->setCellValue('E'.$i,$row['subject'])
				->setCellValue('F'.$i,$row['year_of_passing'])
				->setCellValue('G'.$i,$row['university'])
				->setCellValue('H'.$i,$row['state'])
				->setCellValue('I'.$i,$row['country']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'family_info')
	{
	$sq = mysql_query("select * from family_info where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['spouse_name'])
				->setCellValue('D'.$i,$row['spouse_contact_no'])
				->setCellValue('E'.$i,$row['no_of_members'])
				->setCellValue('F'.$i,$row['no_of_dependents'])
				->setCellValue('G'.$i,$row['name1'])
				->setCellValue('H'.$i,$row['relation1'])
				->setCellValue('I'.$i,$row['age1'])
				->setCellValue('J'.$i,$row['gaurdian_name1'])
			    ->setCellValue('K'.$i,$row['name2'])
				->setCellValue('L'.$i,$row['relation2'])
				->setCellValue('M'.$i,$row['age2'])
				->setCellValue('N'.$i,$row['gaurdian_name2']);
			
				$i = $i + 1;
		}
		}
		}
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

else if($selection2 == 'date')
{
 	
	$start = $_POST['frm_join_date'];
	$end = $_POST['to_join_date'];
	
$sql = mysql_query("select * from comp_details where joining_date between '".@$start."' AND '".@$end."'");
while($row1 = mysql_fetch_assoc($sql))
{

	if($tablename == 'empl_master')
	{
	$sq = mysql_query("select * from empl_master where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{ 

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row['first_name'])
				->setCellValue('C'.$i,$row['middle_name'])
				->setCellValue('D'.$i,$row['last_name'])
				->setCellValue('E'.$i,$row['gender'])
				->setCellValue('F'.$i,$row['birth_date'])
				->setCellValue('G'.$i,$row['marital_status'])
				->setCellValue('H'.$i,$row['blood_group'])
				->setCellValue('I'.$i,$row['place_of_origin'])
				->setCellValue('J'.$i,$row['nationality'])
				->setCellValue('K'.$i,$row['permanent_addr_1'])
				->setCellValue('L'.$i,$row['permanent_addr_2'])
				->setCellValue('M'.$i,$row['permanent_addr_3'])
				->setCellValue('N'.$i,$row['permanent_city'])
				->setCellValue('O'.$i,$row['permanent_state'])
				->setCellValue('P'.$i,$row['permanent_country'])
				->setCellValue('Q'.$i,$row['present_addr_1'])
				->setCellValue('R'.$i,$row['present_addr_2'])
				->setCellValue('S'.$i,$row['present_addr_3'])
				->setCellValue('T'.$i,$row['present_city'])
				->setCellValue('U'.$i,$row['present_state'])
				->setCellValue('V'.$i,$row['present_country'])
				->setCellValue('W'.$i,$row['residence_phone_no'])
				->setCellValue('X'.$i,$row['mobile_no'])
				->setCellValue('Y'.$i,$row['emergency_contact_no'])
				->setCellValue('Z'.$i,$row['emergency_contact_person'])
		    	->setCellValue('AA'.$i,$row['email_id']);
			
			
				$i = $i + 1;
		}
		}
	else if($tablename == 'comp_details')
	{
	$sq = mysql_query("select * from comp_details where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['joining_date'])
				->setCellValue('D'.$i,$row['comp_change_eff_date'])
				->setCellValue('E'.$i,$row['designation'])
				->setCellValue('F'.$i,$row['grade'])
				->setCellValue('G'.$i,$row['bank_branch_name'])
				->setCellValue('H'.$i,$row['bank_account_no'])
				->setCellValue('I'.$i,$row['basic'])
				->setCellValue('J'.$i,$row['dearness_pay'])
				->setCellValue('K'.$i,$row['da'])
				->setCellValue('L'.$i,$row['hra'])
				->setCellValue('M'.$i,$row['lta'])
				->setCellValue('N'.$i,$row['conveyance'])
				->setCellValue('O'.$i,$row['special'])
				->setCellValue('P'.$i,$row['gross_salary'])
				->setCellValue('Q'.$i,$row['ctc'])
				->setCellValue('R'.$i,$row['pf_applicable'])
				->setCellValue('S'.$i,$row['pf_number'])
				->setCellValue('T'.$i,$row['pf_date'])
				->setCellValue('U'.$i,$row['prof_tax_applicable'])
				->setCellValue('V'.$i,$row['gratuity_applicable'])
				->setCellValue('W'.$i,$row['tds_applicable'])
				->setCellValue('X'.$i,$row['esi_applicable'])
				->setCellValue('Y'.$i,$row['pension_fund_applicable'])
				->setCellValue('Z'.$i,$row['emp_type'])
				->setCellValue('AA'.$i,$row['emp_cat'])
				->setCellValue('AB'.$i,$row['date_of_confirm'])
				->setCellValue('AC'.$i,$row['date_of_sepration'])
				->setCellValue('AD'.$i,$row['type_of_sep'])
				->setCellValue('AE'.$i,$row['remark_for_sepration'])
				->setCellValue('AF'.$i,$row['salary_on_joining'])
				->setCellValue('AG'.$i,$row['mode_of_payment']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'experience')
	{
	$sq = mysql_query("select * from experience where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
 
      $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{
	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['sr_no'])
				->setCellValue('D'.$i,$row['from_period'])
				->setCellValue('E'.$i,$row['upto_period'])
				->setCellValue('F'.$i,$row['company_name'])
				->setCellValue('G'.$i,$row['designation'])
				->setCellValue('H'.$i,$row['role_details']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'qualification')
	{
	$sq = mysql_query("select * from qualification where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

	$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['sr_no'])
				->setCellValue('D'.$i,$row['degree_title'])
				->setCellValue('E'.$i,$row['subject'])
				->setCellValue('F'.$i,$row['year_of_passing'])
				->setCellValue('G'.$i,$row['university'])
				->setCellValue('H'.$i,$row['state'])
				->setCellValue('I'.$i,$row['country']);
			
			
				$i = $i + 1;
		}
		}
		}
	else if($tablename == 'family_info')
	{
	$sq = mysql_query("select * from family_info where employee_no='$row1[employee_no]'");
	while($row = mysql_fetch_assoc($sq))
	{
     $sq1 = mysql_query("select * from empl_master where employee_no='$row[employee_no]'");
	while($row1 = mysql_fetch_assoc($sq1))
	{

$objPHPExcel->setActiveSheetIndex(0)
    	        ->setCellValue('A'.$i,$row['employee_no'])
				->setCellValue('B'.$i,$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'])
				->setCellValue('C'.$i,$row['spouse_name'])
				->setCellValue('D'.$i,$row['spouse_contact_no'])
				->setCellValue('E'.$i,$row['no_of_members'])
				->setCellValue('F'.$i,$row['no_of_dependents'])
				->setCellValue('G'.$i,$row['name1'])
				->setCellValue('H'.$i,$row['relation1'])
				->setCellValue('I'.$i,$row['age1'])
				->setCellValue('J'.$i,$row['gaurdian_name1'])
			    ->setCellValue('K'.$i,$row['name2'])
				->setCellValue('L'.$i,$row['relation2'])
				->setCellValue('M'.$i,$row['age2'])
				->setCellValue('N'.$i,$row['gaurdian_name2']);
				$i = $i + 1;
		}
		}
		}
	}
}

			
$objPHPExcel->getActiveSheet()->setTitle($selection1);

$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('I3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('J3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('K3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('L3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('M3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('N3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('O3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('P3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('Q3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('R3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('S3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('T3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('U3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('V3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('W3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('X3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('Y3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('Z3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AA3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AB3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AC3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AD3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AE3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AF3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AG3')->getFont()->setBold(true);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

header('Content-type: text/plain');
//open/save dialog box
header('Content-Disposition: attachment; filename="basic_info.xlsx"');
//read from server and write to buffer
readfile("basic_info.xlsx");
// Echo memory peak usage
echo date('H:i:s') . " Done writing file.\r\n";



?>