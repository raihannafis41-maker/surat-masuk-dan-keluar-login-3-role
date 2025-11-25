<?php
$namauser = $_SESSION['nama_pegawai'] ?? 'Pegawai';
$role     = $_SESSION['role'] ?? 'Pegawai';
$foto     = $_SESSION['foto'] ?? 'default.png';

$logout_url = BASE_URL . '?hal=logout_pegawai';
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle"></i> Profil
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="../../views/pegawai/tampilan_pegawai.php" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Lihat Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="../../views/otentikasi_pegawai/logout_pegawai.php" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>

    </ul>

</nav>