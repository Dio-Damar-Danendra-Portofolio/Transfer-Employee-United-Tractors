<?php 
  require "backend/user_sign_up.php";
?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>
<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="d-flex justify-content-center align-items-center min-vh-100 py-5" style="background-color: #ffbb00ff;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
          <div class="card shadow-lg rounded-4">
            <div class="card-header bg-light">
              <h1 class="text-dark text-center m-0"><i>Sign-up</i> (Daftar)</h1>
            </div>
            <div class="card-body p-4">
              <form action="" method="post">
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label for="name" class="form-label text-dark fw-bold">Nama Lengkap:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="email" class="form-label text-dark fw-bold">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="password" class="form-label text-dark fw-bold">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="division" class="form-label text-dark fw-bold">Divisi:</label>
                    <select name="division" id="division" class="form-select" required>
                      <option value="">Pilih Divisi</option>
                      <?php include "backend/divisi.php"; ?>
                      <?php foreach ($divisi as $div) { ?>
                        <option value="<?= $div ?>"><?= $div ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="phone_number" class="form-label text-dark fw-bold">Nomor Ponsel:</label>
                    <input type="tel" class="form-control" name="phone_number" id="phone_number" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="role" class="form-label text-dark fw-bold">Peran:</label>
                    <input type="text" class="form-control" name="role" id="role" required>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-6 d-grid">
                    <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                  </div>
                  <div class="col-6 d-grid">
                    <button type="submit" class="btn btn-success fw-bold" name="daftar">Daftar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>
</html>