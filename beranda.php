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
  <main class="d-flex vh-100 justify-content-center align-items-center" style="background-color: #ffbb00ff;">
    <div class="container text-center">
      <h1>Selamat Datang di situs Transfer Employee UT, <?php echo $_SESSION['NAME'];?>!</h1>
      <p class="text text-dark fs-3">Disini Anda bisa mencetak data untuk karyawan yang berpindah divisi.</p>
    </div>
  </main>
  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>
</html>
