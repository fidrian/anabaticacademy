<?php
    session_start();
    function connectDB() {
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
	}
    function pinjamBuku($book_id, $user_id) {
        $conn = connectDB();
        $sqlsubmission = "INSERT into submission (book_id, user_id) values ('$book_id','$user_id')";

        if(!$result = mysqli_query($conn, $sqlsubmission)) {
            die("Error: $sqlsubmission");
        }
        mysqli_close($conn);
        header("Location: ../cart.php");
    }
    if (isset($_GET['id'])) {
        pinjamBuku($_GET['id'],$_SESSION["user_id"]);
    }
    else {
        echo  "<script type='text/javascript'>alert('Masukkan ke cart gagal');window.location = './shop.php';</script>";
    }
?>