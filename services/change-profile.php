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

$user = $_SESSION['user_id'];

if ($user){
//user is logged in
    if (isset($_POST["submit"])){
        $conn = connectDB();
        $fullname = $_POST['namalengkap'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        $sql = "UPDATE user SET nama_lengkap='$fullname', username='$username', email='$email' WHERE user_id='$user'";
        if($result = mysqli_query($conn, $sql)) {
            header("Location: ../lihat-profil.php");
        }   
    }
}
else{
  die ("You must be logged in to change your password");
}    
?>
