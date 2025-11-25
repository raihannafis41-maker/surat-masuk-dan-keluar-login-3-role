<?php
// ===============================================
// File: pages/landing/hero.php (Versi X)
// Deskripsi: Hero futuristik dengan animasi modern
// ===============================================
?>

<style>
/* WRAPPER UTAMA */
.hero-x {
    position: relative;
    padding: 110px 20px;
    border-radius: 16px;
    overflow: hidden;
    background: linear-gradient(135deg, #4c1d95, #9333ea, #ec4899);
    color: white;
    text-align: center;
}

/* ORNAMEN MELINGKAR */
.hero-x::before,
.hero-x::after {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
    filter: blur(10px);
    animation: float ease-in-out 6s infinite;
}

.hero-x::before {
    top: -80px;
    left: -120px;
    animation-delay: 0s;
}

.hero-x::after {
    bottom: -80px;
    right: -120px;
    animation-delay: 2s;
}

/* ANIMASI FLOAT */
@keyframes float {
    0% { transform: translateY(0px) scale(1); }
    50% { transform: translateY(-25px) scale(1.05); }
    100% { transform: translateY(0px) scale(1); }
}

/* TEKS UTAMA */
.hero-x-title {
    font-size: 2.8rem;
    font-weight: 800;
    letter-spacing: -1px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    animation: fadeInDown 1.1s ease;
}

.hero-x-sub {
    font-size: 1.2rem;
    margin-top: 10px;
    opacity: 0.95;
    animation: fadeIn 1.4s ease;
}

/* ILUSTRASI ICON MELAYANG */
.hero-floating-icons {
    position: relative;
    margin-top: 35px;
    animation: fadeIn 1.6s ease;
}

.hero-icon {
    position: absolute;
    font-size: 42px;
    opacity: 0.55;
    animation: float 6s infinite ease-in-out;
}

.icon-1 { left: 25%; top: -20px; animation-delay: 0.2s; }
.icon-2 { right: 22%; top: 20px; animation-delay: 1s; }
.icon-3 { left: 50%; top: 80px; animation-delay: 1.8s; }

/* TOMBOL */
.hero-x-btn {
    margin-top: 40px;
    padding: 13px 32px;
    background: #ffffff;
    color: #7b2cf5;
    font-weight: 700;
    border-radius: 10px;
    border: none;
    font-size: 1.05rem;
    transition: 0.25s ease;
    box-shadow: 0 4px 12px rgba(255,255,255,0.25);
    animation: fadeInUp 1.4s ease;
}

.hero-x-btn:hover {
    background: #ffe5f8;
    color: #d63384;
    transform: translateY(-4px);
}

/* ANIMASI */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-25px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(25px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="container my-4">
    <div class="hero-x">

        <h1 class="hero-x-title">
            Sistem Surat Masuk & Surat Keluar Modern
        </h1>

        <p class="hero-x-sub">
            Pengelolaan surat yang cepat, aman, futuristik, dan terintegrasi dalam satu platform digital.
        </p>

        <!-- ICON MELAYANG -->
        <div class="hero-floating-icons">
            <i class="fas fa-envelope-open-text hero-icon icon-1"></i>
            <i class="fas fa-paper-plane hero-icon icon-2"></i>
            <i class="fas fa-file-signature hero-icon icon-3"></i>
        </div>

        <a href="surat.php" class="hero-x-btn">
            🚀 Mulai Kelola Surat
        </a>

    </div>
</div>
