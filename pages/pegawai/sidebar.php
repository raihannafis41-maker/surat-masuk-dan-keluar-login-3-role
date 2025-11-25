<?php
require_once __DIR__ . '/../../includes/path.php';
require_once INCLUDES_PATH . 'koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$foto_user = 'default.png';
$nama_user = $_SESSION['nama_pegawai'] ?? 'Pegawai';
$role_user = 'Pegawai';
$id_pegawai = $_SESSION['id_pegawai'] ?? 0;

// Fix: query menggunakan id_pegawai yg benar
if ($id_pegawai) {
    $q = mysqli_query($koneksi, "SELECT foto FROM pegawai WHERE id_pegawai='$id_pegawai' LIMIT 1");
    $d = mysqli_fetch_assoc($q);
    if ($d && $d['foto'] && file_exists(UPLOAD_USER . $d['foto'])) {
        $foto_user = $d['foto'];
    }
}
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light">Pegawai</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">

                <li class="nav-item">
                    <a href="../../dashboard.php?hal=dashboard_pegawai" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../../views/user/disposisi/daftar_disposisi.php" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>Disposisi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../../views/user/komentar/daftar_komentar.php" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Komentar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../../views/pegawai/tampilan_pegawai.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../../views/otentikasi_pegawai/logout_pegawai.php" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</aside>