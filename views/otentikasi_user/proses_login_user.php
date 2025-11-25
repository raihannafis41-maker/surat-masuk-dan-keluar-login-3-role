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
    header("Location: " . BASE_URL . "?hal=login_user&pesan=" . urlencode("Isi semua kolom"));
    exit;
}

$stmt = $koneksi->prepare("SELECT * FROM user WHERE username=? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($password === $user['password']) {

        $_SESSION['login']     = true;
        $_SESSION['role']      = $user['role'];  // admin / petugas
        $_SESSION['id_user']   = $user['id_user'];
        $_SESSION['nama_user'] = $user['nama_user'];
        $_SESSION['username']  = $user['username'];

        // ========== REDIRECT OTOMATIS BERDASARKAN ROLE ==========
        if ($user['role'] === 'admin') {
            header("Location: ../../dashboard.php?hal=dashboard_user");
            exit;
        }

        if ($user['role'] === 'petugas') {
            header("Location: ../../dashboard.php?hal=dashboard_petugas");
            exit;
        }
    }
}

// Jika gagal login
header("Location: " . BASE_URL . "?hal=login_user&pesan=" . urlencode("Username atau password salah"));
exit;
