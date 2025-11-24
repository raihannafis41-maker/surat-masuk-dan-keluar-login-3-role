<?php
// =======================================================
// File: logout_user.php
// Deskripsi: Menghapus session pegawai & redirect ke login
// =======================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hapus semua session pegawai
unset($_SESSION['login']);
unset($_SESSION['role']);
unset($_SESSION['nama_user']);
unset($_SESSION['id_user']);

// Atau bersihkan semua session
session_destroy();

// Redirect ke halaman login pegawai
header("Location: ../../index.php?hal=login_user");
exit;
