<?php 
  require "backend/user_session.php";

  $kueri_excel = mysqli_query($koneksi, "SELECT excel_tables.*, users.name AS uploader FROM excel_tables JOIN users ON excel_tables.user_id = users.id;");
  $row_excel = mysqli_fetch_all($kueri_excel, MYSQLI_ASSOC);

  if(isset($_GET['id-hapus'])){
    $id = $_GET['id-hapus'];
    $hapus = mysqli_query($koneksi, "DELETE FROM excel_tables WHERE id = '$id';");
    header("Location: daftar_berkas_excel.php?hapus=sukses");
  }

?>
<!DOCTYPE html>
<html lang="id-ID">
<?php include "include/head.php"; ?>
<body>
  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Hero Section -->
  <main class="d-flex justify-content-start align-items-start py-4" style="background-color: #ffbb00ff;">
    <div class="container-fluid me-4"> <!-- ganti container jadi container-fluid agar rata kiri -->
      <h1 class="text-dark">Daftar Berkas Excel</h1>
      <div class="row me-3">
        <div class="col-12 text-dark">
          <table class="table table-striped text-center">
            <tr>
              <th>No. </th>
              <th>Nama <i>File</i> (Berkas)</th>
              <th>Nama Pengunggah</th>
              <th>Tindakan</th>
            </tr>
              <?php $i = 0; 
                foreach ($row_excel as $e) { ?>
              <tr>
                  <td><?= ++$i; ?></td>
                  <td><?= $e['name']; ?></td>
                  <td><?= $e['uploader']; ?></td>
                  <td>
                    <button 
                      class="btn btn-primary btn-sm view-btn" 
                      data-id="<?= $e['id']; ?>" 
                      data-bs-toggle="modal" 
                      data-bs-target="#dataModal" title="Lihat isi berkas">
                      <i class="bi bi-eye"></i>
                    </button>
                    <a 
                      href="daftar_berkas_excel.php/?id-hapus=<?= $e['id']; ?>"
                      class="btn btn-danger btn-sm view-btn" 
                      title="Hapus berkas">
                      <i class="bi bi-trash"></i>
                    </a>
                  </td>
              </tr>
              <?php  } ?>
          </table>
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
<script>
  // Buat tabel dari JSON
let table = "<div class='table-responsive'>";
table += "<table class='table table-bordered table-striped table-hover align-middle'>";
table += "<thead class='table-dark'><tr>";
Object.keys(data[0]).forEach(key => {
  table += `<th>${key}</th>`;
});
table += "</tr></thead><tbody>";

data.forEach(row => {
  table += "<tr>";
  Object.values(row).forEach(val => {
    table += `<td>${val}</td>`;
  });
  table += "</tr>";
});

table += "</tbody></table>";
table += "</div>"; // tutup table-responsive
</script>
</body>
</html>
