<?php

/**
 * ==========================================================
 * FILE: index.php
 * Routing utama Aplikasi Surat Masuk & Keluar
 * Versi Final – Clean, Safe, and Stable
 * ==========================================================
 */

require_once __DIR__ . '/includes/path.php';
require_once INCLUDES_PATH . 'config.php';
require_once INCLUDES_PATH . 'koneksi.php';

// Start Session (must be before any output)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ==========================================================
// AMBIL PARAMETER ?hal
// ==========================================================
$halaman = isset($_GET['hal']) ? trim($_GET['hal']) : 'home';

// Hapus .php jika ada
$halaman = basename(str_replace('.php', '', $halaman));

// Sanitasi
$halaman = preg_replace('/[^a-zA-Z0-9_\-]/', '', $halaman);

// ==========================================================
// Routing Table (tidak ada duplikasi)
// ==========================================================
$routes = [

    // Landing Pages
    'home'                 => 'landing/home.php',
    'kategori'             => 'landing/kategori.php',
    'surat_masuk_public'   => 'landing/surat_masuk.php',
    'tentang'              => 'landing/tentang.php',
    'kontak'               => 'landing/kontak.php',
    'hashbycrypt'          => 'landing/hashbycrypt.php',
    'proseskomentar'       => 'landing/proses_komentar.php',

    // Login User
    'login_user'           => 'otentikasi_user/login_user.php',
    'proses_login_user'    => 'otentikasi_user/proses_login_user.php',
    'logout_user'          => 'otentikasi_user/logout_user.php',

    // Login Pegawai
    'login_pegawai'        => 'otentikasi_pegawai/login_pegawai.php',
    'proses_login_pegawai' => 'otentikasi_pegawai/proses_login_pegawai.php',
    'logout_pegawai'       => 'otentikasi_pegawai/logout_pegawai.php',

    // Admin Surat Masuk
    'surat_masuk'          => 'surat_masuk/surat_masuk.php',
    'tambah_surat_masuk'   => 'surat_masuk/tambah_surat_masuk.php',
    'edit_surat_masuk'     => 'surat_masuk/edit_surat_masuk.php',
    'hapus_surat_masuk'    => 'surat_masuk/hapus_surat_masuk.php',

    // Admin Surat Keluar
    'surat_keluar'         => 'surat_keluar/surat_keluar.php',
    'tambah_surat_keluar'  => 'surat_keluar/tambah_surat_keluar.php',
    'edit_surat_keluar'    => 'surat_keluar/edit_surat_keluar.php',
    'hapus_surat_keluar'   => 'surat_keluar/hapus_surat_keluar.php',
];

// ==========================================================
// TENTUKAN FILE VIEW
// ==========================================================
$file_view = VIEWS_PATH . ($routes[$halaman] ?? 'landing/404.php');

// Jika file tidak ada → tampilkan 404
if (!file_exists($file_view)) {
    $file_view = VIEWS_PATH . 'landing/404.php';
}

// ==========================================================
// TEMPLATE (Header → Navbar → Content → Footer)
// ==========================================================
include PAGES_PATH . 'landing/header.php';

// JANGAN TAMPILKAN NAVBAR DI HALAMAN LOGIN & PROSES LOGIN
$no_nav = ['login_user', 'proses_login_user', 'login_pegawai', 'proses_login_pegawai'];

if (!in_array($halaman, $no_nav)) {
    include PAGES_PATH . 'landing/navbar.php';
}


// Hero khusus halaman home
if ($halaman === 'home') {
    include PAGES_PATH . 'landing/hero.php';
}

// Konten utama
include $file_view;

// Footer
include PAGES_PATH . 'landing/footer.php';
