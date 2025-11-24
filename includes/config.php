<?php
// =======================================================
// File: includes/konfig.php
// =======================================================

// Metadata aplikasi
$base_url     = BASE_URL;   // <-- aman
$site_name    = "surat_masuk_dan_keluar_punya_raihan";
$site_desc    = "Sistem informasi surat masuk, surat keluar, pegawai, kategori, komentar";
$site_version = "1.0.0";
$penulis      = "raihan";

date_default_timezone_set('Asia/Jakarta');

// Helper URL
function url($path = '') {
    return BASE_URL . ltrim($path, '/');
}
