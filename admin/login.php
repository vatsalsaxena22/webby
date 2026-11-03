<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/../includes/theme.php';

if (admin_user()) {
    header('Location: ' . app_url('/admin/'));
    exit;
}

$theme = site_theme();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_valid($_POST['csrf'] ?? '')) {
        $error = 'Your session expired. Please try again.';
    } else {
        try {
            $count = (int) $pdo->query('SELECT COUNT(*) FROM admin_users')->fetchColumn();
            if ($count === 0) {
                $pdo->prepare('INSERT INTO admin_users (email, password_hash) VALUES (?, ?)')
                    ->execute([ADMIN_EMAIL, ADMIN_PASSWORD_HASH]);
            }

            $statement = $pdo->prepare('SELECT * FROM admin_users WHERE email = ? LIMIT 1');
            $statement->execute([strtolower(trim($_POST['email'] ?? ''))]);
            $user = $statement->fetch();

            if ($user && password_verify($_POST['password'] ?? '', $user['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION['admin_user'] = [
                    'id' => (int) $user['id'],
                    'email' => $user['email'],
                ];
                header('Location: ' . app_url('/admin/'));
                exit;
            }

            $error = 'Invalid email or password.';
        } catch (PDOException $exception) {
            $error = 'Unable to sign in. Check the database configuration and import database.sql.';
            error_log('Admin login error: ' . $exception->getMessage());
        }
    }
}

?><!doctype html>
<html lang="en" data-theme="<?= e($theme['mode']); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin sign in — <?= e(APP_NAME); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php render_site_theme($theme); ?>
    <link rel="stylesheet" href="<?= e(asset('css/app.css')); ?>">
</head>
<body class="grid min-h-screen place-items-center bg-slate-950 p-5 text-slate-900 antialiased">
    <main class="w-full max-w-md">
        <a href="<?= e(app_url('/')); ?>" class="mb-6 flex items-center justify-center gap-3 font-display text-xl font-bold text-white">
            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500 text-white">W</span>
            <?= e(APP_NAME); ?>
        </a>
        <form method="post" class="rounded-3xl border border-slate-200 bg-white p-7 shadow-2xl sm:p-9">
            <h1 class="font-display text-2xl font-bold text-slate-950">Admin sign in</h1>
            <p class="mt-2 text-sm leading-6 text-slate-600">Manage your website, portfolio projects, and enquiries.</p>

            <?php if ($error !== ''): ?>
                <p class="mt-5 rounded-xl border border-red-200 bg-red-50 p-3 text-sm text-red-700" role="alert"><?= e($error); ?></p>
            <?php endif; ?>

            <input type="hidden" name="csrf" value="<?= e(csrf_token()); ?>">
            <label class="mt-6 block text-sm font-semibold text-slate-700">
                Email
                <input required type="email" name="email" autocomplete="username" class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal text-slate-900 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
            </label>
            <label class="mt-4 block text-sm font-semibold text-slate-700">
                Password
                <input required type="password" name="password" autocomplete="current-password" class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal text-slate-900 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
            </label>
            <button class="mt-6 w-full rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-brand-600">Sign in</button>
            <a href="<?= e(app_url('/')); ?>" class="mt-5 block text-center text-sm font-medium text-slate-500 transition hover:text-brand-700">Back to website</a>
        </form>
    </main>
</body>
</html>
