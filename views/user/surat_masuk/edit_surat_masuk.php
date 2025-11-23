<?php
require_once __DIR__ . '/../../db/db_surat_masuk.php';
require_once __DIR__ . '/../../db/db_kategori.php'; // ambil kategori

// Pastikan ID tersedia
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan');window.location='index.php?halaman=surat_masuk';</script>";
    exit;
}

$id = $_GET['id'];
$data = getSuratMasukById($koneksi, $id);

// Ambil semua kategori
$list_kategori = getAllKategori($koneksi);

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (updateSuratMasuk($koneksi, $id, $_POST, $_FILES['file_surat'])) {
        echo "<script>alert('Surat masuk berhasil diperbarui!');window.location='index.php?halaman=surat_masuk';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui surat!');</script>";
    }
}
?>

<div class="card">
    <div class="card-header bg-warning">
        <h4 class="mb-0">Edit Surat Masuk</h4>
    </div>

    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">

            <!-- KATEGORI SURAT -->
            <div class="form-group mb-3">
                <label>Kategori Surat</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($list_kategori as $kat): ?>
                        <option value="<?= $kat['id_kategori']; ?>"
                            <?= ($data['id_kategori'] == $kat['id_kategori']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($kat['nama_kategori']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- NO SURAT -->
            <div class="form-group mb-3">
                <label>No Surat</label>
                <input type="text" name="no_surat"
                       value="<?= htmlspecialchars($data['no_surat']); ?>"
                       class="form-control" required>
            </div>

            <!-- TANGGAL SURAT -->
            <div class="form-group mb-3">
                <label>Tanggal Surat</label>
                <input type="date" name="tgl_surat"
                       value="<?= htmlspecialchars($data['tgl_surat']); ?>"
                       class="form-control" required>
            </div>

            <!-- TANGGAL TERIMA -->
            <div class="form-group mb-3">
                <label>Tanggal Terima</label>
                <input type="date" name="tgl_terima"
                       value="<?= htmlspecialchars($data['tgl_terima']); ?>"
                       class="form-control" required>
            </div>

            <!-- PENGIRIM -->
            <div class="form-group mb-3">
                <label>Pengirim</label>
                <input type="text" name="pengirim"
                       value="<?= htmlspecialchars($data['pengirim']); ?>"
                       class="form-control" required>
            </div>

            <!-- PERIHAL -->
            <div class="form-group mb-3">
                <label>Perihal</label>
                <input type="text" name="perihal"
                       value="<?= htmlspecialchars($data['perihal']); ?>"
                       class="form-control" required>
            </div>

            <!-- ISI SURAT -->
            <div class="form-group mb-3">
                <label>Isi Surat</label>
                <textarea name="isi" class="form-control" rows="4"><?= htmlspecialchars($data['isi']); ?></textarea>
            </div>

            <!-- STATUS -->
            <div class="form-group mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="baru"      <?= $data['status']=='baru' ? 'selected':''; ?>>Baru</option>
                    <option value="diproses"  <?= $data['status']=='diproses' ? 'selected':''; ?>>Diproses</option>
                    <option value="selesai"   <?= $data['status']=='selesai' ? 'selected':''; ?>>Selesai</option>
                </select>
            </div>

            <!-- FILE SURAT -->
            <div class="form-group mb-3">
                <label>File Surat (PDF/JPG/PNG)</label><br>

                <?php if (!empty($data['file_surat'])): ?>
                    <a href="uploads/<?= htmlspecialchars($data['file_surat']); ?>"
                       target="_blank"
                       class="btn btn-sm btn-info mb-2">
                        Lihat File Lama
                    </a>
                    <br>
                <?php endif; ?>

                <input type="file" name="file_surat" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php?halaman=surat_masuk" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>
