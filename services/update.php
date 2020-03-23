<?php
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
	session_start();
    $conn = connectDB();		
    $diterima = 'Pengajuan Diterima';
	$idUnggah = '0';
	$filename = $_SESSION['fileEditor'];
    $sql = "UPDATE unggah SET status = '$diterima', file = '$filename' WHERE status = '$idUnggah'";
    if($result = mysqli_query($conn, $sql)) {
		echo "New record created successfully <br/>";
		header("Location: ../daftar-pengajuan.php");
    }else {
        die("Error: $sql");
    }
    mysqli_close($conn);
?>