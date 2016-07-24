<?php
/*** begin our session ***/
$con=mysql_connect("localhost","invoice_user","invoice_user")or
    die("Could not connect: " . mysql_error());;
// Check connection

mysql_select_db('invoice_management', $con) or die('Could not select database.');

$query_invoice_no = mysql_query("select max(invoice_no) as invoice_no FROM billing");
$last_invoice_no = mysql_fetch_array($query_invoice_no);
$new_invoice_no = $last_invoice_no['invoice_no']+1 ;

if($_POST){

$invoice_no = filter_var($_POST['invoice_no'], FILTER_SANITIZE_STRING);
$bill_to = filter_var($_POST['bill_to'], FILTER_SANITIZE_STRING);
$invoice_date = filter_var($_POST['invoice_date'], FILTER_SANITIZE_STRING);
$tin_no = filter_var($_POST['tin_no'], FILTER_SANITIZE_STRING);
$transport_co = filter_var($_POST['transport_co'], FILTER_SANITIZE_STRING); 
$gr_rr_no = filter_var($_POST['transport_co'], FILTER_SANITIZE_STRING); 
$bill_dated = filter_var($_POST['bill_dated'], FILTER_SANITIZE_STRING);
$bill_amount = filter_var($_POST['bill_amount'], FILTER_SANITIZE_STRING);
$tax = filter_var($_POST['tax'], FILTER_SANITIZE_STRING);
$tax_value = filter_var($_POST['tax_value'], FILTER_SANITIZE_STRING);
$g_total = filter_var($_POST['gtotal'], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO billing (invoice_no,bill_to,invoice_date,tin_no,transport_co,gr_rr_no,bill_dated,bill_amount,tax,tax_value,g_total) 
VALUES ('$invoice_no','$bill_to','$invoice_date','$tin_no','$transport_co','$gr_rr_no','$bill_dated','$bill_amount','$tax','$tax_value','$g_total')";

$result = mysql_query($sql);

if ($result)
{
$id=mysql_insert_id();

$count =0;
foreach ($_POST as $key => $val)
{
	if (strpos($key, 'sno_') === 0){$count++;}
}

for ($i=1;$i<$count+1;$i++){
${"sno_".$i} = filter_var($_POST['sno_'.$i], FILTER_SANITIZE_STRING);
${"desc_".$i} = filter_var($_POST['desc_'.$i], FILTER_SANITIZE_STRING);
${"quantity_".$i} = filter_var($_POST['quantity_'.$i], FILTER_SANITIZE_STRING);
${"rate_".$i} = filter_var($_POST['rate_'.$i], FILTER_SANITIZE_STRING);
${"amount_".$i} = filter_var($_POST['amount_'.$i], FILTER_SANITIZE_STRING);

$sql_billing = "INSERT INTO billing_details (id_billing,sno,details,quantity,rate,amount) VALUES('$id','${"sno_".$i}','${"desc_".$i}','${"quantity_".$i}','${"rate_".$i}','${"amount_".$i}');";	
$result_billing = mysql_query($sql_billing);

}


if (!$result_billing) {
    die('Invalid query: ' . mysql_error());
}
else{
echo '<script language="javascript">
alert("Saved Successfuly");
window.location = "index.php";
</script>';	
	}
}
}

mysql_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invoice Billing</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</head>

<body style="background:white">
<div class="col-lg-12">
	</br>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-lg-12 col-xs-12">
				<div class="row">
				<div class="col-lg-2 col-xs-4">
					<div class="pull-left" id="tax_details"></div>			
				</div>
				<div class="col-lg-8  col-xs-4">
					<h5 class="text-center ">
						JOB INVOICE</br>
						CASH CREDIT MEMO			
						</h5>

				</div>
				<div class="col-lg-2  col-xs-4">
					<div class="pull-right"><strong>TRANSPORT COPY</strong></br>
					<div id="contact_no"></div>
					</div>			
				</div>
				</div>
			</div>			
			<div class="col-lg-12 col-xs-12">
				<h2 class="text-center margin-none" ><b id="company_name"></b></h2>

				<h4 class="text-center " id="company_address"></h4>

			</div>
			<form class="form-horizontal" id="billing_form" method="post">

			<div class="col-lg-12 col-xs-12">
		
				  <div class="form-group">
					<div class="col-sm-1 col-xs-1 pull-left control-label">Invoice No</div>
					<div class="col-sm-2 col-xs-2">
					  <input type="text" class=" input-noline" id="invoice_no" name="invoice_no" value="<?php echo "$new_invoice_no" ?> ">
					</div>
					<div class="col-lg-5 col-xs-5"></div>
					<div class="col-sm-2 control-label">Date</div>
					<div class="col-sm-2 col-xs-2 pull-right">
					  <input type="text" class="input-line" id="curr_date" placeholder="" name="invoice_date">
					</div>

					</div>


				  <div class="form-group">
					<div class="col-sm-1 col-xs-1 control-label">M/s</div>
					<div class="col-sm-5 col-xs-5">
					  <input type="text" class="input-line" id="bill_to" placeholder="" name="bill_to">
					</div>
					<div class="col-sm-2 col-xs-2 control-label">VRN/TIN No</div>
					<div class="col-sm-4 col-xs-4">
					  <input type="text" class="input-line" id="tin_no" name="tin_no">
					</div>

				  </div>
				  
				  <div class="form-group">

					<div class="col-sm-1 col-xs-1 control-label">Transport-Co</div>
					<div class="col-sm-4 col-xs-4">
					  <input type="text" class="input-line" id="transport_co" placeholder="" name="transport_co">
					</div>
					<div class="col-sm-1 col-xs-1 control-label">GR/RR No</div>
					<div class="col-sm-3 col-xs-3">
					  <input type="text" class="input-line" id="gr_rr_no" placeholder="" name="gr_rr_no">
					</div>
					<div class="col-sm-1 col-xs-1 control-label">Dated</div>
					<div class="col-sm-2 col-xs-2">
					  <input class="input-line" id="bill_dated" name="bill_dated">
					</div>

				  </div>
					

			</div>
			<div class="col-lg-12 col-xs-12">
				<table class="table table-bordered table-condensed invoice-table" >
					<thead>
						<tr class="active"><th>Sno</th><th>Full Description of Goods</th><th>Quantity</th><th>Value per unit (Rate)</th><th>Amount (Rs)</th></tr>
					</thead>
					<tboby>
						<tr>
							<td class="col-lg-1 col-xs-1" id="sno_list">									  
								<input type="text" class=" input-noline" name ='sno_1' id='sno_1' placeholder="" value="1" required='required'>									  											
							</td>
							<td class="col-lg-5 col-xs-5" id="desc_list">
								<input type="text" class="autofill input-line" name ='desc_1' id='desc_1' placeholder="" required='required'>
							</td>																
							<td class="col-lg-2 col-xs-2" id="quantity_list">
								<input type='text' class='input-line' name ='quantity_1' id='quantity_1' placeholder='' onchange ='updateValue();' required='required'>									  
							</td>
							<td class="col-lg-2 col-xs-2" id="rate_list">
								<input type='text' class='input-line' name ='rate_1' id='rate_1' placeholder='' onchange ='updateValue()' required='required'>									  									
							</td>
							<td class="col-lg-2 col-xs-2" id="amount_list">
								<input type='text' class='input-noline' name ='amount_1' id='amount_1' placeholder='' required='required'>									  									
							</td>								
						</tr>									
						<tr>
							<td rowspan="3" colspan="3">
								<div class="col-xs-2">
									<button type="button" id="add-row" class=" btn btn-default btn-xs hidden-print"><i class="glyphicon glyphicon-plus"></i> </button>&nbsp;								
									<button type="button" id="del-row" class=" btn btn-danger btn-xs hidden-print"><i class="glyphicon glyphicon-minus"></i> </button>
								</div>
							</td>
							<td >Total amount</td>
							<td > <input type="text" class=" input-noline" name="bill_amount" id="vat_gtotal" placeholder=""  onchange ='updateTotal()' ></td>
						</tr>
						<tr>
							<td class="col-lg-2 col-xs-2">
								<div class="col-lg-5 col-xs-5">Tax @</div>
								<div class="col-lg-7 col-xs-7">
									<input type="" class="input-line" name="tax" id="vat_value" placeholder=""  onchange ='updateTotal()' value='0'>
								</div>								
							</td>
							<td ><input type="text" class=" input-noline" name="tax_value" id="vat_total" placeholder=""  onchange ='updateTotal()'></td>
						</tr>
						<tr>
							<td >Gross total</td>
							<td ><b><input type="text" class=" input-noline" name="gtotal" id="gtotal" placeholder=""></b></td>
						</tr>
					</tboby>	
				</table>

			</div>				

					<!-- /.col-lg-12 -->
			<div class="col-md-5 col-xs-7">
				<div class="panel panel-default">
					<div class="panel-body">Note:This copy does not entitle the holder the claim input tax credit.</div>
				</div>
			</div>
			<div class="col-xs-3 pull-right">
				<b class="pull-right " id="company_name_short"></b>
			</div>
		
			<div class="col-xs-2 col-xs-offset-10 pull-right">
				<p class="pull-right">Signature</p>	
			</div>    
			<div class="col-xs-12">
				<button type="submit" id="save-form"  class=" btn btn-primary btn-sm hidden-print"><i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;&nbsp;Save </button>								
			</div>    

			</form>

	
		</div>
	</div>
</div>         
    <!-- jQuery -->
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="dist/js/billing.js"></script>
 
<script>loadValues();</script>
</body>
</html>
