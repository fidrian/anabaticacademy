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
        <h1>Kantor dan Workshop</h1>
      </div>

      <div class="kantor">
        <div class="col-md-6">
          <ol>
            <h4>
              <strong>Anda dapat mengunjungi kantor kami di: </strong><br><br>
              <p>Graha BIP Lt. 7</p>
              <p>Jl. Gatot Subroto No.Kav 23, Jakarta Selatan</p>
              <p>Telp: (021) 6577897</p>
              <p>Fax: (021) 5795455</p>
            </h4>
          </ol>
        </div>

        <div class="col-md-6">

          <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 200px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2599228083163!2d106.81827621427267!3d-6.229423695490692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e2fb292d13%3A0x51d0e6dfacba8e0f!2sGraha%20Bip%2C%20Jl.%20Gatot%20Subroto%20No.Kav%2023%2C%20RT.2%2FRW.2%2C%20Karet%20Semanggi%2C%20Setiabudi%2C%20South%20Jakarta%20City%2C%20Jakarta%2012930!5e0!3m2!1sid!2sid!4v1574343094310!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>

        </div>
      </div>
    </div>

    <div class="row section-margin">
      <div class="workshop">
        <div class="col-md-6">
          <ol>
            <h4>
              <strong>Anda dapat mengunjungi workshop kami di: </strong><br><br>
              <p>Graha Anabatic Lt. 7</p>
              <p>Jalan Scientia Boulevard Kav. U2 Summarecon Serpong</p>
              <p>Tangerang</p>
              <p>Banten 15810</p>
              <p>Telp: (021) 80636010</p>
            <p>Fax: (021) 80636010</p>
            </h4>
          </ol>
        </div>

        <div class="col-md-6">

          <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 200px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.250513820412!2d106.6198287!3d-6.2554799!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x16699d670e8909b1!2sGraha%20Anabatic!5e0!3m2!1sid!2sid!4v1586691533170!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
