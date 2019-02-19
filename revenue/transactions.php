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
	<title>Revenue | Transactions</title>
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
 
 <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css"/>
 <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css"/>
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css"/>
 
 <style>
     div.dt-buttons {
    float: right;
}
.dataTables_filter {
float: left !important;
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
                                                    <a href="#subPages" data-toggle="collapse" class=""><i class="lnr lnr-car"></i> <span>Fleet Tracking</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                    <div id="subPages" class="collapse ">
                                                            <ul class="nav">
                                                                <li><a href="dashboard.php" class="">Dashboard</a></li>
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
							<a href="#subPages3" data-toggle="collapse" class="active"><i class="lnr lnr-briefcase"></i> <span>Revenue</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
                                                                    <li><a href="dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="transactions.php" class="active">Transactions</a></li>
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
                        <li class="breadcrumb-item active">Transactions</li>
                    </ol>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                                       
                                        <!--Table section-->
                                <div class="">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                                <h3 class="panel-title">All Transactions</h3>
                                        </div>
                                    <br>
                                    <div class="panel-body">
                                        <div class="row">
                                                <div class="">
                                                    <?php
                                                        $completeCahrge = dailyCompletedCharge();
                                                        $cancelCharge = dailyCancelledCharge(); 
                                                        ?>
                                                        <div id="transaction_rev" style = "margin: 0 auto; width: 95%;"></div>
                                                </div>
                                        </div >
                                    </div>
                                    <div style="width: 100%; height: auto;">
                                        <table style="margin: 0px;"class="ogrid display table table-striped table-bordered nowrap" id="myTable" width="95%">
                                            <thead style="font: bolder">
                                                <tr>
                                                    <th>S/No</th>
                                                   <th>Trip ID</th>
                                                   <th>CC Transaction ID</th>
                                                   <th>Payment Type</th>
                                                   <th>Passenger Name</th>
                                                   <th>Driver name</th>
                                                   <th>Company name</th>
                                                   <th>Journey Date</th>
                                                   <th>Pick Up Location</th>
                                                   <th>Admin Commission(₦)</th>
                                                   <th>Company Commission(₦)</th>
                                                   <th>Driver Commission(₦)</th>
                                                   <th>Distance(KM)</th>
                                                   <th>Wallet Amount(₦)</th>
                                                   <th>Total Fare(₦)</th>
                                                   <th>Travel Status</th>
                                                </tr>
                                               </thead>
                                               <tbody>
                                                    <?php
                                                   $result = mysqli_query($connect, "select tbl_rides.id as tripid, tbl_rides.totalDistance as totalDistance, tbl_rides.status as ride_status, tbl_rides.paymentType as payment_type, tbl_rides.startDateTime as journey_date, tbl_rides.pickUpLocation as pickUpLocation, tbl_rides.dropOffLocation as dropOffLocation, tbl_rides.totalCharges as totalCharges, tbl_rides.payByWallet as payByWallet, tbl_rides.status as status, tbl_users.firstName as user_name, tbl_users.lastName as user_surname, tbl_driver.firstname as driver_name, tbl_driver.lastname as driver_surname, tbl_driver.id as driver_id, tbl_users.uId as user_id, tbl_driver.fleet_co as company_id, tbl_paymenttypes.typename as type_of_payment, companies.company_name as company_name FROM tbl_rides INNER JOIN tbl_users ON tbl_users.uId=tbl_rides.custId INNER JOIN tbl_driver ON tbl_driver.temp_id=tbl_rides.driverId INNER JOIN tbl_paymenttypes ON tbl_paymenttypes.indexl=tbl_rides.paymentType INNER JOIN companies ON companies.id=tbl_driver.fleet_co");
                                                   
                                                   while($row= mysqli_fetch_assoc($result)):
                                                   ?>
                                                   <tr>
                                                       <td></td>
                                                       <td><a href="tripInfo.php?id='<?php echo $row['tripid']?>'"><?php echo $row['tripid']; ?></a></td>
                                                       <td>CC Transaction ID</td>
                                                       <td><?php echo $row['type_of_payment']; ?></td>
                                                       <td><?php echo $row['user_name']." ".$row['user_surname']; ?></td>
                                                       <td><a href="../fleet_tracking/driver_info.php?id='<?php echo $row['driver_id']?>'"><?php echo $row['driver_name']." ".$row['driver_surname']; ?></a></td>
                                                       <td><a href="../fleet_tracking/company_info.php?id='<?php echo $row['company_id']?>'"><?php echo $row['company_name']; ?></a></td>
                                                       <td><?php echo $row['journey_date']; ?></td>
                                                       <td><img src="img/green.png" style="height:10px; width:10px; margin-right:5px;"><?php echo $row['pickUpLocation']; ?><br><img src="img/red.png" style="height:10px; width:10px; margin-right:5px;"><?php echo $row['dropOffLocation']; ?></td>
                                                       
                                                       <td><?php echo (11/100)*(90/100*$row['totalCharges']); ?></td>
                                                       <td><?php echo (90/100)* $row['totalCharges']; ?></td>
                                                       <td><?php echo (10/100)* $row['totalCharges']; ?></td>
                                                       <td><?php echo $row['totalDistance']; ?></td>
                                                       <td><?php echo $row['payByWallet']; ?></td>
                                                       <td><?php echo $row['totalCharges']; ?></td>
                                                       <td><?php echo rideStatus($row['ride_status'], $row['tripid']); ?></td>
                                                   </tr>
                                                   <?php endwhile; ?>
                                               </tbody>
                                        </table>
                                    
                                    </div>
                                </div>
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <div id="content-data"></div>
                                    </div>
                                </div>
                                <div class="modal fade" id="myModal2" role="dialog">
                                    <div class="modal-dialog">
                                        <div id="content-data2"></div>
                                    </div>
                                </div>
                            </div>
                                        <!--End table section-->
                                        
                                        
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
        <script src="http://code.highcharts.com/stock/highstock.js"></script>

        
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="../assets/scripts/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
        <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script>
        $(document).ready(function() {
        var t = $('.table').DataTable( {
            
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
             "oLanguage": {
                    "sSearch": "<span>Search All Fields:</span> _INPUT_"
                  },
                
                scrollY:"450px",
                scrollX:true,
                scrollCollapse:true,
            dom: 'Bfrtip',
           buttons: [
            { "extend": 'excel', "text":'Export to Excel',"className": 'btn btn-default btn-xs' }
        ]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        
        $("#selectall").click(function () {
        $('.table tbody input[type="checkbox"]').prop('checked', this.checked);
    });
        } );
        </script>
  
<script>
    Highcharts.chart('transaction_rev', {
        chart: {
            type: 'areaspline' 
        },
        title: {
            text: 'All Transactions',
            align: 'left'
        },
        subtitle: {
            text: '* Adjust the range selector to view transactions for any chosen time period.',
            align: 'right'
        },
        rangeSelector:{
        enabled:true
        },
        xAxis: [{
            type: 'datetime'
            //minTickInterval: moment.duration(1, 'month').asMilliseconds()
        }],
        yAxis: [{
            labels: {
                format: '{value}'
            },
            title: {
                text: 'Amount(₦)'
            }
        }],
    tooltip: {
        shared: true
    },
        legend: {
          enabled: true
        },
        series: [{
            name: 'Completed',
            data: [<?php echo join($completeCahrge, ','); ?>],
        },
        {
            name: 'Cancelled',
            data: [<?php echo join($cancelCharge, ','); ?>],
        }
    ]
    });
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