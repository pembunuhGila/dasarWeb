<?php
// detail_anggota.php - Detail Profil Anggota
$activePage = 'struktur';
include 'navbar.php';
?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/anggota_detail.css">

<!-- BREADCRUMB -->
<div class="breadcrumb-section">
  <div class="container">
    <nav class="breadcrumb">
      <a href="index.php">Home</a>
      <span class="separator">›</span>
      <a href="profil.php">Tentang Kami</a>
      <span class="separator">›</span>
      <span class="current">Detail Anggota</span>
    </nav>
  </div>
</div>

<!-- PROFILE SECTION -->
<section class="profile-section">
  <div class="container">
    <div class="profile-layout">
      
      <!-- SIDEBAR PROFIL -->
      <aside class="profile-sidebar">
        
        <!-- Photo -->
        <div class="profile-photo">
          <div class="photo-placeholder">
            <svg width="80" height="80" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
        </div>
        
        <!-- Info Box -->
        <div class="profile-info-box">
          <h1 class="profile-name">Dr. Ahmad Fauzi, M.Kom</h1>
          <p class="profile-position">Kepala Laboratorium</p>
          
          <div class="info-list">
            <div class="info-item">
              <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              </svg>
              <div>
                <span class="info-label">NIP/NIDN</span>
                <span class="info-value">198501012010121001</span>
              </div>
            </div>
            
            <div class="info-item">
              <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
              <div>
                <span class="info-label">Email</span>
                <span class="info-value">ahmad.fauzi@polinema.ac.id</span>
              </div>
            </div>
            
            <div class="info-item">
              <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
              <div>
                <span class="info-label">Kontak</span>
                <span class="info-value">+62 812-3456-7890</span>
              </div>
            </div>
            
            <div class="info-item">
              <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <div>
                <span class="info-label">Ruangan</span>
                <span class="info-value">Gedung Sipil Lt. 7 - R.701</span>
              </div>
            </div>
          </div>
          
          <!-- Social Links -->
          <div class="profile-social">
            <a href="#" class="social-link" title="Email">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
              </svg>
            </a>
            <a href="#" class="social-link" title="Google Scholar">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 24a7 7 0 110-14 7 7 0 010 14zm0-24L0 9.5l4.838 3.94A8 8 0 0112 9a8 8 0 017.162 4.44L24 9.5z"/>
              </svg>
            </a>
            <a href="#" class="social-link" title="LinkedIn">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
              </svg>
            </a>
          </div>
          
        </div>
        
      </aside>
      
      <!-- MAIN CONTENT -->
      <main class="profile-main">
        
        <!-- Biodata / About -->
        <div class="content-section">
          <h2 class="section-title">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            Biodata
          </h2>
          <div class="content-box">
            <p>Dr. Ahmad Fauzi, M.Kom adalah dosen senior di Jurusan Teknologi Informasi Politeknik Negeri Malang dengan pengalaman lebih dari 15 tahun di bidang Data Science dan Machine Learning.</p>
            
            <p>Beliau meraih gelar Doktor dalam bidang Computer Science dari Institut Teknologi Bandung pada tahun 2018 dengan disertasi tentang "Advanced Machine Learning Techniques for Big Data Analytics".</p>
            
            <div class="bio-grid">
              <div class="bio-item">
                <span class="bio-label">Pendidikan Terakhir:</span>
                <span class="bio-value">S3 Computer Science - ITB</span>
              </div>
              <div class="bio-item">
                <span class="bio-label">Bidang Keahlian:</span>
                <span class="bio-value">Data Science, Machine Learning, Big Data</span>
              </div>
              <div class="bio-item">
                <span class="bio-label">Bergabung Sejak:</span>
                <span class="bio-value">2010</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Publikasi -->
        <div class="content-section">
          <h2 class="section-title">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
              <polyline points="14 2 14 8 20 8"></polyline>
            </svg>
            Publikasi
          </h2>
          <div class="content-box">
            
            <!-- Publication List -->
            <div class="publication-list">
              
              <!-- Item 1 -->
              <article class="publication-item">
                <div class="pub-year">2025</div>
                <div class="pub-content">
                  <h3 class="pub-title">
                    <a href="publikasi_detail.php?id=1">
                      Sistem Prediksi Penjualan Frozen Food dengan Metode Monte Carlo (Studi Kasus: Supermama Frozen Food)
                    </a>
                  </h3>
                  <p class="pub-authors">Ahmad Fauzi, Siti Nur Aini</p>
                  <p class="pub-journal">Journal of Data Science and Analytics, Vol. 12 No. 1</p>
                  <div class="pub-actions">
                    <a href="#" class="pub-action-link">
                      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                      </svg>
                      PDF
                    </a>
                    <a href="#" class="pub-action-link">
                      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                      </svg>
                      DOI
                    </a>
                  </div>
                </div>
              </article>
              
              <!-- Item 2 -->
              <article class="publication-item">
                <div class="pub-year">2024</div>
                <div class="pub-content">
                  <h3 class="pub-title">
                    <a href="publikasi_detail.php?id=2">
                      Analisis Sentimen Media Sosial Menggunakan Deep Learning dan Natural Language Processing
                    </a>
                  </h3>
                  <p class="pub-authors">Ahmad Fauzi, Budi Santoso, Dewi Lestari</p>
                  <p class="pub-journal">International Conference on Artificial Intelligence 2024</p>
                  <div class="pub-actions">
                    <a href="#" class="pub-action-link">
                      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                      </svg>
                      PDF
                    </a>
                    <a href="#" class="pub-action-link">
                      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                      </svg>
                      DOI
                    </a>
                  </div>
                </div>
              </article>
              
              <!-- Item 3 -->
              <article class="publication-item">
                <div class="pub-year">2024</div>
                <div class="pub-content">
                  <h3 class="pub-title">
                    <a href="publikasi_detail.php?id=3">
                      Implementasi Machine Learning untuk Prediksi Kelulusan Mahasiswa Berbasis Data Akademik
                    </a>
                  </h3>
                  <p class="pub-authors">Ahmad Fauzi, Rina Wijayanti</p>
                  <p class="pub-journal">Jurnal Teknologi Informasi dan Pendidikan, Vol. 9 No. 2</p>
                  <div class="pub-actions">
                    <a href="#" class="pub-action-link">
                      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                      </svg>
                      PDF
                    </a>
                    <a href="#" class="pub-action-link">
                      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                      </svg>
                      DOI
                    </a>
                  </div>
                </div>
              </article>
              
            </div>
            
            <!-- View All Button -->
            <div class="view-all-container">
              <a href="publikasi.php" class="view-all-btn">
                Lihat Semua Publikasi
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
              </a>
            </div>
            
          </div>
        </div>
        
      </main>
      
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>