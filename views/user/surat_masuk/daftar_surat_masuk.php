<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "
    SELECT sm.*, k.nama_kategori 
    FROM surat_masuk sm 
    LEFT JOIN kategori k ON sm.id_kategori = k.id_kategori
    ORDER BY id_surat_masuk DESC
");
?>

<div class="content-wrapper">
<section class="content-header">
    <h1>Daftar Surat Masuk</h1>
</section>

<section class="content">
<div class="container-fluid">

    <a href="dashboard.php?page=tambah_surat_masuk" class="btn btn-primary mb-3">Tambah Surat Masuk</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>Tanggal Surat</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Kategori</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $no=1; while($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['no_surat'] ?></td>
                <td><?= $row['tgl_surat'] ?></td>
                <td><?= $row['pengirim'] ?></td>
                <td><?= $row['perihal'] ?></td>
                <td><?= $row['nama_kategori'] ?></td>
                <td>
                    <?php if ($row['file_surat'] != "") { ?>
                    <a href="uploads/konten/<?= $row['file_surat'] ?>" target="_blank">Lihat</a>
                    <?php } ?>
                </td>
                <td>
                    <a href="dashboard.php?page=edit_surat_masuk&id=<?= $row['id_surat_masuk'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a onclick="return confirm('Yakin hapus?')" href="views/user/surat_masuk/hapus_surat_masuk.php?id=<?= $row['id_surat_masuk'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>
</section>
</div>
