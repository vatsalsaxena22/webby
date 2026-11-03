<?php

/**
 * Webby — Premium Shared Navigation
 */

$current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');

$nav_items = [
    ['label' => 'Home',     'href' => '/index.php',          'page' => 'index.php'],
    ['label' => 'About',    'href' => '/pages/about.php',    'page' => 'about.php'],
    ['label' => 'Services', 'href' => '/pages/services.php', 'page' => 'services.php'],
    ['label' => 'Projects', 'href' => '/pages/projects.php', 'page' => 'projects.php'],
];

$is_home = $current_page === 'index.php';
?>

<header id="site-header" class="fixed inset-x-0 top-0 z-50 px-3 pt-3 sm:px-5">
    <nav class="mx-auto w-full max-w-7xl" aria-label="Main navigation">
        <div
            id="navbar-container"
            class="relative flex min-h-16 items-center justify-between gap-3 rounded-2xl border border-slate-200/80 bg-white/90 px-3 shadow-[0_8px_32px_-16px_rgba(15,23,42,.25)] backdrop-blur-2xl transition-all duration-300 sm:px-5">

            <!-- Brand -->
            <a href="<?= e(app_url('/')); ?>"
                class="group flex min-w-0 shrink-0 items-center gap-2.5 rounded-xl outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2"
                aria-label="Webby home">
                <?= site_logo($site); ?>
            </a>

            <!-- Desktop navigation -->
            <div class="hidden items-center gap-1 lg:flex">
                <?php foreach ($nav_items as $item): ?>
                    <?php $active = $current_page === $item['page']; ?>
                    <a
                        href="<?= e(app_url($item['href'])); ?>"
                        <?= $active ? 'aria-current="page"' : ''; ?>
                        class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200 outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2
                        <?= $active
                            ? 'bg-slate-950 text-white shadow-md shadow-slate-950/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950'; ?>">
                        <?= e($item['label']); ?>
                        <?php if (!$active): ?>
                            <span aria-hidden="true" class="absolute inset-x-4 -bottom-px h-0.5 origin-left scale-x-0 rounded-full bg-brand-500 transition-transform duration-300 group-hover:scale-x-100"></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Desktop action -->
            <div class="hidden shrink-0 items-center lg:flex">
                <a href="<?= e(app_url('/pages/contact.php')); ?>"
                    class="group inline-flex min-h-11 items-center justify-center gap-2.5 rounded-xl bg-brand-600 px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-brand-600/20 transition duration-300 hover:-translate-y-0.5 hover:bg-slate-950 hover:shadow-slate-950/15 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2">
                    Let's talk
                    <span class="grid size-6 place-items-center rounded-lg bg-white/15 transition-transform duration-300 group-hover:translate-x-0.5" aria-hidden="true">
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </span>
                </a>
            </div>

            <!-- Mobile menu toggle -->
            <button
                id="mobile-menu-button"
                type="button"
                class="inline-flex size-11 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-800 shadow-sm transition hover:border-slate-300 hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 lg:hidden"
                aria-label="Open navigation menu"
                aria-expanded="false"
                aria-controls="mobile-menu">
                <i id="mobile-menu-icon" class="fa-solid fa-bars-staggered text-base" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Mobile panel -->
        <div
            id="mobile-menu"
            class="mt-2 hidden overflow-hidden rounded-2xl border border-slate-200/80 bg-white/95 p-3 opacity-0 shadow-[0_24px_60px_-24px_rgba(15,23,42,.35)] backdrop-blur-2xl transition duration-200 lg:hidden"
            aria-label="Mobile navigation">
            <div class="space-y-1">
                <?php foreach ($nav_items as $index => $item): ?>
                    <?php $active = $current_page === $item['page']; ?>
                    <a
                        href="<?= e(app_url($item['href'])); ?>"
                        <?= $active ? 'aria-current="page"' : ''; ?>
                        class="group flex min-h-12 items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition
                        <?= $active
                            ? 'bg-slate-950 text-white'
                            : 'text-slate-700 hover:bg-slate-100 hover:text-slate-950'; ?>">
                        <span class="flex items-center gap-3">
                            <span class="font-mono text-[10px] <?= $active ? 'text-white/50' : 'text-slate-400'; ?>"><?= sprintf('%02d', $index + 1); ?></span>
                            <?= e($item['label']); ?>
                        </span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px] <?= $active ? 'text-white/60' : 'text-slate-400 group-hover:text-brand-600'; ?>" aria-hidden="true"></i>
                    </a>
                <?php endforeach; ?>

                <div class="px-1 pt-2">
                    <a
                        href="<?= e(app_url('/pages/contact.php')); ?>"
                        class="group flex min-h-12 w-full items-center justify-between rounded-xl bg-brand-600 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-brand-600/20 transition hover:bg-slate-950">
                        <span class="inline-flex items-center gap-2.5"><i class="fa-regular fa-paper-plane" aria-hidden="true"></i> Let's talk about your project</span>
                        <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="flex items-center justify-between px-4 pb-1 pt-3 text-[10px] font-semibold uppercase tracking-[.16em] text-slate-400">
                    <span>Webby · Digital experiences</span>
                    <span class="inline-flex items-center gap-1.5"><span class="size-1.5 rounded-full bg-emerald-500"></span> Let's create</span>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    (() => {
        const header = document.getElementById('site-header');
        const container = document.getElementById('navbar-container');
        const toggle = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('mobile-menu-icon');

        if (!header || !container || !toggle || !menu || !icon) return;

        const openMenu = () => {
            menu.classList.remove('hidden');
            requestAnimationFrame(() => {
                menu.classList.remove('opacity-0');
                menu.classList.add('opacity-100');
            });
            toggle.setAttribute('aria-expanded', 'true');
            toggle.setAttribute('aria-label', 'Close navigation menu');
            icon.classList.remove('fa-bars-staggered');
            icon.classList.add('fa-xmark');
        };

        const closeMenu = () => {
            menu.classList.add('opacity-0');
            menu.classList.remove('opacity-100');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Open navigation menu');
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars-staggered');
            window.setTimeout(() => {
                if (toggle.getAttribute('aria-expanded') === 'false') {
                    menu.classList.add('hidden');
                }
            }, 200);
        };

        toggle.addEventListener('click', () => {
            toggle.getAttribute('aria-expanded') === 'true' ? closeMenu() : openMenu();
        });

        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
                closeMenu();
                toggle.focus();
            }
        });

        document.addEventListener('click', (event) => {
            if (toggle.getAttribute('aria-expanded') === 'true' && !header.contains(event.target)) {
                closeMenu();
            }
        });

        let previousScroll = 0;
        const updateHeader = () => {
            const scrollY = window.scrollY || 0;
            if (scrollY > 12) {
                container.classList.add('border-white/70', 'bg-white/95', 'shadow-[0_12px_40px_-18px_rgba(15,23,42,.32)]');
                container.classList.remove('bg-white/90');
            } else {
                container.classList.remove('border-white/70', 'bg-white/95', 'shadow-[0_12px_40px_-18px_rgba(15,23,42,.32)]');
                container.classList.add('bg-white/90');
            }
            previousScroll = scrollY;
        };

        window.addEventListener('scroll', updateHeader, {
            passive: true
        });
        updateHeader();
    })();
</script>