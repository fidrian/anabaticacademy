<?php
  session_start();
  if(!isset($_SESSION['namauser'])) {
    echo  "<script type='text/javascript'>alert('Silahkan Login/Register terlebih dahulu');window.location = './landing.php';</script>";
  }
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="register-title">Unggah Materi</h1>
      </div>
      <div class="col-md-9 form-register-group">
        <form action="services/upload.php" method="post" enctype="multipart/form-data">
          <input type="text" class="form-control form-register" id="insert-judulBuku" name="judulBuku" placeholder="Judul materi..." required>
          <input type="text" class="form-control form-register" id="insert-namaPenulis" name="namaPenulis" placeholder="Nama penulis..." required>
          <br>
          <div class="form-group">
            <label for="kategori"></label>
            <select class="form-control form-register form-group-kategori" name="kategori" id="kategori" required>
              <option>Android Development</option>
    					<option>Banking Operation</option>
    					<option>Banking Regulation</option>
    					<option>Basic Marketing</option>
    					<option>Business English</option>
    					<option>CISCO</option>
    					<option>Data Library T24</option>
    					<option>Java</option>
    					<option>Health & Workstyle</option>
    					<option>International Banking Learning</option>
    					<option>Motivation and Inspiration</option>
    					<option>Office 365</option>
    					<option>Oracle Database</option>
    					<option>Pocket Bank</option>
    					<option>Project Management</option>
    					<option>RTGS</option>
    					<option>SAP</option>
    					<option>SQL SERVER</option>
    					<option>SSIS</option>
    					<option>Telecommunication</option>
    					<option>Temenos T24</option>
    					<option>Fabel</option>
    					<option>Windows Server 2012</option>
            </select>
          </div>

          <div class="form-group">
           <textarea class="form-control" rows="5" id="comment" name="deskripsiBuku" placeholder="Deskripsi materi..." required></textarea>
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">
              Format materi dalam bentuk .doc, .docx, .pdf, .ppt, .mp3, .mp4, atau .wmv. Format penulisan dan layout dapat melihat pada halaman <a href="#">ini.</a> Ukuran file maksimal 50 MB.
            </label>
            <input type="file" class="form-control-file" name="fileToUpload" id="exampleFormControlFile1" required>
          </div>

          <input type="hidden" id="insert-command" name="command" value="insert" >
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-ebookhub btn-register">Unggah</button>
        </form>
      </div>


    </div>


  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
