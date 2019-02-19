<?php
error_reporting(0);
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from tbl_users WHERE uId=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_mobile=$row['mobileNo'];
        $first_name=$row['firstName'];
        $last_name=$row['lastName'];
        $per_email = $row['email'];
    }
    ?>
    <input name="dname" id="dname" type="text" value="<?php echo $first_name." ".$last_name;?>">
    <input name="demail" id="demail" type="text" value="<?php echo $per_email;?>">
    <input name="dmobile" id="dmobile" type="text" value="<?php echo $per_mobile;?>">
    
<?php
    }
?>
