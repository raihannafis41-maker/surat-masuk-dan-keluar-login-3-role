<?php
// HEADER LANDING (Modern + Animasi)
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $site_name ?> - Sistem Surat Masuk & Keluar</title>

    <meta name="description" content="Aplikasi Surat Masuk dan Surat Keluar Modern">
    <meta name="keywords" content="surat masuk, surat keluar, disposisi, aplikasi surat, tracking surat">
    <meta name="author" content="<?= $site_name ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $base_url ?>/assets/plugins/fontawesome-free/css/all.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?= $base_url ?>/assets/dist/css/adminlte.min.css">

    <!-- Custom Landing CSS -->
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/landing.css">

    <!-- Modern Animated Header Styles -->
    <style>
        body {
            scroll-behavior: smooth;
        }

        /* Gradient Background */
        .header-hero {
            width: 100%;
            padding: 90px 0 70px;
            background: linear-gradient(135deg, #ff9fd5, #b38bff, #7ed2ff);
            background-size: 300% 300%;
            animation: gradientMove 15s ease infinite;
            text-align: center;
            color: white;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Title Animation */
        .hero-title {
            font-size: 40px;
            font-weight: 800;
            text-shadow: 0px 3px 8px rgba(0,0,0,0.25);
            animation: fadeUp 1s ease;
        }

        .hero-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-top: 10px;
            animation: fadeUp 1.3s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Button */
        .btn-hero {
            margin-top: 22px;
            padding: 10px 28px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            border: none;
            background: rgba(255,255,255,0.25);
            backdrop-filter: blur(8px);
            transition: 0.3s;
        }

        .btn-hero:hover {
            background: rgba(255,255,255,0.45);
            transform: translateY(-3px);
        }

        /* Spacing fix so content not covered by navbar */
        .content-wrapper {
            margin-top: 80px !important;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

