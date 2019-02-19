<?php 
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    
$con = $connect;

if(isset($_POST['addDriver'])){ 
    
    $image = $_FILES['photo']['name'];
    $image_tmp = $_FILES['photo']['tmp_name'];
    
    $license_photo = $_FILES['license']['name'];
    $license_tmp= $_FILES['license']['tmp_name'];
    
    
    
    $id = mysqli_real_escape_string($con,$_POST['txtid']);
    $new_firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $new_lastname=mysqli_real_escape_string($con,$_POST['lastname']);
    $new_email=mysqli_real_escape_string($con,$_POST['email']);
    $new_mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    $new_address=mysqli_real_escape_string($con,$_POST['txtaddress']);
    $new_fleetcompany=mysqli_real_escape_string($con,$_POST['txtconame']);
    $new_country=mysqli_real_escape_string($con,$_POST['txtcountry']);
    $new_state=mysqli_real_escape_string($con,$_POST['txtstate']);
    $new_city=mysqli_real_escape_string($con,$_POST['txtcity']);
    $password=mysqli_real_escape_string($con,$_POST['txtpass']);
    //$gender=mysqli_real_escape_string($con,$_POST['gender']);
    $birth_date=mysqli_real_escape_string($con,$_POST['birthdate']);
    $license_id=mysqli_real_escape_string($con,$_POST['licenseno']);
    $license_exp=mysqli_real_escape_string($con,$_POST['license_exp']);
    //$license_photo=mysqli_real_escape_string($con,$_POST['license']);
    $pco_license=mysqli_real_escape_string($con,$_POST['pcolicense']);
    $pco_expiry=mysqli_real_escape_string($con,$_POST['pcoexpiry']);
    $insurance_no=mysqli_real_escape_string($con,$_POST['insuranceno']);
    $insurance_exp=mysqli_real_escape_string($con,$_POST['insurance_exp']);
    $national_ins=mysqli_real_escape_string($con,$_POST['national_ins']);
    $national_insExp=mysqli_real_escape_string($con,$_POST['national_exp']);
    
    
        move_uploaded_file($image_tmp, "img/drivers/photo/$new_email"."$image");
        move_uploaded_file($license_tmp, "img/drivers/license/$new_email"."$license_photo");
        
         
    $sqlupdate="INSERT INTO tbl_driver (status, firstname, lastname, email, gender, birthdate, license_no, license_expiry, license_image, pco_license, pco_expiry, insurance_no, insurance_expiry, national_insNo, national_insExpiry, mobile, fleet_co, country, state, city, booking_limit, address, photo) VALUES ('Active','$new_firstname','$new_lastname','$new_email','Female','$birth_date','$license_id','$license_exp','$license_photo','$pco_license','$pco_expiry','$insurance_no','$insurance_exp','$national_ins','$national_insExp','$new_mobile','$new_fleetcompany','$new_country','$new_state','$new_city', 'LIMIT','$new_address','$image')";

    $result_update=mysqli_query($con,$sqlupdate);
    if($result_update){
            
            $emailTemp = driverReg($new_firstname, $new_mobile, $password);
            driverMail($new_firstname, $new_email, $emailTemp); 
            echo '<script>alert("Driver Added!")</script>';
            echo '<script>window.location.href="manage_drivers.php"</script>';
    }
    else{
        echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
	<title>Fleet Tracking | Add Driver</title>
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
                                                <h3 class="panel-title">Add Driver</h3>
                                                <div class="right">
                                                    <a href="manage_drivers.php" style="float: right;">Exit</a>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" action="add_driver.php" method="post" enctype="multipart/form-data" onsubmit="return submitDriver()">

                                                    <div class="box-body">
                                                        <p><h4>Personal Information</h4><span style="font-size: 0.8em; font-style: italic;">(All fields are required)</span></p>

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="firstname">First Name</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="firstname" name="firstname" required="">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="lastname">Last Name</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="lastname" name="lastname" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="email">Email</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="email" name="email" required="" onchange="checkMail()">
                                                                <p style="margin: 0px;" id="divCheckEmail" name="divCheckEmail"></p>
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="txtpass">Password</label>
                                                            <div class="col-sm-6">
                                                                <input type="password" class="form-control" id="txtpass" name="txtpass" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="confirmpass">Confirm Password</label>
                                                            <div class="col-sm-6">
                                                                <input type="password" class="form-control" id="confirmpass" name="confirmpass" required="true" onchange="checkMatch();">
                                                                <p style="margin: 0px;" id="divCheckMatch" name="divCheckMatch"></p>
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="gender">Gender</label>
                                                            <div class="col-sm-6">
                                                                 <select class="form-control" id="gender" name="gender">
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="birthdate">Date of Birth</label>
                                                            <div class="col-sm-6">
                                                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="licenseno">Driver's License No</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="licenseno" name="licenseno">
                                                            </div>
                                                        </div> <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="license_exp">Driver's License Expiry</label>
                                                            <div class="col-sm-6">
                                                                <input type="date" class="form-control" id="license_exp" name="license_exp">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="license">Driver's License</label>
                                                            <div class="col-sm-6">
                                                                <input type="file" class="form-control" id="license" name="license">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="pcolicense">PCO License Number</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="pcolicense" name="pcolicense">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="pcoexpiry">PCO License Expiry</label>
                                                            <div class="col-sm-6">
                                                                <input type="date" class="form-control" id="pcoexpiry" name="pcoexpiry">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="insuranceno">Driver's Insurance Number</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="insuranceno" name="insuranceno">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="insurance_exp">Driver's Insurance Expiry</label>
                                                            <div class="col-sm-6">
                                                                <input type="date" class="form-control" id="insurance_exp" name="insurance_exp">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label " for="national_ins">National Insurance Number</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="national_ins" name="national_ins">
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="national_exp">National Insurance Expiry</label>
                                                            <div class="col-sm-6">
                                                                <input type="date" class="form-control" id="national_exp" name="national_exp">
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="col-sm-4 control-label" for="photo">Photo</label>
                                                            <div class="col-sm-6">
                                                                <input type="file" class="form-control" id="photo" name="photo">
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <div class="col-sm-6">
                                                                <input type="hidden" class="form-control required" id="txtid" name="txtid" readonly>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="box-body">
                                                        
                                                      <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="mobile">Mobile Number</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="mobile" name="mobile">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="txtconame">Fleet Company</label>
                                                            <div class="col-sm-6">
                                                                <select class="form-control" id="txtconame" name="txtconame">
                                                                    <option value="" disabled selected>--Select Company--</option>
                                                                    <?php
                                                                    getCompanies(1);
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="txtcountry">Country</label>
                                                            <div class="col-sm-6">
                                                                 <select class="form-control" id="txtcountry" name="txtcountry">
                                                                     <option value="" disabled selected>--Select--</option>
                                                                    <option>Nigeria</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="txtstate">State</label>
                                                            <div class="col-sm-6">
                                                                 <select class="form-control" id="txtstate" name="txtstate">
                                                                     <option value="" disabled selected>--Select--</option>
                                                                     <option>Edo</option>
                                                                    <option>Lagos</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="txtcity">City</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="txtcity" name="txtcity">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label required" for="txtaddress">Address</label>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" id="txtaddress" name="txtaddress"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="addDriver" name="addDriver" class="btn btn-default btn-sm" style="float: right;">Submit</button>
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
        var driver_email= $("#email").val();
            $.ajax({
                type:'post',
                url:'email_availability.php',// put your real file name 
                data:{driver_email: driver_email},
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

function submitDriver(){
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

function driverMail($name, $email, $message){
    require_once ("Mail.php");
    require_once ("Mail/mime.php"); 

    $from = "MUVNG Administrator <muvadmin@muvng.fasta.ng>";
    $to = "$name <$email>";
    $subject = "Driver Registration Successful";

    $host = "smtp.muvng.fasta.ng";
    $port = '25';
    $username = "muvadmin@muvng.fasta.ng";
    $password = "R3v3lat1on!";

    $text = "";

    $headers['From'] = $from;
    $headers['To'] = $to;
    $headers['Subject'] = $subject;
    $headers['Content-Type'] = 'text/html; charset=UTF-8';
    $headers['Content-Transfer-Encoding']= '8bit';

    $mime = new Mail_mime;
    $mime->setTXTBody($text);
    $mime->setHTMLBody($message);

    $mimeparams=array();
    $mimeparams['text_encoding']='8bit';
    $mimeparams['text_charset']='UTF-8';
    $mimeparams['html_charset']='UTF-8';
    $mimeparams['head_charset']='UTF-8';
    //$mimeparams['debug'] = 'True'; //Uncomment this if you want to view Debug information

    $body = $mime->get($mimeparams);
    $headers = $mime->headers($headers);

    $smtpinfo['host'] = $host;
    $smtpinfo['port'] = $port;
    $smtpinfo['auth'] = true;
    $smtpinfo['username'] = $username;
    $smtpinfo['password'] = $password;
   // $smtpinfo['debug'] = 'True'; //Uncomment this if you want to view Debug information

    $mail=& Mail::factory('smtp', $smtpinfo);
    $mail->send($to, $headers, $body);
    if (PEAR::isError($mail)) 
        {
           echo("Error " . $mail->getMessage() . "");
        } 
        else 
        {
           echo("Confirmation mail successfully sent to user");
        }
    }
?>