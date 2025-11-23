<?php
// =====================================================
// File: views/user/dashboard_user.php (FINAL)
// =====================================================

// Pastikan user login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: " . BASE_URL . "?hal=login_user");
    exit;
}

$nama = $_SESSION['nama_user'] ?? $_SESSION['namauser'] ?? "User";
?>

<!-- Content Wrapper -->
<section class="content">
    <div class="container-fluid">

        <div class="row mt-3">

            <!-- Welcome Card -->
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>Selamat Datang, <?= htmlspecialchars($nama) ?> 👋</h3>
                        <p class="text-muted">Anda login sebagai <b>User</b></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- Surat Masuk -->
            <div class="col-md-4">
                <a href="?hal=surat_masuk" style="text-decoration:none;">
                    <div class="card bg-primary text-white shadow-sm">
                        <div class="card-body">
                            <h4>Surat Masuk</h4>
                            <p>Kelola data surat masuk</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Surat Keluar -->
            <div class="col-md-4">
                <a href="?hal=surat_keluar" style="text-decoration:none;">
                    <div class="card bg-success text-white shadow-sm">
                        <div class="card-body">
                            <h4>Surat Keluar</h4>
                            <p>Kelola data surat keluar</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Komentar -->
            <div class="col-md-4">
                <a href="?hal=komentar" style="text-decoration:none;">
                    <div class="card bg-warning text-white shadow-sm">
                        <div class="card-body">
                            <h4>Komentar</h4>
                            <p>Kelola komentar</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>
</section>
