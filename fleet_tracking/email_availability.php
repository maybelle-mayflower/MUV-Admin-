<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $sql="select * from companies WHERE email='$email'";

    $run_sql=mysqli_query($con,$sql);
    
    $ecount= mysqli_num_rows($run_sql);
    if($ecount==0){
        echo "<p style='color:green;'>Email Available<span class='glyphicon glyphicon-check'></span></p>";
    }
    else
    {
        die(header("HTTP/1.0 404 Not Found"));
    }
}

if(isset($_POST['driver_email'])){
    $email=$_POST['driver_email'];
    $sql="select * from tbl_driver WHERE email='$email'";

    $run_sql=mysqli_query($con,$sql);
    
    $ecount= mysqli_num_rows($run_sql);
    if($ecount==0){
        echo "<p style='color:green;'>Email Available<span class='glyphicon glyphicon-check'></span></p>";
    }
    else
    {
        die(header("HTTP/1.0 404 Not Found"));
    }
}
if(isset($_POST['dispatcher_email'])){
    $email=$_POST['dispatcher_email'];
    $sql="select * from tbl_dispatcher WHERE email='$email'";

    $run_sql=mysqli_query($con,$sql);
    
    $ecount= mysqli_num_rows($run_sql);
    if($ecount==0){
        echo "<p style='color:green;'>Email Available<span class='glyphicon glyphicon-check'></span></p>";
    }
    else
    {
        die(header("HTTP/1.0 404 Not Found"));
    }
}