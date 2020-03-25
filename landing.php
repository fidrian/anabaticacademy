<?php
  require_once("templates/header.php");
?>

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
	function daftarBuku($table) {
		$conn = connectDB();

		$sql = "SELECT book_id, img_path, title, author, publisher, quantity FROM $table";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function daftarNon($table) {
		$conn = connectDB();

		$sql = "SELECT * FROM $table WHERE category = 'Non Fiksi'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function daftarFiksi($table) {
		$conn = connectDB();

		$sql = "SELECT * FROM $table WHERE category = 'Fiksi'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
	}

	function selectRowsFromSubmission() {
		$conn = connectDB();

		$sql = "SELECT * FROM submission WHERE user_id = ".$_SESSION["user_id"]."";
		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function selectAllRowsFromSubmission() {
		$conn = connectDB();

		$sql = "SELECT DISTINCT book_id FROM submission";
		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function selectBooks() {
    $pinjam = selectRowsFromSubmission();
    $arraysubmission = array();
    while ($baris = mysqli_fetch_row($pinjam)) {
      array_push($arraysubmission, $baris[1]);
    }
    return $arraysubmission;
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

    $sql = "SELECT * FROM book WHERE book_id = $book_id";
    if(!$result = mysqli_query($conn, $sql)) {
      die("Error: $sql");
    }
    mysqli_close($conn);
    return $result;
  }

	function pinjamBuku($book_id, $user_id) {
		$conn = connectDB();
		$sqlsubmission = "INSERT into submission (book_id, user_id) values ('$book_id','$user_id')";

		$sqlbook = "UPDATE book SET quantity = quantity-1 where book_id = $book_id";
		if(!$result = mysqli_query($conn, $sqlsubmission)) {
			die("Error: $sqlsubmission");
		}
		if(!$result = mysqli_query($conn, $sqlbook)) {
			die("Error: $sqlbook");
		}
		mysqli_close($conn);
		header("Location: daftar.php");
	}

	function balikBuku($book_id, $user_id) {
		$conn = connectDB($book_id, $user_id);
		$sqlsubmission = "DELETE FROM submission WHERE book_id = $book_id AND user_id = $user_id";

		$sqlbook = "UPDATE book SET quantity = quantity+1 where book_id = $book_id";
		if(!$result = mysqli_query($conn, $sqlsubmission)) {
			die("Error: $sqlsubmission");
		}
		if(!$result = mysqli_query($conn, $sqlbook)) {
			die("Error: $sqlbook");
		}
		mysqli_close($conn);
		header("Location: daftar.php");
	}

	function showActButton($arraysubmission, $bookid, $stocknum) {
		$flag = false;
		for ($i=0; $i < count($arraysubmission); $i++) {
			if ($arraysubmission[$i] == $bookid) {
				echo '
				<form action="daftar.php" method="post">
					<input type="hidden" name="book_id" value="'.$bookid.'">
					<input type="hidden" name="command" value="balik">
					<button type="submit" class="btn btn-default" style="width:100%;">Balik</button>
				</form>
				';
				$flag = true;
			}
		}
		if($flag == false) {
			if($stocknum > 0) {
				echo '
				<form action="daftar.php" method="post">
					<input type="hidden" name="book_id" value="'.$bookid.'">
					<input type="hidden" name="command" value="pinjam">
					<button type="submit" class="btn btn-default" style="width:100%;">Pinjam</button>
				</form>
				';
			}
		}
	}

	function insertBuku() {
		$conn = connectDB();

		$displayBuku = $_POST['displayBuku'];
		$judulBuku = $_POST['judulBuku'];
		$pengarangBuku = $_POST['pengarangBuku'];
		$penerbitBuku = $_POST['penerbitBuku'];
		$deskripsiBuku = $_POST['deskripsiBuku'];
		$stokBuku = $_POST['stokBuku'];

		$daftarbuku = daftarBuku("book");
		$sdhAda = false;
		$bookid = 0;
		while ($row = mysqli_fetch_row($daftarbuku)) {
			if($row[2] == $judulBuku) {
				$sdhAda = true;
				$bookid = $row[0];
				break;
			}
		}
		$_SESSION["titlebookadded"] = $judulBuku;

		if($sdhAda == true) {
			$sql = "UPDATE book SET quantity = quantity + $stokBuku where book_id = $bookid";
		} else {
			$sql = "INSERT into book (img_path, title, author, publisher, description, quantity) values('$displayBuku', '$judulBuku', '$pengarangBuku', '$penerbitBuku', '$deskripsiBuku', $stokBuku)";
		}

		if($result = mysqli_query($conn, $sql)) {
			echo "New record created successfully <br/>";
			header("Location: detail.php");
			} else {
			die("Error: $sql");
		}
		mysqli_close($conn);
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['command'] === 'insert') {
			insertBuku();
		}else if ($_POST['command'] === 'pinjam') {
			pinjamBuku($_POST['book_id'],$_SESSION["user_id"]);
		} else if ($_POST['command'] === 'balik') {
			balikBuku($_POST['book_id'],$_SESSION["user_id"]);
		}
	}

?>


<!-- Begin Welcome -->
<div class="welcome">
  <div class="container">
    <div class="row">
      <div class="col-md-6 greetings">
        <h1 id="greetings-1">Hi, Kami Anabatic Academy!</h1>
        <h3 id="greetings-2">Media untuk belajar ratusan materi untuk membantu pekerjaanmu sehari-hari! Gratis!</h3>
        <h3 id="greetings-3">Kami hadir untuk memastikan pengetahuan dan skill kamu akan terus berkembang</h3>

        <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-block btn-ebookhub btn-bacaupload" onclick="window.location='shop.php?offset=0'">Mulai Baca</button>
        </div>
        <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-block btn-ebookhub btn-bacaupload" onclick="window.location='upload.php'">Mulai Publikasi</button>
        </div>
      </div>

      <div class="col-md-6 devices text-center">
        <img src="images/devices.png" alt="" class="img-responsive">
      </div>
    </div>
  </div>
</div>
<!-- End Welcome -->

<!-- Begin How-to-use -->
<!-- ================================================================================ -->
<!-- <div class="how-to-use">
  <div class="container">
    <div class="row">

        <div class="col-lg-12">
          <h1 class="how-to-use-title text-center">Bagaimana menerbitkan buku di Eboookhub?</h1>
        </div>

        <div class="col-md-4 col-sm-12">
          <div class="box-how-to-use box-shadow text-center">
            <i class="fa fa-upload fa-how-to-use" aria-hidden="true"></i>
            <h2>Unggah</h2>
            <p>Unggah draft e-book yang kamu miliki dan kami akan segera melakukan pengecekan dan penilaian kelayakan terbit.</p>

          </div>
        </div>

        <div class="col-md-4 col-sm-12">
          <div class="box-how-to-use box-shadow text-center">
            <i class="fa fa-edit fa-how-to-use" aria-hidden="true"></i>
            <h2>Proses Edit</h2>
            <p>Apabila draft e-book lulus uji kelayakan, maka kami akan mempersiapkan e-book milikmu untuk dipublikasi. </p>

          </div>
        </div>

        <div class="col-md-4 col-sm-12">
          <div class="box-how-to-use box-shadow text-center">
            <i class="fa fa-book fa-how-to-use" aria-hidden="true"></i>
            <h2>Terbit</h2>
            <p>Selamat! E-book milikmu sudah dipublikasi dan siap untuk dibaca oleh seluruh pecinta buku.</p>

          </div>
        </div>


    </div>
</div>
</div> -->

<!-- ========================================================================================= -->
<!-- End How-to-use -->

<!-- Begin partner -->
<!-- <div class="partner">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-12">
        <h1>Partner Kami</h1>
      </div>

      <div class="col-md-3 col-sm-12">
        <a href="https://gramedia.com"><img src="images/gramedia.png" alt=""></a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a href="http://www.kompasgramedia.com"><img src="images/kompas.jpg" alt=""></a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a href="http://www.elexmedia.id"><img src="images/elex.png" alt=""></a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a href="https://mizan.com"><img src="images/mizan.jpg" alt=""></a>
      </div>
    </div>
  </div>
</div> -->
<!-- End partner -->

<!-- services-->
    <section class="services pt-5" id="services">
        <div class="container py-lg-5">
            <p class="paragraph">About</p>
            <h3 class="heading mb-sm-5 mb-4">Anabatic Learning Academy</h3>
            <div class="row text-center pt-4">
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="panel panel-default">
                        <div class="panel-thumbnail" style="height:370px">
                            <img src="images/s1.png" alt="" class="img-fluid" />
                            <!-- <h3>01</h3> -->
                            <h4 class="mt-3">Learn Anywhere, Anytime!</h4>
                            <p class="mt-3">Helps you connect to thousands of classes and can be accessed anytime and anywhere, and absolutely Free!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="panel panel-default" >
                        <div class="panel-thumbnail" style="height:370px">
                            <img src="images/s2.png" alt="" class="img-fluid" />
                            <!-- <h3>02</h3> -->
                            <h4 class="mt-3">Professional Practitioner</h4>
                            <p class="mt-3">Meet the practitioner who are experts in their respective fields!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="panel panel-default">
                        <div class="panel-thumbnail" style="height:370px">
                            <img src="images/s3.png" alt="" class="img-fluid" />
                            <!-- <h3>03</h3> -->
                            <h4 class="mt-3">Course from Other Division? Easy!</h4>
                            <p class="mt-3">Finding online classes from other division has never been easier like this before. Come on, learn new knowledge here!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="panel panel-default">
                        <div class="panel-thumbnail" style="height:370px">
                            <img src="images/s4.png" alt="" class="img-fluid" />
                            <!-- <h3>04</h3> -->
                            <h4 class="mt-3">Easy to Use</h4>
                            <p class="mt-3">You can access from various browsers and platforms. just Click and BOOOM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
		<!-- services -->
		
<!-- testimoni -->
<section class="client py-5" id="testimonials">
  <div class="container py-lg-5">
		<p class="paragraph">what users say</p>
		<h3 class="heading mb-sm-5 mb-4">Testimony</h3>
		  <section class="row client-slider-slide">
			<div class="col-lg-6 col-md-6  mb-md-0 mb-5">
			  <div class="clients-info-grid">
				<p style="font-size:12pt">"Dengan menggunakan Anabatic Learning academy banyak manfaat yang kami dapatkan, salah satunya sangat membantu dalam meningkatkan skill dan kemampuan untuk bisa selalu bersaing."
				</p>
				<div class="row">
					<div class="col-lg-2 col-3 pr-0 img-position mt-3">
					  <img src="images/t1.png" alt="" class="img-fluid">
					</div >
					<div class=" col-lg-10 col-9 clients-txt-info">
					  <h4 class="mt-4">Randy Budiman</h4>
					  <p>Head Manager PT Anabatic</p>
					</div>
				  </div>
			  </div>
			</div>
			<div class="col-lg-6 col-md-6 w3layouts-txt-says">
			  <div class="clients-info-grid">
				<p style="font-size:12pt">"Mudah digunakan, Harapannya dengan adanya Anabatic Learning Academy memudahkan dalam sharing knowledges, dan akhirnya dapat menyamaratakan kemampuan setiap individu di perusahaan."  </p>
				<div class="row">
					<div class="col-lg-2 col-3 pr-0 img-position mt-3">
					  <img src="images/t1.png" alt="" class="img-fluid">
					</div >
					<div class="col-lg-10 col-9 clients-txt-info">
					  <h4 class="mt-4">Filip</h4>
					  <p>SPV Product PT Anabatic</p>
					</div>
				  </div>
			  </div>
			</div>
		  </div>
	</div>
</section>

<!-- Begin Subscribe -->

<!-- testimoni -->
<section class="subscribe py-5" id="">
  <div class="p-5 py-lg-5">
		<div class="row">
  	    <div class="col-sm-12 subscribe-box text-center">
  	      <h2>Jadilah yang pertama tahu berita dan promosi menarik dari kami! (Gratis)</h2>
  	      <div class="input-group input-subscribe">
  	        <input type="email" class="form-control" placeholder="Masukkan alamat e-mail...">
  	        <span class="input-group-btn">
  	          <button class="btn btn-danger" type="submit">Berlangganan</button>
  	        </span>
  	      </div>
		    </div>
		</div>
	</div>
</section>


<?php
  require_once("templates/footer.php");
?>
