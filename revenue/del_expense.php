<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from tbl_expense WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
    }
?>
<form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>   
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                     <h4 class="modal-title">Delete Item?</h4>
                        <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>"> 
                </form>
            </div>
            <div class="modal-footer">
                <a href="expense.php"><button type="button" class="btn btn-danger">No</button> </a>
                <button type="submit" class="btn btn-primary" name="btnDel">Yes</button>
            </div>
        </div>
</form>
<?php
}
?>