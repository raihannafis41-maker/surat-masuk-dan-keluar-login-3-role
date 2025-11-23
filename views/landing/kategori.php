<?php
// ===============================================
// Halaman: Kategori Surat
// Lokasi: views/landing/kategori.php
// ===============================================

// --- Coba load koneksi database ---
$koneksi_file = __DIR__ . "/../../includes/koneksi.php";

$kategori = []; // Untuk menampung data kategori

if (file_exists($koneksi_file)) {

    include $koneksi_file;

    // Jika variabel $koneksi berhasil dibuat
    if (isset($koneksi) && $koneksi instanceof mysqli) {
        $result = $koneksi->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");

        // Jika database kosong → fallback
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $kategori[] = $row['nama_kategori'];
            }
        }
    }
}

// --- Jika tidak ada koneksi / DB kosong → data statis ---
if (empty($kategori)) {
    $kategori = [
        "Undangan",
        "Pemberitahuan",
        "Laporan",
        "Permohonan",
        "Penting"
    ];
}
?>

<div class="container py-4">
    <h2 class="fw-bold mb-3" style="color:#2c2c2c;">Kategori Surat</h2>

    <div class="p-3 bg-white shadow-sm rounded">

        <p class="text-muted small">
            Berikut adalah daftar kategori surat yang tersedia dalam sistem.
        </p>

        <hr>

        <div class="tag-cloud">
            <?php foreach ($kategori as $kat): ?>
                <span class="badge mb-1" 
                      style="background-color:#c2185b; color:white; padding:6px 10px;">
                    <?= htmlspecialchars($kat) ?>
                </span>
            <?php endforeach; ?>
        </div>

    </div>
</div>
