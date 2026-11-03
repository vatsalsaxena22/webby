<?php

require_once __DIR__ . '/site.php';
require_once __DIR__ . '/theme.php';
$site = site_settings($pdo);
$theme = site_theme();
$themeMode = $theme['mode'] === 'dark' ? 'dark' : 'light';

// ---------------------------------------------------------
// Page Metadata
// ---------------------------------------------------------

$page_title = $page_title ?? 'Webby — Digital Solutions That Work';
$page_description = $page_description ?? 'Webby provides modern web development and digital solutions for businesses, startups, and organizations.';
$page_keywords = $page_keywords ?? 'web development, website development, web design, digital solutions, Webby';

$page_url = $page_url ?? '';
$page_image = $page_image ?? asset('images/og-image.jpg');

if (empty($page_url)) {
    $requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $page_url = APP_URL . ($requestPath ?: '/');
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= e($themeMode); ?>">

<head>

    <!-- =====================================================
         Basic Meta
    ====================================================== -->

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>">

    <meta
        name="keywords"
        content="<?= htmlspecialchars($page_keywords, ENT_QUOTES, 'UTF-8'); ?>">

    <meta name="author" content="Webby">

    <meta name="robots" content="index, follow">

    <meta name="theme-color"         content="<?= e($theme['primary']); ?>">


    <!-- =====================================================
         Page Title
    ====================================================== -->

    <title>
        <?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>
    </title>


    <!-- =====================================================
         Canonical URL
    ====================================================== -->

    <link
        rel="canonical"
        href="<?= htmlspecialchars($page_url, ENT_QUOTES, 'UTF-8'); ?>">


    <!-- =====================================================
         Open Graph
    ====================================================== -->

    <meta
        property="og:type"
        content="website">

    <meta
        property="og:title"
        content="<?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>">

    <meta
        property="og:description"
        content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>">

    <meta
        property="og:url"
        content="<?= htmlspecialchars($page_url, ENT_QUOTES, 'UTF-8'); ?>">

    <meta
        property="og:image"
        content="<?= htmlspecialchars($page_image, ENT_QUOTES, 'UTF-8'); ?>">

    <meta
        property="og:site_name"
        content="Webby">


    <!-- =====================================================
         Twitter / X Card
    ====================================================== -->

    <meta
        name="twitter:card"
        content="summary_large_image">

    <meta
        name="twitter:title"
        content="<?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>">

    <meta
        name="twitter:description"
        content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>">

    <meta
        name="twitter:image"
        content="<?= htmlspecialchars($page_image, ENT_QUOTES, 'UTF-8'); ?>">


    <!-- =====================================================
         Favicon
    ====================================================== -->

    <link
        rel="icon"
        type="image/png"
        href="<?= e(asset('images/favicon.png')); ?>">


    <!-- =====================================================
         Google Fonts
    ====================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">


    <!-- =====================================================
         Font Awesome
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer">

    <?php render_site_theme($theme); ?>
    <link rel="stylesheet" href="<?= e(asset('css/app.css')); ?>">

</head>


<body class="bg-white text-slate-900 antialiased">

    <!-- Main website content starts here -->
