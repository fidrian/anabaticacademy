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
if (isset($_GET['id'])) {
    $no = $_GET['id'];
  }
  else {
    echo  "<script type='text/javascript'>alert('Publikasi Buku Gagal');window.location = '../unduh.php';</script>";
  }
$conn = connectDB();
$sql = "UPDATE unggah SET status = 'Sudah Diterima' where no = $no";

if($result = mysqli_query($conn, $sql)) {
    echo  "<script type='text/javascript'>alert('Publikasi Buku Berhasil');window.location = '../unduh.php';</script>";
} 
else {
    die("Error: $sql");
}
?>