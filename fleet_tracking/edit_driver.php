
<?php
include '../assets/config/functions.php';
include '../assets/config/config.php';

global $connect;
$con = $connect;

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from tbl_driver WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row['id'];
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $email=$row['email'];
        $gender=$row['gender'];
        $license_exp=$row['license_expiry'];
        $pco_license=$row['pco_license'];
        $pco_expiry=$row['pco_expiry'];
        $drivers_ins=$row['insurance_no'];
        $ins_exp=$row['insurance_expiry'];
        $national_ins=$row['national_insNo'];
        $national_insExp=$row['national_insExpiry'];
        $mobile_no=$row['mobile'];
        $fleet_co=$row['fleet_co'];
        $country=$row['country'];
        $state=$row['state'];
        $city=$row['city'];
        $address=$row['address'];
        $birth_date = $row['birthdate'];
        $photo = $row['photo'];
        $license = $row['license_no'];
    }
?>
    <form class="form-horizontal" method="post"  enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Information</h4>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                        <p><h4>Personal Information</h4></p>

                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="firstname">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname;?>">
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-sm-4 control-label required" for="lastname">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="email">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>" readonly="true">
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-sm-4 control-label required" for="mobile">Mobile Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile_no;?>">
                            </div>
                        </div>
                   <div class="form-group">
                            <label class="col-sm-4 control-label required" for="gender">Gender</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="gender" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="birthdate">Date Of Birth</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birth_date;?>">
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="col-sm-4 control-label required" for="license_exp">License Expiry</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="license_exp" name="license_exp" value="<?php echo $license_exp;?>">
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="col-sm-4 control-label" for="pcolicense">PCO License Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="pcolicense" name="pcolicense" value="<?php echo $pco_license;?>">
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-sm-4 control-label required" for="pcoexpiry">PCO License Expiry</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="pcoexpiry" name="pcoexpiry" value="<?php echo $pco_expiry;?>">
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-sm-4 control-label" for="insuranceno">Driver's Insurance Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="insuranceno" name="insuranceno" value="<?php echo $drivers_ins;?>">
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-sm-4 control-label required" for="insurance_exp">Driver's Insurance Expiry</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="insurance_exp" name="insurance_exp" value="<?php echo $ins_exp;?>">
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-sm-4 control-label " for="national_ins">National Insurance Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="national_ins" name="national_ins" value="<?php echo $national_ins;?>">
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-sm-4 control-label required" for="national_exp">National Insurance Expiry</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="national_exp" name="national_exp" value="<?php echo $national_insExp;?>">
                            </div>
                        </div>
                 
                    <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="txtconame">Fleet Company</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="txtconame" name="txtconame">
                                    <?php
                                    getCompanies($fleet_co);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="txtcountry">Country</label>
                            <div class="col-sm-6">
                                 <select class="form-control" id="txtcountry" name="txtcountry">
                                    <option>Nigeria</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-4 control-label required" for="txtstate">State</label>
                            <div class="col-sm-6">
                                 <select class="form-control" id="txtstate" name="txtstate">
                                     <option><?php echo $state;?></option>
                                     <option>Edo</option>
                                    <option>Lagos</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="txtcity">City</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtcity" name="txtcity" value="<?php echo $city;?>">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="txtaddress">Address</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="txtaddress" name="txtaddress"><?php echo $address;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="photo">Photo</label>
                            <div class="col-sm-6">
                                <img src="img/drivers/photo/<?php echo $email.$photo;?>" class="img-thumbnail img-responsive"/>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="license" name="license" readonly="true" value="<?php echo $license;?>">
                               
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
         </form>
        </div>
    </form>
<?php
}//end if
?>









