<?php
// ============================================================
// File: views/otentikasi_user/login_user.php
// ============================================================

require_once __DIR__ . '/../../includes/path.php';
require_once INCLUDES_PATH . 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika sudah login → arahkan sesuai role
if (!empty($_SESSION['role'])) {

    if ($_SESSION['role'] === 'admin') {
        header("Location: " . BASE_URL . "dashboard.php?hal=dashboard_user");
        exit;
    }

    if ($_SESSION['role'] === 'petugas') {
        header("Location: " . BASE_URL . "dashboard.php?hal=dashboard_petugas");
        exit;
    }
}

$error = $_GET['pesan'] ?? '';

?>
<style>
.login-wrapper {
    min-height: calc(100vh - 50px);
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
            <h3 class="text-center mb-4">Login User / Petugas</h3>

            <?php if ($error): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="?hal=proses_login_user">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>

              <div class="mb-3 position-relative">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
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
  const pass = document.getElementById("password");
  pass.type = pass.type === "password" ? "text" : "password";
}
</script>
