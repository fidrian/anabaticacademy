<?php
	
	$databaseServer = "sql12.freemysqlhosting.net";
	$databaseUsername = "sql12326339";
	$databasePassword = "FtkVQKUiHk";
	$databaseName = "sql12326339";
	
	$databaseConnection = mysqli_connect($databaseServer, $databaseUsername, $databasePassword, $databaseName);

	if (!$databaseConnection){
		die ("Connection to database failed");
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// username and password sent from form 
		session_start();
		
		$username = $_POST['username'];
		$password = $_POST['password'];  
				
		$queryLogin = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$resultLogin = mysqli_query($databaseConnection,$queryLogin);
		
		$row = mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);
		$active = $row['active'];
		  
		$count = mysqli_num_rows($resultLogin);
		// If result matched $myusername and $mypassword, table row must be 1 row
			
		if($count == 1) {
			
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["namauser"] = $row["username"];
			$_SESSION["role"] = $row["role"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["nama_lengkap"] = $row["nama_lengkap"];
			 
      if ($row["role"] === "editor"){
				header("Location: daftar-pengajuan.php");
			}else if ($row["role"] === "admin"){
				header("Location: statistik.php");
			}
			else{
				header("Location: landing.php");
			}

		}else {
      echo  "<script type='text/javascript'>alert('Login Gagal');window.location = './landing.php';</script>";
		}
		
	}
	
	mysqli_close($databaseConnection);
	
?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-title">
          <h1 class="text-center">Masuk ke Anabatic Academy</h1>
        </div>

        <div class="modal-form text-center input-login">
        <form action="login.php" method="post">
          <input type="text" id="insert-username" name="username" class="form-control" placeholder="Masukkan username..." required>
          <input type="password" id="insert-password" name="password" class="form-control" placeholder="Masukkan kata sandi..." required>
          <input type="hidden" id="insert-command" name="command" value="insert">
          <button type="submit" class="btn btn-primary btn-block btn-ebookhub">Masuk</button>
        </form>
        </div>
      </div>

      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12 text-center">
            <!-- <a href="#">Lupa password?</a> -->

            <p>Belum punya akun? Daftar di <a href="register.php">sini</a> </p>
          </div>
        </div>
      </div>
    </div>
    <!-- <h1>Masuk ke Akun Ebookhub</h1> -->

  </div>
</div>
