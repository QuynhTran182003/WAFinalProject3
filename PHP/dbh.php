<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPpassword = "";
$dBName = "shibasushi";

$conn = mysqli_connect($serverName, $dBUsername, $dBPpassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>