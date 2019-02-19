<?php
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con = $connect;
if(isset($_POST['dispatch'])){
    $name=mysqli_real_escape_string($con,$_POST['dname']);
    $email=mysqli_real_escape_string($con,$_POST['demail']);
    $mobile=mysqli_real_escape_string($con,$_POST['dmobile']);
    $pickup=mysqli_real_escape_string($con,$_POST['source']);
    $dropoff=mysqli_real_escape_string($con,$_POST['destination']);
    $date=mysqli_real_escape_string($con,$_POST['booking_datetime']);
    $model=mysqli_real_escape_string($con,$_POST['model']);
    $promo=mysqli_real_escape_string($con,$_POST['promo']);
    $dist=mysqli_real_escape_string($con,$_POST['dist']);
    $travel_time=mysqli_real_escape_string($con,$_POST['time']);
    $fare=mysqli_real_escape_string($con,$_POST['fare']);
    $status="Assign";
    
    //$formatted_time = date("H:i:s", strtotime($time));
    $formatted_date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO tbl_bookings(passenger_name,passenger_email,passenger_mobile,pickup,dropoff,pickup_time,model_id,status,booking_time,booking_type,driver_id,travel_dist, travel_fare) VALUES ('$name','$email','$mobile','$pickup','$dropoff','$formatted_date','$model','$status',now(),'Call Center','10','$dist','$fare')";
    
    $result_insert=mysqli_query($con,$sql);
    if($result_insert){
        echo '<script>alert("Booking Added!")</script>';
        echo '<script>window.location.href="dispatch.php"</script>';
    }
    else{
        echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
    }
    
}

if(isset($_POST['update'])){
    $name=mysqli_real_escape_string($con,$_POST['dname']);
    $email=mysqli_real_escape_string($con,$_POST['demail']);
    $mobile=mysqli_real_escape_string($con,$_POST['dmobile']);
    $pickup=mysqli_real_escape_string($con,$_POST['source']);
    $dropoff=mysqli_real_escape_string($con,$_POST['destination']);
    $date=mysqli_real_escape_string($con,$_POST['booking_datetime']);
    $model=mysqli_real_escape_string($con,$_POST['model']);
    $promo=mysqli_real_escape_string($con,$_POST['promo']);
    $dist=mysqli_real_escape_string($con,$_POST['dist']);
    $travel_time=mysqli_real_escape_string($con,$_POST['time']);
    $fare=mysqli_real_escape_string($con,$_POST['fare']);
    $status= mysqli_real_escape_string($con,$_POST['editstatus']);
    $id= mysqli_real_escape_string($con,$_POST['editid']);
    
    $formatted_date = date("Y-m-d H:i:s");
    $sql_u = "UPDATE tbl_bookings SET passenger_name ='$name', passenger_email ='$email', passenger_mobile='$mobile', pickup='$pickup', dropoff='$dropoff',pickup_time='$formatted_date', model_id='$model',status='$status',booking_time=now(),travel_dist='$dist', travel_fare='$fare' WHERE id='$id'";
    
    $result_u=mysqli_query($con,$sql_u);
    if($result_u){
        echo '<script>window.location.href="dispatch.php"</script>';
    }
    else{
        echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
    }
}

?>