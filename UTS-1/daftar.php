<?php
// daftar.php
include 'auth.php';
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Lagu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Lagu</h3>
    <div>
      <a href="tambah.php" class="btn btn-success">+ Tambah Lagu</a>
      <a href="dashboard.php" class="btn btn-secondary">Dashboard</a>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle text-center">
      <thead class="table-dark">
        <tr><th>No</th><th>Gambar</th><th>Judul</th><th>Artis</th><th>Genre</th><th>Deskripsi</th><th>Aksi</th></tr>
      </thead>
      <tbody>
      <?php
      $res = pg_query($conn, "SELECT * FROM lagu ORDER BY id ASC");
      $no = 1;
      if ($res && pg_num_rows($res)>0) {
          while ($r = pg_fetch_assoc($res)) {
              $img = !empty($r['gambar']) ? "uploads/".htmlspecialchars($r['gambar']) : "";
              $imgTag = $img ? "<img src='{$img}' style='width:80px;height:80px;object-fit:cover;border-radius:8px;'>" : "";
              echo "<tr>
                      <td>{$no}</td>
                      <td>{$imgTag}</td>
                      <td>".htmlspecialchars($r['judul'])."</td>
                      <td>".htmlspecialchars($r['artis'])."</td>
                      <td>".htmlspecialchars($r['genre'])."</td>
                      <td style='max-width:260px;'>".htmlspecialchars($r['deskripsi'])."</td>
                      <td>
                        <a href='edit.php?id=".intval($r['id'])."' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus.php?id=".intval($r['id'])."' onclick='return confirm(\"Hapus lagu ini?\")' class='btn btn-danger btn-sm'>Hapus</a>
                      </td>
                    </tr>";
              $no++;
          }
      } else {
          echo "<tr><td colspan='7'>Belum ada data lagu.</td></tr>";
      }
      ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
