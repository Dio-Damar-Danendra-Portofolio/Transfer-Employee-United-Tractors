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
  <main class="d-flex vh-100 justify-content-center align-items-center p-5" style="background-color: #000080;">
    <div class="container">
      <div class="card">
        <div class="card-header bg-warning text-center">
          <h1 class="text-dark"><i>Login</i> (Masuk)</h1>
        </div>
        <div class="card-body">
        <form action="" method="post">
          <div class="row m-5">
            <div class="col-12">
              <label for="email" class="form-label fw-bold fs-5">E-mail: </label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
          </div>          
          <div class="row m-5">
            <div class="col-12">
                  <label for="password" class="form-label fw-bold fs-5">Password: </label>
                  <input type="password" name="password" id="password" class="form-control" required>
            </div>
          </div>
          <div class="row m-5">
              <div class="col-12 d-flex align-items-center">
                <div class="form-check mt-2">
                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                      Ingat saya
                    </label>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success" name="login">Login</button>
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
