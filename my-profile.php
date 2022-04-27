<?php
	session_start();
	include('includes/config.php');
	date_default_timezone_set('Asia/Kolkata');
	include('includes/checklogin.php');
	check_login();
	$aid=$_SESSION['id'];
	if(isset($_POST['update']))
	{
	$SSN	= $_POST['ssn'];
	$Guest_ID=$_POST['Guest_ID'];
	$fname	= $_POST['fname'];
	$lname	= $_POST['lname'];
	$email	= $_POST['email'];
	$DateofBirth = $_POST['dob'];
	$sql = "UPDATE `guest` SET `SSN`='".$SSN."', `First_Name`='".$fname."', `Last_Name`='".$lname."', `Email`='".$email."', `Date_of_Birth`='".$DateofBirth."',`Guest_ID`='".$aid."' WHERE `SSN`='".$SSN."'";
	$mysqli->query($sql);
	if ($mysqli->affected_rows > 0) {
		echo "<script>alert('Profile Updated Successfully');</script>";
	}
	else{
		echo "<script>alert('Profile Not Updated');</script>";
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
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
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
						<h2 class="page-title"><?php echo $row->First_Name;?>'s&nbsp;Profile </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">


</div>
									

<div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
								
								

<div class="form-group">
<label class="col-sm-2 control-label"> Social Security Number: </label>
<div class="col-sm-8">
<input type="text" name="ssn" id="regno"  class="form-control" required="required" value="<?php echo $row->SSN;?>" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->First_Name;?>"   required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row->Last_Name;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Guest ID : </label>
<div class="col-sm-8">
<input type="text" name="Guest_ID" id="lname"  class="form-control" value="<?php echo $row->Guest_ID;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Date of Birth : </label>
<div class="col-sm-8">
<input type="date" name="dob"  class="form-control" value="<?php echo $row->Date_Of_Birth;?>" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->Email;?>" >
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
<?php } ?>

						



<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="update" Value="Update Profile" class="btn btn-primary">
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