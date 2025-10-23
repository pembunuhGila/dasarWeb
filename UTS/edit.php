<?php
include 'config.php';
$id = $_GET['id'];
$q = pg_query($conn, "SELECT * FROM lagu WHERE id=$id");
$data = pg_fetch_assoc($q);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $artis = $_POST['artis'];
    $genre = $_POST['genre'];
    $deskripsi = $_POST['deskripsi'];

    // Mencegah SQL Injection Dasar
    $judul_safe = pg_escape_string($conn, $judul);
    $artis_safe = pg_escape_string($conn, $artis);
    $genre_safe = pg_escape_string($conn, $genre);
    $deskripsi_safe = pg_escape_string($conn, $deskripsi);
    
    $gambar_field = "";
    
    // Logic Ganti Gambar
    $gambar_baru = $_FILES['gambar']['name'];
    if (!empty($gambar_baru)) {
        $gambar_lama = $data['gambar'];
        $tmp = $_FILES['gambar']['tmp_name'];
        if (!is_dir('uploads')) mkdir('uploads');
        
        // 1. Hapus gambar lama (disarankan)
        if (!empty($gambar_lama) && file_exists("uploads/" . $gambar_lama)) {
            unlink("uploads/" . $gambar_lama);
        }
        
        // 2. Unggah gambar baru dengan nama unik
        $extension = pathinfo($gambar_baru, PATHINFO_EXTENSION);
        $new_gambar_name = uniqid('img_', true) . '.' . $extension;
        move_uploaded_file($tmp, "uploads/" . $new_gambar_name);

        $gambar_field = ", gambar='$new_gambar_name'";
    }

    // Gabungkan query UPDATE
    $query = "UPDATE lagu SET 
                judul='$judul_safe', 
                artis='$artis_safe', 
                genre='$genre_safe', 
                deskripsi='$deskripsi_safe'
                {$gambar_field}  
              WHERE id=$id";
              
    pg_query($conn, $query);
    header("Location: daftar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Lagu</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="theme-<?php echo htmlspecialchars($data['genre']); ?>">
  <div class="container">
    <header>
      <h1>Edit Lagu</h1>
      <p class="subtitle">Perbarui data lagu yang kamu pilih</p>
      <hr class="header-divider">
    </header>

    <form method="post" enctype="multipart/form-data" class="form-box">
      <label>Judul:</label>
      <input type="text" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" required>

      <label>Artis:</label>
      <input type="text" name="artis" value="<?php echo htmlspecialchars($data['artis']); ?>" required>

      <label>Genre:</label>
      <select name="genre" required>
        <option value="pop" <?php if($data['genre']=='pop') echo 'selected'; ?>>Pop</option>
        <option value="jazz" <?php if($data['genre']=='jazz') echo 'selected'; ?>>Jazz</option>
        <option value="rock" <?php if($data['genre']=='rock') echo 'selected'; ?>>Rock</option>
        <option value="indie" <?php if($data['genre']=='indie') echo 'selected'; ?>>Indie</option>
        <option value="rnb" <?php if($data['genre']=='rnb') echo 'selected'; ?>>R&B & Soul</option>
        <option value="khusus" <?php if($data['genre']=='khusus') echo 'selected'; ?>>Lagu Khusus</option>
      </select>

      <label>Deskripsi:</label>
      <textarea name="deskripsi" required><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
      
      <label>Gambar Saat Ini:</label>
      <?php if (!empty($data['gambar'])): ?>
          <img src='uploads/<?php echo htmlspecialchars($data['gambar']); ?>' style='width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; display: block;'>
      <?php else: ?>
          <p style='margin-bottom: 10px; opacity: 0.7;'>Tidak ada gambar saat ini.</p>
      <?php endif; ?>
      
      <label>Ganti Gambar (Opsional):</label>
      <input type="file" name="gambar" accept="image/*">

      <button type="submit" name="update">Update</button>
    </form>

    <div style="text-align:center; margin-top:40px;">
      <a href="daftar.php" class="back-link">← Kembali ke Daftar Lagu</a>
    </div>
  </div>
</body>
</html>