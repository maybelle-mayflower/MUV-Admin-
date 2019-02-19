<?php
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;

function updateStatus($id, $status, $table){
    global $con;
    $qry = "Update $table SET status='$status' WHERE id='$id'";
    $run = mysqli_query($con, $qry);
    if($run){
        echo 'Status Update Successful';
        //echo '<script>window.location.href="manage_company.php"</script>';
        
    }
    else{
        echo 'Status Update Failed';
    }
}
if($_POST['dropId']){
    $id = $_POST['dropId'];
    $status = $_POST['dropVal'];
    $table = $_POST['dropTbl'];
    updateStatus($id, $status,$table);  
}
?>
