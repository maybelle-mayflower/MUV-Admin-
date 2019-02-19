<?php
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;

$request=$_REQUEST;
//status id fleetno company fleetmodel edit
$col =array(
    0   =>  'id',
    33   =>  'paymentType',
    1   =>  'custId',
    2   =>  'driverId',
    45  => 'startDateTime',
    6   =>  'pickUpLocation',
    5   =>  'dropOffLocation',
    32   =>  'totalCharges',
    31   =>  'partnerCommission',
    18   =>  'totalDistance',
    34   =>  'payByWallet',
    41  =>  'status'
    
); 

$sql ="SELECT * FROM tbl_rides";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM tbl_rides WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%'";
    $sql.=" OR paymentType Like '".$request['search']['value']."%'";
    $sql.=" OR custId Like '".$request['search']['value']."%' ";
    $sql.=" OR driverId Like '".$request['search']['value']."%'";
    $sql.=" OR startDateTime Like '".$request['search']['value']."%'";
    $sql.=" OR pickUpLocation Like '".$request['search']['value']."%' ";
    $sql.=" OR totalCharges Like '".$request['search']['value']."%' ";
    $sql.=" OR partnerCommission Like '".$request['search']['value']."%' ";
    $sql.=" OR totalDistance Like '".$request['search']['value']."%' ";
    $sql.=" OR payByWallet Like '".$request['search']['value']."%' ";
    $sql.=" OR status Like '".$request['search']['value']."%' )";
    /*$sql.=" OR pco_license Like '".$request['search']['value']."%' ";
    $sql.=" OR pco_expiry Like '".$request['search']['value']."%' ";
    $sql.=" OR min_speed Like '".$request['search']['value']."%'";*/
    


}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order 
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);
$cnt= mysqli_num_rows($query);
$i=1;
$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[] = '<a href="#">'.$row['id'].'</a>';
    $subdata[] = '--';
    $subdata[] = paymentTypeName($row['paymentType']);
    $subdata[] = '<a href="#">'.getPassenger($row['custId']).'</a>';
    $subdata[] = '<a href="../fleet_tracking/driver_info2.php?id='.$row['driverId'].'">'.getd($row['driverId']).'</a>';
    $subdata[] = '--';
    $subdata[] = $row['startDateTime'];
    $subdata[] = '<img src="img/green.png" style="height:10px; width:10px; margin-right:5px;">'.$row['pickUpLocation'];
    $subdata[] = '<img src="img/red.png" style="height:10px; width:10px; margin-right:5px;">'.$row['dropOffLocation'];
    $subdata[] = (11/100)*(90/100*$row['totalCharges']);
    $subdata[] = (90/100)* $row['totalCharges'];
    $subdata[] = '--';
    $subdata[] = $row['totalDistance'];
    $subdata[] = $row['payByWallet'];
    $subdata[] = $row['totalCharges'];
    $subdata[] = rideStatus($row['status'],$row['id']);
    
    /*$subdata[]='<button type="button" id="getAssign" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal3" data-id="'.$row[0].'"><i class="fa fa-clipboard"></i></button>
                ';*/
    $data[]=$subdata; 
}
$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
