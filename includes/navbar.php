<?php

require_once __DIR__ . '/site.php';
$site = $site ?? site_settings($pdo);

/**
 * Webby — Shared Header / Navigation
 * Full-width utility bar + responsive primary navigation.
 */

$current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');

$nav_items = [
    ['label' => 'Home',     'href' => '/index.php',          'page' => 'index.php'],
    ['label' => 'About',    'href' => '/pages/about.php',    'page' => 'about.php'],
    ['label' => 'Services', 'href' => '/pages/services.php', 'page' => 'services.php'],
    ['label' => 'Projects', 'href' => '/pages/projects.php', 'page' => 'projects.php'],
];

$contactEmail = trim((string)($site['email'] ?? $site['contact_email'] ?? ''));
$contactPhone = trim((string)($site['phone'] ?? $site['contact_phone'] ?? ''));

$socialLinks = site_social_links($site);
?>

<!-- Utility bar scrolls away; the navigation remains pinned below it. -->
<div class="border-b border-slate-200 bg-slate-950 text-slate-200">
        <div class="mx-auto flex min-h-10 w-full max-w-7xl flex-wrap items-center justify-between gap-x-5 gap-y-2 px-4 py-2 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-xs font-medium">
                <?php if ($contactEmail !== ''): ?>
                    <a href="mailto:<?= e($contactEmail); ?>"
                        class="inline-flex items-center gap-2 text-slate-300 transition-colors hover:text-white">
                        <i class="fa-regular fa-envelope text-brand-400" aria-hidden="true"></i>
                        <span><?= e($contactEmail); ?></span>
                    </a>
                <?php endif; ?>

                <?php if ($contactPhone !== ''): ?>
                    <a href="tel:<?= e(preg_replace('/[^\d+]/', '', $contactPhone)); ?>"
                        class="inline-flex items-center gap-2 text-slate-300 transition-colors hover:text-white">
                        <i class="fa-solid fa-phone text-brand-400" aria-hidden="true"></i>
                        <span><?= e($contactPhone); ?></span>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ($socialLinks): ?>
                <div class="flex items-center gap-1.5" aria-label="Social media links">
                    <?php foreach ($socialLinks as $social): ?>
                        <a href="<?= e($social['url']); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="<?= e($social['label']); ?>"
                            class="grid size-7 place-items-center rounded-full text-slate-300 transition-colors hover:bg-white/10 hover:text-white">
                            <i class="<?= e($social['icon']); ?> text-xs" aria-hidden="true"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<header id="site-header" class="sticky top-0 z-50 w-full bg-white">
    <!-- Main navigation -->
    <div id="navbar-shell" class="w-full border-b border-slate-200 bg-white transition-shadow duration-200">
        <nav class="mx-auto flex min-h-[76px] w-full max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8"
            aria-label="Main navigation">

            <!-- Brand: logo + name -->
            <a href="<?= e(app_url('/')); ?>"
                class="flex min-w-0 shrink-0 items-center gap-3 rounded-md outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-4"
                aria-label="Webby home">
                <?= site_logo($site); ?>
            </a>

            <!-- Desktop links: single effect only (underline) -->
            <div class="hidden h-full items-center gap-7 lg:flex">
                <?php foreach ($nav_items as $item): ?>
                    <?php $active = $current_page === $item['page']; ?>
                    <a href="<?= e(app_url($item['href'])); ?>"
                        <?= $active ? 'aria-current="page"' : ''; ?>
                        class="group relative inline-flex min-h-[76px] items-center text-sm font-semibold outline-none transition-colors duration-200 focus-visible:text-brand-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-[-4px]
                       <?= $active ? 'text-brand-700' : 'text-slate-600 hover:text-brand-700'; ?>">
                        <?= e($item['label']); ?>
                        <span aria-hidden="true"
                            class="absolute inset-x-0 bottom-0 h-[3px] rounded-t-full bg-brand-600 transition-transform duration-200
                              <?= $active ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100'; ?> origin-center"></span>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Desktop CTA -->
            <a href="<?= e(app_url('/pages/contact.php')); ?>"
                class="site-button site-button--primary site-button--nav shrink-0">
                Let's talk
                <i class="fa-solid fa-arrow-up-right-from-square text-[11px]" aria-hidden="true"></i>
            </a>

            <!-- Mobile toggle -->
            <button id="mobile-menu-button"
                type="button"
                class="inline-flex size-11 shrink-0 items-center justify-center rounded-lg border border-slate-200 text-slate-800 transition-colors hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 lg:hidden"
                aria-label="Open navigation menu"
                aria-expanded="false"
                aria-controls="mobile-menu">
                <i id="mobile-menu-icon" class="fa-solid fa-bars text-lg" aria-hidden="true"></i>
            </button>
        </nav>
    </div>

    <!-- Mobile backdrop -->
    <button id="mobile-menu-backdrop"
        type="button"
        class="fixed inset-0 z-[60] hidden bg-slate-950/45 opacity-0 transition-opacity duration-200 lg:hidden"
        aria-label="Close navigation menu"
        tabindex="-1"></button>

    <!-- Mobile slide-in sidebar -->
    <aside id="mobile-menu"
        class="fixed inset-y-0 right-0 z-[70] flex w-[min(88vw,380px)] translate-x-full flex-col bg-white shadow-2xl transition-transform duration-300 ease-out lg:hidden"
        aria-label="Mobile navigation"
        aria-hidden="true"
        inert>
        <div class="flex min-h-[76px] items-center justify-between border-b border-slate-200 px-5">
            <a href="<?= e(app_url('/')); ?>" class="flex items-center gap-3" aria-label="Webby home">
                <?= site_logo($site); ?>
            </a>
            <button id="mobile-menu-close"
                type="button"
                class="grid size-10 place-items-center rounded-lg border border-slate-200 text-slate-700 transition-colors hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500"
                aria-label="Close navigation menu">
                <i class="fa-solid fa-xmark text-lg" aria-hidden="true"></i>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto px-5 py-6">
            <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-[.18em] text-slate-400">Menu</p>
            <div class="space-y-1">
                <?php foreach ($nav_items as $index => $item): ?>
                    <?php $active = $current_page === $item['page']; ?>
                    <a href="<?= e(app_url($item['href'])); ?>"
                        <?= $active ? 'aria-current="page"' : ''; ?>
                        class="flex min-h-12 items-center justify-between rounded-lg border-l-[3px] px-4 py-3 text-sm font-semibold transition-colors
                       <?= $active ? 'border-brand-600 bg-brand-50 text-brand-700' : 'border-transparent text-slate-700 hover:text-brand-700'; ?>">
                        <span class="flex items-center gap-3">
                            <span class="font-mono text-[10px] <?= $active ? 'text-brand-500' : 'text-slate-400'; ?>"><?= sprintf('%02d', $index + 1); ?></span>
                            <?= e($item['label']); ?>
                        </span>
                        <?php if ($active): ?>
                            <i class="fa-solid fa-arrow-right text-xs text-brand-600" aria-hidden="true"></i>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <a href="<?= e(app_url('/pages/contact.php')); ?>"
                class="mt-6 flex min-h-12 items-center justify-between gap-3 rounded-lg bg-brand-600 px-4 py-3 text-sm font-bold text-white transition-colors hover:bg-slate-950">
                <span class="inline-flex items-center gap-2.5"><i class="fa-regular fa-paper-plane" aria-hidden="true"></i> Let's talk</span>
                <i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i>
            </a>

            <?php if ($contactEmail !== '' || $contactPhone !== ''): ?>
                <div class="mt-8 border-t border-slate-200 pt-5">
                    <p class="mb-3 text-[10px] font-bold uppercase tracking-[.18em] text-slate-400">Get in touch</p>
                    <div class="space-y-3 text-sm text-slate-600">
                        <?php if ($contactEmail !== ''): ?>
                            <a href="mailto:<?= e($contactEmail); ?>" class="flex items-start gap-3 break-all hover:text-brand-700">
                                <i class="fa-regular fa-envelope mt-0.5 text-brand-600" aria-hidden="true"></i>
                                <?= e($contactEmail); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($contactPhone !== ''): ?>
                            <a href="tel:<?= e(preg_replace('/[^\d+]/', '', $contactPhone)); ?>" class="flex items-center gap-3 hover:text-brand-700">
                                <i class="fa-solid fa-phone text-brand-600" aria-hidden="true"></i>
                                <?= e($contactPhone); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($socialLinks): ?>
                <div class="mt-6 flex items-center gap-2 border-t border-slate-200 pt-5">
                    <?php foreach ($socialLinks as $social): ?>
                        <a href="<?= e($social['url']); ?>" target="_blank" rel="noopener noreferrer"
                            aria-label="<?= e($social['label']); ?>"
                            class="grid size-10 place-items-center rounded-full border border-slate-200 text-slate-600 transition-colors hover:text-brand-700">
                            <i class="<?= e($social['icon']); ?>" aria-hidden="true"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="border-t border-slate-200 px-5 py-4 text-xs font-medium text-slate-400">
            Webby · Digital experiences
        </div>
    </aside>
</header>

<script>
    (() => {
        const toggle = document.getElementById('mobile-menu-button');
        const closeButton = document.getElementById('mobile-menu-close');
        const menu = document.getElementById('mobile-menu');
        const backdrop = document.getElementById('mobile-menu-backdrop');
        const icon = document.getElementById('mobile-menu-icon');
        const shell = document.getElementById('navbar-shell');

        if (!toggle || !closeButton || !menu || !backdrop || !icon || !shell) return;

        let returnFocusTo = null;

        const openMenu = () => {
            returnFocusTo = document.activeElement;
            backdrop.classList.remove('hidden');
            menu.removeAttribute('inert');
            menu.setAttribute('aria-hidden', 'false');
            toggle.setAttribute('aria-expanded', 'true');
            toggle.setAttribute('aria-label', 'Close navigation menu');
            icon.classList.replace('fa-bars', 'fa-xmark');
            document.body.classList.add('overflow-hidden');

            requestAnimationFrame(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                menu.classList.remove('translate-x-full');
                menu.classList.add('translate-x-0');
                closeButton.focus();
            });
        };

        const closeMenu = (restoreFocus = true) => {
            backdrop.classList.add('opacity-0');
            backdrop.classList.remove('opacity-100');
            menu.classList.add('translate-x-full');
            menu.classList.remove('translate-x-0');
            menu.setAttribute('aria-hidden', 'true');
            menu.setAttribute('inert', '');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Open navigation menu');
            icon.classList.replace('fa-xmark', 'fa-bars');
            document.body.classList.remove('overflow-hidden');

            window.setTimeout(() => {
                if (toggle.getAttribute('aria-expanded') === 'false') {
                    backdrop.classList.add('hidden');
                }
            }, 300);

            if (restoreFocus && returnFocusTo instanceof HTMLElement) returnFocusTo.focus();
        };

        toggle.addEventListener('click', () => {
            toggle.getAttribute('aria-expanded') === 'true' ? closeMenu() : openMenu();
        });
        closeButton.addEventListener('click', () => closeMenu());
        backdrop.addEventListener('click', () => closeMenu());

        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => closeMenu(false));
        });

        document.addEventListener('keydown', (event) => {
            if (toggle.getAttribute('aria-expanded') !== 'true') return;

            if (event.key === 'Escape') {
                closeMenu();
                return;
            }

            // Keep keyboard focus within the open drawer.
            if (event.key === 'Tab') {
                const focusable = [...menu.querySelectorAll('a[href], button:not([disabled])')];
                if (!focusable.length) return;
                const first = focusable[0];
                const last = focusable[focusable.length - 1];

                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault();
                    last.focus();
                } else if (!event.shiftKey && document.activeElement === last) {
                    event.preventDefault();
                    first.focus();
                }
            }
        });

        const updateShadow = () => {
            shell.classList.toggle('shadow-sm', window.scrollY > 4);
        };
        window.addEventListener('scroll', updateShadow, {
            passive: true
        });
        updateShadow();

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024 && toggle.getAttribute('aria-expanded') === 'true') {
                closeMenu(false);
            }
        });
    })();
</script>