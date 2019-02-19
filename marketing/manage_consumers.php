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
	<title>Fleet Tracking | Manage Consumers</title>
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
                                                                                <li><a href="templates.php" class="">Templates</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                     <li>
                                                                        <a href="#subPages4b" data-toggle="collapse" class="active"><span>Consumers</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPages4b" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="manage_consumers.php" class="active">Manage Consumers</a></li>
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
                                                                    <li><a href="../settings/email_templates.php" class="">SMS Templates</a></li>
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
                        <li class="breadcrumb-item active">Manage Consumers</li>
                    </ol>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                                       
                                        <!--Table section-->
                                <div class="">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Passengers List</h3>
                                        </div>
                                    <br>
                                    <form action="showChecked.php" method="post">
                                       <table style="margin: 10px;"class="table table-bordered" id="myTable" width="98.4%">
                                            <thead style="font: bolder">
                                                <tr>
                                                   <th>S/No</th>
                                                   <th>Select</th>
                                                   <th>Name</th>
                                                   <th>Email</th>
                                                   <th>Phone</th>
                                                   <th>Referal Code</th>
                                                   <th>Wallet Amount</th>
                                                   <th>Created Date</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                               </thead>
                                               <tbody>
                                                   <?php
                                                   $result = mysqli_query($connect, "select * from tbl_users where userType = 'u'");
                                                   
                                                   while($row= mysqli_fetch_assoc($result)):
                                                   ?>
                                                   <tr>
                                                       <td></td>
                                                       <td><input type="checkbox" name="setStatus[]" id="setStatus[]" value="<?php echo $row['uId']; ?>"></td>
                                                       <td><?php echo $row['firstName'] ." ".$row['lastName'];?></td>
                                                       <td><?php echo $row['email'];?></td>
                                                       <td><?php echo $row['mobileNo'];?></td>
                                                       <td>--</td>
                                                       <td>0</td>
                                                       <td><?php echo $row['createdDate'];?></td>
                                                       <td>X</td>
                                                       <td><button type="button" id="getEdit" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['uId']?>"><i class="lnr lnr-pencil" title="Edit"></i></button></td>
                                                   </tr>
                                                   <?php endwhile; ?>
                                               </tbody>
                                               <tfoot style="font: bolder">
                                                <tr>
                                                    <th>S/No</th>
                                                   <th><input type="checkbox" id="selectall" name="selectall"/>All</th>
                                                   <th>Name</th>
                                                   <th>Email</th>
                                                   <th>Phone</th>
                                                   <th>Referal Code</th>
                                                   <th>Wallet Amount</th>
                                                   <th>Created Date</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                               </tfoot>
                                                
                                        </table>
                                    <div style="margin: 10px; margin-bottom: 10px; ">
                                          <select style="float: left; margin-right: 5px; height: 2em;" id="statusDrop" name="statusDrop">
                                                <option  value="" disabled selected>--Change Status--</option>
                                                <option value="1">Active</option>
                                                <option value="2">Blocked</option>
                                                <option value="3">Trashed</option>
                                            </select>
                                        <!--<input type="hidden" id="table" name="table" value='tbl_passengers'>
                                        <input type="hidden" id="returnto" name="returnto" value='manage_consumers.php'>
                                            <button type="submit" id="showCheck" class="btn btn-default btn-xs" style=" margin-right: 5px;">Update All</button>-->
                                    </div>
                                    </form>
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
                                      <div class="modal fade" id="myModal3" role="dialog">
                                    <div class="modal-dialog">
                                        <div id="content-data3"></div>
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
            dom: 'Bfrtip',
           buttons: [
            { "extend": 'excel', "text":'Export to Excel',"className": 'btn btn-default btn-xs' },
            { "text":'Import',"className": 'btn btn-default btn-xs', action: function(){
                    importconsumer();
            } }
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
        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            $('#content-data').html('');
            $.ajax({
                url:'edit_driver.php',
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
        function importconsumer(){
            window.open('import_consumer.php','_self',false);
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
<?php
global $connect;
if(isset($_POST['btnEdit'])){
        $per_id=mysqli_real_escape_string($connect,$_POST['txtid']);
        $firstname=mysqli_real_escape_string($connect,$_POST['firstname']);
        $lastname=mysqli_real_escape_string($connect,$_POST['lastname']);
        $email=mysqli_real_escape_string($connect,$_POST['email']);
        $gender=mysqli_real_escape_string($connect,$_POST['gender']);
        $license_exp=mysqli_real_escape_string($connect,$_POST['license_exp']);
        $pco_license=mysqli_real_escape_string($connect,$_POST['pcolicense']);
        $pco_expiry=mysqli_real_escape_string($connect,$_POST['pcoexpiry']);
        $drivers_ins=mysqli_real_escape_string($connect,$_POST['insuranceno']);
        $ins_exp=mysqli_real_escape_string($connect,$_POST['insurance_exp']);
        $national_ins=mysqli_real_escape_string($connect,$_POST['national_ins']);
        $national_insExp=mysqli_real_escape_string($connect,$_POST['national_exp']);
        $mobile_no=mysqli_real_escape_string($connect,$_POST['mobile']);
        $fleet_co=mysqli_real_escape_string($connect,$_POST['txtconame']);
        $country=mysqli_real_escape_string($connect,$_POST['txtcountry']);
        $state=mysqli_real_escape_string($connect,$_POST['txtstate']);
        $city=mysqli_real_escape_string($connect,$_POST['txtcity']);
        $address=mysqli_real_escape_string($connect,$_POST['txtaddress']);
        $birth_date=mysqli_real_escape_string($connect,$_POST['birthdate']);
        $license=mysqli_real_escape_string($connect,$_POST['license']);
        //$photo=mysqli_real_escape_string($connect,$_POST['license']);
        
          $image = $_FILES['photo']['name'];
          $image_tmp = $_FILES['photo']['tmp_name'];
          
          move_uploaded_file($image_tmp, "img/drivers/photo/$license"."$image");
    
    
    $sqlupdate="UPDATE tbl_driver SET firstname='$firstname',lastname='$lastname',email='$email', gender='$gender', birthdate='$birth_date', license_expiry='$license_exp', pco_license='$pco_license', pco_expiry='$pco_expiry', insurance_no='$drivers_ins', insurance_expiry='$ins_exp', national_insNo='$national_ins', national_insExpiry='$national_insExp', mobile='$mobile_no', fleet_co='$fleet_co', photo='$image', address='$address',country='$country',state='$state',city='$city' WHERE id='$per_id'";
    $result_update=mysqli_query($connect,$sqlupdate);
    
    if($result_update){
        echo'<script>alert("Update Successful!")</script>';
        //echo '<script>window.location.href="manage_dispatcher.php"</script>';
    }
    else{
        echo '<script>alert("Update Failed: '. mysqli_error($connect).'")</script>';
    }
}
?>