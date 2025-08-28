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
  <main class="d-flex justify-content-start align-items-start py-4" style="background-color: #ffbb00ff;">
    <div class="container-fluid me-4"> <!-- ganti container jadi container-fluid agar rata kiri -->
      <h1 class="text-dark mb-3">Tentang Situs</h1>
      <div class="row me-3">
        <div class="col-12 text-dark">
            <img width="55%" src="images/UT Building.jpg" alt="Gambar tidak tersedia" class="img-fluid mb-3">
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-dark">
          <p class="fs-3">
            Situs ini merupakan situs untuk PT United Tractors Tbk. Situs ini dirancang untuk 
            mencetak PDF untuk seorang karyawan yang pindah divisi. Situs ini dikhususkan untuk karyawan United Tractors. 
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
