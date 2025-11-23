<?php
// ===============================================
// SIDEBAR KANAN – Aplikasi Surat Masuk & Surat Keluar
// ===============================================

// Data kategori statis
$kategori = [
    "Undangan",
    "Pemberitahuan",
    "Laporan",
    "Permohonan",
    "Penting"
];
?>

<div class="sidebar-right p-3 bg-white shadow-sm rounded">

    <!-- INFORMASI APLIKASI -->
    <h5 class="fw-bold" style="color:#2c2c2c;">Informasi</h5>
    <p class="text-muted small">
        Sistem Administrasi Surat Masuk dan Surat Keluar SMK.<br>
        Mengelola data surat secara cepat, akurat, dan terstruktur.
    </p>

    <hr>

    <!-- KATEGORI SURAT -->
    <h6 class="fw-bold mt-3" style="color:#2c2c2c;">Kategori Surat</h6>
    <div class="tag-cloud">
        <?php foreach ($kategori as $kat): ?>
            <span class="badge mb-1" 
                  style="background-color:#c2185b; color:white;">
                  <?= htmlspecialchars($kat); ?>
            </span>
        <?php endforeach; ?>
    </div>

    <hr>

    <!-- INFORMASI STATUS -->
    <h6 class="fw-bold mt-3" style="color:#2c2c2c;">Status Sistem</h6>
    <p class="small">
        <span class="badge" style="background-color:#c2185b; color:white;">
            Aktif
        </span> Sistem berjalan normal.
    </p>

    <p class="small text-muted">
        Jam operasional: 07.00 – 16.00 WIB
    </p>

</div>
