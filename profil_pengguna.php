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
  <main class="min-vh-100 d-flex flex-column justify-content-start align-items-start ps-3" style="background-color: #ffbb00ff;">
  <div class="container py-4">
    <!-- Judul -->
    <div class="row">
      <div class="col-12">
        <h1 class="text-dark text-center text-md-start">Profil Pengguna</h1>
      </div>
    </div>

    <!-- Foto Profil -->
    <div class="row my-4">
      <div class="col-12 d-flex justify-content-center">
        <img 
          src="images/uploads/<?php echo isset($_SESSION['PROFILE_PICTURE']) ? $_SESSION['PROFILE_PICTURE'] : ''; ?>" 
          alt="Gambar tidak tersedia" 
          class="img-fluid mb-3 rounded-circle shadow mt-2"
          style="max-width: 250px; width: 100%; height: auto; object-fit: cover;">
      </div>
    </div>

    <!-- Detail Profil -->
    <div class="row text-dark mb-4 g-3">
      <div class="col-12 col-md-6 col-lg-3">
        <p><span class="fw-bold">Nama Lengkap: </span><?php echo isset($_SESSION['NAME']) ? htmlspecialchars($_SESSION['NAME']) : 'Belum login'; ?></p>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <p><span class="fw-bold">Peran: </span><?php echo isset($_SESSION['ROLE']) ? htmlspecialchars($_SESSION['ROLE']) : 'Belum mempunyai peran'; ?></p>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <p><span class="fw-bold">Nomor Ponsel: </span><?php echo isset($_SESSION['PHONE_NUMBER']) ? htmlspecialchars($_SESSION['PHONE_NUMBER']) : 'Belum ada'; ?></p>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <p><span class="fw-bold">Divisi: </span><?php echo isset($_SESSION['DIVISION']) ? htmlspecialchars($_SESSION['DIVISION']) : 'Divisi'; ?></p>
      </div>
    </div>

    <!-- Tombol Edit -->
    <div class="row mb-3">
      <div class="col-6 d-flex justify-content-center">
        <a href="edit_profil.php" class="btn btn-primary px-4">Edit Profil</a>
      </div>
      <div class="col-6 d-flex justify-content-center">
        <a href="ganti_password.php" class="btn btn-dark px-4">Ganti <i>Password</i></a>
      </div>
    </div>
  </div>
</main>
  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>
</html>
