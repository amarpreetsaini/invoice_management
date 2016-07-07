<?PHP
$con=mysql_connect("localhost","invoice_user","invoice_user")or
    die("Could not connect: " . mysql_error());;
// Check connection

mysql_select_db('invoice_management', $con) or die('Could not select database.');


$sql_count_component = "select count(*) as component_count FROM component_invoices";
$sql_count_lid = "select count(*) as lid_count FROM lid_invoices";

$result_component = mysql_query($sql_count_component);
$result_lid = mysql_query($sql_count_lid);

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
                    <h3 class="page-header">Reports</h3>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                    <div class="panel-heading">
					<h3 class="panel-title">Component Invoices</h3>                    
						</div>                    
                    <div class="panel-body">                    
						<div class="">Total Invoices : <?	while ($row = mysql_fetch_array($result_component, MYSQL_ASSOC)) { echo $row["component_count"]; }?>						
						</div>
					  <ul class="pager">
						<li><a href="component_invoice_report.php">view all</a></li>
					  </ul>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="panel panel-default">
                    <div class="panel-heading">
					<h3 class="panel-title">Lid Invoices</h3>                    
						</div>                    
                    <div class="panel-body">                    
						<div class="">Total Invoices : <?	while ($row = mysql_fetch_array($result_lid, MYSQL_ASSOC)) { echo $row["lid_count"]; }?>						
						</div>
					  <ul class="pager">
						<li><a href="lid_invoice_report.php">view all</a></li>
					  </ul>
                    </div>
                    </div>
                </div>

                <!-- /.col-lg-12 -->
            </div>

		<div class="row">
		<div class="col-md-12">

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
