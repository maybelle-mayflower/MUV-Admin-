<?php
include '../assets/config/functions.php';
include '../assets/config/config.php';

global $connect;
$con = $connect;

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Driver Wallet</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            
                        </div>
                </form>
            </div>
        </div>
    </form>
<?php
}//end if
?>









