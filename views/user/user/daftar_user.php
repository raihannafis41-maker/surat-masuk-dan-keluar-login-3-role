<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require_once "$root/koneksi.php";
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Admin</h1>
  </section>

  <section class="content">

    <a href="tambah_admin.php" class="btn btn-primary mb-3">
      <i class="fas fa-plus"></i> Tambah Admin
    </a>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama</th>
          <th>Email</th>
          <th>No HP</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $no = 1;
        $q = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id_admin DESC");
        while ($d = mysqli_fetch_assoc($q)):
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $d['username'] ?></td>
          <td><?= $d['nama_admin'] ?></td>
          <td><?= $d['email'] ?></td>
          <td><?= $d['no_hp'] ?></td>
          <td>
            <img src="/uploads/<?= $d['foto_admin'] ?: 'default.png' ?>"
                 style="width:50px;height:50px;object-fit:cover;border-radius:6px;">
          </td>
          <td>
            <a href="edit_admin.php?id=<?= $d['id_admin'] ?>" class="btn btn-warning btn-sm">
              <i class="fas fa-edit"></i> Edit
            </a>

            <a href="hapus_admin.php?id=<?= $d['id_admin'] ?>"
               onclick="return confirm('Yakin hapus admin ini?')"
               class="btn btn-danger btn-sm">
              <i class="fas fa-trash"></i> Hapus
            </a>
          </td>
        </tr>

        <?php endwhile; ?>

      </tbody>
    </table>

  </section>
</div>
