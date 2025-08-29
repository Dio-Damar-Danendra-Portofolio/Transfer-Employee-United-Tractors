<?php
require "../koneksi.php"; // koneksi ke database
require "vendor/autoload.php"; // PHPSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($koneksi, "SELECT excel_data.*, excel_table.name AS table_name FROM excel_data JOIN excel_tables ON excel_data.table_id = excel_tables.id WHERE excel_tables.id=$id");
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        $filePath = "uploads/" . $row['name']; // pastikan path sesuai

        if (file_exists($filePath)) {
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            echo json_encode([
                "status" => "success",
                "data" => $data
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "File tidak ditemukan!"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Data tidak ada"]);
    }
}
?>