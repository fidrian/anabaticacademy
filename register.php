<?php
  require_once("templates/header.php");
?>

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
?>

<div class="register">
  <div class="container ">
    <div class="row">
      <div class="pt-2 pl-5 pr-4 pb-5 m-auto w-60 border">
        <!-- <div class="col-md-8 "> -->
          <p class="register-theme">Daftar Akun Anabatic Learning Academy</p>
  
          <form action="services/register.php" method="post" class="form-register-group">
            <input type="text" class="form-control form-register" name="pengguna" id="insert-username" placeholder="Nama pengguna..." required>
            <input type="text" class="form-control form-register" name="lengkap" placeholder="Nama lengkap..." required>
            <input type="email" class="form-control form-register" name="email" id="insert-email" placeholder="E-mail..." required>
            <input type="password" class="form-control form-register" id="insert-password" name="password" placeholder="Kata sandi..." required>
            <input type="password" class="form-control form-register" placeholder="Ulangi kata sandi..." required>
            <label class="checkbox-inline">
            <input type="checkbox" value="" required>Dengan pembuatan akun, Anda menyetujui <a href="syarat-dan-ketentuan.php">syarat & ketentuan</a> dari Anabatic Learning Academy
            </label>
  
            <input type="hidden" id="insert-command" name="command" value="insert">
            <button type="submit" class="btn btn-primary btn-block btn-ebookhub btn-register">Daftar</button>
          </form>
        <!-- </div> -->
      </div>

      <!-- <div class="col-md-3">
        <div class="login-social">
          <button type="button" class="btn btn-primary btn-block btn-fb"> <i class="fa fa-facebook"></i>&nbsp;&nbsp;Daftar dengan Facebook</button>
          <button type="button" class="btn btn-primary btn-block btn-google"> <i class="fa fa-google"></i>&nbsp;&nbsp;Daftar dengan Google</button>
        </div>
      </div> -->
    </div>


  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
