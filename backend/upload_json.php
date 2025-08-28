<?php
session_start();
require "koneksi.php"; // MySQL connection

// Check if user is logged in
if (!isset($_SESSION['ID'])) {
    echo "Error: User not logged in.";
    exit;
}

// Check if required POST data is present
if (!isset($_POST['data']) || !isset($_POST['file_name'])) {
    echo "Error: Missing data or file name.";
    exit;
}

$jsonData = $_POST['data'];
$fileName = basename($_POST['file_name']); // Sanitize file name
$userId = $_SESSION['ID'];

// Decode JSON data
$dataArray = json_decode($jsonData, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error: Invalid JSON data.";
    exit;
}

try {
    // Start transaction to ensure data consistency
    $koneksi->begin_transaction();

    // 1️⃣ Insert file metadata into excel_tables
    $stmt = $koneksi->prepare("INSERT INTO excel_tables (name, user_id) VALUES (?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $koneksi->error);
    }
    $stmt->bind_param("si", $fileName, $userId);
    if (!$stmt->execute()) {
        throw new Exception("Failed to insert file metadata: " . $stmt->error);
    }
    $fileId = $koneksi->insert_id; // Get the inserted file ID
    $stmt->close();

    // 2️⃣ Insert each row into excel_data
    $stmt2 = $koneksi->prepare("INSERT INTO excel_data (file_id, row_json) VALUES (?, ?)");
    if (!$stmt2) {
        throw new Exception("Prepare failed: " . $koneksi->error);
    }
    foreach ($dataArray as $row) {
        $rowJson = json_encode($row);
        $stmt2->bind_param("is", $fileId, $rowJson);
        if (!$stmt2->execute()) {
            throw new Exception("Failed to insert row data: " . $stmt2->error);
        }
    }
    $stmt2->close();

    // Commit transaction
    $koneksi->commit();
    echo "✅ Data berhasil disimpan ke database!";
} catch (Exception $e) {
    // Rollback transaction on error
    $koneksi->rollback();
    echo "Error: " . $e->getMessage();
}

// Close connection
$koneksi->close();
