<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . "/../../includes/cek_session_pegawai.php";
require_once __DIR__ . "/../../includes/koneksi.php";

$id_pegawai = $_SESSION['id_pegawai'];

$query = $koneksi->query("SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
$data = $query->fetch_assoc();

$foto = (!empty($data['foto'])) 
        ? "/uploads/pegawai/" . $data['foto'] 
        : "/assets/dist/img/default-user.png";

?>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-3 text-center">
                <img src="<?= $foto; ?>" 
                     class="img-fluid rounded-circle mb-3"
                     style="width:180px; height:180px; object-fit:cover; border:3px solid #ddd;">

                <a href="dashboard.php?hal=edit_pegawai&id=<?= $data['id_pegawai']; ?>" 
                   class="btn btn-primary btn-block mt-3">
                    Edit Profil
                </a>
            </div>

            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr><th>NIP</th><td><?= $data['nip']; ?></td></tr>
                    <tr><th>Nama Pegawai</th><td><?= $data['nama_pegawai']; ?></td></tr>
                    <tr><th>Jabatan</th><td><?= $data['jabatan']; ?></td></tr>
                    <tr><th>Golongan</th><td><?= $data['golongan']; ?></td></tr>
                    <tr><th>Username</th><td><?= $data['username']; ?></td></tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            <?php if ($data['status'] == 'disetujui'): ?>
                                <span class="badge badge-success">Disetujui</span>
                            <?php elseif ($data['status'] == 'pending'): ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>
