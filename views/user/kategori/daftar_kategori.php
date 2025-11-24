<?php
include '../../../koneksi.php';
session_start();

$data = $conn->query("SELECT * FROM kategori ORDER BY id_kategori DESC");
?>

<h2>Daftar Kategori</h2>
<a href="tambah_kategori.php">+ Tambah Kategori</a>
<br><br>

<table border="1" width="100%" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    <?php 
    $no = 1;
    while ($row = $data->fetch_assoc()) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_kategori']; ?></td>
        <td><?= $row['keterangan']; ?></td>
        <td>
            <a href="edit_kategori.php?id=<?= $row['id_kategori']; ?>">Edit</a> |
            <a href="hapus_kategori.php?id=<?= $row['id_kategori']; ?>" onclick="return confirm('Yakin hapus kategori ini?');">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>
