<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    

$con=$connect;

?>


<!DOCTYPE html>
<html>
    <head>
	<title>Marketing| Add Campaign</title>
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
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css"/>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">-->
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
    .required:before { color: red; content:'*'; }
</style>
</head>

<body>
    <div class="se-pre-con"></div>
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
                                                                    <li><a href="../fleet_tracking/track.php" class="">Track</a></li>
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
				<div class="container-fluid" style="height: auto;">
					<div class="panel panel-default">
                                        <div class="panel-heading">
                                                <h3 class="panel-title">Add Campaign</h3>
                                        </div> 
                                    <br>
                                    <div class="panel-body">
                                        <form class="form-horizontal" action="testCampaign.php" method="post" enctype="multipart/form-data">
                                            <div class="box-body col-md-12" style="float: left;">
                                                
                                                <table border="0" cellpadding="5" cellspacing="5" width="100%">
                                                    <tbody>
                                                        <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Title:</td>
                                                            <td><input type="text" class="form-control" maxlength="75" id="title" name="title" style="padding-bottom:2em;"required=""></td>
                                                        </tr>
                                                        
                                                        <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">User Type:</td>
                                                            <td>  <label class="radio-inline">
                                                                    <input type="radio" id="userType" name="userType" value="newuser">New User
                                                                  </label>
                                                                  <label class="radio-inline">
                                                                      <input type="radio" checked="true" id="userType" name="userType" value="existinguser">Existing User
                                                                  </label>
                                                                  <label class="radio-inline">
                                                                      <input type="radio" name="userType" id="userType" value="inactiveuser">Inactive User
                                                                  </label></td>
                                                        </tr>
                                                       
                                                            <tr class="new_user_row">
                                                               <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em;"></td>
                                                               <td>
                                                                       <input type="file" class="form-control" id="newuser" name="newuser">
                                                                       <h5 style="font-weight: bold;">Import Instructions</h5>
                                                                       <p style="font-size: 0.8em;">1. Download <a>Sample Import File</a> to see an example</p>
                                                                       <p style="font-size: 0.8em;">2. Please Upload xls, xlsl and csv format only</p>
                                                                       <p style="font-size: 0.8em;">3. File size should be within 100 kB, Can send upto 1000 users only</p>
                                                               </td>
                                                           </tr>
                                                           
                                                           <tr class="inactive_user_row" style="margin-bottom: 10px;">
                                                            <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em;"></td>
                                                            <td>
                                                                <select class="form-control" id="inactiveuser" name="inactiveuser">
                                                                    <option>7 days</option>
                                                                    <option>15 days</option>
                                                                    <option>30+ days</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    <br>
                                                        
                                                         <tr class="existing_user_row" style="margin-bottom: 10px;">
                                                            <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em; color: white;">Select</td>
                                                                    <td>
                                                                        <select class="form-control" id="passenger" name="passenger">
                                                                            <option value="all">All Passengers</option>
                                                                            <option value="select">Select Passenger</option>
                                                                        </select>
                                                                    </td>
                                                        </tr>
                                                        <?php
                                                        global $connect;
                                                        $sqlSel = "SELECT * FROM tbl_users WHERE userType='u'";
                                                        $res = mysqli_query($connect, $sqlSel);
                                                        ?>
                                                        <tr class="select_pass_row" style="margin-bottom: 10px;">
                                                            <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em; color: white;">Show Passengers</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="select_passenger" name="select_passenger" list="datalist">
                                                                    <datalist id="datalist">
                                                                    <?php
                                                                    while($row = mysqli_fetch_array($res))
                                                                        {
                                                                            $first_name = $row['firstName'];
                                                                            $last_name = $row['lastName'];
                                                                            
                                                                            echo "<option value=".$row['uId'].">$first_name".' '."$last_name</option>";
                                                                        }
                                                                    ?>
                                                                    </datalist>
                                                                </td>
                                                        </tr>
                                                    
                                                        <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Notification Type:</td>
                                                            <td style=" padding-bottom:2em;">  <label class="radio-inline">
                                                                    <input type="radio" value="smsnotify" checked="true" name="notificationtype">SMS
                                                                  </label>
                                                                  <label class="radio-inline">
                                                                      <input type="radio" value="emailnotify" name="notificationtype">Email
                                                                  </label>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr class="sms_row" style="margin-bottom: 10px;">
                                                            <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em;"></td>
                                                            <td><textarea class="form-control" id="smstemplate" name="smstemplate" style="padding-bottom:2em;"required="">Dear ##USERNAME##, ##PROMOCODE##. Validity From - ##STARTDATE## To - ##EXPIREDATE## , Usage limit - ##USAGELIMIT##</textarea></td>
                                                        </tr>
                                                        
                                                        <tr class="emailtemplate_row" style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Select Template:</td>
                                                            <td style=" padding-bottom:2em;">  <label class="radio-inline">
                                                                    <input type="radio" value="default" checked="true" name="emailtemplatetype">Default 
                                                                  </label>
                                                                  <label class="radio-inline">
                                                                      <input type="radio" value="newuser" name="emailtemplatetype">New User
                                                                  </label>
                                                                <label class="radio-inline">
                                                                      <input type="radio" value="promotional" name="emailtemplatetype">Promotional
                                                                  </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        function getTemplate($id){
                                                            global $connect;
                                                            $sqlTemp = "SELECT * FROM tbl_campaign_templates WHERE id='$id'";
                                                            $tempRes = mysqli_query($connect, $sqlTemp);
                                                            
                                                            while($row = mysqli_fetch_array($tempRes)){
                                                                $desc = $row['description'];
                                                            }
                                                            echo $desc; 
                                                        }
                                                        ?>
                                                        <tr class="default_email" style="margin-bottom: 10px;">
                                                            <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em;"></td>
                                                            <td><textarea class="form-control" id="defaultemail" name="defaultemail" style="padding-bottom:2em;"required=""><?php getTemplate(1);?></textarea></td>
                                                        </tr>
                                                        
                                                        <tr class="newuser_email" style="margin-bottom: 10px;">
                                                            <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em;"></td>
                                                            <td><textarea class="form-control" id="newuseremail" name="newuseremail" style="padding-bottom:2em;"required=""><?php getTemplate(2);?></textarea></td>
                                                        </tr>
                                                        
                                                        <tr class="promotional_email" style="margin-bottom: 10px;">
                                                            <td width="30%" class="" style="font-weight: bolder; padding-bottom:2em;"></td>
                                                            <td><textarea class="form-control" id="promotionalemail" name="promotionalemail" style="padding-bottom:2em;"required=""><?php getTemplate(3);?></textarea></td>
                                                        </tr>
                                                        
                                                         <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Promo Code:</td>
                                                            <td><input type="text" class="form-control" maxlength="75" id="promocode" name="promocode" style="" value="randomcode"></td>
                                                        </tr>
                                                          <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Promotion Type:</td>
                                                                    <td>
                                                                        <select class="form-control" id="promotype" name="promotype">
                                                                        <option value="" selected="true" disabled="">--Select--</option>
                                                                        <option value="Promotion Amount">Promotion Amount</option>
                                                                        <option value="Promotion Discount(%)">Promotion Discount(%)</option>
                                                                        </select>
                                                                    </td>
                                                        </tr>
                                                        
                                                        <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Amount Discount:</td>
                                                            <td><input type="text" class="form-control" maxlength="75" id="discountamt" name="discountamt" style=""required=""></td>
                                                        </tr>
                                                        
                                                         <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Promo Limit:</td>
                                                            <td><input type="text" class="form-control" maxlength="75" id="promolimit" name="promolimit" style=""required="" value="1"></td>
                                                        </tr>
                                                          <tr style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Validity:</td>
                                                            <td width="35%">
                                                                <input type='text' class="form-control" style="" id="datepicker" name="datepicker" placeholder="Start Date"/>
                                                             </td>
                                                             <td>
                                                                 <input type='text' class="form-control" style="" id="datepicker2" name="datepicker2" placeholder="End Date"/>
                                                             </td>
                                                          </tr>
                                                        
                                                          <tr class="schedule_row" style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Schedule:</td>
                                                            <td><select class="form-control" id="schedule" name="schedule">
                                                                        <option value="now">Now</option>
                                                                        <option value="later">Later</option>
                                                                 </select>
                                                            </td>
                                                        </tr>
                                                        <tr class="schedule_date_row" style="margin-bottom: 10px;">
                                                            <td width="30%" class="required" style="font-weight: bolder; padding-bottom:2em;">Schedule Date:</td>
                                                            <td>
                                                                <div class='input-group'>
                                                                    <input type='text' class="form-control" style="" id="datepicker3" name="datepicker3" placeholder="Schedule Date"/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="campaign.php"><input type="button" id="back" name="back" value="Back" class="btn btn-default btn-sm"></a>
                                                                <button type="submit" id="addExpBtn" name="addCampBtn" class="btn btn-default btn-sm" style="">Submit</button>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                               
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
				<p class="copyright">&copy; 2018. All Rights Reserved.</p>
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
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="../assets/scripts/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         
         <script src="../ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('defaultemail');
            CKEDITOR.replace('promotionalemail');
            CKEDITOR.replace('newuseremail');
        </script>
        <script>
        $( function() {
            var pickerOpts = {
                dateFormat: "yy-mm-dd"
            };
          $( "#datepicker" ).datepicker(pickerOpts);
        } );
        </script>
          <script>
        $( function() {
             var pickerOpts = {
                dateFormat: "yy-mm-dd"
            };
          $( "#datepicker2" ).datepicker(pickerOpts);
        } );
        $( function() {
             var pickerOpts = {
                dateFormat: "yy-mm-dd"
            };
          $( "#datepicker3" ).datepicker(pickerOpts);
        } );
        </script>

      <script>
         function goBack(){
             window.open('campaign.php','_self',false);
         }
      </script>
      <script>
        $(document).ready(function(){
            $('tr.new_user_row').hide();
            $('tr.default_email').hide();
            $('tr.existing_user_row').show();
            $('tr.inactive_user_row').hide();
            $('tr.sms_row').show();
            $('tr.emailtemplate_row').hide();
            $('tr.select_pass_row').hide();
            $('tr.schedule_date_row').hide();
            $('tr.newuser_email').hide();
            $('tr.promotional_email').hide();
            
             
             
            $('input:radio[name=userType]').on('click', function () {
            var name = $(this).val();
            switch (name) {
            case 'newuser':
                $('tr.new_user_row').show();
                $('tr.existing_user_row').hide();
                $('tr.inactive_user_row').hide();
                break;
            case 'existinguser':
                $('tr.new_user_row').hide();
                $('tr.existing_user_row').show();
                $('tr.inactive_user_row').hide();
                break;
            case 'inactiveuser':
                $('tr.new_user_row').hide();
                $('tr.existing_user_row').show();
                $('tr.inactive_user_row').show();
                break;
            default:
                
                break;
            }
        });
    });
    
    $('input:radio[name=notificationtype]').on('click', function () {
        var name = $(this).val();
        switch (name) {
        case 'smsnotify':
            $('tr.sms_row').show();
            $('tr.email_template_select').hide();
            $('tr.default_email').hide();
            $('tr.newuser_email').hide();
            $('tr.promotional_email').hide();
            $('tr.emailtemplate_row').hide();

            break;
        case 'emailnotify':
            $('tr.sms_row').hide();
            $('tr.emailtemplate_row').show();
            $('tr.default_email').show();
            break;
        default:
            break;
        }
    });
    
        $('input:radio[name=emailtemplatetype]').on('click', function () {
        var name = $(this).val();
        switch (name) {
        case 'default':
            $('tr.default_email').show();
            $('tr.promotional_email').hide();
            $('tr.newuser_email').hide();
            break;
        case 'newuser':
            $('tr.newuser_email').show();
            $('tr.default_email').hide();
            $('tr.promotional_email').hide();
            break;
         case 'promotional':
            $('tr.promotional_email').show();
            $('tr.newuser_email').hide();
            $('tr.default_email').hide();
            break;
        default:
            break;
        }
    });
    
     $('#passenger').on('change', function () {
        var name = $(this).val();
        switch (name) {
        case 'select':
            $('tr.select_pass_row').show();
            break;
        case 'all':
            $('tr.select_pass_row').hide();
            break;
        default:
            $('tr.select_pass_row').hide();
            break;
        }
    });
    
        $('#schedule').on('change', function () {
        var name = $(this).val();
        switch (name) {
        case 'now':
            $('tr.schedule_date_row').hide();
            break;
        case 'later':
            $('tr.schedule_date_row').show();
            break;
        default:
            
            break;
        }
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
