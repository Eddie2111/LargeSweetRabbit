<link rel="stylesheet" href="../hostel.css">

<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<br/><br/>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
<li><a href="change-password.php"><i class="fa fa-key"></i>Change Password</a></li>
<li><a href="book-dorm.php"><i class="fa fa-pencil-square-o"></i>Dorm Registration</a></li>
<li><a href="room-details.php"><i class="fa fa-files-o" aria-hidden="true"></i>Dorm Details</a></li>

<?php } else { ?>
				
				<li><a href="registration.php"><i class="fa fa-files-o"></i> User Registration</a></li>
				<li><a href="login.php"><i class="fa fa-users"></i> User Login</a></li>
				<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
				<?php } ?>

			</ul>
		</nav>
