<?php

/**
 * =========================================================
 * Webby - Application Configuration
 * =========================================================
 *
 * Central configuration file for Webby V1.
 *
 * This file contains:
 * - Application identity
 * - Base URL
 * - Environment
 * - Timezone
 * - Security settings
 * - Upload settings
 * - Shared limits
 *
 * Do not put database credentials here.
 * Database credentials belong in:
 *
 * config/database.php
 */


// =========================================================
// Application
// =========================================================

if (PHP_VERSION_ID < 80000) {
    http_response_code(500);
    exit('Webby requires PHP 8.0 or newer.');
}

define('APP_NAME', 'Webby');
define('SITE_LOGO_PATH', '');
define('SITE_LOGO_TEXT', 'Webby');

define(
    'APP_TAGLINE',
    'Digital Solutions That Work.'
);


// =========================================================
// Environment
// =========================================================
//
// development
// production
//

define('APP_ENV', getenv('APP_ENV') ?: 'development');


// =========================================================
// Base URL
// =========================================================
//
// Development example:
// http://localhost/webby
//
// Production example:
// https://webby.com
//
// IMPORTANT:
// Do not add a trailing slash.
//

$configuredAppUrl = trim((string) (getenv('APP_URL') ?: ''));

if ($configuredAppUrl !== '') {
    define('APP_URL', rtrim($configuredAppUrl, '/'));
} else {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        ? 'https'
        : 'http';
    $host = $_SERVER['SERVER_NAME'] ?? 'localhost';
    $port = (int) ($_SERVER['SERVER_PORT'] ?? ($scheme === 'https' ? 443 : 80));
    $defaultPort = $scheme === 'https' ? 443 : 80;
    $portSuffix = $port === $defaultPort ? '' : ':' . $port;
    $basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php'));

    if (in_array(basename($basePath), ['admin', 'api', 'pages'], true)) {
        $basePath = dirname($basePath);
    }

    $basePath = rtrim($basePath, '/.');
    $basePath = $basePath === '' ? '' : '/' . trim($basePath, '/');

    define('APP_URL', $scheme . '://' . $host . $portSuffix . $basePath);
}


// =========================================================
// Timezone
// =========================================================

date_default_timezone_set('Asia/Kolkata');


// =========================================================
// Application Root
// =========================================================
//
// Absolute filesystem path to the Webby project.
//

define(
    'APP_ROOT',
    dirname(__DIR__)
);


// =========================================================
// Application Paths
// =========================================================

define(
    'API_PATH',
    APP_ROOT . '/api'
);

define(
    'CONFIG_PATH',
    APP_ROOT . '/config'
);

define(
    'INCLUDES_PATH',
    APP_ROOT . '/includes'
);

define(
    'PAGES_PATH',
    APP_ROOT . '/pages'
);

define(
    'ASSETS_PATH',
    APP_ROOT . '/assets'
);

define(
    'IMAGE_PATH',
    ASSETS_PATH . '/images'
);

define(
    'JS_PATH',
    ASSETS_PATH . '/js'
);

define(
    'UPLOADS_PATH',
    APP_ROOT . '/uploads'
);


// =========================================================
// Public Asset URLs
// =========================================================

define(
    'ASSETS_URL',
    APP_URL . '/assets'
);

define(
    'IMAGE_URL',
    ASSETS_URL . '/images'
);

define(
    'JS_URL',
    ASSETS_URL . '/js'
);

define(
    'UPLOADS_URL',
    APP_URL . '/uploads'
);


// =========================================================
// SEO Defaults
// =========================================================

define(
    'DEFAULT_TITLE',
    'Webby — Digital Solutions That Work'
);

define(
    'DEFAULT_DESCRIPTION',
    'Webby builds modern websites, web applications and digital solutions that help businesses grow online.'
);

define(
    'DEFAULT_KEYWORDS',
    'web development, website development, web applications, ecommerce development, digital solutions, Webby'
);


// =========================================================
// Contact Information
// =========================================================
//
// Replace these placeholder values with the actual
// Webby contact information.
//

define(
    'CONTACT_EMAIL',
    'hello@webby.com'
);

define(
    'CONTACT_PHONE',
    '+91 00000 00000'
);

// =========================================================
// Email / SMTP
// =========================================================
// Set MAIL_ENABLED to true only after adding real SMTP credentials.
define('MAIL_ENABLED', false);
define('MAIL_HOST', 'smtp.example.com');
define('MAIL_PORT', 587);
define('MAIL_USERNAME', '');
define('MAIL_PASSWORD', '');
define('MAIL_ENCRYPTION', 'tls'); // tls, ssl, or empty string
define('MAIL_FROM_ADDRESS', 'no-reply@example.com');
define('MAIL_FROM_NAME', APP_NAME);
define('MAIL_TO_ADDRESS', CONTACT_EMAIL);

// Initial administrator. Change this hash before production deployment.
// Starter login: admin@example.com / ChangeMeNow!2026
define('ADMIN_EMAIL', 'admin@example.com');
define('ADMIN_PASSWORD_HASH', '$2y$10$z1VlCN8krGsKUjaThbKMvOPviHSioipg1rTCzcItFWQ1KZCnClc8G');


// =========================================================
// Contact Form
// =========================================================

define(
    'CONTACT_MESSAGE_MIN_LENGTH',
    10
);

define(
    'CONTACT_MESSAGE_MAX_LENGTH',
    5000
);

define(
    'CONTACT_NAME_MAX_LENGTH',
    100
);

define(
    'CONTACT_EMAIL_MAX_LENGTH',
    150
);

define(
    'CONTACT_PHONE_MAX_LENGTH',
    30
);

define(
    'CONTACT_COMPANY_MAX_LENGTH',
    150
);


// =========================================================
// Security
// =========================================================

define(
    'CSRF_ENABLED',
    true
);


// =========================================================
// Error Handling
// =========================================================
//
// Development:
// Show errors for easier debugging.
//
// Production:
// Hide errors from visitors and log them instead.
//

if (APP_ENV === 'development') {

    error_reporting(E_ALL);

    ini_set('display_errors', '1');

    ini_set('display_startup_errors', '1');
} else {

    error_reporting(E_ALL);

    ini_set('display_errors', '0');

    ini_set('display_startup_errors', '0');
}


// =========================================================
// Helper Functions
// =========================================================

/**
 * Generate a full application URL.
 *
 * Example:
 *
 * url('/pages/contact.php')
 *
 * returns:
 *
 * http://localhost/webby/pages/contact.php
 */

function app_url(string $path = ''): string
{
    return APP_URL . '/' . ltrim($path, '/');
}


/**
 * Generate an asset URL.
 *
 * Example:
 *
 * asset('images/logo.png')
 *
 * returns:
 *
 * http://localhost/webby/assets/images/logo.png
 */

function asset(string $path): string
{
    return ASSETS_URL . '/' . ltrim($path, '/');
}


/**
 * Generate an image URL.
 */

function image_url(string $path): string
{
    return IMAGE_URL . '/' . ltrim($path, '/');
}

function upload_url(string $path): string
{
    return UPLOADS_URL . '/' . rawurlencode(basename(str_replace('\\', '/', $path)));
}


/**
 * Escape HTML safely.
 *
 * Useful when displaying database/user content.
 */

function e(?string $value): string
{
    return htmlspecialchars(
        $value ?? '',
        ENT_QUOTES,
        'UTF-8'
    );
}


/**
 * Check whether the application is running
 * in development mode.
 */

function is_development(): bool
{
    return APP_ENV === 'development';
}


/**
 * Check whether the application is running
 * in production mode.
 */

function is_production(): bool
{
    return APP_ENV === 'production';
}
