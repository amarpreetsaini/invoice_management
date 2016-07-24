loadValues = function(){

var company = {
company_name : "J.S. ENTERPRISES",
company_address :"F-10, Focal Point Phagwara Road, HOSHIARPUR-146001",
phone1:"309600",	
phone2:"248573",	
mobile:"9815863400",
tin:"03831004371",
stcst_no:"37872911",	
tin_dated:"6-1-93"
};

document.getElementById("company_name").innerHTML = company.company_name;
document.getElementById("company_name_short").innerHTML = "For "+company.company_name;
document.getElementById("company_address").innerHTML = company.company_address;
document.getElementById("tax_details").innerHTML = "TIN: "+company.tin+"</br>"+"ST/CST No: "+company.stcst_no+"</br>"+"Dated: "+company.tin_dated;

document.getElementById("contact_no").innerHTML = "Phone: "+company.phone1+", "+company.phone2+"</br>"+"Mobile: "+company.mobile;


};




$(function() {
    var availableTags = [
"ALM Lid Std Hawkins",
"ALM Lid Std M.M.",
"ALM Lid Baby Hawkins",
"ALM Lid Baby M.M.",
"ALM Lid Mini Hawkins",
"ALM Lid Mini M.M.",
"ALM Lid Int Hawkins",
"ALM Lid Jumbo",
"ALM Lid Futura Wide",
"ALM SHB Modified",
"ALM Coverhead Brighten",
"ALM Coverhead UnBrighten",
"S.S. Spring Black",
"S.S. Spring Red",
"Bras Wire Hook Modified",
"Staycool Grinding"
    ];
    $( ".autofill" ).autocomplete({
      source: availableTags
    });
});

	$(function() {
		$( "#curr_date" ).datepicker(
    { dateFormat: 'yy-mm-dd' }    
    );
	  });

	$(function() {
		$( "#bill_dated" ).datepicker(
		    { dateFormat: 'yy-mm-dd' }    
		);
	  });

updateTotal = function(){
var total = 0;
var gtotal = 0;
var vat_total =0;
var count = $("#sno_list input").length;

for (i=1;i<=count;i++){
total += parseFloat(document.getElementById("amount_"+i).value);
}
vat_total = parseFloat(document.getElementById("vat_value").value)*parseFloat(total)/100;

document.getElementById("vat_total").value = vat_total.toFixed(2);
gtotal = parseFloat(total) + parseFloat(document.getElementById("vat_total").value);
document.getElementById("gtotal").value = gtotal.toFixed(2);
};

updateValue = function(){
var gtotal =0;
var count = $("#sno_list input").length;
for (i=1;i<=count;i++){

document.getElementById("amount_"+i).value = (document.getElementById("quantity_"+i).value*document.getElementById("rate_"+i).value).toFixed(2);

gtotal += parseFloat(document.getElementById("amount_"+i).value);
}

document.getElementById("vat_gtotal").value =gtotal.toFixed(2);
updateTotal();

};

$("#add-row").click(function (e) {
var count = $("#sno_list input").length;
var next = parseInt(count) + parseInt(1);
if( count <10 ){
//Append a new row of code to the "#items" div
  $("#sno_list").append("<input type='' class='input-noline' name ='sno_"+next+"' id='sno_"+next+"' placeholder='' value='"+next+"' required='required'> ");
  $("#desc_list").append("<input type='' class='autofill input-line' name ='desc_"+next+"' id='desc_"+next+"' placeholder='' required='required'>");
  $("#quantity_list").append("<input type='' class='input-line' name ='quantity_"+next+"' id='quantity_"+next+"' placeholder='' onchange ='updateValue();' required='required'> ");
  $("#rate_list").append("<input type='' class='input-line' name ='rate_"+next+"' id='rate_"+next+"' placeholder='' onchange ='updateValue();' required='required'>");
  $("#amount_list").append("<input type='' class='input-noline' name ='amount_"+next+"' id='amount_"+next+"' placeholder='' onchange ='updateValue();' required='required'>");

$(function() {
    var availableTags = [
"ALM Lid Std Hawkins",
"ALM Lid Std M.M.",
"ALM Lid Baby Hawkins",
"ALM Lid Baby M.M.",
"ALM Lid Mini Hawkins",
"ALM Lid Mini M.M.",
"ALM Lid Int Hawkins",
"ALM Lid Jumbo",
"ALM Lid Futura Wide",
"ALM SHB Modified",
"ALM Coverhead Brighten",
"ALM Coverhead UnBrighten",
"S.S. Spring Black",
"S.S. Spring Red",
"Bras Wire Hook Modified",
"Staycool Grinding"
    ];
    $( ".autofill" ).autocomplete({
      source: availableTags
    });
});

}
});

$("#del-row").click(function (e) {
var count = $("#sno_list input").length;
if( count >1 ){
$('#sno_'+count).remove();
$('#desc_'+count).remove();
$('#quantity_'+count).remove();
$('#rate_'+count).remove();
$('#amount_'+count).remove();
}

});

