<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){
$con=$connect;
if(isset($_REQUEST['id'])){
    
    $id=intval($_REQUEST['id']);
    //echo '<script>alert("'.$id.'")</script>';
    $sql="select * from tbl_campaign WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $promocode=$row['promo_code'];
        $promotype=$row['promo_type'];
        $promodiscount=$row['discount'];
        $startdate=$row['startDate'];
        $enddate=$row['endDate'];
        $promolimit=$row['promo_limit'];
        $notifytype=$row['notification_type'];

    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Information</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    
                     <div class="box-body">

                        <div class="form-group">
                                <label class="col-sm-4 control-label required" for="promocode">Promo Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="promocode" name="promocode" value="<?php echo $promocode;?>" required="">
                                </div>
                            </div>
                              
                              <div class="form-group">
                                <label class="col-sm-4 control-label" for="discount">Promo code Discount (%)</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $promodiscount;?>">
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label required" for="startdate">Start Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo $startdate;?>" required="">
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label class="col-sm-4 control-label required" for="enddate">Expiry Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo $enddate;?>" required="">
                                </div>
                            </div>
                         <div class="form-group">
                                <label class="col-sm-4 control-label required" for="limit">Promo Limit</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="limit" name="limit" value="<?php echo $promolimit;?>">
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-4 control-label" for="notifytype">Notification Type</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="notifytype" name="notifytype" value="<?php echo $notifytype;?>" readonly="true">
                                </div>
                            </div>
                         <div class="form-group">
                                <label class="col-sm-4 control-label" for="promotype">Promotion Type</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="promotype" name="promotype" value="<?php echo $promotype;?>" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $id;?>">
                                </div>
                            </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
        </div>
    </form>
<?php
    }//end if
}
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>









