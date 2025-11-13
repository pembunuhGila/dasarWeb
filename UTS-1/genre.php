<?php
// genre.php
session_start();
include 'config.php';

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Genre - <?= htmlspecialchars(ucfirst($genre)) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Genre: <?= htmlspecialchars(ucfirst($genre)) ?></h2>

  <div class="row">
    <?php
    $res = pg_query($conn, "SELECT * FROM lagu WHERE LOWER(genre) = LOWER('$genre')");
    if ($res && pg_num_rows($res) > 0) {
        while ($r = pg_fetch_assoc($res)) {
            $gambar = !empty($r['gambar']) ? "uploads/".htmlspecialchars($r['gambar']) : "img/default.jpg";
            echo "
            <div class='col-md-3 mb-4'>
              <div class='card shadow-sm'>
                <img src='{$gambar}' class='card-img-top' alt='".htmlspecialchars($r['judul'])."'>
                <div class='card-body'>
                  <h5 class='card-title'>".htmlspecialchars($r['judul'])."</h5>
                  <p class='card-text text-muted'>".htmlspecialchars($r['artis'])."</p>
                </div>
              </div>
            </div>";
        }
    } else {
        echo "<p class='text-center text-muted'>Belum ada lagu untuk genre ini.</p>";
    }
    ?>
  </div>

  <div class="text-center mt-4">
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </div>
</div>
<div style="height: 350px;"></div>
<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
