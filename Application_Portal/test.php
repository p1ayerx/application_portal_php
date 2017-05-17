<?php
$servername = "sql308.rf.gd";
$username = "rfgd_20064132";
$password = "id295368";
$db = "rfgd_20064132_logintest";
$table="accounts";

// Create Connection
$conn = new mysqli($servername, $username, $password, $db);

// Check Connection
if ($conn->connect_error){
  die("Connection Failed" .$conn->connect_error);
}

echo "Connected Successfully";

 ?>
