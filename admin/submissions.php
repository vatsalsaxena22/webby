<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/operations.php';
require_once __DIR__ . '/layout.php';
require_admin();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        admin_handle_post($pdo, $_POST['action'] ?? '', '/admin/submissions.php');
    } catch (RuntimeException | PDOException $exception) {
        $error = $exception->getMessage();
        error_log('Admin enquiry error: ' . $exception->getMessage());
    }
}

$statuses = ['new', 'contacted', 'qualified', 'proposal', 'won', 'lost'];
$filter = $_GET['status'] ?? '';
if (!in_array($filter, $statuses, true)) {
    $filter = '';
}

if ($filter !== '') {
    $statement = $pdo->prepare('SELECT * FROM contact_submissions WHERE status = ? ORDER BY created_at DESC LIMIT 100');
    $statement->execute([$filter]);
    $submissions = $statement->fetchAll();
} else {
    $submissions = $pdo->query('SELECT * FROM contact_submissions ORDER BY created_at DESC LIMIT 100')->fetchAll();
}

admin_layout_start(
    'Enquiries',
    'Review contact form messages and track each enquiry through your sales process.',
    'submissions'
);
?>
<?php if ($error !== ''): ?>
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?= e($error); ?></div>
<?php endif; ?>
<section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft sm:p-8">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="font-display text-xl font-bold text-slate-950">Contact messages</h2>
            <p class="mt-1 text-sm text-slate-500">Showing up to 100 most recent enquiries.</p>
        </div>
        <form method="get" class="flex items-center gap-2">
            <label for="status-filter" class="sr-only">Filter by status</label>
            <select id="status-filter" name="status" onchange="this.form.submit()" class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-700">
                <option value="">All statuses</option>
                <?php foreach ($statuses as $status): ?>
                    <option value="<?= e($status); ?>" <?= $filter === $status ? 'selected' : ''; ?>><?= e(ucfirst($status)); ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <div class="mt-6 overflow-x-auto">
        <table class="w-full min-w-[800px] text-left text-sm">
            <thead>
                <tr class="border-b border-slate-200 text-xs uppercase tracking-wide text-slate-500">
                    <th class="px-3 py-3">Contact</th><th class="px-3 py-3">Project enquiry</th><th class="px-3 py-3">Received</th><th class="px-3 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (!$submissions): ?>
                    <tr><td colspan="4" class="px-3 py-10 text-center text-slate-500">No enquiries found for this filter.</td></tr>
                <?php endif; ?>
                <?php foreach ($submissions as $submission): ?>
                    <tr class="align-top">
                        <td class="px-3 py-4">
                            <p class="font-semibold text-slate-900"><?= e($submission['name']); ?></p>
                            <a class="mt-1 block text-brand-700 hover:underline" href="mailto:<?= e($submission['email']); ?>"><?= e($submission['email']); ?></a>
                            <?php if ($submission['phone']): ?><a class="mt-1 block text-slate-500 hover:text-brand-700" href="tel:<?= e(preg_replace('/[^0-9+]/', '', $submission['phone'])); ?>"><?= e($submission['phone']); ?></a><?php endif; ?>
                            <?php if ($submission['company']): ?><p class="mt-1 text-xs text-slate-500"><?= e($submission['company']); ?></p><?php endif; ?>
                        </td>
                        <td class="max-w-lg px-3 py-4">
                            <p class="font-semibold text-slate-900"><?= e($submission['service']); ?></p>
                            <p class="mt-1 whitespace-pre-line text-slate-600"><?= e($submission['message']); ?></p>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-slate-500"><?= e($submission['created_at']); ?></td>
                        <td class="px-3 py-4">
                            <form method="post">
                                <input type="hidden" name="csrf" value="<?= e(csrf_token()); ?>">
                                <input type="hidden" name="action" value="submission_status">
                                <input type="hidden" name="id" value="<?= (int) $submission['id']; ?>">
                                <select name="status" aria-label="Enquiry status" onchange="this.form.submit()" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 focus:border-brand-500 focus:outline-none">
                                    <?php foreach ($statuses as $status): ?>
                                        <option value="<?= e($status); ?>" <?= $submission['status'] === $status ? 'selected' : ''; ?>><?= e(ucfirst($status)); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php admin_layout_end(); ?>
