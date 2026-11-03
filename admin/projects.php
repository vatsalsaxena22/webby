<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/operations.php';
require_once __DIR__ . '/layout.php';
require_admin();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        admin_handle_post($pdo, $_POST['action'] ?? '', '/admin/projects.php');
    } catch (RuntimeException | PDOException $exception) {
        $error = $exception->getMessage();
        error_log('Admin project error: ' . $exception->getMessage());
    }
}

$projects = $pdo->query('SELECT * FROM projects ORDER BY sort_order, created_at DESC')->fetchAll();
$editing = null;
if (isset($_GET['edit'])) {
    $statement = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
    $statement->execute([(int) $_GET['edit']]);
    $editing = $statement->fetch() ?: null;
}

admin_layout_start(
    'Projects',
    'Add and maintain the portfolio projects displayed on your website.',
    'projects'
);
?>
<?php if ($error !== ''): ?>
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?= e($error); ?></div>
<?php endif; ?>
<div class="grid items-start gap-6 xl:grid-cols-5">
    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft sm:p-8 xl:col-span-3">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wider text-brand-600">Portfolio</p>
                <h2 class="mt-1 font-display text-xl font-bold text-slate-950">All projects</h2>
            </div>
            <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-600"><?= count($projects); ?> total</span>
        </div>
        <div class="mt-6 divide-y divide-slate-100">
            <?php if (!$projects): ?>
                <p class="py-6 text-sm text-slate-500">No projects yet. Add the first one with the form.</p>
            <?php endif; ?>
            <?php foreach ($projects as $project): ?>
                <article class="flex flex-wrap items-center justify-between gap-4 py-4">
                    <div class="flex min-w-0 items-center gap-3">
                        <?php if ($project['image_path']): ?>
                            <img src="<?= e(upload_url($project['image_path'])); ?>" alt="" class="h-12 w-16 rounded-lg object-cover">
                        <?php else: ?>
                            <span class="flex h-12 w-16 items-center justify-center rounded-lg bg-slate-100 text-slate-400"><i class="fa-regular fa-image" aria-hidden="true"></i></span>
                        <?php endif; ?>
                        <div class="min-w-0">
                            <h3 class="truncate font-semibold text-slate-900"><?= e($project['title']); ?></h3>
                            <p class="mt-1 text-xs text-slate-500"><?= $project['is_published'] ? 'Published' : 'Draft'; ?> <span aria-hidden="true">·</span> <?= e($project['slug']); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a class="text-sm font-semibold text-brand-700 hover:text-brand-900" href="<?= e(app_url('/admin/projects.php?edit=' . (int) $project['id'])); ?>">Edit</a>
                        <form method="post" onsubmit="return confirm('Delete this project?');">
                            <input type="hidden" name="csrf" value="<?= e(csrf_token()); ?>">
                            <input type="hidden" name="action" value="project_delete">
                            <input type="hidden" name="id" value="<?= (int) $project['id']; ?>">
                            <button class="text-sm font-semibold text-red-700 hover:text-red-900">Delete</button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft sm:p-8 xl:col-span-2">
        <p class="text-sm font-semibold uppercase tracking-wider text-brand-600"><?= $editing ? 'Update portfolio' : 'Add to portfolio'; ?></p>
        <h2 class="mt-1 font-display text-xl font-bold text-slate-950"><?= $editing ? 'Edit project' : 'New project'; ?></h2>
        <form method="post" enctype="multipart/form-data" class="mt-6 space-y-4">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()); ?>">
            <input type="hidden" name="action" value="project_save">
            <?php if ($editing): ?><input type="hidden" name="id" value="<?= (int) $editing['id']; ?>"><?php endif; ?>
            <label class="block text-sm font-semibold text-slate-700">Project title
                <input required maxlength="150" name="title" value="<?= e($editing['title'] ?? ''); ?>" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal text-slate-900 outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
            </label>
            <label class="block text-sm font-semibold text-slate-700">Project URL
                <input type="url" name="project_url" value="<?= e($editing['project_url'] ?? ''); ?>" placeholder="https://" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal text-slate-900 outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
            </label>
            <label class="block text-sm font-semibold text-slate-700">Summary
                <textarea required name="summary" rows="4" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal text-slate-900 outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10"><?= e($editing['summary'] ?? ''); ?></textarea>
            </label>
            <label class="block text-sm font-semibold text-slate-700">Technologies
                <input name="technologies" value="<?= e($editing['technologies'] ?? ''); ?>" placeholder="PHP, MySQL, JavaScript" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal text-slate-900 outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
            </label>
            <div class="grid gap-4 sm:grid-cols-2">
                <label class="block text-sm font-semibold text-slate-700">Sort order
                    <input type="number" name="sort_order" value="<?= e((string) ($editing['sort_order'] ?? 0)); ?>" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal text-slate-900">
                </label>
                <label class="block text-sm font-semibold text-slate-700">Project image
                    <input type="file" name="image" accept="image/jpeg,image/png,image/webp,image/gif" class="mt-2 block w-full text-xs font-normal">
                </label>
            </div>
            <label class="flex items-center gap-2 text-sm font-medium text-slate-700">
                <input type="checkbox" name="is_published" value="1" <?= !isset($editing['is_published']) || $editing['is_published'] ? 'checked' : ''; ?> class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                Published on the website
            </label>
            <div class="flex flex-wrap gap-3 pt-2">
                <button class="rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-600"><?= $editing ? 'Save changes' : 'Add project'; ?></button>
                <?php if ($editing): ?><a href="<?= e(app_url('/admin/projects.php')); ?>" class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a><?php endif; ?>
            </div>
        </form>
    </section>
</div>
<?php admin_layout_end(); ?>
