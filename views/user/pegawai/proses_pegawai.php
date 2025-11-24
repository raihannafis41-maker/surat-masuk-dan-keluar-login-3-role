<?php
include '../../../koneksi.php';
session_start();

// ==========================
// CREATE PEGAWAI
// ==========================
if (isset($_POST['tambah'])) {

    $nip    = $_POST['nip'];
    $nama   = $_POST['nama_pegawai'];
    $jab    = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $telp   = $_POST['no_telp'];
    $email  = $_POST['email'];

    $query = $conn->prepare("INSERT INTO pegawai (nip, nama_pegawai, jabatan, alamat, no_telp, email)
                             VALUES (?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssssss", $nip, $nama, $jab, $alamat, $telp, $email);

    if ($query->execute()) {
        header("Location: daftar_pegawai.php?msg=added");
    } else {
        header("Location: daftar_pegawai.php?msg=error");
    }
    exit;
}


// ==========================
// UPDATE PEGAWAI
// ==========================
if (isset($_POST['update'])) {

    $id     = $_POST['id_pegawai'];
    $nip    = $_POST['nip'];
    $nama   = $_POST['nama_pegawai'];
    $jab    = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $telp   = $_POST['no_telp'];
    $email  = $_POST['email'];

    $query = $conn->prepare("UPDATE pegawai SET 
                                nip=?, nama_pegawai=?, jabatan=?, alamat=?, no_telp=?, email=?
                             WHERE id_pegawai=?");
    $query->bind_param("ssssssi", $nip, $nama, $jab, $alamat, $telp, $email, $id);

    if ($query->execute()) {
        header("Location: daftar_pegawai.php?msg=updated");
    } else {
        header("Location: daftar_pegawai.php?msg=error");
    }
    exit;
}


// ==========================
// DELETE PEGAWAI
// ==========================
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    $query = $conn->prepare("DELETE FROM pegawai WHERE id_pegawai=?");
    $query->bind_param("i", $id);

    if ($query->execute()) {
        header("Location: daftar_pegawai.php?msg=deleted");
    } else {
        header("Location: daftar_pegawai.php?msg=error");
    }
    exit;
}

?>
