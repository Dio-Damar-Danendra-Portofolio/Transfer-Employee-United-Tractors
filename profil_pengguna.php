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
    <main class="vh-100 d-flex flex-column justify-content-start align-items-start ps-3" style="background-color: #ffbb00ff;">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12 text-dark">
          <h1>Profil Pengguna</h1>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12 d-flex justify-content-center">
        <img src="images/uploads/<?php echo isset($_SESSION['PROFILE_PICTURE']) ? $_SESSION['PROFILE_PICTURE'] : ''; ?>" 
            alt="Gambar tidak tersedia" 
            class="img-fluid mb-3 rounded-circle shadow mt-2" 
            style="width: 250px; height: 250px; object-fit: cover;">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-dark">
          <p><span class="fw-bold">Nama Lengkap: </span><?php echo isset($_SESSION['NAME']) ? htmlspecialchars($_SESSION['NAME']) : 'Belum login'; ?></p>
        </div>
        <div class="col-md-3 text-dark">
          <p><span class="fw-bold">Peran: </span><?php echo isset($_SESSION['ROLE']) ? htmlspecialchars($_SESSION['ROLE']) : 'Belum mempunyai peran'; ?></p>
        </div>
        <div class="col-md-3 text-dark">
          <p><span class="fw-bold">Nomor Ponsel: </span><?php echo isset($_SESSION['PHONE_NUMBER']) ? htmlspecialchars($_SESSION['PHONE_NUMBER']) : 'Belum ada'; ?></p>
        </div>
        <div class="col-md-3 text-dark">
          <p><span class="fw-bold">Divisi: </span><?php echo isset($_SESSION['DIVISION']) ? htmlspecialchars($_SESSION['DIVISION']) : 'Divisi'; ?></p>
        </div>
      </div>      
      <div class="row mb-3">
       <div class="col-12 d-flex justify-content-center">
        <a href="edit_profil.php" class="btn btn-primary">Edit Profil</a>
       </div>
      </div>
    </div>
  </main>
  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>
</html>
