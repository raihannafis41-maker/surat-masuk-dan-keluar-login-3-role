<?php
// ===============================================
// File: views/landing/home.php
// Tampilan Home aplikasi Surat Masuk & Surat Keluar
// ===============================================

// === FIX WAJIB: INCLUDE KONEKSI DATABASE ===
// lokasi: surat_masuk_dan_keluar_punya_raihan/koneksi.php
include_once __DIR__ . '/../../koneksi.php';

// ===============================================
// Hitung total data
$jumlah_surat_masuk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM surat_masuk"))['total'];
$jumlah_surat_keluar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM surat_keluar"))['total'];
$jumlah_pegawai = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pegawai"))['total'];

// Include Hero Section
$heroFile = PAGES_PATH . 'landing/hero.php';
if (file_exists($heroFile)) {
    include_once $heroFile;
}
?>

<div class="container-fluid my-4 px-4">
  <div class="row justify-content-center">

    <!-- KONTEN UTAMA -->
    <div class="col-lg-10">

      <h3 class="mb-4 border-bottom pb-2">Informasi Sistem</h3>

      <!-- CARD INFORMASI -->
      <div class="row">
        
        <div class="col-md-4">
          <div class="card p-3 shadow-sm">
            <h5>Surat Masuk</h5>
            <p class="display-6"><?= $jumlah_surat_masuk ?></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card p-3 shadow-sm">
            <h5>Surat Keluar</h5>
            <p class="display-6"><?= $jumlah_surat_keluar ?></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card p-3 shadow-sm">
            <h5>Pegawai</h5>
            <p class="display-6"><?= $jumlah_pegawai ?></p>
          </div>
        </div>

      </div>

    </div>

    <!-- SIDEBAR KANAN -->
    <div class="col-lg-2">
      <?php 
      $sidebarFile = PAGES_PATH . 'landing/sidebar-right.php';
      if (file_exists($sidebarFile)) {
          include_once $sidebarFile;
      } else {
          echo '<div class="text-muted small">Sidebar kanan belum tersedia.</div>';
      }
      ?>
    </div>

  </div>
</div>
