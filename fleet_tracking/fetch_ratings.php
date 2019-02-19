<?php
include '../assets/config/config.php';
include '../assets/config/functions.php';

function fetchRatings(){
global $connect;
$con=$connect;
    
            $request=$_REQUEST;
            $col =array(
                0   =>  'id',
                1   =>  'rideId',
                2   =>  'rating',
                3   =>  'comment',
                4   =>  'createdDate'
            );  

            $sql ="SELECT tbl_rides.driverId AS driverId, tbl_ride_feedback.id AS id, tbl_ride_feedback.rideId AS rideId, tbl_ride_feedback.rating AS rating, tbl_ride_feedback.comment AS comments, tbl_ride_feedback.createdDate AS createdDate FROM tbl_ride_feedback INNER JOIN tbl_rides ON tbl_ride_feedback.rideId=tbl_rides.id WHERE tbl_rides.driverId IS NOT NULL GROUP BY tbl_rides.driverId, tbl_ride_feedback.id ";
            $query=mysqli_query($con,$sql);

            $totalData=mysqli_num_rows($query);

            $totalFilter=$totalData;

            //Search
            $sql ="SELECT tbl_rides.driverId AS driverId, tbl_ride_feedback.id AS id, tbl_ride_feedback.rideId AS rideId, tbl_ride_feedback.rating AS rating, tbl_ride_feedback.comment AS comments, tbl_ride_feedback.createdDate AS createdDate FROM tbl_ride_feedback INNER JOIN tbl_rides ON tbl_ride_feedback.rideId=tbl_rides.id WHERE tbl_rides.driverId IS NOT NULL GROUP BY tbl_rides.driverId, tbl_ride_feedback.id ";
            if(!empty($request['search']['value'])){
                $sql.=" AND (id Like '".$request['search']['value']."%' ";
                $sql.=" OR rideId Like '".$request['search']['value']."%' ";
                $sql.=" OR rating Like '".$request['search']['value']."%' ";
                $sql.=" OR createdDate Like '".$request['search']['value']."%' ";
                $sql.=" OR comment Like '".$request['search']['value']."%' )";
            }
            $query=mysqli_query($con,$sql);
            $totalData=mysqli_num_rows($query);

            //Order
            $sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
                $request['start']."  ,".$request['length']."  ";

            $query=mysqli_query($con,$sql);
            $i = 1;
            $data=array();

            while($row=mysqli_fetch_array($query)){
                $subdata=array();
                $subdata[]=$i;
                $subdata[]= getDriverR($row['driverId']);
                $subdata[]=$row['rating'];
                $subdata[]='<button type="button" id="getRate" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row['id'].'"><i class="fa fa-comments"></i></button>
                            ';
                $data[]=$subdata;
                $i++;
            }

            $json_data=array(
                "draw"              =>  intval($request['draw']),
                "recordsTotal"      =>  intval($totalData),
                "recordsFiltered"   =>  intval($totalFilter),
                "data"              =>  $data
            );

            return json_encode($json_data);
}

 echo fetchRatings();
 
 function getDriverR($id){
    global $connect;
    
    $get_co = "SELECT * FROM tbl_users WHERE uId='$id'";
    $run_co = mysqli_query($connect, $get_co);
    $row_co= mysqli_fetch_array($run_co);
    //$fullname = $row_co['firstName'].' '.$row_co['lastName'];
    return $row_co['firstName'].' '.$row_co['lastName'];
}
 
?>
