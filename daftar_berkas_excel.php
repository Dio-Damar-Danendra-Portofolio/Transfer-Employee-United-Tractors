<?php
require "backend/user_session.php";

$kueri_excel = mysqli_query($koneksi, "SELECT excel_tables.*, users.name AS uploader FROM excel_tables JOIN users ON excel_tables.user_id = users.id;");
$row_excel = mysqli_fetch_all($kueri_excel, MYSQLI_ASSOC);

if (isset($_GET['id-hapus'])) {
  $id = $_GET['id-hapus'];
  mysqli_query($koneksi, "DELETE FROM excel_data WHERE file_id = $id");
  mysqli_query($koneksi, "DELETE FROM excel_tables WHERE id = $id");
  header("Location: daftar_berkas_excel.php?hapus=berhasil");
}
?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>

<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="py-4" style="background-color: #ffbb00ff;">
  <div class="container">
    <h1 class="text-dark mb-4 text-center text-md-start">Daftar Berkas Excel</h1>
    <div class="row">
      <div class="col-12 text-dark">
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th>No.</th>
                <th>Nama <i>File</i></th>
                <th>Pengunggah</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0;
              foreach ($row_excel as $e) { ?>
                <tr>
                  <td><?= ++$i; ?></td>
                  <td class="text-break"><?= $e['name']; ?></td>
                  <td><?= $e['uploader']; ?></td>
                  <td>
                    <div class="btn-group d-flex flex-wrap justify-content-center gap-1">
                      <button
                        class="btn btn-primary btn-sm view-btn"
                        data-id="<?= $e['id']; ?>"
                        data-bs-toggle="modal"
                        data-bs-target="#dataModal"
                        title="Lihat isi berkas">
                        <i class="bi bi-eye"></i>
                      </button>
                      <button
                        class="btn btn-success btn-sm pdf-btn"
                        data-id="<?= $e['id']; ?>"
                        title="Unduh PDF">
                        <i class="bi bi-file-pdf"></i>
                      </button>
                      <a
                        href="daftar_berkas_excel.php?id-hapus=<?= $e['id']; ?>"
                        class="btn btn-danger btn-sm"
                        title="Hapus berkas"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <i class="bi bi-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

  <!-- Footer -->
  <?php include "include/footer.php"; ?>
  <!-- Modal -->
  <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-md-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dataModalLabel">Isi Berkas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div id="table-container" class="table-responsive">
            <p class="text-center">Memuat data...</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include jsPDF and AutoTable libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.3/jspdf.plugin.autotable.min.js"></script>
  <script>
    // Handle View Button
    document.querySelectorAll(".view-btn").forEach(btn => {
      btn.addEventListener("click", function() {
        let fileId = this.dataset.id;
        document.getElementById("table-container").innerHTML = "<p class='text-center'>Memuat data...</p>";

        fetch("backend/get_excel_json.php?id=" + fileId)
          .then(response => {
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
            return response.json();
          })
          .then(data => {
            console.log("View data:", data);
            if (!Array.isArray(data) || data.length === 0) {
              document.getElementById("table-container").innerHTML = "<p class='text-center text-danger'>Tidak ada data!</p>";
              return;
            }

            let table = "<div class='table-responsive'>";
            table += "<table class='table table-bordered text-center table-striped table-hover align-middle'>";
            table += "<thead class='table-dark'><tr>";
            // Use first row's values as headers
            Object.values(data[0]).forEach(value => {
              table += `<th>${value}</th>`;
            });
            table += `<th>Tindakan</th>`;
            table += "</tr></thead><tbody>";

            // Start from second row to skip header row
            data.slice(1).forEach(row => {
              table += "<tr>";
              Object.values(row).forEach(val => {
                table += `<td>${val}</td>`;
              });
              table += `<td>
                    <button class="btn btn-success btn-sm pdf-row-btn" data-row='${JSON.stringify(row)}'><i class="bi bi-file-pdf"></i></button>
                    </td>`;
              table += "</tr>";
            });

            table += "</tbody></table>";
            table += "</div>";
            document.getElementById("table-container").innerHTML = table;
          })
          .catch(err => {
            console.error("View error:", err);
            document.getElementById("table-container").innerHTML = "<p class='text-center text-danger'>Gagal memuat data!</p>";
          });
      });
    });

    // Handle PDF Download Button (full file)
    document.querySelectorAll(".pdf-btn").forEach(btn => {
      btn.addEventListener("click", function() {
        let fileId = this.dataset.id;
        console.log("Generating PDF for fileId:", fileId);

        fetch("backend/get_excel_json.php?id=" + fileId)
          .then(response => {
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
            return response.json();
          })
          .then(data => {
            console.log("PDF data:", data);
            if (!Array.isArray(data) || data.length === 0) {
              alert("Tidak ada data untuk diunduh sebagai PDF!");
              return;
            }

            try {
              const {
                jsPDF
              } = window.jspdf;
              if (!jsPDF) throw new Error("jsPDF not loaded");

              // Create new jsPDF instance
              const doc = new jsPDF();

              // Check if autoTable is available
              if (!doc.autoTable) {
                throw new Error("jsPDF-AutoTable plugin not loaded");
              }

              doc.setFontSize(16);
              doc.text("Data Karyawan Transfer", 14, 20);

              // Use first row's values as headers
              const headers = Object.values(data[0]);
              // Use subsequent rows' values, excluding the first row
              const rows = data.slice(1).map(row => Object.values(row));

              // Generate table using autoTable
              doc.autoTable({
                head: [headers],
                body: rows,
                startY: 30,
                theme: 'striped',
                headStyles: {
                  fillColor: [50, 50, 50]
                },
                styles: {
                  fontSize: 8,
                  cellPadding: 2
                }
              });

              doc.save(`berkas_excel_${fileId}.pdf`);
            } catch (e) {
              console.error("PDF generation error:", e);
              alert("Gagal membuat PDF: " + e.message);
            }
          })
          .catch(err => {
            console.error("Fetch error for PDF:", err);
            alert("Gagal memuat data untuk PDF: " + err.message);
          });
      });
    });

    // Handle PDF Row Button (in modal, per row)
    document.addEventListener("click", function(e) {
      const button = e.target.closest(".pdf-row-btn");
      if (button) {
        const row = JSON.parse(button.dataset.row);

        const {
          jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(12);
        doc.text("Karyawan berikut:", 20, 30);
        doc.text("Nama          : " + (row.column1 || ''), 20, 40);
        doc.text("Divisi Asal   : " + (row.column2 || ''), 20, 50);
        doc.text("Akan dirotasi ke:", 20, 65);
        doc.text("Divisi Tujuan : " + (row.column3 || ''), 20, 75);

        doc.save(`karyawan_${row.column1 || 'unknown'}.pdf`);
      }
    });
  </script>
</body>

</html>