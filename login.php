<?php 
  require "backend/user_login.php"; 
?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>
<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="d-flex justify-content-center align-items-center min-vh-100 p-3" style="background-color: #000080;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
          <div class="card shadow-lg rounded-4">
            <div class="card-header bg-warning text-center">
              <h1 class="text-dark m-0"><i>Login</i> (Masuk)</h1>
            </div>
            <div class="card-body p-4">
              <form action="" method="post" novalidate>
                <div class="mb-3">
                  <label for="email" class="form-label fw-bold">E-mail:</label>
                  <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label fw-bold">Password:</label>
                  <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3 d-flex align-items-center">
                  <input class="form-check-input me-2" type="checkbox" name="remember" id="remember">
                  <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-success fw-bold" name="login">Login</button>
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
