<?php
session_start();
include "../../../koneksi.php";

// ====== CEK LOGIN ======
if (!isset($_SESSION['user_login'])) {
    header("Location: ../../../index.php");
    exit();
}

$uploadPath = "uploads/";  // relative path dari folder surat_masuk

// ======================================================
// ==================== FUNGSI UPLOAD ===================
// ======================================================

function uploadFile($uploadPath)
{
    $namaFile = $_FILES['file_surat']['name'];
    $tmp = $_FILES['file_surat']['tmp_name'];
    $error = $_FILES['file_surat']['error'];

    if ($error === 4) {
        return false; // tidak upload file baru
    }

    // Ambil ekstensi file
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    // Semua ekstensi diperbolehkan (ALL)

    // Buat nama baru unik
    $namaBaru = uniqid("surat_", true) . "." . $ext;

    // Pastikan folder upload ada
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Pindahkan file
    if (!move_uploaded_file($tmp, $uploadPath . $namaBaru)) {
        echo "<script>alert('Upload file gagal!');history.back();</script>";
        exit();
    }

    return $namaBaru;
}

// ======================================================
// ==================== TAMBAH DATA =====================
// ======================================================

if (isset($_POST['tambah'])) {

    $id_kategori = $_POST['id_kategori'];
    $tgl_surat   = $_POST['tgl_surat'];
    $no_surat    = $_POST['no_surat'];
    $tgl_kirim   = $_POST['tgl_kirim'];
    $pengirim    = $_POST['pengirim'];
    $perihal     = $_POST['perihal'];
    $isi         = $_POST['isi'];
    $status      = $_POST['status'];

    $fileUpload = uploadFile($uploadPath);

    $query = "INSERT INTO surat_masuk 
              (id_kategori, tgl_surat, no_surat, tgl_kirim, pengirim, perihal, isi, file_surat, status)
              VALUES 
              ('$id_kategori', '$tgl_surat', '$no_surat', '$tgl_kirim', '$pengirim', '$perihal', '$isi', '$fileUpload', '$status')";

    mysqli_query($koneksi, $query);

    header("Location: daftar_surat_masuk.php?status=success_tambah");
    exit();
}

// ======================================================
// ==================== UPDATE DATA =====================
// ======================================================

if (isset($_POST['update'])) {

    $id_surat_masuk = $_POST['id_surat_masuk'];
    $id_kategori = $_POST['id_kategori'];
    $tgl_surat   = $_POST['tgl_surat'];
    $no_surat    = $_POST['no_surat'];
    $tgl_kirim   = $_POST['tgl_kirim'];
    $pengirim    = $_POST['pengirim'];
    $perihal     = $_POST['perihal'];
    $isi         = $_POST['isi'];
    $status      = $_POST['status'];

    // Ambil file lama
    $q = mysqli_query($koneksi, "SELECT file_surat FROM surat_masuk WHERE id_surat_masuk='$id_surat_masuk'");
    $d = mysqli_fetch_assoc($q);
    $file_lama = $d['file_surat'];

    // Upload baru?
    $file_baru = uploadFile($uploadPath);

    if ($file_baru) {
        // Hapus file lama
        if ($file_lama && file_exists($uploadPath . $file_lama)) {
            unlink($uploadPath . $file_lama);
        }
        $fileFinal = $file_baru;
    } else {
        $fileFinal = $file_lama;
    }

    $query = "UPDATE surat_masuk SET
                id_kategori='$id_kategori',
                tgl_surat='$tgl_surat',
                no_surat='$no_surat',
                tgl_kirim='$tgl_kirim',
                pengirim='$pengirim',
                perihal='$perihal',
                isi='$isi',
                file_surat='$fileFinal',
                status='$status'
              WHERE id_surat_masuk='$id_surat_masuk'";

    mysqli_query($koneksi, $query);

    header("Location: daftar_surat_masuk.php?status=success_update");
    exit();
}

// ======================================================
// ====================== HAPUS DATA ====================
// ======================================================

if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    // Ambil file untuk dihapus
    $q = mysqli_query($koneksi, "SELECT file_surat FROM surat_masuk WHERE id_surat_masuk='$id'");
    $d = mysqli_fetch_assoc($q);

    if ($d['file_surat'] && file_exists($uploadPath . $d['file_surat'])) {
        unlink($uploadPath . $d['file_surat']);
    }

    mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE id_surat_masuk='$id'");

    header("Location: daftar_surat_masuk.php?status=success_hapus");
    exit();
}

?>
