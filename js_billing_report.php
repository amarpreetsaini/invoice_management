<?php
/*** begin our session ***/
$con=mysql_connect("localhost","invoice_user","invoice_user")or
    die("Could not connect: " . mysql_error());;
// Check connection

mysql_select_db('invoice_management', $con) or die('Could not select database.');

$sql = "select *  FROM billing";
$result = mysql_query($sql);

if($_POST){
$id_billing = $_POST['id_billing'];
$sql1 = "DELETE FROM billing_details WHERE id_billing = $id_billing" ;
$result1 = mysql_query( $sql1 );

$sql2 = "DELETE FROM billing WHERE id_billing = $id_billing" ;
$result2 = mysql_query( $sql2 );

header('Location: index.php');

}

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
        	<tr class="active"><th>Invoice No</th><th>M/s</th><th>Date</th><th>VRN/TIN No</th><th>Transport-Co</th>
			<th>GR/RR No</th><th>Dated</th><th>Amount</th><th>Tax</th><th>Tax Amount</th><th>Gross total</th><th>view</th><th>delete</th>
			</tr></thead><tboby>
			<?php
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
			<tr>
			<td><? echo $row["invoice_no"] ?></td>
			<td><? echo $row["bill_to"] ?></td>
			<td><? echo $row["invoice_date"] ?></td>
			<td><? echo $row["tin_no"] ?></td>
			<td><? echo $row["transport_co"] ?></td>
			<td><? echo $row["gr_rr_no"] ?></td>
			<td><? echo $row["bill_dated"] ?></td>
			<td><? echo $row["bill_amount"] ?></td>
			<td><? echo $row["tax"] ?></td>
			<td><? echo $row["tax_value"] ?></td>
			<td><? echo $row["g_total"] ?></td>

			<td><a target="_blank" href='billing_view.php?id_billing=<? echo $row['id_billing'] ?>'><button>View</button></td>

			<td>
				<form method = "post" action = "<?php $_PHP_SELF ?>" onsubmit="return confirm('Do you really want to Delete row?');">
				<input name = "id_billing" value='<? echo $row["id_billing"] ?>' type='hidden'> 
				<input name = "delete" type = "submit" id = "delete" value = "Delete">
				</form>
			</td>


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
