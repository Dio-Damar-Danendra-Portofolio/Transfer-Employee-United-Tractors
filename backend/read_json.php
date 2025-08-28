<?php
session_start();
require __DIR__. "koneksi.php"; // koneksi MySQL

if(isset($_POST['data']) && isset($_POST['file_name'])){
    $jsonData = $_POST['data'];
    $fileName = $_POST['file_name'];
    $userId = $_SESSION['ID'] ?? 1; // ambil dari session user

    // 1️⃣ Masukkan metadata file ke excel_tables
    $stmt = $koneksi->prepare("INSERT INTO excel_tables (name, user_id) VALUES (?, ?)");
    $stmt->bind_param("si", $fileName, $userId);
    $stmt->execute();
    $fileId = $stmt->insert_id;

    // 2️⃣ Masukkan data Excel ke excel_data
    $dataArray = json_decode($jsonData, true);
    $stmt2 = $koneksi->prepare("INSERT INTO excel_data (file_id, row_json) VALUES (?, ?)");
    foreach($dataArray as $row){
        $rowJson = json_encode($row);
        $stmt2->bind_param("is", $fileId, $rowJson);
        $stmt2->execute();
    }

    echo "✅ Data berhasil disimpan ke database!";
}
