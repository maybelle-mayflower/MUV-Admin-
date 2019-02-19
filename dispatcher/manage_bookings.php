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
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/muvicon.JPG">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.css"/>
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
                                                                    <li><a href="dispatch.php" class="">Dispatch</a></li>
                                                                    <li><a href="manage_bookings.php" class="active">Manage Bookings</a></li>
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
			
<div class="main">

        <!-- MAIN CONTENT -->
   <div class="main-content">
    <div class="container-fluid" style="height: auto;">
    <div class="panel panel-default">
        <div class="">
            <div style="width: 100%; margin-top: 20px; margin-left: 30px; ">
                <label class="checkbox-inline">
                    <input type="checkbox" checked="true" id="assign" name="assign">
                    <span>Assign</span>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" checked="true" id="reassign" name="reassign">
                    <span>Reassign</span>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" checked="true" id="confirmed" name="confirmed">Confirmed
                </label>
                 <label class="radio-inline">
                    <input type="checkbox" checked="true" id="startpickup" name="startpickup">Start Pickup
                </label>
                <label class="radio-inline">
                    <input type="checkbox" checked="true" id="inprogress" name="inprogress">In Progress
                </label>
                <label class="radio-inline">
                    <input type="checkbox" checked="true" id="completed" name="completed">Completed
                </label>
                <label class="radio-inline">
                    <input type="checkbox" checked="true" id="awaitingpayment" name="awaitingpayment">Awaiting Payment
                </label>
                <label class="radio-inline">
                    <input type="checkbox" checked="true" id="cancelled" name="cancelled">Cancelled
                </label>
                <form class="form-inline" style="margin-top: 20px;">
                    <input type="text" class="form-control mb-2 mr-sm-2" id="startdate" placeholder="Start Date">
                    <div class="input-group mb-2 mr-sm-2">
                      <input type="text" class="form-control" id="enddate" placeholder="End Date">
                    </div>
                    <input type="button" onclick="" class="btn btn-default mb-2" style="" id="filter" value="Go"/> 
                </form>
            </div>

        </div>
        <div class="panel-body" style="margin-top: 20px;">
    <div class="row">
        <table cellpadding="2" cellspacing="0" border="0" width="100%" class="table-striped table-bordered display" id="example">
            <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Booking Time</th>
                    <th>Booking Pick Up Time</th>
                    <th>Actual Pick Up Time</th>
                    <th>Booking Type</th>
                    <th>Passenger</th>
                    <th>Company Name</th>
                    <th>Driver</th>
                    <th>Vehicle</th>
                    <th>Pick Up Location</th>
                    <th>Drop Off Location</th>
                    <th>Distance</th>
                    <th>Fare(₦)</th>
                    <th>Status</th>
                    <th>Action</th>
                 </tr>
            </thead>
            <tbody>
                <?php
                $driver_name ="";
                $result = mysqli_query($connect, "select tbl_bookings.id as id, tbl_bookings.passenger_name as passenger_name, tbl_bookings.passenger_email as passenger_email, tbl_bookings.passenger_mobile as passenger_mobile, tbl_bookings.pickup as pickup, tbl_bookings.dropoff as dropoff, tbl_bookings.pickup_time as pickup_time, tbl_bookings.model_id as model_id, tbl_bookings.promo_code as promo_code, tbl_bookings.status as status, tbl_bookings.booking_time as booking_time, tbl_bookings.booking_type as booking_type, tbl_bookings.driver_id as driver_id, tbl_bookings.travel_dist as travel_dist, tbl_bookings.travel_fare as travel_fare, tbl_driver.firstname as driver_name, companies.company_name as company_name from tbl_bookings INNER JOIN tbl_driver on tbl_bookings.driver_id=tbl_driver.id INNER JOIN companies on tbl_driver.fleet_co=companies.id ORDER BY tbl_bookings.id DESC");

                while($row= mysqli_fetch_assoc($result)):
                    
                    if($row['driver_id']==10){
                       $driver_name = "<h5 style='color:red;'>No Drivers</h5>";
                    }
                    else
                    {
                      $driver_name = $row['driver_name'];
                    }
                ?>
                
                <tr>
                   <td><?php echo $row['id'];?></td>
                   <td><?php echo $row['booking_time'];?></td>
                   <td><?php echo $row['pickup_time'];?></td>
                   <td>--</td>
                   <td><?php echo $row['booking_type'];?></td>
                   <td><?php echo $row['passenger_name'];?><br><?php echo $row['passenger_mobile'];?></td>
                   <td><?php echo $row['company_name'];?></td>
                   <td><?php echo $driver_name;?></td>
                   <td><?php echo $row['model_id'];?></td>
                   <td><?php echo $row['pickup'];?></td>
                   <td><?php echo $row['dropoff'];?></td>
                    <td><?php echo $row['travel_dist'];?></td>
                   <td><?php echo $row['travel_fare'];?></td>
                   <td><?php echo $row['status'];?></td>
                   <td><?php bookingAction($row['id']);?></td>


                </tr>
                <?php endwhile; ?>
            </tbody>    
                </table>
                                   
                </div>
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
  
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="../assets/scripts/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>  
        $(document).ready(function() {
            
        $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
        var checked = $('#reassign').is(':checked');
        var achecked = $('#cancelled').is(':checked');
        var bchecked = $('#assign').is(':checked');
        var cchecked = $('#completed').is(':checked');
        var reassign = "Reassign";
        var cancelled ="Cancelled";
        var assign = "Assign";
        var completed = "Completed";

        if (checked && aData[13] === reassign) {
            return true;
        }
        if (achecked && aData[13] === cancelled) {
            return true;
        }
         if (bchecked && aData[13] === assign) {
            return true;
        }
        if (cchecked && aData[13] === completed) {
            return true;
        }
        return false;
        
        
        
    });
        
    var t = $('#example').dataTable( {
        "dom": '<"toolbar">frtip',
        "fnInitComplete":function(){
            $('.dataTables_scrollBody').slimScroll();
        },
        "scrollY":        "750px",
        "scrollCollapse": true,
        "paging":         false,
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

    $('#reassign').on("click", function(e) {
        console.log('click');
        t.fnDraw();
    });
    $('#cancelled').on("click", function(e) {
        console.log('click');
        t.fnDraw();
    });
      $('#assign').on("click", function(e) {
        console.log('click');
        t.fnDraw();
    });
    $('#completed').on("click", function(e) {
        console.log('click');
        t.fnDraw();
    });
   // $("div.toolbar").html('<div class="row" style="width:500px; margin: 0px;"><div class="col-xs-5"><input type="text" id="startdate" name="startdate" placeholder="Start Date" class="form-control"/></div><div class="col-xs-5"><input type="text" placeholder="End Date" id="enddate" name="enddate" class="form-control"/></div><div class="col-xs-1"><div class="btn btn-default">Go</div></div></div>');
  /* $("#startdate").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
   $("#enddate").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });

   $('#startdate, #enddate').change(function () {
       t.draw();
   }); */  
});
    </script>

    <script>
        function drawTable(checkbox, t){
            $(checkbox).on("click", function(e) {
             console.log('click');
             t.fnDraw();
         }); 
        }
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
	
</body>
</html>
<?php

if(isset($_POST['btnAssign'])){
    global $connect;
        $driver_id=mysqli_real_escape_string($con,$_POST['driver']);
        $id= mysqli_real_escape_string($con,$_POST['txtid']);

        $sql_u = "UPDATE tbl_bookings SET driver_id ='$driver_id', status = 'Reassign' WHERE id='$id'";

        $result_u=mysqli_query($con,$sql_u);
        if($result_u){
            $sql_activatedriver = "UPDATE tbl_driver SET isBusy ='y' WHERE id='$driver_id'";
            $driver_run = mysqli_query($connect, $sql_activatedriver);
            if($driver_run)
            {
                echo '<script>window.location.href="manage_bookings.php"</script>';
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
                echo '<script>window.location.href="manage_bookings.php"</script>';
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
                echo '<script>window.location.href="manage_bookings.php"</script>';
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