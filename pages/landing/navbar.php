<?php
$hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';
?>

<style>
    /* ================= NAVBAR PREMIUM (FINAL) ================= */
    .navbar-modern {
        backdrop-filter: blur(14px);
        background: rgba(255, 255, 255, 0.25);
        border-bottom: 1px solid rgba(255, 255, 255, 0.25);
        transition: 0.35s ease-in-out;
        z-index: 1000;
        padding-top: 10px !important;
        padding-bottom: 10px !important;
    }

    .navbar-solid {
        background: #ffffff !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .dark-mode {
        background: #121212 !important;
        color: #f0f0f0 !important;
    }

    .dark-mode .navbar-modern,
    .dark-mode .navbar-solid {
        background: rgba(20, 20, 20, 0.85) !important;
    }

    .navbar-modern .nav-link {
        font-weight: 500;
        padding: 10px 16px;
        transition: 0.25s;
        color: #333;
    }

    .navbar-modern .nav-link:hover {
        color: #6a4bff;
        transform: translateY(-2px);
    }

    .navbar-modern .nav-link.active {
        color: #6a4bff !important;
        border-bottom: 2px solid #6a4bff;
    }

    .brand-image {
        width: 38px;
        height: 38px;
        transition: 0.3s;
        transform: rotate(-6deg);
    }

    .navbar-brand:hover .brand-image {
        transform: rotate(0deg) scale(1.05);
    }

    .btn-modern {
        border-radius: 20px;
        padding: 6px 18px;
        font-weight: 500;
        transition: 0.2s;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
    }

    .search-box {
        position: relative;
    }

    .search-input {
        width: 0;
        opacity: 0;
        border: none;
        border-radius: 20px;
        padding: 5px 14px;
        transition: 0.3s;
        background: rgba(255, 255, 255, 0.8);
    }

    .search-input.expanded {
        width: 180px;
        opacity: 1;
        border: 1px solid #d0d0d0;
    }

    .dark-mode .search-input {
        background: #222;
        color: white;
    }

    .dropdown-menu-modern {
        border-radius: 12px;
        padding: 10px;
        animation: dropdownFade 0.25s ease;
    }

    @keyframes dropdownFade {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dark-mode .dropdown-menu-modern {
        background: #222 !important;
        color: #fff !important;
    }

    /* FIX SPACING */
    body {
        padding-top: 85px;
    }

    .navbar-nav .nav-item {
        margin-left: 8px;
        margin-right: 8px;
    }
</style>

<nav id="navbarTop" class="navbar navbar-expand-md navbar-modern fixed-top shadow-sm">
    <div class="container">

        <a href="<?= BASE_URL ?>" class="navbar-brand d-flex align-items-center">
            <img src="<?= BASE_URL ?>assets/img/logo_rpl.png" class="brand-image" alt="Logo">
            <span class="ml-2 h5 mb-0 font-weight-bold"><?= $site_name ?></span>
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=home" class="nav-link <?= ($hal == 'home') ? 'active' : '' ?>">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($hal == 'kategori') ? 'active' : '' ?>" data-toggle="dropdown" href="#">
                        <i class="fas fa-folder-open mr-1"></i> Kategori Surat
                    </a>
                    <div class="dropdown-menu dropdown-menu-modern shadow">
                        <a class="dropdown-item" href="#">📨 Surat Masuk</a>
                        <a class="dropdown-item" href="#">📤 Surat Keluar</a>
                        <a class="dropdown-item" href="#">📁 Disposisi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= BASE_URL ?>?hal=kategori">➕ Lihat Semua Kategori</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=tracking_surat" class="nav-link <?= ($hal == 'tracking_surat') ? 'active' : '' ?>">
                        <i class="fas fa-search mr-1"></i> Tracking Surat
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=hashbycrypt" class="nav-link <?= ($hal == 'hashbycrypt') ? 'active' : '' ?>">
                        <i class="fas fa-key mr-1"></i> Hash BCRYPT
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=tentang" class="nav-link <?= ($hal == 'tentang') ? 'active' : '' ?>">
                        <i class="fas fa-info-circle mr-1"></i> Tentang
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=kontak" class="nav-link <?= ($hal == 'kontak') ? 'active' : '' ?>">
                        <i class="fas fa-envelope mr-1"></i> Kontak
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item mr-3 search-box">
                    <input type="text" placeholder="Cari surat..." class="search-input" id="searchInput">
                    <i class="fas fa-search" id="searchIcon" style="cursor:pointer;font-size:18px;"></i>
                </li>

                <li class="nav-item mr-3">
                    <i class="fas fa-moon" id="darkToggle" style="cursor:pointer;font-size:20px;"></i>
                </li>

                <li class="nav-item mr-2">
                    <a href="<?= BASE_URL ?>?hal=login_pegawai" class="btn btn-modern btn-primary">
                        <i class="fas fa-user"></i> Pegawai
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?hal=login_user" class="btn btn-modern btn-danger">
                        <i class="fas fa-user-shield"></i> User
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.addEventListener("scroll", function() {
        const navbar = document.getElementById("navbarTop");
        navbar.classList.toggle("navbar-solid", window.scrollY > 30);
    });

    document.getElementById("searchIcon").addEventListener("click", function() {
        const input = document.getElementById("searchInput");
        input.classList.toggle("expanded");
        input.focus();
    });

    document.getElementById("darkToggle").addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
    });
</script>