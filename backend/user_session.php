<?php 
  session_start();
  session_regenerate_id();
  ob_start();
require __DIR__ . "/koneksi.php"; // koneksi MySQL
  if (!isset($_SESSION['ID'])) {
        header("Location: login.php"); // prevent access if not logged in
        exit;
  }
?>