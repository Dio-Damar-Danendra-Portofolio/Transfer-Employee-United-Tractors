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
  <main class="vh-100 justify-content-center align-items-center p-5" style="background-color: #ffbb00ff;">
    <div class="container">
      <div class="card">
          <div class="card-header">
              <h1 class="text-dark"><i>Sign-up</i> (Daftar)</h1>
          </div>
          <div class="card-body">
                <form action="" method="post">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="name" class="form-label text-dark fw-bold fs-5">Nama Lengkap: </label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label text-dark fw-bold fs-5">E-mail: </label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="password" class="form-label text-dark fw-bold fs-5">Password: </label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="col-md-6">
                  <label for="division" class="form-label text-dark fw-bold fs-5">Divisi: </label>
                  <select name="division" id="division" class="form-select" required>
                  <?php include "backend/divisi.php"; ?>
                    <option value="">Pilih Divisi</option>
                    <?php foreach ($divisi as $div) { ?>
                    <option value="<?= $div ?>"><?= $div ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="phone_number" class="form-label text-dark fw-bold fs-5">
                  Nomor Ponsel: 
                  </label>
                  <input class="form-control" type="tel" name="phone_number" id="phone_number" required>
                </div>
                <div class="col-md-6">
                  <label for="role" class="form-label text-dark fw-bold fs-5">Peran: </label>
                  <input type="text" name="role" id="role" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <button type="reset" class="btn btn-danger fw-bold px-4">Reset</button>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-success fw-bold px-4" name="daftar">Daftar</button>
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