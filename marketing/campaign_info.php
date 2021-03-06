<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

if(isset($_SESSION['uEmail'])){    

    global $connect;
    $con = $connect;

    $id = $_GET['id'];

    $sql="select * from tbl_campaign WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $promocode=$row['promo_code'];
        $promotype=$row['promo_type'];
        $promodiscount=$row['discount'];
        $startdate=$row['startDate'];
        $enddate=$row['endDate'];
        $promolimit=$row['promo_limit'];
        $notifytype=$row['notification_type'];
        $passengercount= getCount();
        $days = getDays($startdate, $enddate);
        $sendstatus ="1";
    }//end while
?> 

<!DOCTYPE html>
<html>
    <head>
        <head>
	<title>Marketing | Campaign Details</title>
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
        <style>
            .table th, .table td {
            border: 1px !important;
        }
        </style>
        
        </head>

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
                                                    <a href="#subPages" data-toggle="collapse" class="collapse"><i class="lnr lnr-car"></i> <span>Fleet Tracking</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                    <div id="subPages" class="collapse ">
                                                            <ul class="nav">
                                                                <li><a href="dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="track.php" class="">Track</a></li>
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
									  <li><a href="../dispatcher/dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="../dispatcher/dispatch.php" class="">Dispatch</a></li>
                                                                    <li><a href="../dispatcher/manage_bookings.php" class="">Manage Bookings</a></li>
                                                                    <li><a href="../dispatcher/settings.php" class="">Settings </a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-briefcase"></i> <span>Revenue</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
                                                                    <li><a href="../revenue/dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="../revenue/transactions.php" class="">Transactions</a></li>
									<li>
                                                                        <a href="#subPages3a" data-toggle="collapse" class="collapsed"><span>Expense Management</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages3a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="../revenue/expense_category.php" class="">Expense Category</a></li>
                                                                                <li><a href="../revenue/expense.php" class="">Expense</a></li>
                                                                                <li><a href="../revenue/payout.php" class="">Payout</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages4" data-toggle="collapse" class="active"><i class="lnr lnr-bullhorn"></i> <span>Marketing</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages4" class="active ">
								<ul class="nav">
                                                                    <li><a href="dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="campaign.php" class="active">Campaign</a></li>
                                                                    <li>
                                                                        <a href="#subPages4a" data-toggle="collapse" class="collapsed"><span>Settings</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="templates.php" class="">Templates</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                     <li>
                                                                        <a href="#subPages4b" data-toggle="collapse" class="collapsed"><span>Consumers</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4b" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="manage_consumers.php" class="">Manage Consumers</a></li>
                                                                                <li><a href="consumer_wallet.php" class="">Consumer Wallet Log</a></li>
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
                                                                    <li><a href="../analytics/dashboard.php" class="">Dashboard</a></li>
                                                                        <li>
                                                                        <a href="#subPages5a" data-toggle="collapse" class="collapsed"><span>Report</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages5a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="../analytics/transaction_history.php" class="">Transaction History</a></li>
                                                                                <li><a href="../analytics/expense_history.php" class="">Expenses History</a></li>
                                                                                <li><a href="../analytics/consumer_report.php" class="">Consumer Report</a></li>
                                                                                <li><a href="../analytics/fleet_report.php" class="">Fleet Report</a></li>
                                                                                <li><a href="../analytics/driver_report.php" class="">Driver Report</a></li>
                                                                                <li><a href="../analytics/company_report.php" class="">Company Report</a></li>
                                                                                <li><a href="../analytics/consumer_logs.php" class="">Consumer Logs</a></li>
                                                                                <li><a href="../analytics/user_logs.php" class="">User Logs</a></li>
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
                                                                    <!--<li><a href="../settings/site_settings.php" class="">Site Settings</a></li>
                                                                    <li><a href="../settings/theme_settings.php" class="">Manage Theme Settings</a></li>
                                                                    <li><a href="../settings/smtp_settings.php" class="">SMTP Mail Settings</a></li>-->
                                                                    <li><a href="../settings/sms_templates.php" class="">SMS Templates</a></li>
                                                                    <li><a href="../settings/email_templates.php" class="">Email Templates</a></li>
                                                                    <li><a href="../settings/manage_contacts.php" class="">Manage Contacts</a></li>
                                                                    <!--<li><a href="../settings/manage_cms.php" class="">Manage CMS</a></li>-->
                                                                    <li>
                                                                        <a href="#subPages6a" data-toggle="collapse" class=""><span>Payments</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages6a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="../settings/widthdrawal_payment.php" class="">Widthdrawal Payment Mode</a></li>
                                                                                <li><a href="../settings/payments.php" class="">Payment Modes</a></li>
                                                                                <li><a href="../settings/settings.php" class="">Settings</a></li>
                                                                        </div>
                                                                    </li>
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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Campaign Details</li>
                    </ol>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
                                            <div class="panel-body">
                                                <?php
                                                global $connect;
                                                $signedUpUsers ='0';
                                                $bookedInUsers = '0';
                                                $revenue= '0.00';
                                                
                                                ?>
							<div class="row">
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
                                                                                    <span class="number"><?php echo $signedUpUsers; ?></span>
											<span class="title">Signed Up Users</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
                                                                            <span class="icon" style="background-color: green;"><i class="fa fa-user-circle "></i></span>
										<p>
											<span class="number"><?php echo $bookedInUsers;?></span>
											<span class="title">Booked In Users</span>
										</p>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"style="background-color: red;"><i class="fa fa-user-circle-o"></i></span>
										<p>
											<span class="number"><?php echo $revenue;?></span>
											<span class="title">Revenue</span>
										</p>
									</div>
								</div>
							</div>
                                                	
						</div>
                 
                                      </div>   
					<!-- END OVERVIEW -->
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                 <h3 class="panel-title">User Activity (Login, Sign-In, Booking)</h3>
                                                <div class="right">
                                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                                </div>
                                            </div>
                                            <div class="panel-body">
							<div class="row">
								<div class="">
									<div id="user_signup" style = "margin: 0 auto"></div>
								</div>
							</div>
						</div>
					</div>
                                        
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Campaign Information</h3>
                                                <div class="right">
                                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                                </div>
                                            </div>
                                            <div class="panel-body">
							<div class="row">
                                                            <table class="table table-responsive" >
                                                                <tr>
                                                                    <td>Promo Code:</td>
                                                                    <td><?php echo $promocode;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Promotion Type:</td>
                                                                    <td><?php echo $promotype;?></td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>Promo code Discount (%):</td>
                                                                    <td><?php echo $promodiscount;?></td>
                                                                </tr>
                                                                   <tr>
                                                                    <td>Start Date:</td>
                                                                    <td><?php echo $startdate;?></td>
                                                                </tr>
                                                                   <tr>
                                                                    <td>Expiry Date:</td>
                                                                    <td><?php echo $enddate;?></td>
                                                                </tr>
                                                                   <tr>
                                                                    <td>Promo Limit:</td>
                                                                    <td><?php echo $promolimit;?></td>
                                                                </tr>
                                                                   <tr>
                                                                    <td>Notification Type:</td>
                                                                    <td><?php echo $notifytype;?></td>
                                                                </tr>
                                                                   <tr>
                                                                    <td>Passenger count:</td>
                                                                    <td><?php echo $passengercount;?></td>
                                                                </tr>
                                                                   <tr>
                                                                    <td>Days:</td>
                                                                    <td><?php echo $days;?></td>
                                                                </tr>
                                                                   <tr>
                                                                    <td>Send Status:</td>
                                                                    <td><?php echo $sendstatus;?></td>
                                                                </tr>
                                                            </table>
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
				<p class="copyright">&copy; 2018 <a href="#" target="_blank">Michrosys</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
        <script>
            function myMap() {
                var mapProp= {
            center:new google.maps.LatLng(6.465422,3.406448),
            zoom:5,
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
        </script>
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
         <script src="http://code.highcharts.com/stock/highstock.js"></script>
         <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH8TlxMrucCoApyot668dIApkq8jK_iiM&callback=myMap"></script>
    	
</body>
</html>
<?php
}
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>