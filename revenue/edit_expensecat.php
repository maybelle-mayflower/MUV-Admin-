<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from expense_category WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_status=$row['status'];
        $per_cat=$row['category'];

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
                            <label class="col-sm-4 control-label required" for="expcat">Expense Category</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="expcat" name="expcat" value="<?php echo $per_cat;?>" required="">
                                <br>
                                
                            </div>
                           
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>">
                                    <input type="hidden" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_status;?>">
                                </div>
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
?>









