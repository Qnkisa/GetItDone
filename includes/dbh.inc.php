<?php

$serverName = "localhost";
$serverUser = "root";
$serverPassword = "";
$dbTable = "getitdone";

$conn = mysqli_connect($serverName, $serverUser, $serverPassword, $dbTable);

if(!$conn){
    echo "Connection failed:" . mysqli_connect_error();
    die();
}