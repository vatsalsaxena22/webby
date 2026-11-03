<?php
require_once __DIR__ . '/../includes/site.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_name('webby_admin');
    session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax', 'secure' => (!is_development())]);
    session_start();
}
function admin_user(): ?array { return $_SESSION['admin_user'] ?? null; }
function require_admin(): void { if (!admin_user()) { header('Location: ' . app_url('/admin/login.php')); exit; } }
function admin_flash(string $key, ?string $value = null): ?string { if ($value !== null) { $_SESSION['flash'][$key] = $value; return null; } $v = $_SESSION['flash'][$key] ?? null; unset($_SESSION['flash'][$key]); return $v; }
function admin_upload(string $field): ?string {
    if (!isset($_FILES[$field]) || $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) return null;
    if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK || $_FILES[$field]['size'] > 3 * 1024 * 1024) throw new RuntimeException('Upload failed or exceeds 3 MB.');
    $info = @getimagesize($_FILES[$field]['tmp_name']);
    $types = ['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp','image/gif'=>'gif'];
    if (!$info || !isset($types[$info['mime']])) throw new RuntimeException('Upload a valid JPG, PNG, WebP, or GIF image.');
    $dir = UPLOADS_PATH; if (!is_dir($dir) && !mkdir($dir, 0755, true)) throw new RuntimeException('Cannot create upload directory.');
    $name = bin2hex(random_bytes(16)) . '.' . $types[$info['mime']];
    if (!move_uploaded_file($_FILES[$field]['tmp_name'], $dir . '/' . $name)) throw new RuntimeException('Could not save upload.');
    return 'uploads/' . $name;
}
