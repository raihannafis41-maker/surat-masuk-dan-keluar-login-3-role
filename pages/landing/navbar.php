<?php
$hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';
?>

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white ultra-mini-navbar">
    <div class="container">

        <!-- Brand -->
        <a href="<?= BASE_URL ?>" class="navbar-brand d-flex align-items-center">
            <img src="<?= BASE_URL ?>assets/img/logo_rpl.png"
                alt="Logo"
                class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-bold ml-1"><?= $site_name ?></span>
        </a>

        <!-- Burger Menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- LEFT MENU -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=home" class="nav-link <?= ($hal == 'home') ? 'active' : '' ?>">Beranda</a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=kategori" class="nav-link <?= ($hal == 'kategori') ? 'active' : '' ?>">Kategori Surat</a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=tentang" class="nav-link <?= ($hal == 'tentang') ? 'active' : '' ?>">Tentang</a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=kontak" class="nav-link <?= ($hal == 'kontak') ? 'active' : '' ?>">Kontak</a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=hashbycrypt" class="nav-link <?= ($hal == 'hashbycrypt') ? 'active' : '' ?>">Hash BCRYPT</a>
                </li>
            </ul>

            <!-- RIGHT MENU -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-1">
                    <a href="<?= BASE_URL ?>?hal=login_pegawai" class="btn btn-primary btn-sm <?= ($hal == 'login_pegawai') ? 'active' : '' ?>">
                        <i class="fas fa-user"></i> Pegawai
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=login_user" class="btn btn-danger btn-sm <?= ($hal == 'login_user') ? 'active' : '' ?>">
                        <i class="fas fa-user-shield"></i> User
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
