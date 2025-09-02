<?php
require "koneksi.php";
session_start();

if (isset($_POST['update_password'])) {
    $current = $_POST['current_password'];
    $new     = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    $user_id = $_SESSION['ID'];

    // Ambil password lama dari database
    $result = mysqli_query($koneksi, "SELECT password FROM users WHERE id = '$user_id'");
    $row = mysqli_fetch_assoc($result);

    // Verifikasi password lama
    if (!password_verify($current, $row['password'])) {
        echo "<script>alert('Password lama salah!');</script>";
    } elseif ($new !== $confirm) {
        echo "<script>alert('Password baru dan konfirmasi tidak cocok!');</script>";
    } else {
        // Hash password baru
        $hashed = password_hash($new, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE users SET password = '$hashed' WHERE id = '$user_id'");
        echo "<script>alert('Password berhasil diperbarui!'); window.location='profil_pengguna.php';</script>";
    }
}
?>
