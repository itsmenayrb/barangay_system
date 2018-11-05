<?php
//DATABASE CONNECTOR
date_default_timezone_set("Asia/Manila");
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "barangaysalitranii";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
	die($conn->connect_error);
}
?>