<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/layout.php';
require_admin();

try {
    $counts = $pdo->query(
        "SELECT COUNT(*) AS total, COALESCE(SUM(status = 'new'), 0) AS fresh
         FROM contact_submissions"
    )->fetch();
    $projectCount = (int) $pdo->query('SELECT COUNT(*) FROM projects')->fetchColumn();
    $latestSubmissions = $pdo->query(
        'SELECT id, name, email, service, status, created_at
         FROM contact_submissions ORDER BY created_at DESC LIMIT 5'
    )->fetchAll();
} catch (PDOException $exception) {
    error_log('Admin dashboard query failed: ' . $exception->getMessage());
    http_response_code(500);
    exit('Unable to load the dashboard. Check the database configuration and schema.');
}

admin_layout_start(
    'Dashboard',
    'A quick overview of your projects and incoming enquiries.',
    'dashboard'
);

?>
<section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
    <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft">
        <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-slate-500">All enquiries</p>
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fa-solid fa-inbox" aria-hidden="true"></i></span>
        </div>
        <p class="mt-4 font-display text-3xl font-extrabold text-slate-950"><?= (int) $counts['total']; ?></p>
        <a href="<?= e(app_url('/admin/submissions.php')); ?>" class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-900">View enquiries <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a>
    </article>
    <article class="rounded-2xl border border-brand-200 bg-brand-50 p-6 shadow-soft">
        <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-brand-800">Needs a reply</p>
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-brand-700"><i class="fa-solid fa-bell" aria-hidden="true"></i></span>
        </div>
        <p class="mt-4 font-display text-3xl font-extrabold text-brand-900"><?= (int) $counts['fresh']; ?></p>
        <a href="<?= e(app_url('/admin/submissions.php?status=new')); ?>" class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-brand-800 hover:text-brand-950">Review new enquiries <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a>
    </article>
    <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft">
        <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-slate-500">Portfolio projects</p>
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-700"><i class="fa-solid fa-layer-group" aria-hidden="true"></i></span>
        </div>
        <p class="mt-4 font-display text-3xl font-extrabold text-slate-950"><?= $projectCount; ?></p>
        <a href="<?= e(app_url('/admin/projects.php')); ?>" class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-900">Manage projects <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a>
    </article>
</section>

<section class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-soft sm:p-8">
    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <h2 class="font-display text-xl font-bold text-slate-950">Latest enquiries</h2>
            <p class="mt-1 text-sm text-slate-500">The latest messages from your website contact form.</p>
        </div>
        <a href="<?= e(app_url('/admin/submissions.php')); ?>" class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-brand-200 hover:text-brand-700">View all</a>
    </div>
    <div class="mt-6 overflow-x-auto">
        <table class="w-full min-w-[600px] text-left text-sm">
            <thead>
                <tr class="border-b border-slate-200 text-xs uppercase tracking-wide text-slate-500">
                    <th class="px-3 py-3">Contact</th><th class="px-3 py-3">Service</th><th class="px-3 py-3">Received</th><th class="px-3 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (!$latestSubmissions): ?>
                    <tr><td colspan="4" class="px-3 py-8 text-center text-slate-500">No enquiries received yet.</td></tr>
                <?php endif; ?>
                <?php foreach ($latestSubmissions as $submission): ?>
                    <tr>
                        <td class="px-3 py-4"><p class="font-semibold text-slate-900"><?= e($submission['name']); ?></p><a class="text-xs text-brand-700 hover:underline" href="mailto:<?= e($submission['email']); ?>"><?= e($submission['email']); ?></a></td>
                        <td class="px-3 py-4 text-slate-600"><?= e($submission['service']); ?></td>
                        <td class="whitespace-nowrap px-3 py-4 text-slate-500"><?= e($submission['created_at']); ?></td>
                        <td class="px-3 py-4"><span class="rounded-full px-2.5 py-1 text-xs font-semibold <?= $submission['status'] === 'new' ? 'bg-brand-50 text-brand-800' : 'bg-slate-100 text-slate-600'; ?>"><?= e(ucfirst($submission['status'])); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="mt-8 grid gap-4 sm:grid-cols-2">
    <a href="<?= e(app_url('/admin/settings.php')); ?>" class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-soft transition hover:border-brand-200">
        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fa-solid fa-sliders" aria-hidden="true"></i></span>
        <h2 class="mt-4 font-display text-lg font-bold text-slate-950">Business settings</h2>
        <p class="mt-1 text-sm text-slate-500">Update contact information and social profiles.</p>
    </a>
    <a href="<?= e(app_url('/admin/projects.php')); ?>" class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-soft transition hover:border-brand-200">
        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-slate-700"><i class="fa-solid fa-layer-group" aria-hidden="true"></i></span>
        <h2 class="mt-4 font-display text-lg font-bold text-slate-950">Portfolio projects</h2>
        <p class="mt-1 text-sm text-slate-500">Publish, edit, and organize featured work.</p>
    </a>
</section>
<?php admin_layout_end(); ?>
