<?php
// ============================================================
// File: views/otentikasi_pegawai/login_pegawai.php
// ============================================================

// Include path & konfigurasi
require_once __DIR__ . '/../../includes/path.php';
require_once INCLUDES_PATH . 'config.php';

// Mulai sesi
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika pegawai sudah login
if (isset($_SESSION['role']) && $_SESSION['role'] === 'pegawai') {
    header("Location: " . BASE_URL . "dashboard.php?hal=dashboard_pegawai");
    exit;
}

// Ambil pesan error
$error = $_GET['pesan'] ?? '';
?>
<style>
.login-wrapper {
    min-height: calc(100vh - 100px);
    display: flex;
    justify-content: center;
    align-items: center;
}
.toggle-password {
    position: absolute;
    right: 15px;
    top: 38px;
    cursor: pointer;
    color: #777;
}
</style>

<div class="login-wrapper">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-lg border-0">
          <div class="card-body p-4">
            <h3 class="text-center mb-4">Login Pegawai</h3>

            <?php if ($error): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <!-- FORM LOGIN -->
            <form method="POST" action="?hal=proses_login_pegawai">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
              </div>

              <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <span class="toggle-password" onclick="togglePassword()">👁️</span>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-warning">Login</button>
              </div>
            </form>

            <div class="text-center mt-3">
              <a href="<?= BASE_URL ?>">← Kembali ke Beranda</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function togglePassword() {
  const pass = document.getElementById('password');
  pass.type = pass.type === 'password' ? 'text' : 'password';
}
</script>
