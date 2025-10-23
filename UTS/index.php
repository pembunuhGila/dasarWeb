<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rekomendasi Musik</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="theme-index">
  <div class="container">
    <header>
      <h1>REKOMENDASI MUSIK</h1>
      <p class="subtitle">Temukan musik favoritmu berdasarkan genre</p>
      <hr class="header-divider">
    </header>

    <div class="featured-section">
      <h2>Lagu Populer Untukmu</h2>
      <div class="music-grid">
        <a href="genre.php?genre=khusus" class="music-card featured-card">
          <div class="card-image"><img src="img/khusus.jpeg" alt="Lagu Khusus"></div>
          <div class="card-content">
            <div class="band-name">Lagu Khusus</div>
            <div class="song-name">Alexandra, Pink Matters, Just You</div>
            <div class="description">Playlist personal favorit Anda (Indie Pop, Pop Jazz, R&B).</div>
          </div>
        </a>
      </div>
    </div>

    <div class="featured-section">
      <h2>Jelajahi Semua Genre</h2>
      <div class="music-grid">
        <a href="genre.php?genre=jazz" class="music-card">
          <div class="card-image"><img src="img/jazz.jpeg" alt="Jazz"></div>
          <div class="card-content"><div class="band-name">JAZZ</div></div>
        </a>

        <a href="genre.php?genre=pop" class="music-card">
          <div class="card-image"><img src="img/pop.jpeg" alt="Pop"></div>
          <div class="card-content"><div class="band-name">POP</div></div>
        </a>

        <a href="genre.php?genre=rnb" class="music-card">
          <div class="card-image"><img src="img/rnb.jpeg" alt="R&B"></div>
          <div class="card-content"><div class="band-name">R&B</div></div>
        </a>

        <a href="genre.php?genre=indie" class="music-card">
          <div class="card-image"><img src="img/indie.jpeg" alt="Indie"></div>
          <div class="card-content"><div class="band-name">INDIE</div></div>
        </a>

        <a href="genre.php?genre=rock" class="music-card">
          <div class="card-image"><img src="img/rock.jpeg" alt="Rock"></div>
          <div class="card-content"><div class="band-name">ROCK</div></div>
        </a>
      </div>
    </div>

    <div style="text-align:center; margin-top:60px;">
      <a href="daftar.php" class="btn-tambah">Kelola Daftar Lagu</a> 
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>