<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,SSN FROM guest WHERE email=? and password=? ");
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

			 
# // geo plugins // #
$ip=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
# // geo plugins // #

$city = $addrDetailsArr['geoplugin_city'];
$country = $addrDetailsArr['geoplugin_countryName'];
$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
$mysqli->query($log);
if($log)
{
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
	<title>Guest Login</title>
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
						<h2 class="page-title">User Login </h2>

						<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							<div class="cardAlpha">
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Email</label>
									<input type="text" placeholder="Email" name="email" class="form-control mb" id="styling">
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb" id="styling">
									<input type="submit" name="login" class="btn btn-primary btn-block" value="login" >
								</form>
							</div>
								<center>
									<br/>
								<p> <font color="black"><a href="forgot-password.php">Forgot Password? </a></font></p>
								<p>No account? <a href = "registration.php">Register Today</a></p>
								</center>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="forgot-password.php" class="text-light">Forgot password?</a>
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