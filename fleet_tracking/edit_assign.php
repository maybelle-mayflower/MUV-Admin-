<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql = "SELECT tbl_assign.id AS id, tbl_assign.status AS status, tbl_assign.driver_id AS driver_id, tbl_assign.fleet_no AS carno, tbl_cars.country AS country, tbl_cars.fleet_company AS company, tbl_cars.state AS state, tbl_assign.startDate AS startDate, tbl_assign.endDate AS endDate, tbl_cars.city AS city FROM tbl_assign INNER JOIN tbl_cars ON tbl_assign.fleet_no=tbl_cars.carNumber WHERE 1=1";

    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
         
    $fleetCo=$row['company'];
    $country=$row['country'];
    $state=$row['state'];
    $city=$row['city'];
    $driver_id=$row['driver_id'];
    $fleet_no=$row['carno'];
    $startDate=$row['startDate'];
    $endDate=$row['endDate'];
    $status = $row['status'];
   
    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Fleet Assignment</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="fleetco">Fleet Company</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="fleetco" name="fleetco">
                                    <?php
                                    getCompanies($fleetCo);
                                    ?>
                                </select>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label required" for="country">Country</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="country" name="country">
                                    <option><?php echo $country?></option>
                                </select>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label required" for="state">State</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="state" name="state">
                                <option><?php echo $state?></option>
                                </select>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label required" for="city">City</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="city" name="city">
                                    <option><?php echo $city?></option>
                                </select>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label required" for="driver">Driver</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="driver" name="driver">
                                    <?php
                                    listAvailDrivers($driver_id);
                                    ?>
                                </select>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label required" for="fleet">Fleet</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="fleet" name="fleet">
                                    <?php
                                     listFleet($fleet_no);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="startdate">State Date</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo $startDate;?>" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="enddate">End Date</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo $endDate;?>" required="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="status" name="status" value="<?php echo $status;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="oldfleet" name="oldfleet" value="<?php echo $fleet_no;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="olddriver" name="olddriver" value="<?php echo $driver_id;?>">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="manage_assigned_fleets.php"><button type="button" class="btn btn-danger">Cancel</button> </a>
                <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>









