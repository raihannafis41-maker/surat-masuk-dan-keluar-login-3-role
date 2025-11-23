<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak | Aplikasi Surat Masuk & Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: auto;
            margin-top: 30px;
            display: flex;
            gap: 20px;
        }
        .content {
            flex: 3;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .sidebar {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2, h3 {
            margin-top: 0;
        }
        ul li {
            margin-bottom: 7px;
        }
        .tag {
            display: inline-block;
            background: #b52dd9;
            color: white;
            padding: 3px 8px;
            border-radius: 5px;
            margin: 3px 0;
            font-size: 12px;
        }
        .status {
            font-weight: bold;
            padding: 3px 6px;
            border-radius: 4px;
            color: white;
        }
        .active {
            background: green;
        }
        footer {
            margin-top: 40px;
            background: #fff;
            padding: 15px;
            text-align: center;
            color: #555;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Konten Utama -->
    <div class="content">
        <h2>Kontak Kami</h2>
        <p>Jika Anda membutuhkan bantuan terkait penggunaan Sistem Administrasi Surat Masuk dan Surat Keluar SMK, silakan hubungi kami melalui informasi berikut:</p>

        <ul>
            <li>Email Resmi: <a href="mailto:admin@smk-rpl.sch.id">admin@smk-rpl.sch.id</a></li>
            <li>Telepon/WA: +62 812 3456 7890</li>
            <li>Alamat Kantor: Jl. Administrasi No.123, Kota Contoh, Indonesia</li>
        </ul>

        <p>Tim kami siap membantu terkait:</p>
        <ul>
            <li>Pencatatan dan pengarsipan surat masuk</li>
            <li>Pembuatan dan pendistribusian surat keluar</li>
            <li>Masalah akun pengguna</li>
            <li>Kendala teknis pada sistem</li>
        </ul>

        <p>Anda juga dapat mengirim pesan melalui formulir kontak (opsional) untuk kebutuhan lebih spesifik.</p>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Informasi Sistem</h3>
        <p>
            Sistem Administrasi Surat Masuk & Surat Keluar SMK.<br>
            Mengelola data surat secara cepat, akurat, dan terstruktur.
        </p>

        <h4>Kategori Surat</h4>
        <span class="tag">Undangan</span>
        <span class="tag">Pemberitahuan</span>
        <span class="tag">Laporan</span>
        <span class="tag">Permohonan</span>
        <span class="tag">Penting</span>

        <h4>Status Sistem</h4>
        <span class="status active">Aktif</span> Sistem berjalan normal. <br>
        Jam Operasional: 07.00 – 16.00 WIB
    </div>

</div>

<footer>
    © 2025 Aplikasi Surat Masuk & Surat Keluar — SMKN 1 Karang Baru
</footer>

</body>
</html>
