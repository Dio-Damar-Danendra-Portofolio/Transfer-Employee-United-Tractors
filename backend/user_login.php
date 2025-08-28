<?php 
require __DIR__ . "/koneksi.php"; // koneksi MySQL

if(isset($_POST['login'])) {
    session_start(); // selalu taruh di atas sebelum session dipakai

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $kueri_masuk_pengguna = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' AND password = '$password';");

    if (mysqli_num_rows($kueri_masuk_pengguna) > 0) {
        $row_pengguna = mysqli_fetch_assoc($kueri_masuk_pengguna);

        // simpan data ke session
        $_SESSION['ID'] = $row_pengguna['id']; // tambahkan ini
        $_SESSION['NAME'] = $row_pengguna['name'];
        $_SESSION['ROLE'] = $row_pengguna['role'];
        $_SESSION['PROFILE_PICTURE'] = $row_pengguna['profile_picture'];
        $_SESSION['PHONE_NUMBER'] = $row_pengguna['phone_number'];
        $_SESSION['DIVISION'] = $row_pengguna['division'];

        // fitur remember me
        if (isset($_POST['remember'])) {
            setcookie('email', $email, time() + (366 * 24 * 60 * 60), "/");
            setcookie('password', $password, time() + (366 * 24 * 60 * 60), "/");
        }

        header("Location: beranda.php");
        exit;
    } else {
        header("Location: login.php?login_status=error");
        exit;
    }
}
?>