<?php
// ===============================================
// Dashboard Pegawai
// ===============================================

require_once PAGES_PATH . 'pegawai/header.php';
require_once PAGES_PATH . 'pegawai/navbar.php';
require_once PAGES_PATH . 'pegawai/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="mb-3">Selamat Datang, <?= $_SESSION['nama_pegawai'] ?? 'Pegawai' ?></h3>
            <p>Ini adalah dashboard pegawai.</p>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <!-- Info cards -->
            <div class="row">

                <div class="col-md-4">
                    <div class="card p-3 shadow-sm">
                        <h5>Surat Masuk</h5>
                        <?php
                        $jumlah_surat_masuk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM surat_masuk"))['total'];
                        ?>
                        <p class="display-6"><?= $jumlah_surat_masuk ?></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-3 shadow-sm">
                        <h5>Surat Keluar</h5>
                        <?php
                        $jumlah_surat_keluar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM surat_keluar"))['total'];
                        ?>
                        <p class="display-6"><?= $jumlah_surat_keluar ?></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-3 shadow-sm">
                        <h5>Komentar</h5>
                        <?php
                        $jumlah_komentar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM komentar"))['total'];
                        ?>
                        <p class="display-6"><?= $jumlah_komentar ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once PAGES_PATH . 'pegawai/footer.php';
