<?php
require_once __DIR__ . '/includes/path.php';
require_once INCLUDES_PATH . 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['login'])) {
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

$role = $_SESSION['role'] ?? '';
$hal  = $_GET['hal'] ?? '';

if ($role === 'user') {
    include PAGES_PATH . "user/header.php";
    include PAGES_PATH . "user/navbar.php";
    include PAGES_PATH . "user/sidebar.php";

    if ($hal === 'dashboard_user') {
        include VIEWS_PATH . "user/dashboard_user.php";
    } else {
        echo "<h3>Halaman tidak ditemukan</h3>";
    }

    include PAGES_PATH . "user/footer.php";
    exit;
}

if ($role === 'pegawai') {
    include PAGES_PATH . "pegawai/header.php";
    include PAGES_PATH . "pegawai/navbar.php";
    include PAGES_PATH . "pegawai/sidebar.php";

    if ($hal === 'dashboard_pegawai') {
        include VIEWS_PATH . "pegawai/dashboard_pegawai.php";
    } else {
        echo "<h3>Halaman tidak ditemukan</h3>";
    }

    include PAGES_PATH . "pegawai/footer.php";
    exit;
}

echo "<h3>Akses tidak valid</h3>";
