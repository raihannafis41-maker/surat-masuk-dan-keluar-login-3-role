<?php
include "../../../koneksi.php";
session_start();

// Jika user tidak login
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../otentikasi/login.php");
    exit;
}

$id_user = $_SESSION['id_user']; // otomatis dari session

// =====================================
// ========== INSERT DATA ===============
// =====================================
if (isset($_POST['tambah'])) {

    $id_pegawai      = $_POST['id_pegawai'];
    $id_surat_masuk  = $_POST['id_surat_masuk'];
    $id_surat_keluar = $_POST['id_surat_keluar'];
    $tgl_disposisi   = $_POST['tgl_disposisi'];
    $tgl_diterima    = $_POST['tgl_diterima'];
    $catatan         = $_POST['catatan'];

    $query = "INSERT INTO disposisi 
                (id_user, id_pegawai, id_surat_masuk, id_surat_keluar, tgl_disposisi, tgl_diterima, catatan)
              VALUES 
                ('$id_user', '$id_pegawai', '$id_surat_masuk', '$id_surat_keluar', '$tgl_disposisi', '$tgl_diterima', '$catatan')";

    mysqli_query($koneksi, $query);

    header("Location: daftar_disposisi.php?alert=insert");
    exit;
}



// =====================================
// ========== UPDATE DATA ==============
// =====================================
if (isset($_POST['edit'])) {

    $id_disposisi    = $_POST['id_disposisi'];
    $id_pegawai      = $_POST['id_pegawai'];
    $id_surat_masuk  = $_POST['id_surat_masuk'];
    $id_surat_keluar = $_POST['id_surat_keluar'];
    $tgl_disposisi   = $_POST['tgl_disposisi'];
    $tgl_diterima    = $_POST['tgl_diterima'];
    $catatan         = $_POST['catatan'];

    $query = "UPDATE disposisi SET
                id_pegawai      = '$id_pegawai',
                id_surat_masuk  = '$id_surat_masuk',
                id_surat_keluar = '$id_surat_keluar',
                tgl_disposisi   = '$tgl_disposisi',
                tgl_diterima    = '$tgl_diterima',
                catatan         = '$catatan'
              WHERE id_disposisi = '$id_disposisi'";

    mysqli_query($koneksi, $query);

    header("Location: daftar_disposisi.php?alert=update");
    exit;
}



// =====================================
// ========== DELETE DATA ==============
// =====================================
if (isset($_GET['hapus'])) {

    $id_disposisi = $_GET['hapus'];

    mysqli_query($koneksi, "DELETE FROM disposisi WHERE id_disposisi='$id_disposisi'");

    header("Location: daftar_disposisi.php?alert=delete");
    exit;
}

?>
