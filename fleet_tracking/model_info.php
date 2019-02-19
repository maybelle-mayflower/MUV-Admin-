<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){   
$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from tbl_fleet WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_status=$row[1];
        $mod_name=$row[2];
        $mod_size=$row[3];
        $base_fare=$row[4];
        $min_km=$row[5];
        $min_fare=$row[6];
        $cancellation=$row[7];
        $add_fee=$row[8];
        $km_range =$row[9];
        $below_km=$row[10];
        $above_km=$row[11];
        $waiting_charge=$row[12];
        $fare_pm=$row[13];
        $min_speed=$row[14];
        $night_charge=$row[15];
        $desc =$row[16];
        $evening_charge=$row[17];
    }//end while
?> 

<form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bolder;">MUV | Model Information</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Brand Name</label>
                            <div class="col-sm-6">
                                <p>Taxi</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="modesize">Model Name</label>
                            <div class="col-sm-6">
                                <p><?php echo $mod_name?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        
                        <h4>Fare Details</h4>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="basefare">Base Fare(&#8358;)</label>
                            <div class="col-sm-6">
                                <p><?php echo $base_fare?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="minkm">Minimum KM</label>
                            <div class="col-sm-6">
                                <p><?php echo $min_km?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="minfare">Minimum Fare(&#8358;)</label>
                            <div class="col-sm-6">
                                <p><?php echo $min_fare?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="cancellation">Cancellation Fee(&#8358;)</label>
                            <div class="col-sm-6">
                                <p><?php echo $cancellation?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="addfee">Additional Fare/KM(&#8358;)</label>
                            <div class="col-sm-6">
                                <p><?php echo $add_fee?></p>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="kmrange">KM Range</label>
                            <div class="col-sm-6">
                                <p><?php echo $km_range?></p>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="belowkm">Below KM Fare/KM(&#8358;)</label>
                            <div class="col-sm-6">
                                <p><?php echo $below_km?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="abovekm">Above KM Fare/KM(&#8358;)</label>
                            <div class="col-sm-6">
                                <p><?php echo $above_km?></p>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="waitfee">Waiting Charge/Minute(&#8358;)</label>
                            <div class="col-sm-6">
                                <p><?php echo $waiting_charge?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="farepm">Fare/Minute</label>
                            <div class="col-sm-6">
                                <p><?php echo $fare_pm?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="minspeed">Fleet Minimum Speed</label>
                            <div class="col-sm-6">
                                <p><?php echo $min_speed?></p>
                            </div>
                        </div>
                    </div>
                </form>
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
