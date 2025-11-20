<?php
// galeri.php - Halaman Galeri Lab Data Technology
$activePage = 'galeri';
include 'conn.php';
include 'navbar.php';
?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/galeri.css">

<!-- ============================================
     HERO SECTION
============================================= -->
<section class="galeri-hero">
  <div class="container">
    <div class="hero-content">
      <h1>Galeri Lab Data Technology</h1>
      <p>Dokumentasi kegiatan, fasilitas, dan momen berkesan di laboratorium kami</p>
    </div>
  </div>
</section>

<!-- ============================================
     GALERI GRID SECTION
============================================= -->
<section class="galeri-section">
  <div class="container">
    
    <?php
    // Ambil semua data galeri dari database
    $stmt_galeri = $pdo->query("SELECT * FROM galeri ORDER BY tanggal_dibuat DESC");
    $galeriData = $stmt_galeri->fetchAll();
    ?>

    <?php if(count($galeriData) > 0): ?>
      <!-- GALERI GRID DARI DATABASE -->
      <div class="galeri-grid">
        <?php foreach($galeriData as $index => $item): ?>
          <div class="galeri-item" data-index="<?= $index ?>">
            <!-- 🖼️ GAMBAR GALERI: uploads/galeri/<?= $item['gambar'] ?> -->
            <img src="uploads/galeri/<?= htmlspecialchars($item['gambar']) ?>" 
                 alt="<?= htmlspecialchars($item['judul']) ?>">
            <div class="galeri-overlay">
              <div class="overlay-content">
                <h3><?= htmlspecialchars($item['judul']) ?></h3>
                <span class="view-icon">
                  <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>
                  </svg>
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    <?php else: ?>
      <!-- PLACEHOLDER jika belum ada data -->
      <div class="galeri-empty">
        <svg width="80" height="80" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <h3>Belum Ada Galeri</h3>
        <p>Galeri foto dan dokumentasi akan ditampilkan di sini</p>
      </div>
    <?php endif; ?>

    <!-- Pagination (opsional) -->
    <?php if(count($galeriData) > 12): ?>
      <div class="galeri-pagination">
        <button class="pagination-btn" id="prevBtn" disabled>
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M15 19l-7-7 7-7"/>
          </svg>
        </button>
        <span class="pagination-info">
          <span id="currentPage">1</span> of <span id="totalPages">1</span>
        </span>
        <button class="pagination-btn" id="nextBtn">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
    <?php endif; ?>

  </div>
</section>

<!-- ============================================
     LIGHTBOX MODAL
============================================= -->
<div class="lightbox" id="lightbox">
  <button class="lightbox-close" id="closeLightbox">
    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M6 18L18 6M6 6l12 12"/>
    </svg>
  </button>
  
  <button class="lightbox-nav lightbox-prev" id="prevImage">
    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M15 19l-7-7 7-7"/>
    </svg>
  </button>
  
  <div class="lightbox-content">
    <img id="lightboxImage" src="" alt="">
    <div class="lightbox-caption">
      <h3 id="lightboxTitle"></h3>
      <p id="lightboxDate"></p>
    </div>
  </div>
  
  <button class="lightbox-nav lightbox-next" id="nextImage">
    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M9 5l7 7-7 7"/>
    </svg>
  </button>
</div>

<script src="assets/js/galeri.js"></script>
<?php include 'footer.php'; ?>