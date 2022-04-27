<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{
	$Guest_ID = $_POST['Guest_ID'];
	$Hotel_ID = 12113;
	$Room_no = $_POST['Room_no'];
	$Registration_date = $_POST['Registration_date'];
	$Check_in_date = $_POST['Check_in_date'];
	$Check_out_date = $_POST['Check_out_date'];
	$Discount = $_POST['Discount'];
	$Payment_Status = $_POST['Payment_Status'];

	$sql = "INSERT INTO `rents` (`Guest_ID`, `Hotel_ID`, `Room_no`, `Registration_date`, `Check_in_date`, `Check_out_date`, `Discount`, `Payment_Status`) VALUES ('$Guest_ID', '$Hotel_ID', '$Room_no', '$Registration_date', '$Check_in_date', '$Check_out_date', '$Discount', '$Payment_Status')";
	#sql = INSERT INTO `rents` (`Guest_ID`, `Hotel_ID`, `Room_no`, `Registration_date`, `Check_in_date`, `Check_out_date`, `Discount`, `Payment_Status`) VALUES ('1', '12213', '101', '2022-04-19', '2022-04-18', '2022-04-21', '20', 'INCOMPLETE') 
	$mysqli->query($sql);	
	echo "<script>alert('Room Rented Successfully');</script>";


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
	<title>Guest Registration</title>
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
<script>
function getSeater(val) {
	$.ajax({
	type: "POST",
	url: "get_seater.php",
	data:'roomid='+val,
success: function(data){
	$('#seater').val(data);
	}
});

	$.ajax({
	type: "POST",
	url: "get_seater.php",
	data:'rid='+val,
	success: function(data){
		$('#fpm').val(data);
	}
	});
}
</script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Booking for a Room </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Please fill all info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
			<?php
				$uid=$_SESSION['login'];
				$stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? ");
				$stmt->bind_param('s',$uid);
				$stmt->execute();
				$stmt -> bind_result($email);
				$rs=$stmt->fetch();
				$stmt->close();
				if($rs)
				{ ?>
			<h3 style="color: red" align="left">Room already booked for you</h3><h5>Click here to <a href="room-details.php"><u>check</u></a></h5>
				<?php }
				else{
							echo "";
							}			
							?>			
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Room Related info </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Room no. </label>
<div class="col-sm-8">
<select name="Room_no" id="room"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
<option value="">Select Room</option>

<?php 
	$query ="SELECT `Room_no` FROM `rents` WHERE `Payment_Status` = 'INCOMPLETE';";
	$stmt2 = $mysqli->prepare($query);
	$stmt2->execute();
	$res=$stmt2->get_result();
	while($row=$res->fetch_object())
	{
?>
<option value="<?php echo $row->Room_no;?>"> <?php echo $row->Room_no;?></option>
<?php } ?>
</select> 
<span id="room-availability-status" style="font-size:12px;"></span>

</div>
</div>
											


<div class="form-group">
<label class="col-sm-2 control-label">Check out</label>
<div class="col-sm-8">
<input type="date" name="Check_out_date" id="checkin"  class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Check in</label>
<div class="col-sm-8">
<input type="date" name="Check_in_date" id="checkout"  class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Registration Date</label>
<div class="col-sm-8">
<input type="date" name="Registration_date" id="checkout"   class="form-control" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Chose Special Facility </label>
<div class="col-sm-8">
<select name="facility" class="form-control" > 
<option value="">Select Facility</option>

<?php 
	$query ="SELECT * FROM `facilities`;";
	$stmt2 = $mysqli->prepare($query);
	$stmt2->execute();
	$res=$stmt2->get_result();
	while($row=$res->fetch_object())
	{
?>
<option value="<?php echo $row->Facilities_Code;?>"> <?php echo $row->Name;?></option>
<?php } ?>
</select> 
<span id="room-availability-status" style="font-size:12px;"></span>

</div>
</div>
											

<div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">Personal info </h4> </label>
</div>


<?php	
$aid=$_SESSION['id'];
	$ret="select * from guest where SSN=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>

<div class="form-group">
<label class="col-sm-2 control-label">Social Security Number : </label>
<div class="col-sm-8">
<input type="text" name="SSN" id="regno"  class="form-control" value="<?php echo $row->SSN;?>" readonly >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="First_Name" id="fname"  class="form-control" value="<?php echo $row->First_Name;?>" readonly>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="Last_Name" id="lname"  class="form-control" value="<?php echo $row->Last_Name;?>" readonly>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Guest ID : </label>
<div class="col-sm-8">
<input type="text" name="Guest_ID" value="<?php echo $row->Guest_ID;?>"  class="form-control" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id : </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->Email;?>"  readonly>
</div>
</div>
<?php } ?>

<div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">Payment Related Info </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Payment Status : </label>
<div class="col-sm-8">
<input type="text" name="Payment_Status" id="email"  class="form-control" value="INCOMPLETE"  readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Discount Status : </label>
<div class="col-sm-8">
<input type="text" name="Discount" id="email"  class="form-control" value="20"  readonly>
</div>
</div>

<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
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
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


<script type="text/javascript">

$(document).ready(function() {
	$('#duration').keyup(function(){
		var fetch_dbid = $(this).val();
		$.ajax({
		type:'POST',
		url :"ins-amt.php?action=userid",
		data :{userinfo:fetch_dbid},
		success:function(data){
	    $('.result').val(data);
		}
		});
		

})});
</script>

</html>