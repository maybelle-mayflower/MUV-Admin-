<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
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
                <h4 class="modal-title">Edit Information</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    
                    <div class="box-body">
                        <h3>Model Information</h3>
                        
                       <div class="form-group">
                            <label class="col-sm-4 control-label" for="modname">Model Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="modname" name="modname" value="<?php echo $mod_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="modelsize">Model Size</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="modesize" name="modelsize" value="<?php echo $mod_size;?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                     
                    </div>
                    
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="basefare">Base Fare(&#8358;)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="basefare" name="basefare" value="<?php echo $base_fare;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="minkm">Minimum KM</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="minkm" name="minkm" value="<?php echo $min_km;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="minfare">Minimum Fare(&#8358;)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="minfare" name="minfare" value="<?php echo $min_fare;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="cancellation">Cancellation Fee(&#8358;)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="cancellation" name="cancellation" value="<?php echo $cancellation;?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="addfee">Additional Fare/KM(&#8358;)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="addfee" name="addfee" value="<?php echo $add_fee;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="kmrange">KM Range</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kmrange" name="kmrange" value="<?php echo $km_range;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="belowkm">Below KM Fare/KM(&#8358;)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="belowkm" name="belowkm" value="<?php echo $below_km;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="abovekm">Above KM Fare/KM(&#8358;)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="abovekm" name="abovekm" value="<?php echo $above_km;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="waitfee">Waiting Charge/Minute(&#8358;)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="waitfee" name="waitfee" value="<?php echo $waiting_charge;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="farepm">Fare/Minute</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="farepm" name="farepm" value="<?php echo $fare_pm;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="minspeed">Minimum Speed</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="minspeed" name="minspeed" value="<?php echo $min_speed;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="nightcharge">Night Charge</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nightcharge" name="nightcharge" value="<?php echo $night_charge;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="eveningcharge">Evening Charge</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="eveningcharge" name="eveningcharge" value="<?php echo $evening_charge;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="description">Description</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="description" name="description"><?php echo $desc;?></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>









