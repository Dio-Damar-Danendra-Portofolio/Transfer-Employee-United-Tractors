  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold text-truncate" style="max-width: 300px;" 
           href="<?php echo isset($_SESSION['NAME']) ? 'beranda' : 'index'?>.php">
           United Tractors Transfer Employee
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <?php if (isset($_SESSION['ID'])) { ?>
          <!-- Menu untuk user yang login -->
          <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item"><a class="nav-link" href="beranda.php">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="unggah_excel.php">Unggah Excel</a></li>
            <li class="nav-item"><a class="nav-link" href="tentang_situs.php">Tentang Situs</a></li>
            <li class="nav-item"><a class="nav-link" href="daftar_berkas_excel.php">Daftar Berkas Excel</a></li>
            <li class="nav-item"><a class="nav-link" href="https://www.unitedtractors.com/visi-misi/" target="_blank" onclick="konfirmasiVisiMisi()">Visi dan Misi</a></li>
          </ul>
        <?php } else { ?>
          <!-- Menu untuk user yang belum login -->
          <ul class="navbar-nav mx-auto">
            <li class="nav-item text-center">
              <a class="nav-link" href="https://www.unitedtractors.com" target="_blank" onclick="konfirmasiSitusUT()">
                <img src="images/logo-ut-baru.png" class="img-fluid" style="max-height: 45px;" alt="Logo UT">
              </a>
            </li>  
          </ul>
        <?php } ?>

          <!-- Tombol kanan -->
          <div class="d-flex flex-wrap justify-content-center mt-2 mt-lg-0">
            <?php if (!isset($_SESSION['ID'])) { ?>
              <a href="login.php" class="btn btn-dark me-2 mb-2 mb-lg-0">Masuk</a>
              <a href="sign_up.php" class="btn btn-primary me-2 mb-2 mb-lg-0">Daftar</a>
            <?php } else { ?> 
              <a href="profil_pengguna.php" class="btn btn-info me-2 mb-2 mb-lg-0">Profil</a>
              <a href="logout.php" class="btn btn-danger me-2 mb-2 mb-lg-0">Keluar (<i>Logout</i>)</a>            
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
