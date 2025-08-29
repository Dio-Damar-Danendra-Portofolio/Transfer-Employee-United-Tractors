<?php
require "user_session.php";

// Set header untuk JSON response
header('Content-Type: application/json');

// Periksa apakah parameter id ada
if (!isset($_GET['id']) || empty($_GET['id'])) {
    error_log("No ID provided");
    echo json_encode([]);
    exit;
}

// Sanitasi input id
$file_id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Query untuk mengambil row_json dari excel_data berdasarkan file_id
$kueri = mysqli_query($koneksi, "SELECT row_json FROM excel_data WHERE file_id = '$file_id'");
if (!$kueri) {
    error_log("Query failed: " . mysqli_error($koneksi));
    echo json_encode([]);
    exit;
}

// Inisialisasi array untuk menyimpan data
$data = [];

// Ambil dan parse setiap row_json
while ($row = mysqli_fetch_assoc($kueri)) {
    $json_data = json_decode($row['row_json'], true);
    if ($json_data !== null) {
        $data[] = $json_data;
    } else {
        error_log("Failed to parse row_json: " . $row['row_json']);
    }
}

// Jika tidak ada data, kembalikan array kosong
if (empty($data)) {
    echo json_encode([]);
} else {
    echo json_encode($data);
}

// Tutup koneksi (opsional, tergantung konfigurasi di user_session.php)
mysqli_close($koneksi);
