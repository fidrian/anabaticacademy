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

    function insertBuku($idUnggah) {
		$conn = connectDB();		
        $diterima = 'Pengajuan Ditolak';
        // $tanggalUpload = date("Y-m-d");
        $sql = "UPDATE unggah SET status = '$diterima' WHERE no = '$idUnggah'";
        if($result = mysqli_query($conn, $sql)) {
            echo "New record created successfully <br/>";
            header("Location: ../daftar-pengajuan.php");
        }else {
            die("Error: $sql");
        }
    mysqli_close($conn);
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        insertBuku($_POST['idUnggah']);
    }
?>