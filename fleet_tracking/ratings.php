<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    
    $sql="SELECT tbl_ride_feedback.id AS ride_id, tbl_ride_feedback.rating AS rating, tbl_ride_feedback.comment AS comment, tbl_ride_feedback.createdDate AS createdDate, tbl_rides.custId AS custId, tbl_rides.driverId AS driverId FROM tbl_ride_feedback INNER JOIN tbl_rides ON tbl_ride_feedback.rideId=tbl_rides.id WHERE tbl_ride_feedback.id='$id'";
    $run_sql=mysqli_query($con,$sql);

    while($row=mysqli_fetch_array($run_sql)){
        
        $comment = $row['comment'];
        $driver = getDriverR($row['driverId']);
        $date = $row['createdDate'];
        $rating = $row['rating'];
        $customer = getPassenger($row['custId']);
     }
?> 

<html>
    <head>
        
    </head>
    <body>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bolder;">Driver Ratings</h4>
            </div>
            <div class="modal-body">
                <row>
                      <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Driver Ratings: <?php echo $driver;?></h3>
                            </div>
                          
                          
                          <div class="">
				<div class="">
                                    <div style="float: right;"><?php echo $date;?></div>
				</div>
				<div class="">
					<div class="reviewerprofile">
						<div id="">
							<img src="img/userAvi.jpg" width="50" height="50">
						</div>
                                            <div class=""><?php echo $customer;?></div>
						<div id="">
							<span class="review-owner" style="text-align:center;"></span>
						</div>
						<div id="revdate"></div>
					</div>					
					<div class="revieweright"> 
                                            
					<p class="rating four"></p>
                                        
						<?php 
                                                echo $comment;
                                                ?>
                                        </div>
                                </div>
                          </div>
                        <br>

                    </div>
                </row>
            </div>
        </div>
    </body>
</html>
<?php
}
 function getDriverR($id){
    global $connect;
    
    $get_co = "SELECT * FROM tbl_users WHERE uId='$id'";
    $run_co = mysqli_query($connect, $get_co);
    $row_co= mysqli_fetch_array($run_co);
    //$fullname = $row_co['firstName'].' '.$row_co['lastName'];
    return $row_co['firstName'].' '.$row_co['lastName'];
}

?>