<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require_once "$root/koneksi.php";

$aksi = $_POST['aksi'];
$folder = "$root/uploads/";

// upload foto
$fotoBaru = "";
if (!empty($_FILES['foto_admin']['name'])) {
    $namaFile = time() . "_" . $_FILES['foto_admin']['name'];
    move_uploaded_file($_FILES['foto_admin']['tmp_name'], $folder . $namaFile);
    $fotoBaru = $namaFile;
}

if ($aksi == "tambah") {

    $username   = $_POST['username'];
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama       = $_POST['nama_admin'];
    $no_hp      = $_POST['no_hp'];
    $email      = $_POST['email'];

    $foto = $fotoBaru ?: "default.png";

    mysqli_query($koneksi, "
        INSERT INTO admin (username, password, nama_admin, no_hp, email, foto_admin)
        VALUES ('$username', '$password', '$nama', '$no_hp', '$email', '$foto')
    ");

    header("Location: admin.php");
    exit;

}

if ($aksi == "edit") {

    $id = $_POST['id'];

    $username   = $_POST['username'];
    $nama       = $_POST['nama_admin'];
    $no_hp      = $_POST['no_hp'];
    $email      = $_POST['email'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $pass_sql = ", password='$password'";
    } else {
        $pass_sql = "";
    }

    if (!empty($fotoBaru)) {
        // hapus foto lama
        $q = mysqli_query($koneksi, "SELECT foto_admin FROM admin WHERE id_admin='$id'");
        $d = mysqli_fetch_assoc($q);

        if (!empty($d['foto_admin']) && file_exists($folder . $d['foto_admin'])) {
            unlink($folder . $d['foto_admin']);
        }

        $foto_sql = ", foto_admin='$fotoBaru'";
    } else {
        $foto_sql = "";
    }

    mysqli_query($koneksi, "
        UPDATE admin SET 
            username='$username',
            nama_admin='$nama',
            no_hp='$no_hp',
            email='$email'
            $pass_sql
            $foto_sql
        WHERE id_admin='$id'
    ");

    header("Location: admin.php");
    exit;
}
?>
