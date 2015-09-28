// JavaScript Document
var success = "Successfully done";
//here i call display function on display button click
$('#save1').click(function(){
			insert();			   
});


//here you put rest of the functions ie.(update and delete) and send them to your php scripts

function insert(){
	   var name = $("#txt_name").val();
	   var bdate = $("#txt_bdate").val();
	   var gender = $("#rdb_gender").val();
	   	   var status = $("#rdb_marital_status").val();
		   	   var persons = $("#txt_persons").val();
			   var edu = $("#rdb_graduate").val();
		   	   var edu_other = $("#txt_other").val();
			   var addr = $("#txt_addr").val();
		   	   var nearest_place = $("#txt_near_place").val();
			   var pincode = $("#txt_a_pincode").val();
		   	   var phone = $("#txt_a_phone").val();
			   var mnum = $("#txt_a_mnum").val();
		   	   var email = $("#txt_a_email").val();
			   var owner = $("#rdb_a_owner").val();
		   	   var hissa = $("#txt_a_hissa").val();
			   var market_rate = $("#txt_a_market_rate").val();
		   	   var paddr = $("#txt_a_paddr").val();
			   var pincode1 = $("#txt_a_pincode1").val();
		   	   var phone1 = $("#txt_a_phone1").val();
		 
$.post('add_applicant.php', {name:name, bdate:bdate, gender:gender, status:status, persons:persons, edu:edu, edu_other:edu_other, addr:addr, nearest_place:nearest_place, pincode:pincode, phone:phone, mnum:mnum, email:email, owner:owner, hissa:hissa, market_rate:market_rate, paddr:paddr, pincode1:pincode1, phone1:phone1 }, function(data){
				$('#error').text(data);
});
}




// JavaScript Document
var success = "Successfully done";
//here i call display function on display button click
$('#save2').click(function(){
			insert();			   
});


//here you put rest of the functions ie.(update and delete) and send them to your php scripts

function insert(){
	   var name = $("#txt_name").val();
	   var bdate = $("#txt_bdate").val();
	   var gender = $("#rdb_gender").val();
	   	   var status = $("#rdb_marital_status").val();
		   	   var persons = $("#txt_persons").val();
			   var edu = $("#rdb_graduate").val();
		   	   var edu_other = $("#txt_other").val();
			   var addr = $("#txt_addr").val();
		   	   var nearest_place = $("#txt_near_place").val();
			   var pincode = $("#txt_a_pincode").val();
		   	   var phone = $("#txt_a_phone").val();
			   var mnum = $("#txt_a_mnum").val();
		   	   var email = $("#txt_a_email").val();
			   var owner = $("#rdb_a_owner").val();
		   	   var hissa = $("#txt_a_hissa").val();
			   var market_rate = $("#txt_a_market_rate").val();
		   	   var paddr = $("#txt_a_paddr").val();
			   var pincode1 = $("#txt_a_pincode1").val();
		   	   var phone1 = $("#txt_a_phone1").val();
		 
$.post('add_applicant.php', {name:name, bdate:bdate, gender:gender, status:status, persons:persons, edu:edu, edu_other:edu_other, addr:addr, nearest_place:nearest_place, pincode:pincode, phone:phone, mnum:mnum, email:email, owner:owner, hissa:hissa, market_rate:market_rate, paddr:paddr, pincode1:pincode1, phone1:phone1 }, function(data){
				$('#error').text(data);
});
}



