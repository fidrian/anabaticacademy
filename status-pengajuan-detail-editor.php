<?php
  require_once("templates/header.php");

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

function daftarBuku($table) {
    $conn = connectDB();
    $no = $_GET['id'];

    $sql = "SELECT no, title, author, category, description, file, upload_date, status FROM $table WHERE no = '$no'";

    if(!$result = mysqli_query($conn, $sql)) {
      die("Error: $sql");
    }
    mysqli_close($conn);
    return $result;
  }

  if (isset($_GET['id'])) {
		$no = $_GET['id'];
	  }
	  else {
		header('Location:daftar-pengajuan.php');
	  }
?>

<div class="status-pengajuan-detail section-margin">
  <div class="container">

    <div class="row">
      <div class="col-md-3">
        <div class="item">
          <div class="card  text-center card-product-details">
            <img class='card-img-top img-circle img-fluid' src='images/avatar.png' alt='card-img'>
          </div>
        </div>

        <div class="panel panel-default sidebar-menu">
          <div class="panel-harga">
            <div class="panel-heading text-center">
            <h3 class="panel-title">
              <?php
                if (isset($_SESSION["user_id"])){
                  $conn = connectDB();
                  $query = mysqli_query($conn, "SELECT nama_lengkap FROM user WHERE user_id = '".$_SESSION["user_id"]."'");
                  $name = mysqli_fetch_assoc($query);
                  echo $name['nama_lengkap'];
                }
              ?>
              </h3>
            </div>

            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked category-menu">
                <li>
                  <a href="lihat-profil.php">Profil</a>
                </li>
                <li>
                  <a href="edit-password.php">Edit Password</a>
                </li>
                  <li class="active-profil">
                    <a href="daftar-pengajuan.php">Daftar Pengajuan</a>
                  </li>
              </ul>
            </div>
          </div>
        </div>



      </div>

      <div class="col-md-9">
        <h1 class="register-title">Edit Status Pengajuan</h1>

        <div class="table-details">
          <table class="table table-hover table-bordered table-responsive">
            <tbody>
            <?php
              $daftarbuku = daftarBuku("unggah");
              while ($row = mysqli_fetch_array($daftarbuku)) {
                if($row[7] == "Dalam Proses Review" || $row[7] == "Pengajuan Ditolak") {
                  $olddate = $row[6];
  								$bulan = array (1 =>   	'Januari',
                                          'Februari',
                                          'Maret',
                                          'April',
                                          'Mei',
                                          'Juni',
                                          'Juli',
                                          'Agustus',
                                          'September',
                                          'Oktober',
                                          'November',
                                          'Desember'
  												);
  								$split = explode('-', $olddate);
  								$tanggal = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
                  echo '
                  <tr>
                  <td><strong>Judul Materi</strong></td>
                  <td>'.$row[1].'</td>
                </tr>
                <tr>
                  <td><strong>Nama Penulis</strong></td>
                  <td>'.$row[2].'</td>
                </tr>
                <tr>
                  <td><strong>Kategori</strong></td>
                  <td>'.$row[3].'</td>
                </tr>
                <tr>
                  <td><strong>Deskripsi Materi</strong></td>
                  <td>'.$row[4].'</td>
                </tr>
                <tr>
                  <td><strong>Tanggal Unggah</strong></td>
                  <td>'.$tanggal.'</td>
                </tr>
                  ';
                }
              }
            ?>
              <tr>
                <td><strong>Status Pengajuan</strong></td>
                <td>

                    <div class="button dropdown">
                      <select id="status-pengajuan" class="form-control" id="kategori" style="height: 100%;">
                       <option>Pengajuan Ditolak</option>
                       <option value="form-publish">Pengajuan Diterima</option>
                      </select>
                    </div>

                </td>
              </tr>

            </tbody>
          </table>
          <form action="services/edit.php" method="post" enctype="multipart/form-data">
          <input type="hidden" id="insert-unggah" name="idUnggah" value=<?php echo $_GET['id'];?>>
          <button type="submit" class="btn btn-primary btn-block btn-ebookhub btn-register" id="simpan-penyuntingan">Simpan</button>
          </form>
        </div>
        <br><br>

        <!-- Jika select option nya = Pengajuan Diterima, maka akan muncul form materi untuk diterbitkan
             Use JavaScript..
       -->

        <!-- Begin Form buku untuk diterbitkan -->
        <div class="output">
          <div class="form-publish">
            <div class="text-center">
              <h2>Masukkan info materi untuk diterbitkan</h2>
            </div>

            <form action="services/sell.php" method="post" enctype="multipart/form-data">
              <input type="text" class="form-control form-register" id="insert-judulBuku" name="judulBuku" placeholder="Judul materi..." required>
              <input type="text" class="form-control form-register" id="insert-namaPenulis" name="pengarangBuku" placeholder="Nama penulis..." required>
              <div class="form-group">
                <label for="kategori"></label>
                <select class="form-control form-register form-group-kategori" id="insert-kategori" name="kategori" required>
                        <option>-Pilih Kategori-</option>
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
                <label for="subkategori"></label>
                <select class="form-control form-register form-group-kategori" id="insert-subkategori" name="subkategori" required>
                  <option>-Pilih Sub Kategori-</option>
                  <option>Fiksi</option>
                  <option>Non Fiksi</option>
                </select>
              </div>
              <div class="form-group">
               <textarea class="form-control" rows="5" id="insert-deskripsi" name="deskripsiBuku" placeholder="Deskripsi materi..." required></textarea>
              </div>

              <div class="form-group">
                <label for="exampleFormControlFile1">
                  Pilih Cover Materi
                </label>
                <input type="file" id="insert-fileCover" name="fileCover" required>
              </div>

              <div class="form-group">
                <label for="exampleFormControlFile1">
                  Format buku dalam bentuk .pdf, .epug atau .mobi. Format penulisan dan layout dapat melihat pada halaman <a href="#">ini.</a> Ukuran file maksimal 50 MB.
                </label>
                <input type="file" id="insert-fileEditor" name="fileEditor" required>
              </div>

              <input type="hidden" id="insert-command" name="command" value="insert">
              <input type="hidden" id="insert-idunggah" name="idUnggah" value=<?php echo $_GET['id'];?>>
              <button type="submit" class="btn btn-primary btn-block btn-ebookhub btn-register">Simpan</button>
            </form>



          </div>
        </div>

        <!-- tandai -->

        <!-- End Form buku untuk diterbitkan -->


      </div>


    </div>


  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
