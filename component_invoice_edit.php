<?php
/*** begin our session ***/

$con=mysql_connect("localhost","invoice_user","invoice_user")or
    die("Could not connect: " . mysql_error());;

mysql_select_db('invoice_management', $con) or die('Could not select database.');
$invoice_id = $_GET['invoice_id'];


if($_POST){

$in_challan_no = filter_var($_POST['in_challan_no'], FILTER_SANITIZE_STRING);
$in_date = filter_var($_POST['in_date'], FILTER_SANITIZE_STRING);
$component = filter_var($_POST['component'], FILTER_SANITIZE_STRING);
$weight = filter_var($_POST['weight'], FILTER_SANITIZE_STRING);
$in_numbers = filter_var($_POST['in_numbers'], FILTER_SANITIZE_STRING);
$out_challan_no = filter_var($_POST['out_challan_no'], FILTER_SANITIZE_STRING);
$out_date = filter_var($_POST['out_date'], FILTER_SANITIZE_STRING);
$quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
$balance = filter_var($_POST['balance'], FILTER_SANITIZE_STRING);
$rejection = filter_var($_POST['rejection'], FILTER_SANITIZE_STRING);

$sql_update = "UPDATE component_invoices SET in_challan_no='$in_challan_no',in_date='$in_date',component='$component',weight='$weight',in_numbers='$in_numbers',out_challan_no='$out_challan_no',out_date='$out_date',quantity='$quantity',balance='$balance',rejection='$rejection' WHERE invoice_id='$invoice_id'";

$result_update = mysql_query($sql_update);

if (!$result_update) {
    die('Invalid query: ' . mysql_error());
}


}
$sql = "select *  FROM component_invoices WHERE invoice_id='$invoice_id'";
$result = mysql_query($sql);

mysql_close($con);

?>

<!DOCTYPE html>
<html>
<head>
<title>Techportal</title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="css/steps.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Component inward/Outward Status</title>

</head>
<body>
    <div id="wrapper">
	<?php include 'navigation.php';?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="page-header">Component Inward/Outward Status</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

		<div class="row">
		<div class="col-md-12">
		<form id="addinvoice" class="form-horizontal" action="" method="POST">
		<input type="hidden" name="invoice_id" value="<?php echo $_GET['invoice_id']?>">

		<table id="invoice_table1" class="invoice_table table table-bordered table-responsive table-condensed">
		<? while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>

			<thead>
				<tr class="active"><th>In ChallanNo</th><th>In-date</th><th>Component</th><th>Weight</th><th>In-Numbers</th>
			<th>Out Challan-No</th><th>Out-Date</th><th>Quantity</th><th>Balance</th><th>Rejection</th><th>Update</th>
			</tr></thead>
			<tbody>
			<tr>
				<td><input class="form-control" id ="in_challan_no" name ="in_challan_no" value="<?php echo $row['in_challan_no']?>" ></td>
				<td><input class="form-control" id ="in_date" name ="in_date" value="<?php echo $row['in_date']?>"></td>
				<td>
					<select class="form-control" id="component" name="component">
						<option><?php echo $row['component']?></option>
						<option value="ALM Cover Head">ALM Cover Head</option>
						<option value="ALM S.H.B.">ALM S.H.B.</option>
						<option value="S.S.Coil"> S.S.Coil</option>
						<option value="Brasswire">Brasswire</option>
					</select>			
				</td>
				<td><input class="form-control" id ="weight" name ="weight" value="<?php echo $row['weight']?>"></td>
				<td><input class="form-control" id ="in_numbers" name ="in_numbers" value="<?php echo $row['in_numbers']?>"></td>
				<td><input class="form-control" id ="out_challan_no" name ="out_challan_no" value="<?php echo $row['out_challan_no']?>"></td>
				<td><input class="form-control" id ="out_date" name ="out_date" value="<?php echo $row['out_date']?>"></td>
				<td><input class="form-control" id ="quantity" name ="quantity" value="<?php echo $row['quantity']?>"></td>
				<td><input class="form-control" id ="balance" name ="balance" value="<?php echo $row['balance']?>"></td>
				<td><input class="form-control" id ="rejection" name ="rejection" value="<?php echo $row['rejection']?>"></td>
				<td><button type="submit" class="btn btn-primary">Update</button></td>
			</tr>
			</tbody>
<?} ?>			
			
			</table>


</form>

</div>
</div>
	</div>
	</div>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<script src="js/jquery.steps.js" ></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" ></script>
    <script src="dist/js/sb-admin-2.js"></script>

<script>

var form = $("#example-form");
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        admin_password2: {
            equalTo: "#admin_password1"
        }
    }
});
form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
		form.submit();
        alert("Submitted!");
    }
});

</script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <script>
  $(function() {
    $( "#in_date" ).datepicker(
    { dateFormat: 'yy-mm-dd' }    
    );
  });
  </script>
     <script>
  $(function() {
    $( "#out_date" ).datepicker(
    { dateFormat: 'yy-mm-dd' }    
    );
  });
  </script>

</body>
</html>
