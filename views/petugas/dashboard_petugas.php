<?php
require_once __DIR__ . '/../../includes/path.php';
require_once INCLUDES_PATH . 'config.php';

// cek session khusus petugas
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'petugas') {
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

$nama = $_SESSION['nama_user'] ?? "Petugas";
?>

<section class="content">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>Dashboard Petugas</h3>
                        <p>Selamat datang, <b><?= htmlspecialchars($nama) ?></b>!</p>
                        <p class="text-muted">Anda berhasil login sebagai PETUGAS dan memakai layout admin/user.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
