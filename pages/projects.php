<?php

$page_title = 'Projects - Webby';
$page_description = 'Explore selected websites, web applications and digital projects built by Webby.';
$page_keywords = 'Webby projects, web development projects, website projects, web applications, portfolio';

require_once __DIR__ . '/../includes/site.php';

$projects_error = '';
try {
    $projects = $pdo->query(
        'SELECT title, summary, image_path, project_url, technologies
         FROM projects
         WHERE is_published = 1
         ORDER BY sort_order ASC, created_at DESC, id DESC'
    )->fetchAll();
} catch (PDOException $exception) {
    error_log('Published projects query failed: ' . $exception->getMessage());
    $projects = [];
    $projects_error = 'Our project portfolio is temporarily unavailable. Please try again later.';
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';

?>

<main class="overflow-hidden bg-white">
    <!-- Intro -->
    <section class="site-page-hero relative isolate bg-white">
        <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -left-36 top-12 h-96 w-96 rounded-full bg-brand-100/60 blur-3xl"></div>
            <div class="absolute -right-32 top-24 h-[30rem] w-[30rem] rounded-full bg-cyan-100/50 blur-3xl"></div>
            <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 sm:pb-20 lg:px-8 lg:pb-24">
            <div class="grid items-end gap-10 lg:grid-cols-[1.2fr_.8fr] lg:gap-16">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50/80 px-4 py-2 text-xs font-bold uppercase tracking-[.16em] text-brand-700">
                        <span class="h-2 w-2 rounded-full bg-brand-500"></span>
                        Selected work
                    </div>
                    <h1 class="site-page-title mt-6 max-w-4xl">
                        Thoughtful digital work.
                        <span class="block text-brand-500">Made to move business forward.</span>
                    </h1>
                </div>
                <div class="lg:pb-2">
                    <p class="max-w-xl text-base leading-8 text-slate-600 sm:text-lg">
                        A curated look at websites, web applications and digital experiences shaped around real people, clear goals and dependable technology.
                    </p>
                    <a href="<?= e(app_url('/pages/contact.php')); ?>" class="mt-6 inline-flex items-center gap-3 text-sm font-bold text-slate-950 transition hover:text-brand-700">
                        Have a project in mind?
                        <span class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-200 transition group-hover:border-brand-300">
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="mt-12 grid grid-cols-2 gap-3 border-t border-slate-200 pt-6 sm:grid-cols-3 sm:gap-8">
                <div>
                    <p class="font-display text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">01 <span class="text-brand-500">/</span></p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[.13em] text-slate-500">Purpose-led design</p>
                </div>
                <div>
                    <p class="font-display text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">02 <span class="text-brand-500">/</span></p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[.13em] text-slate-500">Thoughtful engineering</p>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <p class="font-display text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">03 <span class="text-brand-500">/</span></p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[.13em] text-slate-500">Built for what’s next</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section class="relative bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-9 flex flex-col gap-4 border-b border-slate-200 pb-7 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[.18em] text-brand-700">The portfolio</p>
                    <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">A few things we’ve made.</h2>
                </div>
                <p class="max-w-md text-sm leading-7 text-slate-600">
                    Different challenges, considered solutions. Explore the work and the technologies behind it.
                </p>
            </div>

            <?php if ($projects_error !== ''): ?>
                <div class="rounded-2xl border border-red-200 bg-red-50 p-6 text-sm text-red-800" role="alert">
                    <i class="fa-solid fa-circle-exclamation mr-2" aria-hidden="true"></i><?= e($projects_error); ?>
                </div>
            <?php elseif (!$projects): ?>
                <div class="relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white px-6 py-16 text-center shadow-sm sm:px-12 sm:py-20">
                    <div class="pointer-events-none absolute -right-12 -top-20 h-64 w-64 rounded-full bg-brand-100/70 blur-3xl"></div>
                    <span class="relative mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-950 text-brand-300 shadow-lg shadow-slate-950/10">
                        <i class="fa-regular fa-folder-open text-2xl" aria-hidden="true"></i>
                    </span>
                    <p class="relative mt-6 text-xs font-bold uppercase tracking-[.18em] text-brand-700">Portfolio in progress</p>
                    <h3 class="relative mt-3 font-display text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">Something good is taking shape.</h3>
                    <p class="relative mx-auto mt-3 max-w-md text-sm leading-7 text-slate-600">
                        We’re preparing our project showcase. In the meantime, tell us what you’d like to bring to life.
                    </p>
                    <a href="<?= e(app_url('/pages/contact.php')); ?>" class="site-button site-button--primary relative mt-7">
                        Start a project <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
                    </a>
                </div>
            <?php else: ?>
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-7">
                    <?php foreach ($projects as $index => $project): ?>
                        <?php
                        $projectTitle = (string) ($project['title'] ?? 'Project');
                        $projectSummary = (string) ($project['summary'] ?? '');
                        $technologyList = array_values(array_filter(array_map('trim', explode(',', (string) ($project['technologies'] ?? '')))));
                        ?>
                        <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/90 bg-white shadow-sm transition duration-500 hover:-translate-y-1 hover:border-brand-200 hover:shadow-[0_24px_70px_-35px_rgba(15,23,42,.32)]">
                            <div class="relative isolate overflow-hidden bg-slate-100">
                                <?php if (!empty($project['image_path'])): ?>
                                    <img
                                        class="aspect-[16/10] w-full object-cover transition duration-700 ease-out group-hover:scale-[1.035]"
                                        src="<?= e(upload_url($project['image_path'])); ?>"
                                        alt="<?= e($projectTitle); ?>"
                                        loading="lazy"
                                        decoding="async">
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/25 via-transparent to-white/5"></div>
                                <?php else: ?>
                                    <div class="relative flex aspect-[16/10] items-center justify-center overflow-hidden bg-slate-950">
                                        <div class="absolute -left-10 top-0 h-64 w-64 rounded-full bg-brand-600/30 blur-3xl"></div>
                                        <div class="absolute -bottom-20 -right-8 h-72 w-72 rounded-full bg-cyan-500/20 blur-3xl"></div>
                                        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#94a3b8 1px, transparent 1px); background-size: 22px 22px;"></div>
                                        <span class="relative flex h-24 w-24 items-center justify-center rounded-[1.75rem] border border-white/15 bg-white/[.07] font-display text-5xl font-extrabold text-brand-300 shadow-2xl backdrop-blur-sm">
                                            <?= e(mb_strtoupper(mb_substr($projectTitle, 0, 1))); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <div class="absolute left-5 top-5">
                                    <span class="inline-flex items-center rounded-full border border-white/50 bg-white/90 px-3 py-1.5 text-[11px] font-bold uppercase tracking-[.12em] text-slate-700 shadow-sm backdrop-blur">
                                        Project <?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 sm:p-8">
                                <div class="flex items-start justify-between gap-4">
                                    <h3 class="font-display text-xl font-extrabold leading-snug tracking-tight text-slate-950 sm:text-2xl">
                                        <?= e($projectTitle); ?>
                                    </h3>
                                    <?php if (!empty($project['project_url'])): ?>
                                        <a
                                            class="inline-flex h-11 shrink-0 items-center gap-2 rounded-xl border border-slate-200 px-3.5 text-xs font-bold text-slate-700 transition hover:border-brand-300 hover:bg-brand-50 hover:text-brand-800 sm:px-4 sm:text-sm"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            href="<?= e($project['project_url']); ?>"
                                            aria-label="Visit <?= e($projectTitle); ?>">
                                            View live <i class="fa-solid fa-arrow-up-right-from-square text-[10px]" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <?php if ($projectSummary !== ''): ?>
                                    <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-600"><?= e($projectSummary); ?></p>
                                <?php endif; ?>

                                <?php if ($technologyList): ?>
                                    <div class="mt-6 flex flex-wrap gap-2 border-t border-slate-100 pt-5">
                                        <?php foreach ($technologyList as $technology): ?>
                                            <span class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] font-semibold tracking-wide text-slate-600 transition group-hover:border-brand-100"><?= e($technology); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-white px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <div class="relative mx-auto max-w-7xl overflow-hidden rounded-[2rem] bg-slate-950 px-6 py-14 sm:px-12 sm:py-16 lg:px-16">
            <div class="pointer-events-none absolute -right-20 -top-40 h-[28rem] w-[28rem] rounded-full bg-brand-600/25 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-40 left-1/4 h-72 w-72 rounded-full bg-cyan-500/10 blur-3xl"></div>
            <div class="relative grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                <div class="max-w-3xl">
                    <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[.18em] text-brand-300">
                        <span class="h-2 w-2 rounded-full bg-brand-400"></span>
                        Let’s make it happen
                    </p>
                    <h2 class="mt-4 font-display text-3xl font-extrabold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                        Your next big idea deserves a great build.
                    </h2>
                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">
                        Share the idea, the challenge or the opportunity. We’ll help you find a practical way forward.
                    </p>
                </div>
                <div>
                    <a href="<?= e(app_url('/pages/contact.php')); ?>" class="site-button site-button--primary">
                        Discuss your project <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>