
<!DOCTYPE html>
<html>
<head>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
		<form id="addinvoice" class="form-horizontal" action="invoice_submit.php" method="POST">

		<table id="invoice_table1" class="invoice_table table table-bordered table-responsive table-condensed">
			<thead>
				<tr class="active"><th>In Challan-No</th><th>In-date</th><th>Artical</th><th>Quantity</th><th>Outgoing</th>
			<th>Out-Date</th><th>Out-Challan-No</th><th>Balance</th><th>Rejection</th><th>Submit</th>
			</tr></thead>
			<tbody>
			<tr>
				<td><input class="form-control" id ="invoice_no" name ="invoice_no" value="" ></td>
				<td><input class="form-control" id ="in_date" name ="invoice_date" value=""></td>
				<td>
					<select class="form-control" id="tax_type1" name="component">
						<option>None</option>
						<option>Hawkins STD</option>
						<option>MissMarry STD</option>
						<option>Hawkins Baby</option>
						<option>MissMarry STD</option>
						<option>Hawkins mini</option>
						<option>MissMarry mini</option>
						<option>Inter</option>
						<option>3Lt W</option>
						<option>Futurua</option>
						<option>Inside Emery</option>
					</select>			
				</td>
				<td><input class="form-control" id ="tax_type1" name ="tax_type1" value=""></td>
				<td><input class="form-control" id ="tax_type1_amount" name ="tax_type1_amount" value=""></td>
				<td><input class="form-control" id ="tax_type1" name ="tax_type1" value=""></td>
				<td><input class="form-control" id ="tax_type1_amount" name ="tax_type1_amount" value=""></td>
				<td><input class="form-control" id ="tax_type1" name ="tax_type1" value=""></td>
				<td><input class="form-control" id ="tax_type1_amount" name ="tax_type1_amount" value=""></td>
				<td><button type="submit" class="btn btn-primary">Submit</button></td>
			</tr>
			</tbody>
			
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
