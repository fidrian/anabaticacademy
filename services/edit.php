<?php
    function connectDB() {
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
	}

    function insertBuku($idUnggah) {
		$conn = connectDB();		
        $diterima = 'Dalam Proses Penyuntingan';
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