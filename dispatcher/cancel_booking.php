<head>
    <style>
    .pac-container {
    z-index: 1051 !important;
    </style>
}
</head>

<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql = "select * from tbl_bookings where id='$id'";
    $run = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($run);
    $name = $row['passenger_name'];
    $driver = $row['driver_id'];
    $status = $row['status'];
    
    if(strcmp($status, "Cancelled")==0 || strcmp($status, "Completed")==0 || strcmp($status, "Awaiting Payment")==0 ){
        
        ?>
    <div class="modal-content">
            <div class="modal-body">
                <h4>This booking can no longer be cancelled</h4>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" style="width: 100px;">Ok</button>
            </div>
        </div>
<?php
    }else{
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Cancel Booking?</h3>
            </div>
            <div class="modal-body">
                <h4>Passenger: <span style="font-weight:bold;"><?php echo $name;?></span></h4>
                <input type="hidden" name="cancelid" id="cancelid" value="<?php echo $id;?>">
                <input type="hidden" name="canceldriver" id="canceldriver" value="<?php echo $driver;?>">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-xs"  style="width: 100px;" name="confirmCancel">Yes</button>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" style="width: 100px;">No</button>
            </div>
        </div>
    </form>
<?php
    }
}//end if
?>






