<?php
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from tbl_cars WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $id=$row[0];
        $fleet_no=$row[1];
        $fleet_co=$row[2];
        $fleet_model=$row[3];
        $fleet_owner=$row[4];
        $fleet_man=$row[5];
        $fleet_colour=$row[6];
        $motor_expiry=$row[7];
        $fleet_insurance=$row[8];
        $insurance_expiry =$row[9];
        $pco_expiry=$row['pco_expiry'];
        $min_speed=$row['min_speed'];
        $max_luggage=$row[12];
        $country=$row[13];
        $state=$row[14];
        $city =$row[15];
        $pco_license=$row[16];
    }//end while
?>
 
 <style>
    .required:before { color: red; content:'*'; }
</style>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Information</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">

                    <div class="box-body">
                        <p><h5>Fleet Information</h5></p>

                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="fleetno">Fleet No</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fleetno" name="fleetno" value="<?php echo $fleet_no;?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="fleetco">Fleet Company</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="fleetco" name="fleetco">
                                    <?php
                                    getCompanies($fleet_co);
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-4 control-label required" for="fleetmodel">Fleet Model </label>
                            <div class="col-sm-6">
                                <select class="form-control" id="fleetmodel" name="fleetmodel">
                                    <?php
                                    getModels($fleet_model);
                                    ?>
                                </select>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-4 control-label required" for="fleetowner">Fleet Owner Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fleetowner" name="fleetowner" value="<?php echo $fleet_owner;?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="fleetman">Fleet Manufacturer</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fleetman" name="fleetman" value="<?php echo $fleet_man;?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="fleetcolour">Fleet Colour</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fleetcolour" name="fleetcolour" value="<?php echo $fleet_colour;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-4 control-label required" for="expirydate">Motor Expiry Date</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="expirydate" name="expirydate" value="<?php echo $motor_expiry;?>" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="insuranceno">Insurance Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="insuranceno" name="insuranceno" value="<?php echo $fleet_insurance;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="insurance_expiry">Insurance Expiry Date</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="insurance_expiry" name="insurance_expiry" value="<?php echo $insurance_expiry;?>" required="true">
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="col-sm-4 control-label" for="pco_license">PCO License</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="pco_license" name="pco_license" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="pcoexpiry">PCO License Expiry</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="pcoexpiry" name="pcoexpiry" value="<?php echo $pco_expiry;?>" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="minimumspeed">minimum Speed</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="minimumspeed" name="minimumspeed" value="<?php echo $min_speed;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="maxluggage">Maximum Luggage(KG)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="maxluggage" name="maxluggage" value="<?php echo $max_luggage;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="country">Country</label>
                            <div class="col-sm-6">
                                <select class="form-control" d="country" name="country">
                                    <option>Nigeria</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="state">State</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="state" name="state">
                                    <option>Lagos</option>
                                    <option>Edo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="city">City</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="city" name="city">
                                    <option>Benin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control required" id="txtid" name="txtid" value="<?php echo $id;?>">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="fleets.php"><button type="button" class="btn btn-danger">Cancel</button> </a>
                <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>









