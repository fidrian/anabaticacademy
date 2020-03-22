<?php
$servername = "remotemysql.com";
$username = "gAhuN8MGYk";
$password = "6XeduFerLR";
$dbname = "gAhuN8MGYk";
		
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
		
// Check connection
if (!$conn) {
	die("Connection failed: " + mysqli_connect_error());
}
return $conn;
?> 