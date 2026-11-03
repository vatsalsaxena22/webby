<?php

require_once __DIR__ . '/../includes/theme.php';

function admin_layout_start(string $title, string $description, string $active): void
{
    $theme = site_theme();
    $navigation = [
        'dashboard' => ['Dashboard', '/admin/', 'fa-solid fa-chart-pie'],
        'projects' => ['Projects', '/admin/projects.php', 'fa-solid fa-layer-group'],
        'submissions' => ['Enquiries', '/admin/submissions.php', 'fa-solid fa-inbox'],
        'settings' => ['Business settings', '/admin/settings.php', 'fa-solid fa-sliders'],
    ];
    ?>
    <!doctype html>
    <html lang="en" data-theme="<?= e($theme['mode']); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= e($title); ?> — <?= e(APP_NAME); ?> Admin</title>
        <meta name="theme-color" content="<?= e($theme['primary']); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
        <?php render_site_theme($theme); ?>
        <link rel="stylesheet" href="<?= e(asset('css/app.css')); ?>">
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
        <aside class="fixed inset-y-0 left-0 z-30 hidden w-64 flex-col border-r border-slate-200 bg-white md:flex">
            <a href="<?= e(app_url('/admin/')); ?>" class="flex h-20 items-center gap-3 border-b border-slate-100 px-6">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 font-display text-lg font-extrabold text-white"><?= e(mb_strtoupper(mb_substr(APP_NAME, 0, 1))); ?></span>
                <span>
                    <span class="block font-display text-base font-extrabold text-slate-950"><?= e(APP_NAME); ?></span>
                    <span class="block text-xs font-medium text-slate-500">Control panel</span>
                </span>
            </a>
            <nav class="flex-1 space-y-1 px-3 py-6" aria-label="Admin navigation">
                <p class="px-3 pb-3 text-xs font-bold uppercase tracking-wider text-slate-400">Workspace</p>
                <?php foreach ($navigation as $key => [$label, $path, $icon]): ?>
                    <a href="<?= e(app_url($path)); ?>" class="<?= $active === $key ? 'bg-brand-50 font-semibold text-brand-800' : 'font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-950'; ?> flex items-center gap-3 rounded-xl px-3 py-3 text-sm transition">
                        <i class="<?= e($icon); ?> w-5 text-center <?= $active === $key ? 'text-brand-600' : 'text-slate-400'; ?>" aria-hidden="true"></i>
                        <?= e($label); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
            <div class="border-t border-slate-100 p-4">
                <a href="<?= e(app_url('/')); ?>" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-950">
                    <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center text-slate-400" aria-hidden="true"></i>
                    View website
                </a>
                <div class="mt-2 flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-sm font-bold text-slate-700"><?= e(mb_strtoupper(mb_substr(admin_user()['email'] ?? 'A', 0, 1))); ?></span>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-xs font-semibold text-slate-800"><?= e(admin_user()['email'] ?? 'Administrator'); ?></p>
                        <a href="<?= e(app_url('/admin/logout.php')); ?>" class="text-xs text-slate-500 hover:text-red-600">Sign out</a>
                    </div>
                </div>
            </div>
        </aside>

        <div id="admin-sidebar-backdrop" class="fixed inset-0 z-40 hidden bg-slate-950/50 md:hidden" aria-hidden="true"></div>
        <aside id="admin-mobile-sidebar" class="fixed inset-y-0 left-0 z-50 flex w-[min(18rem,85vw)] -translate-x-full flex-col border-r border-slate-200 bg-white shadow-2xl transition-transform duration-200 md:hidden" aria-label="Mobile admin sidebar" aria-hidden="true" inert>
            <div class="flex h-20 items-center justify-between border-b border-slate-100 px-5">
                <a href="<?= e(app_url('/admin/')); ?>" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 font-display text-lg font-extrabold text-white"><?= e(mb_strtoupper(mb_substr(APP_NAME, 0, 1))); ?></span>
                    <span><span class="block font-display text-base font-extrabold text-slate-950"><?= e(APP_NAME); ?></span><span class="block text-xs font-medium text-slate-500">Control panel</span></span>
                </a>
                <button id="admin-sidebar-close" type="button" class="flex h-10 w-10 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 hover:text-slate-900" aria-label="Close navigation menu">
                    <i class="fa-solid fa-xmark text-lg" aria-hidden="true"></i>
                </button>
            </div>
            <nav class="flex-1 space-y-1 px-3 py-6" aria-label="Admin navigation">
                <p class="px-3 pb-3 text-xs font-bold uppercase tracking-wider text-slate-400">Workspace</p>
                <?php foreach ($navigation as $key => [$label, $path, $icon]): ?>
                    <a href="<?= e(app_url($path)); ?>" class="<?= $active === $key ? 'bg-brand-50 font-semibold text-brand-800' : 'font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-950'; ?> flex items-center gap-3 rounded-xl px-3 py-3 text-sm transition">
                        <i class="<?= e($icon); ?> w-5 text-center <?= $active === $key ? 'text-brand-600' : 'text-slate-400'; ?>" aria-hidden="true"></i>
                        <?= e($label); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
            <div class="border-t border-slate-100 p-4">
                <a href="<?= e(app_url('/')); ?>" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-slate-600 hover:bg-slate-50">
                    <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center text-slate-400" aria-hidden="true"></i>View website
                </a>
                <div class="mt-2 flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-sm font-bold text-slate-700"><?= e(mb_strtoupper(mb_substr(admin_user()['email'] ?? 'A', 0, 1))); ?></span>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-xs font-semibold text-slate-800"><?= e(admin_user()['email'] ?? 'Administrator'); ?></p>
                        <a href="<?= e(app_url('/admin/logout.php')); ?>" class="text-xs text-slate-500 hover:text-red-600">Sign out</a>
                    </div>
                </div>
            </div>
        </aside>

        <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur md:hidden">
            <div class="flex h-16 items-center justify-between px-4">
                <a href="<?= e(app_url('/admin/')); ?>" class="flex items-center gap-2 font-display font-extrabold text-slate-950">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-500 text-white"><?= e(mb_strtoupper(mb_substr(APP_NAME, 0, 1))); ?></span>
                    <?= e(APP_NAME); ?> Admin
                </a>
                <button id="admin-sidebar-toggle" type="button" class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-700 transition hover:border-brand-200 hover:bg-brand-50 hover:text-brand-700" aria-label="Open navigation menu" aria-controls="admin-mobile-sidebar" aria-expanded="false">
                    <i class="fa-solid fa-bars text-lg" aria-hidden="true"></i>
                </button>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-4 py-8 pb-12 sm:px-6 lg:px-8 md:ml-64">
            <div class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-brand-600"><?= e(APP_NAME); ?> / Admin</p>
                <h1 class="mt-2 font-display text-3xl font-extrabold tracking-tight text-slate-950"><?= e($title); ?></h1>
                <p class="mt-2 text-sm leading-6 text-slate-600"><?= e($description); ?></p>
            </div>
            <?php if ($message = admin_flash('error')): ?>
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?= e($message); ?></div>
            <?php endif; ?>
            <?php if ($message = admin_flash('success')): ?>
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800" role="status"><?= e($message); ?></div>
            <?php endif; ?>
    <?php
}

function admin_layout_end(): void
{
    ?>
        </main>
        <script>
            (() => {
                const sidebar = document.getElementById('admin-mobile-sidebar');
                const backdrop = document.getElementById('admin-sidebar-backdrop');
                const toggle = document.getElementById('admin-sidebar-toggle');
                const closeButton = document.getElementById('admin-sidebar-close');

                if (!sidebar || !backdrop || !toggle || !closeButton) return;

                const closeSidebar = () => {
                    sidebar.classList.add('-translate-x-full');
                    backdrop.classList.add('hidden');
                    sidebar.querySelector(':focus')?.blur();
                    toggle.focus();
                    sidebar.setAttribute('inert', '');
                    sidebar.setAttribute('aria-hidden', 'true');
                    toggle.setAttribute('aria-expanded', 'false');
                    document.body.classList.remove('overflow-hidden');
                };

                const openSidebar = () => {
                    sidebar.classList.remove('-translate-x-full');
                    backdrop.classList.remove('hidden');
                    sidebar.setAttribute('aria-hidden', 'false');
                    sidebar.removeAttribute('inert');
                    toggle.setAttribute('aria-expanded', 'true');
                    document.body.classList.add('overflow-hidden');
                    closeButton.focus();
                };

                toggle.addEventListener('click', openSidebar);
                closeButton.addEventListener('click', closeSidebar);
                backdrop.addEventListener('click', closeSidebar);
                sidebar.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeSidebar));
                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
                        closeSidebar();
                    }
                });
            })();
        </script>
    </body>
    </html>
    <?php
}
