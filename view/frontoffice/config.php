<?php 
$host = "localhost";
$username ="root";
$password ="";
$dbname = "travel_agency";
//create connection
$con = mysqli_connect($host, $username, $password ,$dbname);
// check connection
 if (!$con) {
    die("connection failed : " . mysqli_connect_error());
 }

?>
