<?php
require_once __DIR__ . '/../../includes/path.php';
require_once INCLUDES_PATH . 'config.php';
require_once INCLUDES_PATH . 'koneksi.php';
require_once INCLUDES_PATH . 'fungsi_validasi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$username = bersihkan($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    header("Location: " . BASE_URL . "?hal=login_pegawai&pesan=" . urlencode("Isi semua kolom"));
    exit;
}

$stmt = $koneksi->prepare("SELECT * FROM pegawai WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $pegawai = $result->fetch_assoc();

    if ($password === $pegawai['password']) {

        $_SESSION['login']        = true;
        $_SESSION['role']         = 'pegawai';
        $_SESSION['id_pegawai']   = $pegawai['id_pegawai'];
        $_SESSION['nama_pegawai'] = $pegawai['nama_pegawai'];
        $_SESSION['username']     = $pegawai['username'];
        $_SESSION['jabatan']      = $pegawai['jabatan'];
        $_SESSION['nip']          = $pegawai['nip'];
        $_SESSION['foto']         = $pegawai['foto'];

        header("Location: " . BASE_URL . "dashboard.php?hal=dashboard_pegawai");
        exit;
    }
}

header("Location: " . BASE_URL . "?hal=login_pegawai&pesan=" . urlencode("Username atau password salah"));
exit;
