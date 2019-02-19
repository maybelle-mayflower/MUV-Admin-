<?php 
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;
$test = companyReg("mjennykays@yahoo.com", "MayPassword");
echo $test;