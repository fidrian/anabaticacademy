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
        <h1>Tentang Kami</h1>
      </div>
      <center>
        <a href="landing.php"><img class="img-responsive" src="images/anabatic-academy.png" alt=""></a>
      </center>
      <div class="col-md-12 text-justify">

        <p>
			Anabatic Technologies adalah perusahaan IT yang cepat tumbuh dengan lebih dari 200 orang karyawan yang dinamis dan sangat terampil. Sejak pembentukannya, Anabatic bertujuan untuk memberikan nilai tinggi dan produk yang cocok terbaik dan layanan yang meningkatkan keunggulan kompetitif pelanggan. Anabatic telah berkembang menjadi salah satu perusahaan IT terkemuka di Indonesia, didukung oleh mitra teknologi kelas dunia seperti Temenos, SAP, Finarch, IBM, Cisco, Microsoft dan lain-lain. Anabatic memiliki produk dan layanan end-to-end solusi berkisar dari sistem inti perbankan (konvensional, Islam, keuangan mikro), perencanaan sumber daya perusahaan, intelijen bisnis, perusahaan gudang data, perencanaan sumber daya keuangan, perusahaan manajemen konten, perusahaan infrastruktur IT, dan Software-as-a-Service (SaaS). Anabatic menyediakan portal knowldege management yaitu <strong>Anabatic Learning Academy (ALA) </strong> yang bertujuan untuk menambah wawasan karyawan, memberikan fasilitas akses dan knowledge sharing antarkaryawan berupa fasilitas kemudahan melakukan akses informasi terbaru, fasilitas download berbagai file seperti materi pelatihan, video training, serta fitur lain yaitu Media Forum. Portal ini berisi sharing knowledge berdasarkan pengalaman (portofolio) Anabatic yang luas dalam menangani proyek di berbagai bidang industri. <strong>Target ALA</strong> adalah menjalankan program pelatihan IT bersertifikat internasional baik untuk internal Anabatic maupun kalangan industri IT.
            <strong>Build. Share. Inspire!</strong>
        </p>
      </div>

      <div class="col-md-12 text-center visi-ebookhub">
        <ol>
          <h2 id="greetings-1">Visi PT Anabatic Technologies</h2>
          <p class="visi-text">“PT Anabatic Technologies aims to be the leading IT solutions company in the region. We aim to be your most preferred business partner by utilizing our strategic customers and principals.”</p>
        </ol>
      </div>
	  
	   <div class="col-md-12 text-center visi-ebookhub">
        <ol>
          <h2 id="greetings-1">Misi PT Anabatic Technologies</h2>
          <p class="visi-text">“PT Anabatic Technologies aspires to deliver the most suitable products and services to increase customer competitive advantage, while simultaneously developing growth to delight all stakeholders involved.”</p>
        </ol>
      </div>
	  
      </div>
    </div>
  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
