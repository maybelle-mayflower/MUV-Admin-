<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    
    $con = $connect;

    $id = $_GET['id'];

    $sql="select * from tbl_driver WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_status=$row[1];
        $first_name=$row[2];
        $last_name=$row[3];
        $email=$row[4];
        $license_id = $row['license_no'];
        $license_expiry = $row['license_expiry'];
        $mobile_no = $row['mobile'];
        $assigned_fleet = getDriverAssignment($id);
        $booking_limit = $row['booking_limit'];
        $rating = "-";
        $referal = "-";
        $company_name = $row['fleet_co'];
        $wallet_amount = "N0.00";
        $photo = $row['photo'];
    }//end while
?> 


<!DOCTYPE html>
<html>
    <head>
	<title>Fleet Tracking | Manage Driver</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/muvicon.JPG">
 
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.css"/>
 <!--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css"/>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">-->
 
 <style>
    .required:before { color: red; content:'*'; }
</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-link navbar-fixed-top">
			<!--<div class="brand">
                            <a href="index.html"><img src="assets/img/logo-dark2.jpg" alt="MUV Logo" class="img-responsive logo" style="height: 20px;"></a>
			</div>-->
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
                                            <li>
                                                <a href="#"><span>Help</span> <i class="icon-submenu lnr lnr-question-circle"></i></a>
                                            </li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span>Administrator</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="../logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="../index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li>
                                                    <a href="#subPages" data-toggle="collapse" class="active"><i class="lnr lnr-car"></i> <span>Fleet Tracking</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                    <div id="subPages" class="collapse ">
                                                            <ul class="nav">
                                                                <li><a href="dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="track.php" class="active">Track</a></li>
                                                                    <li>
                                                                        <a href="#subPagesa" data-toggle="collapse" class="collapsed"><span>Fleet Management</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPagesa" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="manage_company.php" class="">Manage Company</a></li>
                                                                                <li><a href="fleet_models.php" class="">Fleet Models</a></li>
                                                                                <li><a href="fleets.php" class="">Fleets</a></li>
                                                                                <li><a href="manage_assigned_fleets.php" class="">Manage Assigned Fleets</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                     <li>
                                                                        <a href="#subPagesb" data-toggle="collapse" class="collapsed"><span>Workforce</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPagesb" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="manage_dispatcher.php" class="">Manage Dispatchers</a></li>
                                                                                <li><a href="manage_drivers.php" class="">Manage Drivers</a></li>
                                                                                <li><a href="driver_ratings.php" class="">Driver Ratings</a></li>
                                                                                <li><a href="driver_wallet.php" class="">Driver Wallet</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                            </ul>
                                                    </div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Dispatcher</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Dashboard</a></li>
									<li><a href="page-login.html" class="">Dispatch</a></li>
									<li><a href="page-lockscreen.html" class="">Manage Bookings</a></li>
                                                                        <li><a href="page-lockscreen.html" class="">Settings </a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-briefcase"></i> <span>Revenue</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Dashboard</a></li>
									<li><a href="page-login.html" class="">Transactions</a></li>
									<li>
                                                                        <a href="#subPages3a" data-toggle="collapse" class="collapsed"><span>Expense Management</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages3a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="#" class="">Expense Category</a></li>
                                                                                <li><a href="#" class="">Expense</a></li>
                                                                                <li><a href="#" class="">Payout</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bullhorn"></i> <span>Marketing</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages4" class="collapse ">
								<ul class="nav">
                                                                    <li><a href="#" class="">Dashboard</a></li>
                                                                    <li><a href="#" class="">Campaign</a></li>
                                                                    <li>
                                                                        <a href="#subPages4a" data-toggle="collapse" class="collapsed"><span>Settings</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="#" class="">Templates</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                     <li>
                                                                        <a href="#subPages4b" data-toggle="collapse" class="collapsed"><span>Consumers</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4b" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="#" class="">Manage Consumers</a></li>
                                                                                <li><a href="#" class="">Consumer Wallet Log</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                            </ul>
							</div>
						</li>
						<li>
							<a href="#subPages5" data-toggle="collapse" class="collapsed"><i class="lnr lnr-chart-bars"></i> <span>Analytics</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages5" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Dashboard</a></li>
                                                                        <li>
                                                                        <a href="#subPages5a" data-toggle="collapse" class="collapsed"><span>Report</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages5a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="#" class="">Transaction History</a></li>
                                                                                <li><a href="#" class="">Expenses History</a></li>
                                                                                <li><a href="#" class="">Consumer Report</a></li>
                                                                                <li><a href="#" class="">Fleet Report</a></li>
                                                                                <li><a href="#" class="">Driver Report</a></li>
                                                                                <li><a href="#" class="">Company Report</a></li>
                                                                                <li><a href="#" class="">Consumer Logs</a></li>
                                                                                <li><a href="#" class="">User Logs</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages6" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages6" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Site Settings</a></li>
									<li><a href="page-login.html" class="">Manage Theme Settings</a></li>
									<li><a href="page-lockscreen.html" class="">SMTP Mail Settings</a></li>
									<li><a href="page-login.html" class="">Email Templates</a></li>
									<li><a href="page-lockscreen.html" class="">Manage Contacts</a></li>
                                                                        <li><a href="page-profile.html" class="">Manage CMS</a></li>
									<li><a href="page-login.html" class="">Payments</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="font-weight: bolder;">Driver Report</h4>
                                        </div>
                                        
                                        <div class="panel panel-headline">
                                                <div class="panel-body">
                                                    <?php
                                                    /*global $connect;
                                                    $totalFleet = getFleet();
                                                    $assignedFleet = getActiveFleet();
                                                    $unassignedFleet = getFleet() - getActiveFleet();
                                                    $activeFleet= 0;
                                                    $availableFleet=0;
                                                    $unavailableFleet=0;
                                                    $totalKM= getTotalKM();
                                                    $emptyKM=0;*/
                                                    ?>
                                                            <div class="row">
                                                                    <div class="col-md-4">
                                                                            <div class="metric">
                                                                                    <span class="icon"><i class="fa fa-percent"></i></span>
                                                                                    <p>
                                                                                        <span class="number">0</span>
                                                                                            <span class="title">Percentage of Availability</span>
                                                                                    </p>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="metric">
                                                                                <span class="icon" style="background-color: orange;"><i class="fa fa-users"></i></span>
                                                                                    <p>
                                                                                            <span class="number">0</span>
                                                                                            <span class="title">Completed Bookings</span>
                                                                                    </p>
                                                                            </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                            <div class="metric">
                                                                                    <span class="icon" style="background-color: red;"><i class="fa fa-bar-chart"></i></span>
                                                                                    <p>
                                                                                            <span class="number">0</span>
                                                                                            <span class="title">Total Revenues</span>
                                                                                    </p>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="metric">
                                                                                    <span class="icon" style="background-color: lightcoral;"><i class="fa fa-star"></i></span>
                                                                                    <p>
                                                                                        <span class="number">0</span>
                                                                                            <span class="title">Ratings</span>
                                                                                    </p>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="metric">
                                                                                <span class="icon" style="background-color: purple;"><i class="fa fa-users"></i></span>
                                                                                    <p>
                                                                                            <span class="number">0</span>
                                                                                            <span class="title">Balance</span>
                                                                                    </p>
                                                                            </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                            <div class="metric">
                                                                                    <span class="icon"style="background-color: green;"><i class="fa fa-money"></i></span>
                                                                                    <p>
                                                                                            <span class="number">0</span>
                                                                                            <span class="title">Paid</span>
                                                                                    </p>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>

                                            </div>
                                        
                                        <div class="modal-body row">
                                            
                                            <div class="container col-md-12">
                                            <div>
                                                <!--<img src="img/drivers/photo/<?php echo $license_id.$photo;?>" width='180' height='180' style=""/>-->
                                            </div>
                                                <div class="">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-sm-4 control-label" for="txtname">First Name:</label>
                                                        <div class="col-sm-6">
                                                            <p><?php echo $first_name?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-sm-4 control-label" for="txtname">Last Name:</label>
                                                        <div class="col-sm-6">
                                                            <p><?php echo $last_name?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-sm-4 control-label" for="txtemail">Email:</label>
                                                        <div class="col-sm-6">
                                                            <p><?php echo $email;?></p>
                                                        </div>
                                                    </div>
                                                     <div class="form-group col-md-6">
                                                        <label class="col-sm-4 control-label" for="txtname">Mobile Number:</label>
                                                        <div class="col-sm-6">
                                                            <p><?php echo $mobile_no;?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-sm-4 control-label" for="txtemail">Driver's license No:</label>
                                                        <div class="col-sm-6">
                                                            <p><?php echo $license_id;?></p>
                                                        </div>
                                                    </div>
                                                     <div class="form-group col-md-6">
                                                        <label class="col-sm-4 control-label" for="txtname">License Expiry Date:</label>
                                                        <div class="col-sm-6">
                                                            <p><?php echo $license_expiry;?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-sm-4 control-label" for="txtemail">Assigned Fleet:</label>
                                                        <div class="col-sm-6">
                                                            <p><a href="fleet_info2.php?id='<?php echo getFleetID($assigned_fleet)?>'"><?php echo $assigned_fleet;?></a></p>
                                                        </div>
                                                    </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label class="col-sm-4 control-label" for="txtemail">Booking Limit:</label>
                                                    <div class="col-sm-6">
                                                        <p><?php echo $booking_limit;?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-sm-4 control-label" for="txtconame">Rating Points:</label>
                                                    <div class="col-sm-6">
                                                        <p><?php echo $rating;?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="col-sm-4 control-label" for="txtfleet">Referal Code:</label>
                                                    <div class="col-sm-6">
                                                        <p><?php echo $referal;?></p>
                                                    </div>
                                                </div>

                                                 <div class="form-group col-md-6">
                                                    <label class="col-sm-4 control-label" for="txtdriver">Company Name:</label>
                                                    <div class="col-sm-6">
                                                        <p><?php echo $company_name;?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-sm-4 control-label" for="txtdispatcher">Wallet Amount:</label>
                                                    <div class="col-sm-6">
                                                        <p><?php echo $wallet_amount;?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-sm-4 control-label" for="txtdispatcher">Driver's License:</label>
                                                    <div class="col-sm-6">
                                                        <p><a href="#">Download License</a></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-sm-4 control-label" for="txtdispatcher">Driver's Photo</label>
                                                    <div class="col-sm-6">
                                                        <img src="img/drivers/photo/<?php echo $license_id.$photo;?>" width='180' height='180' style=""/>

                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                            
                                            
                                                
                                                <div class="row">
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Transactions</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
                                                                    <div class="row">
                                                                        <div id="driver_container">
                                                                            
                                                                        </div>
                                                                    </div>
								</div>
							</div>
							<!-- END MULTI CHARTS -->
						</div>
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Trips Statistics</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<div id="fleet_container">
                                                                            
                                                                        </div>
								</div>
							</div>
							<!-- END MULTI CHARTS -->
						</div>
					</div>
                                            
                                            
                                          <div class="row">
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">OnGoing Journey</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
                                                                    <div class="row">
                                                                        <div id="driver_container">
                                                                            
                                                                        </div>
                                                                    </div>
								</div>
							</div>
							<!-- END MULTI CHARTS -->
						</div>
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ship History</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<div id="fleet_container">
                                                                            
                                                                        </div>
								</div>
							</div>
							<!-- END MULTI CHARTS -->
						</div>
					</div>
                                            
                                    </div>    
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
</body>
</html>
<?php
}
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>