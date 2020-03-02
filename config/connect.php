<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12325229";
$password = "2hMd8rTwXQ";
$dbname = "sql12325229";
		
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
		
// Check connection
if (!$conn) {
	die("Connection failed: " + mysqli_connect_error());
}
return $conn;
?> 