<?php
// =========================================================
// FILE: dashboard.php (FINAL FIXED CLEAN VERSION)
// Routing Panel untuk admin, petugas, pegawai
// =========================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/includes/path.php';
require_once INCLUDES_PATH . 'config.php';
require_once INCLUDES_PATH . 'koneksi.php';

// =========================================================
// 1️⃣ CEK LOGIN
// =========================================================
if (!isset($_SESSION['role'])) {
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

$role = $_SESSION['role']; 
$hal  = $_GET['hal'] ?? '';
$hal  = basename($hal); // sanitasi

// =========================================================
// 2️⃣ MAPPING ROLE → LAYOUT + DEFAULT PAGE
// =========================================================

switch ($role) {
    case 'admin':
        $layout_folder = PAGES_PATH . "user/";
        $views_folder  = VIEWS_PATH . "user/";
        $default_page  = "dashboard_user";
        break;

    case 'petugas':
        $layout_folder = PAGES_PATH . "user/";
        $views_folder  = VIEWS_PATH . "petugas/";
        $default_page  = "dashboard_petugas";
        break;

    case 'pegawai':
        $layout_folder = PAGES_PATH . "pegawai/";
        $views_folder  = VIEWS_PATH . "pegawai/";
        $default_page  = "dashboard_pegawai";
        break;

    default:
        die("Akses ditolak. Role tidak dikenali!");
}

// =========================================================
// 3️⃣ Tentukan file view
// =========================================================

if ($hal === "") {
    $hal = $default_page;
}

$view_file = $views_folder . $hal . ".php";

if (!file_exists($view_file)) {
    $view_file = $views_folder . $default_page . ".php";
}

// =========================================================
// 4️⃣ LOAD TEMPLATE LAYOUT SESUAI ROLE
// =========================================================

include $layout_folder . "header.php";
include $layout_folder . "navbar.php";
include $layout_folder . "sidebar.php";

echo '<div class="content-wrapper">';
echo '<section class="content p-3">';

// Load halaman
include $view_file;

echo '</section>';
echo '</div>';

include $layout_folder . "footer.php";
