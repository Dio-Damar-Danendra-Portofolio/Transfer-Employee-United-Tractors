<?php 
require __DIR__ . "/koneksi.php"; // koneksi MySQL
  if(isset($_POST['daftar']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'];
        $role = $_POST['role'];
        $division = $_POST['division'];

        $kueri_daftar = mysqli_query($koneksi, "INSERT INTO users (name, email, password, phone_number, role, division) 
        VALUES ('$name', '$email', '$password', '$phone_number', '$role', '$division')");

        if(!$kueri_daftar){
            header("Location: index.php?daftar=error");
        }
        else{
            header("Location: index.php?daftar=berhasil");
        }
    }
?>