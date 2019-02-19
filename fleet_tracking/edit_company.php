<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from companies WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_status=$row['status'];
        $per_name=$row['name'];
        $per_coname=$row['company_name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $address=$row['address'];
        $country=$row['country'];
        $state=$row['state'];
        $city =$row['city'];
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
                        <h3>Personal Information</h3>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Full Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $per_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtemail">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtemail" name="txtemail" value="<?php echo $email;?>" readonly="true">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">Mobile Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txtphone" value="<?php echo $mobile;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtemail">Address</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="txtemail" name="txtaddress"><?php echo $address;?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                     
                    </div>
                    
                    <div class="box-body">
                        
                        <h3>Company Information</h3>
                        
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtconame">Company name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtconame" name="txtconame" value="<?php echo $per_coname;?>">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtfleet">Country</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="txtcountry" name="txtcountry">
                                    <option><?php echo $country;?></option>
                                </select>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdriver">State</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="txtstate" name="txtstate">
                                     <option><?php echo $state;?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtcity">City</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtdispatcher" name="txtcity" value="<?php echo $city;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_status;?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <<div class="modal-footer">
                <a href="manage_company.php"><button type="button" class="btn btn-danger">Cancel</button> </a>
                <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>









