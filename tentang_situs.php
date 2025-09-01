<?php 
  require "backend/user_session.php";
?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>
<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="py-4" style="background-color: #ffbb00ff;">
    <div class="container">
      <h1 class="text-dark mb-4 text-center">Tentang Situs</h1>
      <div class="row justify-content-center mb-4">
        <div class="col-lg-8 col-md-10 text-center">
          <img src="images/UT Building.jpg" 
               alt="Gedung United Tractors" 
               class="img-fluid rounded shadow mx-auto d-block">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <p class="text-dark fs-5 fs-md-4 fs-lg-3 text-justify">
            Situs ini merupakan situs untuk PT United Tractors Tbk. 
            Situs ini dirancang untuk mencetak PDF untuk seorang karyawan yang pindah divisi. 
            Situs ini dikhususkan untuk karyawan United Tractors. 
            Situs ini dibuat pada tahun 2025 dan digunakan hingga beberapa tahun.
          </p>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>
</html>
