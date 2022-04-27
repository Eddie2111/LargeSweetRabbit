<?php
	session_start();
	include('includes/config.php');
	if(isset($_POST['login']))
	{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE email=? and password=? ");
					$stmt->bind_param('ss',$email,$password);
					$stmt->execute();
					$stmt -> bind_result($email,$password,$id);
					$rs=$stmt->fetch();
					$stmt->close();
					$_SESSION['id']=$id;
					$_SESSION['login']=$email;
					$uip=$_SERVER['REMOTE_ADDR'];
					$ldate=date('d/m/Y h:i:s', time());
					if($rs)
					{
				$uid=$_SESSION['id'];
				$uemail=$_SESSION['login'];
	$ip=$_SERVER['REMOTE_ADDR'];
	$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
	$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
	$city = $addrDetailsArr['geoplugin_city'];
	$country = $addrDetailsArr['geoplugin_countryName'];
	$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
	$mysqli->query($log);
	if($log){
		header("location:dashboard.php");
	}
}
	else
	{
		echo "<script>alert('Invalid Username/Email or password');</script>";
	}
}
				?>

<!doctype html>
<html lang="en" class="no-js">
<head>
<?php include "scripts_import.php"; ?>
	<title>Student Registration</title>
<script type="text/javascript">
function valid()
	{
	if(document.registration.password.value!= document.registration.cpassword.value){ 
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

				<div class="row">
					<div class="col-md-12">
					<br/><br/>
						<h2 class="page-title">Select an option </h2>

						<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<div class="container">
									<div class="cardBeta">
									
										Guest Signup 
									</div>
									<div class="cardBeta">
									<a target="_blank" href="https://icons8.com/icon/25048/user-rights">User Rights</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>	
										Admin
									</div>
									<div class="cardBeta">
										
										Guest Login
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

</html>