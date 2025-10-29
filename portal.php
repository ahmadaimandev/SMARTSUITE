<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Portal</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">

    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #34495e;
            --light-bg: #ecf0f1;
            --border-color: #bdc3c7;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
        }

        .sidebar {
            min-height: 100vh;
            background: var(--secondary-color);
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            margin-left: -250px;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 20px;
            margin: 3px 15px;
            border-radius: 4px;
            transition: all 0.2s;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(52, 152, 219, 0.15);
            color: white;
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .sidebar .nav-link i {
            margin-right: 12px;
            width: 20px;
        }

        .sidebar ul {
            height: auto;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            margin-left: 250px;
            transition: all 0.3s;
            padding: 20px;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            border-left: 4px solid var(--primary-color);
        }

        @media (max-width: 576px) {
            .header .d-flex {
                flex-direction: column;
                gap: 15px;
            }

            .header .d-flex>div:last-child {
                width: 100%;
            }

            .header .btn {
                width: 100%;
                margin-right: 0 !important;
                margin-bottom: 10px;
            }
        }

        .user-card {
            background: white;
            color: var(--secondary-color);
            border-radius: 4px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-top: 3px solid var(--primary-color);
        }

        .user-card i {
            color: var(--primary-color);
        }

        .info-card {
            background: white;
            border-radius: 4px;
            padding: 25px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            height: 100%;
            border-left: 3px solid var(--primary-color);
        }

        .app-card {
            background: white;
            border-radius: 4px;
            padding: 25px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            cursor: pointer;
            height: 100%;
            border-left: 3px solid var(--border-color);
        }

        .app-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2);
            border-left-color: var(--primary-color);
        }

        .app-icon {
            width: 55px;
            height: 55px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 15px;
        }

        .toggle-btn {
            display: none;
            position: fixed;
            left: 10px;
            top: 10px;
            z-index: 1001;
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .badge {
            font-weight: 500;
            padding: 5px 12px;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.show {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .toggle-btn {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Toggle Button -->
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="px-3 mb-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-building fa-2x text-white me-3"></i>
                <div>
                    <h6 class="text-white mb-0">Portal SmartSuite</h6>
                    <small class="text-white-50">Sistem Pengurusan</small>
                </div>
            </div>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#" onclick="showDashboard()">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="showProfil()">
                    <i class="fas fa-user"></i>
                    Profil Pengguna
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="showAplikasi()">
                    <i class="fas fa-th-large"></i>
                    Aplikasi Atas Talian
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <div class="header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1 text-dark">Selamat Datang</h4>
                    <small class="text-muted">Sistem Pengurusan Korporat</small>
                </div>
                <div>
                    <button class="btn btn-outline-primary me-2" onclick="showNotification()">
                        <i class="fas fa-bell me-2"></i> Notifikasi
                    </button>
                    <button class="btn btn-danger" onclick="logout()">
                        <i class="fas fa-sign-out-alt me-2"></i> Log Keluar
                    </button>
                </div>
            </div>
        </div>

        <!-- Dashboard Section -->
        <div id="dashboardSection">
            <!-- User Card -->
            <div class="user-card">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        <i class="fas fa-user-circle fa-5x"></i>
                    </div>
                    <div class="col-md-10">
                        <h4 class="mb-2">Ahmad Bin Abdullah</h4>
                        <p class="mb-1 text-muted"><i class="fas fa-envelope me-2"></i>ahmad@email.com</p>
                        <p class="mb-0 text-muted"><i class="fas fa-id-card me-2"></i>ID Pengguna: USR-2024-001</p>
                    </div>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-sign-in-alt fa-2x" style="color: #3498db;"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Log Masuk Terakhir</h6>
                                <h5 class="mb-0">26 Okt 2025, 09:30 AM</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0 small"><i class="fas fa-map-marker-alt me-2"></i>Lokasi: Bukit Mertajam, Penang</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-danger bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-sign-out-alt fa-2x text-danger"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Log Keluar Terakhir</h6>
                                <h5 class="mb-0">25 Okt 2025, 05:45 PM</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0 small"><i class="fas fa-clock me-2"></i>Tempoh Sesi: 7 jam 15 minit</p>
                    </div>
                </div>
            </div>

            <!-- Additional Stats -->
            <div class="row g-4 mt-3">
                <div class="col-md-6">
                    <div class="info-card text-center">
                        <i class="fas fa-calendar-check fa-3x mb-3" style="color: #3498db;"></i>
                        <h3 class="mb-0">15</h3>
                        <p class="text-muted mb-0">Hari Aktif Bulan Ini</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card text-center">
                        <i class="fas fa-clock fa-3x mb-3" style="color: #3498db;"></i>
                        <h3 class="mb-0">42 jam</h3>
                        <p class="text-muted mb-0">Jumlah Masa Penggunaan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profil Section -->
        <div id="profilSection" style="display: none;">
            <h4 class="mb-4 text-dark">Profil Pengguna</h4>

            <!-- Profile Header Card -->
            <div class="info-card mb-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <i class="fas fa-user-circle fa-5x" style="color: #3498db;"></i>
                        <button class="btn btn-sm btn-outline-primary mt-3" onclick="changePicture()">
                            <i class="fas fa-camera me-1"></i> Tukar Gambar
                        </button>
                    </div>
                    <div class="col-md-9">
                        <h3 class="mb-3">Ahmad Bin Abdullah</h3>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">ID Pengguna</small>
                                <strong>USR-2024-001</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Status</small>
                                <span class="badge bg-success">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="info-card mb-4">
                <h5 class="mb-3 pb-2 border-bottom">
                    <i class="fas fa-id-card me-2" style="color: #3498db;"></i>
                    Maklumat Peribadi
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Nama Penuh</label>
                        <p class="mb-0"><strong>Ahmad Bin Abdullah</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">No. Kad Pengenalan</label>
                        <p class="mb-0"><strong>880523-08-5234</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Tarikh Lahir</label>
                        <p class="mb-0"><strong>23 Mei 1988</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Jantina</label>
                        <p class="mb-0"><strong>Lelaki</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Kewarganegaraan</label>
                        <p class="mb-0"><strong>Malaysia</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Bangsa</label>
                        <p class="mb-0"><strong>Melayu</strong></p>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="info-card mb-4">
                <h5 class="mb-3 pb-2 border-bottom">
                    <i class="fas fa-address-book me-2" style="color: #3498db;"></i>
                    Maklumat Hubungan
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Alamat E-mel</label>
                        <p class="mb-0"><strong>ahmad@email.com</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">No. Telefon</label>
                        <p class="mb-0"><strong>012-345 6789</strong></p>
                    </div>
                    <div class="col-12">
                        <label class="text-muted small mb-1">Alamat Surat Menyurat</label>
                        <p class="mb-0"><strong>No. 123, Jalan Bukit Mertajam,<br>Taman Sejahtera, 14000 Bukit Mertajam,<br>Pulau Pinang</strong></p>
                    </div>
                </div>
            </div>

            <!-- Employment Information -->
            <div class="info-card mb-4">
                <h5 class="mb-3 pb-2 border-bottom">
                    <i class="fas fa-briefcase me-2" style="color: #3498db;"></i>
                    Maklumat Pekerjaan
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Jawatan</label>
                        <p class="mb-0"><strong>Pegawai Teknologi Maklumat</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Jabatan</label>
                        <p class="mb-0"><strong>Jabatan Teknologi Maklumat</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Gred</label>
                        <p class="mb-0"><strong>F41</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Tarikh Lantikan</label>
                        <p class="mb-0"><strong>1 Januari 2020</strong></p>
                    </div>
                </div>
            </div>

            <!-- Account Information -->
            <div class="info-card">
                <h5 class="mb-3 pb-2 border-bottom">
                    <i class="fas fa-cog me-2" style="color: #3498db;"></i>
                    Maklumat Akaun
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Tarikh Pendaftaran</label>
                        <p class="mb-0"><strong>15 Januari 2024</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small mb-1">Kemas Kini Terakhir</label>
                        <p class="mb-0"><strong>20 Oktober 2025</strong></p>
                    </div>
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary me-2" onclick="editProfile()">
                            <i class="fas fa-edit me-2"></i>Edit Profil
                        </button>
                        <button class="btn btn-outline-primary" onclick="changePassword()">
                            <i class="fas fa-key me-2"></i>Tukar Kata Laluan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aplikasi Section -->
        <div id="aplikasiSection" style="display: none;">
            <h4 class="mb-4 text-dark">Aplikasi Atas Talian</h4>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="app-card" onclick="openApp('Permohonan')">
                        <div class="app-icon bg-primary bg-opacity-10">
                            <i class="fas fa-file-alt" style="color: #3498db;"></i>
                        </div>
                        <h5 class="mb-2">Sistem Permohonan</h5>
                        <p class="text-muted small mb-3">Hantar dan jejak permohonan anda secara dalam talian dengan mudah dan pantas.</p>
                        <span class="badge bg-primary">Aktif</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="app-card" onclick="openApp('ePayment')">
                        <div class="app-icon bg-success bg-opacity-10">
                            <i class="fas fa-credit-card text-success"></i>
                        </div>
                        <h5 class="mb-2">Portal e-Bayaran</h5>
                        <p class="text-muted small mb-3">Buat pembayaran dan semak resit bayaran anda dengan selamat dan cepat.</p>
                        <span class="badge bg-success">Popular</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="app-card" onclick="openApp('eDokumen')">
                        <div class="app-icon bg-info bg-opacity-10">
                            <i class="fas fa-folder-open text-info"></i>
                        </div>
                        <h5 class="mb-2">e-Dokumen</h5>
                        <p class="text-muted small mb-3">Akses dan muat turun dokumen penting anda pada bila-bila masa dan di mana sahaja.</p>
                        <span class="badge bg-info">Baru</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="app-card" onclick="openApp('Aduan')">
                        <div class="app-icon bg-warning bg-opacity-10">
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                        </div>
                        <h5 class="mb-2">Sistem Aduan</h5>
                        <p class="text-muted small mb-3">Laporkan masalah dan dapatkan maklum balas daripada pihak berkaitan dengan segera.</p>
                        <span class="badge bg-warning text-dark">24/7</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="app-card" onclick="openApp('Temujanji')">
                        <div class="app-icon bg-danger bg-opacity-10">
                            <i class="fas fa-calendar-alt text-danger"></i>
                        </div>
                        <h5 class="mb-2">Temujanji Online</h5>
                        <p class="text-muted small mb-3">Buat temujanji dengan jabatan berkaitan tanpa perlu beratur dan tunggu lama.</p>
                        <span class="badge bg-danger">Jimat Masa</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="app-card" onclick="openApp('Helpdesk')">
                        <div class="app-icon bg-secondary bg-opacity-10">
                            <i class="fas fa-headset text-secondary"></i>
                        </div>
                        <h5 class="mb-2">Pusat Bantuan</h5>
                        <p class="text-muted small mb-3">Dapatkan sokongan teknikal dan jawapan kepada soalan lazim dengan mudah.</p>
                        <span class="badge bg-secondary">Sokongan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        function showDashboard() {
            document.getElementById('dashboardSection').style.display = 'block';
            document.getElementById('profilSection').style.display = 'none';
            document.getElementById('aplikasiSection').style.display = 'none';

            // Update active menu
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');

            if (window.innerWidth < 768) {
                toggleSidebar();
            }
        }

        function showProfil() {
            document.getElementById('dashboardSection').style.display = 'none';
            document.getElementById('profilSection').style.display = 'block';
            document.getElementById('aplikasiSection').style.display = 'none';

            // Update active menu
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');

            if (window.innerWidth < 768) {
                toggleSidebar();
            }
        }

        function showAplikasi() {
            document.getElementById('dashboardSection').style.display = 'none';
            document.getElementById('profilSection').style.display = 'none';
            document.getElementById('aplikasiSection').style.display = 'block';

            // Update active menu
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');

            if (window.innerWidth < 768) {
                toggleSidebar();
            }
        }

        function showNotification() {
            Swal.fire({
                icon: 'info',
                title: 'Notifikasi',
                html: '<div class="text-start">' +
                    '<p><i class="fas fa-check-circle text-success"></i> Permohonan anda telah diluluskan</p>' +
                    '<p><i class="fas fa-clock text-warning"></i> Temujanji pada 28 Okt 2025</p>' +
                    '<p><i class="fas fa-bell text-info"></i> 2 mesej baru dalam sistem</p>' +
                    '</div>',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#3498db'
            });
        }

        function openApp(appName) {
            Swal.fire({
                icon: 'success',
                title: appName,
                text: 'Membuka ' + appName + '...',
                timer: 1500,
                showConfirmButton: false
            });
        }

        function logout() {
            Swal.fire({
                title: 'Log Keluar?',
                text: "Adakah anda pasti ingin keluar dari sistem?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Log Keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berjaya!',
                        text: 'Anda telah berjaya log keluar.',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        // Redirect atau refresh page
                        window.location.href = '';
                    });
                }
            });
        }

        function changePicture() {
            Swal.fire({
                icon: 'info',
                title: 'Tukar Gambar Profil',
                text: 'Fungsi tukar gambar akan tersedia tidak lama lagi.',
                confirmButtonColor: '#3498db'
            });
        }

        function editProfile() {
            Swal.fire({
                icon: 'info',
                title: 'Edit Profil',
                text: 'Fungsi edit profil akan membuka borang kemaskini maklumat.',
                confirmButtonColor: '#3498db'
            });
        }

        function changePassword() {
            Swal.fire({
                title: 'Tukar Kata Laluan',
                html: '<div class="text-start">' +
                    '<div class="mb-3">' +
                    '<label class="form-label">Kata Laluan Semasa</label>' +
                    '<input type="password" class="form-control" id="currentPass">' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<label class="form-label">Kata Laluan Baru</label>' +
                    '<input type="password" class="form-control" id="newPass">' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<label class="form-label">Sahkan Kata Laluan Baru</label>' +
                    '<input type="password" class="form-control" id="confirmPass">' +
                    '</div>' +
                    '</div>',
                showCancelButton: true,
                confirmButtonText: 'Tukar',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#3498db',
                cancelButtonColor: '#6c757d',
                preConfirm: () => {
                    return {
                        current: document.getElementById('currentPass').value,
                        new: document.getElementById('newPass').value,
                        confirm: document.getElementById('confirmPass').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berjaya!',
                        text: 'Kata laluan telah berjaya dikemaskini.',
                        confirmButtonColor: '#3498db'
                    });
                }
            });
        }

        // Auto close sidebar on mobile when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.toggle-btn');

            if (window.innerWidth < 768 &&
                sidebar.classList.contains('show') &&
                !sidebar.contains(event.target) &&
                !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>

</html>