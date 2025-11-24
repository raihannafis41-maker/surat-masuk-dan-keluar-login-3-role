<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    header("Location: proses_pegawai.php?hapus=".$id);
    exit;
} else {
    header("Location: daftar_pegawai.php");
    exit;
}
?>
