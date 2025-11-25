<?php
// ===============================================
// SIDEBAR KANAN – Versi Futuristik X
// ===============================================

$kategori = [
    "Undangan",
    "Pemberitahuan",
    "Laporan",
    "Permohonan",
    "Penting"
];
?>

<style>
/* WRAPPER CARD */
.sidebar-x {
    background: rgba(255,255,255,0.72);
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 6px 22px rgba(0,0,0,0.08);
    backdrop-filter: blur(12px);
    border: solid 1px rgba(255,255,255,0.4);
    animation: fadeIn 0.8s ease;
}

/* JUDUL */
.sidebar-x h5, 
.sidebar-x h6 {
    font-weight: 700;
    color: #3b0764;
}

/* TAG CLOUD */
.sidebar-tag {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.sidebar-tag span {
    background: #9333ea;
    color: white;
    padding: 6px 12px;
    border-radius: 30px;
    font-size: 12px;
    transition: 0.25s;
    animation: floatTag 6s ease-in-out infinite;
}

.sidebar-tag span:hover {
    background: #c026d3;
    transform: translateY(-4px);
}

/* ANIMASI TAG */
@keyframes floatTag {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-4px); }
    100% { transform: translateY(0px); }
}

/* STATUS BADGE */
.status-active {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #16a34a;
    color: white;
    padding: 6px 12px;
    border-radius: 30px;
    font-size: 12px;
    animation: pulseActive 1.5s infinite;
}

/* DOT MENYALA */
.status-dot {
    width: 10px;
    height: 10px;
    background: #22c55e;
    border-radius: 50%;
    box-shadow: 0 0 8px #22c55e;
}

/* ANIMASI STATUS */
@keyframes pulseActive {
    0% { transform: scale(1); }
    50% { transform: scale(1.08); }
    100% { transform: scale(1); }
}

/* ANIMASI MASUK */
@keyframes fadeIn {
    from { opacity: 0; transform: translateX(15px); }
    to { opacity: 1; transform: translateX(0); }
}
</style>

<div class="sidebar-x">

    <!-- INFORMASI -->
    <h5><i class="fas fa-info-circle"></i> Informasi</h5>
    <p class="text-muted small">
        Sistem Administrasi Surat Masuk & Surat Keluar.<br>
        Mempermudah pencatatan, pelacakan & arsip surat.
    </p>

    <hr>

    <!-- KATEGORI -->
    <h6><i class="fas fa-tags"></i> Kategori Surat</h6>
    <div class="sidebar-tag mt-2">
        <?php foreach ($kategori as $kat): ?>
            <span><?= htmlspecialchars($kat) ?></span>
        <?php endforeach; ?>
    </div>

    <hr>

    <!-- STATUS SISTEM -->
    <h6><i class="fas fa-signal"></i> Status Sistem</h6>

    <div class="mt-2">
        <span class="status-active">
            <div class="status-dot"></div> Aktif
        </span>
    </div>

    <p class="small text-muted mt-2">
        Jam operasional: 07.00 – 16.00 WIB
    </p>

</div>
