<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once "../../includes/cek_session_pegawai.php";
require_once "../../includes/koneksi.php";

$id = $_SESSION['id_pegawai'];
$data = $conn->query("SELECT * FROM pegawai WHERE id_pegawai='$id'")->fetch_assoc();
?>

<?php include "../../pages/pegawai/header.php"; ?>
<?php include "../../pages/pegawai/navbar.php"; ?>
<?php include "../../pages/pegawai/sidebar.php"; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Profil Pegawai</h1>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-body">

                <form action="proses_pegawai.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_pegawai" value="<?= $data['id_pegawai']; ?>">

                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" name="nip" value="<?= $data['nip']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control" name="nama_pegawai" value="<?= $data['nama_pegawai']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" value="<?= $data['jabatan']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Golongan</label>
                        <input type="text" class="form-control" name="golongan" value="<?= $data['golongan']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Foto (Wajib Upload Baru)</label>
                        <input type="file" class="form-control" name="foto" required>
                        <small class="text-danger">Format: JPG/PNG | Max 2MB</small>
                    </div>

                    <div class="form-group">
                        <label>Username (email)</label>
                        <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password Baru (Opsional)</label>
                        <input type="password" class="form-control" name="password">
                        <small>Kosongkan jika tidak ingin mengubah password.</small>
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>

                </form>

            </div>
        </div>

    </section>
</div>

<?php include "../../pages/pegawai/footer.php"; ?>
