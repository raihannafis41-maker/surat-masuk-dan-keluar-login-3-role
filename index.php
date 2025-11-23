<?php
// =======================================================
// File: index.php (clean version)
// Deskripsi: Routing utama aplikasi Surat Masuk & Keluar
// =======================================================

require_once __DIR__ . '/includes/path.php';
require_once INCLUDES_PATH . 'config.php';
require_once INCLUDES_PATH . 'koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil parameter ?hal
$halaman = isset($_GET['hal']) ? trim($_GET['hal']) : 'home';
$halaman = basename(str_replace('.php', '', $halaman));

// Daftar routing (tanpa duplikasi)
$routes = [
    // Landing
    'home'               => 'landing/home.php',
    'kategori'           => 'landing/kategori.php',
    'surat_masuk_public' => 'landing/surat_masuk.php',
    'tentang'            => 'landing/tentang.php',
    'kontak'             => 'landing/kontak.php',
    'hashbycrypt'        => 'landing/hashbycrypt.php',
    'proseskomentar'     => 'landing/proses_komentar.php',

    // Login User
    'login_user'           => 'otentikasi_user/login_user.php',
    'proses_login_user'    => 'otentikasi_user/proses_login_user.php',
    'logout_user'          => 'otentikasi_user/logout_user.php',

    // Login Pegawai
    'login_pegawai'       => 'otentikasi_pegawai/login_pegawai.php',
    'proses_login_pegawai' => 'otentikasi_pegawai/proses_login_pegawai.php',
    'logout_pegawai'      => 'otentikasi_pegawai/logout_pegawai.php',

    // Admin Surat Masuk
    'surat_masuk'        => 'surat_masuk/surat_masuk.php',
    'tambah_surat_masuk' => 'surat_masuk/tambah_surat_masuk.php',
    'edit_surat_masuk'   => 'surat_masuk/edit_surat_masuk.php',
    'hapus_surat_masuk'  => 'surat_masuk/hapus_surat_masuk.php',

    // Admin Surat Keluar
    'surat_keluar'       => 'surat_keluar/surat_keluar.php',
    'tambah_surat_keluar' => 'surat_keluar/tambah_surat_keluar.php',
    'edit_surat_keluar'  => 'surat_keluar/edit_surat_keluar.php',
    'hapus_surat_keluar' => 'surat_keluar/hapus_surat_keluar.php',
];

// Tentukan file view
$file_view = isset($routes[$halaman]) ? VIEWS_PATH . $routes[$halaman] : VIEWS_PATH . 'landing/404.php';

// =======================================================
// TEMPLATE LAYOUT (header → navbar → content → footer)
// =======================================================
include PAGES_PATH . 'landing/header.php';
include PAGES_PATH . 'landing/navbar.php';

// Hero hanya di halaman home
if ($halaman === 'home') {
    include PAGES_PATH . 'landing/hero.php';
}

// Konten utama
include file_exists($file_view) ? $file_view : VIEWS_PATH . 'landing/404.php';

include PAGES_PATH . 'landing/footer.php';
