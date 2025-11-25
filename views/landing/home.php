<?php
// ===============================================
// File: views/landing/home.php
// Tampilan Home aplikasi Surat Masuk & Keluar
// ===============================================

// Include koneksi database
include_once __DIR__ . '/../../koneksi.php';

// Hitung total data
$jumlah_surat_masuk  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM surat_masuk"))['total'];
$jumlah_surat_keluar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM surat_keluar"))['total'];
$jumlah_pegawai      = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pegawai"))['total'];

// Ambil 10 surat masuk terbaru (JOIN pengirim = nama pegawai)
$latest_surat_masuk = mysqli_query($koneksi, "
    SELECT sm.*, p.nama_pegawai 
    FROM surat_masuk sm
    LEFT JOIN pegawai p ON sm.pengirim = p.nama_pegawai
    ORDER BY sm.id_surat_masuk DESC
    LIMIT 10
");

// Ambil 10 surat keluar terbaru (JOIN tujuan = nama pegawai)
$latest_surat_keluar = mysqli_query($koneksi, "
    SELECT sk.*, p.nama_pegawai 
    FROM surat_keluar sk
    LEFT JOIN pegawai p ON sk.tujuan = p.nama_pegawai
    ORDER BY sk.id_surat_keluar DESC
    LIMIT 10
");
?>

<!-- PAGE CONTENT -->
<div class="container mt-5 px-4">

    <!-- INFORMASI SISTEM -->
    <h3 class="mb-4 border-bottom pb-2">Informasi Sistem</h3>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <h5>Surat Masuk</h5>
                <p class="display-6"><?= $jumlah_surat_masuk ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <h5>Surat Keluar</h5>
                <p class="display-6"><?= $jumlah_surat_keluar ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <h5>Pegawai</h5>
                <p class="display-6"><?= $jumlah_pegawai ?></p>
            </div>
        </div>
    </div>

    <!-- 10 SURAT MASUK TERBARU -->
    <h4 class="mt-4">📥 Surat Masuk Terbaru</h4>
    <div class="card shadow-sm p-3 mb-4">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th width="5%">#</th>
                        <th>No Surat</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                while ($sm = mysqli_fetch_assoc($latest_surat_masuk)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($sm['no_surat']); ?></td>
                        <td><?= htmlspecialchars($sm['pengirim']); ?></td>
                        <td><?= htmlspecialchars($sm['perihal']); ?></td>
                        <td><?= htmlspecialchars($sm['tgl_surat']); ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 10 SURAT KELUAR TERBARU -->
    <h4 class="mt-4">📤 Surat Keluar Terbaru</h4>
    <div class="card shadow-sm p-3 mb-5">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-success">
                    <tr>
                        <th width="5%">#</th>
                        <th>No Surat</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                while ($sk = mysqli_fetch_assoc($latest_surat_keluar)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($sk['no_surat']); ?></td>
                        <td><?= htmlspecialchars($sk['tujuan']); ?></td>
                        <td><?= htmlspecialchars($sk['perihal']); ?></td>
                        <td><?= htmlspecialchars($sk['tgl_surat']); ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

