<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

    $con=$connect;

    function updateStatus($id, $status, $table){
        global $con;
        if(strcmp($status, "Trashed")==0)
            {
                 //echo "'Entry(ies) will be deleted'";
                 $qry = "DELETE FROM $table WHERE id='$id'";
            }
            else
            {
                $qry = "Update $table SET status='$status' WHERE id='$id'";
            }

        $run = mysqli_query($con, $qry);
        if($run){
            echo 'Update Successful'; 
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
