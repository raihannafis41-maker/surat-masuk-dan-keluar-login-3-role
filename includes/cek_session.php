<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===============================
// CEK LOGIN
// ===============================
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

$role = $_SESSION['role'] ?? null;

// ===============================
// CEK ROLE VALID
// ===============================
if (!in_array($role, ['admin', 'petugas'])) {
    session_destroy();
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

// ===============================
// VARIABEL OTOMATIS
// ===============================
$id_user   = $_SESSION['id_user']   ?? null;
$nama_user = $_SESSION['nama_user'] ?? null;
$username  = $_SESSION['username']  ?? null;

