<?php
include 'config.php';
$genre = isset($_GET['genre']) ? strtolower($_GET['genre']) : 'indie';

$judulHalaman = strtoupper($genre);
// Mencegah SQL Injection Dasar
$genre_safe = pg_escape_string($conn, $genre);

$query = "SELECT * FROM lagu WHERE LOWER(genre) = '$genre_safe'";
$result = pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($judulHalaman) ?> - Rekomendasi Musik</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="theme-<?= htmlspecialchars($genre) ?>">
  <div class="container">
    <header>
      <h1><?= htmlspecialchars($judulHalaman) ?></h1>
      <p class="subtitle">Playlist genre <?= htmlspecialchars($genre) ?></p>
      <hr class="header-divider">
    </header>

    <div class="music-grid">
      <?php
      if ($result && pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
          $gambarPath = !empty($row['gambar']) ? "uploads/" . htmlspecialchars($row['gambar']) : "img/default.jpg";
          echo "
            <div class='music-card'>
              <div class='card-image'><img src='$gambarPath' alt='".htmlspecialchars($row['judul'])."'></div>
              <div class='card-content'>
                <div class='band-name'>".htmlspecialchars($row['artis'])."</div>
                <div class='song-name'>".htmlspecialchars($row['judul'])."</div>
                <div class='description'>".htmlspecialchars($row['deskripsi'])."</div>
              </div>
            </div>";
        }
      } else {
        echo "<p style='text-align:center; margin-top:50px;'>Belum ada lagu di genre ini.</p>";
      }
      ?>
    </div>

    <div style="text-align:center; margin-top:80px;">
      <a href="index.php" class="back-link">Kembali ke Halaman Utama</a>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>