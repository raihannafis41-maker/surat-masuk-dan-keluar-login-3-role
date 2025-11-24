<?php
include "../../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE id_surat_masuk=$id");

header("Location: ../../../dashboard.php?page=daftar_surat_masuk");
?>
