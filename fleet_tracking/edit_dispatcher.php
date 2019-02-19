<?php
include '../assets/config/functions.php';
include '../assets/config/config.php';

global $connect;
$con = $connect;

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from tbl_dispatcher WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $firstname=$row[1];
        $lastname=$row[2];
        $email=$row[3];
        $password=$row[4];
        $mobile=$row[5];
        $address=$row[6];
        $company=$row[7];
        $country=$row[8];
        $state =$row[9];
        $city =$row[10];
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
                        <p><h4>Personal Information</h4><span style="font-size: 0.8em; font-style: italic;">(All fields are required)</span></p>

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
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>">
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-sm-4 control-label required" for="mobile">Mobile Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="txtaddress">Address</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="txtaddress" name="txtaddress"><?php echo $address;?></textarea>
                            </div>
                        </div>
                    <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>

                    </div>
                    
                   <div class="box-body">

                        <h4>Company Information</h4>

                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="txtconame">Fleet Company</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="txtconame" name="txtconame">
                                    <?php
                                    getCompanies($company);
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
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>









