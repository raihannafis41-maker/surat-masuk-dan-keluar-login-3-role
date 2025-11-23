<?php
$server = "localhost";
$user   = "root";
$pass   = "";
$db     = "surat_masuk_dan_keluar_punya_raihan"; // ← perbaikan nama database

$koneksi = mysqli_connect($server, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
