<?php
	session_start();
	include('includes/config.php');
	include('includes/checklogin.php');
	check_login();

	if(isset($_GET['del']))
	{
		$id=intval($_GET['del']);
        $adn = "update rents set Payment_Status='COMPLETE' where Guest_ID=?;";
			$stmt= $mysqli->prepare($adn);
			$stmt->bind_param('i',$id);
			$stmt->execute();
			$stmt->close();	   
			echo "<script>alert('Payment Cleared!');</script>" ;
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
	<title>Recent Transactions</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style1.css">
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
						<h2 class="page-title">Recent Transactions</h2>

                        <div class="panel panel-default">
							<div class="panel-heading">Incomplete Transactions </div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                            <th>Guest ID</th>
                                            <th>Hotel ID</th>
                                            <th>Room no</th>
                                            <th>Registration date</th>
                                            <th>Check in</th>
                                            <th>Check out</th>
                                            <th>Booked days</th>
                                            <th>Payment</th>
                                            <th> Clear<br/> Transaction </th>
										</tr>
									</thead>
									<tbody>
                                    <?php	
                                    $aid=$_SESSION['id'];
                                        $ret="select * from rents where payment_status='INCOMPLETE'"; // query !!
                                        $stmt= $mysqli->prepare($ret) ;
                                        //$stmt->bind_param('i',$aid);
                                        $stmt->execute() ;//ok
                                        $res=$stmt->get_result();
                                        $cnt=1;
                                        while($row=$res->fetch_object())
                                        {
                                            ?>
                                        <td><?php echo $row->Guest_ID;?></td>
                                        <td><?php echo $row->Hotel_ID;?></td>
                                        <td><?php echo $row->Room_no;?></td>
                                        <td><?php echo $row->Registration_date;?></td>
                                        <td><?php echo $row->Check_in_date;?></td>
                                        <td><?php echo $row->Check_out_date;?></td>
                                        <td><?php echo $row->Discount;?></td>
                                        <td><?php echo $row->Payment_Status;?></td>
                                        <td>                                        
	                                    <a href="manage-transactions.php?del=<?php echo $row->Guest_ID;?>" title="Delete Record" onclick="return confirm("Do you want to clear this payment?");"><i class="fa fa-close"></i></a>
                                    </td> 
                                    </tr>
                                    <?php
                                    $cnt=$cnt+1;
                                                    } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

                        <div class="panel panel-default">
							<div class="panel-heading">Transactions Completed </div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                            <th>Guest_ID</th>
                                            <th>Hotel_ID</th>
                                            <th>Room_no</th>
                                            <th>Registration_date</th>
                                            <th>Check_in_date</th>
                                            <th>Check_out_date</th>
                                            <th>Booked days</th>
                                            <th>Payment_Status</th>
										</tr>
									</thead>
									<tbody>
                                    <?php	
                                    $aid=$_SESSION['id'];
                                        $ret="select * from rents where payment_status='COMPLETE'"; // query !!
                                        $stmt= $mysqli->prepare($ret) ;
                                        //$stmt->bind_param('i',$aid);
                                        $stmt->execute() ;//ok
                                        $res=$stmt->get_result();
                                        $cnt=1;
                                        while($row=$res->fetch_object())
                                        {
                                            ?>
                                        <td><?php echo $row->Guest_ID;?></td>
                                        <td><?php echo $row->Hotel_ID;?></td>
                                        <td><?php echo $row->Room_no;?></td>
                                        <td><?php echo $row->Registration_date;?></td>
                                        <td><?php echo $row->Check_in_date;?></td>
                                        <td><?php echo $row->Check_out_date;?></td>
                                        <td><?php echo $row->Discount;?></td>
                                        <td><?php echo $row->Payment_Status;?></td>
                                    </tr>
                                    <?php
                                    $cnt=$cnt+1;
                                                    } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">Recent Transaction Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                            <th>Guest_ID</th>
                                            <th>Hotel_ID</th>
                                            <th>Room_no</th>
                                            <th>Registration_date</th>
                                            <th>Check_in_date</th>
                                            <th>Check_out_date</th>
                                            <th>Booked days</th>
                                            <th>Payment_Status</th>
										</tr>
									</thead>
									<tbody>
                                    <?php	
                                    $aid=$_SESSION['id'];
                                        $ret="select * from rents"; // query !!
                                        $stmt= $mysqli->prepare($ret) ;
                                        //$stmt->bind_param('i',$aid);
                                        $stmt->execute() ;//ok
                                        $res=$stmt->get_result();
                                        $cnt=1;
                                        while($row=$res->fetch_object())
                                        {
                                            ?>
                                        <td><?php echo $row->Guest_ID;?></td>
                                        <td><?php echo $row->Hotel_ID;?></td>
                                        <td><?php echo $row->Room_no;?></td>
                                        <td><?php echo $row->Registration_date;?></td>
                                        <td><?php echo $row->Check_in_date;?></td>
                                        <td><?php echo $row->Check_out_date;?></td>
                                        <td><?php echo $row->Discount;?></td>
                                        <td><?php echo $row->Payment_Status;?></td>
                                    </tr>
                                    <?php
                                    $cnt=$cnt+1;
                                                    } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
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
