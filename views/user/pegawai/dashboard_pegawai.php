<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'pegawai') {
  session_unset();
  session_destroy();
  header("Location: ../../logout.php");
  exit;
}

require_once __DIR__ . "/../../koneksi.php";

$nama = htmlspecialchars($_SESSION['nama'] ?? 'Pegawai');
$id_pegawai = intval($_SESSION['id_pegawai'] ?? 0);

// ==========================
// INIT COUNTERS
// ==========================
$jumlahMasuk = 0;
$jumlahKeluar = 0;
$jumlahDisposisi = 0;

// Grafik B → Hari Ini, Minggu Ini, Bulan Ini
$grafik = [
  "hari_ini" => 0,
  "minggu_ini" => 0,
  "bulan_ini" => 0
];

// ------------------ SURAT MASUK ------------------
$q = $koneksi->query("
    SELECT COUNT(*) AS c FROM surat_masuk
");
$jumlahMasuk = $q ? intval($q->fetch_assoc()['c']) : 0;

// ------------------ SURAT KELUAR ------------------
$q = $koneksi->query("
    SELECT COUNT(*) AS c FROM surat_keluar
");
$jumlahKeluar = $q ? intval($q->fetch_assoc()['c']) : 0;

// ------------------ DISPOSISI UNTUK PEGAWAI ------------------
$q = $koneksi->query("
    SELECT COUNT(*) AS c FROM disposisi WHERE id_pegawai = $id_pegawai
");
$jumlahDisposisi = $q ? intval($q->fetch_assoc()['c']) : 0;

// ------------------ GRAFIK B ------------------
$q = $koneksi->query("
    SELECT 
        SUM(CASE WHEN DATE(tgl_surat) = CURDATE() THEN 1 END) AS hari,
        SUM(CASE WHEN YEARWEEK(tgl_surat, 1) = YEARWEEK(CURDATE(), 1) THEN 1 END) AS minggu,
        SUM(CASE WHEN MONTH(tgl_surat) = MONTH(CURDATE()) THEN 1 END) AS bulan
    FROM surat_masuk
");


if ($q) {
  $d = $q->fetch_assoc();
  $grafik["hari_ini"] = intval($d['hari']);
  $grafik["minggu_ini"] = intval($d['minggu']);
  $grafik["bulan_ini"] = intval($d['bulan']);
}

include "../../pages/pegawai/header_pegawai.php";
include "../../pages/pegawai/navbar_pegawai.php";
include "../../pages/pegawai/sidebar_pegawai.php";
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1 class="text-primary">Dashboard Pegawai</h1>
    <p>Selamat datang, <strong><?= $nama ?></strong> 👋</p>
  </section>

  <section class="content">

    <div class="row">

      <!-- Surat Masuk -->
      <div class="col-lg-4 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?= $jumlahMasuk ?></h3>
            <p>Surat Masuk</p>
          </div>
          <div class="icon"><i class="fas fa-inbox"></i></div>
        </div>
      </div>

      <!-- Surat Keluar -->
      <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $jumlahKeluar ?></h3>
            <p>Surat Keluar</p>
          </div>
          <div class="icon"><i class="fas fa-paper-plane"></i></div>
        </div>
      </div>

      <!-- Disposisi -->
      <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $jumlahDisposisi ?></h3>
            <p>Disposisi</p>
          </div>
          <div class="icon"><i class="fas fa-file-signature"></i></div>
        </div>
      </div>

    </div>

    <!-- ==== GRAFIK B (Bar Chart) ==== -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Aktivitas Surat — Pegawai</h3>
      </div>
      <div class="card-body">
        <canvas id="grafikPegawai"></canvas>
      </div>
    </div>

  </section>
</div>

<?php include "../../pages/pegawai/footer_pegawai.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  new Chart(document.getElementById("grafikPegawai"), {
    type: "bar",
    data: {
      labels: ["Hari Ini", "Minggu Ini", "Bulan Ini"],
      datasets: [{
        label: "Jumlah Surat Masuk",
        data: [
          <?= $grafik['hari_ini'] ?>,
          <?= $grafik['minggu_ini'] ?>,
          <?= $grafik['bulan_ini'] ?>
        ],
        backgroundColor: ["#007bff", "#28a745", "#ffc107"]
      }]
    },
    options: {
      responsive: true
    }
  });
</script>