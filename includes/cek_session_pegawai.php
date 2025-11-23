<?php
// ============================================================
// File: includes/cek_session_pegawai.php
// Deskripsi: Protector untuk halaman yang hanya boleh diakses PEGAWAI
// ============================================================

// Pastikan session dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ============================================================
// Cek apakah pegawai sudah login
// ============================================================
if (
    !isset($_SESSION['login']) ||
    $_SESSION['login'] !== true ||
    ($_SESSION['role'] ?? '') !== 'pegawai'
) {
    // Belum login atau role tidak sesuai
    header("Location: " . BASE_URL . "?hal=login_pegawai");
    exit;
}

// ============================================================
// Buat variabel sesi pegawai (sesuai database)
// ============================================================
$id_pegawai   = $_SESSION['id_pegawai']   ?? null;
$nama_pegawai = $_SESSION['nama_pegawai'] ?? null;
$username     = $_SESSION['username']     ?? null;
$foto         = $_SESSION['foto']         ?? 'default.png';
$nip          = $_SESSION['nip']          ?? null;
$jabatan      = $_SESSION['jabatan']      ?? null;
$status       = $_SESSION['status']       ?? null;

// Sekarang cek_session_pegawai.php sudah sesuai dengan database pegawai
?>
