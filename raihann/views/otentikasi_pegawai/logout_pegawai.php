<?php
// =======================================================
// File: logout_pegawai.php
// Deskripsi: Menghapus session pegawai & redirect ke login
// =======================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hapus semua session pegawai
unset($_SESSION['login']);
unset($_SESSION['role']);
unset($_SESSION['nama_pegawai']);
unset($_SESSION['id_pegawai']);

// Atau bersihkan semua session
session_destroy();

// Redirect ke halaman login pegawai
header("Location: ../../index.php?hal=login_pegawai");
exit;
