<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/operations.php';
require_once __DIR__ . '/layout.php';
require_admin();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        admin_handle_post($pdo, $_POST['action'] ?? '', '/admin/settings.php');
    } catch (RuntimeException | PDOException $exception) {
        $error = $exception->getMessage();
        error_log('Admin settings error: ' . $exception->getMessage());
    }
}

$site = site_settings($pdo);
$settingsFields = [
    'logo_text' => ['Logo text', 'Your business or brand name.'],
    'phone' => ['Phone number', 'Used by the call button and contact information.'],
    'email' => ['Contact email', 'Where visitors can reach you.'],
    'address' => ['Business address', 'Optional address displayed on the contact page.'],
];
$socialFields = [
    'whatsapp' => ['WhatsApp URL', 'https://wa.me/919876543210'],
    'facebook' => ['Facebook URL', 'https://facebook.com/your-page'],
    'instagram' => ['Instagram URL', 'https://instagram.com/your-profile'],
    'youtube' => ['YouTube URL', 'https://youtube.com/@your-channel'],
    'linkedin' => ['LinkedIn URL', 'https://linkedin.com/company/your-company'],
    'pinterest' => ['Pinterest URL', 'https://pinterest.com/your-profile'],
    'github' => ['GitHub URL', 'https://github.com/your-profile'],
];

admin_layout_start(
    'Business settings',
    'Manage your contact details and the social profiles shown on your website.',
    'settings'
);
?>
<?php if ($error !== ''): ?>
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><?= e($error); ?></div>
<?php endif; ?>
<form method="post" enctype="multipart/form-data" class="space-y-6">
    <input type="hidden" name="csrf" value="<?= e(csrf_token()); ?>">
    <input type="hidden" name="action" value="settings">

    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft sm:p-8">
        <div class="mb-6">
            <p class="text-sm font-semibold uppercase tracking-wider text-brand-600">Business profile</p>
            <h2 class="mt-1 font-display text-xl font-bold text-slate-950">Contact details</h2>
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
            <?php foreach ($settingsFields as $key => [$label, $help]): ?>
                <label class="block text-sm font-semibold text-slate-700">
                    <?= e($label); ?>
                    <input name="<?= e($key); ?>" value="<?= e($site[$key] ?? ''); ?>" class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal text-slate-900 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
                    <span class="mt-1 block text-xs font-normal text-slate-500"><?= e($help); ?></span>
                </label>
            <?php endforeach; ?>
            <label class="block text-sm font-semibold text-slate-700">
                Logo image <span class="font-normal text-slate-500">(optional, max 3 MB)</span>
                <input name="logo" type="file" accept="image/jpeg,image/png,image/webp,image/gif" class="mt-2 block w-full rounded-xl border border-slate-200 p-3 text-sm">
            </label>
            <?php if (!empty($site['logo_path'])): ?>
                <div class="flex items-center gap-3 self-center rounded-xl bg-slate-50 p-3">
                    <img src="<?= e(str_starts_with($site['logo_path'], 'uploads/') ? upload_url($site['logo_path']) : app_url('/' . ltrim($site['logo_path'], '/'))); ?>" alt="" class="h-10 max-w-36 object-contain">
                    <span class="text-xs text-slate-500">Current logo</span>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft sm:p-8">
        <div class="mb-6">
            <p class="text-sm font-semibold uppercase tracking-wider text-brand-600">Social presence</p>
            <h2 class="mt-1 font-display text-xl font-bold text-slate-950">Social media links</h2>
            <p class="mt-2 text-sm text-slate-500">Leave a field empty to hide that link from the website footer.</p>
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
            <?php foreach ($socialFields as $key => [$label, $placeholder]): ?>
                <label class="block text-sm font-semibold text-slate-700">
                    <?= e($label); ?>
                    <input type="url" name="<?= e($key); ?>" value="<?= e($site[$key] ?? ''); ?>" placeholder="<?= e($placeholder); ?>" class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal text-slate-900 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
                    <?php if ($key === 'whatsapp'): ?>
                        <span class="mt-1 block text-xs font-normal text-slate-500">Shown as the WhatsApp contact button and in the footer.</span>
                    <?php endif; ?>
                </label>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="flex justify-end">
        <button class="rounded-xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-600">Save settings</button>
    </div>
</form>
<?php admin_layout_end(); ?>
