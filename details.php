<?php
  if (isset($_GET['id'])) {
    $no = $_GET['id'];
  }else{
    header('Location:shop.php');
  }
  require_once("templates/header.php");
?>

<?php
  session_start();
	function connectDB() {
		// require 'config/connect.php';
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
		$sql = "SELECT book_id, img_path, title, author, publisher, quantity, category FROM $table WHERE book_id != '$no' AND book_id IN (SELECT FLOOR(RAND()*(10-1+1)+1))";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function selectAllRowsFromSubmission() {
		$conn = connectDB();

		$sql = "SELECT DISTINCT book_id FROM submission LIMIT 5";
		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function selectAllBooks() {
    $pinjam = selectAllRowsFromSubmission();
    $arraysubmission = array();
    while ($baris = mysqli_fetch_row($pinjam)) {
      array_push($arraysubmission, $baris[0]);
    }
    return $arraysubmission;
  }

  function selectAllFromBook($book_id) {
    $conn = connectDB();

    $no = $_GET['id'];
    $sql = "SELECT * FROM book WHERE book_id != '$no' AND book_id = $book_id LIMIT 4";
    if(!$result = mysqli_query($conn, $sql)) {
      die("Error: $sql");
    }
    mysqli_close($conn);
    return $result;
  }

  function ebook(){
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'book';
    $db = mysqli_connect($host, $user, $password, $database);
    global $db;
    $get_ebooks = 'select ebook.*, penulis.nama_penulis from ebook INNER JOIN penulis ON ebook.penulis_id=penulis.penulis_id';
    $run_ebooks = mysqli_query($db, $get_ebooks);
    while($row_ebooks = mysqli_fetch_array($run_ebooks)){
      $ebook_id = $row_ebooks['ebook_id'];
      $penulis_id = $row_ebooks['penulis_id'];
      $nama_penulis = $row_ebooks['nama_penulis'];
      $judul_ebook = $row_ebooks['judul_ebook'];
      $tampilkan_judul = $judul_ebook;
      $harga = $row_ebooks['harga'];
      $cover_ebook = $row_ebooks['cover_ebook'];
      $ebook_docs = $row_ebooks['ebook_docs'];
      $deskripsi_ebook = $row_ebooks['deskripsi_ebook'];
      $isbn = $row_ebooks['isbn'];
      $sku = $row_ebooks['sku'];
      $tahun = $row_ebooks['tahun'];
      $jumlah_halaman = $row_ebooks['jumlah_halaman'];
    }
  }

?>
<div class="shop section-margin">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Katalog</a></li>
        </ul>
      </div>
    </div>

    <div class="row" style="margin-top: 30px;">

      <div class="col-md-3">
        <div class="item">
          <div class="card box-shadow text-center card-product-details">
          <?php
          $conn = connectDB();
          $query = "SELECT * FROM book where book_id = '$no'";
          $detail_unggah = mysqli_query($conn, $query);

          if (mysqli_num_rows($detail_unggah) > 0) {
            $row = mysqli_fetch_assoc($detail_unggah);
            echo '
            <img class="card-img-top img-fluid" style="height:300px;" src="'.$row['img_path'].'" alt="card-img">
            ';
          }
          ?>
          </div>

          <div class="table-details">
            <table class="table table-hover table-bordered">
              <tbody>
              <?php
                $conn = connectDB();
                $query = "SELECT * FROM book where book_id = '$no'";
                $detail_unggah = mysqli_query($conn, $query);

                if (mysqli_num_rows($detail_unggah) > 0) {
                  $row = mysqli_fetch_assoc($detail_unggah);
                  echo '
                  <tr>
                  <td><b>Tanggal Terbit</b></td>
                  <td>'.$row['publish_date'].'</td>
                  </tr>
                  <tr>
                  <td><b>Kategori</b></td>
                  <td>'.$row['category'].'</td>
                  </tr>                
                  ';
                }
            ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <div class="col-md-9 description-box">

        <div class="row">
        <?php
			$conn = connectDB();
			$query = "SELECT * FROM book where book_id = '$no'";
			$detail_unggah = mysqli_query($conn, $query);

			if (mysqli_num_rows($detail_unggah) > 0) {
				$row = mysqli_fetch_assoc($detail_unggah);
        echo'
        <h1 id="ebook-title">'.$row['title'].'</h1>
        <p class="ebook-author">Penulis: '.$row['author'].'</p>
        <p class="ebook-description text-justify">Deskripsi: '.$row['description'].'</p>
        ';
      }
      if(!isset($_SESSION['namauser'])) {
        echo '
          <a href="landing.php" onclick="mustLogin()" class="btn btn-lg btn-danger btn-beli text-capitalize"><i class="fa fa-star"></i>&nbsp; Tambah ke Koleksi</a>
          &nbsp;&nbsp;';
        echo '
          <a href="landing.php" onclick="mustLogin()" class="btn btn-lg btn-info btn-beli text-capitalize"><i class="fa fa-eye"> </i>&nbsp; Lihat</a>';
        echo  "<script type='text/javascript'>
                function mustLogin(){
                  alert('Silahkan Login/Register terlebih dahulu');
                }
              </script>";
      }else{
        echo '
          <a href="services/collection.php?id='.$row['book_id'].'" onclick="sukses()" class="btn btn-lg btn-danger btn-beli text-capitalize"><i class="fa fa-star"></i>&nbsp; Tambah ke Koleksi</a>
          &nbsp;&nbsp;';
        echo"<script type='text/javascript'>
              function sukses(){
                alert('Materi berhasil ditambahkan ke koleksi');
              }
            </script>";
        echo'<a href="services/open.php?id='.$row['book_id'].'" class="btn btn-lg btn-info btn-beli text-capitalize"><i class="fa fa-eye"> </i>&nbsp; Lihat</a>';
      }
	  
		?>

        </div>
      </div>
    </div>

    <div class="row section-margin-small">
        <div class="col-md-12">

        <?php
      $daftarbuku = daftarBuku("book");
      $terkait = mysqli_num_rows($daftarbuku);
      if ($terkait > 0) {
        echo '
          <h2>Materi Terkait</h2>
        ';
      }
    while ($row = mysqli_fetch_row($daftarbuku)) {
      echo '
      <div class="col-md-3 col-sm-4">
          <div class="item">
            <div class="card box-shadow text-center card-product">
              <img class="card-img-top img-fluid" style="height:300px;" src="'.$row[1].'" alt="card-img">
              <div class="card-body">
                <a href="details.php?id='.$row[0].'"><h4 class="card-title ebook-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><strong>'.$row[2].'</strong></h4></a>
                <p class="card-text ebook-author" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">'.$row[3].'</p>
							  <p class="card-text ebook-category" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">'.$row[6].'</p>';
                if(!isset($_SESSION['namauser'])) {
                  echo '
                        <a  href="landing.php" onclick="mustLogin()" class="btn btn-lg btn-danger btn-beli text-capitalize" style="font-size : 14px;"><i class="fa fa-star"> </i>&nbsp; Tambah ke Koleksi</a>';
                  echo  "<script type='text/javascript'>
                          function mustLogin(){
                            alert('Silahkan Login/Register terlebih dahulu');
                          }
                        </script>";
                }else{
                  echo '
                        <a  href="services/collection.php?id='.$row[0].'" onclick="sukses()" class="btn btn-lg btn-danger btn-beli text-capitalize" style="font-size : 14px;"><i class="fa fa-star"> </i>&nbsp; Tambah ke Koleksi</a>';
                  echo"<script type='text/javascript'>
                        function sukses(){
                          alert('Materi berhasil ditambahkan ke koleksi');
                        }
                      </script>";
                }
                echo'</div>
            </div>
          </div>
        </div>
      ';
    }
      ?>
      </div>
    </div>

    <div class="row section-margin-small">
      <div class="col-md-12">
        <h2>Materi Populer Lainnya</h2>

        <?php
              $arraybook = selectAllBooks();
              for ($i=0; $i < count($arraybook); $i++) {
                $buku = selectAllFromBook($arraybook[$i]);
                while ($row = mysqli_fetch_row($buku)) {
                  echo '
                  <div class="col-md-3 col-sm-4">
                  <div class="item">
                    <div class="card box-shadow text-center card-product">
                      <img class="card-img-top img-fluid" style="height:300px;" src="'.$row[1].'" alt="card-img">
                      <div class="card-body">
                        <a href="details.php?id='.$row[0].'"><h4 class="card-title ebook-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><strong>'.$row[2].'</strong></h4></a>
                        <p class="card-text ebook-author" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">'.$row[3].'</p>
							          <p class="card-text ebook-category" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">'.$row[7].'</p>';
                        if(!isset($_SESSION['namauser'])) {
                          echo '
                                <a  href="landing.php" onclick="mustLogin()" class="btn btn-lg btn-danger btn-beli text-capitalize" style="font-size : 14px;"><i class="fa fa-star"> </i>&nbsp; Tambah ke Koleksi</a>';
                          echo  "<script type='text/javascript'>
                                  function mustLogin(){
                                    alert('Silahkan Login/Register terlebih dahulu');
                                  }
                                </script>";
                        }else{
                          echo '
                            <a  href="services/collection.php?id='.$row[0].'" onclick="sukses()" class="btn btn-lg btn-danger btn-beli text-capitalize" style="font-size : 14px;"><i class="fa fa-star"> </i>&nbsp; Tambah ke Koleksi</a>';
                          echo "<script type='text/javascript'>
                                  function sukses(){
                                    alert('Materi berhasil ditambahkan ke koleksi');
                                  }
                                </script>";
                        }        
                      echo'</div>
                    </div>
                  </div>
                </div>
                  ';
                }
              }
        ?>

      </div>
    </div>

    </div>

</div>


<?php
  require_once("templates/footer.php");
?>
