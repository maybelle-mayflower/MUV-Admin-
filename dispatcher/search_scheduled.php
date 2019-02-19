
<br>
<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    

  $driver_name = "";
  $status = "t";
  $request=$_POST['request'];
  if($request=='')
  {
      $bookings_sql = "Select * from tbl_bookings order by id desc";
  }
  else
  {
      $getDriver = "SELECT id from tbl_driver where firstname='$request' or lastname='$request' order by id desc";
      $run_driv = mysqli_query($connect, $getDriver);
      $driver_row = mysqli_fetch_array($run_driv);
      $driver_id2 = $driver_row['id'];
      
      $bookings_sql = "SELECT * FROM tbl_bookings WHERE driver_id='$driver_id2' order by id desc"; 
  }
  $run_sql = mysqli_query($connect, $bookings_sql);
  if(mysqli_num_rows($run_sql)==0)
  {
      echo "<h4 style='color: red;'>No Bookings Available<h4>";
  }
  while($row= mysqli_fetch_assoc($run_sql))
   {
       $status = $row['status'];
       $driver_id = $row['driver_id'];
       $id = $row['id'];
       if($driver_id != 0)
       {
           $driver_sql = "Select * from tbl_driver where id = $driver_id";
           $run_driver = mysqli_query($connect, $driver_sql); 
           $row_driver = mysqli_fetch_array($run_driver);
           $driver_name = $row_driver['firstname'];
       }
       else
       {
           $driver_name = "no driver";
           $status_update="UPDATE tbl_bookings SET status='Assign' WHERE id='$id'";
           $status_run = mysqli_query($connect, $status_update); 
       }

  ?>
<p style="border: none;"></p>
<div id="">
        <div  style="margin: 10px; padding-left: 10px; width: 97%; background: white; height: 210px;">
            <table class="table-borderless" width="100%" style="padding: 0px; text-align: left;">
                <tr>
                    <td style="font-weight: bold;"><?php echo $row['passenger_name'];?></td>
                    <td><a data-toggle="modal" id="editBooking" data-target="#addBookingModal" data-id="<?php echo $id;?>">Edit</a></td>
                    <td><a data-toggle="modal" id="cancelBooking" data-target="#cancelModal" data-id="<?php echo $id;?>">Cancel</a></td>
                    <td><?php echo $row['id'];?></td>
                </tr>
            </table>
            <p style="border: none; font-size: 0.9em; float: left; margin-top: 5px;"><span class="fa fa-automobile"></span> <?php echo $driver_name;?></p>
            <p style="border: none; margin-top: 3px;"></p>
            <p style="border: none; font-size: 0.9em; margin-top: 5px;" class="marquee"><span><?php echo $row['pickup'];?></span></p>
            <p style="border: none; font-size: 0.9em; margin-top: 5px;" class="marquee"><span><?php echo $row['dropoff'];?></span></p>
            <div>
                <table class="table-borderless" width="95%" style="padding: 0px; text-align: left;">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr style="color: lightslategray; margin-top: 10px;">
                        <td><span class="fa fa-clock-o"></span> <?php echo $row['booking_time'];?></td>
                        <td></td>
                        <td><?php bookingAction($row['id']);?></td>
                    </tr>
                </table>
            </div>
        </div>
                    
</div>
<?php
    }
    }
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>
