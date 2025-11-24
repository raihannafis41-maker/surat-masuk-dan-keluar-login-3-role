<?php
require_once __DIR__ . '/../../includes/path.php';
require_once INCLUDES_PATH . 'koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$foto_user = 'default.png';
$nama_user = $_SESSION['nama_user'] ?? 'User';
$role_user = $_SESSION['role'] ?? 'Guest';
$id_user   = $_SESSION['id_user'] ?? 0;

$q = mysqli_query($koneksi, "SELECT foto_user FROM user WHERE id_user='$id_user' LIMIT 1");
$d = mysqli_fetch_assoc($q);
if ($d && $d['foto_user'] && file_exists(UPLOAD_USER . $d['foto_user'])) {
    $foto_user = $d['foto_user'];
}

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="<?= BASE_URL ?>dashboard.php?hal=dashboard_user" class="brand-link text-center">
        <span class="brand-text font-weight-bold">Surat Masuk Keluar</span>
    </a>

    <div class="sidebar">

        <!-- Panel User -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= BASE_URL ?>uploads/user/<?= htmlspecialchars($foto_user) ?>"
                     class="img-circle elevation-2" style="width:35px;height:35px;object-fit:cover;">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= htmlspecialchars($nama_user) ?></a>
                <small class="text-muted">User</small>
            </div>
        </div>

        <!-- MENU khusus USER -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>dashboard.php?hal=dashboard_user" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>dashboard.php?hal=surat_masuk/surat_masuk" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open"></i>
                        <p>Surat Masuk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>dashboard.php?hal=surat_keluar/surat_keluar" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Surat Keluar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>dashboard.php?hal=komentar/komentar" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Komentar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL; ?>views/otentikasi_user/logout_user.php" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>
