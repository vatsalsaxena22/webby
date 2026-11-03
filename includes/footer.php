<?php
$footerSocialLinks = site_social_links($site);
$footerPhoneNumber = contact_phone_number($site);
$footerWhatsappLink = $footerSocialLinks['whatsapp']['url'] ?? '';

if ($footerWhatsappLink === '' && $footerPhoneNumber !== '') {
    $footerWhatsappLink = 'https://wa.me/' . $footerPhoneNumber;
}

$footerPhoneLink = $footerPhoneNumber !== '' ? 'tel:+' . $footerPhoneNumber : '';

$footerNavigation = [
    ['label' => 'Home', 'url' => '/index.php'],
    ['label' => 'About us', 'url' => '/pages/about.php'],
    ['label' => 'Services', 'url' => '/pages/services.php'],
    ['label' => 'Projects', 'url' => '/pages/projects.php'],
    ['label' => 'Contact', 'url' => '/pages/contact.php'],
];

$footerServices = [
    'Website Development',
    'Web Applications',
    'E-commerce Development',
    'UI / UX Development',
    'Website Maintenance',
];
?>

<footer class="relative isolate overflow-hidden border-t border-white/10 bg-slate-950 text-white">
    <!-- Ambient background -->
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -right-32 -top-40 h-96 w-96 rounded-full bg-brand-500/15 blur-3xl"></div>
        <div class="absolute -bottom-44 left-1/4 h-80 w-80 rounded-full bg-cyan-400/[0.07] blur-3xl"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.045),transparent_48%)]"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Footer CTA -->
        <div class="border-b border-white/10 py-12 sm:py-16">
            <div class="flex flex-col gap-7 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/25 bg-brand-400/10 px-3 py-1.5 text-xs font-semibold tracking-wide text-brand-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>
                        HAVE A PROJECT IN MIND?
                    </span>
                    <h2 class="mt-5 text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl">
                        Let’s build something
                        <span class="text-brand-300">great.</span>
                    </h2>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-slate-400 sm:text-base">
                        Tell us what you’re planning. We’ll help turn your idea into a thoughtful digital experience.
                    </p>
                </div>

                <a href="<?= e(app_url('/pages/contact.php')); ?>"
                    class="group inline-flex min-h-12 shrink-0 items-center justify-center gap-3 rounded-full bg-brand-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-950/30 transition duration-300 hover:-translate-y-0.5 hover:bg-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-300 focus:ring-offset-2 focus:ring-offset-slate-950">
                    Start a project
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <!-- Footer content -->
        <div class="grid gap-12 py-12 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8 lg:py-16">
            <!-- Brand -->
            <div class="sm:col-span-2 lg:col-span-5">
                <a href="<?= e(app_url('/')); ?>"
                    class="inline-flex items-center rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-300"
                    aria-label="Go to homepage">
                    <?= site_logo($site, 'dark'); ?>
                </a>

                <p class="mt-5 max-w-md text-sm leading-7 text-slate-400">
                    We build modern websites and digital solutions that help businesses establish a stronger presence online.
                </p>

                <?php if (!empty($footerSocialLinks)): ?>
                    <div class="mt-6 flex flex-wrap items-center gap-2.5">
                        <?php foreach ($footerSocialLinks as $social): ?>
                            <a href="<?= e($social['url']); ?>"
                                aria-label="<?= e($social['label']); ?>"
                                title="<?= e($social['label']); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/[0.035] text-slate-400 transition duration-300 hover:-translate-y-1 hover:border-brand-400/50 hover:bg-brand-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-brand-300">
                                <i class="<?= e($social['icon']); ?> text-sm" aria-hidden="true"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <p class="mt-6 flex items-center gap-2 text-xs text-slate-500">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-40"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                    </span>
                    Building better experiences, one project at a time.
                </p>
            </div>

            <!-- Navigation -->
            <nav aria-label="Footer navigation" class="lg:col-span-3">
                <h3 class="text-xs font-bold uppercase tracking-[0.18em] text-slate-200">Explore</h3>
                <ul class="mt-5 space-y-3.5">
                    <?php foreach ($footerNavigation as $item): ?>
                        <li>
                            <a href="<?= e(app_url($item['url'])); ?>"
                                class="group inline-flex items-center gap-2 text-sm text-slate-400 transition hover:text-white focus:outline-none focus:text-white">
                                <span class="h-px w-0 bg-brand-400 transition-all duration-300 group-hover:w-3"></span>
                                <?= e($item['label']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- Services -->
            <div class="lg:col-span-4">
                <h3 class="text-xs font-bold uppercase tracking-[0.18em] text-slate-200">What we do</h3>
                <ul class="mt-5 space-y-3.5">
                    <?php foreach ($footerServices as $service): ?>
                        <li class="flex items-start gap-3 text-sm text-slate-400">
                            <i class="fa-solid fa-arrow-right mt-1 text-[10px] text-brand-300" aria-hidden="true"></i>
                            <span><?= e($service); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <?php if ($footerPhoneLink !== '' || $footerWhatsappLink !== ''): ?>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <?php if ($footerPhoneLink !== ''): ?>
                            <a href="<?= e($footerPhoneLink); ?>"
                                class="inline-flex items-center gap-2 rounded-full border border-white/10 px-4 py-2.5 text-xs font-semibold text-slate-300 transition hover:border-white/25 hover:bg-white/5 hover:text-white">
                                <i class="fa-solid fa-phone text-brand-300" aria-hidden="true"></i>
                                Call us
                            </a>
                        <?php endif; ?>
                        <?php if ($footerWhatsappLink !== ''): ?>
                            <a href="<?= e($footerWhatsappLink); ?>"
                                target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-4 py-2.5 text-xs font-semibold text-emerald-300 transition hover:border-emerald-400/40 hover:bg-emerald-400/15">
                                <i class="fa-brands fa-whatsapp text-sm" aria-hidden="true"></i>
                                WhatsApp
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Legal / copyright -->
        <div class="flex flex-col gap-4 border-t border-white/10 py-6 text-xs sm:flex-row sm:items-center sm:justify-between">
            <p class="text-slate-500">
                &copy; <?= date('Y'); ?> <?= e($site['logo_text']); ?>. All rights reserved.
            </p>

            <div class="flex flex-wrap items-center gap-x-5 gap-y-2">
                <!-- Replace these with real policy routes when available. -->
                <span class="text-slate-600">Made for the modern web</span>
            </div>

            <a href="<?= e(app_url('/')); ?>"
                class="inline-flex items-center gap-2 font-medium text-slate-400 transition hover:text-white">
                Back to top
                <i class="fa-solid fa-arrow-up text-[10px]" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</footer>

<!-- Floating contact actions -->
<?php if ($footerWhatsappLink !== '' || $footerPhoneLink !== ''): ?>
    <div class="fixed bottom-6 left-6 z-40 hidden flex-col gap-3 sm:flex">
        <?php if ($footerPhoneLink !== ''): ?>
            <a href="<?= e($footerPhoneLink); ?>"
                aria-label="Call us" title="Call us"
                class="flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-slate-950 text-lg text-white shadow-xl shadow-slate-950/20 transition duration-300 hover:-translate-y-1 hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-300">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
            </a>
        <?php endif; ?>
    </div>

    <div class="fixed bottom-6 right-6 z-40 hidden flex-col gap-3 sm:flex">
        <?php if ($footerWhatsappLink !== ''): ?>
            <a href="<?= e($footerWhatsappLink); ?>"
                aria-label="Chat with us on WhatsApp" title="WhatsApp"
                target="_blank" rel="noopener noreferrer"
                class="flex h-12 w-12 items-center justify-center rounded-full bg-[#25D366] text-2xl text-white shadow-xl shadow-emerald-950/20 transition duration-300 hover:-translate-y-1 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
            </a>
        <?php endif; ?>
    </div>

    <div class="contact-action-bar fixed inset-x-0 bottom-0 z-40 flex gap-3 border-t border-slate-200 bg-white/95 p-3 pb-[calc(0.75rem+env(safe-area-inset-bottom))] shadow-[0_-8px_30px_rgba(15,23,42,0.12)] backdrop-blur sm:hidden">
        <?php if ($footerPhoneLink !== ''): ?>
            <a href="<?= e($footerPhoneLink); ?>"
                class="flex min-h-12 flex-1 items-center justify-center gap-2 rounded-xl bg-slate-950 px-4 text-sm font-semibold text-white">
                <i class="fa-solid fa-phone" aria-hidden="true"></i> Call
            </a>
        <?php endif; ?>
        <?php if ($footerWhatsappLink !== ''): ?>
            <a href="<?= e($footerWhatsappLink); ?>"
                target="_blank" rel="noopener noreferrer"
                class="flex min-h-12 flex-1 items-center justify-center gap-2 rounded-xl bg-[#25D366] px-4 text-sm font-semibold text-white">
                <i class="fa-brands fa-whatsapp text-lg" aria-hidden="true"></i> WhatsApp
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>