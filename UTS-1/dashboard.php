<?php
include 'auth.php';
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container py-5">
  <div class="row">
    <div class="col-md-8">
      <h2>Selamat datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
      <p class="lead">Gunakan menu untuk mengelola lagu, melihat genre, dan lain-lain.</p>

      <div class="row mt-4">
        <div class="col-sm-6 mb-3">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Total Lagu</h5>
              <?php
                $c = pg_fetch_result(pg_query($conn, "SELECT COUNT(*) FROM lagu"), 0, 0);
                echo "<p class='display-6'>{$c}</p>";
              ?>
              <a href="daftar.php" class="btn btn-primary">Kelola Lagu</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-sm-6 mb-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="tambah.php">+ Tambah Lagu</a></li>
            <li><a href="daftar.php">Daftar Lagu</a></li>
            <li><a href="index.php">Lihat situs</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
