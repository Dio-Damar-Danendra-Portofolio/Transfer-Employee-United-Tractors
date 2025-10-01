<?php
require "koneksi.php";
session_start();

if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); // Cek apakah checkbox dicentang

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Logika untuk Mengatur Cookie
        if ($remember) {
            $cookie_expiration = time() + (86400 * 366); 
            // Simpan email dan password (penting: password di sini HANYA untuk "remember me"
            // dan akan diisi ke form, BUKAN untuk otentikasi otomatis yang lebih kompleks).
            setcookie('email_remember', $email, $cookie_expiration, "/");
            // Set cookie untuk password. TIDAK disarankan menyimpan password mentah,
            // tapi untuk tujuan mengisi ulang form, kita bisa menyimpan password yang dimasukkan
            // atau indikator lain. Untuk form, kita simpan password yang dimasukkan user.
            // setcookie('password_remember', $password, $cookie_expiration, "/"); 
            // Namun, lebih aman menyimpan HANYA email dan membiarkan user mengetik password.
            // Untuk mematuhi permintaan Anda, kita akan simpan password yang dimasukkan user.
            // **Peringatan: Menyimpan password (bahkan hash) di cookie adalah risiko keamanan.**
            // Untuk skenario mengisi ulang form, simpan saja yang paling diperlukan (email).
            // Tapi jika tetap ingin mengingat, simpan saja email.

            // Karena user meminta untuk mengingat password juga, kita bisa menyimpan email
            // dan mengandalkan fitur "autofill" browser.
            // Jika harus menggunakan cookie PHP untuk password, ini adalah implementasi:
            setcookie('password_remember', $password, $cookie_expiration, "/"); 

        } else {
            // Hapus cookie jika checkbox tidak dicentang (untuk kasus sebelumnya dicentang)
            setcookie('email_remember', "", time() - 3600, "/");
            setcookie('password_remember', "", time() - 3600, "/");
        }

        // Simpan session
        $_SESSION['ID']          = $user['id'];
        $_SESSION['NAME']        = $user['name'];
        $_SESSION['ROLE']        = $user['role'];
        $_SESSION['DIVISION']    = $user['division'];
        $_SESSION['PHONE_NUMBER'] = $user['phone_number'];
        $_SESSION['PROFILE_PICTURE'] = $user['profile_picture'];

        header("Location: beranda.php");
        exit;
    } else {
        // Jika login gagal, HAPUS cookie untuk mencegah pengisian otomatis yang salah
        setcookie('email_remember', "", time() - 3600, "/");
        setcookie('password_remember', "", time() - 3600, "/");
        echo "<script>alert('Email atau Password salah!');</script>";
    }
}
?>