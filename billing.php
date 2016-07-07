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
						<table class="table table-bordered table-condensed">
						    <thead>
								<tr class="active"><th>Sno</th><th>Full Description of Goods</th><th>Quantity</th><th>Value per unit ie Rate</th><th>Amount</th></tr>
							</thead>
							<tboby>
								<tr>
									<td class="col-lg-1 col-xs-1" >
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									</td>
									<td class="col-lg-5 col-xs-5">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									  <input type="email" class=" input-line" id="" placeholder="">
									</td>
									
									
									<td class="col-lg-2 col-xs-2">
									 <?php
										for ($x = 1; $x <= 10; $x++) {
											echo "<input type='' class='input-line' name ='q$x' id='q$x' placeholder='' onchange ='updateValue()'>";
										}
										?> 	
									  
									</td>
									<td class="col-lg-2 col-xs-2">
									 <?php
										for ($x = 1; $x <= 10; $x++) {
											echo "<input type='' class='input-line' name ='r$x' id='r$x' placeholder='' onchange ='updateValue()'>";
										}
										?> 	
									
									</td>
									<td class="col-lg-2 col-xs-2">
									 <?php
										for ($x = 1; $x <= 10; $x++) {
											echo "<input type='' class='input-line' name ='v$x' id='v$x' placeholder=''>";
										}
										?> 											
									
									</td>								
								</tr>
									<tr>
									<td rowspan="3"></td>
									<td rowspan="3"></td>
									<td rowspan="3"></td>
									<td >Tax</td>
									<td ></td>
									</tr>
									<tr>
									<td >Total VAT</td>
									<td ></td>
									</tr>
									<tr>
									<td >Gtotal</td>
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

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js "></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.colVis.min.js "></script>
<script>
    $('#invoice_table').DataTable(
     {
    renderer: "bootstrap",
	dom: 'Bfrtip',
    buttons: [
            {
			extend: 'print',
			exportOptions: {
			columns: ':visible'
                }
            },
            'colvis'
        ],
        columnDefs: [ {
            targets: -1,
            visible: false
        } ],
    "responsive": true,
    "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,

    } ],
} );
</script>

<script>
updateValue = function(){
var gtotal = 0;
for (i=1;i<=10;i++){
document.getElementById("v"+i).value = document.getElementById("q"+i).value*document.getElementById("r"+i).value;
gtotal += parseFloat(document.getElementById("v"+i).value);
}

document.getElementById("gtotal").value = gtotal;
};
</script>
</html>
<?php

mysql_close($con);
?>
