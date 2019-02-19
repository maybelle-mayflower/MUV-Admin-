<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "muvdbold";


$connect = mysqli_connect($host, $user, $password, $database);
if(!$connect){
    echo "Error connecting to database: ".mysqli_connect_error();
}
