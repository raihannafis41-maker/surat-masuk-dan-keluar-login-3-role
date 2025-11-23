<?php
// ============================================================
// File: includes/cek_session.php (FINAL SESUAI DATABASE KAMU)
// ============================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ============================================================
// 1. CEK SUDAH LOGIN ATAU BELUM
// ============================================================
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

// ============================================================
// 2. CEK ROLE (user / pegawai)
//    - User biasa boleh masuk dashboard_user
//    - Pegawai boleh masuk dashboard_pegawai
// ============================================================
$role = $_SESSION['role'] ?? null;

if (!in_array($role, ['user', 'pegawai'])) {
    session_destroy();
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

// ============================================================
// 3. SET VARIABEL DASAR (SESUAI DATABASE user & pegawai)
// ============================================================
$iduser       = $_SESSION['id_user']      ?? null;
$idpegawai    = $_SESSION['id_pegawai']   ?? null;

$nama         = $_SESSION['nama']         ?? $_SESSION['nama_pegawai'] ?? null;
$username     = $_SESSION['username']     ?? null;
$foto         = $_SESSION['foto']         ?? 'default.png';

$status       = $_SESSION['status']       ?? null;

// ============================================================
// CEKSESSION VALID
// ============================================================
