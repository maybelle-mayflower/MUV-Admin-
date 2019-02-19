<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_REQUEST['id'])){
    
    $id=intval($_REQUEST['id']);
    //echo '<script>alert("'.$id.'")</script>';
    $sql="select * from tbl_expense WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_man=$row['exp_management'];
        $per_cat=$row['category_id'];
        $per_amt = $row['amount'];
        $per_date= $row['exp_date'];
        $remarks = $row['remarks'];

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
                                <label class="col-sm-4 control-label required" for="expman">Expense Management</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="expman" name="expman" value="<?php echo $per_man;?>" required="">
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label required" for="expcat">Category</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="expcat" name="expcat">
                                        <?php 
                                        getExpCats($per_cat);
                                        ?>
                                    </select>
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label required" for="expamt">Expense Amount</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="expamt" name="expamt" value="<?php echo $per_amt;?>"required="">
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label required" for="expdate">Expense Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="expdate" name="expdate" value="<?php echo $per_date;?>" required="">
                                </div>
                            </div>
                         <div class="form-group">
                                <label class="col-sm-4 control-label required" for="remark">Remark</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="remark" name="remark"><?php echo $remarks;?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>">
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









