<?php

session_start();  
include './assets/config/config.php';
include './assets/config/functions.php';

global $connect;
 if($_POST["action"] == "indexfilter")  
 {
     $start = $_POST["startdate"];
     $end = $_POST["enddate"];
     
     ?>

<?php

$totalPayment = getTotalPayment($start,$end);
$commission =  (10/100)*$totalPayment;
$cashPayment = getCashPayment($start,$end);
$walletPayment= getWalletPayment($start,$end);

$totalUsers = getUsers($start,$end);
$activeDrivers = getActiveDrivers($start,$end);
$activePassengers = getActivePassengers($start,$end);
$completeRides = getCompleteRides($start,$end);
$cancelledRides = getCancelledRides($start,$end);
$tripsinProgress= ridesInProgress();
$dailyTrips = dailyTrips();
?>
<div class="row">
                <div class="col-md-4">
                    <div class="metric">
                        <img class="icon" style="background-color: white;"src="assets/icons/paymenticon.png">
                                <p>
                                    <span class="number">₦<?php echo number_format($totalPayment, 2);?></span>
                                        <span class="title">Payments</span>
                                </p>
                </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                            <img class="icon" style="background-color: white;"src="assets/icons/commission_icon2.png">
                                <p>
                                        <span class="number">₦<?php echo number_format($commission, 2);?></span>
                                        <span class="title">Commission</span>
                                </p>
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: white;"src="assets/icons/cash_icon.png">
                                <p>
                                        <span class="number">₦<?php echo number_format($cashPayment, 2);?></span>
                                        <span class="title">Cash Payments</span>
                                </p>
                        </div>
                </div>
        </div>

<div class="row" id="overview_div">
            <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: white;"src="assets/icons/wallet_icon.png">
                                <p>
                                        <span class="number">₦<?php echo number_format($walletPayment, 2);?></span>
                                        <span class="title">Wallet Payments</span>
                                </p>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: white;"src="assets/icons/users_icon.png">
                                <p>
                                        <span class="number"><?php echo $totalUsers;?></span>
                                        <span class="title">Total Users</span>
                                </p>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                            <img class="icon" style="background-color: white;"src="assets/icons/driver_icon.png">
                                <p>
                                        <span class="number"><?php echo $activeDrivers;?></span>
                                        <span class="title">Active Drivers</span>
                                </p>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: white;"src="assets/icons/passenger_icon.png">
                                <p>
                                        <span class="number"><?php echo $activePassengers;?></span>
                                        <span class="title">Active Passengers</span>
                                </p>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: white;"src="assets/icons/completedtrips_icon.png">
                                <p>
                                        <span class="number"><?php echo $completeRides;?></span>
                                        <span class="title">Completed Trips</span>
                                </p>
                        </div>
                </div>
            <div class="col-md-4">
                        <div class="metric" >
                            <img class="icon" style="background-color: white;"src="assets/icons/cancelledtrips_icon.png">
                                <p>
                                        <span class="number"><?php echo $cancelledRides;?></span>
                                        <span class="title">Cancelled Trips</span>
                                </p>
                        </div>
                </div>
        </div>


<?php
 }
 
 if($_POST["action"] == "fleetdashboard")  
 {
     $start = $_POST["startdate"];
     $end = $_POST["enddate"];
     
    $totalFleet = getFleet($start, $end);
    $assignedFleet = getAssignedFleet($start, $end);
    $unassignedFleet = $totalFleet - $assignedFleet;
    $activeFleet= getActiveFleet($start, $end);
    $availableFleet= getAvailableFleet($start, $end);
    $unavailableFleet=$totalFleet-$availableFleet;
    $totalKM= getTotalKM($start, $end);
    $emptyKM=0;
    ?>
        <div class="row">
                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: white;"src="../assets/icons/total_fleet.png">
                                <p>
                                    <span class="number"><?php echo $totalFleet;?></span>
                                        <span class="title">Total Fleet</span>
                                </p>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                            <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/fleetass_icon.png">
                                <p>
                                        <span class="number"><?php echo $assignedFleet;?></span>
                                        <span class="title">Assigned Fleet</span>
                                </p>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: red;"src="../assets/icons/fleetass_icon.png">
                                <p>
                                        <span class="number"><?php echo $unassignedFleet;?></span>
                                        <span class="title">Unassigned Fleet</span>
                                </p>
                        </div>
                </div>
        </div>
<div class="row" id="overview_div">
                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/activefleet_icon.png">
                                <p>
                                    <span class="number"><?php echo $activeFleet;?></span>
                                        <span class="title">Total Active Fleet</span>
                                </p>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="metric">
                            <img class="icon" style="background-color: lightcoral;"src="../assets/icons/activefleet_icon.png">
                                <p>
                                        <span class="number"><?php echo $availableFleet;?></span>
                                        <span class="title">Available Fleet</span>
                                </p>
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="metric">
                                <img class="icon" style="background-color: orange;"src="../assets/icons/activefleet_icon.png">
                                <p>
                                        <span class="number"><?php echo $unavailableFleet;?></span>
                                        <span class="title">Unavailable Fleet</span>
                                </p>
                        </div>
                </div>
        <div class="col-md-4">
                        <div class="metric">
                            <img class="icon" style="background-color: white;"src="../assets/icons/road_icon.png">
                                <p>
                                    <span class="number"><?php echo number_format($totalKM,2);?></span>
                                        <span class="title">Total Kilometers</span>
                                </p>
                        </div>
        </div>

    </div>

<?php
 }
 
 if($_POST["action"] == "dispatcherdashboard")  
 {
     $start = $_POST["startdate"];
     $end = $_POST["enddate"];
     
    global $connect;
    $completeRides = getCompleteRides($start, $end);
    $cancelledRides = getCancelledRides($start, $end);
    $tripsinProgress= ridesInProgress();
    $totalTrips = getTrips($start, $end);
    ?>
            <div class="row">
                    <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/totaltrips_icon.png">
                                    <p>
                                        <span class="number"><?php echo $totalTrips?></span>
                                            <span class="title">Total Trips</span>
                                    </p>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: greenyellow;"src="../assets/icons/completetrips_icon.png">
                                    <p>
                                            <span class="number"><?php echo $completeRides;?></span>
                                            <span class="title">Completed Trips</span>
                                    </p>
                            </div>
                    </div>

                    <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: lightcoral;"src="../assets/icons/cancelled_trips.png">
                                    <p>
                                            <span class="number"><?php echo $cancelledRides;?></span>
                                            <span class="title">Cancelled/Rejected</span>
                                    </p>
                            </div>
                    </div>
            </div>

<?php
 }
 if($_POST["action"] == "revenuedashboard")  
 {
     $start = $_POST["startdate"];
     $end = $_POST["enddate"];
     $avgRev = 0;
     $avgCancRev = 0;
     $avgTripRev = 0;

    $totalCharge = getTotalPayment($start, $end);
    $payingUsers = getTotalPassengers($start, $end);
    $paidTrips = getAvgTrips($start, $end);
    $cancRev = totalCancellationCharge($start, $end);
    if($payingUsers == 0)
    {
        $avgRev1 = 0;
        $avgCancRev1 = 0;
    }
    else
    {
        $avgRev = $totalCharge/$payingUsers;
        $avgRev = number_format($avgRev, 2);
        $avgCancRev = $cancRev/$payingUsers;
        $avgCancRev = number_format($avgCancRev1, 2);
    }
    if($paidTrips == 0)
    {
        $avgTripRev = 0;
    }
    else
    {
        $avgTripRev = $totalCharge/$paidTrips;
        $avgTripRev = number_format($avgTripRev, 2);
    }
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
                                                	

<?php
 }
 
 if($_POST["action"] == "marketingdashboard")  
 {
     $start = $_POST["startdate"];
     $end = $_POST["enddate"];
    
    $totalUsers = getUsers($start, $end);
    $activeUsers = getActivePassengers($start, $end);
    $inactiveUsers = $totalUsers - $activeUsers;

?>
<div class="row">
        <div class="col-md-4">
                <div class="metric">
                    <img class="icon" style="background-color: white;"src="../assets/icons/users_icon.png">
                        <p>
                            <span class="number"><?php echo $totalUsers; ?></span>
                                <span class="title">Total Users</span>
                        </p>
                </div>
        </div>
        <div class="col-md-4">
                <div class="metric">
                    <img class="icon" style="background-color: lightsteelblue;"src="../assets/icons/activeuser_icon.png">
                        <p>
                                <span class="number"><?php echo $activeUsers;?></span>
                                <span class="title">Active Users</span>
                        </p>
                </div>
        </div>

        <div class="col-md-4">
                <div class="metric">
                    <img class="icon" style="background-color: lightcoral;"src="../assets/icons/activeuser_icon.png">
                        <p>
                                <span class="number"><?php echo $inactiveUsers;?></span>
                                <span class="title">Inactive Users</span>
                        </p>
                </div>
        </div>
</div>

<?php
 }
 
 if($_POST["action"] == "analyticsdashboard")  
 {
     $start = $_POST["startdate"];
     $end = $_POST["enddate"];
     $avgRev = 0;
     $avgTripRev = 0;
    
    $fleetNo = getFleet($start, $end);
    $activeFleet = getActiveFleet($start, $end);
    $availableFleet = getAvailableFleet($start, $end);
    $totalKMS = getTotalKM($start, $end);
    //$emptyKM;
    $totalTrips = getTrips($start, $end);
    $completedTrips = getCompleteRides($start, $end);
    $rejectedTrips = getCancelledRides($start, $end);
    $totalCharge = getTotalPayment($start, $end);
    $payingUsers = getUsers($start, $end);
    $paidTrips = getAvgTrips($start, $end);
    if($payingUsers != 0){
        $avgRev = $totalCharge/$payingUsers;
        $avgRev = number_format($avgRev, 2);
    }
    if($paidTrips != 0){
        $avgTripRev = $totalCharge/$paidTrips;
        $avgTripRev = number_format($avgTripRev, 2);
    }
    ?>
            <div class="row">
                    <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: white"src="../assets/icons/total_fleet.png">
                                    <p>
                                        <span class="number"><?php echo $fleetNo;?></span>
                                            <span class="title">No of Fleets</span>
                                    </p>
                            </div>
                    </div>
                <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/fleetass_icon.png">
                                    <p>
                                            <span class="number"><?php echo $activeFleet; ?></span>
                                            <span class="title">Active Fleets</span>
                                    </p>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: #18C0DF;"src="../assets/icons/fleetass_icon.png">
                                    <p>
                                            <span class="number"><?php echo $availableFleet; ?></span>
                                            <span class="title">Available Fleets</span>
                                    </p>
                            </div>
                    </div>

    <div id="overview_div">
                <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/road_icon.png">
                                    <p>
                                        <span class="number"><?php echo number_format($totalKMS, 2);?></span>
                                            <span class="title">Total KMS</span>
                                    </p>
                            </div>
                    </div>
                <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: wheat;"src="../assets/icons/road_icon.png">
                                    <p>
                                            <span class="number"><?php echo "0" ?></span>
                                            <span class="title">Empty KMS</span>
                                    </p>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/totaltrips_icon.png">
                                    <p>
                                            <span class="number"><?php echo $totalTrips ?></span>
                                            <span class="title">Total Trips</span>
                                    </p>
                            </div>
                    </div>
                 <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: #04b33e;"src="../assets/icons/completetrips_icon.png">
                                    <p>
                                        <span class="number"><?php echo $completedTrips; ?></span>
                                            <span class="title">Completed Trips</span>
                                    </p>
                            </div>
                    </div>
                <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/cancelledtrips_icon.png">
                                    <p>
                                            <span class="number"><?php echo $rejectedTrips; ?></span>
                                            <span class="title">Rejected Trips</span>
                                    </p>
                            </div>
                    </div>
                <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: whitesmoke;"src="../assets/icons/cash_icon.png">
                                    <p>
                                            <span class="number"><?php echo $avgTripRev ?></span>
                                            <span class="title">AVG Revenue Per Trip</span>
                                    </p>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="metric">
                                <img class="icon" style="background-color: wheat;"src="../assets/icons/cancelrevenue_icon.png">
                                    <p>
                                            <span class="number">0</span>
                                            <span class="title">Cancellation Revenue</span>
                                    </p>
                            </div>
                    </div>

                </div>
            </div>


<?php
 }