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
	<title>Dispatcher | Manage Bookings</title>
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
        <link href="../assets/css/slider.css" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/muvicon.JPG">
         <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">-->
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.css">
  <style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
}
</style>
  <style>
.dataTables_filter{
float: right !important;
}
.toolbar {
    float: left;
}
#example td, th{
    text-align:center; 
    vertical-align:middle;
}
 </style>
</head>
    </head>
    <body class="layout-fullwidth">
        <div class="se-pre-con"></div>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-link navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
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
							<a href="#subPages2" data-toggle="collapse" class="active"><i class="lnr lnr-users"></i> <span>Dispatcher</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									  <li><a href="dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="dispatch.php" class="active">Dispatch</a></li>
                                                                    <li><a href="manage_bookings.php" class="">Manage Bookings</a></li>
                                                                    <li><a href="settings.php" class="">Settings </a></li>
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
			<!-- MAIN CONTENT -->
			
<div class="main" style="margin: 0; padding: 0;">

        <!-- MAIN CONTENT -->
   <div class="main-content">
    <div class="container-fluid" style="height: auto;">
    <div class="panel panel-default">
        
        <div id="panelDiv" class="main" style="float: right; width: 30%; margin: 0px; padding: 0px;">
            <h3 style=" margin: 0; padding: 0;">Live Dispatch</h3>
            <p></p>
            <p style="border: none;"></p>
            <p style="border: none;"></p>
            <img src="#">
            <p style="border: none;"></p>
            <form class="form-inline" id="form" action="dispatch.php">
                      <div class="form-group" style=" margin-right: 5px; margin-left: 5px; margin-top: 0px; padding: 0px;">
                          <select id="scheduled" class="form-control" name="scheduled" class="scheduled" style="width:14em;">
                            <option selected="" value="all">All Scheduled</option>
                            <option value="assign">Assign</option>
                            <option value="reassign">Reassign</option>
                            <option value="completed">Completed</option>
                            <option value="awaiting">Awaiting Payment</option>
                            <option value="pickup">Start To Pickup</option>
                            <option value="cancelled">Cancelled</option>
                       </select>
                    </div>
                    <div class="form-group" style=" margin-right: 5px; margin-left: 5px; margin-top: 0px; padding: 0px;">
                        <select id="model" class="form-control" name="model" required="" style="width:14em; ">
                            <option selected="" value="all">All Vehicles</option>
                            <?php getModels();?>
                       </select>
                    </div>
                    <div class="form-group">
                      <button type="button" style=" margin-top: 0px; width:40px; height: 33px;" onclick="showSearch()"class="btn btn-default btn-xs"><i class="fa fa-search" style="font-size: 13px;" title="Search"></i></button>
                    </div>
                      <div id="searchdiv" class="hidden" style=" margin-right: 5px; margin-left: 5px; margin-top: 10px; padding: 0px;">
                          <select id="selectdriver" class="form-control" name="selectdriver" required="" style="width:31%; margin-top: 5px; ">
                            <option selected="" value="all">All Drivers</option>
                            <?php listAllDrivers();?>
                       </select>
                          <select id="selectpassenger" class="form-control" name="selectpassenger" required="" style="width:31%; margin-top: 5px;">
                            <option selected="" value="all">All Passengers</option>
                            <?php getDriver();?>
                       </select>
                          <select id="selectcompany" class="form-control" name="selectcompany" required="" style="width:31%; margin-top: 5px;">
                            <option selected="" value="all">All Companies</option>
                            <?php getDriver();?>
                       </select>
                          <!--<input type="text" style="border: 1px solid lightgray; margin: 5px; width: 87%;" id="searchinput" name="searchinput"  placeholder="Search driver">   
                          <input type="button" id="searchdispatch" class="btn btn-default btn-xs" style="width: 100px; margin: 5px;" value="Search" onclick="searchDispatch()">
                      --></div>
                 </form>
            <div id="live_dispatch" style="margin: 5px; width: 100%;">
                <br>
                 <?php
                    $driver_name = "";
                    $status = "t";
                    $bookings_sql = "Select * from tbl_bookings order by id desc";
                    $run_sql = mysqli_query($connect, $bookings_sql);
                    while($row= mysqli_fetch_assoc($run_sql))
                    {
                        $status = $row['status'];
                        $driver_id = $row['driver_id'];
                        $id = $row['id'];
                        if($driver_id != 10)
                        {
                            $driver_sql = "Select * from tbl_driver where id = $driver_id";
                            $run_driver = mysqli_query($connect, $driver_sql); 
                            $row_driver = mysqli_fetch_array($run_driver);
                            $driver_name = $row_driver['firstname'];
                        }
                        else
                        {
                            $driver_name = "<span style='color: red;'>no drivers<span>";
                            $status_update="UPDATE tbl_bookings SET status='Assign' WHERE id='$id'";
                            $status_run = mysqli_query($connect, $status_update); 
                        }
                    
                   ?>
                <p style="border: none;"></p>
                <div id="">
                    <div  style="margin: 5px; padding-left: 10px; width: 97%; background: white; height: 210px;">
                        <table class="table-borderless" width="100%" style="padding: 0px; text-align: left;">
                            <tr>
                                <td style="font-weight: bold;"><?php echo $row['passenger_name'];?></td>
                                <td><a data-toggle="modal" id="editBooking" data-target="#addBookingModal" data-id="<?php echo $id;?>">Edit</a></td>
                                <td><a data-toggle="modal" id="cancelBooking" data-target="#cancelModal" data-id="<?php echo $id;?>">Cancel</a></td>
                                <td><?php echo $row['id'];?></td>
                            </tr>
                        </table>
                        <p style="border: none; font-size: 0.9em; float: left; margin-top: 5px;"><span class="fa fa-automobile"></span> <?php echo $driver_name;?></p>
                        <p style="border: none; margin-top: 3px;"></p>
                        <p style="border: none; font-size: 0.9em; margin-top: 5px;" class="marquee"><span><?php echo $row['pickup'];?></span></p>
                        <p style="border: none; font-size: 0.9em; margin-top: 5px;" class="marquee"><span><?php echo $row['dropoff'];?></span></p>
                        <div>
                            <table class="table-borderless" width="95%" style="padding: 0px; text-align: left;">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr style="color: lightslategray; margin-top: 10px;">
                                    <td><span class="fa fa-clock-o"></span> <?php echo $row['booking_time'];?></td>
                                    <td></td>
                                    <td><?php bookingAction($row['id']);?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <?php
                }
                ?>
        </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div id="content-data"></div>
                    </div>
                </div>
                <div class="modal fade" id="cancelModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div id="content-data2"></div>
                    </div>
                </div>
                <div class="modal fade" id="addBookingModal" role="dialog">
                    <div class="modal-dialog">
                        <div id="content-data3"></div>
                    </div>
                </div>
                
           <div id="mapDiv" class="main" style="float: left; background:inherit; width: 69%; margin-left:0px; margin-top: 0px; padding: 0px;">
            <!--MAP section-->
                <?php
                $sql = "SELECT firstname, currentLocationLat, currentLocationLong, isActive FROM tbl_driver";
                $run = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($run))
                {
                   $jsondata[] = $row;
                }
                $latlong = json_encode($jsondata);
                ?>

                <div id="googleMap" style="width:100%;height:700px;"></div>

                <div id="over_map">
                    <div id="slider" style="right:-335px;">
                        <div class="fab" id="sidebar" data-toggle="modal" data-id="1" data-backdrop="static" data-keyboard="false" data-target="#addBookingModal" onclick=""> + </div>
                    </div>
                </div>
                <!--end map section-->
        </div>
        </div>
    </div>
</div>
                <!-- END MAIN CONTENT -->
</div>
                        
                        <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div id="content-data"></div>
                    </div>
                </div>
                <div class="modal fade" id="cancelModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div id="content-data2"></div>
                    </div>
                </div>
                <div class="modal fade" id="addBookingModal" role="dialog">
                    <div class="modal-dialog">
                        <div id="content-data3"></div>
                    </div>
                </div>
			<!-- END MAIN CONTENT -->
		
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

        <script>
            $(window).load(function() {
                    // Animate loader off screen
                    $(".se-pre-con").fadeOut("slow");;
            });
        </script>
        <script>
            var map;
            var latlong = <?php echo $latlong;?>;
            
            var locations = latlong;
            
             function myMap(){
                 var centerMap = new google.maps.LatLng(6.6080, 3.6218);
                //var centerMap = new google.maps.LatLng(6.3350, 5.6037);
                    var myOptions = {
                    zoom: 9,
                    center: centerMap,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    fullscreenControl: false 
                 }
                 map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
                 
                  setMarkers(locations);
                  
                    var legend = document.getElementById('mapLegend');
    
                    div= document.createElement('div');
                    div.innerHTML = '<span><img src="../assets/img/map_icons/automotive.png" style="width:20px; height:25px;">Active</span>';
                    legend.appendChild(div);

                    var div = document.createElement('div');
                    div.innerHTML = '<span><img src="../assets/img/map_icons/bars.png" style="width:20px; height:25px;">In Active</span>';
                    legend.appendChild(div);
                    
                    var div = document.createElement('div');
                    div.innerHTML = '<span><img src="../assets/img/map_icons/parks.png" style="width:20px; height:25px;">Busy</span>';
                    legend.appendChild(div);
                    
                    var div = document.createElement('div');
                    div.innerHTML = '<span><img src="../assets/img/map_icons/birds.png" style="width:20px; height:25px;">Shift Out</span>';
                    legend.appendChild(div);

                    /* Push Legend to Right Top */
                    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
                 }
                   function setMarkers(locations) {
                    for (i=0; i < locations.length; i++) {
                      var location = locations[i];
                      plotMarker(location)
                    }
                  }
                  
                function plotMarker(location) {
                    if(location.isActive === "y"){
                        var markerIcon = 'automotive.png';
                    }
                    else
                    {
                       var markerIcon = 'bars.png'; 
                    }
                        //var markerIcon = (location.is_exact) ? 'birds.png' : 'bars.png';
                        //var markerIcon = 'assets/img/map_icons/' + markerIcon;
                        var markerIcon = '../assets/img/map_icons/'+markerIcon;


                        var marker = new google.maps.Marker({
                              position: new google.maps.LatLng(location.currentLocationLat,  location.currentLocationLong),
                              icon: markerIcon,
                              title: location.firstname, 
                              map: map
                            });
                }     
    </script>
    <script>
             function showSearch(){
                 if(document.getElementById("searchdiv").className === "")
                 {
                   document.getElementById("searchdiv").className = "hidden";  
                 }
                 else
                 {
                 document.getElementById("searchdiv").className = "";
                }
             }
    </script>
        
        
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH8TlxMrucCoApyot668dIApkq8jK_iiM&v=3.exp&sensor=false&libraries=places&callback=myMap"></script>
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="../assets/scripts/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <script src="../assets/scripts/slider.js"></script>
        <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        -->
        
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.js"></script>
  <script>
  $( function() {
    $( "#booking_datetime" ).datetimepicker();
  } );
  </script>
  
        <script>       
 $(function () {
                /*$('#booking_datetime').datetimepicker();
                
                $('#booking_datetime').click(function(){
                    var popup =$(this).offset();
                    var popupTop = popup.top - 90;
                    $('.ui-datepicker').css({
                      'top' : popupTop
                     });
                });
            });*/
</script>
<script>
$(document).on('change','#scheduled', function()
    { 
        var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch_scheduled.php',
                type:'POST',
                data:'request='+keyword,
                success:function(data)
                {
                    $("#live_dispatch").html(data);
                }
            });
    });
</script>
<script>
$(document).on('change','#selectdriver', function()
    { 
        var keyword = $(this).val();
            $.ajax(
            {
                url:'select_driver.php',
                type:'POST',
                data:'request='+keyword,
                success:function(data)
                {
                    $("#live_dispatch").html(data);
                }
            });
    });
</script>
 <script>
        $(document).on('click','#assignDriver',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'assign_driver.php',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#content-data').html('');
                $('#content-data').html(data);
            }).fial(function(){
                $('#content-data').html('<p>Error</p>');
            });
        });
</script>
<script>
        $(document).on('click','#reassignDriver',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'reassign_driver.php',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#content-data').html('');
                $('#content-data').html(data);
            }).fial(function(){
                $('#content-data').html('<p>Error</p>');
            });
        });
</script>
 <script>
        $(document).on('click','#addBooking',function(e){
            e.preventDefault();
            
            $('#content-data2').html('');
            $.ajax({
                url:'add_booking.php',
                type:'POST',
                dataType:'html'
            }).done(function(data){
                $('#content-data2').html('');
                $('#content-data2').html(data);
            }).fial(function(){
                $('#content-data2').html('<p>Error</p>');
            });
        });
    </script>
    <script>
        $(document).on('click','#editBooking',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            $('#content-data3').html('');
            $.ajax({
                url:'edit_booking.php',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#content-data3').html('');
                $('#content-data3').html(data);
            }).fial(function(){
                $('#content-data3').html('<p>Error</p>');
            });
        });
    </script>
     <script>
        $(document).on('click','#cancelBooking',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            $('#content-data2').html('');
            $.ajax({
                url:'cancel_booking.php',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#content-data2').html('');
                $('#content-data2').html(data);
            }).fial(function(){
                $('#content-data2').html('<p>Error</p>');
            });
        });
    </script>
         <script>
        $(document).on('click','#sidebar',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            $('#content-data2').html('');
            $.ajax({
                url:'add_booking.php',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#content-data3').html('');
                $('#content-data3').html(data);
            }).fial(function(){
                $('#content-data3').html('<p>Error</p>');
            });
        });
    </script>

 <script>
    $('#home').slimscroll({
     height: '450px',
     width: '300px'
   });
</script>
 <script>
    $('#live_dispatch').slimscroll({
     height: '568px'
   });
</script>

<script>
$(document).on('input', '#select_passenger', function(){
    var options = $('datalist')[0].options;
    var per_id = $(this).val();
     $('#ajaxcontent').html('');
            $.ajax({
                url:'get_passenger.php',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#ajaxcontent').html('');
                $('#ajaxcontent').html(data);
            }).fial(function(){
                $('#ajaxcontent').html('<p>Error</p>');
    });
});
 </script>
 
 <script> 
$(document).on('click', '#searchdispatch', function(){
    var keyword = $('#searchinput').val();
           $.ajax(
            {
                url:'search_scheduled.php',
                type:'POST',
                data:'request='+keyword,
                success:function(data)
                {
                    $("#live_dispatch").html(data);
                }
            });
});
 </script>
	
</body>
</html>
<?php
if(isset($_POST['btnAssign'])){
    global $connect;
    $con = $connect;
        $driver_id=mysqli_real_escape_string($con,$_POST['driver']);
        $id= mysqli_real_escape_string($con,$_POST['txtid']);

        $sql_u = "UPDATE tbl_bookings SET driver_id ='$driver_id', status = 'Reassign' WHERE id='$id'";

        $result_u=mysqli_query($con,$sql_u);
        if($result_u){
            $sql_activatedriver = "UPDATE tbl_driver SET isBusy ='y' WHERE id='$driver_id'";
            $driver_run = mysqli_query($connect, $sql_activatedriver);
            if($driver_run)
            {
                echo '<script>window.location.href="dispatch.php"</script>';
            }
            else
            {
                echo '<script>alert("Driver Update Failed: '. mysqli_error($con).'")</script>';
            }
        }
        else{
            echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
        }
    }
    
    if(isset($_POST['btnReassign'])){
    global $connect;
    $con = $connect;
        $driver_id=mysqli_real_escape_string($con,$_POST['driver']);
        $id= mysqli_real_escape_string($con,$_POST['txtid']);
        $driverid_old=mysqli_real_escape_string($con,$_POST['txtdriver_id']);

        $sql_u = "UPDATE tbl_bookings SET driver_id ='$driver_id' WHERE id='$id'";

        $result_u=mysqli_query($con,$sql_u);
        if($result_u){
            $sql_activatedriver = "UPDATE tbl_driver SET isBusy ='y' WHERE id='$driver_id'";
            $driver_run = mysqli_query($connect, $sql_activatedriver);
            $sql_deactivatedriver = "UPDATE tbl_driver SET isBusy ='n' WHERE id='$driverid_old'";
            $driver_run2 = mysqli_query($connect, $sql_deactivatedriver);
            if($driver_run && $driver_run2)
            {
                echo '<script>window.location.href="dispatch.php"</script>';
            }
            else
            {
                echo '<script>alert("Driver Update Failed: '. mysqli_error($con).'")</script>';
            }
        }
        else{
            echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
        }
    }
    
        if(isset($_POST['confirmCancel'])){
    global $connect;
    $con = $connect;
        $driver_id=mysqli_real_escape_string($con,$_POST['canceldriver']);
        $id= mysqli_real_escape_string($con,$_POST['cancelid']);

        $sql_u = "UPDATE tbl_bookings SET status = 'Cancelled' WHERE id='$id'";

        $result_u=mysqli_query($con,$sql_u);
        if($result_u){
            $sql_deactivatedriver = "UPDATE tbl_driver SET isBusy ='n' WHERE id='$driver_id'";
            $driver_run2 = mysqli_query($connect, $sql_deactivatedriver);
            if($driver_run2)
            {
                echo '<script>window.location.href="dispatch.php"</script>';
            }
            else
            {
                echo '<script>alert("Driver Update Failed: '. mysqli_error($con).'")</script>';
            }
        }
        else{
            echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
        }
    }
}
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>