<?php
/*** begin our session ***/
$con=mysql_connect("localhost","invoice_user","invoice_user")or
    die("Could not connect: " . mysql_error());;
// Check connection

mysql_select_db('invoice_management', $con) or die('Could not select database.');

$sql = "select *  FROM component_invoices";
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

    <title>TechPortal</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="bower_components/buttons/css/buttons.dataTables.min.css "rel="stylesheet">

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

<body>
    <div id="wrapper">
		<?php include 'navigation.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Component Invoices</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			
        <table id="invoice_table" class="table table-bordered table-responsive table-condensed">
        <thead>
        	<tr class="active"><th>In ChallanNo</th><th>In-date</th><th>Component</th><th>Weight</th><th>In-Numbers</th>
			<th>Out ChallanNo</th><th>Out-Date</th><th>Quantity</th><th>Balance</th><th>Rejection</th><th>Edit</th>
			</tr></thead><tboby>
			<?php
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
			<tr>
			<td><? echo $row["in_challan_no"] ?></td>
			<td><? echo $row["in_date"] ?></td>
			<td><? echo $row["component"] ?></td>
			<td><? echo $row["weight"] ?></td>
			<td><? echo $row["in_numbers"] ?></td>
			<td><? echo $row["out_challan_no"] ?></td>
			<td><? echo $row["out_date"] ?></td>
			<td><? echo $row["quantity"] ?></td>
			<td><? echo $row["balance"] ?></td>
			<td><? echo $row["rejection"] ?></td>
			<td><a href='component_invoice_edit.php?invoice_id=<? echo $row['invoice_id'] ?>'><i class="fa fa-edit"></i> Edit</a></td>

			</tr>

		<?	} ?>
		</tbody></table>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script src="bower_components/buttons/js/dataTables.buttons.min.js"></script>
    <script src="bower_components/buttons/js/buttons.print.min.js "></script>
    <script src="bower_components/buttons/js/buttons.colVis.min.js "></script>
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


</html>
<?php

mysql_close($con);
?>
