<?php
/*** begin our session ***/
$con=mysql_connect("localhost","invoice_user","invoice_user")or
    die("Could not connect: " . mysql_error());;
// Check connection

mysql_select_db('invoice_management', $con) or die('Could not select database.');

$sql = "select *  FROM lid_invoices";
$result = mysql_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Billing</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css "rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body style="background:white">
  <button id="add-row" class=" btn btn-lg btn-default btn-primary hidden-print"><i class="fa fa-plus"></i> Add new row</button>

            <div class="col-lg-12">
				</br>
   <div class="panel panel-default">
	<div class="panel-body">
				<div class="col-lg-12">
					</br>
					<div class="col-lg-2 col-xs-4">
						<address>TIN: 03831004371</br>
						ST/CST No: 37872911</br>
						Dated: 6-1-93
						</address>			
					</div>
					<div class="col-lg-8  col-xs-4">
						<h4 class="text-center">
							JOB INVOIVE</br>
							CASH CREDIT MEMO			
						</h4>
					</div>
					<div class="col-lg-2  col-xs-4">
						<address><strong>TRANSPORT COPY</strong></br>
						Phone : 309600, 248573</br>
						Mobile : 98158-63400
						</address>			
					</div>
				</div>			
				<div class="col-lg-12 col-xs-12">
					<h1 class="text-center hidden-xs">J.S. ENTERPRISES</h1>
					<h4 class="text-center"> F-10, Focal Point. Phagwara Road, HOSHIARPUR-146001</h4></br>						
				</div>
				<div class="col-lg-12 col-xs-12">
	
<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-1 control-label">Invoice No</label>
    <div class="col-sm-2">
      <input type="email" class=" input-line" id="" placeholder="">
    </div>
	<div class="col-lg-5"></div>
    <label for="inputPassword3" class="col-sm-2 control-label">Date</label>
    <div class="col-sm-2">
      <input type="password" class="input-line" id="inputPassword3" placeholder="">
    </div>

	</div>


  <div class="form-group">
    <label for="inputPassword3" class="col-sm-1 control-label">M/s</label>
    <div class="col-sm-5">
      <input type="password" class="input-line" id="inputPassword3" placeholder="">
    </div>
    <label for="inputPassword3" class="col-sm-2 control-label">VRN/TIN No</label>
    <div class="col-sm-4">
      <input type="password" class="input-line" id="inputPassword3" placeholder="">
    </div>

  </div>
  
  <div class="form-group">

    <label for="" class="col-sm-1 control-label">Transport-Co</label>
    <div class="col-sm-4">
      <input type="password" class="input-line" id="inputPassword3" placeholder="">
    </div>
    <label for="inputPassword3" class="col-sm-1 control-label">GR/RR No</label>
    <div class="col-sm-3">
      <input type="password" class="input-line" id="inputPassword3" placeholder="">
    </div>
    <label for="inputPassword3" class="col-sm-1 control-label">Dated</label>
    <div class="col-sm-2">
      <input type="password" class="input-line" id="inputPassword3" placeholder="">
    </div>

  </div>
	
</form>

</br>
		</div>
				<div class="col-lg-12 col-xs-12">
						<table class="table table-bordered table-condensed invoice-table" >
						    <thead>
								<tr class="active"><th>Sno</th><th>Full Description of Goods</th><th>Quantity</th><th>Value per unit (Rate)</th><th>Amount (Rs)</th></tr>
							</thead>
							<tboby>
								<tr>
									<td class="col-lg-1 col-xs-1" id="sno_list">									  
									  <input type="email" class=" input-line" name ='sno_1' id='sno_1' placeholder="" value="1">									  											
									</td>
									<td class="col-lg-5 col-xs-5" id="desc_list">
									  <input type="email" class=" input-line" name ='desc_1' id='desc_1' placeholder="">
									</td>
																		
									<td class="col-lg-2 col-xs-2" id="quantity_list">
										<input type='' class='input-line' name ='quantity_1' id='quantity_1' placeholder='' onchange ='updateValue();'>									  
									</td>
									<td class="col-lg-2 col-xs-2" id="rate_list">
										<input type='' class='input-line' name ='rate_1' id='rate_1' placeholder='' onchange ='updateValue()'>									  									
									</td>
									<td class="col-lg-2 col-xs-2" id="ammount_list">
										<input type='' class='input-line' name ='ammount_1' id='ammount_1' placeholder='' >									  									
									</td>								
								</tr>
											
									<tr>
									<td rowspan="3" colspan="3"></td>
									<td >Total Ammount</td>
									<td > <input type="" class=" input-line" id="vat_gtotal" placeholder=""  onchange ='updateTotal()' ></td>
									</tr>
									<tr>
									<td class="col-lg-2 col-xs-2">
										<div class="col-lg-5 col-xs-5">Tax @</div>
										<div class="col-lg-7 col-xs-7"><input type="" class="input-line" id="vat_value" placeholder=""  onchange ='updateTotal()' value='0'></td>
										</div>		
									<td ><input type="" class=" input-line" id="vat_total" placeholder=""  onchange ='updateTotal()'></td>

									</tr>
									<tr>
									<td >Gross total</td>
									<td ><input type="" class=" input-line" id="gtotal" placeholder="">
									</td>
									</tr>
							</tboby>	
						</table>

				</div>				
                <!-- /.col-lg-12 -->
            </div>
            </div>
	
</div>         
            <!-- /.row -->

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

 
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>
<script>
updateTotal = function(){
var total = 0;
var gtotal = 0;
var vat_total =0;
var count = $("#sno_list input").length;

for (i=1;i<=count;i++){
total += parseFloat(document.getElementById("ammount_"+i).value);
}
vat_total = parseFloat(document.getElementById("vat_value").value)*parseFloat(total)/100;

document.getElementById("vat_total").value = vat_total.toFixed(2);
gtotal = parseFloat(total) + parseFloat(document.getElementById("vat_total").value);
document.getElementById("gtotal").value = gtotal.toFixed(2);
};
</script>


<script>
updateValue = function(){
var gtotal =0;
var count = $("#sno_list input").length;
for (i=1;i<=count;i++){

document.getElementById("ammount_"+i).value = (document.getElementById("quantity_"+i).value*document.getElementById("rate_"+i).value).toFixed(2);

gtotal += parseFloat(document.getElementById("ammount_"+i).value);
}

document.getElementById("vat_gtotal").value =gtotal.toFixed(2);
updateTotal();

};
</script>


<script>
$("#add-row").click(function (e) {
var count = $("#sno_list input").length;
var next = parseInt(count) + parseInt(1)

//Append a new row of code to the "#items" div
  $("#sno_list").append("<input type='' class='input-line' name ='sno_"+next+"' id='sno_"+next+"' placeholder='' value='"+next+"'> ");
  $("#desc_list").append("<input type='' class='input-line' name ='desc_"+next+"' id='desc_"+next+"' placeholder=''>");
  $("#quantity_list").append("<input type='' class='input-line' name ='quantity_"+next+"' id='quantity_"+next+"' placeholder='' onchange ='updateValue();'> ");
  $("#rate_list").append("<input type='' class='input-line' name ='rate_"+next+"' id='rate_"+next+"' placeholder='' onchange ='updateValue();'>");
  $("#ammount_list").append("<input type='' class='input-line' name ='ammount_"+next+"' id='ammount_"+next+"' placeholder='' onchange ='updateValue();'>");

});

</script>
</html>
<?php

mysql_close($con);
?>
