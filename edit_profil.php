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
  <main class="vh-100 justify-content-center align-items-center p-5" style="background-color: #ffbb00ff;">
    <div class="container">
      <div class="card">
          <div class="card-header">
              <h1 class="text-dark"><i>Edit</i> (Sunting) Profil</h1>
          </div>
          <div class="card-body">
                <form action="" enctype="multipart/form-data" method="post">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="name" class="form-label text-dark fw-bold fs-5">Nama Lengkap: </label>
                  <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($user['name']); ?>">
                </div>
                <div class="col-md-6">
                  <label for="division" class="form-label text-dark fw-bold fs-5">Divisi: </label>
                  <select name="division" id="division" class="form-select">
                    <?php include "backend/divisi.php"; ?>
                    <option value="">Pilih Divisi</option>
                    <?php foreach ($divisi as $div) { ?>
                    <option value="<?= $div ?>" <?= ($user['division'] == $div) ? 'selected' : ''; ?>><?= $div ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="phone_number" class="form-label text-dark fw-bold fs-5">
                  Nomor Ponsel: 
                  </label>
                  <input class="form-control" type="tel" name="phone_number" id="phone_number" value="<?= htmlspecialchars($user['phone_number']); ?>">
                </div>
                <div class="col-md-6">
                  <label for="role" class="form-label text-dark fw-bold fs-5">Peran: </label>
                  <input type="text" name="role" id="role" class="form-control" value="<?= htmlspecialchars($user['role']); ?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="profile_picture" class="form-label fw-bold">Foto Profil</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                    <!-- preview foto lama -->
                    <?php if (!empty($user['profile_picture'])) { ?>
                      <img src="images/uploads/<?= htmlspecialchars($user['profile_picture']); ?>" 
                          alt="Foto Profil" class="img-thumbnail mt-2" style="max-width:150px;">
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <a href="profil_pengguna.php" class="btn btn-danger fw-bold px-4" name="kembali">Kembali</a>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-success fw-bold px-4" name="simpan">Simpan</button>
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