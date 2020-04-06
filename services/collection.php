<?php
    session_start();
    function connectDB() {
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
	}
    $conn = connectDB();
    $id = $_GET['id'];
    $date = date("Y=m-d");
    $user = $_SESSION['user_id'];
    $query = "INSERT INTO purchase (book_id, user_id, date) VALUES ('$id', '$user', '$date')";
    $sql = mysqli_query($conn, $query);
    header("Location: ../buku-saya.php");
?>