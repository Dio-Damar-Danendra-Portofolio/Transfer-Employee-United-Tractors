<?php 
  require "backend/user_session.php"; 
?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>
<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="d-flex justify-content-center align-items-center min-vh-100" style="background-color: #ffbb00ff;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card shadow-lg">
            <div class="card-header bg-dark text-white text-center">
              <h3>Konversi Excel menjadi PDF</h3>
            </div>
            <div class="card-body">
              <form id="excelForm" action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label fw-bold text-dark">
                    Masukkan file Excel untuk dikonversi menjadi PDF (satu kolom)!
                  </label>
                  <input id="excelFile" class="form-control" type="file" accept=".xlsx,.xls,.csv" required>
                </div>
                <div class="d-grid">
                  <button type="submit" id="processBtn" class="btn btn-primary">
                    Unggah (<i>Upload</i>)
                  </button>
                </div>
              </form>
              <div id="status" class="mt-3 text-center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main> 

  <!-- Footer -->
  <?php include "include/footer.php"; ?>

  <!-- Script Excel to JSON -->
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
        const workbook = XLSX.read(data, { type: 'array' });
        const firstSheet = workbook.SheetNames[0];
        const rows = XLSX.utils.sheet_to_json(workbook.Sheets[firstSheet], { header: 1 });

        // Convert rows to JSON format (max 3 kolom)
        const jsonData = rows.map(row => ({
          column1: row[0] ?? '',
          column2: row[1] ?? '',
          column3: row[2] ?? ''
        }));

        // Kirim ke backend
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
          error: function(xhr) {
            $("#status").html("Error: " + xhr.responseText);
          }
        });
      };
      reader.readAsArrayBuffer(file);
    });
  </script>
</body>
</html>
