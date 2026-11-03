<?php

function admin_save_settings(PDO $pdo): void
{
    $values = [
        'logo_text' => 'Logo text',
        'phone' => 'Phone',
        'email' => 'Contact email',
        'address' => 'Address',
        'whatsapp' => 'WhatsApp URL',
        'facebook' => 'Facebook URL',
        'instagram' => 'Instagram URL',
        'youtube' => 'YouTube URL',
        'linkedin' => 'LinkedIn URL',
        'pinterest' => 'Pinterest URL',
        'github' => 'GitHub URL',
    ];
    $statement = $pdo->prepare(
        'INSERT INTO site_settings (setting_key, setting_value) VALUES (?, ?)
         ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)'
    );

    foreach ($values as $key => $label) {
        $value = trim($_POST[$key] ?? '');
        if ($key === 'email' && $value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new RuntimeException('Enter a valid contact email address.');
        }
        if (in_array($key, ['whatsapp', 'facebook', 'instagram', 'youtube', 'linkedin', 'pinterest', 'github'], true)
            && $value !== ''
            && (!filter_var($value, FILTER_VALIDATE_URL) || !in_array(strtolower((string) parse_url($value, PHP_URL_SCHEME)), ['http', 'https'], true))
        ) {
            throw new RuntimeException($label . ' must be a valid http or https URL.');
        }
        $statement->execute([$key, $value]);
    }

    if ($logoPath = admin_upload('logo')) {
        $statement->execute(['logo_path', $logoPath]);
    }
}

function admin_save_project(PDO $pdo): void
{
    $title = trim($_POST['title'] ?? '');
    $summary = trim($_POST['summary'] ?? '');
    $projectUrl = trim($_POST['project_url'] ?? '');

    if ($title === '' || mb_strlen($title) > 150 || $summary === '') {
        throw new RuntimeException('Enter a project title (up to 150 characters) and summary.');
    }
    if ($projectUrl !== '' && (!filter_var($projectUrl, FILTER_VALIDATE_URL)
        || !in_array(strtolower((string) parse_url($projectUrl, PHP_URL_SCHEME)), ['http', 'https'], true))
    ) {
        throw new RuntimeException('Enter a valid project URL.');
    }

    $id = filter_var($_POST['id'] ?? 0, FILTER_VALIDATE_INT);
    $id = $id === false ? 0 : (int) $id;
    $slugBase = strtolower(trim((string) preg_replace('/[^a-z0-9]+/i', '-', $title), '-'));
    $slug = ($slugBase !== '' ? $slugBase : 'project') . ($id ? '-' . $id : '-' . bin2hex(random_bytes(3)));
    $imagePath = admin_upload('image');
    $technologies = trim($_POST['technologies'] ?? '');
    $published = isset($_POST['is_published']) ? 1 : 0;
    $sortOrder = filter_var($_POST['sort_order'] ?? 0, FILTER_VALIDATE_INT);
    $sortOrder = $sortOrder === false ? 0 : $sortOrder;

    if ($id > 0) {
        $existing = $pdo->prepare('SELECT id FROM projects WHERE id = ?');
        $existing->execute([$id]);
        if (!$existing->fetchColumn()) {
            throw new RuntimeException('The project you are editing no longer exists.');
        }

        $sql = 'UPDATE projects
                SET title = ?, slug = ?, summary = ?, project_url = ?, technologies = ?,
                    is_published = ?, sort_order = ?';
        $parameters = [$title, $slug, $summary, $projectUrl ?: null, $technologies ?: null, $published, $sortOrder];
        if ($imagePath !== null) {
            $sql .= ', image_path = ?';
            $parameters[] = $imagePath;
        }
        $sql .= ' WHERE id = ?';
        $parameters[] = $id;
        $pdo->prepare($sql)->execute($parameters);
        admin_flash('success', 'Project updated.');
        return;
    }

    $pdo->prepare(
        'INSERT INTO projects
         (title, slug, summary, image_path, project_url, technologies, is_published, sort_order)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
    )->execute([
        $title,
        $slug,
        $summary,
        $imagePath,
        $projectUrl ?: null,
        $technologies ?: null,
        $published,
        $sortOrder,
    ]);
    admin_flash('success', 'Project added.');
}

function admin_delete_project(PDO $pdo): void
{
    $id = filter_var($_POST['id'] ?? 0, FILTER_VALIDATE_INT);
    if (!$id || $id < 1) {
        throw new RuntimeException('Choose a valid project to delete.');
    }
    $pdo->prepare('DELETE FROM projects WHERE id = ?')->execute([$id]);
    admin_flash('success', 'Project deleted.');
}

function admin_update_submission_status(PDO $pdo): void
{
    $statuses = ['new', 'contacted', 'qualified', 'proposal', 'won', 'lost'];
    $id = filter_var($_POST['id'] ?? 0, FILTER_VALIDATE_INT);
    $status = $_POST['status'] ?? '';
    if (!$id || $id < 1 || !in_array($status, $statuses, true)) {
        throw new RuntimeException('Choose a valid enquiry and status.');
    }
    $pdo->prepare('UPDATE contact_submissions SET status = ? WHERE id = ?')->execute([$status, $id]);
    admin_flash('success', 'Enquiry status updated.');
}

function admin_handle_post(PDO $pdo, string $action, string $redirect): void
{
    if (!csrf_valid($_POST['csrf'] ?? '')) {
        throw new RuntimeException('Your session expired. Refresh and try again.');
    }

    switch ($action) {
        case 'settings':
            admin_save_settings($pdo);
            break;
        case 'project_save':
            admin_save_project($pdo);
            break;
        case 'project_delete':
            admin_delete_project($pdo);
            break;
        case 'submission_status':
            admin_update_submission_status($pdo);
            break;
        default:
            throw new RuntimeException('Unknown admin action.');
    }

    header('Location: ' . app_url($redirect));
    exit;
}
