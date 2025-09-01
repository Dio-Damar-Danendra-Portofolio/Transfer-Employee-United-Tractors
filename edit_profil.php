<?php 
  require "backend/update_profil.php";
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
    <div class="card shadow-lg">
      <div class="card-header text-center">
        <h1 class="text-dark"><i>Edit</i> (Sunting) Profil</h1>
      </div>
      <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
          <!-- Baris 1 -->
          <div class="row mb-3">
            <div class="col-12 col-md-6">
              <label for="name" class="form-label text-dark fw-bold fs-5 text-center text-md-start">Nama Lengkap:</label>
              <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($user['name']); ?>">
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
              <label for="division" class="form-label text-dark fw-bold fs-5 text-center text-md-start">Divisi:</label>
              <select name="division" id="division" class="form-select">
                <?php include "backend/divisi.php"; ?>
                <option value="">Pilih Divisi</option>
                <?php foreach ($divisi as $div) { ?>
                  <option value="<?= $div ?>" <?= ($user['division'] == $div) ? 'selected' : ''; ?>><?= $div ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <!-- Baris 2 -->
          <div class="row mb-3">
            <div class="col-12 col-md-6">
              <label for="phone_number" class="form-label text-dark fw-bold fs-5 text-center text-md-start">Nomor Ponsel:</label>
              <input class="form-control" type="tel" name="phone_number" id="phone_number" value="<?= htmlspecialchars($user['phone_number']); ?>">
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
              <label for="role" class="form-label text-dark fw-bold fs-5 text-center text-md-start">Peran:</label>
              <input type="text" name="role" id="role" class="form-control" value="<?= htmlspecialchars($user['role']); ?>">
            </div>
          </div>

          <!-- Upload Foto -->
          <div class="row mb-3">
            <div class="col-12">
              <label for="profile_picture" class="form-label fw-bold text-center text-md-start">Foto Profil</label>
              <input type="file" name="profile_picture" id="profile_picture" class="form-control">
              <?php if (!empty($user['profile_picture'])) { ?>
                <img src="images/uploads/<?= htmlspecialchars($user['profile_picture']); ?>" 
                     alt="Foto Profil" 
                     class="img-thumbnail img-fluid mt-2 rounded" 
                     style="max-width:150px;">
              <?php } ?>
            </div>
          </div>

          <!-- Tombol -->
          <div class="row">
            <div class="col-12 col-md-6 d-grid mb-2 mb-md-0">
              <a href="profil_pengguna.php" class="btn btn-danger fw-bold">Kembali</a>
            </div>
            <div class="col-12 col-md-6 d-grid">
              <button type="submit" class="btn btn-success fw-bold" name="simpan">Simpan</button>
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