<?php
include '../../../koneksi.php';
session_start();

$data = $conn->query("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
?>

<h2>Daftar Pegawai</h2>
<a href="tambah_pegawai.php">+ Tambah Pegawai</a>
<br><br>

<table border="1" width="100%" cellspacing="0">
    <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama Pegawai</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    <?php 
    $no = 1;
    while ($row = $data->fetch_assoc()) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nip']; ?></td>
        <td><?= $row['nama_pegawai']; ?></td>
        <td><?= $row['jabatan']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['no_telp']; ?></td>
        <td><?= $row['email']; ?></td>
        <td>
            <a href="edit_pegawai.php?id=<?= $row['id_pegawai']; ?>">Edit</a> |
            <a href="hapus_pegawai.php?id=<?= $row['id_pegawai']; ?>" 
               onclick="return confirm('Yakin ingin menghapus pegawai ini?');">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>
