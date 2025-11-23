<?php
// ==============================================
// File: pages/user/navbar.php (FINAL SESUAI DB USER)
// ==============================================

// Ambil data dari session login user
$namauser = $_SESSION['nama_user'] ?? 'User';
$username = $_SESSION['username'] ?? '';
$foto     = $_SESSION['foto'] ?? 'default.png';

// Karena tabel user TIDAK punya role, role ditentukan dari session login
$role = $_SESSION['role'] ?? 'user';

// Logout khusus user
$logout_url = BASE_URL . '?hal=logout_user';


/**
 * =====================================================
 * Breadcrumb Otomatis
 * =====================================================
 */
if (!function_exists('buat_breadcrumb_otomatis')) {
    function buat_breadcrumb_otomatis()
    {
        $hal = $_GET['hal'] ?? 'dashboard_user';

        if ($hal === 'dashboard_user') {
            echo '<ol class="breadcrumb float-sm-right"><li class="breadcrumb-item active">Dashboard</li></ol>';
            return;
        }

        $parts = explode('/', $hal);
        $breadcrumb = [];

        $breadcrumb[] = '<li class="breadcrumb-item"><a href="?hal=dashboard_user">Dashboard</a></li>';

        for ($i = 0; $i < count($parts); $i++) {
            $segment = ucfirst(str_replace(['_', '-'], ' ', $parts[$i]));
            if ($i < count($parts) - 1) {
                $suburl = '?hal=' . implode('/', array_slice($parts, 0, $i + 1));
                $breadcrumb[] = '<li class="breadcrumb-item"><a href="' . $suburl . '">' . $segment . '</a></li>';
            } else {
                $breadcrumb[] = '<li class="breadcrumb-item active">' . $segment . '</li>';
            }
        }

        echo '<ol class="breadcrumb float-sm-right">' . implode('', $breadcrumb) . '</ol>';
    }
}


/**
 * =====================================================
 * Judul Halaman Otomatis
 * =====================================================
 */
if (!function_exists('judul_halaman_otomatis')) {
    function judul_halaman_otomatis()
    {
        $hal = $_GET['hal'] ?? 'dashboard_user';
        if ($hal === 'dashboard_user') {
            return 'Dashboard';
        }
        return ucfirst(str_replace(['_', '-'], ' ', $hal));
    }
}

?>

<!-- ============================================== -->
<!-- NAVBAR ATAS USER -->
<!-- ============================================== -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- Menu kiri -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= BASE_URL ?>dashboard.php?hal=dashboard_user" class="nav-link">Beranda</a>
    </li>
  </ul>

  <!-- Menu kanan -->
  <ul class="navbar-nav ml-auto">

    <!-- USER DROPDOWN -->
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="<?= BASE_URL ?>uploads/user/<?= $foto ?>"
             class="img-circle elevation-2" style="width:30px;height:30px;object-fit:cover;">
        <?= htmlspecialchars($namauser); ?>
      </a>

      <ul class="dropdown-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href="#">
            <i class="fas fa-id-card mr-2"></i> Profil Saya
          </a>
        </li>

        <li>
          <a class="dropdown-item text-danger" href="<?= $logout_url ?>">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </li>
      </ul>
    </li>

  </ul>
</nav>

<!-- ============================================== -->
<!-- CONTENT WRAPPER -->
<!-- ============================================== -->
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <h5 class="m-0"><?= judul_halaman_otomatis(); ?></h5>
      <?php buat_breadcrumb_otomatis(); ?>
    </div>
  </div>
