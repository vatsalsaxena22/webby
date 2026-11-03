<?php

$page_title = 'Webby — Digital Experiences for Growing Businesses';
$page_description = 'Webby creates modern business websites, web applications and e-commerce experiences built around your goals.';
$page_keywords = 'Webby, website development, web applications, ecommerce development, business websites, digital solutions';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';

?>

<main class="overflow-hidden bg-white text-slate-950">

    <!-- HERO -->
    <section class="site-page-hero relative isolate">
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#e2e8f0_1px,transparent_1px),linear-gradient(to_bottom,#e2e8f0_1px,transparent_1px)] bg-[size:56px_56px] opacity-35 [mask-image:linear-gradient(to_bottom,black,transparent_88%)]"></div>
            <div class="absolute -right-40 top-16 h-[28rem] w-[28rem] rounded-full bg-brand-100/70 blur-[110px]"></div>
            <div class="absolute -left-40 top-72 h-72 w-72 rounded-full bg-cyan-100/60 blur-[100px]"></div>
        </div>

        <div class="mx-auto grid max-w-7xl items-center gap-14 px-4 pb-20 sm:px-6 sm:pb-24 lg:grid-cols-[1.02fr_.98fr] lg:gap-10 lg:px-8 lg:pb-28">
            <div class="relative z-10">
                <div class="mb-7 inline-flex items-center gap-2.5 rounded-full border border-slate-200 bg-white/85 px-3.5 py-2 text-xs font-semibold text-slate-700 shadow-sm backdrop-blur">
                    <span class="relative flex size-2">
                        <span class="absolute inline-flex size-full animate-ping rounded-full bg-emerald-400 opacity-60"></span>
                        <span class="relative inline-flex size-2 rounded-full bg-emerald-500"></span>
                    </span>
                    Digital partner for ambitious businesses
                </div>

                <h1 class="site-page-title site-page-title--home max-w-3xl">
                    Good ideas.<br>
                    <span class="text-brand-600">Thoughtfully</span><br>
                    built for growth.
                </h1>

                <p class="mt-7 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">
                    We turn business goals into polished websites, useful web apps and digital experiences people love to use.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="<?= e(app_url('/pages/contact.php')); ?>"
                        class="site-button site-button--primary group">
                        Let's talk about your project
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" aria-hidden="true"></i>
                    </a>
                    <a href="<?= e(app_url('/pages/projects.php')); ?>"
                        class="site-button site-button--secondary">
                        Explore our work
                        <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-3 text-xs font-medium text-slate-500 sm:text-sm">
                    <span class="inline-flex items-center gap-2"><i class="fa-solid fa-check text-brand-600" aria-hidden="true"></i> Responsive by design</span>
                    <span class="inline-flex items-center gap-2"><i class="fa-solid fa-check text-brand-600" aria-hidden="true"></i> Built around your goals</span>
                </div>
            </div>

            <!-- Product-style website preview: decorative visual, no fake customer data -->
            <div class="relative mx-auto w-full max-w-[620px] lg:ml-auto">
                <div aria-hidden="true" class="absolute -inset-5 rounded-[2.5rem] bg-gradient-to-br from-brand-100/80 via-white to-cyan-100/80 blur-2xl"></div>

                <div class="relative rotate-0 overflow-hidden rounded-[1.6rem] border border-slate-200/90 bg-white p-2.5 shadow-[0_35px_100px_-35px_rgba(15,23,42,.35)] sm:rounded-[2rem] sm:p-3">
                    <div class="overflow-hidden rounded-[1.15rem] border border-slate-200 bg-[#f7f8fa] sm:rounded-[1.45rem]">
                        <div class="flex items-center gap-2 border-b border-slate-200 bg-white px-4 py-3 sm:px-5">
                            <span class="size-2.5 rounded-full bg-[#ff6058]"></span>
                            <span class="size-2.5 rounded-full bg-[#ffbd2e]"></span>
                            <span class="size-2.5 rounded-full bg-[#28c840]"></span>
                            <div class="ml-3 flex-1 rounded-lg bg-slate-100 px-3 py-1.5 text-center text-[10px] font-medium tracking-wide text-slate-500 sm:text-xs">yourbusiness.com</div>
                            <i class="fa-solid fa-ellipsis text-slate-400" aria-hidden="true"></i>
                        </div>

                        <div class="relative overflow-hidden bg-[#f5f4ef] p-5 sm:p-7 md:p-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 text-xs font-black tracking-tight text-slate-900 sm:text-sm">
                                    <span class="grid size-7 place-items-center rounded-lg bg-slate-950 text-white">N</span>
                                    NORTH / STUDIO
                                </div>
                                <div class="hidden gap-4 text-[10px] font-semibold text-slate-500 sm:flex">
                                    <span>About</span><span>Services</span><span>Contact ↗</span>
                                </div>
                                <span class="text-[10px] font-semibold text-slate-500 sm:hidden">MENU +</span>
                            </div>

                            <div class="grid items-center gap-5 py-9 sm:grid-cols-[1.1fr_.9fr] sm:py-12">
                                <div class="relative z-10">
                                    <span class="text-[9px] font-bold uppercase tracking-[.2em] text-brand-700 sm:text-[10px]">Independent creative studio</span>
                                    <div class="mt-3 font-display text-4xl font-extrabold leading-[.92] tracking-[-.06em] text-slate-950 sm:text-5xl md:text-[3.6rem]">
                                        Make<br>room for<br><span class="text-brand-600">better.</span>
                                    </div>
                                    <p class="mt-4 max-w-48 text-[10px] leading-5 text-slate-500 sm:text-xs sm:leading-6">A sample layout demonstrating how a business homepage can feel.</p>
                                    <div class="mt-5 inline-flex items-center gap-2 rounded-full bg-slate-950 px-4 py-2.5 text-[10px] font-bold text-white sm:text-xs">Discover the studio <span aria-hidden="true">↗</span></div>
                                </div>

                                <div class="group/image relative mx-auto aspect-[.83] w-full max-w-[220px] overflow-hidden rounded-[48%_48%_1rem_1rem] bg-slate-200 shadow-2xl transition duration-700 [transform:perspective(1000px)_rotateY(-5deg)_rotateX(2deg)] hover:[transform:perspective(1000px)_rotateY(0deg)_rotateX(0deg)] sm:max-w-none">
                                    <img
                                        src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=900&q=85"
                                        alt="Creative portrait used in the sample studio website preview"
                                        loading="lazy"
                                        class="absolute inset-0 size-full object-cover transition duration-700 group-hover/image:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/65 via-transparent to-brand-950/10"></div>
                                    <div aria-hidden="true" class="absolute -right-7 top-8 size-36 rounded-full border-[18px] border-white/20 sm:size-44"></div>
                                    <div class="absolute bottom-3 left-3 rounded-full border border-white/40 bg-white/80 px-3 py-1.5 text-[9px] font-bold uppercase tracking-wider text-slate-800 shadow-lg backdrop-blur">Brand / Web / Strategy</div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between border-t border-slate-300/70 pt-3 text-[9px] font-semibold uppercase tracking-[.15em] text-slate-500 sm:text-[10px]">
                                <span>Independent by nature</span><span>Scroll to explore ↓</span>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div aria-hidden="true" class="absolute -right-2 -top-5 -z-10 size-20 rounded-3xl border border-brand-200 sm:-right-5 sm:-top-7 sm:size-24"></div>
            </div>
        </div>
    </section>

    <!-- VALUE STRIP -->
    <section class="border-y border-slate-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-4 px-4 py-6 sm:grid-cols-3 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 text-sm font-semibold text-slate-700"><span class="grid size-9 place-items-center rounded-xl bg-slate-100 text-brand-600"><i class="fa-solid fa-display"></i></span> Websites that represent you</div>
            <div class="flex items-center gap-3 text-sm font-semibold text-slate-700"><span class="grid size-9 place-items-center rounded-xl bg-slate-100 text-brand-600"><i class="fa-solid fa-gears"></i></span> Technology that works for you</div>
            <div class="flex items-center gap-3 text-sm font-semibold text-slate-700"><span class="grid size-9 place-items-center rounded-xl bg-slate-100 text-brand-600"><i class="fa-solid fa-arrow-trend-up"></i></span> Experiences made to move forward</div>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="bg-slate-50 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-brand-600">What we build</p>
                    <h2 class="mt-4 font-display text-3xl font-extrabold leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">Digital tools for the<br class="hidden sm:block"> next stage of your business.</h2>
                </div>
                <a href="<?= e(app_url('/pages/services.php')); ?>" class="inline-flex items-center gap-2 self-start text-sm font-bold text-slate-700 transition hover:text-brand-600 md:self-auto">All services <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a>
            </div>

            <div class="mt-12 grid gap-4 md:grid-cols-3">
                <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-7 transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-xl hover:shadow-slate-900/5 sm:p-8">
                    <div class="flex items-start justify-between">
                        <span class="grid size-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white"><i class="fa-solid fa-window-maximize text-lg"></i></span>
                        <span class="text-xs font-bold tracking-widest text-slate-300">01</span>
                    </div>
                    <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-950">Business websites</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">A confident digital presence with thoughtful design, responsive layouts and a clear path to enquiry.</p>
                    <a href="<?= e(app_url('/pages/services.php')); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-slate-800 transition group-hover:text-brand-600">Explore service <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i></a>
                </article>

                <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-7 transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-xl hover:shadow-slate-900/5 sm:p-8">
                    <div class="flex items-start justify-between">
                        <span class="grid size-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white"><i class="fa-solid fa-cubes-stacked text-lg"></i></span>
                        <span class="text-xs font-bold tracking-widest text-slate-300">02</span>
                    </div>
                    <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-950">Web applications</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Purpose-built portals, dashboards and workflows that make everyday business operations easier.</p>
                    <a href="<?= e(app_url('/pages/services.php')); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-slate-800 transition group-hover:text-brand-600">Explore service <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i></a>
                </article>

                <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-7 transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-xl hover:shadow-slate-900/5 sm:p-8">
                    <div class="flex items-start justify-between">
                        <span class="grid size-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white"><i class="fa-solid fa-bag-shopping text-lg"></i></span>
                        <span class="text-xs font-bold tracking-widest text-slate-300">03</span>
                    </div>
                    <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-950">E-commerce</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Customer-friendly online stores with practical shopping journeys and room to scale.</p>
                    <a href="<?= e(app_url('/pages/services.php')); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-slate-800 transition group-hover:text-brand-600">Explore service <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i></a>
                </article>
            </div>
        </div>
    </section>

    <!-- SELECTED WORK / VISUAL SHOWCASE -->
    <section class="bg-white py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-brand-600">A little inspiration</p>
                    <h2 class="mt-4 font-display text-3xl font-extrabold leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">Digital experiences,<br class="hidden sm:block"> with a point of view.</h2>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-slate-600 sm:text-base">A glimpse at visual directions Webby can help bring to life. Replace these concept examples with approved client work or your own demos.</p>
                </div>
                <a href="<?= e(app_url('/pages/projects.php')); ?>" class="inline-flex items-center gap-2 self-start text-sm font-bold text-slate-700 transition hover:text-brand-600 md:self-auto">View projects <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a>
            </div>

            <div class="mt-11 grid gap-5 md:grid-cols-3">
                <a href="<?= e(app_url('/pages/projects.php')); ?>" class="group block [perspective:1200px] motion-reduce:transform-none">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-3xl bg-slate-100 shadow-lg shadow-slate-900/5 transition duration-500 group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-slate-900/15 group-hover:[transform:rotateY(-3deg)_rotateX(2deg)]">
                        <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1000&q=85" alt="Warm contemporary interior design concept" loading="lazy" class="absolute inset-0 size-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/5 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6 text-white sm:p-7">
                            <span class="text-[10px] font-bold uppercase tracking-[.2em] text-white/70">Concept direction / 01</span>
                            <h3 class="mt-2 font-display text-2xl font-bold tracking-tight">Spaces & Living</h3>
                            <p class="mt-2 text-sm text-white/75">A refined home for a design-led brand.</p>
                            <span class="mt-5 inline-flex size-10 items-center justify-center rounded-full border border-white/40 transition group-hover:bg-white group-hover:text-slate-950"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </a>

                <a href="<?= e(app_url('/pages/projects.php')); ?>" class="group block [perspective:1200px] md:mt-8 motion-reduce:transform-none">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-3xl bg-slate-100 shadow-lg shadow-slate-900/5 transition duration-500 group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-slate-900/15 group-hover:[transform:rotateY(3deg)_rotateX(2deg)]">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1000&q=85" alt="Modern retail payment experience concept" loading="lazy" class="absolute inset-0 size-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/5 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6 text-white sm:p-7">
                            <span class="text-[10px] font-bold uppercase tracking-[.2em] text-white/70">Concept direction / 02</span>
                            <h3 class="mt-2 font-display text-2xl font-bold tracking-tight">Everyday Commerce</h3>
                            <p class="mt-2 text-sm text-white/75">A smoother journey from browse to buy.</p>
                            <span class="mt-5 inline-flex size-10 items-center justify-center rounded-full border border-white/40 transition group-hover:bg-white group-hover:text-slate-950"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </a>

                <a href="<?= e(app_url('/pages/projects.php')); ?>" class="group block [perspective:1200px] motion-reduce:transform-none">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-3xl bg-slate-100 shadow-lg shadow-slate-900/5 transition duration-500 group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-slate-900/15 group-hover:[transform:rotateY(-3deg)_rotateX(2deg)]">
                        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1000&q=85" alt="Bright collaborative workspace concept" loading="lazy" class="absolute inset-0 size-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/5 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6 text-white sm:p-7">
                            <span class="text-[10px] font-bold uppercase tracking-[.2em] text-white/70">Concept direction / 03</span>
                            <h3 class="mt-2 font-display text-2xl font-bold tracking-tight">Workplace Culture</h3>
                            <p class="mt-2 text-sm text-white/75">A clear digital presence for modern teams.</p>
                            <span class="mt-5 inline-flex size-10 items-center justify-center rounded-full border border-white/40 transition group-hover:bg-white group-hover:text-slate-950"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <p class="mt-5 text-xs leading-5 text-slate-400">Visuals are illustrative concepts sourced from Unsplash, not representations of completed client projects.</p>
        </div>
    </section>

    <!-- APPROACH -->
    <section class="bg-white py-20 sm:py-24 lg:py-28">
        <div class="mx-auto grid max-w-7xl items-center gap-14 px-4 sm:px-6 lg:grid-cols-2 lg:gap-20 lg:px-8">
            <div>
                <p class="text-xs font-bold uppercase tracking-[.2em] text-brand-600">The Webby approach</p>
                <h2 class="mt-4 max-w-xl font-display text-3xl font-extrabold leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">Good technology starts with understanding people.</h2>
                <p class="mt-6 max-w-xl text-base leading-8 text-slate-600">Before the interface and before the code, we get clear on your business, your customers and what success should look like.</p>
                <a href="<?= e(app_url('/pages/about.php')); ?>" class="mt-7 inline-flex items-center gap-2 text-sm font-bold text-brand-700 transition hover:text-brand-800">Get to know Webby <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-6 text-white shadow-2xl shadow-slate-950/10 sm:p-9">
                <div class="flex items-center justify-between border-b border-white/10 pb-5">
                    <span class="text-xs font-bold uppercase tracking-[.18em] text-slate-400">From idea to launch</span>
                    <span class="grid size-10 place-items-center rounded-xl bg-brand-500/15 text-brand-300"><i class="fa-solid fa-shapes"></i></span>
                </div>
                <div class="mt-2 divide-y divide-white/10">
                    <div class="flex gap-4 py-5">
                        <span class="font-mono text-xs text-brand-300">01</span>
                        <div>
                            <h3 class="font-bold">Discover</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-400">Understand your goals, audience and requirements.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 py-5">
                        <span class="font-mono text-xs text-brand-300">02</span>
                        <div>
                            <h3 class="font-bold">Design</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-400">Shape the experience, structure and visual direction.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 py-5">
                        <span class="font-mono text-xs text-brand-300">03</span>
                        <div>
                            <h3 class="font-bold">Develop</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-400">Build responsive, maintainable and useful functionality.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 py-5">
                        <span class="font-mono text-xs text-brand-300">04</span>
                        <div>
                            <h3 class="font-bold">Launch & improve</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-400">Test, launch and identify opportunities to improve.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WORK CTA -->
    <section class="border-y border-slate-200 bg-slate-50 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-[2rem] bg-brand-600 px-6 py-12 text-white sm:px-12 sm:py-16 lg:px-16">
                <div aria-hidden="true" class="pointer-events-none absolute -right-16 -top-28 size-80 rounded-full border-[50px] border-white/10"></div>
                <div aria-hidden="true" class="pointer-events-none absolute bottom-[-8rem] right-[22%] size-64 rounded-full border border-white/15"></div>
                <div class="relative grid items-end gap-8 lg:grid-cols-[1fr_auto]">
                    <div class="max-w-2xl">
                        <p class="text-xs font-bold uppercase tracking-[.2em] text-white/70">Your next move</p>
                        <h2 class="mt-4 font-display text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl lg:text-5xl">Let's make your next digital project matter.</h2>
                        <p class="mt-5 max-w-xl text-sm leading-7 text-white/80 sm:text-base">Have a website to launch, a process to improve or an idea to explore? Let's talk.</p>
                    </div>
                    <a href="<?= e(app_url('/pages/contact.php')); ?>" class="site-button site-button--secondary self-start shadow-lg lg:self-end">
                        Start a conversation <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>