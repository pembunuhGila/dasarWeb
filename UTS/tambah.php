<?php
include 'config.php';

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $artis = $_POST['artis'];
    $genre = $_POST['genre'];
    $deskripsi = $_POST['deskripsi'];

    // Mencegah SQL Injection Dasar
    $judul_safe = pg_escape_string($conn, $judul);
    $artis_safe = pg_escape_string($conn, $artis);
    $genre_safe = pg_escape_string($conn, $genre);
    $deskripsi_safe = pg_escape_string($conn, $deskripsi);


    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if (!is_dir('uploads')) mkdir('uploads');

    if ($gambar != "") {
        // Ganti nama file untuk menghindari overwrite
        $extension = pathinfo($gambar, PATHINFO_EXTENSION);
        $new_gambar_name = uniqid('img_', true) . '.' . $extension;
        move_uploaded_file($tmp, "uploads/" . $new_gambar_name);
    } else {
        $new_gambar_name = ''; // Jika tidak ada gambar, simpan string kosong
    }

    $query = "INSERT INTO lagu (judul, artis, genre, deskripsi, gambar)
              VALUES ('$judul_safe', '$artis_safe', '$genre_safe', '$deskripsi_safe', '$new_gambar_name')";
    pg_query($conn, $query);
    header("Location: daftar.php"); // DIUBAH: Mengarah ke daftar.php
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Lagu Baru</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="theme-index">
  <div class="container">
    <header>
      <h1>Tambah Lagu Baru</h1>
      <p class="subtitle">Masukkan data lagu ke dalam database</p>
      <hr class="header-divider">
    </header>

    <form method="post" enctype="multipart/form-data" class="form-box">
      <label>Judul:</label>
      <input type="text" name="judul" required>

      <label>Artis:</label>
      <input type="text" name="artis" required>

      <label>Genre:</label>
      <select name="genre" required>
        <option value="">-- Pilih Genre --</option>
        <option value="pop">Pop</option>
        <option value="jazz">Jazz</option>
        <option value="rock">Rock</option>
        <option value="indie">Indie</option>
        <option value="rnb">R&B & Soul</option>
        <option value="khusus">Lagu Khusus</option>
      </select>

      <label>Deskripsi:</label>
      <textarea name="deskripsi" required></textarea>

      <label>Upload Gambar:</label>
      <input type="file" name="gambar" accept="image/*">

      <button type="submit" name="simpan">Simpan</button>
    </form>

    <div style="text-align:center; margin-top:40px;">
      <a href="index.php" class="back-link">← Kembali ke Halaman Utama</a>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>