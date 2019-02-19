<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    
?>


<!DOCTYPE html>
<html>
    <head>
        <head>
	<title>Revenue | Dashboard</title>
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
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                                                    <a href="#subPages" data-toggle="collapse" class=""><i class="lnr lnr-car"></i> <span>Fleet Tracking</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                    <div id="subPages" class="collapse ">
                                                            <ul class="nav">
                                                                <li><a href="../fleet_tracking/dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="track.php" class="">Track</a></li>
                                                                    <li>
                                                                        <a href="#subPagesa" data-toggle="collapse" class="collapsed"><span>Fleet Management</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPagesa" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="../fleet_tracking/manage_company.php" class="">Manage Company</a></li>
                                                                                <li><a href="../fleet_tracking/fleet_models.php" class="">Fleet Models</a></li>
                                                                                <li><a href="../fleet_tracking/fleets.php" class="">Fleets</a></li>
                                                                                <li><a href="../fleet_tracking/manage_assigned_fleets.php" class="">Manage Assigned Fleets</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                     <li>
                                                                        <a href="#subPagesb" data-toggle="collapse" class="collapsed"><span>Workforce</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPagesb" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="../fleet_tracking/manage_dispatcher.php" class="">Manage Dispatchers</a></li>
                                                                                <li><a href="../fleet_tracking/manage_drivers.php" class="">Manage Drivers</a></li>
                                                                                <li><a href="../fleet_tracking/driver_ratings.php" class="">Driver Ratings</a></li>
                                                                                <li><a href="../fleet_tracking/driver_wallet.php" class="">Driver Wallet</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                            </ul>
                                                    </div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapse"><i class="lnr lnr-users"></i> <span>Dispatcher</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
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
							<a href="#subPages3" data-toggle="collapse" class="active"><i class="lnr lnr-briefcase"></i> <span>Revenue</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
                                                                    <li><a href="dashboard.php" class="active">Dashboard</a></li>
                                                                    <li><a href="transactions.php" class="">Transactions</a></li>
									<li>
                                                                        <a href="#subPages3a" data-toggle="collapse" class="collapsed"><span>Expense Management</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages3a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="expense_category.php" class="">Expense Category</a></li>
                                                                                <li><a href="expense.php" class="">Expense</a></li>
                                                                                <li><a href="payout.php" class="">Payout</a></li>
                                                                            </ul>
                                                                        </div
                                                                    </li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bullhorn"></i> <span>Marketing</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages4" class="collapse ">
								<ul class="nav">
                                                                    <li><a href="../marketing/dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="../marketing/campaign.php" class="">Campaign</a></li>
                                                                    <li>
                                                                        <a href="#subPages4a" data-toggle="collapse" class="collapsed"><span>Settings</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="../marketing/templates.php" class="">Templates</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                     <li>
                                                                        <a href="#subPages4b" data-toggle="collapse" class="collapsed"><span>Consumers</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4b" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="../marketing/manage_consumers.php" class="">Manage Consumers</a></li>
                                                                                <li><a href="../marketing/consumer_wallet.php" class="">Consumer Wallet Log</a></li>
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
                        <li class="breadcrumb-item active">Revenue Dashboard</li>
                    </ol>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline" style="">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Revenue Overview</h3>
                                                <div class="right">
                                                    <form class="form-inline">
                                                        <div class="input-group mb-2 mr-sm-2">
                                                            <p id="filterdate_warning"></p>
                                                        </div>
                                                        <input type="text" class="form-control mb-2 mr-sm-2" id="startdate" placeholder="Start Date">
                                                        <div class="input-group mb-2 mr-sm-2">
                                                          <input type="text" class="form-control" id="enddate" placeholder="End Date">
                                                        </div>
                                                        <input type="button" onclick="datedFleet()" class="btn btn-default mb-2" style="float: right;" id="filter" value="Go"/> 
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel-body" id="full_overview">
                                                <?php
                                                global $connect;
                                                $totalCharge = getTotalPayment();
                                                $payingUsers = getTotalPassengers();
                                                $paidTrips = getAvgTrips();
                                                $avgRev = $totalCharge/$payingUsers;
                                                $avgRev = number_format($avgRev, 2);
                                                
                                                $cancRev = totalCancellationCharge();
                                                $avgCancRev = $cancRev/$payingUsers;
                                                $avgCancRev = number_format($avgCancRev, 2);
                                                
                                                
                                                $avgTripRev = $totalCharge/$paidTrips;
                                                $avgTripRev = number_format($avgTripRev, 2);
                                                
                                                
                                                ?>
							<div class="row">
								<div class="col-md-4">
									<div class="metric">
                                                                            <img class="icon" style="background-color: wheat;"src="../assets/icons/userrevenue_icon.png">
										<p>
                                                                                    <span class="number">₦<?php echo $avgRev?></span>
											<span class="title">Average Revenue per User</span>
										</p>
									</div>
								</div>
                                                            <div class="col-md-4">
									<div class="metric">
                                                                            <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/triprevenue_icon.png">
										<p>
											<span class="number">₦<?php echo $avgTripRev ?></span>
											<span class="title">Average Revenue per Trip </span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
                                                                            <img class="icon" style="background-color: lightsalmon;"src="../assets/icons/cancelrevenue_icon.png">
										<p>
											<span class="number">₦<?php echo $avgCancRev;?></span>
											<span class="title">Average Cancellation Revenue per User </span>
										</p>
									</div>
								</div>
							
							</div>
                                                	
						</div>
                 
                                      </div>   
					<!-- END OVERVIEW -->
                                      
                                        <!--MAP section-->
                                        <?php
                                        $data = dailyTotalCharge();
                                        $data22 = dailyTrips(); 
                                        ?>
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="font-weight: bold;">Trip Revenue Graph</h3>
                                                <div class="right">
                                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                                </div>
                                            </div>
                                            <div class="panel-body">
							<div class="row">
								<div class="">
									<div id="trip_rev" style = "margin: 0 auto"></div>
								</div>
							</div>
						</div>
					</div>
                                        <?php
                                           $data_avg = avgRevPerUser();
                                            ?>
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="font-weight: bold;">Average User Revenue Graph</h3>
                                                <div class="right">
                                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                                </div>
                                            </div>
                                            <div class="panel-body">
							<div class="row">
								<div class="">
									<div id="avg_rev" style = "margin: 0 auto"></div>
								</div>
							</div>
						</div>
					</div>
                                        <!--end map section-->
                                        
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="font-weight: bold;">Revenue vs Expenses</h3>
                                                <div class="right">
                                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                                </div>
                                            </div>
                                            <div class="panel-body">
							<div class="row">
								<div class="">
									<div id="book_exp" style = "margin: 0 auto"></div>
								</div>
							</div>
						</div>
					</div>
                                        
					  <?php
                                                global $connect;
                                                $totalPayment = getTotalPayment();
                                                $tot = number_format($totalPayment, 2);
                                                $cashPayment = getCashPayment();
                                                $walletPayment= getWalletPayment();
                                                
                                                $cash = ($cashPayment/$totalPayment)*100;
                                                $wallet = ($walletPayment/$totalPayment)*100;
                                                ?>
					<div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="font-weight: bold;">Payment Mode</h3>
                                                <div class="right">
                                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                                </div>
                                            </div>
                                            <div class="panel-body">
							<div class="row">
								<div id="payments_container">
                                                                            
                                                                </div>
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script>
            $(function () {
            var cash = <?php echo $cash; ?>;
            var wallet = <?php echo $wallet; ?>;
            var total =<?php echo $totalPayment; ?>;
            var tot = total.toFixed(2);
            
            Highcharts.chart('payments_container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total:  ₦'+tot
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            subtitle:{
                text: 'Note : Trip count get additionally accountable if passenger paid by both promotional and referral',
                align: 'left'
            },
            
            series: [{
                name: 'Payment Type',
                colorByPoint: true,
                data: [{
                    name: 'Cash Payments: ₦ '+<?php echo $cashPayment;?>,
                    y: cash, color: '#DFA49B'
                }, {
                    name: 'Wallet Payments: ₦ '+<?php echo $walletPayment;?>,
                    y: wallet, color: '#8BA4D7'
                    //sliced: true,
                    //selected: true
                },
                {
                    name: 'Promotional Payments: ₦ 0',
                    y: 0, color: 'yellow'
                    //sliced: true,
                    //selected: true
                },
                {
                    name: 'Card Payments: ₦ 0',
                    y: 0, color: 'purple'
                    //sliced: true,
                    //selected: true
                }]
            }]
        });
        
 });
</script>

<script>
   $(function () {
        Highcharts.chart('trip_rev', {
        chart: {
            inverted: false,
            zoomType: 'xy'
        },
        title: {
            text: '',
            align:'left'
        },rangeSelector:{
            enabled: true
        },
        xAxis: [{
            type: 'datetime',
            gridLineWidth: 1,
            minRange: 14 * 24 * 3600000
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                gridLineWidth: 1,
                
            },
            title: {
                text: ''
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Revenue'
            },
            labels: {
                format: '{value} ₦'
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
            title: {
                text: 'No of Trips'
            },
            labels: {
                format: '{value} '
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
          enabled: true
        },
        series: [{
            name: 'Revenue',
            type: 'spline',
            yAxis: 1,
            data: [<?php echo join($data, ','); ?>],
            tooltip: {
                valueSuffix: ' ₦'
            }

        }, {
            name: 'No of Trips',
            type: 'spline',
            yAxis: 2,
            data: [<?php echo join($data22, ','); ?>],
            marker: {
                enabled: false
            }
        }]
    });
    
    
    
    Highcharts.chart('avg_rev', {
        chart: {
            inverted: false,
            zoomType: 'xy'
        },
        title: {
            text: '',
            align: 'left'
        },rangeSelector:{
            enabled: true
        },
        xAxis: [{
            type: 'datetime',
            gridLineWidth: 1,
            minRange: 14 * 24 * 3600000
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                gridLineWidth: 1,
            },
            title: {
                text: ''
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Average Revenue'
            },
            labels: {
                format: '{value} ₦'
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Trip Count'
            },
            subtitle: {
            text: 'Note : Average revenue based on total users'
            },
            labels: {
                format: '{value} '
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
          enabled: true
        },
        series: [{
            name: 'Average Revenue',
            type: 'areaspline',
            yAxis: 1,
            data: [<?php echo join($data_avg, ','); ?>],
            tooltip: {
                valueSuffix: ' ₦'
            },
            color: Highcharts.getOptions().colors[5]

        }, {
            name: 'Trip Count',
            type: 'areaspline',
            yAxis: 2,
            data: [<?php echo join($data22, ','); ?>],
            marker: {
                enabled: false
            },
            color: Highcharts.getOptions().colors[7]
        }]
    });
    
    
    Highcharts.chart('book_exp', {
        chart: {
            inverted: false,
            zoomType: 'xy'
        },
        title: {
            text: '',
            align:'left'
        },rangeSelector:{
            enabled: true
        },
        xAxis: [{
            type: 'datetime',
            gridLineWidth: 1,
            minRange: 14 * 24 * 3600000
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                gridLineWidth: 1
            },
            title: {
                text: '',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Average Revenue'
            },
            labels: {
                format: '{value} ₦'
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
            title: {
                text: ''
            },
            labels: {
                format: '{value} '
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
          enabled: true
        },
          plotOptions: {
                column: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true,
                    pointWidth: 10
                }
            },
        series: [{
            name: 'Average Revenue',
            type: 'column',
            yAxis: 1,
            data: [<?php echo join($data_avg, ','); ?>],
            tooltip: {
                valueSuffix: ' ₦'
            },
            color: 'red'

        }]
    });
});

</script>
<script>
        $( function() {
            var pickerOpts = {
                dateFormat: "yy-mm-dd"
            };
          $( "#startdate" ).datepicker(pickerOpts);
        } );
        
          $( function() {
            var pickerOpts = {
                dateFormat: "yy-mm-dd"
            };
          $( "#enddate" ).datepicker(pickerOpts);
        } );
        </script>
          <script>
            function datedFleet(){
                var startdate = document.getElementById('startdate').value;
                var enddate = document.getElementById('enddate').value;
                var action="revenuedashboard";
                 if(startdate !== '' && enddate !==''){
                         $.ajax({
                             url: "../filterbydate.php",
                             method:"POST",
                             data:{startdate:startdate, enddate:enddate, action:action},
                             success:function(data){
                                 $('#full_overview').html(data)
                             }
                         });
                         $("#filterdate_warning").html("");
                }
                else
                {
                    $("#filterdate_warning").html("<p style='color:red;'>No dates selected</p>");
                }
            }
        </script>
	
</body>
</html>
<?php
}
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>