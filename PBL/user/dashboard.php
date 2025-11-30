<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Lab Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            overflow-x: hidden;
        }
        
        #sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%);
            transition: all 0.3s;
        }
        
        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        #sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }
        
        #sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-weight: 600;
        }
        
        #sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-header h4 {
            color: white;
            margin: 0;
            font-weight: 700;
        }
        
        .sidebar-header small {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .stats-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .table-actions button {
            margin: 0 2px;
        }
        
        .badge-status {
            padding: 5px 12px;
            border-radius: 20px;
        }
        
        #sidebarToggle {
            display: none;
        }
        
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                left: -100%;
                z-index: 1000;
                width: 280px;
            }
            
            #sidebar.show {
                left: 0;
            }
            
            #sidebarToggle {
                display: inline-block;
            }
            
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 999;
            }
            
            .overlay.show {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="sidebar-header">
                    <h4><i class="bi bi-layers"></i> Lab Admin</h4>
                    <small>Management System</small>
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="loadPage('dashboard')">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('anggota')">
                                <i class="bi bi-people"></i> Anggota Lab
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('struktur')">
                                <i class="bi bi-diagram-3"></i> Struktur Lab
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('publikasi')">
                                <i class="bi bi-journal-text"></i> Publikasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('kegiatan')">
                                <i class="bi bi-calendar-event"></i> Kegiatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('perkuliahan')">
                                <i class="bi bi-book"></i> Perkuliahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('fasilitas')">
                                <i class="bi bi-building"></i> Fasilitas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('galeri')">
                                <i class="bi bi-images"></i> Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('konten')">
                                <i class="bi bi-file-text"></i> Konten
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('tentang')">
                                <i class="bi bi-info-circle"></i> Tentang Kami
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('kontak')">
                                <i class="bi bi-telephone"></i> Kontak
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadPage('appearance')">
                                <i class="bi bi-palette"></i> Appearance
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="#" onclick="logout()">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Navbar -->
                <nav class="navbar navbar-light bg-white sticky-top mb-4">
                    <div class="container-fluid">
                        <button class="btn btn-outline-secondary" id="sidebarToggle">
                            <i class="bi bi-list"></i>
                        </button>
                        <div class="d-flex align-items-center">
                            <span class="me-3">Admin User</span>
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=1e3c72&color=fff" 
                                 class="rounded-circle" width="40" height="40" alt="Admin">
                        </div>
                    </div>
                </nav>

                <!-- Content Area -->
                <div id="content">
                    <!-- Dashboard Content -->
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-calendar3"></i> Hari ini
                            </button>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="row mb-4">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="text-muted small">Total Anggota</div>
                                            <div class="h4 mb-0">45</div>
                                        </div>
                                        <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="text-muted small">Publikasi</div>
                                            <div class="h4 mb-0">128</div>
                                        </div>
                                        <div class="stats-icon bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-journal-text"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="text-muted small">Kegiatan</div>
                                            <div class="h4 mb-0">32</div>
                                        </div>
                                        <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-calendar-event"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="text-muted small">Fasilitas</div>
                                            <div class="h4 mb-0">15</div>
                                        </div>
                                        <div class="stats-icon bg-info bg-opacity-10 text-info">
                                            <i class="bi bi-building"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Aktivitas Terbaru</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Aktivitas</th>
                                            <th>User</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10:30</td>
                                            <td><i class="bi bi-file-plus text-success"></i> Publikasi baru ditambahkan</td>
                                            <td>Dr. Budi Santoso</td>
                                            <td><span class="badge bg-success badge-status">Selesai</span></td>
                                        </tr>
                                        <tr>
                                            <td>09:15</td>
                                            <td><i class="bi bi-person-plus text-primary"></i> Anggota baru terdaftar</td>
                                            <td>Admin</td>
                                            <td><span class="badge bg-success badge-status">Selesai</span></td>
                                        </tr>
                                        <tr>
                                            <td>08:45</td>
                                            <td><i class="bi bi-pencil text-warning"></i> Update data struktur</td>
                                            <td>Admin</td>
                                            <td><span class="badge bg-warning badge-status">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>Kemarin</td>
                                            <td><i class="bi bi-calendar-event text-info"></i> Kegiatan seminar dibuat</td>
                                            <td>Dr. Ani Wijaya</td>
                                            <td><span class="badge bg-success badge-status">Selesai</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0">Quick Actions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" onclick="loadPage('anggota')">
                                            <i class="bi bi-person-plus"></i> Tambah Anggota Baru
                                        </button>
                                        <button class="btn btn-success" onclick="loadPage('publikasi')">
                                            <i class="bi bi-file-plus"></i> Tambah Publikasi
                                        </button>
                                        <button class="btn btn-info" onclick="loadPage('kegiatan')">
                                            <i class="bi bi-calendar-plus"></i> Buat Kegiatan Baru
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0">Statistik Bulanan</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="monthlyChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div class="overlay" id="overlay"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle untuk mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });
        }

        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        }

        // Navigation
        function loadPage(page) {
            // Remove active class from all links
            document.querySelectorAll('#sidebar .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to clicked link
            event.target.closest('.nav-link').classList.add('active');
            
            // Close mobile sidebar
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
            
            // Load content based on page
            const content = document.getElementById('content');
            
            switch(page) {
                case 'dashboard':
                    content.innerHTML = '<h2>Dashboard</h2><p>Halaman dashboard akan ditampilkan di sini</p>';
                    break;
                case 'anggota':
                    loadAnggotaPage();
                    break;
                case 'struktur':
                    loadStrukturPage();
                    break;
                case 'publikasi':
                    loadPublikasiPage();
                    break;
                default:
                    content.innerHTML = `<h2>${page.charAt(0).toUpperCase() + page.slice(1)}</h2><p>Halaman ${page} akan ditampilkan di sini</p>`;
            }
        }

        function loadAnggotaPage() {
            const content = document.getElementById('content');
            content.innerHTML = `
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manajemen Anggota Lab</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnggotaModal">
                        <i class="bi bi-person-plus"></i> Tambah Anggota
                    </button>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Kontak</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="https://ui-avatars.com/api/?name=Budi+Santoso" class="rounded-circle" width="40" height="40"></td>
                                        <td>Dr. Budi Santoso, M.Kom</td>
                                        <td>199001012020121001</td>
                                        <td>08123456789</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td class="table-actions">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://ui-avatars.com/api/?name=Ani+Wijaya" class="rounded-circle" width="40" height="40"></td>
                                        <td>Dr. Ani Wijaya, M.T</td>
                                        <td>199102022020122002</td>
                                        <td>08234567890</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td class="table-actions">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `;
        }

        function loadStrukturPage() {
            const content = document.getElementById('content');
            content.innerHTML = `
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Struktur Lab</h1>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus"></i> Tambah Struktur
                    </button>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Jabatan</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Kepala Lab</strong></td>
                                        <td>Dr. Budi Santoso, M.Kom</td>
                                        <td>199001012020121001</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td class="table-actions">
                                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sekretaris</strong></td>
                                        <td>Dr. Ani Wijaya, M.T</td>
                                        <td>199102022020122002</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td class="table-actions">
                                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `;
        }

        function loadPublikasiPage() {
            const content = document.getElementById('content');
            content.innerHTML = `
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Publikasi</h1>
                    <button class="btn btn-primary">
                        <i class="bi bi-file-plus"></i> Tambah Publikasi
                    </button>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Deep Learning for Medical Image Analysis</td>
                                        <td>Dr. Budi Santoso, Dr. Ani Wijaya</td>
                                        <td>2024</td>
                                        <td><span class="badge bg-success">Published</span></td>
                                        <td class="table-actions">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `;
        }

        function logout() {
            if(confirm('Apakah Anda yakin ingin logout?')) {
                window.location.href = 'login.html';
            }
        }
    </script>
</body>
</html>