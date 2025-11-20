<?php
// user/dashboard.php
require_once __DIR__.'/../conn.php';
session_start();
if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Dashboard - <?= htmlspecialchars($user['username']) ?></title>
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__.'/../navbar.php'; ?>

<div style="max-width:1000px;margin:100px auto;padding:20px">
  <h2>Dashboard</h2>
  <p>Selamat datang, <strong><?= htmlspecialchars($user['nama_lengkap'] ?? $user['username']) ?></strong> — Role: <strong><?= htmlspecialchars($user['role']) ?></strong></p>

  <?php if ($user['role'] === 'admin'): ?>
    <section>
      <h3>Admin Controls</h3>
      <ul>
        <li><a href="../admin/slider/index.php">Kelola Slider</a></li>
        <li><a href="../admin/galeri/index.php">Kelola Galeri</a></li>
        <li><a href="../admin/publikasi/index.php">Kelola Publikasi</a></li>
        <li><a href="../admin/kategori/index.php">Kelola Kategori & Konten</a></li>
        <li><a href="../admin/footer/index.php">Edit Footer</a></li>
        <li><a href="../admin/navbar/index.php">Edit Navbar</a></li>
      </ul>
    </section>
  <?php else: ?>
    <section>
      <h3>Operator Controls</h3>
      <ul>
        <li><a href="../operator/slider/index.php">Ajukan Slider (Pending)</a></li>
        <li><a href="../operator/galeri/index.php">Tambah/Edit Galeri</a></li>
        <li><a href="../operator/publikasi/index.php">Ajukan Publikasi (Pending)</a></li>
      </ul>
      <p>Catatan: Perubahan operator akan memerlukan approval admin (implementasi table status/pending ada di publikasi).</p>
    </section>
  <?php endif; ?>
</div>

<?php include __DIR__.'/../footer.php'; ?>
</body>
</html>
