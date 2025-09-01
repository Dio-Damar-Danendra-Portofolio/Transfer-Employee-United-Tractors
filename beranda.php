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
  <main class="d-flex justify-content-center align-items-center py-5" style="background-color: #ffbb00ff; min-height: 80vh;">
    <div class="container text-center">
      <h1 class="fw-bold">Selamat Datang di situs Transfer Employee UT, <?php echo $_SESSION['NAME'];?>!</h1>
      <p class="text-dark fs-5">Di sini Anda bisa mencetak data untuk karyawan yang berpindah divisi.</p>
    </div>
  </main>
  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>
</html>
