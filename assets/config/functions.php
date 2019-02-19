<?php
include 'config.php';


function getTotalPayment($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT SUM(totalCharges) FROM tbl_rides";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT SUM(totalCharges) FROM tbl_rides WHERE startDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function getTotalPassengers($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(userType) FROM tbl_users WHERE userType='u'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(userType) FROM tbl_users WHERE userType='u' AND updatedDate BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function getAvgTrips($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(id) FROM tbl_rides WHERE totalCharges IS NOT NULL";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(id) FROM tbl_rides WHERE totalCharges IS NOT NULL AND createdDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function totalCancellationCharge($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT SUM(totalCharges) FROM tbl_rides WHERE status='r'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT SUM(totalCharges) FROM tbl_rides WHERE status='r' AND createdDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function getCashPayment($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT SUM(payByCash) FROM tbl_rides";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT SUM(payByCash) FROM tbl_rides WHERE startDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function callCenterCount(){
    global $connect;
    $qry = "SELECT COUNT(id) FROM tbl_bookings WHERE booking_type='Call Center'";
    $result = mysqli_query($connect, $qry);
    $row = mysqli_fetch_array($result);
    
    return $row[0];
}
function appBookingCount(){
    global $connect;
    $qry = "SELECT COUNT(id) FROM tbl_bookings WHERE booking_type='Mobile App'";
    $result = mysqli_query($connect, $qry);
    $row = mysqli_fetch_array($result);
    
    return $row[0];
}
function getWalletPayment($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT SUM(payByWallet) FROM tbl_rides";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT SUM(payByWallet) FROM tbl_rides WHERE startDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function getUsers($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(userType) FROM tbl_users";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(userType) FROM tbl_users WHERE lastLoginDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}
function getActiveDrivers($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(userType) FROM tbl_users WHERE userType='d' AND isActive='y'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(userType) FROM tbl_users WHERE userType='d' AND isActive='y' AND lastLoginDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function getActivePassengers($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(userType) FROM tbl_users WHERE userType='u' AND isActive='y'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(userType) FROM tbl_users WHERE userType='u' AND isActive='y' AND lastLoginDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}
function getCompleteRides($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(status) FROM tbl_rides WHERE status='c'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(status) FROM tbl_rides WHERE status='c' AND startDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}
function getCancelledRides($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(status) FROM tbl_rides WHERE status='r'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(status) FROM tbl_rides WHERE status='r' AND startDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}
function getBookingCount(){
    global $connect;
    $qry = "SELECT COUNT(id) FROM tbl_bookings";
    $result = mysqli_query($connect, $qry);
    $row = mysqli_fetch_array($result);
    
    return $row[0]; 
}
function getTotalDrivers(){
    global $connect;
    $qry = "SELECT COUNT(userType) FROM tbl_users WHERE userType='d'";
    $result = mysqli_query($connect, $qry);
    $row = mysqli_fetch_array($result);
    
    return $row[0]; 
}
function paymentTypeName($type){
    $w = 'w';
    $c = 'c';
    if(strcmp($type, $w)==0)
    {
        return 'Wallet';
    }
    else
    {
        return 'Cash';
    }
}

function getFleet($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(id) FROM tbl_cars";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(id) FROM tbl_cars WHERE updateDate BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}
function getAssignedFleet($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(id) FROM tbl_cars WHERE isAssigned='y'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(id) FROM tbl_cars WHERE isAssigned='y' AND updateDate BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function getActiveFleet($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(id) FROM tbl_cars WHERE status='Active'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(id) FROM tbl_cars WHERE status='Active' AND updateDate BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}
function getAvailableFleet($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(id) FROM tbl_cars WHERE status='Active' AND isAssigned='n'";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(id) FROM tbl_cars WHERE status='Active' AND isAssigned='n' AND updateDate BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function getTotalKM($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT SUM(totalDistance) FROM tbl_rides";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT SUM(totalDistance) FROM tbl_rides WHERE createdDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}
function getTrips($startdate=null, $enddate=null){
    global $connect;
    $tot ='';
if($startdate==NULL || $enddate==NULL)
    {
        $qry = "SELECT COUNT(id) FROM tbl_rides";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
 else {
        $qry = "SELECT COUNT(id) FROM tbl_rides WHERE createdDateTime BETWEEN '$startdate' and '$enddate' ";
        $result = mysqli_query($connect, $qry);
        $row = mysqli_fetch_array($result);
        $tot = $row[0];
    }
    return $tot;
}

function ridesInProgress(){
    global $connect;
    $qry = "SELECT COUNT(status) FROM tbl_rides WHERE status='s'";
    $result = mysqli_query($connect, $qry);
    $row = mysqli_fetch_array($result);
    
    return $row[0]; 
}

function getCompanies($id){
    global $connect;

    $run_co = '';
    if(!empty($id))
    {
        $q1 = "SELECT company_name FROM companies WHERE id='$id'";
        $runq1 = mysqli_query($connect, $q1);
        $row = mysqli_fetch_array($runq1);
        
        echo "<option value='$id'>$row[0]</option>";
        
        $get_co = "SELECT * FROM companies WHERE id<>'$id'";
        $run_co = mysqli_query($connect, $get_co);
    }
    else{
      $get_co = "SELECT * FROM companies";
      $run_co = mysqli_query($connect, $get_co);  
    }
    while ($row_co= mysqli_fetch_array($run_co)){
        $co_name = $row_co['company_name'];
        $co_id = $row_co['id'];
      
        echo "<option value='$co_id'>$co_name</option>";
    }
}

function getDriver($id){
    global $connect;
    
    $get_co = "SELECT * FROM tbl_driver WHERE id='$id'";
    $run_co = mysqli_query($connect, $get_co);
    $row_co= mysqli_fetch_array($run_co);
    $fullname = $row_co['firstname'].' '.$row_co['lastname'];
    return $fullname;
}

function listAllDrivers(){
     global $connect;
      $get_co = "SELECT * FROM tbl_driver where id<>'10' ORDER BY firstname";
      $run_co = mysqli_query($connect, $get_co);  
    
    while ($row_co= mysqli_fetch_array($run_co)){     
        $co_name = $row_co['firstname'].' '.$row_co['lastname'];
      
        echo "<option value=".$row_co['id'].">$co_name</option>";
    }
}

function listAllPassengers(){
     global $connect;
      $get_co = "SELECT * FROM tbl_users where userType='u' ORDER BY firstName";
      $run_co = mysqli_query($connect, $get_co);  
    
    while ($row_co= mysqli_fetch_array($run_co)){     
        $co_name = $row_co['firstName'].' '.$row_co['lastName'];
      
        echo "<option value=".$row_co['uId'].">$co_name</option>";
    }
}
function getModels($name){
    global $connect;
    $run_co = '';
    if(!empty($name))
    {
        echo "<option>$name</option>";
        $get_co = "SELECT * FROM tbl_fleet WHERE model_name<>'$name'";
        $run_co = mysqli_query($connect, $get_co);
    }
    else{
      $get_co = "SELECT * FROM tbl_fleet";
      $run_co = mysqli_query($connect, $get_co);  
    }
    while ($row_co= mysqli_fetch_array($run_co)){
        $co_name = $row_co['model_name'];
      
        echo "<option>$co_name</option>";
    }
}
function listDrivers($id){
    global $connect;
    $get_name = "SELECT * FROM tbl_driver WHERE id='$id'";
    $run_name= mysqli_query($connect, $get_name);
    $row_name = mysqli_fetch_array($run_name);
    $name = $row_name['firstname'].' '.$row_name['lastname'];
    
    echo "<option value=".$id.">$name</option>";
    $get_co = "SELECT * FROM tbl_driver WHERE id<>'$id' AND firstname IS NOT NULL";
    $run_co = mysqli_query($connect, $get_co);
    while ($row_co= mysqli_fetch_array($run_co)){
        $co_name = $row_co['firstname'].' '.$row_co['lastname'];
      
        echo "<option value=".$row_co['id'].">$co_name</option>";
    }
}

function listAvailDrivers($id){
    global $connect;
    $get_name = "SELECT * FROM tbl_driver WHERE id='$id'";
    $run_name= mysqli_query($connect, $get_name);
    $row_name = mysqli_fetch_array($run_name);
    $name = $row_name['firstname'].' '.$row_name['lastname'];
    
    echo "<option value=".$id.">$name</option>";
    
    $get_co = "SELECT * FROM tbl_driver WHERE id<>'$id' AND isAssigned='n' AND status='Active' AND firstname IS NOT NULL";
    $run_co = mysqli_query($connect, $get_co);
    while ($row_co= mysqli_fetch_array($run_co)){
        $co_name = $row_co['firstname'].' '.$row_co['lastname'];
      
        echo "<option value=".$row_co['id'].">$co_name</option>";
    }
}
function freeDrivers(){
    global $connect;
    
    $get_co = "SELECT * FROM tbl_driver WHERE isBusy='n' AND status='Active'";
    $run_co = mysqli_query($connect, $get_co);
    while ($row_co= mysqli_fetch_array($run_co)){
        $co_name = $row_co['firstname'].' '.$row_co['lastname'];
      
        echo "<option value=".$row_co['id'].">$co_name</option>";
    }
}
function fleetNum($company_id){
    global $connect;

    $getfleet= "SELECT COUNT(id) FROM tbl_cars WHERE fleet_company='$company_id'";
    $runfleet = mysqli_query($connect, $getfleet);
    $fleet_num = mysqli_fetch_array($runfleet);
    return $fleet_num[0];
}


function driverNum($company_id){
    global $connect;

    $getDrivers= "SELECT COUNT(id) FROM tbl_driver WHERE fleet_co='$company_id'";
    $runDrivers = mysqli_query($connect, $getDrivers);
    $driver_num = mysqli_fetch_array($runDrivers);
    return $driver_num[0];
}

function dispatcherNum($companyId){
        global $connect;
    $getDis= "SELECT COUNT(id) FROM tbl_dispatcher WHERE company='$companyId'";
    $runDis = mysqli_query($connect, $getDis);
    $dis_num = mysqli_fetch_array($runDis);
    return $dis_num[0];
}

function getStatus($status){
    global $connect;
    //$ret ='';
    echo '<option>'.$status.'</option>';
    $qry = "SELECT * FROM tbl_status WHERE status<>'$status'";
    $run= mysqli_query($connect, $qry);
    while($row= mysqli_fetch_array($run)){
        
        echo '<option value='.$row["id"].'>'.$row["status"].'</option>';  
    }
    //return $ret;
}
function getSt($status){
    
    $ret= '<option>'.$status.'</option>';
    echo $ret;
}
function testFunct($test){
    global $connect;
    $ret ='';
    $ret.= '<option>'.$test.'</option>';
    $qry = "SELECT * FROM tbl_status WHERE status<>'$test'";
    
    $run= mysqli_query($connect, $qry);
    while($row= mysqli_fetch_array($run)){
        $ret.= '<option value='.$row["id"].'>'.$row["status"].'</option>';  
    }
    return $ret;
}
function getID($companyName){
    global $connect;
    $qry = "SELECT * FROM companies WHERE company_name ='$companyName'";
    $run= mysqli_query($connect, $qry);
    $row = mysqli_fetch_assoc($run);
    return $row['id'];
}

function getFleetID($num){
    global $connect;
    
    $get_co = "SELECT * FROM tbl_cars WHERE carNumber='$num'";
    $run_co = mysqli_query($connect, $get_co);
    $row_co= mysqli_fetch_array($run_co);
    
    return $row_co['id'];
}

function dailyTotalCharge(){
    global $connect;
        $sql = "SELECT DATE(createdDateTime) AS dates, SUM(totalCharges) AS chargesum FROM tbl_rides WHERE totalCharges IS NOT NULL GROUP BY DATE(createdDateTime)";
        $run = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($run)){
            extract($row);
            $dates = strtotime($dates)*1000;
            $data[]="[$dates, $chargesum]";
        }
        return $data;
}
function dailyCompletedCharge(){
    global $connect;
        $sql = "SELECT DATE(createdDateTime) AS dates, SUM(totalCharges) AS chargesum FROM tbl_rides WHERE status='c' AND totalCharges IS NOT NULL GROUP BY DATE(createdDateTime)";
        $run = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($run)){
            extract($row);
            $dates = strtotime($dates)*1000;
            $data[]="[$dates, $chargesum]";
        }
        return $data;
}
function dailyCancelledCharge(){
    global $connect;
        $sql = "SELECT DATE(createdDateTime) AS dates, SUM(totalCharges) AS chargesum FROM tbl_rides WHERE status='r' AND totalCharges IS NOT NULL GROUP BY DATE(createdDateTime)";
        $run = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($run)){
            extract($row);
            $dates = strtotime($dates)*1000;
            $data[]="[$dates, $chargesum]";
        }
        return $data;
}
function ratingPerDriver(){
    global $connect;
        $sql = "SELECT tbl_rides.driverId AS driverId, tbl_ride_feedback.id AS id, tbl_ride_feedback.rideId AS rideId, tbl_ride_feedback.rating AS rating, tbl_ride_feedback.comment AS comments, tbl_ride_feedback.createdDate AS createdDate FROM tbl_ride_feedback INNER JOIN tbl_rides ON tbl_ride_feedback.rideId=tbl_rides.id GROUP BY tbl_rides.driverId, tbl_ride_feedback.id";
        $run = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($run)){
            extract($row);
            $data[]="[$driverId, $rating]";
        }
        return $data;
}

function dailyTrips(){
    global $connect;
    $sql1="SELECT DATE_FORMAT(createdDateTime, '%Y-%m-%d') AS day, COUNT(*) AS total FROM tbl_rides WHERE totalCharges IS NOT NULL GROUP BY DATE_FORMAT(createdDateTime, '%Y-%m-%d')";
    $run2 = mysqli_query($connect, $sql1);
    while ($row2 = mysqli_fetch_array($run2)){
        extract($row2);
        $date2 = strtotime($day)*1000;
        $data[]="[$date2, $total]";
    }
    return $data;
}

function newSignUp(){
    global $connect;
    $sql2="SELECT DATE_FORMAT(createdDate, '%Y-%m-%d') AS days, COUNT(*) AS totals FROM tbl_users WHERE NOT userType = 'd' AND  createdDate IS NOT NULL GROUP BY DATE_FORMAT(createdDate, '%Y-%m-%d')";
    $run3 = mysqli_query($connect, $sql2);
    while ($row3 = mysqli_fetch_array($run3)){
        extract($row3);
        $date3 = strtotime($days)*1000;
        $data[]="[$date3, $totals]";
    }
    return $data;
}

function driverAvailability(){
    global $connect;
    $sql1="SELECT DATE_FORMAT(lastLoginDateTime, '%Y-%m-%d') AS day, COUNT(*) AS total FROM tbl_users WHERE userType='d' AND isOnline='y' AND lastLoginDateTime IS NOT NULL GROUP BY DATE_FORMAT(lastLoginDateTime, '%Y-%m-%d')";
    $run2 = mysqli_query($connect, $sql1);
    while ($row2 = mysqli_fetch_array($run2)){
        extract($row2);
        $date2 = strtotime($day)*1000;
        $data[]="[$date2, $total]";
    }
    return $data;
}
function dailyCompletedRides(){
    global $connect;
    $sql1="SELECT DATE_FORMAT(createdDateTime, '%Y-%m-%d') AS day, COUNT(*) AS total FROM tbl_rides WHERE status ='c' GROUP BY DATE_FORMAT(createdDateTime, '%Y-%m-%d')";
    $run1 = mysqli_query($connect, $sql1);
    while ($row1 = mysqli_fetch_array($run1)){
        extract($row1);
        $date1 = strtotime($day)*1000;
        $data[]="[$date1, $total]";
    }
    return $data;
}
function dailyCancelledRides(){
    global $connect;
    $sql2="SELECT DATE_FORMAT(createdDateTime, '%Y-%m-%d') AS day, COUNT(*) AS total FROM tbl_rides WHERE status ='r' GROUP BY DATE_FORMAT(createdDateTime, '%Y-%m-%d')";
    $run2 = mysqli_query($connect, $sql2);
    while ($row2 = mysqli_fetch_array($run2)){
        extract($row2);
        $cancel_date = strtotime($day)*1000;
        $cancelled[]="[$cancel_date, $total]";
    }
    return $cancelled;
}
function dailyAvailableDrivers(){
    global $connect;
    $sql3="SELECT DATE_FORMAT(lastLoginDateTime, '%Y-%m-%d') AS day, COUNT(*) AS total FROM tbl_users WHERE userType='d' AND isOnline='y' AND lastLoginDateTime IS NOT NULL GROUP BY DATE_FORMAT(lastLoginDateTime, '%Y-%m-%d')";
    $run3 = mysqli_query($connect, $sql3);
    while ($row3 = mysqli_fetch_array($run3)){
        extract($row3);
        $date3 = strtotime($day)*1000;
        $unavailable[]="[$date3, $total]";
    }
    return $unavailable;
}

function dailyAvailableFleet(){
    global $connect;
    $sql3="SELECT DATE_FORMAT(updateDate, '%Y-%m-%d') AS day, COUNT(*) AS total FROM tbl_cars WHERE isAssigned='n' AND status='Active' AND updateDate IS NOT NULL GROUP BY DATE_FORMAT(updateDate, '%Y-%m-%d')";
    $run3 = mysqli_query($connect, $sql3);
    while ($row3 = mysqli_fetch_array($run3)){
        extract($row3);
        $date3 = strtotime($day)*1000;
        $unavailable[]="[$date3, $total]";
    }
    return $unavailable;
}
function avgRevPerUser(){
    global $connect;
    $sql_avg="SELECT DATE_FORMAT(createdDateTime, '%Y-%m-%d') AS day, SUM(totalCharges) AS total FROM tbl_rides WHERE totalCharges IS NOT NULL GROUP BY DATE_FORMAT(createdDateTime, '%Y-%m-%d')";
    $run_avg = mysqli_query($connect, $sql_avg);
    while ($row2 = mysqli_fetch_array($run_avg)){
        extract($row2);
        $date2 = strtotime($day)*1000;
        $total_avg = $total / getUsers();
        $total_avg = number_format($total_avg, 2);
        $data_avg[]="[$date2, $total_avg]";
    }
    return $data_avg;
}

function getLoginActivity(){
    global $connect;
    $sql = "SELECT DATE_FORMAT(lastLoginDateTime, '%Y-%m-%d') AS day, COUNT(*) AS total FROM tbl_users WHERE lastLoginDateTime IS NOT NULL GROUP BY DATE_FORMAT(lastLoginDateTime, '%Y-%m-%d')";
    $run = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($run)){
        extract($row);
        $createdDateTime = strtotime($day)*1000;
        $data[]="[$createdDateTime, $total]";
    }
    return $data;
}

function listFleet($name){
    global $connect;

    echo "<option>$name</option>";
    $get_co = "SELECT * FROM tbl_cars WHERE carNumber<>'$name' AND isAssigned='n'";
    $run_co = mysqli_query($connect, $get_co);
    while ($row_co= mysqli_fetch_array($run_co)){
        $fleet_no = $row_co['carNumber'];
      
        echo "<option>$fleet_no</option>";
    }
}

function checkAvailability($id){
    global $connect;
    $sql = "SELECT * tbl_cars WHERE id='$id'";
    echo $sql;
    /*$run = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($run);
    if($row['isAssigned']=='y'){
        echo '<button type="button" id="getEdit" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$id.'"><i class="fa fa-edit"></i></button>
            ';
    }
    else
    {
        echo '--';
    } */
}
function check($id){
    $ch = "check";
    $yes = 'y';
    $no = "n";
    $blocked = "Blocked";
    $trashed = "Trashed";
    
    global $connect;
    $sql = "SELECT isAssigned FROM tbl_cars WHERE id='$id'";
    $run = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($run);

    $sql2 = "SELECT status FROM tbl_cars WHERE id='$id'";
    $run2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_array($run2);
    if(strcmp($row[0], $yes)==0 || strcmp($row2[0], $blocked)==0|| strcmp($row2[0], $trashed)==0){
        if(strcmp($row2[0], $blocked)==0 || strcmp($row2[0], $trashed)==0)
        {
            echo 'Blocked';
        }else{
            echo '--';
        }
    }
    else
    {
        echo '<button type="button" id="getAssign" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal3" data-id="'.$id.'"><i class="fa fa-clipboard"></i></button>
                ';
    }
}

function isAssigned($id){
    $ch = "check";
    $yes = 'Active';
    $no = 'Unassigned';
    global $connect;
    $sql = "SELECT status FROM tbl_assign WHERE id='$id'";
    $run = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($run);

    if(strcmp($row[0], $no)==0){
        echo '--';
    }
    else
    {
        echo '<button type="button" id="getEdit" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="fa fa-edit"></i></button>';
    }
}

function getDriverAssignment($id){
     global $connect;
     $ret = '';
    $qry ="SELECT * FROM tbl_assign WHERE driver_id='$id'";
    $run = mysqli_query($connect, $qry);
    if($run)
    {
        while($row = mysqli_fetch_array($run))
        {
            $ret = $row['fleet_no'];
        }
    }
    return $ret;
}

function fetchRideDriver($id){
    
    global $connect;
    $qry ="SELECT driverId FROM tbl_rides WHERE id='$id'";
    $run = mysqli_query($connect, $qry);
    $row = mysqli_fetch_array($run);
    
    $driver = getDriver($row[0]);
    
    return $driver;
}

function getPassenger($id){
    global $connect;
    $s = "SELECT * FROM tbl_users WHERE uId='$id'";
    $r = mysqli_query($connect, $s);
    $rowe = mysqli_fetch_array($r);
    
    return $rowe['firstName'].' '.$rowe['lastName'];
}
function getd($id){
    global $connect;
    $s = "SELECT * FROM tbl_users WHERE uId='$id'";
    $r = mysqli_query($connect, $s);
    $rowe = mysqli_fetch_array($r);
    
    return $rowe['firstName'].' '.$rowe['lastName'];
}
function rideStatus($type,$id){
    global $connect;
    $w ='w';
    $p ='p';
    $s='s';
    $c ='c';
    $r ='r';
    if(strcmp($type, $r)==0)
    {
         $sql ="SELECT * FROM tbl_rides WHERE id='$id'";
          $run = mysqli_query($connect, $sql);
          $rowe = mysqli_fetch_array($run);
          
          if(strcmp($rowe['rejectedBy'],'a'))
          {
              return 'Ride Cancelled by Admin'; 
          }
           else if(strcmp($rowe['rejectedBy'],'u'))
          {
              return 'Ride Cancelled by User'; 
          }
           /*if(strcmp($rowe['rejectedBy'],'d'))
          {
              return 'Ride Cancelled by Driver'; 
          }*/
          else
          {
              return 'Ride Cancelled'; 
          }
    }
    if(strcmp($type, $c)==0)
    {
      return 'Completed';  
    }
    if(strcmp($type, $p)==0)
    {
        return 'Ride Pending';
    }
    if(strcmp($type, $s)==0)
    {
      return 'Ride Started';  
    }
}

function getExpCats($id){
    global $connect;
    if(!empty($id))
    {
        $get_name = "SELECT * FROM expense_category WHERE id='$id'";
        $run_name= mysqli_query($connect, $get_name);
        $row_name = mysqli_fetch_array($run_name);
        $name = $row_name['category'];

        echo "<option value=".$id.">$name</option>";
    }
    
        $get_co = "SELECT * FROM expense_category WHERE id<>'$id'";
        $run_co = mysqli_query($connect, $get_co);
        while ($row_co= mysqli_fetch_array($run_co)){
            $co_name = $row_co['category'];

            echo "<option value=".$row_co['id'].">$co_name</option>";
        }
    
}

    function getDays($startDate, $endDate)
   {
        $start = strtotime($startDate);
        $end = strtotime($endDate);
        $datediff = $end - $start;
        return round($datediff / (60 * 60 * 24));
    }
    
    function getCount(){
        global $connect;
    $qry = "SELECT COUNT(id) FROM tbl_campaign";
    $result = mysqli_query($connect, $qry);
    $row_count = mysqli_fetch_array($result);
    return $row_count[0]; 
    }
    
    function bookingAction($id){
    global $connect;
    $a = "Assign";
    $b = 'Reassign';
    $c = 'Cancelled';
    $t = 'Completed';
    $i = 'In Progress';
    $w = 'Awaiting Payment';
    $s = 'Start Pickup';
    
    $sql = "SELECT status FROM tbl_bookings WHERE id='$id'";
    $run = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($run);

    if(strcmp($row[0], $a)==0){
        echo '<button type="button" id="assignDriver" class="btn btn-default btn-xs" style="height:25px; font-weight:bold;" data-toggle="modal" data-target="#myModal" data-id="'.$id.'">Assign</button>';
    }
    else if(strcmp($row[0], $b)==0)
    {
        echo '<button type="button" id="reassignDriver" class="btn btn-primary btn-xs" data-toggle="modal" style="height:25px; font-weight:bold;" data-target="#myModal" data-id="'.$id.'">Reassign</button>';
    }
    else if(strcmp($row[0], $c)==0){
        echo '<button type="button" class="btn btn-danger btn-xs disabled" style="height:25px; font-weight:bold;">Cancelled</button>';
    }
    else if(strcmp($row[0], $t)==0)
    {
        echo '<button type="button" class="btn btn-success btn-xs" style="height:25px; font-weight:bold;" data-id="'.$id.'">Completed</button>';
    }
     else if(strcmp($row[0], $i)==0)
    {
        echo '<button type="button" class="btn btn-warning btn-xs" style="height:25px; font-weight:bold;" data-id="'.$id.'">In Progress</button>';
    }
    
}

function companyRegTemplate($coname, $email, $password){
    $message = "";
    $message .= '<table cellpadding="0" cellspacing="0" style="width:600px; margin:0 auto; font-family:Arial, Helvetica, sans-serif; color:#696969; border:1px solid #d9d9d9;">
	<tbody>
		<tr style="margin-top:30px; padding:20px; border:1px solid #c8c8c8; border-bottom:none;">
			<td style="padding:20px; border-bottom:1px solid #d9d9d9;"><a href="http://app.muv.com.ng/"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><img alt="MUV LOGO" src="./assets/img/logo-dark2.jpg" width="160" /></font></a></td>
		</tr>
		<tr style="border:1px solid #c8c8c8; padding:20px 20px 20px 20px; border-bottom:none;">
			<td style="padding:20px;">
                            <div style="height: 30px; background: orange; text-align: center;">
                                <p><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Hi '.$coname.',</font></p>
                            </div>
			<p>&nbsp;</p>

			<p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">We are delighted to have you as a member of our community..</font></p>
			<p>&nbsp;</p>
                        <p style="margin-top:15px; font-weight: bolder; font-size: 1.2em;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Back-end Login Credentials :</font></p>
                        
                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong>Login URL: &nbsp;<a href="http://muvng.fasta.ng/company/login">http://muvng.fasta.ng/company/login.php</a></strong></font></p>
                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong>Email: </strong> '.$email.' </font></p>
                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong>Password: </strong> '.$password.' </font></p>

                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Once logged in, kindly fill in the company settings using the below url.</font></p>

			<p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong><a href="#ACTIVATION_LINK#">http://muvng.fasta.ng/company/company_settings.php</a></strong></font></p>

			<p style="margin-bottom:5px; margin-top:40px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Regards,</font></p>

			<p style="color:#5b9bd5; font-size:20px; font-weight:bold; margin-top:0;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><span style="font-size: 13px; font-weight: normal;">MUVNG Aministrator</span></font></p>
			</td>
		</tr>
		<tr style="background:#f7f7f7; font-size:12px; padding:20px; border:1px solid #c8c8c8; text-align:center;">
			<td style="padding:20px 0;">
			
			<p style="margin-bottom:5px; margin-top:0;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><span style="font-size: 13px;">©2018 MUV. All rights reserved. Developed by Michrosys Technologies.</span></font></p>
			</td>
		</tr>
	</tbody>
</table>';
    
    return $message;
    
}
function companyReg($email, $password){
    global $connect;
     $sql = "SELECT templates FROM tbl_email_templates WHERE constant ='Company Registration'";
     $run = mysqli_query($connect, $sql);
     
    $rate = mysqli_fetch_array($run);
    $message = $rate[0];
    $msg = str_replace(
        array('##EMAIL##', '##PASSWORD##'), 
        array($email, $password), 
        $message
      );
    return $msg;    
}

function driverReg($username, $mobile, $password){
    global $connect;
     $sql = "SELECT templates FROM tbl_email_templates WHERE constant ='Driver Registration'";
     $run = mysqli_query($connect, $sql);
     
    $rate = mysqli_fetch_array($run);
    $message = $rate[0];
    $msg = str_replace(
        array('##USERNAME##','##MOBILE##', '##PASSWORD##'), 
        array($username, $mobile, $password), 
        $message
      );
    return $msg;    
}
function dispatcherReg($name, $email, $password){
    global $connect;
     $sql = "SELECT templates FROM tbl_email_templates WHERE constant ='Dispatcher Registration'";
     $run = mysqli_query($connect, $sql);
     
    $rate = mysqli_fetch_array($run);
    $message = $rate[0];
    $msg = str_replace(
        array('##USERNAME##', '##EMAIL##', '##PASSWORD##'), 
        array($name, $email, $password), 
        $message
      );
    return $msg;    
}
?>