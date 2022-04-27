<?php
	session_start();
	include('includes/config.php');
	date_default_timezone_set('Asia/Kolkata');
	include('includes/checklogin.php');
	check_login();
	$aid=$_SESSION['id'];
	if(isset($_POST['update']))
	{
    $slot = $_POST['slot'];
	echo $slot;
	
    $sql = "UPDATE `parking_slot` SET  `status` = 'OCCUPIED' WHERE `parking_slot`.`id` = $slot ";
	$mysqli->query($sql);
	if ($mysqli->affected_rows > 0) {
		echo "<script>alert('Parking slot occupied!');</script>";
	}
	else{
		echo "<script>alert('Failed to select');</script>";
	}
	}
	
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Profile Updation</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style1.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>
    
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
	<?php	
		$aid=$_SESSION['id'];
			$ret="select * from guest where SSN=?";
				$stmt= $mysqli->prepare($ret) ;
			$stmt->bind_param('i',$aid);
			$stmt->execute() ;
			$res=$stmt->get_result();
			
			while($row=$res->fetch_object())
			{
				?>	
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Select Parking Slot </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">


</div>
									

<div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">

								

<div class="form-group">
<label class="col-sm-2 control-label">Parking Slot </label>
<div class="col-sm-8">
<select name="slot" id="room"class="form-control"   required> 
<option value="">Select Slot</option>

<?php 
	$query ="SELECT `id`,`Slot` FROM `parking_slot` WHERE `Status` = 'FREE';";
	$stmt2 = $mysqli->prepare($query);
	$stmt2->execute();
	$res=$stmt2->get_result();
	while($row=$res->fetch_object())
	{
?>
<option value="<?php echo $row->id;?>"> <?php echo $row->Slot;?></option>
<?php } ?>
</select> 
</div>
</div>
<?php } ?>

						



<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="update" Value="Select Slot" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</html>