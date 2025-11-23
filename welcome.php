<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Surat Masuk & Surat Keluar</title>

  <!-- AdminLTE & Bootstrap -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    body {
      background-color: #f9f4f7ff;
    }
    .hero {
      position: relative;
      background: url('foto/smkn1karangbaru.jpg') no-repeat center center/cover;
      height: 300px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero::after {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.4);
    }
    .hero-content {
      position: relative;
      z-index: 1;
    }
    .hero h1 {
      font-weight: bold;
    }
    .navbar-custom {
      background-color: #8a1e3eff;
    }
    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand {
      color: #ffffffff !important;
    }
    .btn-login {
      border-radius: 30px;
      font-weight: bold;
    }
    footer {
      background-color: #8a1e59ff;
      color: white;
      text-align: center;
      padding: 15px 0;
      margin-top: 30px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
      <a class="navbar-brand font-weight-bold" href="#">Surat Masuk & Keluar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon text-white"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Kontak</a></li>

          <!-- Login diarahkan ke folder views -->
          <li class="nav-item">
            <a href="views/admin/loginadmin.php" class="btn btn-light btn-sm mx-2 btn-login">
              <i class="fas fa-user-shield"></i> Login Admin
            </a>
          </li>
          <li class="nav-item">
            <a href="views/pegawai/loginpegawai.php" class="btn btn-warning btn-sm btn-login">
              <i class="fas fa-user"></i> Login Pegawai
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero">
    <div class="hero-content">
      <h1>Selamat Datang di Aplikasi Surat Masuk & Surat Keluar</h1>
      <p>Kelola surat dengan mudah, cepat, dan rapi</p>
      <a href="#surat" class="btn btn-primary btn-lg mt-2">Lihat Surat</a>
    </div>
  </div>

  <!-- Daftar Surat -->
  <section id="surat" class="container mt-5">
    <div class="text-center mb-4">
      <h2><b>Daftar Surat</b></h2>
      <p class="text-muted">Surat Masuk dan Surat Keluar</p>
    </div>

    <div class="row">
      <!-- Kartu Surat Masuk -->
      <div class="col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-envelope-open-text text-primary"></i> Surat Masuk</h4>
            <p class="text-muted">Lihat semua surat masuk yang telah diterima</p>
            <a href="views/suratmasuk/index.php" class="btn btn-primary btn-sm">Lihat Surat Masuk</a>
          </div>
        </div>
      </div>

      <!-- Kartu Surat Keluar -->
      <div class="col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-paper-plane text-success"></i> Surat Keluar</h4>
            <p class="text-muted">Lihat semua surat keluar yang telah dikirim</p>
            <a href="views/suratkeluar/index.php" class="btn btn-success btn-sm">Lihat Surat Keluar</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© <?php echo date("Y"); ?> Aplikasi Surat Masuk & Surat Keluar — SMKN 1 Karang Baru</p>
  </footer>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
</body>
</html>
