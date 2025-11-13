<?php
// edit.php
include 'auth.php';
include 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header("Location: daftar.php");
    exit;
}

$fetch = pg_query_params($conn, "SELECT * FROM lagu WHERE id=$1", [$id]);
$data = pg_fetch_assoc($fetch);
if (!$data) {
    header("Location: daftar.php");
    exit;
}

if (isset($_POST['update'])) {
    $judul = trim($_POST['judul']);
    $artis = trim($_POST['artis']);
    $genre = trim($_POST['genre']);
    $deskripsi = trim($_POST['deskripsi']);

    if ($judul === '' || $artis === '' || $genre === '') {
        $error = "Judul, artis, dan genre wajib diisi.";
    } else {
        $gambar_name = $data['gambar']; // default
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['gambar']['tmp_name'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file_tmp);
            finfo_close($finfo);
            $allowed = ['image/jpeg','image/png','image/webp'];
            if (!in_array($mime, $allowed)) {
                $error = "Jenis file tidak diterima. Hanya JPG/PNG/WEBP.";
            } else {
                $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
                $gambar_name = time() . "_" . bin2hex(random_bytes(6)) . "." . $ext;
                $dest = __DIR__ . "/uploads/" . $gambar_name;
                if (!move_uploaded_file($file_tmp, $dest)) {
                    $error = "Gagal menyimpan gambar.";
                } else {
                    // hapus file lama bila ada
                    if (!empty($data['gambar']) && file_exists(__DIR__ . "/uploads/" . $data['gambar'])) {
                        @unlink(__DIR__ . "/uploads/" . $data['gambar']);
                    }
                }
            }
        }

        if (empty($error)) {
            pg_query_params($conn, "UPDATE lagu SET judul=$1, artis=$2, genre=$3, deskripsi=$4, gambar=$5 WHERE id=$6",
                [$judul, $artis, $genre, $deskripsi, $gambar_name, $id]);
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
  <title>Edit Lagu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container py-4">
  <h3>Edit Lagu</h3>
  <?php if (!empty($error)): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <form method="post" enctype="multipart/form-data" class="bg-white p-4 shadow-sm">
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Artis</label>
      <input name="artis" class="form-control" value="<?= htmlspecialchars($data['artis']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Genre</label>
      <select name="genre" class="form-select" required>
        <?php
        $genres = ["Khusus","Jazz","Pop","R&B","Indie","Rock","Dangdut","Hip-hop"];
        foreach ($genres as $g) {
            $sel = ($g == $data['genre']) ? 'selected' : '';
            echo "<option value=\"".htmlspecialchars($g)."\" $sel>".htmlspecialchars($g)."</option>";
        }
        ?>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Gambar (opsional)</label><br>
      <?php if (!empty($data['gambar'])): ?>
        <img src="uploads/<?= htmlspecialchars($data['gambar']) ?>" width="120" class="rounded mb-2"><br>
      <?php endif; ?>
      <input type="file" name="gambar" class="form-control" accept="image/*">
    </div>
    <button class="btn btn-success" name="update">Update</button>
    <a class="btn btn-secondary" href="daftar.php">Kembali</a>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
