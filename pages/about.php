<?php
$page_title = 'About Webby — Digital Solutions That Work';
$page_description = 'Learn about Webby, a digital solutions service focused on building modern websites and web applications for businesses.';
$page_keywords = 'about Webby, web development company, digital solutions, website development';

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
?>

<main class="overflow-hidden bg-white">
    <!-- Hero -->
    <section class="relative isolate overflow-hidden bg-white pt-32 sm:pt-36 lg:pt-44">
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -left-40 top-12 h-96 w-96 rounded-full bg-brand-100/70 blur-3xl"></div>
            <div class="absolute -right-36 top-28 h-[28rem] w-[28rem] rounded-full bg-cyan-100/60 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0),white_72%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 pb-14 sm:px-6 sm:pb-20 lg:px-8 lg:pb-24">
            <div class="mx-auto max-w-4xl text-center">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white/80 px-4 py-2 text-xs font-bold uppercase tracking-[0.16em] text-brand-700 shadow-sm backdrop-blur">
                    <span class="h-2 w-2 rounded-full bg-brand-500"></span>
                    A little about Webby
                </span>

                <h1 class="mt-6 font-display text-4xl font-extrabold leading-[1.08] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Good ideas deserve
                    <span class="block bg-gradient-to-r from-brand-600 via-brand-500 to-cyan-500 bg-clip-text text-transparent">great digital experiences.</span>
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                    We create modern, practical and reliable websites and web applications that help businesses move forward.
                </p>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                    <a href="<?= e(app_url('/pages/contact.php')); ?>"
                        class="group inline-flex min-h-12 items-center gap-3 rounded-full bg-brand-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-600/20 transition duration-300 hover:-translate-y-1 hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-400 focus:ring-offset-2">
                        Let’s work together
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" aria-hidden="true"></i>
                    </a>
                    <a href="<?= e(app_url('/pages/services.php')); ?>"
                        class="inline-flex min-h-12 items-center gap-2 rounded-full border border-slate-200 bg-white/80 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-white">
                        Explore our services
                    </a>
                </div>
            </div>

            <!-- Visual story -->
            <div class="relative mx-auto mt-14 max-w-6xl sm:mt-20">
                <div aria-hidden="true" class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-r from-brand-200/50 via-cyan-100/50 to-violet-100/50 blur-2xl"></div>
                <div class="relative grid gap-4 md:grid-cols-12 md:items-stretch">
                    <div class="group relative min-h-[280px] overflow-hidden rounded-[1.75rem] bg-slate-200 shadow-xl shadow-slate-900/10 md:col-span-7 md:min-h-[420px]">
                        <img
                            src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1500&q=85"
                            alt="Bright collaborative workspace with a modern desk setup"
                            fetchpriority="high"
                            class="absolute inset-0 h-full w-full object-cover transition duration-700 ease-out group-hover:scale-[1.045]">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-950/5 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                            <span class="inline-flex rounded-full border border-white/25 bg-white/10 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur">Our mindset</span>
                            <h2 class="mt-3 max-w-lg text-2xl font-bold tracking-tight text-white sm:text-3xl">Thoughtful design. Useful technology.</h2>
                        </div>
                        <div class="pointer-events-none absolute inset-0 rounded-[1.75rem] ring-1 ring-inset ring-white/20"></div>
                    </div>

                    <div class="grid gap-4 md:col-span-5">
                        <div class="group relative min-h-[190px] overflow-hidden rounded-[1.75rem] bg-slate-200 shadow-lg shadow-slate-900/10 md:min-h-0">
                            <img
                                src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1000&q=85"
                                alt="Laptop and digital work in progress"
                                loading="lazy"
                                class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/65 to-transparent"></div>
                            <div class="absolute bottom-5 left-5 right-5">
                                <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/70">From concept</p>
                                <p class="mt-1 text-lg font-bold text-white">Ideas into action</p>
                            </div>
                            <div class="pointer-events-none absolute inset-0 rounded-[1.75rem] ring-1 ring-inset ring-white/20"></div>
                        </div>

                        <div class="relative overflow-hidden rounded-[1.75rem] bg-slate-950 p-6 text-white shadow-xl shadow-slate-900/15 sm:p-8">
                            <div aria-hidden="true" class="absolute -right-12 -top-16 h-48 w-48 rounded-full bg-brand-500/25 blur-3xl"></div>
                            <div class="relative">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/10 text-brand-300">
                                    <i class="fa-solid fa-wand-magic-sparkles text-xl" aria-hidden="true"></i>
                                </div>
                                <p class="mt-6 text-xs font-bold uppercase tracking-[0.18em] text-brand-300">Our approach</p>
                                <p class="mt-2 text-2xl font-bold leading-tight">Simple technology.<br><span class="text-slate-400">Meaningful results.</span></p>
                                <div class="mt-6 flex flex-wrap gap-2">
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs text-slate-300">Discover</span>
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs text-slate-300">Design</span>
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs text-slate-300">Build</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who we are -->
    <section class="border-y border-slate-100 bg-slate-50 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-20 lg:px-8">
            <div class="relative mx-auto w-full max-w-xl lg:mx-0">
                <div aria-hidden="true" class="absolute -inset-3 rotate-2 rounded-[2rem] bg-gradient-to-br from-brand-200/60 to-cyan-100/70"></div>
                <div class="group relative aspect-[5/4] overflow-hidden rounded-[1.75rem] bg-slate-200 shadow-2xl shadow-slate-900/10">
                    <img
                        src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1400&q=85"
                        alt="Team collaborating around a table"
                        loading="lazy"
                        class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/35 to-transparent"></div>
                    <div class="absolute bottom-5 left-5 right-5 flex items-end justify-between gap-4 sm:bottom-7 sm:left-7 sm:right-7">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/75">Built with intention</p>
                            <p class="mt-1 text-xl font-bold text-white sm:text-2xl">Made to be useful.</p>
                        </div>
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-white/20 bg-white/15 text-white shadow-lg backdrop-blur">
                            <i class="fa-solid fa-arrow-up-right-dots text-lg" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="absolute -bottom-5 -right-2 hidden rounded-2xl border border-white/70 bg-white/90 p-4 shadow-xl shadow-slate-900/10 backdrop-blur sm:block md:-right-5">
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><i class="fa-solid fa-layer-group" aria-hidden="true"></i></span>
                        <div>
                            <p class="text-sm font-bold text-slate-900">Design + Development</p>
                            <p class="mt-0.5 text-xs text-slate-500">One connected process</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-brand-700">Who we are</span>
                <h2 class="mt-4 font-display text-3xl font-extrabold leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Technology should make business <span class="text-brand-600">easier.</span>
                </h2>
                <p class="mt-6 text-base leading-8 text-slate-600">
                    A website is more than a collection of pages. It is often the first interaction someone has with a business.
                </p>
                <p class="mt-4 text-base leading-8 text-slate-600">
                    That’s why Webby combines thoughtful design, clean development and practical functionality to create digital experiences that are easy to use and built around real business goals.
                </p>
                <p class="mt-4 text-base leading-8 text-slate-600">
                    Whether you need a professional business website, an e-commerce platform or a custom web application, our goal is to turn your requirements into something useful, reliable and ready for the real world.
                </p>

                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><i class="fa-solid fa-compass-drafting" aria-hidden="true"></i></span>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Purposeful design</h3>
                            <p class="mt-1 text-xs leading-5 text-slate-500">Clear, considered and user-focused.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600"><i class="fa-solid fa-code" aria-hidden="true"></i></span>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Practical engineering</h3>
                            <p class="mt-1 text-xs leading-5 text-slate-500">Built for real needs and workflows.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & vision -->
    <section class="bg-white py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-brand-700">What drives us</span>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Built around a simple philosophy.</h2>
                <p class="mt-4 text-base leading-7 text-slate-600">Technology has the most value when it solves the right problem.</p>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2">
                <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-slate-50 p-8 transition duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-slate-900/10 sm:p-10">
                    <div aria-hidden="true" class="absolute -right-12 -top-12 h-44 w-44 rounded-full bg-brand-100/70 blur-2xl transition group-hover:scale-125"></div>
                    <div class="relative">
                        <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-600 text-white shadow-lg shadow-brand-600/20"><i class="fa-solid fa-bullseye text-xl" aria-hidden="true"></i></span>
                        <p class="mt-8 text-xs font-bold uppercase tracking-[0.18em] text-brand-700">Our mission</p>
                        <h3 class="mt-2 text-2xl font-bold tracking-tight text-slate-950">Make digital feel simpler.</h3>
                        <p class="mt-4 max-w-xl text-sm leading-7 text-slate-600 sm:text-base">
                            To help businesses establish a strong digital presence by creating technology that is accessible, useful, reliable and designed around their actual needs.
                        </p>
                    </div>
                </article>

                <article class="group relative overflow-hidden rounded-[1.75rem] bg-slate-950 p-8 text-white shadow-xl shadow-slate-950/10 transition duration-300 hover:-translate-y-1 hover:shadow-2xl sm:p-10">
                    <div aria-hidden="true" class="absolute -right-16 -top-16 h-60 w-60 rounded-full bg-brand-500/20 blur-3xl transition group-hover:scale-125"></div>
                    <div class="relative">
                        <span class="flex h-14 w-14 items-center justify-center rounded-2xl border border-white/10 bg-white/10 text-brand-300"><i class="fa-solid fa-eye text-xl" aria-hidden="true"></i></span>
                        <p class="mt-8 text-xs font-bold uppercase tracking-[0.18em] text-brand-300">Our vision</p>
                        <h3 class="mt-2 text-2xl font-bold tracking-tight">Be a partner businesses trust.</h3>
                        <p class="mt-4 max-w-xl text-sm leading-7 text-slate-400 sm:text-base">
                            To become a trusted digital technology partner for businesses that want to transform ideas into meaningful online experiences.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="bg-slate-50 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-brand-700">Our values</span>
                    <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">The principles behind our work.</h2>
                </div>
                <p class="max-w-md text-sm leading-7 text-slate-600">A consistent approach helps us create digital products that people can understand, use and grow with.</p>
            </div>

            <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                $values = [
                    ['icon' => 'fa-heart', 'title' => 'Quality', 'copy' => 'We care about the details that make a product feel polished and dependable.'],
                    ['icon' => 'fa-user-check', 'title' => 'User first', 'copy' => 'We create experiences that are intuitive and easy for real people to use.'],
                    ['icon' => 'fa-handshake', 'title' => 'Collaboration', 'copy' => 'Great results come from understanding the people and businesses behind each project.'],
                    ['icon' => 'fa-arrow-trend-up', 'title' => 'Growth', 'copy' => 'We build with the future in mind so digital products can grow alongside the business.'],
                ];
                foreach ($values as $index => $value):
                ?>
                    <article class="group relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white p-7 transition duration-300 hover:-translate-y-1.5 hover:border-brand-200 hover:shadow-2xl hover:shadow-brand-950/10">
                        <div class="flex items-center justify-between">
                            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-brand-50 text-brand-700 transition duration-300 group-hover:rotate-[-5deg] group-hover:scale-110 group-hover:bg-brand-600 group-hover:text-white">
                                <i class="fa-solid <?= e($value['icon']); ?> text-lg" aria-hidden="true"></i>
                            </span>
                            <span class="font-display text-sm font-bold tabular-nums text-slate-300">0<?= $index + 1; ?></span>
                        </div>
                        <h3 class="mt-7 text-lg font-bold text-slate-950"><?= e($value['title']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-slate-600"><?= e($value['copy']); ?></p>
                        <div class="mt-6 h-px w-10 bg-brand-300 transition-all duration-300 group-hover:w-16"></div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Closing CTA -->
    <section class="bg-white px-4 py-20 sm:px-6 sm:py-24 lg:px-8">
        <div class="relative mx-auto max-w-6xl overflow-hidden rounded-[2rem] bg-slate-950 px-6 py-14 text-center shadow-2xl shadow-slate-950/10 sm:px-12 sm:py-20">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0">
                <div class="absolute -left-20 -top-32 h-80 w-80 rounded-full bg-brand-500/25 blur-3xl"></div>
                <div class="absolute -bottom-40 -right-20 h-96 w-96 rounded-full bg-cyan-500/15 blur-3xl"></div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.04),transparent_65%)]"></div>
            </div>
            <div class="relative mx-auto max-w-3xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold text-slate-300">
                    <i class="fa-solid fa-sparkles text-brand-300" aria-hidden="true"></i>
                    YOUR NEXT IDEA STARTS HERE
                </span>
                <h2 class="mt-6 font-display text-3xl font-extrabold tracking-tight text-white sm:text-5xl">Have a project in mind?</h2>
                <p class="mx-auto mt-5 max-w-xl text-sm leading-7 text-slate-400 sm:text-base">
                    Let’s talk about your idea, your goals and how we can build something useful together.
                </p>
                <a href="<?= e(app_url('/pages/contact.php')); ?>"
                    class="group mt-8 inline-flex min-h-12 items-center gap-3 rounded-full bg-brand-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-950/30 transition duration-300 hover:-translate-y-1 hover:bg-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-300 focus:ring-offset-2 focus:ring-offset-slate-950">
                    Start a project
                    <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>