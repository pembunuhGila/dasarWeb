<?php
// index.php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Rekomendasi Musik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container py-5">
  <header class="text-center mb-4">
    <h1 class="display-6">REKOMENDASI MUSIK</h1>
    <p class="lead">Temukan musik favoritmu berdasarkan genre</p>
    <hr class="header-divider">
  </header>

  <!-- Hapus bagian lagu populer agar tidak langsung tampil -->
  <section class="featured-section mb-5 text-center">
    <h3 class="mb-4">Pilih Genre untuk Melihat Lagu</h3>
    <div class="row mt-3">
      <?php
      $genres = ['Khusus','Jazz','Pop','R&B','Indie','Rock','Dangdut','Hip-hop'];
      foreach ($genres as $g) {
          $gurl = urlencode(strtolower($g));
          echo "<div class='col-6 col-md-3 mb-3'>
                  <a class='btn btn-outline-primary w-100 py-3' href='genre.php?genre={$gurl}'>
                    <strong>".htmlspecialchars($g)."</strong>
                  </a>
                </div>";
      }
      ?>
    </div>
  </section>

  <div class="text-center mt-4">
    <a href="daftar.php" class="btn btn-success">Kelola Daftar Lagu</a>
  </div>
</div>

<div style="height: 90px;"></div>
<?php include 'footer.php'; ?>

</body>
</html>
