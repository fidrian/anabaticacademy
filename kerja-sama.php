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

<div class="about section-margin">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Kerja Sama</h1>
      </div>

      <div class="col-md-12 text-justify">
        <h4>Q: Kami komunitas pembaca/penulis, dan kami ingin bekerjasama dengan Anabatic Learning Academy. Bagaimana caranya?</h4>
        <p>A: Kami ingin sekali bekerjasama denganmu! Sebaiknya, kamu langsung berbicara pada Tim kami. Kamu bisa menghubunginya melalui surel ke cs@EbookHub.id , atau kirim pesan melalui Facebook dan Instagram.</p>
      </div>


    </div>
  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
