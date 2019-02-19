<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    

$con=$connect;
if(isset($_REQUEST['id'])){
    
    $id=intval($_REQUEST['id']);
    $sql="select * from tbl_cars WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        
        $per_id=$row['id'];
        $per_no = $row['carNumber'];
        $country=$row['country'];
        $state=$row['state'];
        $city =$row['city'];
        $fleetco =$row['fleet_company'];
    }
?>
<html>
    <head>
         <style>
    .required:before { color: red; content:'*'; }
</style>
    </head>

<form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fleet Company</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="country">Country:</label>
                            <div class="col-sm-6">
                                <p id="country" name="country"><?php echo $country;?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="state">State:</label>
                            <div class="col-sm-6">
                                <p id="state" name="state" value=""><?php echo $city;?></p>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="city">City:</label>
                            <div class="col-sm-6">
                                <p id="city" name="city" value=""><?php echo $state;?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="driver">Driver</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="driver" name="driver">
                                    <option value='' selected disabled>--Select Driver--</option>
                                    <?php
                                    listAvailDrivers();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="startdate">Start Date</label>
                            <div class="col-sm-6">
                                <input type='date' class="form-control" id="startdate" name="startdate" required='true'>                      
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-sm-4 control-label required" for="enddate">Start Date</label>
                            <div class="col-sm-6">
                                <input type='date' class="form-control" id="enddate" name="enddate" required>                      
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                                <input type="hidden" class="form-control" id="carno" name="carno" value="<?php echo $per_no;?>" readonly>
                                <input type="hidden" class="form-control" id="fleetco" name="fleetco" value="<?php echo $fleetco;?>" readonly>
                            </div>
                        </div>
                    </div>
                 
                </form>
            </div>
            <div class="modal-footer">
                <a href="fleets.php"><button type="button" class="btn btn-danger">Cancel</button> </a>
                <button type="submit" class="btn btn-default" name="btnAssign">Save</button>
            </div>
        </div>
    </form>
    </html>
    
<?php
    }
}
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>