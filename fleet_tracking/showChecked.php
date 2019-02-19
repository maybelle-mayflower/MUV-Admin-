
<?php
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$returnTo = $_POST['returnto'];

if (isset($_POST['setStatus'])){
    $id = $_POST['setStatus'];
    $stat = $_POST['statusDrop'];
    $table = $_POST['table'];
    $trashed = "Trashed";
    
    $qry = "SELECT status FROM tbl_status WHERE id='$stat' ";
    $r = mysqli_query($connect, $qry);
    $row = mysqli_fetch_array($r);
    $status = $row[0];
    
    foreach($id as $id1)
    {
        if($stat == 3)
        {
             echo "<script>alert('Entry(ies) will be deleted')</script>";
             $query = "DELETE FROM $table WHERE id='$id1'";
        }
        else
        {
            $query = "UPDATE $table SET status='$status' WHERE id='$id1'";
        }
        $run = mysqli_query($connect, $query);
    }
    if($run)
    {
        echo '<script>window.location.href="'.$returnTo.'"</script>';
    }
 else {
        echo "update failed".mysqli_error($connect);
    }
}

else if (isset($_POST['setAssigned'])){
    
    $id = $_POST['setAssigned'];
    $stat = $_POST['statusDrop'];
    $table = $_POST['table'];
    $active = "Active";
    $unassignedFleet = "Unassigned";
    
    foreach($id as $id1)
    {
        if(strcmp($stat, $unassignedFleet)==0)
        {
            $query = "UPDATE $table SET status='$stat' WHERE id='$id1'";
            $run = mysqli_query($connect, $query);

            $q1 = "SELECT * FROM tbl_assign WHERE id='$id1'";
            $runq1 = mysqli_query($connect, $q1);
            $row1 = mysqli_fetch_array($runq1);

            $driver = $row1['driver_id'];
            $car = $row1['fleet_no'];
        
        
            $q = "UPDATE tbl_driver SET isAssigned='n' WHERE id ='$driver'";
            $runq = mysqli_query($connect, $q);
            $q2 = "UPDATE tbl_cars SET isAssigned='n' WHERE carNumber ='$car'";
            $runq2 = mysqli_query($connect, $q2);
        }
        else
        {
            echo "<script>alert('Selected Driver or Fleet might be unavailable. Please create a new assignment.')</script>";
            echo '<script>window.location.href="'.$returnTo.'"</script>';
        }   
    }
    if($run)
    {
        echo "<script>alert('Action Complete')</script>";
        echo '<script>window.location.href="'.$returnTo.'"</script>';
    }
 else {
        echo "update failed".mysqli_error($connect);
    }
}
else if (isset($_POST['setEnable'])){
    
    $id = $_POST['setEnable'];
    $stat = $_POST['statusDrop'];
    $table = $_POST['table'];
    $disable = "Disable";
    $enable = "Enable";
    
    foreach($id as $id1)
    {
            $query = "UPDATE $table SET status='$stat' WHERE id='$id1'";
            $run = mysqli_query($connect, $query);
    }
    if($run)
    {
        //echo "<script>alert('Action Complete')</script>";
        echo '<script>window.location.href="'.$returnTo.'"</script>';
    }
 else {
        echo "update failed".mysqli_error($connect);
    }
}
else
{
    echo "<script>alert('Please make a selection')</script>";
    echo '<script>window.location.href="'.$returnTo.'"</script>';
}
?>

