<?php
require "backend/user_session.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>

<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="d-flex vh-100 justify-content-center align-items-center" style="background-color: #ffbb00ff;">
    <div class="container text-center">
      <h1 class="mb-4">Konversi Excel menjadi PDF</h1>
      <form id="excelForm" action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center gap-3">
        <label class="form-label text-dark">Masukkan file Excel untuk dikonversi menjadi PDF (satu kolom)!</label>
        <div class="search-box">
          <input id="excelFile" class="form-input" type="file" accept=".xlsx,.xls,.csv" required>
          <button type="submit" id="processBtn">Unggah (<i>Upload</i>)</button>
        </div>
      </form>

      <div id="status" class="mt-3"></div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        document.getElementById('excelForm').addEventListener('submit', function(e) {
          e.preventDefault();

          const fileInput = document.getElementById('excelFile');
          const file = fileInput.files[0];
          if (!file) {
            alert("Pilih file Excel terlebih dahulu!");
            return;
          }

          const reader = new FileReader();
          reader.onload = function(event) {
            const data = new Uint8Array(event.target.result);
            const workbook = XLSX.read(data, {
              type: 'array'
            });
            const firstSheet = workbook.SheetNames[0];
            const rows = XLSX.utils.sheet_to_json(workbook.Sheets[firstSheet], {
              header: 1
            });

            // Convert rows to JSON format with up to 3 columns
            const jsonData = rows.map(row => ({
              column1: row[0] ?? '',
              column2: row[1] ?? '',
              column3: row[2] ?? ''
            }));

            // Send JSON to PHP backend
            $.ajax({
              url: "backend/upload_json.php",
              type: "POST",
              data: {
                data: JSON.stringify(jsonData),
                file_name: file.name
              },
              success: function(res) {
                $("#status").html(res);
              },
              error: function(xhr, status, error) {
                $("#status").html("Error: " + xhr.responseText);
              }
            });
          };
          reader.readAsArrayBuffer(file);
        });
      </script>
    </div>
  </main>

  <!-- Footer -->
  <?php include "include/footer.php"; ?>
</body>


</html>