<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    


$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Assign Available Driver</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    
                     <div class="box-body">

                        <div class="form-group">
                            <label class="col-sm-4 control-label required" for="expcat">Available Drivers</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="driver" name="driver" required="true">
                                    <option value='' selected disabled>--Select Driver--</option>
                                    <?php
                                    freeDrivers();
                                    ?>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $id;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-xs"  style="width: 100px;" name="btnAssign">Assign</button>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" style="width: 100px;">Cancel</button>
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










