<?php 
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    

$con=$connect;

if(isset($_POST['addMo'])){ 
    
    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
    $new_status="Blocked";
    $modname=mysqli_real_escape_string($con,$_POST['modname']);
    $modelsize=mysqli_real_escape_string($con,$_POST['modelsize']);
    $basefare=mysqli_real_escape_string($con,$_POST['basefare']);
    $minkm=mysqli_real_escape_string($con,$_POST['minkm']);
    $minfare=mysqli_real_escape_string($con,$_POST['minfare']);
    $cancellation=mysqli_real_escape_string($con,$_POST['cancellation']);
    $addfee=mysqli_real_escape_string($con,$_POST['addfee']);
    $kmrange=mysqli_real_escape_string($con,$_POST['kmrange']);
    $belowkm=mysqli_real_escape_string($con,$_POST['belowkm']);
    $abovekm=mysqli_real_escape_string($con,$_POST['abovekm']);
    $waitfee=mysqli_real_escape_string($con,$_POST['waitfee']);
    $farepm=mysqli_real_escape_string($con,$_POST['farepm']);
    $minspeed=mysqli_real_escape_string($con,$_POST['minspeed']);
    $nightcharge=mysqli_real_escape_string($con,$_POST['nightcharge']);
    $eveningcharge=mysqli_real_escape_string($con,$_POST['eveningcharge']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
    
	    
    $sql_ins="INSERT INTO tbl_fleet (status, model_name, model_size, base_fare, min_km, min_fare, cancellation_fee, add_fee, km_range, below_km, above_km, waiting_charge, fare_per_minute, min_speed, night_charge, description, evening_charge) VALUES ('$new_status','$modname','$modelsize','$basefare','$minkm','$minfare','$cancellation','$addfee','$kmrange','$belowkm','$abovekm','$waitfee','$farepm','$minspeed','$nightcharge','$description','$eveningcharge')";
    
    $result_ins=mysqli_query($con,$sql_ins);
    if($result_ins){
        echo '<script>alert("New Model Added!")</script>';    
        echo '<script>window.location.href="fleet_models.php"</script>';
    }
    else{
        echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
	<title>Fleet Tracking | Manage Models</title>
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
                                                    <a href="#subPages" data-toggle="collapse" class=""><i class="lnr lnr-car"></i> <span>Fleet Tracking</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                    <div id="subPages" class="collapse ">
                                                            <ul class="nav">
                                                                <li><a href="dashboard.php" class="">Dashboard</a></li>
                                                                    <li><a href="track.php" class="">Track</a></li>
                                                                    <li>
                                                                        <a href="#subPagesa" data-toggle="collapse" class="collapsed"><span>Fleet Management</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                                                        <div id="subPagesa" class="collapse ">
                                                                            <ul class="nav">
                                                                                <li><a href="manage_company.php" class="">Manage Company</a></li>
                                                                                <li><a href="fleet_models.php" class="active">Fleet Models</a></li>
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
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                                    <div class="modal-content">
                                        <div class="panel panel-headline">
                                            
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Add A New Model</h3>
                                                <div class="right">
                                                    <a href="fleet_models.php" style="float: right;">Exit</a>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" action="add_model.php" method="post" enctype="multipart/form-data" onsubmit="return submitModel()">
    
                                                    <div class="box-body">
                                                        
                                                         <h3>Model Information</h3>

                                                        <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="modname">Model Name</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="modname" name="modname">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="modelsize">Model Size</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="modelsize" name="modelsize">
                                                             </div>
                                                         </div>

                                                     </div>

                                                     <div class="box-body">

                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="basefare">Base Fare(&#8358;)</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="basefare" name="basefare">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="minkm">Minimum KM</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="minkm" name="minkm">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="minfare">Minimum Fare(&#8358;)</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="minfare" name="minfare">
                                                             </div>
                                                         </div>
                                                          <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="cancellation">Cancellation Fee(&#8358;)</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="cancellation" name="cancellation">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="addfee">Additional Fare/KM(&#8358;)</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="addfee" name="addfee">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="kmrange">KM Range</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="kmrange" name="kmrange">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="belowkm">Below KM Fare/KM(&#8358;)</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="belowkm" name="belowkm">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="abovekm">Above KM Fare/KM(&#8358;)</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="abovekm" name="abovekm">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="waitfee">Waiting Charge/Minute(&#8358;)</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="waitfee" name="waitfee">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="farepm">Fare/Minute</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="farepm" name="farepm">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="minspeed">Minimum Speed</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="minspeed" name="minspeed">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="nightcharge">Night Charge</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="nightcharge" name="nightcharge">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="eveningcharge">Evening Charge</label>
                                                             <div class="col-sm-6">
                                                                 <input type="text" class="form-control" id="eveningcharge" name="eveningcharge">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label class="col-sm-4 control-label" for="description">Description</label>
                                                             <div class="col-sm-6">
                                                                 <textarea class="form-control" id="description" name="description"></textarea>
                                                             </div>
                                                         </div>
                                                             <div class="form-group">
                                                                 <label class="col-sm-4 control-label" for=""></label>
                                                                 <div class="col-sm-6">
                                                                     <label id="errordiv" name="errordiv"></label>
                                                                 </div>
                                                             </div>
                                                     </div>
                                                    
                                                    <button type="submit" id="addCo" name="addMo" class="btn btn-default btn-sm" style="float: right;">Submit</button>
                                                </form>
                                                
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
				<p class="copyright">&copy; 2018. All Rights Reserved.</p>
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
        
        <script>
            var emailAvailable = false;
    function checkMatch() {
        var password = $("#txtpass").val();
        var confirmPassword = $("#confirmpass").val();

        if (password !== confirmPassword)
        {
            $("#divCheckMatch").html("<p style='color: red;'>Passwords do not match<p>");
            return false;
        }
        else
        {
            $("#divCheckMatch").html("");
            return true;
        }
}

$(document).ready(function () {
   $("#confirmpass").keyup(checkMatch);
});


function checkMail(){
        var email= $("#txtemail").val();
            $.ajax({
                type:'post',
                url:'email_availability.php',// put your real file name 
                data:{email: email},
                success:function(data){
                    $('#divCheckEmail').html(data);
                    emailAvailable = true;
                },
                error:function(data){
                   $('#divCheckEmail').html("<p style='color:red;'>Email already registered!</p>");
                   emailAvailable = false;
                }
            });
}

function submitCompany(){
    if(checkMatch() && emailAvailable){
        return true;
    }
    else
    {
        $("#errordiv").html("<p style='color: red;'>Form errors found, please review.<p>");
        return false;
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