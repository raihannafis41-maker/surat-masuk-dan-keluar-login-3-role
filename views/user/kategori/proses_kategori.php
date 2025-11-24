<?php
include '../../../koneksi.php';
session_start();

// ========== CREATE ==========
if (isset($_POST['tambah'])) {

    $nama = $_POST['nama_kategori'];
    $ket  = $_POST['keterangan'];

    $query = $conn->prepare("INSERT INTO kategori (nama_kategori, keterangan) VALUES (?, ?)");
    $query->bind_param("ss", $nama, $ket);

    if ($query->execute()) {
        header("Location: daftar_kategori.php?msg=added");
    } else {
        header("Location: daftar_kategori.php?msg=error");
    }
    exit;
}

// ========== UPDATE ==========
if (isset($_POST['update'])) {

    $id   = $_POST['id_kategori'];
    $nama = $_POST['nama_kategori'];
    $ket  = $_POST['keterangan'];

    $query = $conn->prepare("UPDATE kategori SET nama_kategori=?, keterangan=? WHERE id_kategori=?");
    $query->bind_param("ssi", $nama, $ket, $id);

    if ($query->execute()) {
        header("Location: daftar_kategori.php?msg=updated");
    } else {
        header("Location: daftar_kategori.php?msg=error");
    }
    exit;
}

// ========== DELETE ==========
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    $query = $conn->prepare("DELETE FROM kategori WHERE id_kategori=?");
    $query->bind_param("i", $id);

    if ($query->execute()) {
        header("Location: daftar_kategori.php?msg=deleted");
    } else {
        header("Location: daftar_kategori.php?msg=error");
    }
    exit;
}
?>
