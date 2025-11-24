<?php
include "../../../koneksi.php";
session_start();

// Wajib login
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../otentikasi/login.php");
    exit;
}

include "../../user/header.php";
include "../../user/navbar.php";
include "../../user/sidebar.php";

// Ambil data disposisi + join tabel terkait
$query = mysqli_query($koneksi, "
    SELECT d.*, 
           u.nama_user,
           p.nama_pegawai, p.jabatan,
           sm.no_surat AS no_sm, sm.perihal AS perihal_sm,
           sk.no_surat AS no_sk, sk.perihal AS perihal_sk
    FROM disposisi d
    LEFT JOIN user u ON d.id_user = u.id_user
    LEFT JOIN pegawai p ON d.id_pegawai = p.id_pegawai
    LEFT JOIN surat_masuk sm ON d.id_surat_masuk = sm.id_surat_masuk
    LEFT JOIN surat_keluar sk ON d.id_surat_keluar = sk.id_surat_keluar
    ORDER BY d.id_disposisi DESC
");
?>

<!-- Content Wrapper -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>Daftar Disposisi</h1>
    </section>

    <section class="content">

        <!-- ALERT -->
        <?php if (isset($_GET['alert'])) { ?>
            <?php if ($_GET['alert'] == 'insert') { ?>
                <div class="alert alert-success">Data berhasil ditambahkan!</div>
            <?php } elseif ($_GET['alert'] == 'update') { ?>
                <div class="alert alert-info">Data berhasil diperbarui!</div>
            <?php } elseif ($_GET['alert'] == 'delete') { ?>
                <div class="alert alert-danger">Data berhasil dihapus!</div>
            <?php } ?>
        <?php } ?>

        <div class="card">
            <div class="card-header">
                <a href="tambah_disposisi.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Disposisi
                </a>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pegawai</th>
                            <th>Surat Masuk</th>
                            <th>Surat Keluar</th>
                            <th>Tgl Disposisi</th>
                            <th>Tgl Diterima</th>
                            <th>User Input</th>
                            <th>Catatan</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $no = 1;
                        while ($d = mysqli_fetch_array($query)) { 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <!-- Pegawai -->
                            <td>
                                <?= $d['nama_pegawai'] ?><br>
                                <small><i><?= $d['jabatan'] ?></i></small>
                            </td>

                            <!-- Surat Masuk -->
                            <td>
                                <?php if ($d['id_surat_masuk'] != "") { ?>
                                    <b><?= $d['no_sm'] ?></b><br>
                                    <small><?= $d['perihal_sm'] ?></small>
                                <?php } else { echo "-"; } ?>
                            </td>

                            <!-- Surat Keluar -->
                            <td>
                                <?php if ($d['id_surat_keluar'] != "") { ?>
                                    <b><?= $d['no_sk'] ?></b><br>
                                    <small><?= $d['perihal_sk'] ?></small>
                                <?php } else { echo "-"; } ?>
                            </td>

                            <td><?= $d['tgl_disposisi'] ?></td>
                            <td><?= $d['tgl_diterima'] ?></td>

                            <!-- User -->
                            <td><?= $d['nama_user'] ?></td>

                            <!-- Catatan -->
                            <td><?= nl2br($d['catatan']) ?></td>

                            <!-- Aksi -->
                            <td>
                                <a href="edit_disposisi.php?id=<?= $d['id_disposisi'] ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="proses_disposisi.php?hapus=<?= $d['id_disposisi'] ?>" 
                                   onclick="return confirm('Hapus data ini?')"
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </div>

    </section>
</div>

<?php include "../../user/footer.php"; ?>
