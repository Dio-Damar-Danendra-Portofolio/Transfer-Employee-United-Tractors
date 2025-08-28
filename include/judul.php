<?php 
    $laman = basename($_SERVER['PHP_SELF']);

    $judul = "United Tractors Transfer Employee";
    
    switch ($laman) {
        case 'index.php':
            $judul = "Selamat Datang di United Tractors Transfer Employee";
            break;

        case 'unggah_excel.php':
            $judul = "Unggah File Excel - United Tractors Transfer Employee";
        break;

        case 'tentang_situs.php':
            $judul = "Tentang Situs - United Tractors Transfer Employee";
        break;

        case 'profil_pengguna.php':
            $judul = "Profil Pengguna - United Tractors Transfer Employee";
        break;
        
        case 'edit_profil.php':
            $judul = "Edit (Sunting) Profil Pengguna - United Tractors Transfer Employee";
        break;

        case 'beranda.php':
            $judul = "Beranda - United Tractors Transfer Employee";
        break;

        case 'login.php':
            $judul = "Log in - United Tractors Transfer Employee";
        break;

        case 'sign_up.php':
            $judul = "Sign Up - United Tractors Transfer Employee";
        break;
        
        case 'daftar_berkas_excel.php':
            $judul = "Daftar Berkas Excel - United Tractors Transfer Employee";
        break;

        default:
            $judul = ucfirst($laman);
            break;
    }

?>
    <title><?= $judul; ?></title>