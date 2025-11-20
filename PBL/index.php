<?php
// index.php - Halaman Beranda Lab Data Technology
$activePage = 'index';
include 'conn.php'; // Koneksi database
include 'navbar.php'; // Navbar
?>
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/main.js" defer></script>

<!-- ============================================
     HERO / SLIDER SECTION
     🖼️ Background: assets/img/tentang-kami.jpg
============================================= -->
<div class="slider-wrapper">
  <section class="hero">
    <?php
    // Ambil data slider dari database
    $stmt_slider = $pdo->query("SELECT * FROM slider ORDER BY tanggal_dibuat DESC LIMIT 5");
    $sliders = $stmt_slider->fetchAll();
    ?>
    
    <?php if(count($sliders) > 0): ?>
      <!-- SLIDER REAL DARI DATABASE -->
      <div class="gallery-slider">
        <?php foreach($sliders as $index => $slide): ?>
          <div class="slide <?= $index === 0 ? 'active' : '' ?>">
            <!-- 🖼️ GAMBAR SLIDER: uploads/slider/<?= $slide['gambar'] ?> -->
            <img src="uploads/slider/<?= htmlspecialchars($slide['gambar']) ?>" 
                 alt="<?= htmlspecialchars($slide['judul']) ?>">
            
            <?php if($slide['judul'] || $slide['deskripsi']): ?>
              <div class="slide-caption">
                <?php if($slide['judul']): ?>
                  <h2><?= htmlspecialchars($slide['judul']) ?></h2>
                <?php endif; ?>
                <?php if($slide['deskripsi']): ?>
                  <p><?= htmlspecialchars($slide['deskripsi']) ?></p>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
        
        <!-- Slider Navigation Dots -->
        <div class="slider-dots">
          <?php foreach($sliders as $index => $slide): ?>
            <span class="<?= $index === 0 ? 'active' : '' ?>" data-slide="<?= $index ?>"></span>
          <?php endforeach; ?>
        </div>
      </div>
    <?php else: ?>
      <!-- PLACEHOLDER jika belum ada data slider -->
      <div class="gallery-placeholder">
        Galeri Slider (Belum ada data)
        <div class="slider-dots">
          <span class="active"></span>
          <span></span>
          <span></span>
        </div>
      </div>
    <?php endif; ?>
  </section>
</div>

<!-- ============================================
     TENTANG KAMI SECTION (Overlay)
============================================= -->
<section class="about-section">
  <div class="container">
    <div class="about-overlay">
      <small>Lab DT Overview</small>
      <h2>Tentang Kami</h2>
      <p>Pusat riset yang beroperasi sebagai fasilitas khusus untuk penemuan ilmiah dan analisis.</p>
      <a href="tentang.php" class="read-more-btn">Read More</a>
    </div>
  </div>
</section>

<!-- ============================================
     FASILITAS & PERALATAN
     🖼️ Icon: uploads/fasilitas/icon-{id}.png atau dari database
============================================= -->
<section class="section">
  <div class="container">
    <h2 class="section-title">Fasilitas & Peralatan</h2>
    
    <?php
    // Ambil data fasilitas dari database
    $stmt_fasilitas = $pdo->query("SELECT * FROM fasilitas ORDER BY tanggal_dibuat DESC LIMIT 3");
    $fasilitasData = $stmt_fasilitas->fetchAll();
    ?>
    
    <div class="grid-3">
      <?php if(count($fasilitasData) > 0): ?>
        <?php foreach($fasilitasData as $fasilitas): ?>
          <div class="facility-card">
            <div class="icon-placeholder">
              <?php if($fasilitas['icon']): ?>
                <!-- 🖼️ ICON FASILITAS: uploads/fasilitas/<?= $fasilitas['icon'] ?> -->
                <img src="uploads/fasilitas/<?= htmlspecialchars($fasilitas['icon']) ?>" 
                     alt="<?= htmlspecialchars($fasilitas['judul']) ?>">
              <?php else: ?>
                Icon
              <?php endif; ?>
            </div>
            <h4><?= htmlspecialchars($fasilitas['judul']) ?></h4>
            <p><?= htmlspecialchars($fasilitas['deskripsi']) ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- PLACEHOLDER jika belum ada data -->
        <div class="facility-card">
          <div class="icon-placeholder">Icon</div>
          <h4>Ruang Praktikum & Penelitian</h4>
          <p>Ruang laboratorium yang nyaman untuk kegiatan praktikum, eksperimen, dan penelitian.</p>
        </div>
        
        <div class="facility-card">
          <div class="icon-placeholder">Icon</div>
          <h4>Perangkat Lunak</h4>
          <p>Software analisis data, machine learning, serta tools big data untuk kebutuhan riset dan pembelajaran.</p>
        </div>
        
        <div class="facility-card">
          <div class="icon-placeholder">Icon</div>
          <h4>Perangkat Komputer</h4>
          <p>Software analisis data, machine learning, serta tools big data untuk kebutuhan riset dan pembelajaran.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ============================================
     BERITA SECTION
     🖼️ Thumbnail: uploads/konten/
============================================= -->
<section class="news-section">
  <div class="container">
    <h2 class="section-title">Berita</h2>
    <p style="opacity: 0.85; margin-top: -20px; margin-bottom: 24px;">Kabar terbaru dan aktivitas kampus terkini</p>
    
    <?php
    // Ambil berita (kategori dengan nama 'berita')
    $stmt_berita = $pdo->prepare("
      SELECT k.* FROM konten k 
      JOIN kategori kat ON k.id_kategori = kat.id_kategori 
      WHERE kat.nama = 'berita' 
      ORDER BY k.tanggal_dibuat DESC 
      LIMIT 2
    ");
    $stmt_berita->execute();
    $beritaData = $stmt_berita->fetchAll();
    ?>
    
    <div class="news-grid">
      <?php if(count($beritaData) > 0): ?>
        <?php foreach($beritaData as $berita): ?>
          <div class="news-card">
            <div class="thumb">
              <?php if($berita['gambar']): ?>
                <!-- 🖼️ THUMBNAIL BERITA: uploads/konten/<?= $berita['gambar'] ?> -->
                <img src="uploads/konten/<?= htmlspecialchars($berita['gambar']) ?>" 
                     alt="<?= htmlspecialchars($berita['judul']) ?>">
              <?php else: ?>
                Thumbnail Berita
              <?php endif; ?>
            </div>
            <div class="news-card-content">
              <h4><?= htmlspecialchars($berita['judul']) ?></h4>
              <p><?= htmlspecialchars(substr($berita['isi'], 0, 150)) ?>...</p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- PLACEHOLDER jika belum ada data -->
        <div class="news-card">
          <div class="thumb">Thumbnail Berita</div>
          <div class="news-card-content">
            <h4>Prestasi Gemilang! Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara</h4>
            <p>Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara di Entrepreneurs Festival 2025 Politeknik Negeri Malang.</p>
          </div>
        </div>
        
        <div class="news-card">
          <div class="thumb">Thumbnail Berita</div>
          <div class="news-card-content">
            <h4>Prestasi Gemilang! Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara</h4>
            <p>Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara di Entrepreneurs Festival 2025 Politeknik Negeri Malang.</p>
          </div>
        </div>
      <?php endif; ?>
    </div>
    
    <div style="text-align: center;">
      <a href="" class="load-more-btn">Load more</a>
    </div>
  </div>
</section>

<!-- ============================================
     PUBLIKASI SECTION
     🖼️ Cover: uploads/publikasi/
============================================= -->
<section class="section publikasi-section">
  <div class="container">
    <div class="publikasi-header">
      <h2 class="section-title" style="margin: 0;">Publikasi</h2>
      <a href="https://sinta.kemdikbud.go.id/" target="_blank" class="sinta-btn">Load more in sinta</a>
    </div>
    <p style="text-align: center; color: #666; margin-top: -20px; margin-bottom: 32px;">Publikasi dari anggota Lab Data Technology</p>

    <?php
    // Ambil data publikasi yang disetujui
    $stmt_publikasi = $pdo->query("
      SELECT * FROM publikasi 
      WHERE status = 'disetujui' 
      ORDER BY tanggal_dibuat DESC 
      LIMIT 3
    ");
    $publikasiData = $stmt_publikasi->fetchAll();
    ?>

    <div class="pub-row">
      <?php if(count($publikasiData) > 0): ?>
        <?php foreach($publikasiData as $pub): ?>
          <div class="pub-card">
            <div class="pub-placeholder">
              <?php if($pub['file_publikasi']): ?>
                <!-- 🖼️ COVER PUBLIKASI: uploads/publikasi/<?= $pub['file_publikasi'] ?> -->
                <?php 
                $file_ext = pathinfo($pub['file_publikasi'], PATHINFO_EXTENSION);
                if(in_array(strtolower($file_ext), ['jpg', 'jpeg', 'png', 'gif'])): 
                ?>
                  <img src="uploads/publikasi/<?= htmlspecialchars($pub['file_publikasi']) ?>" 
                       alt="<?= htmlspecialchars($pub['judul']) ?>">
                <?php else: ?>
                  Cover Publikasi
                <?php endif; ?>
              <?php else: ?>
                Cover Publikasi
              <?php endif; ?>
            </div>
            <div class="pub-card-inner">
              <h4><?= htmlspecialchars($pub['judul']) ?></h4>
              <p class="pub-meta">
                <?= htmlspecialchars($pub['penulis']) ?> • <?= htmlspecialchars($pub['tahun']) ?>
              </p>
              <?php if($pub['file_publikasi']): ?>
                <a href="uploads/publikasi/<?= htmlspecialchars($pub['file_publikasi']) ?>" 
                   target="_blank" class="pub-link">Baca Selengkapnya >>></a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- PLACEHOLDER jika belum ada data -->
        <?php for($i = 0; $i < 3; $i++): ?>
          <div class="pub-card">
            <div class="pub-placeholder">Cover Publikasi</div>
            <div class="pub-card-inner">
              <h4>Sistem Prediksi Penjualan Frozen Food dengan Metode Monte Carlo (Studi Kasus: Supermama Frozen Food)</h4>
              <p class="pub-meta">Penulis • 2025</p>
              <a href="#" class="pub-link">Baca Selengkapnya >>></a>
            </div>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>

    <div style="text-align: center; margin-top: 40px;">
      <a href="" class="load-more-btn" style="background: var(--primary-blue); border-color: var(--primary-blue);">Load more</a>
    </div>
  </div>
</section>

<!-- ============================================
     KEGIATAN & PROYEK
     🖼️ Foto: uploads/kegiatan/
============================================= -->
<section class="section">
  <div class="container">
    <h2 class="section-title">Kegiatan & Proyek</h2>
    
    <?php
    // Ambil data kegiatan
    $stmt_kegiatan = $pdo->query("SELECT * FROM kegiatan ORDER BY tanggal_dibuat DESC LIMIT 4");
    $kegiatanData = $stmt_kegiatan->fetchAll();
    ?>
    
    <div class="grid-4">
      <?php if(count($kegiatanData) > 0): ?>
        <?php foreach($kegiatanData as $kegiatan): ?>
          <div class="activity-card">
            <div class="activity-placeholder">
              <?php if($kegiatan['icon']): ?>
                <!-- 🖼️ FOTO KEGIATAN: uploads/kegiatan/<?= $kegiatan['icon'] ?> -->
                <img src="uploads/kegiatan/<?= htmlspecialchars($kegiatan['icon']) ?>" 
                     alt="<?= htmlspecialchars($kegiatan['judul']) ?>">
              <?php else: ?>
                Foto Kegiatan
              <?php endif; ?>
            </div>
            <div class="activity-card-content">
              <h4><?= htmlspecialchars($kegiatan['judul']) ?></h4>
              <p><?= htmlspecialchars($kegiatan['deskripsi']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- PLACEHOLDER jika belum ada data -->
        <?php for($i = 0; $i < 4; $i++): ?>
          <div class="activity-card">
            <div class="activity-placeholder">Foto Kegiatan</div>
            <div class="activity-card-content">
              <h4>Praktikum Mahasiswa</h4>
              <p>Kegiatan pembelajaran berbasis praktik untuk mempertajam kemampuan teknikal siswa.</p>
            </div>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ============================================
     PERKULIAHAN TERKAIT
     🖼️ Icon: uploads/perkuliahan/
============================================= -->
<section class="section" style="padding-top: 0;">
  <div class="container">
    <h2 class="section-title">Perkuliahan terkait</h2>
    
    <?php
    // Ambil data perkuliahan
    $stmt_perkuliahan = $pdo->query("SELECT * FROM perkuliahan ORDER BY tanggal_dibuat DESC LIMIT 4");
    $perkuliahanData = $stmt_perkuliahan->fetchAll();
    ?>
    
    <div class="grid-4">
      <?php if(count($perkuliahanData) > 0): ?>
        <?php foreach($perkuliahanData as $kuliah): ?>
          <div class="activity-card">
            <div class="activity-placeholder">
              <?php if($kuliah['icon']): ?>
                <!-- 🖼️ ICON MATAKULIAH: uploads/perkuliahan/<?= $kuliah['icon'] ?> -->
                <img src="uploads/perkuliahan/<?= htmlspecialchars($kuliah['icon']) ?>" 
                     alt="<?= htmlspecialchars($kuliah['judul']) ?>">
              <?php else: ?>
                Icon Matakuliah
              <?php endif; ?>
            </div>
            <div class="activity-card-content">
              <h4><?= htmlspecialchars($kuliah['judul']) ?></h4>
              <p><?= htmlspecialchars($kuliah['deskripsi']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- PLACEHOLDER jika belum ada data -->
        <?php for($i = 0; $i < 4; $i++): ?>
          <div class="activity-card">
            <div class="activity-placeholder">Icon Matakuliah</div>
            <div class="activity-card-content">
              <h4>Basis Data</h4>
              <p>Perancangan, Implementasi, dan pengaturan sistem basis data</p>
            </div>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>