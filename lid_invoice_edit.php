<?php
/*** begin our session ***/
// Check connection
$con=mysql_connect("localhost","invoice_user","invoice_user")or
    die("Could not connect: " . mysql_error());;

mysql_select_db('invoice_management', $con) or die('Could not select database.');
$lid_invoice_id = $_GET['lid_invoice_id'];


if($_POST){

$in_date = filter_var($_POST['in_date'], FILTER_SANITIZE_STRING);
$in_challan_no = filter_var($_POST['in_challan_no'], FILTER_SANITIZE_STRING);
$artical = filter_var($_POST['artical'], FILTER_SANITIZE_STRING);
$quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
$outgoing = filter_var($_POST['outgoing'], FILTER_SANITIZE_STRING);
$out_date = filter_var($_POST['out_date'], FILTER_SANITIZE_STRING);
$out_challan_no = filter_var($_POST['out_challan_no'], FILTER_SANITIZE_STRING);
$balance = filter_var($_POST['balance'], FILTER_SANITIZE_STRING);
$rejection = filter_var($_POST['rejection'], FILTER_SANITIZE_STRING);

$sql_insert = "UPDATE lid_invoices SET in_date='$in_date',in_challan_no='$in_challan_no',artical='$artical',quantity='$quantity',outgoing='$outgoing',out_date='$out_date',out_challan_no='$out_challan_no',balance='$balance',rejection='$rejection' WHERE lid_invoice_id='$lid_invoice_id'";

$result_insert = mysql_query($sql_insert);

if (!$result_insert) {
    die('Invalid query: ' . mysql_error());
}

}

$sql = "select *  FROM lid_invoices WHERE lid_invoice_id='$lid_invoice_id'";
$result = mysql_query($sql);

mysql_close($con);

?>

<!DOCTYPE html>
<html>
<head>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/jquery-ui.css">
    <link href="css/steps.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Lid inward/Outward Status</title>

</head>
<body>
    <div id="wrapper">
	<?php include 'navigation.php';?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="page-header">Lid inward/Outward Status</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

		<div class="row">
		<div class="col-md-12">
		<form id="addinvoice" class="form-horizontal" action="" method="POST">
		<input type="hidden" name="lid_invoice_id" value="<?php echo $_GET['lid_invoice_id']?>">

		<table id="invoice_table1" class="invoice_table table table-bordered table-responsive table-condensed">
		<? while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
			<thead>
				<tr class="active"><th>In Challan-No</th><th>In-date</th><th>Artical</th><th>Quantity</th><th>Outgoing</th>
			<th>Out-Date</th><th>Out-Challan-No</th><th>Balance</th><th>Rejection</th><th>Update</th>
			</tr></thead>
			<tbody>
			<tr>
				<td><input class="form-control" id ="in_challan_no" name ="in_challan_no" value="<?php echo $row['in_challan_no']?>" required="required"></td>
				<td><input class="form-control" id ="in_date" name ="in_date" value="<?php echo $row['in_date']?>" required="required"></td>
				<td width="150px">
					<select class="form-control" id="artical" name="artical" required="required" >
						<option value=""><?php echo $row['artical']?></option>
						<option value="Hawkins STD">Hawkins STD</option>
						<option value="MissMarry STD">MissMarry STD</option>
						<option value="Hawkins Baby">Hawkins Baby</option>
						<option value="MissMarry STD">MissMarry STD</option>
						<option value="Hawkins mini">Hawkins mini</option>
						<option value="MissMarry mini">MissMarry mini</option>
						<option value="Inter">Inter</option>
						<option value="3Lt W">3Lt W</option>
						<option value="Futurua">Futurua</option>
						<option value="Inside Emery">Inside Emery</option>
					</select>			
				</td>
				<td><input class="form-control" id ="quantity" name ="quantity" value="<?php echo $row['quantity']?>" required="required"></td>
				<td><input class="form-control" id ="outgoing" name ="outgoing" value="<?php echo $row['outgoing']?>" required="required"></td>
				<td><input class="form-control" id ="out_date" name ="out_date" value="<?php echo $row['out_date']?>" required="required"></td>
				<td><input class="form-control" id ="out_challan_no" name ="out_challan_no" value="<?php echo $row['out_challan_no']?>" required="required"></td>
				<td><input class="form-control" id ="balance" name ="balance" value="<?php echo $row['balance']?>" required="required"></td>
				<td><input class="form-control" id ="rejection" name ="rejection" value="<?php echo $row['rejection']?>" required="required"></td>
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


	<script src="js/jquery.steps.js" ></script>
	<script src="dist/js/jquery.validate.js" ></script>
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
  <script src="dist/js/jquery-ui.js"></script>
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
