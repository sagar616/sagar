<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "db";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
// print_r($conn);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}