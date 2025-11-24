<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require_once "$root/koneksi.php";

$id = $_GET['id'];

// hapus foto
$q = mysqli_query($koneksi, "SELECT foto_admin FROM admin WHERE id_admin='$id'");
$d = mysqli_fetch_assoc($q);

if (!empty($d['foto_admin']) && file_exists("$root/uploads/" . $d['foto_admin'])) {
    unlink("$root/uploads/" . $d['foto_admin']);
}

mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id'");

header("Location: admin.php");
exit;
?>
