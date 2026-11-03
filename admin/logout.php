<?php require_once __DIR__ . '/bootstrap.php'; $_SESSION = []; session_destroy(); header('Location: ' . app_url('/admin/login.php')); exit;
