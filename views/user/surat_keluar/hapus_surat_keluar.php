<?php
// Redirect langsung ke proses hapus
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    header("Location: proses_disposisi.php?hapus=" . $id);
    exit;
} else {
    header("Location: daftar_disposisi.php");
    exit;
}
?>
