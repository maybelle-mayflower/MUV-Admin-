<?php

include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$con=$connect;

$request=$_REQUEST;
$col =array(
    0   =>  'id',
    1   =>  'status',
    2   =>  'driver_id',
    3   =>  'carno',
    4   =>  'country',
    5   =>  'company',
    6   =>  'state',
    7   =>  'startDate',
    8   =>  'endDate',
    9   =>  'city'
);  

$sql = "SELECT tbl_assign.id AS id, tbl_assign.fleet_no AS carno, tbl_cars.country AS country, tbl_cars.fleet_company AS company, tbl_cars.state AS state, tbl_cars.city AS city, tbl_assign.startDate AS startDate, tbl_assign.endDate AS endDate FROM tbl_assign INNER JOIN tbl_cars ON tbl_assign.fleet_no=tbl_cars.carNumber";

$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql = "SELECT tbl_assign.id AS id, tbl_assign.status AS status, tbl_assign.driver_id AS driver_id, tbl_assign.fleet_no AS carno, tbl_cars.country AS country, tbl_cars.fleet_company AS company, tbl_cars.state AS state, tbl_assign.startDate AS startDate, tbl_assign.endDate AS endDate, tbl_cars.city AS city FROM tbl_assign INNER JOIN tbl_cars ON tbl_assign.fleet_no=tbl_cars.carNumber";
if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR status Like '".$request['search']['value']."%' ";
    $sql.=" OR company Like '".$request['search']['value']."%' ";
    $sql.=" OR state Like '".$request['search']['value']."%' ";
    $sql.=" OR city Like '".$request['search']['value']."%' ";
    $sql.=" OR carno Like '".$request['search']['value']."%')";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){

    $subdata=array();
    $subdata[]='<input type="checkbox" name="setAssigned[]" id="setAssigned[]" value="'.$row['id'].'">';
    $subdata[]=$row['id'];
    $subdata[]=$row['status'];
    $subdata[]='Driver Name: <a href="driver_info.php?id='.$row['driver_id'].'">'.getDriver($row['driver_id']).'</a> <br>Fleet No: <a href="fleet_info2.php?id='. getFleetID($row['carno']).'">'.$row['carno'].'</a>';
    $subdata[]='<a href="company_info.php?id='.getID($row['company']).'" role="" class="">'.$row['company'].'</a>';
    $subdata[]='User';
    $subdata[]= 'Country : '.$row['country'].'<br> State : '.$row['state'].'<br> City : '.$row['city'];
    $subdata[]=$row['startDate'];
    $subdata[]=$row['endDate'];
    $subdata[]= isAssigned($row['id']);

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
