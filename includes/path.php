<?php
// ===========================================================
// File: includes/path.php (FINAL STABLE VERSION)
// ===========================================================

// Path root (Windows/Linux friendly)
$root_path = realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR;

define('BASE_PATH', $root_path);
define('INCLUDES_PATH', BASE_PATH . 'includes' . DIRECTORY_SEPARATOR);
define('PAGES_PATH', BASE_PATH . 'pages' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', BASE_PATH . 'views' . DIRECTORY_SEPARATOR);
define('UPLOADS_PATH', BASE_PATH . 'uploads' . DIRECTORY_SEPARATOR);

// ===========================================================
// BASE_URL Selalu Mengarah ke Folder Project (FIX FINAL)
// ===========================================================
if (!defined('BASE_URL')) {

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        ? "https://"
        : "http://";

    $host = $_SERVER['HTTP_HOST'];

    // folder project (bukan file php)
    $folder = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']), '/');

    // base url final
    define('BASE_URL', $protocol . $host . $folder . '/');
}

// ===========================================================
// Cek folder assets
// ===========================================================
$asset_path = BASE_PATH . 'assets' . DIRECTORY_SEPARATOR;

if (!is_dir($asset_path)) {
    echo "<div style='padding:10px;background:#ffdddd;border-left:4px solid red;margin:10px;'>";
    echo "<b>PERINGATAN:</b> Folder <code>assets/</code> tidak ditemukan!<br>";
    echo "Pastikan struktur: <code>project/assets/</code> sudah benar.";
    echo "</div>";
}

// Upload folders
define('UPLOAD_DISPOSISI', UPLOADS_PATH . 'disposisi' . DIRECTORY_SEPARATOR);
define('UPLOAD_KOMENTAR', UPLOADS_PATH . 'komentar' . DIRECTORY_SEPARATOR);
define('UPLOAD_USER', UPLOADS_PATH . 'user' . DIRECTORY_SEPARATOR);

?>
