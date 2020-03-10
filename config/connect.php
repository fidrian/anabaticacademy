<?php
$servername = "sql12.freemysqlhosting.net";
$username = "sql12326339";
$password = "FtkVQKUiHk";
$dbname = "sql12326339";
		
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
		
// Check connection
if (!$conn) {
	die("Connection failed: " + mysqli_connect_error());
}
return $conn;
?> 