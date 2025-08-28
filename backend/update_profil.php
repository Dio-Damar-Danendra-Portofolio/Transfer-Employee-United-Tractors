<?php 
require __DIR__ . "/koneksi.php"; // koneksi MySQL
session_start();

$userId = $_SESSION['ID'];

// Ambil data user saat ini
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$userId'");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $division = $_POST['division'];
    $phone = $_POST['phone_number'];
    $role = $_POST['role'];

    // Upload foto profil jika ada
    $profilePicture = $user['profile_picture'];
    if (!empty($_FILES['profile_picture']['name'])) {
        $targetDir = "images/uploads/";
        $fileName = time() . "_" . basename($_FILES['profile_picture']['name']);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFile)) {
            $profilePicture = $fileName;
        }
    }

    // Update ke DB
    $update = mysqli_query($koneksi, "
        UPDATE users 
        SET name='$name', division='$division', phone_number='$phone', role='$role', profile_picture='$profilePicture' 
        WHERE id='$userId'
    ");

    if ($update) {
        $_SESSION['NAME'] = $name;
        $_SESSION['DIVISION'] = $division;
        $_SESSION['PHONE_NUMBER'] = $phone;
        $_SESSION['ROLE'] = $role;
        $_SESSION['PROFILE_PICTURE'] = $profilePicture;

        header("Location: profil_pengguna.php?status=success");
        exit;
    }
}
?>