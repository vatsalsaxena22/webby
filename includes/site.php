<?php
/** Shared site data, mail and security helpers. */
require_once __DIR__ . '/../config/database.php';

function site_settings(PDO $pdo): array
{
    static $settings = null;
    if ($settings !== null) return $settings;
    $settings = [
        'logo_path' => SITE_LOGO_PATH, 'logo_text' => SITE_LOGO_TEXT,
        'phone' => CONTACT_PHONE, 'email' => CONTACT_EMAIL, 'address' => '',
        'whatsapp' => '', 'facebook' => '', 'instagram' => '', 'youtube' => '',
        'linkedin' => '', 'pinterest' => '', 'github' => '',
    ];
    try {
        foreach ($pdo->query('SELECT setting_key, setting_value FROM site_settings') as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
    } catch (PDOException $e) { error_log('Site settings unavailable: ' . $e->getMessage()); }
    return $settings;
}

function site_social_links(array $settings): array
{
    $socials = [
        'whatsapp' => ['WhatsApp', 'fa-brands fa-whatsapp'],
        'facebook' => ['Facebook', 'fa-brands fa-facebook-f'],
        'instagram' => ['Instagram', 'fa-brands fa-instagram'],
        'youtube' => ['YouTube', 'fa-brands fa-youtube'],
        'linkedin' => ['LinkedIn', 'fa-brands fa-linkedin-in'],
        'pinterest' => ['Pinterest', 'fa-brands fa-pinterest-p'],
        'github' => ['GitHub', 'fa-brands fa-github'],
    ];

    $links = [];
    foreach ($socials as $key => [$label, $icon]) {
        $url = trim($settings[$key] ?? '');
        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));
        if ($url !== '' && filter_var($url, FILTER_VALIDATE_URL) && in_array($scheme, ['http', 'https'], true)) {
            $links[$key] = ['label' => $label, 'icon' => $icon, 'url' => $url];
        }
    }

    return $links;
}

function contact_phone_number(array $settings): string
{
    $phone = preg_replace('/\D+/', '', $settings['phone'] ?? '') ?? '';
    if (
        strlen($phone) < 8
        || strlen($phone) > 15
        || preg_match('/^(\d)\1+$/', $phone)
        || preg_match('/^91?0{8,}$/', $phone)
    ) {
        return '';
    }

    return $phone;
}

function site_logo(array $settings, string $variant = 'light'): string
{
    $logo = trim($settings['logo_path'] ?? '');
    $text = $settings['logo_text'] ?? APP_NAME;
    if ($logo !== '') {
        if (preg_match('#^https?://#i', $logo)) {
            $src = $logo;
        } elseif (str_starts_with(str_replace('\\', '/', $logo), 'uploads/')) {
            $src = upload_url($logo);
        } else {
            $src = app_url('/' . ltrim($logo, '/'));
        }
        return '<img src="' . e($src) . '" alt="' . e($text) . '" class="h-10 max-w-[180px] object-contain" />';
    }
    $initial = mb_strtoupper(mb_substr($text, 0, 1));
    $textClass = $variant === 'dark' ? 'text-white' : 'text-slate-950';
    return '<span class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-500 text-sm font-extrabold text-white shadow-lg">' . e($initial) . '</span><span class="font-display text-xl font-extrabold tracking-tight ' . $textClass . '">' . e($text) . '<span class="text-brand-500">.</span></span>';
}

function csrf_token(): string { if (session_status() !== PHP_SESSION_ACTIVE) session_start(); return $_SESSION['csrf'] ??= bin2hex(random_bytes(32)); }
function csrf_valid(?string $token): bool { if (session_status() !== PHP_SESSION_ACTIVE) session_start(); return is_string($token) && isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token); }

function send_submission_email(array $submission, array $settings): bool
{
    if (!MAIL_ENABLED) return false;
    try {
        require_once APP_ROOT . '/phpmailer/Exception.php'; require_once APP_ROOT . '/phpmailer/PHPMailer.php'; require_once APP_ROOT . '/phpmailer/SMTP.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP(); $mail->Host = MAIL_HOST; $mail->Port = MAIL_PORT; $mail->SMTPAuth = true;
        $mail->Username = MAIL_USERNAME; $mail->Password = MAIL_PASSWORD;
        if (MAIL_ENCRYPTION !== '') $mail->SMTPSecure = MAIL_ENCRYPTION;
        $mail->CharSet = 'UTF-8'; $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
        $mail->addAddress($settings['email'] ?: MAIL_TO_ADDRESS); $mail->addReplyTo($submission['email'], $submission['name']);
        $mail->isHTML(true); $mail->Subject = 'New enquiry: ' . $submission['service'];
        $mail->Body = '<h2>New contact enquiry</h2><p><strong>Name:</strong> ' . e($submission['name']) . '</p><p><strong>Email:</strong> ' . e($submission['email']) . '</p><p><strong>Phone:</strong> ' . e($submission['phone']) . '</p><p><strong>Service:</strong> ' . e($submission['service']) . '</p><p><strong>Message:</strong><br>' . nl2br(e($submission['message'])) . '</p>';
        return $mail->send();
    } catch (Throwable $e) { error_log('Contact email failed: ' . $e->getMessage()); return false; }
}
