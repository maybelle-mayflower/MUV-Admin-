<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
 
$id = $_POST['id'];

$getoldsql = "UPDATE tbl_payment_gateway SET is_default ='n'";
$runOld = mysqli_query($connect, $getoldsql);
if($runOld){
    $sql = "UPDATE tbl_payment_gateway SET is_default ='y' WHERE id='$id'";
    $run = mysqli_query($connect, $sql);
    if($run){
        echo "Default Gateway Changed.";
    }
    else
    {
        echo "Update Error: ";
    }
}

?>