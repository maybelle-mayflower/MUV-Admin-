<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    

if(isset($_POST['edit_campaign'])){ 
    
    $new_id = mysqli_real_escape_string($connect,$_POST['txtid']);
    $new_desc = mysqli_real_escape_string($connect,$_POST['description']);
    $new_status = mysqli_real_escape_string($connect,$_POST['tstatus']);
	    
    $sqladd="UPDATE tbl_campaign_templates SET description='$new_desc',status='$new_status' WHERE id='$new_id'";
    
    $result_update=mysqli_query($connect,$sqladd);
    if($result_update){
        
        echo '<script>window.location.href="templates.php"</script>';
    }
    else{
        echo '<script>alert("Could not update this template '. mysqli_error($connect).'")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <head>
	<title>Marketing | Templates</title>
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
							<a href="#subPages2" data-toggle="collapse" class=""><i class="lnr lnr-users"></i> <span>Dispatcher</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
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
                                                                        </div
                                                                    </li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages4" data-toggle="collapse" class="active"><i class="lnr lnr-bullhorn"></i> <span>Marketing</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages4" class="collapse ">
								<ul class="nav">
                                                                    <li><a href="dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="campaign.php" class="">Campaign</a></li>
                                                                    <li>
                                                                        <a href="#subPages4a" data-toggle="collapse" class="collapsed"><span>Settings</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4a" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="templates.php" class="active">Templates</a></li>
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
                        <li class="breadcrumb-item active">Templates</li>
                    </ol>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid" style="height: auto;">
					<div class="panel panel-default">
                                        <div class="panel-heading">
                                                <h3 class="panel-title">Email Templates</h3>
                                        </div>
                                    <br>
                                    <div class="panel-body">
                                        <form action="../fleet_tracking/showChecked.php" method="post">
                                       <table style="margin: 10px;"class="table table-bordered table-responsive display" id="myTable" width="98.4%">
                                            <thead style="font: bolder">
                                                <tr>
                                                    <th>S/No</th>
                                                   <th>Select</th>
                                                   <th>Template Title</th>
                                                   <th>Template Status</th>
                                                </tr>
                                               </thead>
                                               <tbody>
                                                   <?php
                                                   $result = mysqli_query($connect, "SELECT * FROM tbl_campaign_templates");
                                                   
                                                   while($row= mysqli_fetch_assoc($result)):
                                                   ?>
                                                   <tr>
                                                       <td></td>
                                                       <td><input type="checkbox" name="setEnable[]" id="setEnable[]" value="<?php echo $row['id']; ?>"></td>
                                                       <td><a href="campaign_email_template.php?id=<?php echo $row['id']?>"><?php echo $row['template_title']; ?></a></td>
                                                       <td><?php echo $row['status']; ?></td>
                                                       </tr>
                                                   <?php endwhile; ?>
                                               </tbody>
                                               <tfoot style="font: bolder">
                                                <tr>
                                                    <th>S/No</th>
                                                   <th><input type="checkbox" id="selectall" name="selectall"/>All</th>
                                                   <th>Template Title</th>
                                                   <th>Template Status</th>
                                                </tr>
                                               </tfoot>
                                        </table>
                                           <div style="margin: 10px; margin-bottom: 10px; ">
                                          <select style="float: left; margin-right: 5px; height: 2em;" id="statusDrop" name="statusDrop">
                                                <option  value="" disabled selected>--Change Status--</option>
                                                <option value="Enable">Enable</option>
                                                <option value="Disable">Disable</option>
                                            </select>
                                        <input type="hidden" id="table" name="table" value='tbl_campaign_templates'>
                                        <input type="hidden" id="returnto" name="returnto" value='../marketing/templates.php'>
                                            <button type="submit" id="showCheck" class="btn btn-default btn-xs" style=" margin-right: 5px;">Update All</button>
                                    </div>
                                    </form>
                                    </div>
                                    <br>
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
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH8TlxMrucCoApyot668dIApkq8jK_iiM&callback=myMap"></script>
        
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="../assets/scripts/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>  

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
                  }
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
        $(document).on('change','#dropdown',function(e){
            e.preventDefault(); 
            var id = $(this).data('id');
            var val = $(this).find(":selected").text();
            var table = "tbl_driver";

            $.post('update.php',{dropId:id, dropVal:val, dropTbl:table},function(data){
                alert(data);
            });
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