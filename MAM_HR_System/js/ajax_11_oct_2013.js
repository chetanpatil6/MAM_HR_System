function validatecreatedb()
{
	company_name = document.getElementById("txt_company_name").value;
	btn_createdb = document.getElementById("btn_create_db");
    if(company_name!='')
		{

			btn_createdb.disabled = true;
		}
		else
		{
		  	btn_createdb.disabled = false;
		}
}



function validateform()
{
var table = document.getElementById('dataTable1');
 var rowCount = table.rows.length;
				
for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
var e = document.getElementById('txt_emp_no4').value;	   
var objA1 = document.getElementById('btn_add_experience_info');
var a =  row.cells[2].childNodes[0].value;
var b =  row.cells[3].childNodes[0].value;
var c =  row.cells[4].childNodes[0].value;

if(a!='' && b!='' && c!=''&& e!='')
{
  objA1.disabled = true;
}
else
{
	objA1.disabled = false;
	return false;
}	
}
}


function validateform1()
{
var table = document.getElementById('dataTable');
var rowCount = table.rows.length;
	
for(var i=0; i<rowCount; i++) {

var row = table.rows[i];	
 var objA1 = document.getElementById('btn_add_education_info');
var e = document.getElementById('txt_emp_no3').value;
var a =  row.cells[2].childNodes[0].value;
var b =  row.cells[3].childNodes[0].value;
var c =  row.cells[4].childNodes[0].value;
var d =  row.cells[5].childNodes[0].value;


 if(a!='' && b!='' && c!='' && d!='' && e!='')
{

  objA1.disabled = true;

}
else
{
	objA1.disabled = false;
	return false;
}	
}
}



function validateform2()
{

var table = document.getElementById('tblgradecomp');
var rowCount = table.rows.length;
		
for(var i=0; i<rowCount; i++) {
var row = table.rows[i];

var objA1 = document.getElementById('btn_add_grade_wise_compensation');
var a = document.getElementById('txt_grade').value;	   
var b =  row.cells[2].childNodes[0].value;
var c =  row.cells[4].childNodes[0].value;
				
	   

if(a!='' && b!='select' && c!='')
{
 
	   objA1.disabled = true;	 
}
else
{
	objA1.disabled = false;
	
	return false;
}	
}


}



function validateform3()
{
var table = document.getElementById('tblbatchdtls');
 var rowCount = table.rows.length;
			
for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];

var objA1 = document.getElementById('btn_add_batch_details');
var a = document.getElementById('txt_batch_no').value;
var b = document.getElementById('txt_month_no').value;	
var c =  row.cells[1].childNodes[0].value;
var d =  row.cells[2].childNodes[0].value;
var e =  row.cells[3].childNodes[0].value;


if(a!='' && b!='select' && c!='select' && d!='select' && e!='' )
{
  objA1.disabled = true;
}
else
{
	objA1.disabled = false;
	return false;
}	
}
}


function validateform4()
{
var table = document.getElementById('empcomptable');
 var rowCount = table.rows.length;
			
for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];

var objA1 = document.getElementById('btn_add_emp_compensation');
var a = document.getElementById('txt_emp_code').value;	
var b =  row.cells[1].childNodes[0].value;
var c =  row.cells[2].childNodes[0].value;
var d =  row.cells[4].childNodes[0].value;


if(a!='select' && b!='select' && c!='' && d!='' )
{
  objA1.disabled = true;
}
else
{
	objA1.disabled = false;
	return false;
}	
}
}


function validateattendance()
{
var table = document.getElementById('attendancetable');
var rowCount = table.rows.length;
			
for(var i=0; i<rowCount; i++) {
var row = table.rows[i];

var objA1 = document.getElementById('btn_add_attendance');
var b =  row.cells[1].childNodes[0].value;
var c =  row.cells[2].childNodes[0].value;
var d =  row.cells[3].childNodes[0].value;


if(b!='select' && c!='select' && d!='' )
{
  objA1.disabled = true;
}
else
{
	objA1.disabled = false;
	return false;
}	
}
}

//Inset Personal Inforamtion
function add_personal_info(){
 		 var gender = '';
		 for (var i=0; i < document.personal_info.rdb_gender.length; i++)
  		 {
   			if (document.personal_info.rdb_gender[i].checked)
     		 {
       			 gender = document.personal_info.rdb_gender[i].value;
     		 }
   		}
		
		
    
  		 if(gender == '')
  		 {
    		 alert("Select Male or Female");
			 return false;
   		 }
	
	   var emp_no = $("#txt_emp_no1").val();
	   var emp_code = $("#txt_emp_code").val();
	   var punching_code = $("#txt_punching_code").val();
	   var first_name = $("#txt_first_name").val();
	   var middle_name = $("#txt_middle_name").val();
	   var last_name = $("#txt_last_name").val();
	  
	 var objA1 = document.getElementById('btn_add_personal_info');

var a = document.getElementById('txt_first_name').value;
var b = document.getElementById('txt_emp_no1').value;
var c = document.getElementById('txt_last_name').value;
var d = document.getElementById('txt_emp_code').value;


 if(a!=''  && c!='' && b!='' && d!='')
{
  objA1.disabled = true;

}
	  
	 // var gender = $("#gender").val();
	  for (var i=0; i < document.personal_info.rdb_gender.length; i++)
   {
   if (document.personal_info.rdb_gender[i].checked)
      {
      var gender = document.personal_info.rdb_gender[i].value;
      }
   }
	   var date_of_birth = $("#txt_date_of_birth").val();
	   var marital_status = $("#cmb_marital_status").val();
	   var blood_group = $("#txt_blood_group").val();
	   var place_of_origin = $("#txt_place_of_origin").val();
	   var nationality = $("#txt_nationality").val();
	   var permanent_addr_1 = $("#txt_permanent_addr_1").val();
	   var permanent_addr_2 = $("#txt_permanent_addr_2").val();
	   var permanent_addr_3 = $("#txt_permanent_addr_3").val();
	   var permanent_city = $("#txt_permanent_city").val();
	   var permanent_state = $("#txt_permanent_state").val();
	   var permanent_country = $("#txt_permanent_country").val();
	   var present_addr_1 = $("#txt_present_addr_1").val();
	   var present_addr_2 = $("#txt_present_addr_2").val();
	   var present_addr_3 = $("#txt_present_addr_3").val();
	   var present_city = $("#txt_present_city").val();
	   var present_state = $("#txt_present_state").val();
	   var present_country = $("#txt_present_country").val();
	   var residential_phone_no = $("#txt_residential_phone_no").val();
	   var mobile_no = $("#txt_mobile_no").val();
	   var emergency_contact_no = $("#txt_emergency_contact_no").val();
	   var emergency_contact_person = $("#txt_emergency_contact_person").val();
	   var email_id = $("#email_id").val();
	   var present_pin_code = $("#txt_present_pin_code").val();
	   var permanent_pin_code = $("#txt_permanent_pin_code").val();
	   
$.post('../controller/add_personal_info.php', {emp_no:emp_no, first_name:first_name, middle_name:middle_name, last_name:last_name, gender:gender, date_of_birth:date_of_birth, marital_status:marital_status,blood_group:blood_group, place_of_origin:place_of_origin, nationality:nationality, permanent_addr_1:permanent_addr_1, permanent_addr_2:permanent_addr_2, permanent_addr_3:permanent_addr_3, permanent_city:permanent_city, permanent_state:permanent_state,permanent_country:permanent_country,present_addr_1:present_addr_1,present_addr_2:present_addr_2,present_addr_3:present_addr_3,present_city:present_city,present_state:present_state,present_country:present_country,residential_phone_no:residential_phone_no,mobile_no:mobile_no,emergency_contact_no:emergency_contact_no,emergency_contact_person:emergency_contact_person,email_id:email_id,present_pin_code:present_pin_code,permanent_pin_code:permanent_pin_code, emp_code:emp_code, punching_code:punching_code}, function(data){
				$('#error1').text(data);
});
}

//Update Personal Inforamtion
function update_personal_info(){

	   var emp_no = $("#txt_emp_no1").val();
	   var emp_code = $("#txt_emp_code").val();
	   var punching_code = $("#txt_punching_code").val();
	   var first_name = $("#txt_first_name").val();
	   var middle_name = $("#txt_middle_name").val();
	   var last_name = $("#txt_last_name").val();
	  

for (var i=0; i < document.personal_info.rdb_gender.length; i++)
   {
   if (document.personal_info.rdb_gender[i].checked)
      {
      var gender = document.personal_info.rdb_gender[i].value;
      }
   }
   	
	   var date_of_birth = $("#txt_date_of_birth").val();
	   var marital_status = $("#cmb_marital_status").val();
	   var blood_group = $("#txt_blood_group").val();
	   var place_of_origin = $("#txt_place_of_origin").val();
	   var nationality = $("#txt_nationality").val();
	   var permanent_addr_1 = $("#txt_permanent_addr_1").val();
	   var permanent_addr_2 = $("#txt_permanent_addr_2").val();
	   var permanent_addr_3 = $("#txt_permanent_addr_3").val();
	   var permanent_city = $("#txt_permanent_city").val();
	   var permanent_state = $("#txt_permanent_state").val();
	   var permanent_country = $("#txt_permanent_country").val();
	   var present_addr_1 = $("#txt_present_addr_1").val();
	   var present_addr_2 = $("#txt_present_addr_2").val();
	   var present_addr_3 = $("#txt_present_addr_3").val();
	   var present_city = $("#txt_present_city").val();
	   var present_state = $("#txt_present_state").val();
	   var present_country = $("#txt_present_country").val();
	   var residential_phone_no = $("#txt_residential_phone_no").val();
	   var mobile_no = $("#txt_mobile_no").val();
	   var emergency_contact_no = $("#txt_emergency_contact_no").val();
	   var emergency_contact_person = $("#txt_emergency_contact_person").val();
	   var email_id = $("#email_id").val();
	   var present_pin_code = $("#txt_present_pin_code").val();
	   var permanent_pin_code = $("#txt_permanent_pin_code").val();
	   
$.post('../controller/update_personal_info.php', {emp_no:emp_no, first_name:first_name, middle_name:middle_name, last_name:last_name, gender:gender, date_of_birth:date_of_birth, marital_status:marital_status,blood_group:blood_group, place_of_origin:place_of_origin, nationality:nationality, permanent_addr_1:permanent_addr_1, permanent_addr_2:permanent_addr_2, permanent_addr_3:permanent_addr_3, permanent_city:permanent_city, permanent_state:permanent_state,permanent_country:permanent_country,present_addr_1:present_addr_1,present_addr_2:present_addr_2,present_addr_3:present_addr_3,present_city:present_city,present_state:present_state,present_country:present_country,residential_phone_no:residential_phone_no,mobile_no:mobile_no,emergency_contact_no:emergency_contact_no,emergency_contact_person:emergency_contact_person,email_id:email_id,present_pin_code:present_pin_code,permanent_pin_code:permanent_pin_code, emp_code:emp_code, punching_code:punching_code}, function(data){
				$('#error1').text(data);
});
}



//Inset company Inforamtion
function add_company_info(){


 var objA1 = document.getElementById('btn_add_personal_info');
 if(objA1.disabled == false)
 {
	 alert("Add Personal Info");
     return false;	 
 }

	 var pf = '';
		 for (var i=0; i < document.company_info.chk_pf_applicable.length; i++)
  		 {
   			if (document.company_info.chk_pf_applicable[i].checked)
     		 {
       			 pf = document.company_info.chk_pf_applicable[i].value;
     		 }
   		}
		
		
    
  		 if(pf == '')
  		 {
    		 alert("PF Applicable or Not");
			 return false;
   		 }
		
		 var tax = '';
		 for (var i=0; i < document.company_info.chk_prof_tax_applicable.length; i++)
  		 {
   			if (document.company_info.chk_prof_tax_applicable[i].checked)
     		 {
       			 tax = document.company_info.chk_prof_tax_applicable[i].value;
     		 }
   		}
		
		
    
  		 if(tax == '')
  		 {
    		 alert("Prof Tax Applicable or Not");
			 return false;
   		}
		
		 var esi = '';
		 for (var i=0; i < document.company_info.chk_esi_applicable.length; i++)
  		 {
   			if (document.company_info.chk_esi_applicable[i].checked)
     		 {
       			 esi = document.company_info.chk_esi_applicable[i].value;
     		 }
   		}
		
		
    
  		 if(esi == '')
  		 {
    		 alert("ESI Applicable or Not");
			 return false;
   		 }
		
		
		 var gratuity = '';
		 for (var i=0; i < document.company_info.chk_gratuity_applicable.length; i++)
  		 {
   			if (document.company_info.chk_gratuity_applicable[i].checked)
     		 {
       			 gratuity = document.company_info.chk_gratuity_applicable[i].value;
     		 }
   		}
		
		
    
  		 if(gratuity == '')
  		 {
    		 alert("Gratuity Applicable or Not");
			 return false;

   		 }
		
		var tds = '';
		 for (var i=0; i < document.company_info.chk_tds_applicable.length; i++)
  		 {
   			if (document.company_info.chk_tds_applicable[i].checked)
     		 {
       			 tds = document.company_info.chk_tds_applicable[i].value;
     		 }
   		}
		
		
    
  		 if(tds == '')
  		 {
    		 alert("TDS Applicable or Not");
			 return false;
   		}
		
		
		var fund = '';
		 for (var i=0; i < document.company_info.chk_pension_fund_applicable.length; i++)
  		 {
   			if (document.company_info.chk_pension_fund_applicable[i].checked)
     		 {
       			 fund = document.company_info.chk_pension_fund_applicable[i].value;
     		 }
   		}
		
		
    
  		 if(fund == '')
  		 {
    		 alert("Pension Fund Applicable or Not");
			 return false;
   		 }
		
	   var emp_no = $("#txt_emp_no2").val();
	   var date_of_joining = $("#txt_date_of_joining").val();
	   var comp_change_eff_date = $("#txt_comp_change_eff_date").val();
	   var designation = $("#txt_designation").val();
	   var grade = $("#txt_grade").val();
	   var basic = $("#txt_basic").val();
	   var hra = $("#txt_hra").val();
	   var special = $("#txt_special").val();
	   var conveyance = $("#txt_conveyance").val();
	   var lta = $("#txt_lta").val();
	   
	  
	   
var objA1 = document.getElementById('btn_add_company_info');

var a = document.getElementById('txt_emp_no2').value;
var b = document.getElementById('txt_date_of_joining').value;
       
	   


if(a!='' && b!='')
{
  objA1.disabled = true;
}

	   
 for (var i=0; i < document.company_info.chk_pf_applicable.length; i++)
   {
   if (document.company_info.chk_pf_applicable[i].checked)
      {
      var pf_applicable = document.company_info.chk_pf_applicable[i].value;
      }
   }
	   //var prof_tax_applicable = $("#chk_prof_tax_applicable").val();
	   for (var i=0; i < document.company_info.chk_prof_tax_applicable.length; i++)
   {
   if (document.company_info.chk_prof_tax_applicable[i].checked)
      {
      var prof_tax_applicable = document.company_info.chk_prof_tax_applicable[i].value;
      }
   }
	   
	  // var esi_applicable = $("#chk_esi_applicable").val();
	   for (var i=0; i < document.company_info.chk_esi_applicable.length; i++)
   {
   if (document.company_info.chk_esi_applicable[i].checked)
      {
      var esi_applicable = document.company_info.chk_esi_applicable[i].value;
      }
   }
   
    for (var i=0; i < document.company_info.chk_gratuity_applicable.length; i++)
   {
   if (document.company_info.chk_gratuity_applicable[i].checked)
      {
      var gratuity_applicable = document.company_info.chk_gratuity_applicable[i].value;
      }
   }
   
   
   for (var i=0; i < document.company_info.chk_tds_applicable.length; i++)
   {
   if (document.company_info.chk_tds_applicable[i].checked)
      {
      var tds_applicable = document.company_info.chk_tds_applicable[i].value;
      }
   }
   
    for (var i=0; i < document.company_info.chk_pension_fund_applicable.length; i++)
   {
   if (document.company_info.chk_pension_fund_applicable[i].checked)
      {
      var pension_fund_applicable = document.company_info.chk_pension_fund_applicable[i].value;
      }
   }
	   var bank_branch_name = $("#txt_bank_branch_name").val();
	   
	   var account_no = $("#txt_account_no").val();
	   var pf_no = $("#txt_pf_no").val();
	   var pf_date = $("#txt_pf_date").val();
	   var dearness_pay = $("#txt_dearness_pay").val();
	   var da = $("#txt_da").val();
	   var gross_salary = $("#txt_gross_salary").val();
	   var ctc = $("#txt_ctc").val();
	   var emp_type = $("#txt_emp_type").val();
	   var emp_cat = $("#txt_emp_cat").val();
	   var date_confirm = $("#txt_date_confirm").val();
	   var date_sep = $("#txt_date_sep").val();
	   var type_sep = $("#txt_type_of_sep").val();
	   var remark_sep = $("#txt_remarl_for_sep").val();
	   var salary_on_joining = $("#txt_salary_on_joining").val();
	   var mode_of_payment = $("#txt_mode_of_payment").val();
	   
	   var lic_acc_1 = $("#txt_lic_acc_no_1").val();
	   var lic_id_1 = $("#txt_lic_id_number_1").val();
	   var lic_gratuity_1 = $("#txt_lic_gratuity_number_1").val();
	   var lic_amt_1 = $("#txt_lic_amt_1").val();
	   
	   var lic_acc_2 = $("#txt_lic_acc_no_2").val();
	   var lic_id_2 = $("#txt_lic_id_number_2").val();
	   var lic_gratuity_2 = $("#txt_lic_gratuity_number_2").val();
	   var lic_amt_2 = $("#txt_lic_amt_2").val();
	   
	   var loan_acc_1 = $("#txt_loan_acc_no_1").val();
	   var loan_id_1 = $("#txt_loan_id_number_1").val();
	   var loan_gratuity_1 = $("#txt_loan_gratuity_number_1").val();
	   var loan_amt_1 = $("#txt_loan_amt_1").val();
	   
	   var loan_acc_2 = $("#txt_loan_acc_no_2").val();
	   var loan_id_2 = $("#txt_loan_id_number_2").val();
	   var loan_gratuity_2 = $("#txt_loan_gratuity_number_2").val();
	   var loan_amt_2 = $("#txt_loan_amt_2").val();
	   
$.post('../controller/add_company_info.php', {emp_no:emp_no,date_of_joining:date_of_joining, comp_change_eff_date:comp_change_eff_date, designation:designation,grade:grade, basic:basic, hra:hra, special:special, conveyance:conveyance,lta:lta, pf_applicable:pf_applicable, prof_tax_applicable:prof_tax_applicable, esi_applicable:esi_applicable,bank_branch_name:bank_branch_name,account_no:account_no,pf_no:pf_no,pf_date:pf_date,dearness_pay:dearness_pay,da:da,gross_salary:gross_salary,ctc:ctc,emp_type:emp_type,emp_cat:emp_cat,date_confirm:date_confirm,date_sep:date_sep,type_sep:type_sep,remark_sep:remark_sep,salary_on_joining:salary_on_joining,mode_of_payment:mode_of_payment,gratuity_applicable:gratuity_applicable,tds_applicable:tds_applicable,pension_fund_applicable:pension_fund_applicable, lic_acc_1:lic_acc_1, lic_amt_1:lic_amt_1, lic_acc_2:lic_acc_2, lic_amt_2:lic_amt_2, loan_acc_1:loan_acc_1, loan_amt_1:loan_amt_1, loan_acc_2:loan_acc_2, loan_amt_2:loan_amt_2, lic_id_1:lic_id_1, lic_id_2:lic_id_2, lic_gratuity_1:lic_gratuity_1, lic_gratuity_2:lic_gratuity_2, loan_id_1:loan_id_1, loan_gratuity_1:loan_gratuity_1, loan_id_2:loan_id_2, loan_gratuity_2:loan_gratuity_2}, function(data){
				$('#error2').text(data);
});
}

//Update Company Inforamtion
function update_company_info(){

	
	   var emp_no = $("#txt_emp_no2").val();
	   var date_of_joining = $("#txt_date_of_joining").val();
	   var comp_change_eff_date = $("#txt_comp_change_eff_date").val();
	   var designation = $("#txt_designation").val();
	   var grade = $("#txt_grade").val();
	   var basic = $("#txt_basic").val();
	   var hra = $("#txt_hra").val();
	   var special = $("#txt_special").val();
	   var conveyance = $("#txt_conveyance").val();
	   var lta = $("#txt_lta").val();
	  // var pf_applicable = $("#chk_pf_applicable").val();
	  // var prof_tax_applicable = $("#chk_prof_tax_applicable").val();
	   //var esi_applicable = $("#chk_esi_applicable").val();
	   
	    //var pf_applicable = $("#chk_pf_applicable").val();
	   
  for (var i=0; i < document.company_info.chk_pf_applicable.length; i++)
   {
   if (document.company_info.chk_pf_applicable[i].checked)
      {
      var pf_applicable = document.company_info.chk_pf_applicable[i].value;
      }
   }
	   //var prof_tax_applicable = $("#chk_prof_tax_applicable").val();
	   for (var i=0; i < document.company_info.chk_prof_tax_applicable.length; i++)
   {
   if (document.company_info.chk_prof_tax_applicable[i].checked)
      {
      var prof_tax_applicable = document.company_info.chk_prof_tax_applicable[i].value;
      }
   }
	   
	  // var esi_applicable = $("#chk_esi_applicable").val();
	   for (var i=0; i < document.company_info.chk_esi_applicable.length; i++)
   {
   if (document.company_info.chk_esi_applicable[i].checked)
      {
      var esi_applicable = document.company_info.chk_esi_applicable[i].value;
      }
   }
	   for (var i=0; i < document.company_info.chk_gratuity_applicable.length; i++)
   {
   if (document.company_info.chk_gratuity_applicable[i].checked)
      {
      var gratuity_applicable = document.company_info.chk_gratuity_applicable[i].value;
      }
   }
   
   
   for (var i=0; i < document.company_info.chk_tds_applicable.length; i++)
   {
   if (document.company_info.chk_tds_applicable[i].checked)
      {
      var tds_applicable = document.company_info.chk_tds_applicable[i].value;
      }
   }
   
    for (var i=0; i < document.company_info.chk_pension_fund_applicable.length; i++)
   {
   if (document.company_info.chk_pension_fund_applicable[i].checked)
      {
      var pension_fund_applicable = document.company_info.chk_pension_fund_applicable[i].value;
      }
   }
	   var bank_branch_name = $("#txt_bank_branch_name").val();
	   
	   var account_no = $("#txt_account_no").val();
	   var pf_no = $("#txt_pf_no").val();
	   var pf_date = $("#txt_pf_date").val();
	   var dearness_pay = $("#txt_dearness_pay").val();
	   var da = $("#txt_da").val();
	   var gross_salary = $("#txt_gross_salary").val();
	   var ctc = $("#txt_ctc").val();
	   var emp_type = $("#txt_emp_type").val();
	   var emp_cat = $("#txt_emp_cat").val();
	   var date_confirm = $("#txt_date_confirm").val();
	   var date_sep = $("#txt_date_sep").val();
	   var type_sep = $("#txt_type_of_sep").val();
	   var remark_sep = $("#txt_remarl_for_sep").val();
	   var salary_on_joining = $("#txt_salary_on_joining").val();
	   var mode_of_payment = $("#txt_mode_of_payment").val();
	   
	   var lic_acc_1 = $("#txt_lic_acc_no_1").val();
	   var lic_id_1 = $("#txt_lic_id_number_1").val();
	   var lic_gratuity_1 = $("#txt_lic_gratuity_number_1").val();
	   var lic_amt_1 = $("#txt_lic_amt_1").val();
	   
	   var lic_acc_2 = $("#txt_lic_acc_no_2").val();
	   var lic_id_2 = $("#txt_lic_id_number_2").val();
	   var lic_gratuity_2 = $("#txt_lic_gratuity_number_2").val();
	   var lic_amt_2 = $("#txt_lic_amt_2").val();
	   
	   var loan_acc_1 = $("#txt_loan_acc_no_1").val();
	   var loan_id_1 = $("#txt_loan_id_number_1").val();
	   var loan_gratuity_1 = $("#txt_loan_gratuity_number_1").val();
	   var loan_amt_1 = $("#txt_loan_amt_1").val();
	   
	   var loan_acc_2 = $("#txt_loan_acc_no_2").val();
	   var loan_id_2 = $("#txt_loan_id_number_2").val();
	   var loan_gratuity_2 = $("#txt_loan_gratuity_number_2").val();
	   var loan_amt_2 = $("#txt_loan_amt_2").val();
		
	   
$.post('../controller/update_company_info.php', {emp_no:emp_no, date_of_joining:date_of_joining, comp_change_eff_date:comp_change_eff_date, designation:designation,grade:grade, basic:basic, hra:hra, special:special, conveyance:conveyance,lta:lta, pf_applicable:pf_applicable, prof_tax_applicable:prof_tax_applicable, esi_applicable:esi_applicable,bank_branch_name:bank_branch_name, account_no:account_no, pf_no:pf_no, pf_date:pf_date, dearness_pay:dearness_pay, da:da, gross_salary:gross_salary, ctc:ctc, emp_type:emp_type,emp_cat:emp_cat, date_confirm:date_confirm, date_sep:date_sep ,type_sep:type_sep, remark_sep:remark_sep,salary_on_joining:salary_on_joining,mode_of_payment:mode_of_payment,gratuity_applicable:gratuity_applicable,tds_applicable:tds_applicable,pension_fund_applicable:pension_fund_applicable, lic_acc_1:lic_acc_1, lic_amt_1:lic_amt_1, lic_acc_2:lic_acc_2, lic_amt_2:lic_amt_2, loan_acc_1:loan_acc_1, loan_amt_1:loan_amt_1, loan_acc_2:loan_acc_2, loan_amt_2:loan_amt_2, lic_id_1:lic_id_1, lic_id_2:lic_id_2, lic_gratuity_1:lic_gratuity_1, lic_gratuity_2:lic_gratuity_2, loan_id_1:loan_id_1, loan_gratuity_1:loan_gratuity_1, loan_id_2:loan_id_2, loan_gratuity_2:loan_gratuity_2}, function(data){
				$('#error2').text(data);
});
}



//Inset Education Inforamtion
function add_education_info(){

 var objA1 = document.getElementById('btn_add_personal_info');
 if(objA1.disabled == false)
 {
	alert("Add Personal Info");
    return false;	 
 }

       
	   var emp_no = $("#txt_emp_no3").val();
	  validateform1();
	  
	   var table = document.getElementById('dataTable');
        var rowCount = table.rows.length;
		
			
		var sr_no = new Array();
		var degree_title = new Array();
		var subject = new Array();
		var year_of_passing = new Array();
		var university = new Array();
		var state = new Array();
		var country = new Array();
		
	    for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
	   
	  

	 
				var txtBox1 = row.cells[1].childNodes[0].value;
				var txtBox2 = row.cells[2].childNodes[0].value;
				var txtBox3 = row.cells[3].childNodes[0].value;
				var txtBox4 = row.cells[4].childNodes[0].value;
				var txtBox5 = row.cells[5].childNodes[0].value;
				var txtBox6 = row.cells[6].childNodes[0].value;
				var txtBox7 = row.cells[7].childNodes[0].value;
				
				
				  sr_no.push(txtBox1);
				  degree_title.push(txtBox2);
				  subject.push(txtBox3);
				  year_of_passing.push(txtBox4);
				  university.push(txtBox5);
				  state.push(txtBox6);
				  country.push(txtBox7);
				  
		}
		
		
$.post('../controller/add_education_info.php', {emp_no:emp_no,'sr_no[]':sr_no, 'degree_title[]':degree_title, 'subject[]':subject,'year_of_passing[]':year_of_passing, 'university[]':university, 'state[]':state, 'country[]':country}, function(data){
				$('#error3').text(data);
});
}

//Update Education Inforamtion
function update_education_info(){

	
	    var emp_no = $("#txt_emp_no3").val();
	  
	  
	   var table = document.getElementById('dataTable');
        var rowCount = table.rows.length;
		
			
		var sr_no = new Array();
		var degree_title = new Array();
		var subject = new Array();
		var year_of_passing = new Array();
		var university = new Array();
		var state = new Array();
		var country = new Array();
		
	    for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
	   
	 
				var txtBox1 = row.cells[1].childNodes[0].value;
				var txtBox2 = row.cells[2].childNodes[0].value;
				var txtBox3 = row.cells[3].childNodes[0].value;
				var txtBox4 = row.cells[4].childNodes[0].value;
				var txtBox5 = row.cells[5].childNodes[0].value;
				var txtBox6 = row.cells[6].childNodes[0].value;
				var txtBox7 = row.cells[7].childNodes[0].value;
				
				
				  sr_no.push(txtBox1);
				  degree_title.push(txtBox2);
				  subject.push(txtBox3);
				  year_of_passing.push(txtBox4);
				  university.push(txtBox5);
				  state.push(txtBox6);
				  country.push(txtBox7);
				  
		}
		
		
$.post('../controller/add_education_info.php', {emp_no:emp_no,'sr_no[]':sr_no, 'degree_title[]':degree_title, 'subject[]':subject,'year_of_passing[]':year_of_passing, 'university[]':university, 'state[]':state, 'country[]':country}, function(data){
				$('#error3').text(data);
});
}



//Inset Experience
function add_experience(){

 var objA1 = document.getElementById('btn_add_personal_info');
 if(objA1.disabled == false)
 {
	alert("Add Personal Info");
    return false;	 
 }

	
	   var emp_no = $("#txt_emp_no4").val();
	  
	  validateform();
	  var table = document.getElementById('dataTable1');
       var rowCount = table.rows.length;
		
	    
		var sr_no = new Array();
		
		var company_name = new Array();
		var designation = new Array();
		var from_period = new Array();
		var upto_period = new Array();
		var role_details = new Array();
		
		
		for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
		
	    
				var txtBox1 = row.cells[1].childNodes[0].value;
				var txtBox2 = row.cells[2].childNodes[0].value;
				var txtBox3 = row.cells[3].childNodes[0].value;
				var txtBox4 = row.cells[4].childNodes[0].value;
				var txtBox5 = row.cells[5].childNodes[0].value;
				var txtBox6 = row.cells[6].childNodes[0].value;
			
				
				  sr_no.push(txtBox1);
			      company_name.push(txtBox2);
				  designation.push(txtBox3);
				  from_period.push(txtBox4);
				  upto_period.push(txtBox5);
				  role_details.push(txtBox6);
			
		}
$.post('../controller/add_experience.php', {emp_no:emp_no,'sr_no[]':sr_no, 'from_period[]':from_period, 'upto_period[]':upto_period,'company_name[]':company_name, 'designation[]':designation, 'role_details[]':role_details}, function(data){
				$('#error4').text(data);
});
}

//Update experience
function update_experience(){

	
	  var emp_no = $("#txt_emp_no4").val();
	  
	  
	  var table = document.getElementById('dataTable1');
      var rowCount = table.rows.length;
		
	    
		var sr_no = new Array();
		var company_name = new Array();
		var designation = new Array();
		var from_period = new Array();
		var upto_period = new Array();
		var role_details = new Array();
		
	    for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
	   
	 
				var txtBox1 = row.cells[1].childNodes[0].value;
				var txtBox2 = row.cells[2].childNodes[0].value;
				var txtBox3 = row.cells[3].childNodes[0].value;
				var txtBox4 = row.cells[4].childNodes[0].value;
				var txtBox5 = row.cells[5].childNodes[0].value;
				var txtBox6 = row.cells[6].childNodes[0].value;
			
				
				  sr_no.push(txtBox1);
				  company_name.push(txtBox2);
				  designation.push(txtBox3);
				  from_period.push(txtBox4);
				  upto_period.push(txtBox5);
				  role_details.push(txtBox6);
			
		}
$.post('../controller/add_experience.php', {emp_no:emp_no, 'sr_no[]':sr_no, 'from_period[]':from_period, 'upto_period[]':upto_period, 'company_name[]':company_name, 'designation[]':designation, 'role_details[]':role_details}, function(data){
				$('#error4').text(data);
});
}


//Inset Family Information
function add_family_info(){

	
 var objA1 = document.getElementById('btn_add_personal_info');
 if(objA1.disabled == false)
 {
	 alert("Add Personal Info");
    return false;	 
 }

	   var emp_no = $("#txt_emp_no5").val();
	   var spouse_Name = $("#txt_spouse_Name").val();
	   var spouse_contact_no = $("#txt_spouse_contact_no").val();
	   var no_of_family_member = $("#txt_no_of_family_member").val();
	   var no_of_dependents = $("#txt_no_of_dependents").val();
	   
	    var name1 = $("#txt_name1").val();
       var relation1 = $("#txt_relation1").val();
	   var age1 = $("#txt_age1").val();
	   var gaurdian1 = $("#txt_name_of_gaurdian1").val();
	   
	   var name2 = $("#txt_name2").val();
       var relation2 = $("#txt_relation2").val();
	   var age2 = $("#txt_age2").val();
	   var gaurdian2 = $("#txt_name_of_gaurdian2").val();
	   
	  var objA1 = document.getElementById('btn_add_family_info');
var a = document.getElementById('txt_emp_no5').value;
var b = document.getElementById('txt_spouse_Name').value;

if(a!='' && b!='')
{
  objA1.disabled = true;

}

	  
	  
	   
$.post('../controller/add_family_info.php', {emp_no:emp_no,spouse_Name:spouse_Name, spouse_contact_no:spouse_contact_no, no_of_family_member:no_of_family_member,no_of_dependents:no_of_dependents,name1:name1,relation1:relation1,age1:age1,gaurdian1:gaurdian1,name2:name2,relation2:relation2,age2:age2,gaurdian2:gaurdian2}, function(data){
				$('#error5').text(data);
});
}

//Update family Inforamtion
function update_family_info(){

	  var emp_no = $("#txt_emp_no5").val();
	   var spouse_Name = $("#txt_spouse_Name").val();
	   var spouse_contact_no = $("#txt_spouse_contact_no").val();
	   var no_of_family_member = $("#txt_no_of_family_member").val();
	   var no_of_dependents = $("#txt_no_of_dependents").val();
	   
	   var name1 = $("#txt_name1").val();
       var relation1 = $("#txt_relation1").val();
	   var age1 = $("#txt_age1").val();
	   var gaurdian1 = $("#txt_name_of_gaurdian1").val();
	   
	   var name2 = $("#txt_name2").val();
       var relation2 = $("#txt_relation2").val();
	   var age2 = $("#txt_age2").val();
	   var gaurdian2 = $("#txt_name_of_gaurdian2").val();
	   
$.post('../controller/update_family_info.php', {emp_no:emp_no,spouse_Name:spouse_Name, spouse_contact_no:spouse_contact_no, no_of_family_member:no_of_family_member,no_of_dependents:no_of_dependents,name1:name1,relation1:relation1,age1:age1,gaurdian1:gaurdian1,name2:name2,relation2:relation2,age2:age2,gaurdian2:gaurdian2}, function(data){
				$('#error5').text(data);
});
}


//Inset User Role
function add_user_role(){
	
	
	
      var table = document.getElementById('dataTable');
      var rowCount = table.rows.length;
		
	    
		var emp_no = new Array();
		var role = new Array();
	
		
	           for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
	   
	 
				var txtBox1 = row.cells[2].childNodes[0].value;
				var txtBox2 = row.cells[3].childNodes[0].value;
	  
	              emp_no.push(txtBox1);
				  role.push(txtBox2);


				}
	   
$.post('../controller/add_user_role.php',{'emp_no[]':emp_no,'role[]':role}, function(data){
				$('#error').text(data);
});
}

//Inset User 
function add_user(){
	
	
	
      var table = document.getElementById('dataTable');
      var rowCount = table.rows.length;
		
	    
		var emp_no = new Array();
		var password = new Array();
		var role = new Array();
	
		
	           for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
	   
	 
				var txtBox1 = row.cells[2].childNodes[0].value;
				var txtBox2 = row.cells[3].childNodes[0].value;
	            var txtBox3 = row.cells[4].childNodes[0].value;
	              
				  emp_no.push(txtBox1);
				  password.push(txtBox2);
				  role.push(txtBox3);


				}
	   
$.post('../controller/add_user.php',{'emp_no[]':emp_no,'password[]':password,'role[]':role}, function(data){
				$('#error').text(data);
});
}



function changepassword(){
		
	var uname = $("#txt_uname").val();
	var currentpass = $("#txt_current_password").val();
	var changepass = $("#txt_change_password").val();
	var confirmpass = $("#txt_confirm_password").val();

  
	$.post('../controller/changepassword.php', {uname:uname, currentpass:currentpass, changepass:changepass, confirmpass:confirmpass}, function(data){
				$('#error').text(data);
});
}



function change_user_role(){

	var emp_id = $("#txt_emp_id").val();
	var role = $("#txt_role").val();
	

  
	$.post('../controller/change_user_role.php', {emp_id:emp_id,role:role}, function(data){
				$('#error').text(data);
});
}


//Insert info
function addinfo(){

	 var name = $("#txt_comp_name").val();
	   var address1 = $("#txt_comp_address1").val();
	   var address2 = $("#txt_comp_address2").val();
	   var address3 = $("#txt_comp_address3").val();
	   var address4 = $("#txt_comp_address4").val();
	   var city = $("#txt_city").val();
	   var pin_code = $("#txt_pin_code").val();
	   var state = $("#txt_state").val();
	   var country = $("#txt_country").val();
	   var phone_number = $("#txt_phone_number").val();
	   var landline = $("#txt_landline").val();
	   var email = $("#txt_email").val();
	   var alternate_email = $("#txt_email1").val();
	   
	   var vat_no = $("#txt_vat_no").val();
	   var cst_no= $("#txt_cst_no").val();
	   var service_tax_no = $("#txt_service_tax_no").val();
	   var income_tax_no = $("#txt_inco_tax_no").val();
	   var pan_no= $("#txt_pan_no").val();
	   var accessee_code= $("#txt_acc_no").val();
	   var certificate_no = $("#txt_cert_no").val();
	   var rate_of_duty= $("#txt_rate_of_duty").val();
	   var exicise_regn_no = $("#txt_exicise_regn_no").val();
	   var exicise_range = $("#txt_exicise_range").val();
	   var exicise_div = $("#txt_exicise_div").val();	
		var commissionorate = $("#txt_commissionorate").val();
	   var pla_ac_no = $("#txt_pla_ac_no").val();
	   
	   var sign1 = $("#txt_signature_1").val();	
	   var sign2 = $("#txt_signature_2").val();
	   var sign3 = $("#txt_signature_3").val();


 $.post('../controller/addinfo.php', {name:name, address1:address1, address2:address2, address3:address3, address4:address4, city:city, pin_code:pin_code, state:state, country:country, phone_number:phone_number, landline:landline, email:email, alternate_email:alternate_email, vat_no:vat_no, cst_no:cst_no, service_tax_no:service_tax_no ,income_tax_no:income_tax_no, pan_no:pan_no,accessee_code:accessee_code, certificate_no:certificate_no, rate_of_duty:rate_of_duty, exicise_regn_no:exicise_regn_no,exicise_range:exicise_range,exicise_div:exicise_div,commissionorate:commissionorate, pla_ac_no:pla_ac_no, sign1:sign1, sign2:sign2, sign3:sign3}, function(data){
				$('#error').text(data);
});
}
//Insert info
function updateinfo(){

      
	   var name = $("#txt_comp_name").val();
	   var address1 = $("#txt_comp_address1").val();
	   var address2 = $("#txt_comp_address2").val();
	   var address3 = $("#txt_comp_address3").val();
	   var address4 = $("#txt_comp_address4").val();
	   var city = $("#txt_city").val();
	   var pin_code = $("#txt_pin_code").val();
	   var state = $("#txt_state").val();
	   var country = $("#txt_country").val();
	   var phone_number = $("#txt_phone_number").val();
	   var landline = $("#txt_landline").val();
	   var email = $("#txt_email").val();
	   var alternate_email = $("#txt_email1").val();
	   
	   var vat_no = $("#txt_vat_no").val();
	   var cst_no= $("#txt_cst_no").val();
	   var service_tax_no = $("#txt_service_tax_no").val();
	   var income_tax_no = $("#txt_inco_tax_no").val();
	   var pan_no= $("#txt_pan_no").val();
	   var accessee_code= $("#txt_acc_no").val();
	   var certificate_no = $("#txt_cert_no").val();
	   var rate_of_duty= $("#txt_rate_of_duty").val();
	   var exicise_regn_no = $("#txt_exicise_regn_no").val();
	   var exicise_range = $("#txt_exicise_range").val();
	   var exicise_div = $("#txt_exicise_div").val();	
	   var commissionorate = $("#txt_commissionorate").val();
	   var pla_ac_no = $("#txt_pla_ac_no").val();
	   
	   var sign1 = $("#txt_signature_1").val();	
	   var sign2 = $("#txt_signature_2").val();
	   var sign3 = $("#txt_signature_3").val();
		 
$.post('../controller/addinfo.php', {name:name, address1:address1, address2:address2, address3:address3, address4:address4, city:city, pin_code:pin_code, state:state, country:country, phone_number:phone_number, landline:landline, email:email, alternate_email:alternate_email, vat_no:vat_no, cst_no:cst_no, service_tax_no:service_tax_no ,income_tax_no:income_tax_no, pan_no:pan_no,accessee_code:accessee_code, certificate_no:certificate_no, rate_of_duty:rate_of_duty, exicise_regn_no:exicise_regn_no,exicise_range:exicise_range,exicise_div:exicise_div,commissionorate:commissionorate, pla_ac_no:pla_ac_no, sign1:sign1, sign2:sign2, sign3:sign3}, function(data){
				$('#error').text(data);
});
}


function createdb(){

        validatecreatedb();
		
		var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
	for (var i = 0; i < document.login.txt_company_name.value.length; i++) {
    if (iChars.indexOf(document.login.txt_company_name.value.charAt(i)) != -1) {
    alert ("The box has special characters. \nThese are not allowed.\n");
	btn_createdb = document.getElementById("btn_create_db");
	btn_createdb.disabled = false;
    return false;
        }
    }
	
	    var company_name = $("#txt_company_name").val();
		var dbname = $("#txt_database_name").val();
		
		    var payroll = '';
   			if (document.login.chk_payroll.checked == true)
     		 {
       			 payroll = document.login.chk_payroll.value;
     		 }
		
		

$.post('../controller/addnewconnection.php', {company_name:company_name, 'dbname':dbname, payroll:payroll}, function(data){
				$('#error').text(data);
});
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Inset Compensation Heads Info
function add_compensation_heads(){
 		 
	
	   var comp_code = $("#txt_comp_code").val();
	   var code_name = $("#txt_code_name").val();
	   var code_desc = $("#txt_code_desc").val();
	   
	   
	   var when_to_pay = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_when_to_pay.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_when_to_pay[i].checked)
     		 {
       			 when_to_pay = document.frm_comensation_heads.rdb_when_to_pay[i].value;
     		 }
   		}
		
		
    
  		 if(when_to_pay == '')
  		 {
    		 alert("When to pay this code");
			 return false;
   		}
		
		var pf_Compute = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_pf_Compute.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_pf_Compute[i].checked)
     		 {
       			 pf_Compute = document.frm_comensation_heads.rdb_pf_Compute[i].value;
     		 }
   		}
		
		
    
  		 if(pf_Compute == '')
  		 {
    		 alert("Select PF Computation Yes Or No");
			 return false;
   		}
		
		var pt_Compute = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_pt_Compute.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_pt_Compute[i].checked)
     		 {
       			 pt_Compute = document.frm_comensation_heads.rdb_pt_Compute[i].value;
     		 }
   		}
		
		
    
  		 if(pt_Compute == '')
  		 {
    		 alert("Select Prof Tax Computation Yes Or No");
			 return false;
   		}
		
		var esi_Compute = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_esi_Compute.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_esi_Compute[i].checked)
     		 {
       			 esi_Compute = document.frm_comensation_heads.rdb_esi_Compute[i].value;
     		 }
   		}
		
		
    
  		 if(esi_Compute == '')
  		 {
    		 alert("Select ESI Tax Computation Yes Or No");
			 return false;
   		}
		
		
	  
	  
var objA1 = document.getElementById('btn_add_compensation_heads');

var a = document.getElementById('txt_comp_code').value;
var b = document.getElementById('txt_code_name').value;


if(a!='' && b!='' )
{
  objA1.disabled = true;
}
	
	   
$.post('../controller/add_compensation_heads.php', {comp_code:comp_code, code_name:code_name, code_desc:code_desc, when_to_pay:when_to_pay, pf_Compute:pf_Compute, pt_Compute:pt_Compute, esi_Compute:esi_Compute}, function(data){
				$('#error1').text(data);
});
}




//Inset Compensation Heads Info
function update_compensation_heads(){
 	
	
	   var comp_code = $("#txt_comp_code").val();
	   var code_name = $("#txt_code_name").val();
	   var code_desc = $("#txt_code_desc").val();
	   
	   
	   var when_to_pay = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_when_to_pay.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_when_to_pay[i].checked)
     		 {
       			 when_to_pay = document.frm_comensation_heads.rdb_when_to_pay[i].value;
     		 }
   		}
		
		
    
  		 if(when_to_pay == '')
  		 {
    		 alert("When to pay this code");
			 return false;
   		}
		
		var pf_Compute = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_pf_Compute.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_pf_Compute[i].checked)
     		 {
       			 pf_Compute = document.frm_comensation_heads.rdb_pf_Compute[i].value;
     		 }
   		}
		
		
    
  		 if(pf_Compute == '')
  		 {
    		 alert("Select PF Computation Yes Or No");
			 return false;
   		}
		
		var pt_Compute = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_pt_Compute.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_pt_Compute[i].checked)
     		 {
       			 pt_Compute = document.frm_comensation_heads.rdb_pt_Compute[i].value;
     		 }
   		}
		
		
    
  		 if(pt_Compute == '')
  		 {
    		 alert("Select Prof Tax Computation Yes Or No");
			 return false;
   		}
		
		var esi_Compute = '';
		 for (var i=0; i < document.frm_comensation_heads.rdb_esi_Compute.length; i++)
  		 {
   			if (document.frm_comensation_heads.rdb_esi_Compute[i].checked)
     		 {
       			 esi_Compute = document.frm_comensation_heads.rdb_esi_Compute[i].value;
     		 }
   		}
		
		
    
  		 if(esi_Compute == '')
  		 {
    		 alert("Select ESI Tax Computation Yes Or No");
			 return false;
   		}
		
		
		
	  
	  
	   
$.post('../controller/update_compensation_heads.php',{comp_code:comp_code, code_name:code_name, code_desc:code_desc, when_to_pay:when_to_pay, pf_Compute:pf_Compute, pt_Compute:pt_Compute, esi_Compute:esi_Compute}, function(data){
				$('#error1').text(data);
});
}


function add_emp_compensation(){
 		 
	
	  var emp_code = $("#txt_emp_code").val();
	  validateform4();
	   
	 var comp_code = new Array();
	 var comp_change_eff_date = new Array();
	 var amount = new Array();
	 
	 
		var table = document.getElementById('empcomptable');
 		var rowCount = table.rows.length;
				
		for(var i=0; i<rowCount; i++) {
               	 var row = table.rows[i];
		var txtBox1 = row.cells[1].childNodes[0].value;
		for(var s=0;s<comp_code.length;s++)
				 {
				   	if(comp_code[s] == txtBox1)
					{
					 alert("Duplicate Compensation Code");
					 var objA1 = document.getElementById('btn_add_emp_compensation');
					 objA1.disabled = false;
					 return false;
					}
				 }
		var txtBox2 = row.cells[2].childNodes[0].value;
		var txtBox3 = row.cells[4].childNodes[0].value;	
		
		comp_code.push(txtBox1);
		comp_change_eff_date.push(txtBox2);
		amount.push(txtBox3);
		}
	  
	  
 	
	
	   
$.post('../controller/add_emp_compensation.php',{emp_code:emp_code, 'comp_code[]':comp_code, 'comp_change_eff_date[]':comp_change_eff_date, 'amount[]':amount}, function(data){
				$('#error2').text(data);
});
}


function update_emp_compensation(){
 		 
	
	   var emp_code = $("#txt_emp_code").val();
	   var comp_code = new Array();
	   var comp_change_eff_date = new Array();
	   var amount = new Array();
	   
	 
		var table = document.getElementById('empcomptable');
 		var rowCount = table.rows.length;
				
		for(var i=1; i<=rowCount; i++) {
		  	var a = $("#txt_comp_code"+i).val();
			var b = $("#txt_comp_change_eff_date"+i).val();
			var c = $("#txt_amount"+i).val();
			
			comp_code.push(a);
			comp_change_eff_date.push(b);
			amount.push(c);
		}
	  
	  
 
	
	   
$.post('../controller/update_emp_compensation.php',{emp_code:emp_code, 'comp_code[]':comp_code, 'comp_change_eff_date[]':comp_change_eff_date, 'amount[]':amount}, function(data){
				$('#error2').text(data);
});
}


function add_grade_wise_compensation(){
 		 
	
	   var grade = $("#txt_grade").val();
	   validateform2();
	   var compe_code = new Array();
	   var amounts = new Array();
	   
	   var table = document.getElementById('tblgradecomp');
 	   var rowCount = table.rows.length;
				
	   for(var i=0; i<rowCount; i++) {
		   
			var row = table.rows[i];
			var txtBox1 = row.cells[2].childNodes[0].value;
			var txtBox2 = row.cells[4].childNodes[0].value;
			
			for(var s=0;s<compe_code.length;s++)
				 {
				   	if(compe_code[s] == txtBox1)
					{
					  alert("Duplicate Compensation Code");
					  var objA1 = document.getElementById('btn_add_grade_wise_compensation');
					  objA1.disabled = false;
					  return false;
					}
				 }
			
			compe_code.push(txtBox1);
			amounts.push(txtBox2);
		}
	   
$.post('../controller/add_grade_wise_compensation.php', {grade:grade, 'compe_code[]':compe_code, 'amounts[]':amounts}, function(data){
				$('#error3').text(data);
});
}


function update_grade_wise_compensation(){
 		 
	   var grade = $("#txt_grade").val();
	   
	   var compe_code = new Array();
	   var amounts = new Array();
	   
	   var table = document.getElementById('tblgradecomp');
 	   var rowCount = table.rows.length;
				
	   for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			
			var txtBox1 = row.cells[1].childNodes[0].value;
			var txtBox2 = row.cells[3].childNodes[0].value;
			
			compe_code.push(txtBox1);
			amounts.push(txtBox2);
		}
	   
$.post('../controller/update_grade_wise_compensation.php',{grade:grade, 'compe_code[]':compe_code, 'amounts[]':amounts}, function(data){
				$('#error3').text(data);
});
}

function add_month_control(){
 		 
	
	   var month_no = $("#txt_month_no1").val();
	   
	   var month_avtive = '';
	   for (var i=0; i < document.frm_month_control.rdb_month_avtive.length; i++)
  		 {
   			if (document.frm_month_control.rdb_month_avtive[i].checked)
     		 {
       			 month_avtive = document.frm_month_control.rdb_month_avtive[i].value;
     		 }
   		}
    
  		 if(month_avtive == '')
  		 {
    		 alert("Select Month ACTIVE or CLOSED");
			 return false;
   		 }
	   
	   var no_days = $("#txt_no_days").val();
	   
	   var a = document.getElementById('txt_no_days').value

		if(a > 31)
		{
			alert("Days in Month Canot be grater than 31");
			document.getElementById('txt_no_days').value=''
			return false;
		}
	   var per_day_divisor = $("#txt_per_day_divisor").val();
	   var da_index = $("#txt_da_index").val();
	   var hra_index = $("#txt_hra_index").val();
	   var bonus_index = $("#txt_bonus_index").val();
	 
var objA1 = document.getElementById('btn_add_month_control');

var a = document.getElementById('txt_month_no1').value;
var b = document.getElementById('txt_no_days').value;
var c = document.getElementById('txt_per_day_divisor').value;


if(a!='' && b!='' && c!='')
{
  objA1.disabled = true;
}

else
{
	objA1.disabled = false;
}	


	   
$.post('../controller/add_month_control.php',{month_no:month_no, month_avtive:month_avtive, no_days:no_days, per_day_divisor:per_day_divisor,da_index:da_index, hra_index:hra_index, bonus_index:bonus_index}, function(data){
				$('#error4').text(data);
});
}


function update_month_control(){
 		 
	   var month_no = $("#txt_month_no").val();
	   var month_avtive = '';
		 for (var i=0; i < document.frm_month_control.rdb_month_avtive.length; i++)
  		 {
   			if (document.frm_month_control.rdb_month_avtive[i].checked)
     		 {
       			 month_avtive = document.frm_month_control.rdb_month_avtive[i].value;
     		 }
   		}
		if(month_avtive == 'N')
		{
			var month_status = confirm("Do you want to Deactivate Month???");
			if(month_status == false)
			{
				 return false;	
			}
		}
    
  		 if(month_avtive == '')
  		 {
    		 alert("Select Month ACTIVE or CLOSED");
			 return false;
   		 }
	   
	   
	   var no_days = $("#txt_no_days").val();
	   var per_day_divisor = $("#txt_per_day_divisor").val();
	   var da_index = $("#txt_da_index").val();
	   var hra_index = $("#txt_hra_index").val();
	   var bonus_index = $("#txt_bonus_index").val();
	   
$.post('../controller/update_month_control.php',{month_no:month_no, month_avtive:month_avtive, no_days:no_days, per_day_divisor:per_day_divisor, da_index:da_index, hra_index:hra_index, bonus_index:bonus_index}, function(data){
				$('#error4').text(data);
});
}

function add_attendance(){
 		
	 validateattendance();
	 
 	 var no_of_days = document.getElementById('txt_no_days').value;
 	// var btn_update = document.getElementById('btn_update_attendance');

 
  	var table = document.getElementById('attendancetable');
  	var rowCount = table.rows.length;
    counter = 0;
	
		for(var i=0; i<rowCount; i++) {
			
             var row = table.rows[i];
			 var emp_name = row.cells[1].childNodes[0].value;
			 var working_days = row.cells[3].childNodes[0].value;	
			 var holidays = row.cells[4].childNodes[0].value;
			 var paid_leaves = row.cells[5].childNodes[0].value;
			 var unpaid_leaves = row.cells[6].childNodes[0].value;
			 var suspention_days = row.cells[7].childNodes[0].value;
			 
			 
			 if(working_days == '')
			 {
				 working_days = 0;
			  }
			  if(holidays == '')
			 {
				 holidays = 0;
			  }
			  if(paid_leaves == '')
			 {
				 paid_leaves = 0;
			  }
			  if(unpaid_leaves == '')
			 {
				 unpaid_leaves = 0;
			  }
			  if(suspention_days == '')
			 {
				 suspention_days = 0;
			  }
			 
			 var total = parseFloat(working_days) + parseFloat(holidays) + parseFloat(paid_leaves) + parseFloat(unpaid_leaves) + parseFloat(suspention_days);
			
			 if(parseFloat(total) != parseFloat(no_of_days))
			 {
			   
			   row.cells[3].childNodes[0].style.color = "#FF0000"; 
			   row.cells[4].childNodes[0].style.color = "#FF0000"; 
			   row.cells[5].childNodes[0].style.color = "#FF0000"; 
			   row.cells[6].childNodes[0].style.color = "#FF0000"; 
			   row.cells[7].childNodes[0].style.color = "#FF0000"; 
			   
			   
			   
			   var objA1 = document.getElementById('btn_add_attendance');
			   objA1.disabled = false;

			   
			  counter++;
			 }
			 else
			 {
				 row.cells[3].childNodes[0].style.color = "#000000"; 
			   row.cells[4].childNodes[0].style.color = "#000000"; 
			   row.cells[5].childNodes[0].style.color = "#000000"; 
			   row.cells[6].childNodes[0].style.color = "#000000"; 
			   row.cells[7].childNodes[0].style.color = "#000000"; 
			 }
			
		}
		
		if(counter!=0)
		{
		   alert("No. of days in red are wrong");
		   return false;	
	    }
		
	   
	 var empl_no = new Array();
	 var month_nob = new Array();
	 var per_day_for_month = new Array();
	 var holidays = new Array();
	 var paid_leaves = new Array();
	 var unpaid_leaves = new Array();
	 var suspention_days = new Array();
	 var adj_days = new Array();
	 var other_Hrs = new Array();
	 var leave_encash_days = new Array();
	 
	 
		var table = document.getElementById('attendancetable');
 		var rowCount = table.rows.length;
				
		for(var i=0; i<rowCount; i++) {
             var row = table.rows[i];
		var txtBox1 = row.cells[1].childNodes[0].value;
		for(var s=0;s<empl_no.length;s++)
				 {
				   	if(empl_no[s] == txtBox1)
					{
					 alert("Duplicate Employee");
					 var objA1 = document.getElementById('btn_add_attendance');
					 objA1.disabled = false;
					 return false;
					}
				 }
				 
				 
		var txtBox2 = row.cells[2].childNodes[0].value;
		var txtBox3 = row.cells[3].childNodes[0].value;	
		
		var txtBox7 = row.cells[4].childNodes[0].value;
		var txtBox8 = row.cells[5].childNodes[0].value;
		var txtBox9 = row.cells[6].childNodes[0].value;
		var txtBox10 = row.cells[7].childNodes[0].value;
		
		var txtBox4 = row.cells[8].childNodes[0].value;	
		var txtBox5 = row.cells[9].childNodes[0].value;	
		var txtBox6 = row.cells[10].childNodes[0].value;	
		
		empl_no.push(txtBox1);
		month_nob.push(txtBox2);
		per_day_for_month.push(txtBox3);
		holidays.push(txtBox7);
		paid_leaves.push(txtBox8);
		unpaid_leaves.push(txtBox9);
		suspention_days.push(txtBox10);
		adj_days.push(txtBox4);
		other_Hrs.push(txtBox5);
		leave_encash_days.push(txtBox6);
		}
	  
	 
 	
	
	   
$.post('../controller/add_attendance.php',{'empl_no[]':empl_no, 'month_nob[]':month_nob, 'per_day_for_month[]':per_day_for_month,'holidays[]':holidays, 'paid_leaves[]':paid_leaves, 'unpaid_leaves[]':unpaid_leaves, 'adj_days[]':adj_days, 'other_Hrs[]':other_Hrs, 'leave_encash_days[]':leave_encash_days, 'suspention_days[]':suspention_days}, function(data){
				$('#error5').text(data);
});
}






function update_attendance(){
 		
	//validateform4();
 var no_of_days = document.getElementById('txt_no_days').value;
 var btn_update = document.getElementById('btn_update_attendance');
 
 var table = document.getElementById('attendancetable');
 var rowCount = table.rows.length;
 counter = 0;			
		for(var i=0; i<rowCount; i++) {
			
             var row = table.rows[i];
			 var emp_name = row.cells[1].childNodes[0].value;
			 var working_days = row.cells[3].childNodes[0].value;	
			 var holidays = row.cells[4].childNodes[0].value;
			 var paid_leaves = row.cells[5].childNodes[0].value;
			 var unpaid_leaves = row.cells[6].childNodes[0].value;
			 var suspention_days = row.cells[7].childNodes[0].value;
			 
			 var total = parseFloat(working_days) + parseFloat(holidays) + parseFloat(paid_leaves) + parseFloat(unpaid_leaves) + parseFloat(suspention_days);
			 if(parseFloat(total) != parseFloat(no_of_days))
			 {
			 //  alert("No. of days entered for employee "+emp_name+" are not correct.");
			 // return false;
			   row.cells[1].childNodes[0].style.color= "#FF0000"; 
			   counter++;
			 }
			 else
			 {
			   btn_update.disabled = false;
			 }
		}
		
		if(counter != 0)
		{
	      alert("No. of days entered for employees in red are not correct.");
		  return false;	
		}
	   
	 var empl_no = new Array();
	 var month_nob = new Array();
	 var per_day_for_month = new Array();
	 var holidays = new Array();                
	 var paid_leaves = new Array();
	 var unpaid_leaves = new Array();
	 var suspention_days = new Array();
	 var adj_days = new Array();
	 var other_Hrs = new Array();
	 var leave_encash_days = new Array();
	 
	 
		var table = document.getElementById('attendancetable');
 		var rowCount = table.rows.length;
				
		for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
		var txtBox1 = row.cells[0].childNodes[0].value;
		for(var s=0;s<empl_no.length;s++)
				 {
				   	if(empl_no[s] == txtBox1)
					{
					 alert("Duplicate Employee");
					 var objA1 = document.getElementById('btn_update_attendance');
					 objA1.disabled = false;
					 return false;
					}
				 }
		var txtBox2 = row.cells[2].childNodes[0].value;
		var txtBox3 = row.cells[3].childNodes[0].value;	
		
		var txtBox7 = row.cells[4].childNodes[0].value;
		var txtBox8 = row.cells[5].childNodes[0].value;
		var txtBox9 = row.cells[6].childNodes[0].value;
		
		var txtBox4 = row.cells[7].childNodes[0].value;	
		var txtBox5 = row.cells[8].childNodes[0].value;	
		var txtBox6 = row.cells[9].childNodes[0].value;	
		var txtBox10 = row.cells[10].childNodes[0].value;
		
		empl_no.push(txtBox1);
		month_nob.push(txtBox2);
		per_day_for_month.push(txtBox3);
		holidays.push(txtBox7);
		paid_leaves.push(txtBox8);
		unpaid_leaves.push(txtBox9);
		adj_days.push(txtBox5);
		other_Hrs.push(txtBox6);
		leave_encash_days.push(txtBox10);
		suspention_days.push(txtBox4);
		}
	  
	 
 	
	
	   
$.post('../controller/update_attendance.php',{'empl_no[]':empl_no, 'month_nob[]':month_nob, 'per_day_for_month[]':per_day_for_month, 'holidays[]':holidays, 'paid_leaves[]':paid_leaves, 'unpaid_leaves[]':unpaid_leaves, 'adj_days[]':adj_days,'other_Hrs[]':other_Hrs,'leave_encash_days[]':leave_encash_days,'suspention_days[]':suspention_days}, function(data){
				$('#error5').text(data);
});
}







function add_recovery(){
	
	   var emple_no = $("#txt_emple_no").val();
	   var recovery_title = $("#cmb_x_code").val();
	   var total_amount = $("#txt_total_amount").val();
	   var no_of_installments = $("#txt_no_of_installments").val();
	   var installment_amount_per_salary = $("#txt_installment_amount_per_salary").val();
	   var amount_balance_after_recovery = $("#txt_amount_balance_after_recovery").val();
	   var compen_code = $("#cmb_comp_code1").val();
	   var remark_any = $("#txt_remark_any").val();
	   
	    var recovery_status = '';
		 for (var i=0; i < document.frm_recovery.rdb_recovery_status.length; i++)
  		 {
   			if (document.frm_recovery.rdb_recovery_status[i].checked)
     		 {
       			 recovery_status = document.frm_recovery.rdb_recovery_status[i].value;
     		 }
   		}
		
		
    
  		 if(recovery_status == '')
  		 {
    		 alert("Select Recovery Status");
			 return false;
   		}
	 
		
	  
	  
 var objA1 = document.getElementById('btn_add_recovery');

var a = document.getElementById('txt_emple_no').value;
var b = document.getElementById('cmb_x_code').value;
var c = document.getElementById('txt_total_amount').value;
var d = document.getElementById('txt_no_of_installments').value;
var e = document.getElementById('txt_installment_amount_per_salary').value;
var f = document.getElementById('cmb_comp_code1').value;


 if(a!='' && b!='select' && c!='' && d!='' && e!='' && f!='select' )
{
  objA1.disabled = true;

}
	
	   
$.post('../controller/add_recovery.php',{emple_no:emple_no,recovery_title:recovery_title, total_amount:total_amount,no_of_installments:no_of_installments,installment_amount_per_salary:installment_amount_per_salary,amount_balance_after_recovery:amount_balance_after_recovery,compen_code:compen_code,recovery_status:recovery_status,remark_any:remark_any}, function(data){
				$('#error6').text(data);
});
}


function update_recovery(){
 		 
	
	   var emple_no = $("#txt_emple_no").val();
	   var recovery_title = $("#txt_recovery_title").val();
	   var total_amount = $("#txt_total_amount").val();
	   var no_of_installments = $("#txt_no_of_installments").val();
	   var installment_amount_per_salary = $("#txt_installment_amount_per_salary").val();
	   var amount_balance_after_recovery = $("#txt_amount_balance_after_recovery").val();
	   var compen_code = $("#cmb_comp_code").val();
	   var remark_any = $("#txt_remark_any").val();
	   
	    var recovery_status = '';
		 for (var i=0; i < document.frm_recovery.rdb_recovery_status.length; i++)
  		 {
   			if (document.frm_recovery.rdb_recovery_status[i].checked)
     		 {
       			 recovery_status = document.frm_recovery.rdb_recovery_status[i].value;
     		 }
   		}
		
		
    
  		 if(recovery_status == '')
  		 {
    		 alert("Select Recovery Status");
			 return false;
   		}
	 
		if(recovery_status == 'Foreclosed')
		{
	    var recvstatus = confirm("Do you want to Close Recovery???");
		if(recvstatus == false)
		{
			return false;
		}
		}
	   
$.post('../controller/update_recovery.php',{emple_no:emple_no, recovery_title:recovery_title, total_amount:total_amount,no_of_installments:no_of_installments,installment_amount_per_salary:installment_amount_per_salary,amount_balance_after_recovery:amount_balance_after_recovery,compen_code:compen_code,recovery_status:recovery_status,remark_any:remark_any}, function(data){
				$('#error6').text(data);
});
}


function add_batch(){
	   var batch_no = $("#txt_batch_no").val();
	   validateform3();
	   var month_no = $("#txt_month_no").val();
	   var remark = $("#txt_remark").val();
	  
	   var employee_number = new Array();
	   var comp_code = new Array();
	   var adjustment_amount = new Array();
	   var remark_any = new Array();
	   
	   var table = document.getElementById('tblbatchdtls');
 	   var rowCount = table.rows.length;
				
	   for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			
			var txtBox1 = row.cells[1].childNodes[0].value;
			var txtBox2 = row.cells[2].childNodes[0].value;
			
			for(var s=0;s<employee_number.length;s++)
				 {
				   	if(employee_number[s] == txtBox1 && comp_code[s] == txtBox2)
					{
					 alert("Duplicate Compensation code entries for employee "+txtBox1);
					 var objA1 = document.getElementById('btn_add_batch_details');
					 objA1.disabled = false;
					 return false;
					}
				 }
			
			var txtBox3 = row.cells[3].childNodes[0].value;
			var txtBox4 = row.cells[4].childNodes[0].value;
			
			employee_number.push(txtBox1);
			comp_code.push(txtBox2);
			adjustment_amount.push(txtBox3);
			remark_any.push(txtBox4);
			
		}
	   
$.post('../controller/add_batch.php',{batch_no:batch_no, month_no:month_no, remark:remark, 'employee_number[]':employee_number,'comp_code[]':comp_code, 'adjustment_amount[]':adjustment_amount, 'remark_any[]':remark_any}, function(data){
				$('#error7').text(data);
});
}


function update_batch(){
 	   var batch_no = $("#txt_batch_no").val();
	   var month_no = $("#txt_month_no").val();
	   var remark = $("#txt_remark").val();
	  
	   var employee_number = new Array();
	   var comp_code = new Array();
	   var adjustment_amount = new Array();
	   var remark_any = new Array();
	   
	   var table = document.getElementById('tblbatchdtls');
 	   var rowCount = table.rows.length;
				
	   for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			
			var txtBox1 = row.cells[0].childNodes[0].value;
			var txtBox2 = row.cells[1].childNodes[0].value;
			var txtBox3 = row.cells[2].childNodes[0].value;
			var txtBox4 = row.cells[3].childNodes[0].value;
			
			employee_number.push(txtBox1);
			comp_code.push(txtBox2);
			adjustment_amount.push(txtBox3);
			remark_any.push(txtBox4);
		}
		
$.post('../controller/update_batch.php',{batch_no:batch_no, month_no:month_no, remark:remark, 'employee_number[]':employee_number,'comp_code[]':comp_code, 'adjustment_amount[]':adjustment_amount, 'remark_any[]':remark_any}, function(data){
				$('#error7').text(data);
});
}


function add_batch_details(){
	   var batch_no = $("#txt_batch_number").val();
	   var employee_number = $("#txt_employee_number").val();
	   var comp_code = $("#txt_comps_code").val();
	   var adjustment_amount = $("#txt_adjustment_amount").val();
	   var remark_any = $("#txt_remark_any").val();
	   
	   
	   
$.post('../controller/add_batch_details.php',{batch_no:batch_no, employee_number:employee_number,comp_code:comp_code,adjustment_amount:adjustment_amount,remark_any:remark_any}, function(data){
				$('#error8').text(data);
});
}


function update_batch_details(){
	   var batch_no = $("#txt_batch_number").val();
	   var employee_number = $("#txt_employee_number").val();
	   var comp_code = $("#txt_comps_code").val();
	   var adjustment_amount = $("#txt_adjustment_amount").val();
	   var remark_any = $("#txt_remark_any").val();
	  
	   
$.post('../controller/update_batch_details.php',{batch_no:batch_no, employee_number:employee_number,comp_code:comp_code,adjustment_amount:adjustment_amount,remark_any:remark_any}, function(data){
				$('#error8').text(data);
});
}



function add_grade_master(){

	var grade = $("#txt_grade").val();

	var desc = $("#txt_grade_desc").val();

	$.post('../controller/add_grade.php', {grade:grade, desc:desc}, function(data){
				$('#error').text(data);
});
}


function addpayroll(){

		var payroll = '';
   		if (document.login.chk_payroll.checked == true)
     	{
       		payroll = document.login.chk_payroll.value;
     	}
		
		if(payroll == '')
		{
		  alert("Select Check Box to Add Payroll");
		  return false;
	    }
		
		var btn = document.getElementById("btn_payroll");
		btn.disabled = true;

$.post('../controller/payroll.php', {payroll:payroll}, function(data){
				$('#error').text(data);
});
}



function move_employee(){
 		
	 
 var from_company_name = $("#cmb_company_name").val();
 var to_company_name = $("#cmb_to_company_name").val();
 var to_employee_name = $("#cmb_to_employee_name").val();

 
  	if(from_company_name!= 'select' && to_company_name!='select' && to_employee_name!='select')
	{
		var val = confirm("Are you sure, you want to move employee??");
		if(val == false)
		{
		  return false;	
		}
		var btn_move = document.getElementById("btn_move_employee");
		btn_move.disabled=true;
    }
	 else
	 {
		 alert("Please fill up required fields");
		 return false;
     }
	
	   
$.post('../controller/move_employee.php',{from_company_name:from_company_name, to_company_name:to_company_name, to_employee_name:to_employee_name}, function(data){
				$('#error').text(data);
});
}


