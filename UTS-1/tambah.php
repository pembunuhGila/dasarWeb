<?php
// tambah.php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include 'config.php';

if (isset($_POST['submit'])) {
    $judul = trim($_POST['judul']);
    $artis = trim($_POST['artis']);
    $genre = trim($_POST['genre']);
    $deskripsi = trim($_POST['deskripsi']);

    // Validasi sederhana
    if ($judul === '' || $artis === '' || $genre === '') {
        $error = "Judul, artis, dan genre wajib diisi.";
    } else {
        // handle file upload
        $gambar_name = null;
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['gambar']['tmp_name'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file_tmp);
            finfo_close($finfo);

            $allowed = ['image/jpeg','image/png','image/webp'];
            if (!in_array($mime, $allowed)) {
                $error = "Jenis file tidak diterima. Hanya JPG/PNG/WEBP.";
            } else {
                // buat nama unik
                $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
                $gambar_name = time() . "_" . bin2hex(random_bytes(6)) . "." . $ext;
                $dest = __DIR__ . "/uploads/" . $gambar_name;
                if (!move_uploaded_file($file_tmp, $dest)) {
                    $error = "Gagal menyimpan gambar.";
                }
            }
        }

        if (empty($error)) {
            pg_query_params($conn, "INSERT INTO lagu (judul,artis,genre,deskripsi,gambar) VALUES ($1,$2,$3,$4,$5)", [
                $judul, $artis, $genre, $deskripsi, $gambar_name
            ]);
            header("Location: daftar.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Lagu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container py-4">
  <h3>Tambah Lagu Baru</h3>
  <?php if (!empty($error)): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <form method="post" enctype="multipart/form-data" class="bg-white p-4 shadow-sm">
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Artis</label>
      <input name="artis" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Genre</label>
      <select name="genre" class="form-select" required>
        <option value="">-- Pilih Genre --</option>
        <option>Khusus</option><option>Jazz</option><option>Pop</option><option>R&B</option><option>Indie</option><option>Rock</option><option>Dangdut</option><option>Hip-hop</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Gambar (JPG/PNG/WEBP)</label>
      <input type="file" name="gambar" class="form-control" accept="image/*">
    </div>
    <button class="btn btn-success" name="submit">Simpan</button>
    <a class="btn btn-secondary" href="daftar.php">Kembali</a>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
