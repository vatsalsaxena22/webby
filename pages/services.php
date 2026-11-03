<?php
$page_title = 'Web Development Services — Webby';
$page_description = 'Explore Webby services including website development, web applications, e-commerce development, UI development and website maintenance.';
$page_keywords = 'Web development services, website development, web applications, ecommerce development, UI development, website maintenance, Webby';

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';

$services = [
    [
        'number' => '01',
        'icon' => 'fa-code',
        'title' => 'Website Development',
        'description' => 'Professional, responsive websites designed to establish your business online and turn visitors into customers.',
        'features' => ['Business websites', 'Landing pages', 'Responsive design'],
        'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1000&q=85',
        'alt' => 'Website analytics and interface on a laptop screen',
        'tag' => 'Business presence',
    ],
    [
        'number' => '02',
        'icon' => 'fa-layer-group',
        'title' => 'Web Applications',
        'description' => 'Custom web applications built around your workflows, users and business requirements.',
        'features' => ['Custom functionality', 'Database integration', 'Business workflows'],
        'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1000&q=85',
        'alt' => 'Developers collaborating on a web product',
        'tag' => 'Custom platforms',
    ],
    [
        'number' => '03',
        'icon' => 'fa-cart-shopping',
        'title' => 'E-commerce Development',
        'description' => 'Online stores designed to make product discovery, shopping and order management simple.',
        'features' => ['Product catalogues', 'Shopping carts', 'Order management'],
        'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1000&q=85',
        'alt' => 'Customer making a digital payment at checkout',
        'tag' => 'Online commerce',
    ],
    [
        'number' => '04',
        'icon' => 'fa-pen-ruler',
        'title' => 'UI Development',
        'description' => 'Clean and intuitive interfaces that provide users with a consistent experience across devices.',
        'features' => ['Responsive interfaces', 'Interactive components', 'Mobile-first development'],
        'image' => 'https://images.unsplash.com/photo-1559028012-481c04fa702d?auto=format&fit=crop&w=1000&q=85',
        'alt' => 'Designer working on a digital interface',
        'tag' => 'Design to interface',
    ],
    [
        'number' => '05',
        'icon' => 'fa-screwdriver-wrench',
        'title' => 'Website Maintenance',
        'description' => 'Keep your website secure, updated and functioning smoothly after launch.',
        'features' => ['Content updates', 'Bug fixes', 'Technical support'],
        'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1000&q=85',
        'alt' => 'Close-up of technology hardware and circuit components',
        'tag' => 'Ongoing support',
    ],
    [
        'number' => '06',
        'icon' => 'fa-gears',
        'title' => 'Custom Solutions',
        'description' => 'Need something specific? We can build a solution around your unique business requirements.',
        'features' => ['Custom requirements', 'API integrations', 'Scalable solutions'],
        'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1000&q=85',
        'alt' => 'Team collaborating on technical planning',
        'tag' => 'Built around you',
    ],
];
?>

<main class="overflow-hidden bg-white">
    <!-- Hero -->
    <section class="site-page-hero relative isolate overflow-hidden bg-white">
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -left-40 top-16 h-96 w-96 rounded-full bg-brand-100/70 blur-3xl"></div>
            <div class="absolute -right-36 top-28 h-[28rem] w-[28rem] rounded-full bg-cyan-100/60 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0),white_72%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 pb-14 sm:px-6 sm:pb-20 lg:px-8 lg:pb-24">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-10">
                <div class="relative z-10 lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white/80 px-4 py-2 text-xs font-bold uppercase tracking-[0.16em] text-brand-700 shadow-sm backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-brand-500"></span>
                        What we do
                    </span>
                    <h1 class="site-page-title mt-6 max-w-3xl">
                        Digital solutions built for
                        <span class="bg-gradient-to-r from-brand-600 via-brand-500 to-cyan-500 bg-clip-text text-transparent">real businesses.</span>
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                        From professional websites to custom web applications, we create digital experiences designed around your goals.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="<?= e(app_url('/pages/contact.php')); ?>"
                            class="site-button site-button--primary group">
                            Discuss your project
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" aria-hidden="true"></i>
                        </a>
                        <a href="#services" class="site-button site-button--secondary">
                            Explore services <i class="fa-solid fa-arrow-down text-xs" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="mt-9 flex flex-wrap items-center gap-x-6 gap-y-3 text-xs font-medium text-slate-500">
                        <span class="inline-flex items-center gap-2"><i class="fa-solid fa-check text-brand-600" aria-hidden="true"></i> Business-focused</span>
                        <span class="inline-flex items-center gap-2"><i class="fa-solid fa-check text-brand-600" aria-hidden="true"></i> Responsive by design</span>
                        <span class="inline-flex items-center gap-2"><i class="fa-solid fa-check text-brand-600" aria-hidden="true"></i> Built around your needs</span>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-xl lg:col-span-5 lg:max-w-none">
                    <div aria-hidden="true" class="absolute -inset-5 rounded-[2.5rem] bg-gradient-to-br from-brand-200/70 via-cyan-100/50 to-violet-100/70 blur-2xl"></div>
                    <div class="relative">
                        <div class="group relative aspect-[4/4.3] overflow-hidden rounded-[2rem] bg-slate-200 shadow-2xl shadow-slate-900/15 sm:aspect-[4/4]">
                            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1300&q=85"
                                alt="Developer workspace with laptop and code editor"
                                fetchpriority="high"
                                class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-[1.045]">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/5 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                                <span class="inline-flex rounded-full border border-white/25 bg-white/10 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur">From concept to launch</span>
                                <p class="mt-3 max-w-sm text-2xl font-bold leading-tight text-white sm:text-3xl">A stronger digital foundation for your business.</p>
                            </div>
                            <div class="pointer-events-none absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/20"></div>
                        </div>

                        <div class="absolute -bottom-5 -left-2 max-w-[calc(100%-1rem)] rounded-2xl border border-white/70 bg-white/95 p-4 shadow-xl shadow-slate-900/10 backdrop-blur sm:-left-8 sm:p-5">
                            <div class="flex items-center gap-3">
                                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fa-solid fa-display text-lg" aria-hidden="true"></i></span>
                                <div>
                                    <p class="text-sm font-bold text-slate-900">One connected experience</p>
                                    <p class="mt-1 text-xs text-slate-500">Design · Development · Delivery</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="scroll-mt-28 bg-slate-50 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-brand-700">Our services</span>
                    <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">The right tools for your next step.</h2>
                </div>
                <p class="max-w-md text-sm leading-7 text-slate-600 sm:text-base">Choose a focused service or combine capabilities into a solution that fits your business.</p>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($services as $service): ?>
                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white transition duration-500 hover:-translate-y-2 hover:border-brand-200 hover:shadow-2xl hover:shadow-slate-900/10">
                        <div class="relative aspect-[16/9] overflow-hidden bg-slate-200">
                            <img src="<?= e($service['image']); ?>"
                                alt="<?= e($service['alt']); ?>"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-700 ease-out group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-transparent to-transparent"></div>
                            <span class="absolute left-5 top-5 inline-flex items-center gap-2 rounded-full border border-white/25 bg-slate-950/35 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur-md">
                                <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
                                <?= e($service['tag']); ?>
                            </span>
                            <span class="absolute bottom-4 right-5 font-display text-5xl font-extrabold tracking-tight text-white/55"><?= e($service['number']); ?></span>
                        </div>

                        <div class="p-6 sm:p-7">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-brand-50 text-brand-700 transition duration-300 group-hover:rotate-[-5deg] group-hover:scale-110 group-hover:bg-brand-600 group-hover:text-white">
                                    <i class="fa-solid <?= e($service['icon']); ?> text-lg" aria-hidden="true"></i>
                                </div>
                                <a href="<?= e(app_url('/pages/contact.php')); ?>"
                                    aria-label="Enquire about <?= e($service['title']); ?>"
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition duration-300 group-hover:border-brand-500 group-hover:bg-brand-600 group-hover:text-white">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i>
                                </a>
                            </div>

                            <h3 class="mt-6 text-xl font-bold tracking-tight text-slate-950"><?= e($service['title']); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600"><?= e($service['description']); ?></p>

                            <ul class="mt-5 space-y-2.5 border-t border-slate-100 pt-5">
                                <?php foreach ($service['features'] as $feature): ?>
                                    <li class="flex items-start gap-2.5 text-sm text-slate-600">
                                        <i class="fa-solid fa-check mt-1 text-xs text-brand-600" aria-hidden="true"></i>
                                        <span><?= e($feature); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a href="<?= e(app_url('/pages/contact.php')); ?>"
                                class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-brand-700 transition group-hover:gap-3">
                                Discuss this service
                                <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="bg-white py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-brand-700">How we work</span>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">From first conversation to launch.</h2>
                <p class="mt-4 text-base leading-7 text-slate-600">A straightforward process keeps projects focused, transparent and moving forward.</p>
            </div>

            <div class="relative mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                <div aria-hidden="true" class="absolute left-[12%] right-[12%] top-6 hidden h-px bg-gradient-to-r from-brand-200 via-brand-400 to-brand-200 lg:block"></div>
                <?php
                $process = [
                    ['number' => '01', 'icon' => 'fa-comments', 'title' => 'Discover', 'copy' => 'We understand your business, goals and requirements.'],
                    ['number' => '02', 'icon' => 'fa-list-check', 'title' => 'Plan', 'copy' => 'We define the structure, functionality and direction.'],
                    ['number' => '03', 'icon' => 'fa-code', 'title' => 'Build', 'copy' => 'We develop and refine the solution with care for performance and usability.'],
                    ['number' => '04', 'icon' => 'fa-rocket', 'title' => 'Launch', 'copy' => 'Your project goes live and is ready for real users.'],
                ];
                foreach ($process as $step):
                ?>
                    <article class="relative">
                        <div class="relative z-10 flex h-12 w-12 items-center justify-center rounded-2xl border border-brand-100 bg-white text-brand-700 shadow-md shadow-brand-950/5">
                            <i class="fa-solid <?= e($step['icon']); ?> text-lg" aria-hidden="true"></i>
                        </div>
                        <p class="mt-6 text-xs font-bold tracking-[0.16em] text-brand-700">STEP <?= e($step['number']); ?></p>
                        <h3 class="mt-2 text-lg font-bold text-slate-950"><?= e($step['title']); ?></h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600"><?= e($step['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-slate-50 px-4 py-20 sm:px-6 sm:py-24 lg:px-8">
        <div class="relative mx-auto max-w-6xl overflow-hidden rounded-[2rem] bg-slate-950 px-6 py-14 text-center shadow-2xl shadow-slate-950/10 sm:px-12 sm:py-20">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0">
                <div class="absolute -left-20 -top-32 h-80 w-80 rounded-full bg-brand-500/25 blur-3xl"></div>
                <div class="absolute -bottom-40 -right-20 h-96 w-96 rounded-full bg-cyan-500/15 blur-3xl"></div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.04),transparent_65%)]"></div>
            </div>
            <div class="relative mx-auto max-w-3xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold text-slate-300">
                    <i class="fa-solid fa-sparkles text-brand-300" aria-hidden="true"></i>
                    LET’S MAKE IT HAPPEN
                </span>
                <h2 class="mt-6 font-display text-3xl font-extrabold tracking-tight text-white sm:text-5xl">Let’s build your next digital project.</h2>
                <p class="mx-auto mt-5 max-w-xl text-sm leading-7 text-slate-400 sm:text-base">Tell us what you need and we’ll help turn your idea into a practical digital solution.</p>
                <a href="<?= e(app_url('/pages/contact.php')); ?>"
                    class="site-button site-button--primary group mt-8">
                    Get started
                    <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>