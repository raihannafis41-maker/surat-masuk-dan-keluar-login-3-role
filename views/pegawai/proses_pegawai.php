<?php
session_start();
require_once "../../includes/koneksi.php";

if (isset($_POST['edit'])) {

    $id = $_POST['id_pegawai'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama_pegawai'];
    $jabatan = $_POST['jabatan'];
    $golongan = $_POST['golongan'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // --- upload foto wajib ---
    $fotoBaru = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $ext = strtolower(pathinfo($fotoBaru, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $allowed)) {
        echo "<script>alert('Format foto tidak valid!'); history.back();</script>";
        exit;
    }

    $namaFile = "pegawai_" . time() . "." . $ext;
    move_uploaded_file($tmp, "../../uploads/pegawai/" . $namaFile);

    // password optional
    if ($password == "") {
        $query = "UPDATE pegawai SET 
                    nip='$nip',
                    nama_pegawai='$nama',
                    jabatan='$jabatan',
                    golongan='$golongan',
                    username='$username',
                    foto='$namaFile'
                  WHERE id_pegawai='$id'";
    } else {
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE pegawai SET 
                    nip='$nip',
                    nama_pegawai='$nama',
                    jabatan='$jabatan',
                    golongan='$golongan',
                    username='$username',
                    password='$passHash',
                    foto='$namaFile'
                  WHERE id_pegawai='$id'";
    }

    if ($conn->query($query)) {
        echo "<script>alert('Profil berhasil diperbarui'); window.location='tampilan_pegawai.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan perubahan'); history.back();</script>";
    }
}
