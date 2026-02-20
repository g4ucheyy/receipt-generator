<?php
$srvr = "localhost";
$usr = "root";
$pwd = "";
$dbname = "cakereceipt";

$conn = mysqli_connect($srvr,$usr,$pwd,$dbname);
$err = mysqli_connect_error();

if ($conn->connect_error) {

   die("DATABASE ERROR!". $err);
}

?>