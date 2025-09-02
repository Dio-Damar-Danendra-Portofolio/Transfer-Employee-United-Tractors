<?php 
require "backend/update_password.php"; 
?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>
<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="min-vh-100 d-flex flex-column justify-content-center align-items-center p-3 p-md-5" style="background-color: #ffbb00ff;">
    <div class="container">
      <div class="card shadow-lg mx-auto" style="max-width: 600px;">
        <div class="card-header text-center">
          <h1 class="text-dark"><i>Update</i> (Perbarui) <i>Password</i> (Kata Sandi)</h1>
        </div>
        <div class="card-body">
          <form action="" method="post">
            
            <!-- Password Lama -->
            <div class="mb-3">
              <label for="current_password" class="form-label text-dark fw-bold fs-5"><i>Password</i> Lama</label>
              <input type="password" class="form-control" name="current_password" id="current_password" required>
            </div>

            <!-- Password Baru -->
            <div class="mb-3">
              <label for="new_password" class="form-label text-dark fw-bold fs-5"><i>Password</i> Baru</label>
              <input type="password" class="form-control" name="new_password" id="new_password" required>
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mb-3">
              <label for="confirm_password" class="form-label text-dark fw-bold fs-5">Konfirmasi <i>Password</i> Baru</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
            </div>

            <!-- Tombol -->
            <div class="row">
              <div class="col-12 col-md-6 d-grid mb-2 mb-md-0">
                <a href="profil_pengguna.php" class="btn btn-danger fw-bold">Kembali</a>
              </div>
              <div class="col-12 col-md-6 d-grid">
                <button type="submit" class="btn btn-success fw-bold" name="update_password">Simpan</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>
</html>
