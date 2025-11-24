<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    header("Location: proses_kategori.php?hapus=" . $id);
    exit;
} else {
    header("Location: daftar_kategori.php");
    exit;
}
?>
