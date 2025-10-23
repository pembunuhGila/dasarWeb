<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lagu - Rekomendasi Musik</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-index">
<div class="container">
    <header>
        <h1>Daftar Lagu di Database</h1>
        <p class="subtitle">Kelola daftar lagu favoritmu di sini</p>
        <hr class="header-divider">
    </header>

    <a href="index.php" class="back-link">Kembali ke Rekomendasi Musik</a>
    <a href="tambah.php" class="btn-tambah">+ Tambah Lagu Baru</a> <div class="music-table">
        <table class="table-music">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Artis</th>
                <th>Genre</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $query = "SELECT * FROM lagu ORDER BY id ASC";
            $result = pg_query($conn, $query);
            $no = 1;

            if ($result && pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    // Pastikan output aman
                    $judul_html = htmlspecialchars($row['judul']);
                    $artis_html = htmlspecialchars($row['artis']);
                    $genre_html = htmlspecialchars($row['genre']);
                    $deskripsi_html = htmlspecialchars($row['deskripsi']);
                    $gambar_html = htmlspecialchars($row['gambar']);
                    
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td><img src='uploads/{$gambar_html}' class='thumb'></td>";
                    echo "<td>{$judul_html}</td>";
                    echo "<td>{$artis_html}</td>";
                    echo "<td>{$genre_html}</td>";
                    echo "<td>{$deskripsi_html}</td>";
                    echo "<td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> | <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Hapus lagu ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='7'>Belum ada lagu yang ditambahkan.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>