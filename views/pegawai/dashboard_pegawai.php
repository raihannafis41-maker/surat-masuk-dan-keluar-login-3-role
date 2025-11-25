<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . "/../../includes/cek_session_pegawai.php";
require_once __DIR__ . "/../../includes/koneksi.php";

$id = $_SESSION['id_pegawai'];

// Hitung data
$jumlahDisposisi = $koneksi->query("SELECT COUNT(*) AS total FROM disposisi WHERE id_pegawai='$id'")->fetch_assoc()['total'];
$jumlahKomentar = $koneksi->query("SELECT COUNT(*) AS total FROM komentar")->fetch_assoc()['total'];
?>

<h1>Dashboard Pegawai</h1>

<div class="row">

    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $jumlahDisposisi; ?></h3>
                <p>Total Disposisi</p>
            </div>
            <a href="?hal=daftar_disposisi_pegawai" class="small-box-footer">
                Lihat Selengkapnya
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $jumlahKomentar; ?></h3>
                <p>Komentar</p>
            </div>
            <a href="?hal=komentar_pegawai" class="small-box-footer">
                Lihat Selengkapnya
            </a>
        </div>
    </div>

</div>
